<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class AdministrationController extends Controller  implements HasMiddleware
{

    public static function middleware(): array
    {
        return [
            new Middleware('role_or_permission:users-access', only: ['index']),
        ];
    }
    public function index()
    {
        return view('administration.index');
    }
}
