<?php

namespace App\Http\Controllers;

use App\Models\Tanaman;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('public.home');
    }

    public function mediaTanam()
    {
        $data = \App\Models\Media_tanam::all();

        return view('public.media-tanam', compact('data'));
    }

    public function sistemTanam()
    {
        $data = \App\Models\Sistem_tanam::all();

        return view('public.sistem-tanam', compact('data'));
    }
}
