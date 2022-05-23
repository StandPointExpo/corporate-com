<?php

namespace App\Http\Controllers\Admin;

use App\ContactPhone;
use Illuminate\Routing\Controller;

class AdminContactPhoneController extends Controller
{
    public function destroy(ContactPhone $phone)
    {
        $phone->delete();
        return back()->with('success', 200);
    }
}
