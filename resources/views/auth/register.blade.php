@extends('frontend.home_dashboard')

@section('title','News24 | User-Sign-up')

@section('home')

<div class="signup-form">
    <form method="POST" action="{{ route('register') }}">
        @csrf
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @elseif(session('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
    @endif

		<h2>Create an Account</h2>
		<p class="hint-text">Sign up with your social media account or email address</p>
		<div class="social-btn text-center">
			<a href="#" class="btn btn-primary btn-lg"><i class="fa fa-facebook"></i> Facebook</a>
			<a href="{{ url('/login/github') }}" class="btn btn-dark btn-lg"><i class="fa fa-github"></i> Github</a>
			<a href="#" class="btn btn-danger btn-lg"><i class="fa fa-google"></i> Google</a>
		</div>
		<div class="or-seperator"><b>or</b></div>
        <div class="form-group">
        	<input type="text" class="form-control input-lg" name="name" placeholder="name" required="required">
            
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>

        <div class="form-group">
        	<input type="text" class="form-control input-lg" name="username" placeholder="Username" required="required">

            @error('Username')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>
		<div class="form-group">
        	<input type="email" class="form-control input-lg" name="email" placeholder="Email Address" required="required">
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>
		<div class="form-group">
            <input type="password" class="form-control input-lg" name="password" placeholder="Password" required="required">
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>
		<div class="form-group">
            <input type="password" class="form-control input-lg" name="confirm_password" placeholder="Confirm Password" required="required">
        </div>  
		<div class="form-group">
          
				<p><label class="form-check-label"><input type="checkbox" required="required"> I accept the <a href="#">Terms of Use</a> &amp; <a href="#">Privacy Policy</a>.</label></p>

			
			
        </div>  
        <div class="form-group">
            <button type="submit" class="btn btn-success btn-lg btn-block signup-btn">Sign Up</button>
        </div>
        <div class="form-group">
          
           
            <p><label class="form-check-label"><input type="checkbox" required="required"> Remember Me</label></p>
            <div class="text-center">Already have an account? <a href="{{ url('login') }}">Login here</a></div>
        
    </div>  
    </form>

</div>
<style>
form {
	
	font-family: 'Roboto', sans-serif;
}
.form-control {
	font-size: 16px;
	transition: all 0.4s;
	box-shadow: none;
}
.form-control:focus {
	border-color: #5cb85c;
}
.form-control, .btn {
	border-radius: 50px;
	outline: none !important;
}
.signup-form {
	width: 480px;
	margin: 0 auto;
	padding: 30px 0;
}
.signup-form form {
	border-radius: 5px;
	margin-bottom: 20px;
	background: #fff;
	box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
	padding: 40px;
}
.signup-form a {
	color: #5cb85c;
}    
.signup-form h2 {
	text-align: center;
	font-size: 34px;
	margin: 10px 0 15px;
}
.signup-form .hint-text {
	color: #999;
	text-align: center;
	margin-bottom: 20px;
}
.signup-form .form-group {
	margin-bottom: 20px;
}
.signup-form .btn {        
	font-size: 18px;
	line-height: 26px;
	font-weight: bold;
	text-align: center;
}
.signup-btn {
	text-align: center;
	border-color: #5cb85c;
	transition: all 0.4s;
}
.signup-btn:hover {
	background: #5cb85c;
	opacity: 0.8;
}
.or-seperator {
	margin: 50px 0 15px;
	text-align: center;
	border-top: 1px solid #e0e0e0;
}
.or-seperator b {
	padding: 0 10px;
	width: 40px;
	height: 40px;
	font-size: 16px;
	text-align: center;
	line-height: 40px;
	background: #fff;
	display: inline-block;
	border: 1px solid #e0e0e0;
	border-radius: 50%;
	position: relative;
	top: -22px;
	z-index: 1;
}
.social-btn .btn {
	color: #fff;
	margin: 10px 0 0 10px;
	font-size: 14px;
	border-radius: 40px;
	font-weight: normal;
	border: none;
	transition: all 0.4s;
}	
.social-btn .btn:first-child {
	margin-left: 0;
}
.social-btn .btn:hover {
	opacity: 0.8;
}
.social-btn .btn-primary {
	background: #507cc0;
}
.social-btn .btn-info {
	background: #64ccf1;
}
.social-btn .btn-danger {
	background: #df4930;
}
.social-btn .btn i {
	float: left;
	margin: 3px 10px;
	font-size: 20px;
}

.invalid-feedback {
    display: block;
    color: #dc3545;
}

</style>

@endsection
