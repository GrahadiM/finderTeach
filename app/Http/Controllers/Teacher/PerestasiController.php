<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\RiwayatPrestasi;
use Illuminate\Support\Facades\Auth;

class PerestasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $key = RiwayatPrestasi::where('teacher_id', Auth::user()->id)->get();
        $user = User::where('role', 'teacher')->get();
        return view('teacher.prestasi.index', compact('key', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'prestasi' => 'required',
            'year' => 'required',
            'desc' => 'required',
        ]);
        RiwayatPrestasi::create([
            'teacher_id' => Auth::user()->id,
            'prestasi' => $request->prestasi,
            'year' => $request->year,
            'desc' => $request->desc,
        ]);
        return back()->with('success', 'Data di tambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'prestasi' => 'required',
            'year' => 'required',
            'desc' => 'required',
        ]);
        RiwayatPrestasi::findOrFail($id)->update([
            'teacher_id' => Auth::user()->id,
            'prestasi' => $request->prestasi,
            'year' => $request->year,
            'desc' => $request->desc,
        ]);
        return back()->with('success', 'Data di ubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        RiwayatPrestasi::findOrFail($id)->delete();
        return back()->with('success', 'Data di hapus!');
    }
}
