@extends('layouts.frontend.subindex')
@section('title', 'Order')

@section('content')

    <!-- Pesan Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="text-center mb-5">
                <h5 class="text-primary text-uppercase mb-3" style="letter-spacing: 5px;">Order</h5>
                <h1>Order Teacher</h1>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="contact-form bg-secondary rounded p-5">
                        <form action="{{ route('frontend.pesan.post') }}" novalidate="novalidate" method="post">
                            @csrf

                            <div class="control-group">
                                <input type="hidden" class="form-control border-0 p-4" id="teacher" name="teacher_id" value="{{ $teacher->id }}" placeholder="Your Teacher" required="required" />
                            </div>
                            <div class="control-group">
                                <input type="text" class="form-control border-0 p-4" id="message" name="message" placeholder="Your Message" required="required" />
                            </div>
                            <div class="text-center mt-3">
                                <button class="btn btn-primary py-3 px-5" type="submit">Send Message</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pesan End -->

@endsection