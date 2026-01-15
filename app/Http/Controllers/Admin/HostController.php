<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class HostController extends Controller
{
    public function index()
    {
        $hosts = User::role('host')->paginate(10);
        return view('screens.admin.hosts.index', compact('hosts'));
    }
}
