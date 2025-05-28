<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kontak;

class KontakController extends Controller
{
    public function index()
    {
        return view('kontak.index');
    }

public function kirim(Request $request)
{
    $request->validate([
        'nama' => 'required|string|max:255',
        'email' => 'required|email',
        'subjek' => 'required',
        'pesan' => 'required|string',
    ]);

    Kontak::create($request->all());

    return redirect()->route('kontak.index')->with('success', 'Pesan Anda telah dikirim!');
}
}
