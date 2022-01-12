<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $key = Course::where('teacher_id', Auth::user()->id)->get();
        $category = Category::all();
        
        return view('teacher.course.index', compact('key', 'category'));
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
            'category_id' => 'required',
            'day' => ['required', 'string',],
            'time_start' => 'required',
            'time_end' => 'required',
            'price' => 'required',
        ]);
        Course::create([
            'teacher_id' => Auth::user()->id,
            'category_id' => $request->category_id,
            'day' => $request->day,
            'time_start' => $request->time_start,
            'time_end' => $request->time_end,
            'price' => $request->price,
            'status' => 'active',
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
            'category_id' => 'required',
            'day' => ['required', 'string',],
            'time_start' => 'required',
            'time_end' => 'required',
            'price' => 'required',
        ]);
        Course::findOrFail($id)->update([
            'category_id' => $request->category_id,
            'day' => $request->day,
            'time_start' => $request->time_start,
            'time_end' => $request->time_end,
            'price' => $request->price,
            'status' => 'active',
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
        Course::findOrFail($id)->delete();
        return back()->with('success', 'Data di hapus!');
    }
}
