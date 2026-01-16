<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GymController extends Controller
{
    public function Index() {
        $gyms = \App\Models\Gym::latest()->get();
        return view('screens.admin.gyms.index', compact('gyms'));
    }
    public function create() {
        return view('screens.admin.gyms.create');
    }
    public function edit() {
        return view('screens.admin.gyms.edit');
    }
}
