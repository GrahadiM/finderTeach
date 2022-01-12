@extends('layouts.frontend.subindex')
@section('title', 'About')

@section('content')

    <!-- About Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <img class="img-fluid rounded mb-4 mb-lg-0" src="{{ asset('frontend') }}/img/about.jpg" alt="">
                </div>
                <div class="col-lg-7">
                    <div class="text-left mb-4">
                        <h5 class="text-primary text-uppercase mb-3" style="letter-spacing: 5px;">About Us</h5>
                        <h1>Innovative Way To Learn</h1>
                    </div>
                    <p>
                        ECOURSES is an online learning website that provides the best and largest tutoring service in Indonesia, which will assist students in solving learning problems.
                    </p><p>
                        With the ECOURSES online tutoring website, it will be easier for you to understand a variety of subject matter and can be accessed anytime and anywhere. Until now, 75% of the total students in Indonesia have trusted ECOURSES as the best learning solution.
                    </p><p>
                        Focusing on improving the quality of Indonesian education holistically, this online tutoring website also has a big vision in providing educational services and learning materials from the best teachers in Indonesia, which are easily accessible to all students wherever they are at an affordable cost.
                    </p>
                    {{-- <a href="" class="btn btn-primary py-md-2 px-md-4 font-weight-semi-bold mt-2">Learn More</a> --}}
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

@endsection