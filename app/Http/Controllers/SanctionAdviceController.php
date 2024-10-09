<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSanctionAdviceRequest;
use App\Http\Requests\UpdateSanctionAdviceRequest;
use App\Models\Borrower;
use App\Models\SanctionAdvice;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class SanctionAdviceController extends Controller
{

    public function index()
    {
//        $sanction_advices = Borrower::where('status','Approved')->where('is_sanction_advice_issued','No')->get();
        $sanction_advices = SanctionAdvice::all();
        return view('sanction-advices.consumer.advance-salary.index',compact('sanction_advices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Borrower $borrower)
    {
        if (empty($borrower->sanction_advice))
        {
            return view('sanction-advices.consumer.advance-salary.create', compact('borrower'));
        } else {
            // Flash error message to the session
            session()->flash('error', 'You have already made sanction advice for this borrower.');

            // Redirect back with old input data
            return redirect()->back()->withInput();
        }

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSanctionAdviceRequest $request, Borrower $borrower)
    {
//        dd($request->all());
        // Start database transaction
        DB::beginTransaction();
        $sanction_advice = null;

        try {
            $request->merge([
                'borrower_id' => $borrower->id,
                'date_of_report' => Carbon::now()->format('Y-m-d'),
            ]);

            $sanction_advice = SanctionAdvice::create($request->all());
            // Commit the transaction if everything goes well
            DB::commit();

            // Flash success message to the session
            session()->flash('success', 'Sanction Advice successfully created!');

        } catch (\Exception $e) {
            // Rollback the transaction if an error occurs
            DB::rollBack();

            // Log the error for debugging
            Log::error('Sanction Advice creation failed: ' . $e->getMessage());

            // Flash error message to the session
            session()->flash('error', 'Sanction Advice creation failed! Please try again.');

            // Redirect back with input
            return redirect()->back()->withInput();
        }

        if(!empty($sanction_advice)){
            return to_route("sanction-advice.edit", [$sanction_advice->id, $borrower->id]);
        } else{
            return to_route("sanction-advice.index");
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(SanctionAdvice $sanctionAdvice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SanctionAdvice $sanctionAdvice, Borrower $borrower)
    {
        return view('sanction-advices.consumer.advance-salary.edit', compact('sanctionAdvice','borrower'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSanctionAdviceRequest $request, Borrower $borrower, SanctionAdvice $sanctionAdvice)
    {
        // Start a database transaction
        DB::beginTransaction();

        try {
            // Add the current date to the request data
            $request->merge([
                'date_of_report' => Carbon::now()->format('Y-m-d'),
            ]);

            // Update the SanctionAdvice record
            $updated = $sanctionAdvice->update($request->all());


            if (!$updated) {
                throw new \Exception("Sanction Advice update failed unexpectedly.");
            }

            // Commit the transaction if everything goes well
            DB::commit();

            // Flash success message to the session
            session()->flash('success', 'Sanction Advice successfully updated!');

            // Redirect back to the edit page with success message
            return redirect()->route('sanction-advice.edit', [$sanctionAdvice->id, $borrower->id]);

        } catch (\Exception $e) {
            // Rollback the transaction in case of any error
            DB::rollBack();

            // Log the error with additional context
            Log::error('Sanction Advice update failed for ID ' . $sanctionAdvice->id . ' due to: ' . $e->getMessage());

            // Flash error message to the session
            session()->flash('error', 'Sanction Advice update failed! Please try again.');

            // Redirect back with old input data
            return redirect()->back()->withInput();
        }
    }




    function base64EncodeImage($path) {
        Log::info("Original path: " . $path);

        if ($path === 'images/logo.png') {
            $fullPath = public_path($path);
        } else if (strpos($path, '/') === 0 || (PHP_OS_FAMILY === 'Windows' && strpos($path, ':\\') === 1)) {
            $fullPath = $path;
        } else {
            $fullPath = storage_path('app/public/' . $path);
        }

        Log::info("Attempting to access: " . $fullPath);

        if (!file_exists($fullPath)) {
            Log::error("File does not exist: $fullPath");
            return null;
        }

        if (!is_readable($fullPath)) {
            Log::error("File is not readable: $fullPath");
            return null;
        }

        $imageData = @file_get_contents($fullPath);
        if ($imageData === false) {
            $errorMessage = "Failed to read file contents: $fullPath. Error: " . error_get_last()['message'];
            Log::error($errorMessage);
            return null;
        }

        $base64 = base64_encode($imageData);
        $mimeType = mime_content_type($fullPath) ?: 'application/octet-stream';

        Log::info("Successfully encoded image: $fullPath");
        return 'data:' . $mimeType . ';base64,' . $base64;
    }

    public function download(Borrower $borrower, SanctionAdvice $sanctionAdvice)
    {
        ini_set('pcre.backtrack_limit', '5000000');
        $mpdf = new \Mpdf\Mpdf([
            'mode' => 'utf-32',
            'format' => 'A4-P',
            'margin_left' => 12.7,
            'margin_right' => 12.7,
            'margin_top' => 12.7,
            'margin_bottom' => 12.7,
//            'margin_header' => 5,
            'margin_footer' => 10,
            'dpi' => 150,
            'default_font' => 'sans-serif'
        ]);

        $mpdf->SetTitle('Borrower Information');
        $mpdf->SetAuthor('Your Application Name');

        // Add page numbers
        $mpdf->SetFooter( 'Print Date: ' . date('d-m-Y H:i:s') . ', UID:' . Auth::user()->id . ', BID: ' . $borrower->id . '  <br>Page {PAGENO} of {nbpg} ' );


        // Convert the logo image to Base64
        $imagePath = 'images/logo.png';
        $base64Image = $this->base64EncodeImage($imagePath);

//        // Prepare documents
//        $documents = [];
//        if ($borrower->documents->isNotEmpty()) {
//            foreach ($borrower->documents as $document) {
//                $result = $this->base64EncodeImage($document->path_attachment);
//                if ($result) {
//                    $documents[] = [
//                        'image' => $result,
//                        'type' => $document->document_type,
//                    ];
//                } else {
//                    $documents[] = [
//                        'error' => "Could not load document",
//                        'type' => $document->document_type,
//                    ];
//                }
//            }
//        }



        // Render the main content
        $html = view('sanction-advices.consumer.advance-salary.download', compact('borrower', 'base64Image','sanctionAdvice'))->render();

        // Write the HTML content to the PDF
        $mpdf->WriteHTML($html);


        // Generate a unique filename
        $filename = 'borrower_' . $borrower->id . '_' . time() . '.pdf';

//        // Save the PDF to storage
//        Storage::put('borrower_pdfs/' . $filename, $mpdf->Output('', 'S'));

        // Output the PDF for download
        return response($mpdf->Output($filename, 'S'))
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'attachment; filename="' . $filename . '"');

        // Output the PDF
//        return $mpdf->Output('borrower.pdf', 'I');
    }





}