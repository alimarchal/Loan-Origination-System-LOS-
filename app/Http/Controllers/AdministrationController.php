<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Log;

class AdministrationController extends Controller  implements HasMiddleware
{

    public static function middleware(): array
    {
        Log::info('Middleware executed for AdministrationController');

        return [
            // Allow users with 'Admin', 'Super Admin' roles or 'User Access' permission
            new Middleware('role_or_permission:Admin|Super Admin|User Access', ['only' => ['index']]),
        ];
    }

    public function index()
    {

        return view('administration.index');
    }
}
