<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnggotaDewanController extends Controller
{
    public function index()
    {
        return view('anggotaDewan.dashboard');
    }
}
