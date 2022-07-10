@extends('layouts.frontend.subindex')
@section('title', 'Kategori')

@section('content')

    <!-- Category Start -->
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <div class="text-center mb-5">
                <h5 class="text-primary text-uppercase mb-3" style="letter-spacing: 5px;">Daftar Kategori</h5>
                <h1>Pilih Kategori</h1>
            </div>
            <div class="row">
                @foreach ($categories as $category)
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="cat-item position-relative overflow-hidden rounded mb-2">
                        <img class="img-fluid" src="{{ asset('images/categories') }}/{{ $category->thumbnail }}" alt="thumbnail">
                        <a class="cat-overlay text-white text-decoration-none" href="{{ route('frontend.courseId', $category->id) }}">
                            <h4 class="text-white font-weight-medium">{{ $category->name }}</h4>
                            {{-- <span>
                                @foreach ($classrooms as $course)
                                    @if ($category->id == $course->categori_id)
                                        {{ $course->count() }} Courses
                                    @else
                                        0 Course
                                    @endif
                                @endforeach
                            </span> --}}
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="text-center mt-5">
                <a class="text-decoration-none" href="{{ route('frontend.category') }}">
                    <h5 class="text-primary text-uppercase mb-3" style="letter-spacing: 5px;">Lihat Semua</h5>
                </a>
            </div>
        </div>
    </div>
    <!-- Category End -->

@endsection
