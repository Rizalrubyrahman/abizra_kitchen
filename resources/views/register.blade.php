@extends('layouts.app')
@section('title','Register')
@section('style')
    <style>
        #card-register{
            border: 1px solid #e0e0e0;
            border-radius: 3px !important;
            box-shadow: 0 0 10px 0 rgb(0 0 0 / 10%);
            padding: 24px 40px 32px;
            width: 400px;
            margin-top: 10px;
        }
        #title-register{
            text-align: center;
            margin: 0;
            font-weight: 600;
            font-size: 1.5714285714285714rem;
            color: rgba(0,0,0,0.7);
        }
        #back-home:hover{
            color: #64e074;
        }
        #back-home{
            color: black;
            text-decoration:none;
        }

    </style>
@endsection
@section('content')
    <div class="container">
        <div class="logo d-flex justify-content-center" style="margin-top: 20px;">
            <img src="{{ asset('images/logo/logo-01.png') }}" alt="Abizra Kitchen" width="350px" height="80px">
        </div>
        <div class="content d-flex justify-content-center">
            <div class="card" id="card-register">
                <div class="card-body">
                    <h2 id="title-register">Daftar Sekarang</h2>
                    <form action="{{ url('register') }}" method="post" style="margin-top: 30px;">
                        @csrf
                        <div class="form-group">
                            <label>Nama Lengkap <span class="required text-danger">*</span></label>
                            <input type="text" name="name" value="{{ old('name') }}" class="form-control {{$errors->has('name') ? 'is-invalid' : '' }}">
                            {!!$errors->first('name','<span class=" invalid-feedback">:message</span>' )!!}
                        </div>
                        <div class="form-group">
                            <label>Username <span class="required text-danger">*</span></label>
                            <input type="text" name="username" value="{{ old('username') }}" class="form-control {{$errors->has('username') ? 'is-invalid' : '' }}">
                            {!!$errors->first('username','<span class=" invalid-feedback">:message</span>' )!!}
                        </div>
                        <div class="form-group mt-2">
                            <label>Email <span class="required text-danger">*</span></label>
                            <input type="email" name="email" value="{{ old('email') }}" class="form-control {{$errors->has('email') ? 'is-invalid' : '' }}">
                            {!!$errors->first('email','<span class=" invalid-feedback">:message</span>' )!!}
                        </div>
                        <div class="form-group mt-2">
                            <label>Password <span class="required text-danger">*</span></label>

                            <input type="password" autocomplete="off" name="password" class="form-control {{$errors->has('password') ? 'is-invalid' : '' }}" value="{{ old('password') }}"
                                id="password">
                                {!!$errors->first('password','<span class=" invalid-feedback">:message</span>' )!!}
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" onclick="showPassword(this)"
                                    id="flexCheckDefault"> Tampilkan password
                            </div>

                        </div>
                        <div class="form-group" style="margin-top: 20px;">
                            <button class="btn btn-success" type="submit"
                                style="width: 100%;">Daftar</button>
                        </div>
                    </form>
                </div>

            </div>

        </div>
        <div class="d-flex justify-content-center">
            <div class="card" style="width: 400px; padding:0px; border:none;">
                <div class="card-body" style="padding:0px; padding-top:5px; border:none;">
                    <a href="{{ url('/') }}"id="back-home"><i class="fas fa-long-arrow-alt-left"></i> Kembali ke halaman home</a>
                </div>

            </div>
        </div>
    </div>
@endsection
