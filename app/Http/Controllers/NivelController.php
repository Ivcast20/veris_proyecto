<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NivelController extends Controller
{
    public function index()
    {
        return view('admin.niveles.index');
    }
}
