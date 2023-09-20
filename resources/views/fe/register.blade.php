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

        </div>
    </div>

    <div class="container login-container">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="row justify-content-center">
                    <div class="col-md-9">
                        <div class="heading mb-1">
                            <h2 class="title text-center">Register</h2>
                        </div>

                        @if ($message = Session::get('error'))
                            <div class="alert alert-danger" role="alert">
                                <strong>{{$message}}</strong>
                            </div>
                        @endif

                        <form action="" method="POST">
                            @csrf
                            {{--  --}}
                            <label for="login-email">
                                Full Name
                                <span class="required">*</span>
                            </label>
                            <input type="text" name="name" class="form-input form-wide" id="login-email" required />
                            {{--  --}}
                            <label for="login-email">
                                Email
                                <span class="required">*</span>
                            </label>
                            <input type="email" name="email" class="form-input form-wide" id="login-email" required />
                            {{--  --}}
                            <label for="login-password">
                                Password
                                <span class="required">*</span>
                            </label>
                            <input type="password" name="password" class="form-input form-wide" id="login-password" required />
                            {{--  --}}
                            <label for="login-password">
                                Confirm Password
                                <span class="required">*</span>
                            </label>
                            <input type="rPassword" name="password" class="form-input form-wide" id="login-password" required />
                            {{--  --}}
                            <div class="form-footer d-flex justify-content-center">
                                <div class="custom-control custom-checkbox mb-0">
                                    <h5>Bạn đã có tài khoản ?</h5>
                                    <p class="text-bold">Đăng nhập <a class="text-primary" href="{{route('login')}}">tại đây</a></p> 
                                </div>
                            </div>
                            <button type="submit" class="btn btn-dark btn-md w-100">
                                REGISTER
                            </button>
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</main>
@endsection