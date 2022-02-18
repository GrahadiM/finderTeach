@extends('layouts.frontend.subindex')
@section('title', 'Prestasi')

@section('content')

    <!-- Team Start -->
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <div class="text-center mb-5">
                <h5 class="text-primary text-uppercase mb-3" style="letter-spacing: 5px;">Daftar Prestasi</h5>
                <h1>Prestasi {{ $teacher->name }}</h1>
            </div>
            <div class="row align-items-center">
                @foreach ($key as $item)
                    <div class="col-lg-6">
                        <div class="text-left mb-4">
                            <h5 class="text-primary text-uppercase mb-3" style="letter-spacing: 5px;">{{ $item->prestasi }}</h5>
                            <h1>{{ $item->year }}</h1>
                        </div>
                        {{ $item->desc }}
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Team End -->

@endsection