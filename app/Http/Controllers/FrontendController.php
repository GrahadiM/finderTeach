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
        // foreach ($classrooms as $item) {
        //     $awal  = $item->time_start;
        //     $akhir = $item->time_end;
        //     $diff  = $akhir - $awal;

        //     $jam   = floor($diff / (60 * 60));
        //     $menit = $diff - ( $jam * (60 * 60) );
        //     $detik = $diff % 60;

        //     $durasi = 'Waktu tinggal: ' . $jam .  ' jam, ' . floor( $menit / 60 ) . ' menit, ' . $detik . ' detik';
        //     dd($durasi);
        // }
        return view('frontend.course', compact('classrooms'));
    }

    public function courseId($id)
    {
        $classrooms = Course::where('category_id', $id)->orderBy('created_at', 'asc')->get();
        return view('frontend.courseId', compact('classrooms'));
    }

    public function courseTeacherId($id)
    {
        $classrooms = Course::where('teacher_id', $id)->orderBy('created_at', 'asc')->get();
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
        $course = Course::find($id);
        return view('frontend.pesan', compact('course'));
    }

    public function pesanpost(Request $request)
    {
        $request->validate([
            'course_id' => 'required',
            'message' => 'required',
            'bukti_tf' => 'nullable|image|mimes:jpg,png,jpeg|max:2000',
        ]);
        // dd($request->all());
        
        if($request->hasFile('bukti_tf')){
            // $bukti_tf = $this->uploadGambar($request->bukti_tf);
            $file = $request->file('bukti_tf');
            $filenameOri = $file->getClientOriginalName();
            // $bukti_tf = time() . "-" . $filenameOri;
            $bukti_tf = Auth::user()->id . "-" . $filenameOri;

            $file->move('images/bukti_tf', $bukti_tf);

            OrderClass::create([
                'course_id' => $request->course_id,
                'student_id' => Auth::user()->id,
                'bukti_tf' => $bukti_tf,
                'message' => $request->message,
                'status' => 'non_active',
            ]);
            return redirect()->route('student-dashboard.index')->with('success', 'Selamat, Orderan Anda Berhasil!');
        } else {
            return back()->with('error', 'Mohon maaf, Orderan Anda Gagal!!!');
        }
    }
}
