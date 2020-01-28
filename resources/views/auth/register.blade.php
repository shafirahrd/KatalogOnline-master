@extends('layouts.app')

@section('link')
<script src="{{asset('asset/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('pelanggan/assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('pelanggan/assets/js/bootstrap.js')}}"></script>
@endsection

@section('content')
<div id="page-wrapper">
    <div class="container-fluid"><br><br>
        <div class="row justify-content-center">
            <div class="col-sm-12">
                <div class="white-box">

                    <div id="modalMessage" class="modal fade" role="dialog">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Pesan</h4>
                          </div>
                          <div class="modal-body">
                                <span class="message-blue"><center>@if(!empty($message)) {{$message}} @endif{{Session::get('message')}}</center></span>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="card-header"><h1>{{ __('Register') }}</h1><hr></div><br><br>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="nama" class="col-md-4 col-form-label text-md-right">{{ __('Nama') }}</label>

                                <div class="col-md-6">
                                    <input placholder="Masukkan Nama" id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" required autocomplete="nama">

                                    @error('nama')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="nip" class="col-md-4 col-form-label text-md-right">{{ __('NIP') }}</label>

                                <div class="col-md-6">
                                    <input id="nip" type="text" class="form-control @error('nip') is-invalid @enderror" name="nip" value="{{ old('nip') }}" required autocomplete="nip" autofocus>

                                    @error('nip')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="lokasi" class="col-md-4 col-form-label text-md-right">{{ __('Lokasi Ruang Baca') }}</label>

                                <div class="col-md-6">
                                    <select class="md-form mdb-select colorful-select dropdown-primary" name="lokasi">
                                        <option value="" disabled selected>Lokasi Ruang Baca</option>
                                        @foreach($lokasi as $l)
                                            <option value="{{$l->id_lokasi}}">{{$l->departemen}}</option>
                                        @endforeach
                                    </select>

                                    @error('lokasi')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
@if(!empty(Session::get('message')) || !empty($message))
    <script>
        $(function() {
            $('#modalMessage').modal('show');
        });
    </script>
@endif
@endsection