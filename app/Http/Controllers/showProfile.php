<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class showProfile extends Controller
{
    public function show()
    {
        return view('profile.show');
    }
}
