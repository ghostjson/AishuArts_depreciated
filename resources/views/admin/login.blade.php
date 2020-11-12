@extends('layouts.auth')
@section('contents')
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100 p-b-160 p-t-50">
            <form class="login100-form validate-form" action="../admin/doLogin" method="post">
                {{ csrf_field() }}
                <span class="login100-form-title p-b-43">
                    AishuArts Admin Login
                </span>
                <span style="color:white">
                    {{ $errors->first() }}
                    {{-- {{ $errors->first('password') }} --}}
                    {{-- @if($errors->any())
                    <h4>{{$errors->first()}}</h4>
                    @endif --}}
                    </span>
                <div class="wrap-input100 rs1 validate-input" data-validate = "Email is required">
                    <input class="input100" type="email" name="email" required>
                    <span class="label-input100">Email</span>
                </div>
                
                
                <div class="wrap-input100 rs2 validate-input" data-validate="Password is required">
                    <input class="input100" type="password" name="password" required>
                    <span class="label-input100">Password</span>
                </div>

                <div class="container-login100-form-btn">
                    <button class="login100-form-btn" type="submit">
                        Sign in
                    </button>
                </div>
                
                {{-- <div class="text-center w-full p-t-23">
                    <a href="#" class="txt1">
                        Forgot password?
                    </a>
                </div> --}}
            </form>
        </div>
    </div>
</div>
<!--===============================================================================================-->
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
@endsection