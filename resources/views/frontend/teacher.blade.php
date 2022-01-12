@extends('layouts.frontend.subindex')
@section('title', 'Teachers')

@section('content')

    <!-- Team Start -->
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <div class="text-center mb-5">
                <h5 class="text-primary text-uppercase mb-3" style="letter-spacing: 5px;">Teachers</h5>
                <h1>Meet Our Teachers</h1>
            </div>
            <div class="row">
                @foreach ($teachers as $teacher)
                    <div class="col-md-6 col-lg-3 text-center team mb-4">
                        <div class="team-item rounded overflow-hidden mb-2">
                            <div class="team-img position-relative">
                                <img class="img-fluid" src="{{ asset('images/avatar') }}/{{ $teacher->avatar }}" alt="">
                                <div class="team-social">
                                    <a class="btn btn-outline-light btn-square mx-1" href="{{ route('frontend.pesan', $teacher->id) }}"><i class="fas fa-address-card"></i></a>
                                    <a class="btn btn-outline-light btn-square mx-1" href="https://api.whatsapp.com/send?phone={{ $teacher->phone }}" target="_blank"><i class="fab fa-whatsapp"></i></a>
                                    {{-- <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-linkedin-in"></i></a> --}}
                                </div>
                            </div>
                            <a href="#" target="_blank" class="text-decoration-none" rel="noopener noreferrer">
                                <div class="bg-secondary p-4">
                                    <h5>{{ $teacher->name }}</h5>
                                    {{-- <p class="m-0">Web Designer</p> --}}
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Team End -->

@endsection