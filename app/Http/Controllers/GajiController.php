<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gaji;
use Illuminate\Support\Facades\Crypt;

class GajiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gajis = Gaji::with('karyawan')->get()->map(function ($gaji) {
            $gaji->total_gaji = Crypt::decryptString($gaji->total_gaji);
            return $gaji;
        });

        return view('gaji.index', compact('gajis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $total = $request->gaji_pokok + $request->tunjangan - $request->potongan;

        Gaji::create([
            'karyawan_id' => $request->karyawan_id,
            'gaji_pokok' => $request->gaji_pokok,
            'tunjangan' => $request->tunjangan,
            'potongan' => $request->potongan,
            'total_gaji' => Crypt::encryptString($total),
        ]);

        return redirect()->route('gaji.index')->with('success', 'Data gaji berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $gaji = Gaji::with('karyawan')->findOrFail($id);
        $gaji->total_gaji = Crypt::decryptString($gaji->total_gaji);

        return view('gaji.show', compact('gaji'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
