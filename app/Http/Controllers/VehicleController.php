<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVehicleRequest;
use App\Http\Requests\UpdateVehicleRequest;
use App\Models\Borrower;
use App\Models\BorrowerBusiness;
use App\Models\RequestedLoanAmount;
use App\Models\Vehicle;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $borrower = Borrower::findOrFail($id);
        $applicant_vehicles = Vehicle::where('borrower_id', $id)->get();
        return view('applicant-vehicle.index', compact('applicant_vehicles', 'borrower'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Borrower $borrower)
    {
        return view('applicant-vehicle.create', compact('borrower'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVehicleRequest $request, Borrower $borrower, RequestedLoanAmount $requestedLoanAmount)
    {
        $user = Auth::user();
        $down_payment_percentage = round($request->equity_dawn_payment / $request->price_of_vehicle * 100,2);
        $finance_amount = round($request->price_of_vehicle - $request->equity_dawn_payment,2);
        $request->merge([
            'user_id' => $user->id,
            'borrower_id' => $borrower->id,
            'requested_loan_amount_id' => $requestedLoanAmount->id,
            'down_payment_percentage' => $down_payment_percentage,
            'finance_amount' => $finance_amount,
        ]);

//        dd($request->all());

        $is_data_inserted = false;
        $vehicle = null;
        DB::beginTransaction();
        try {
            $vehicle = Vehicle::create($request->all());
            $is_data_inserted = true;
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            // Handle error
            session()->flash('error', 'An error occurred: ' . $e->getMessage());
            return back()->withInput();
        }

        if ($is_data_inserted) {
            session()->flash('success', 'Applicant vehicle record created successfully.');
            return to_route('applicant.vehicles.edit', [$borrower->id, $vehicle->id]);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Vehicle $vehicle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Borrower $borrower, Vehicle $vehicle)
    {
        return view('applicant-vehicle.edit', compact('borrower', 'borrower', 'vehicle'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVehicleRequest $request, Borrower $borrower, Vehicle $vehicle)
    {
//        dd($request->all());
        $user = Auth::user();
        $down_payment_percentage = round($request->equity_dawn_payment / $request->price_of_vehicle * 100,2);
        $finance_amount = round($request->price_of_vehicle - $request->equity_dawn_payment,2);
        $request->merge([
            'user_id' => $user->id,
            'borrower_id' => $borrower->id,
            'down_payment_percentage' => $down_payment_percentage,
            'finance_amount' => $finance_amount,
        ]);

        $is_data_updated = false;
        DB::beginTransaction();
        try {
            $vehicle->update($request->all());
            $is_data_updated = true;
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            // Handle error
            session()->flash('error', 'An error occurred: ' . $e->getMessage());
            return back()->withInput();
        }

        if ($is_data_updated) {
            session()->flash('success', 'Applicant vehicle record updated successfully.');
            return to_route('applicant.vehicles.edit', [$borrower->id, $vehicle->id]);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Borrower $borrower, Vehicle $vehicle)
    {
        DB::beginTransaction();
        try {
            $vehicle->delete();
            DB::commit();
            session()->flash('error', 'Applicant vehicle deleted successfully.');
            return to_route('applicant.vehicle.index', [$borrower->id]);
        } catch (\Exception $e) {
            DB::rollback();
            // Handle error
            session()->flash('error', 'An error occurred: ' . $e->getMessage());
            return back()->withInput();
        }
    }
}
