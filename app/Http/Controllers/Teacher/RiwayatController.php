<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\RiwayatPendidikan;
use Illuminate\Support\Facades\Auth;

class RiwayatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $key = RiwayatPendidikan::where('teacher_id', Auth::user()->id)->get();
        $user = User::where('role', 'teacher')->get();
        return view('teacher.pendidikan.index', compact('key', 'user'));
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
            'pendidikan' => 'required',
            'year_start' => 'required',
            'year_end' => 'required',
        ]);
        RiwayatPendidikan::create([
            'teacher_id' => Auth::user()->id,
            'pendidikan' => $request->pendidikan,
            'year_start' => $request->year_start,
            'year_end' => $request->year_end,
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
            'pendidikan' => 'required',
            'year_start' => 'required',
            'year_end' => 'required',
        ]);
        RiwayatPendidikan::findOrFail($id)->update([
            'pendidikan' => $request->pendidikan,
            'year_start' => $request->year_start,
            'year_end' => $request->year_end,
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
        RiwayatPendidikan::findOrFail($id)->delete();
        return back()->with('success', 'Data di hapus!');
    }
}
