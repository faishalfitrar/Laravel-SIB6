<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kartu;

class KartuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
     // ini adalah controller kartu yang menggunakan eloquent ORM
    public function index()
    {
        // index menggunakan eloquent ORM
        $kartu = Kartu::all();
        return view ('admin.kartu.index', compact('kartu'));

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
        // menuliskan dengan karakteristik eluquent
        // $kartu adalah variabel, new adalah pendeklarasian kelas yang ada di model, Kartu adalah class dalam model
        $kartu = new Kartu;
        $kartu->kode = $request->kode;
        $kartu->nama = $request->nama;
        $kartu->diskon = $request->diskon;
        $kartu->iuran = $request->iuran;
        $kartu->save();
        return redirect('admin/kartu');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
