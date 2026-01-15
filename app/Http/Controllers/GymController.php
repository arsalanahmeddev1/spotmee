<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GymController extends Controller
{
    public function Index() {
        return view('screens.admin.gyms.index');
    }
    public function create() {
        return view('screens.admin.gyms.create');
    }
}
