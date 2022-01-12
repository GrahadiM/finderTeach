<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use App\Models\OrderClass;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('name', 'asc')->paginate(8);
        $teachers = User::where('role', 'teacher')->orderBy('name', 'asc')->paginate(8);
        $classrooms = Course::orderBy('created_at', 'asc')->get();
        
        return view('frontend.index', compact('categories', 'classrooms', 'teachers'));
    }

    public function about()
    {
        return view('frontend.about');
    }

    public function category()
    {
        $categories = Category::orderBy('name', 'asc')->get();
        return view('frontend.category', compact('categories'));
    }

    public function course()
    {
        $classrooms = Course::orderBy('created_at', 'asc')->get();
        return view('frontend.course', compact('classrooms'));
    }

    public function courseId($id)
    {
        $classrooms = Course::where('category_id', $id)->orderBy('created_at', 'asc')->get();
        return view('frontend.courseId', compact('classrooms'));
    }

    public function teacher()
    {
        $teachers = User::where('role', 'teacher')->orderBy('name', 'asc')->get();
        return view('frontend.teacher', compact('teachers'));
    }

    public function teacherId($id)
    {
        $classrooms = Course::where('category_id', $id)->orderBy('created_at', 'asc')->get();
        $category = Category::where('id', $id)->get();
        $teachers = User::where('role', 'teacher')->orderBy('name', 'asc')->get();
        return view('frontend.teacherId', compact('teachers', 'classrooms', 'category'));
    }

    public function contact()
    {
        return view('frontend.contact');
    }

    public function pesan($id)
    {
        $teacher = User::find($id);
        return view('frontend.pesan', compact('teacher'));
    }

    public function pesanpost(Request $request)
    {
        $request->validate([
            'teacher_id' => 'required',
            'message' => ['required', 'string',],
        ]);
        OrderClass::create([
            'teacher_id' => $request->teacher_id,
            'student_id' => Auth::user()->id,
            'message' => $request->message,
            'status' => 'non_active',
        ]);
        return back()->with('success', 'Data di tambah!');
    }
}
