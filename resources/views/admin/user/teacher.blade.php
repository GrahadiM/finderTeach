@extends('layouts.dashboard.app')
@section('title','Data Guru')
@section('content_title','Data Guru')

@push('css')
    <!-- Custom styles for dataTables -->
    <link href="{{ asset('sb-admin-2') }}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endpush

@section('content')

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            {{-- <h6 class="m-0 font-weight-bold text-primary">Data Guru</h6> --}}
                            <a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#mediumModal"><i class="fas fa-user-plus fa-fw"></i> Tambah Data Guru</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>WhatsApp</th>
                                            <th>Password</th>
                                            <th>Status</th>
                                            <th>Tgl Regis</th>
                                            <th>Handle</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>WhatsApp</th>
                                            <th>Password</th>
                                            <th>Status</th>
                                            <th>Tgl Regis</th>
                                            <th>Handle</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($key as $data)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $data->name }}</td>
                                                <td>{{ $data->email }}</td>
                                                <td>
                                                    @if ($data->phone != null)
                                                        {{ $data->phone }}    
                                                    @else
                                                        Not Found!
                                                    @endif
                                                </td>
                                                <td><span class="badge badge-danger">DILINDUNGI</span></td>
                                                <td>
                                                    <a href="#" data-toggle='modal' data-target='#edit{{ $data->id }}' class="btn btn-sm @if ($data->status == 'active') btn-success @elseif($data->status == 'pending') btn-warning @else btn-danger @endif">{{ ucfirst($data->status) }}</a>
                                                    
                                                    <!-- form edit -->
                                                    <div class="modal fade" id="edit{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg" role="document">
                                                            <div class="modal-content col-lg-8 mx-auto">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="mediumModalLabel">Data</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="" method="post">
                                                                        
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
                                                                            <button type="submit" class="btn btn-primary">Update</button>
                                                                        </div>

                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>{{ \Carbon\Carbon::parse($data->create_at)->translatedFormat('l, j F Y') }}</td>
                                                <td>
                                                    <form action="{{ route('admin-teacher.destroy', $data->id) }}" method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                        {{-- <a href="{{ route('admin-teacher.edit', $data->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-pencil-alt fa-fw"></i></a> --}}
                                                        <a href="#" data-toggle='modal' data-target='#show{{ $data->id }}' class="btn btn-sm btn-info mb-1"><i class="fas fa-search"></i></a>
                                                        @if ($data->phone != null)
                                                        <a href="https://wa.me/{{ $data->phone }}" target="_blank" class="btn btn-sm btn-success mb-1"><i class="fab fa-whatsapp"></i></a>
                                                        @endif
                                                        {{-- <button type="submit" class="btn btn-sm btn-danger mb-1" onclick="return confirm('Apa anda ingin menghapus data ini?')"><i class="fas fa-trash"></i></button> --}}
                                                    </form>
                                                </td>
                                            </tr>
                                            
                                            <!-- form show -->
                                            <div class="modal fade" id="show{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content col-lg-8 mx-auto">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="mediumModalLabel">Create Data</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="" method="post">

                                                                <div class="form-group">
                                                                    <h5>Nama</h5>
                                                                    <div class="input-group">
                                                                        <input type="text" class="form-control" value="{{ $data->name }}" name="name" required>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <h5>Email</h5>
                                                                    <div class="input-group">
                                                                        <input type="email" class="form-control" value="{{ $data->email }}" name="email" required>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="form-group">
                                                                    <h5>Password</h5>
                                                                    <div class="input-group">
                                                                        <input type="password" class="form-control" value="{{ $data->password }}" name="password" required>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="form-group">
                                                                    <h5>Role</h5>
                                                                    <div class="input-group">
                                                                        <input type="text" class="form-control" value="{{ $data->role }}" name="role" required>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="form-group">
                                                                    <h5>Status</h5>
                                                                    <div class="input-group">
                                                                        <input type="text" class="form-control" value="{{ $data->status }}" name="status" required>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <h5>Whats App</h5>
                                                                    <div class="input-group">
                                                                        <input type="number" class="form-control" value="{{ $data->phone }}" name="phone" required>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <h5>Alamat</h5>
                                                                    <div class="input-group">
                                                                        <input type="text" class="form-control" value="{{ $data->address }}" name="address" required>
                                                                    </div>
                                                                </div>
                                                                
                                                                {{-- <div class="form-group">
                                                                    <h5>Foto</h5>
                                                                    <div class="input-group">
                                                                        <input type="text" class="form-control" value="{{ $data->avatar }}" name="avatar" required>
                                                                    </div>
                                                                </div> --}}

                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                                    {{-- <button type="submit" class="btn btn-primary" name="submit">Add</button> --}}
                                                                </div>

                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end form show -->

                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- form input -->
                    <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content col-lg-8 mx-auto">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="mediumModalLabel">Create Data</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('admin-teacher.store') }}" method="post">
                                        @csrf

                                        <div class="form-group">
						            		<h5>Nama</h5>
                                            <div class="input-group">
		            							<input type="text" class="form-control" placeholder="-- Input Data --" name="name" required>
                                            </div>
							            </div>

                                        <div class="form-group">
						            		<h5>Email</h5>
                                            <div class="input-group">
		            							<input type="email" class="form-control" placeholder="-- Input Data --" name="email" required>
                                            </div>
							            </div>
                                        
                                        <div class="form-group">
						            		<h5>Password</h5>
                                            <div class="input-group">
		            							<input type="password" class="form-control" placeholder="-- Input Data --" name="password" required>
                                            </div>
							            </div>
                                        
                                        <div class="form-group">
                                            <h5>Role</h5>
                                            <select class="form-control" name="role" required>
                                                <option value="" selected>-- Input Data --</option>
                                                {{-- <option value="admin">admin</option>
                                                <option value="teacher">teacher</option> --}}
                                                <option value="teacher">Teacher</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <h5>Status</h5>
                                            <select class="form-control" name="status" required>
                                                <option value="" selected>-- Input Data --</option>
                                                <option value="active">Active</option>
                                                <option value="non-active">Non-Active</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
						            		<h5>Whats App</h5>
                                            <div class="input-group">
		            							<input type="number" min="0" class="form-control" placeholder="-- Input Data --" name="phone" required>
                                            </div>
							            </div>

                                        <div class="form-group">
						            		<h5>Alamat</h5>
                                            <div class="input-group">
		            							<input type="text" class="form-control" placeholder="-- Input Data --" name="address" required>
                                            </div>
							            </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-primary">Add</button>
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