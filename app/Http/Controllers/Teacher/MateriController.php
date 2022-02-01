<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Materi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MateriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $key = Materi::all();
        return view('teacher.materi.index', compact('key'));
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
            'course_id' => 'required',
            'materi_gambar' => 'nullable|image|mimes:jpg,png,jpeg|max:2000',
            'materi_text' => 'required',
        ]);
        // dd($request->all());
        if($request->hasFile('materi_gambar')){
            // $materi_gambar = $this->uploadGambar($request->materi_gambar);
            $file = $request->file('materi_gambar');
            $filenameOri = $file->getClientOriginalName();
            // $materi_gambar = time() . "-" . $filenameOri;
            $materi_gambar = Auth::user()->id . "-" . $filenameOri;

            $file->move('images/materi_gambar', $materi_gambar);

            Materi::create([
                'course_id' => $request->course_id,
                'materi_gambar' => $materi_gambar,
                'materi_text' => $request->materi_text,
            ]);

            return back()->with('success', 'Data di tambah!');
        } else {
            return back()->with('error', 'Mohon maaf, Gagal menambahkan data!!!');
        }
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
            'materi_gambar' => 'nullable|image|mimes:jpg,png,jpeg|max:2000',
            'materi_text' => 'required',
        ]);
        // dd($request->all());
        if($request->hasFile('materi_gambar')){
            // $materi_gambar = $this->uploadGambar($request->materi_gambar);
            $file = $request->file('materi_gambar');
            $filenameOri = $file->getClientOriginalName();
            // $materi_gambar = time() . "-" . $filenameOri;
            $materi_gambar = Auth::user()->id . "-" . $filenameOri;

            $file->move('images/materi_gambar', $materi_gambar);

            Materi::find($id)->update([
                'materi_gambar' => $materi_gambar,
                'materi_text' => $request->materi_text,
            ]);

            return back()->with('success', 'Data di ubah!');
        } else {
            Materi::find($id)->update([
                'materi_text' => $request->materi_text,
            ]);
            return back()->with('success', 'Data di ubah!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
