<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sumsel1;

class Sumsel1Controller extends Controller
{
    public function index()
    {
        $sumsels = Sumsel1::all();
        return view('jumlah_restoran', compact('sumsels'));
    }
}
