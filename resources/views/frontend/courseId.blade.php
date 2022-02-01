@extends('layouts.frontend.subindex')
@section('title', 'Courses')

@section('content')

    <!-- Courses Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="text-center mb-5">
                <h5 class="text-primary text-uppercase mb-3" style="letter-spacing: 5px;">Courses</h5>
                <h1>Our Popular Courses</h1>
            </div>
            <div class="row">
                @foreach ($classrooms as $item)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="rounded overflow-hidden mb-2">
                            <img class="img-fluid" src="{{ asset('frontend') }}/img/course-5.jpg" alt="">
                            <div class="bg-secondary p-4">
                                <div class="d-flex justify-content-between mb-3">
                                    <small class="m-0"><i class="fa fa-user text-primary mr-2"></i>{{ $item->teacher->name }}</small>
                                    <small class="m-0"><i class="far fa-clock text-primary mr-2"></i>{{ $item->time_end."-".$item->time_start }}</small>
                                </div>
                                <a class="h5" href="{{ route('frontend.pesan', $item->id) }}">{{ $item->name }}</a>
                                <div class="border-top mt-4 pt-4">
                                    <div class="d-flex justify-content-between">
                                        {{-- <h6 class="m-0"><i class="fa fa-star text-primary mr-2"></i>4.5 <small>(250)</small></h6> --}}
                                        <h6 class="m-0">Harga</h6>
                                        <h6 class="m-0">{{ __('Rp.').number_format($item->price,2,',','.') }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Courses End -->

@endsection