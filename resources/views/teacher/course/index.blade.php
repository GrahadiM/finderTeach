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
                            {{-- <h6 class="m-0 font-weight-bold text-primary">Data Kelas</h6> --}}
                            <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#create"><i class="fas fa-plus fa-fw"></i> Tambah Data Kategori</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            {{-- <th>Nama Guru</th> --}}
                                            <th>Kategori</th>
                                            <th>Hari</th>
                                            <th>Jam Belajar</th>
                                            <th>Harga</th>
                                            {{-- <th>Status</th> --}}
                                            <th>Handle</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            {{-- <th>Nama Guru</th> --}}
                                            <th>Kategori</th>
                                            <th>Hari</th>
                                            <th>Jam Belajar</th>
                                            <th>Harga</th>
                                            {{-- <th>Status</th> --}}
                                            <th>Handle</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($key as $data)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                {{-- <td>{{ $data->teacher->name }}</td> --}}
                                                <td>{{ $data->category->name }}</td>
                                                <td>{{ $data->day }}</td>
                                                <td>{{ $data->time_start." - ".$data->time_end }}</td>
                                                <td>{{ "Rp.".$data->price }}</td>
                                                {{-- <td>
                                                    <a href="{{ route('teacher-course.edit', $data->id) }}" class="btn btn-sm @if ($data->status == 'active') btn-success @elseif($data->status == 'archive') btn-warning @else btn-danger @endif">{{ ucfirst($data->status) }}</a>
                                                </td> --}}
                                                <td>
                                                    <form action="{{ route('teacher-course.destroy', $data->id) }}" method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                        <a href="#" data-toggle='modal' data-target='#show{{ $data->id }}' class="btn btn-sm btn-info mb-1"><i class="fas fa-search"></i></a>
                                                        <a href="#" data-toggle='modal' data-target='#edit{{ $data->id }}' class="btn btn-primary btn-sm mb-1"><i class="fas fa-pencil-alt fa-fw"></i></i></a>
                                                        <button type="submit" class="btn btn-sm btn-danger mb-1" onclick="return confirm('Do you want to delete this data?')"><i class="fas fa-trash"></i></button>
                                                    </form>
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
                                                            <form action="{{ route('teacher-course.update',$data->id) }}" method="post" enctype="multipart/form-data">
                                                                @method('PUT')
                                                                @csrf

                                                                <div class="form-group">
                                                                    <h5>Kategory</h5>
                                                                    <select class="form-control" name="category_id" required>
                                                                        <option value="{{ $data->category->id }}" selected>{{ $data->category->name }}</option>
                                                                        @foreach ($category as $item)
                                                                        @if ($item->id != $data->category->id)
                                                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                                        @endif
                                                                        @endforeach
                                                                    </select>
                                                                </div>

                                                                <div class="form-group">
                                                                    <h5>Hari</h5>
                                                                    <div class="input-group">
                                                                        <input type="text" class="form-control" placeholder="-- Input Data --" name="day" value="{{ $data->day }}" required>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="form-group">
                                                                    <h5>Jam Mulai</h5>
                                                                    <div class="input-group">
                                                                        <input type="time" class="form-control" placeholder="-- Input Data --" name="time_start" value="{{ $data->time_start }}" required>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <h5>Jam Selesai</h5>
                                                                    <div class="input-group">
                                                                        <input type="time" class="form-control" placeholder="-- Input Data --" name="time_end" value="{{ $data->time_end }}" required>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="form-group">
                                                                    <h5>Harga</h5>
                                                                    <div class="input-group">
                                                                        <input type="number" min="0" class="form-control" placeholder="-- Input Data --" name="price" value="{{ $data->price }}" required>
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
                                                                    <h5>Kategori</h5>
                                                                    <div class="input-group">
                                                                        <input type="text" class="form-control" placeholder="-- Input Data --" name="category_id" value="{{ $data->category->name }}" required>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <h5>Hari</h5>
                                                                    <div class="input-group">
                                                                        <input type="text" class="form-control" placeholder="-- Input Data --" name="day" value="{{ $data->day }}" required>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="form-group">
                                                                    <h5>Jam</h5>
                                                                    <div class="input-group">
                                                                        <input type="text" class="form-control" placeholder="-- Input Data --" name="time_start" value="{{ $data->time_start." - ".$data->time_end }}" required>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="form-group">
                                                                    <h5>Harga</h5>
                                                                    <div class="input-group">
                                                                        <input type="number" min="0" class="form-control" placeholder="-- Input Data --" name="price" value="{{ $data->price }}" required>
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
                                    <form action="{{ route('teacher-course.store') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <h5>Kategory</h5>
                                            <select class="form-control" name="category_id" required>
                                                <option value="" aria-required="required" selected>-- Input Data --</option>
                                                @foreach ($category as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <h5>Hari</h5>
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="-- Input Data --" name="day" value="Sabtu, Minggu" required>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <h5>Jam Mulai</h5>
                                            <div class="input-group">
                                                <input type="time" class="form-control" placeholder="-- Input Data --" name="time_start" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <h5>Jam Selesai</h5>
                                            <div class="input-group">
                                                <input type="time" class="form-control" placeholder="-- Input Data --" name="time_end" required>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <h5>Harga</h5>
                                            <div class="input-group">
                                                <input type="number" min="0" class="form-control" placeholder="-- Input Data --" name="price" required>
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