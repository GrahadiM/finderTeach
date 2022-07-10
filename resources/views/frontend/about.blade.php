@extends('layouts.frontend.subindex')
@section('title', 'Tentang Kami')

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
                        <h5 class="text-primary text-uppercase mb-3" style="letter-spacing: 5px;">Tentang Kami</h5>
                        <h1>Inovatif Baru Untuk Belajar</h1>
                    </div>
                    <p>
                        ECOURSES adalah situs web pembelajaran online yang menyediakan layanan bimbingan belajar terbaik dan terbesar di Indonesia, yang akan membantu siswa dalam memecahkan masalah belajar.
                    </p><p>
                        Dengan adanya website bimbingan belajar online ECOURSES akan memudahkan Anda dalam memahami berbagai materi pelajaran dan dapat diakses kapan saja dan dimana saja. Hingga saat ini, 75% dari total siswa di Indonesia telah mempercayai ECOURSES sebagai solusi pembelajaran terbaik.
                    </p><p>
                        Berfokus pada peningkatan kualitas pendidikan Indonesia secara holistik, website bimbingan belajar online ini juga memiliki visi besar dalam memberikan layanan pendidikan dan materi pembelajaran dari guru-guru terbaik di Indonesia, yang mudah diakses oleh semua siswa dimanapun mereka berada dengan biaya yang terjangkau.
                    </p>
                    {{-- <a href="" class="btn btn-primary py-md-2 px-md-4 font-weight-semi-bold mt-2">Learn More</a> --}}
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

@endsection
