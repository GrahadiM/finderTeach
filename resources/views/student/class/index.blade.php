@extends('layouts.dashboard.app')
@section('title','Data Kelas')
@section('content_title','Data Kelas')

@push('css')
    <!-- Custom styles for dataTables -->
    <link href="{{ asset('sb-admin-2') }}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endpush

@section('content')

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Kelas</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Judul</th>
                                            <th>Nama Guru</th>
                                            {{-- <th>Materi File</th> --}}
                                            <th>Materi Gambar</th>
                                            <th>Materi Tertulis</th>
                                            <th>Tgl Upload</th>
                                            <th>Hubungi Guru</th>
                                            {{-- <th>Handle</th> --}}
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Judul</th>
                                            <th>Nama Guru</th>
                                            {{-- <th>Materi File</th> --}}
                                            <th>Materi Gambar</th>
                                            <th>Materi Tertulis</th>
                                            <th>Tgl Upload</th>
                                            <th>Hubungi Guru</th>
                                            {{-- <th>Handle</th> --}}
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($orders as $order)
                                            @foreach ($courses as $course)
                                                @if($course->id == $order->course->id)
                                                    @foreach ($key as $data)
                                                        @if($course->id == $data->course->id)
                                                            <tr>
                                                                <td>{{ $loop->iteration }}</td>
                                                                <td>{{ $data->course->name }}</td>
                                                                <td>{{ $data->course->teacher->name }}</td>
                                                                <td>
                                                                    <a href="{{ asset('images/materi_gambar/'.$data->materi_gambar) }}" target="_blank" rel="noopener noreferrer">
                                                                        <img src="{{ asset('images/materi_gambar/'.$data->materi_gambar) }}" alt="materi" width="100px">
                                                                    </a>
                                                                </td>
                                                                {{-- <td>{{ $data->materi_file }}</td>
                                                                <td>{{ $data->materi_video }}</td> --}}
                                                                <td>{{ $data->materi_text }}</td>
                                                                <td>{{ \Carbon\Carbon::parse($data->create_at)->translatedFormat('l, j F Y') }}</td>
                                                                <td>
                                                                    @if ($data->course->teacher->phone != null)
                                                                    <a href="https://wa.me/{{ $data->course->teacher->phone }}" target="_blank" class="btn btn-sm btn-success mb-1"><i class="fab fa-whatsapp"></i></a>
                                                                    @endif
                                                                    {{-- <a href="#" data-toggle='modal' data-target='#show{{ $data->id }}' class="btn btn-sm btn-info mb-1"><i class="fas fa-search"></i></a> --}}
                                                                </td>
                                                            </tr>

                                                            <!-- form view -->
                                                            <div class="modal fade" id="show{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog modal-lg" role="document">
                                                                    <div class="modal-content col-lg-8 mx-auto">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="mediumModalLabel">Show Data</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form action="" method="post" enctype="multipart/form-data">
                                                                                @csrf

                                                                                {{-- <div class="form-group">
                                                                                    <h5>Materi File</h5>
                                                                                    <div class="input-group">
                                                                                        <input type="file" class="form-control" placeholder="-- Input Data --" name="materi_file" value="{{ $data->materi_file }}" required>
                                                                                    </div>
                                                                                </div> --}}
                                                                                
                                                                                <div class="form-group">
                                                                                    <h5>Materi Gambar</h5>
                                                                                    <div class="input-group">
                                                                                        <input type="file" class="form-control" placeholder="-- Input Data --" name="materi_gambar" value="{{ $data->materi_gambar }}">
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <h5>Materi Text</h5>
                                                                                    <div class="input-group">
                                                                                        <input type="text" class="form-control" placeholder="-- Input Data --" name="materi_text" value="{{ $data->materi_text }}" required>
                                                                                    </div>
                                                                                </div>
                                                                                
                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                                                </div>
                                                                                
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- end form view -->

                                                        @endif
                                                    @endforeach
                                                @endif
                                            @endforeach
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    
@endsection

@push('js')
    <!-- Page level plugins -->
    <script src="{{ asset('sb-admin-2') }}/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('sb-admin-2') }}/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('sb-admin-2') }}/js/demo/datatables-demo.js"></script>
@endpush