@extends('layouts.app')
@section('content')
    <!-- breadcrumbs area start -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="container-inner">
                        <ul>
                            <li class="home">
                                <a href="/">Trang chủ</a>
                                <span><i class="fa fa-angle-right"></i></span>
                            </li>
                            <li class="category3"><span>Lấy lại mật khẩu</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumbs area end -->
    <div class="main-contact-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST">
                                @csrf
                                <div class="form-group row">
                                    <label for="password"
                                           class="col-md-4 col-form-label text-md-right">Mật khẩu mới</label>
                                    <div class="col-md-6">
                                        <input type="password" class="form-control" name="password" value="">
                                        @if($errors->has('password'))
                                            <span class="error-text">
                                                {{$errors->first('password')}}
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password-confirm"
                                           class="col-md-4 col-form-label text-md-right">Xác nhận mật khẩu</label>
                                    <div class="col-md-6">
                                        <input type="password" class="form-control" name="password_confirm" value="">
                                        @if($errors->has('password_confirm'))
                                            <span class="error-text">
                                                {{$errors->first('password_confirm')}}
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            Lưu thay đổi
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
