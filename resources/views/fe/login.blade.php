@extends('fe.index')
@section('main')
<main class="main">
    <div class="page-header">
        <div class="container d-flex flex-column align-items-center">
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="demo4.html">Home</a></li>
                        <li class="breadcrumb-item"><a href="category.html">Shop</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            My Account
                        </li>
                    </ol>
                </div>
            </nav>

            <h1>My Account</h1>
        </div>
    </div>

    <div class="container login-container">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="row justify-content-center">
                    <div class="col-md-9">
                        <div class="heading mb-1">
                            <h2 class="title text-center">Login</h2>
                        </div>

                        @if ($message = Session::get('success'))
                            <div class="alert alert-success" role="alert">
                                <strong>{{$message}}</strong>
                            </div>
                        @endif
                        @if ($message = Session::get('error'))
                            <div class="alert alert-danger" role="alert">
                                <strong>{{$message}}</strong>
                            </div>
                        @endif

                        <form action="" method="POST">
                            @csrf
                            <label for="login-email">
                                Email address
                                <span class="required">*</span>
                            </label>
                            <input type="email" name="email" class="form-input form-wide" id="login-email"  />

                            <label for="login-password">
                                Password
                                <span class="required">*</span>
                            </label>
                            <input type="password" name="password" class="form-input form-wide" id="login-password"  />

                            <div class="form-footer d-flex justify-content-between">
                                <div class="custom-control custom-checkbox mb-0">
                                    <input type="checkbox" class="custom-control-input" id="lost-password" />
                                    <label class="custom-control-label mb-0" for="lost-password">Remember
                                        me</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <a href="forgot-password.html"
                                        class="forget-password text-dark form-footer-right">Forgot
                                        Password?</a>
                                </div>
                                <div class="custom-control custom-checkbox mb-0">
                                    <p>Bạn chưa có tài khoản ?</p>
                                    Đăng ký <a class="text-primary" href="{{route('register')}}">tại đây</a>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-dark btn-md w-100">
                                LOGIN
                            </button>
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</main>
@endsection