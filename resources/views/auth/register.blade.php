@extends('layouts.app')
@section('content')
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
                            <li class="category3"><span>Đăng ký</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="customer-login-area">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-xs-12 col-md-offset-3">
                    <div class="customer-register my-account">
                        <form method="post" class="register" action="">
                            @csrf
                            <div class="form-fields">
                                <h2>Đăng ký</h2>
                                <p class="form-row form-row-wide">
                                    <label for="reg_email">Họ và tên <span class="required">*</span></label>
                                    <input type="text" class="input-text" name="name" value="">
                                    @if($errors->first('name'))
                                        <span class="text-danger">{{$errors->first('name')}}</span>
                                    @endif
                                </p>
                                <p class="form-row form-row-wide">
                                    <label for="reg_email">Email <span class="required">*</span></label>
                                    <input type="email" class="input-text" name="email" value="">
                                    @if($errors->first('email'))
                                        <span class="text-danger">{{$errors->first('email')}}</span>
                                    @endif
                                </p>
                                <p class="form-row form-row-wide">
                                    <label for="reg_password">Mật khẩu <span class="required">*</span></label>
                                    <input type="password" class="input-text" name="password">
                                    @if($errors->first('password'))
                                        <span class="text-danger">{{$errors->first('password')}}</span>
                                    @endif
                                </p>
                                <p class="form-row form-row-wide">
                                    <label for="reg_email">Số điện thoại <span class="required">*</span></label>
                                    <input type="number" class="input-text" name="phone">
                                    @if($errors->first('phone'))
                                        <span class="text-danger">{{$errors->first('phone')}}</span>
                                    @endif
                                </p>
                            </div>
                            <div class="form-action">
                                <div class="actions-log">
                                    <input type="submit" class="button" name="register" value="Đăng ký">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
