@extends('layouts.dashboard.app')

@section('title','Update Profile')

@push('css')
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css">
@endpush

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <!-- Edit Profile -->
            <div class="col-md-8 mb-3">
                <div class="card">
                    <div class="card-header">
                        Update Profile
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('profile.update') }}">
                            @method('patch')
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nama') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name', $user->name) }}" autocomplete="name" autofocus>
                                </div>
                            </div>

                            {{-- <div class="form-group row">
                                <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Jenis Kelamin') }}</label>

                                <div class="col-md-6">
                                    <select class="select2-selection form-control theSelect" name="gender">
                                        @if ($user->gender == 'Pria')
                                        <option value="{{ old('gender', $user->gender) }}">{{ old('gender', $user->gender) }}</option>
                                        <option value="Wanita">Wanita</option>
                                        @elseif ($user->gender == 'Wanita')
                                        <option value="{{ old('gender', $user->gender) }}">{{ old('gender', $user->gender) }}</option>
                                        <option value="Pria">Pria</option>
                                        @else
                                        <option value="">-- Select One --</option>
                                        <option value="Pria">Pria</option>
                                        <option value="Wanita">Wanita</option>
                                        @endif
                                    </select>
                                </div>
                            </div> --}}

                            <div class="form-group row">
                                <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Telpon') }}</label>

                                <div class="col-md-6">
                                    <input id="phone" type="number" min="0" class="form-control" name="phone" value="{{ old('phone', $user->phone) }}" autocomplete="phone" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Alamat') }}</label>

                                <div class="col-md-6">
                                    <input id="address" type="text" class="form-control" name="address" value="{{ old('address', $user->address) }}" autocomplete="name" autofocus>
                                </div>
                            </div>

                            {{-- <div class="form-group row">
                                <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

                                <div class="col-md-6">
                                    <input id="username" type="text" class="form-control" name="username" value="{{ old('username', $user->username) }}" autocomplete="username">
                                </div>
                            </div> --}}

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email', $user->email) }}" autocomplete="email">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Update Profile
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
            <!-- Edit Photo Profile -->
            <div class="col-md-8 mb-3">
                <div class="card">
                    <div class="card-header">
                        Upload Photo Profile
                    </div>

                    <div class="card-body">
                        <form action="{{route('profile.upload')}}" method="POST" enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf
                            <div class="form-group row">
                                <label for="avatar" class="col-md-4 col-form-label text-md-right">Upload Image</label>
                                
                                <div class="col-md-6">
                                    <input type="file" name="avatar" id="avatar" class="form-control" autocomplete="avatar">
                                </div>
                            </div>
                            
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Upload Photo Profile
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Edit Password -->
            <div class="col-md-8 mb-3">
                <div class="card">
                    <div class="card-header">
                        Update Password
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('password.update') }}">
                            @method('patch')
                            @csrf

                            <div class="form-group row">
                                <label for="current_password" class="col-md-4 col-form-label text-md-right">{{ __('Current Password') }}</label>

                                <div class="col-md-6">
                                    <input id="current_password" type="password" class="form-control" name="current_password" required autocomplete="current_password">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Update Password
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>
    <script>
		$(".theSelect").select2();
	</script>
@endpush