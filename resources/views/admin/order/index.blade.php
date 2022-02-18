@extends('layouts.dashboard.app')
@section('title','Data Riwayat Order')
@section('content_title','Data Riwayat Order')

@push('css')
    <!-- Custom styles for dataTables -->
    <link href="{{ asset('sb-admin-2') }}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endpush

@section('content')

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Riwayat Order</h6>
                            {{-- <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#create"><i class="fas fa-plus fa-fw"></i> Tambah Data Kategori</a> --}}
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama Guru</th>
                                            <th>Nama Murid</th>
                                            <th>Pesan</th>
                                            <th>Status</th>
                                            <th>Tgl Pemesanan</th>
                                            <th>Hubungi Murid</th>
                                            {{-- <th>Handle</th> --}}
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama Guru</th>
                                            <th>Nama Murid</th>
                                            <th>Pesan</th>
                                            <th>Status</th>
                                            <th>Tgl Pemesanan</th>
                                            <th>Hubungi Murid</th>
                                            {{-- <th>Handle</th> --}}
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($key as $data)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $data->course->teacher->name }}</td>
                                                <td>{{ $data->student->name }}</td>
                                                <td>{{ $data->message }}</td>
                                                <td>
                                                    <a href="" class="btn btn-sm @if ($data->status == 'active') btn-success @elseif($data->status == 'pending') btn-warning @else btn-danger @endif">{{ ucfirst($data->status) }}</a>
                                                </td>
                                                <td>{{ \Carbon\Carbon::parse($data->create_at)->translatedFormat('l, j F Y') }}</td>
                                                <td>
                                                    @if ($data->student->phone != null)
                                                    <a href="https://wa.me/{{ $data->student->phone }}" target="_blank" class="btn btn-sm btn-success mb-1"><i class="fab fa-whatsapp"></i></a>
                                                    @endif
                                                    {{-- <form action="{{ route('teacher-order.destroy', $data->id) }}" method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                        <a href="#" data-toggle='modal' data-target='#show{{ $data->id }}' class="btn btn-sm btn-info mb-1"><i class="fas fa-search"></i></a>
                                                        <a href="#" data-toggle='modal' data-target='#edit{{ $data->id }}' class="btn btn-primary btn-sm mb-1"><i class="fas fa-pencil-alt fa-fw"></i></i></a>
                                                        <button type="submit" class="btn btn-sm btn-danger mb-1" onclick="return confirm('Apa anda ingin menghapus data ini?')"><i class="fas fa-trash"></i></button>
                                                    </form> --}}
                                                </td>
                                            </tr>
                                            
                                            <!-- form edit -->
                                            <div class="modal fade" id="edit{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content col-lg-8 mx-auto">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="mediumModalLabel">Edit Data</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('teacher-order.update',$data->id) }}" method="post" enctype="multipart/form-data">
                                                                @method('PUT')
                                                                @csrf

                                                                <div class="form-group">
                                                                    <h5>Status</h5>
                                                                    <select class="form-control" name="status" required>
                                                                        <option value="{{ $data->status }}" selected>{{ $data->status }}</option>
                                                                        @if ($data->status == "active")
                                                                        <option value="non-active">non-active</option>
                                                                        @else
                                                                        <option value="active">active</option>
                                                                        @endif
                                                                    </select>
                                                                </div>
                                                                
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                                    <button type="submit" class="btn btn-primary" name="submit">Add</button>
                                                                </div>
                                                                
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end form edit -->

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


                                                                <div class="form-group">
                                                                    <h5>Status</h5>
                                                                    <select class="form-control" name="status" required>
                                                                        <option value="" selected>{{ $data->status }}</option>
                                                                    </select>
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

                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    
                    <!-- form input -->
                    <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content col-lg-8 mx-auto">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="mediumModalLabel">Create Data</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('teacher-order.store') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        
                                        <div class="form-group">
                                            <h5>Pesan</h5>
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="-- Input Data --" name="message" required>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-primary" name="submit">Add</button>
                                        </div>
                                        
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end form input -->
                    
@endsection

@push('js')
    <!-- Page level plugins -->
    <script src="{{ asset('sb-admin-2') }}/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('sb-admin-2') }}/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('sb-admin-2') }}/js/demo/datatables-demo.js"></script>

@endpush