<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sumsel;

class SumselController extends Controller
{
    public function index()
    {
        $sumsels = Sumsel::all();
        return view('populasi', compact('sumsels'));
    }

    public function Resto()
    {
        $sumsels = Sumsel::all();
        return view('jumlah_restoran', compact('sumsels'));
    }

    public function GDP()
    {
        $sumsels = Sumsel::all();
        return view('ekonomi', compact('sumsels'));
    }

    public function beragama_islam()
    {
        $sumsels = Sumsel::all();
        return view('beragama_islam', compact('sumsels'));
    }

    public function jumlah_kejahatan()
    {
        $sumsels = Sumsel::all();
        return view('jumlah_kejahatan', compact('sumsels'));
    }
}
