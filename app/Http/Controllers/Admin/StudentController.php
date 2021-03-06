<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $key = \App\Models\User::orderBy('name', 'asc')
        ->where('role', 'student')
        ->get();
        
        return view('admin.user.student', compact('key'));
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
        //
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
        // $this->validate($request, [
        //     'name' => 'required|string',        
        // ]);
        if ($request->status != null) {
            $attr['status'] = $request->status;
            // dd($attr);
            \App\Models\User::findOrFail($id)->update($attr);
        }
        if ($request->status == null) {
            $attr['name'] = $request->name;
            $attr['email'] = $request->email;
            $attr['phone'] = $request->phone;
            $attr['address'] = $request->address;
            // dd($attr);
            \App\Models\User::findOrFail($id)->update($attr);
        }
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
        \App\Models\User::findOrFail($id)->delete();
        return back()->with('success', 'Data di hapus!');
    }
}
