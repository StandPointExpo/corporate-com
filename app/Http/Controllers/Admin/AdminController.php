<?php


namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function index()
    {
        if (Auth::check()) {
            return view('admin.index');
        }
        return view('auth.login');

    }
}
