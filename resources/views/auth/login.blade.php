@extends('frontend.home_dashboard')
@section('home')

<div class="login-form">
    <form method="POST" action="{{ route('login') }}">
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

        <h2 class="text-center">Sign in</h2>		
        <div class="text-center social-btn">
            <a href="#" class="btn btn-primary btn-block"><i class="fa fa-facebook"></i> Sign in with <b>Facebook</b></a>
            <a href="#" class="btn btn-info btn-block"><i class="fa fa-twitter"></i> Sign in with <b>Twitter</b></a>
			<a href="#" class="btn btn-danger btn-block"><i class="fa fa-google"></i> Sign in with <b>Google</b></a>
        </div>
		<div class="or-seperator"><i>or</i></div>
        <div class="form-group">
        	<div class="input-group">                
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <span class="fa fa-user"></span>
                    </span>                    
                </div>
                <input type="text" class="form-control" name="email" placeholder="email">
            </div>
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>
        
		<div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="fa fa-lock"></i>
                    </span>                    
                </div>
                <input type="password" class="form-control" name="password" placeholder="Password" required="required">
            </div>

            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>        
        <div class="form-group">
            <button type="submit" class="btn btn-success btn-block login-btn">Sign in</button>
        </div>
        <div class="clearfix">
            <label class="float-left form-check-label"><input type="checkbox"> Remember me</label>
            <a href="#" class="float-right text-success">Forgot Password?</a>
        </div>  
        
    </form>
    <div class="hint-text">Don't have an account? <a href="{{ url('register') }}" class="text-success">Register Now!</a></div>
</div>


<style>
    .login-form {
        width: 340px;
        margin: 30px auto;
          font-size: 15px;
    }
    .login-form form {
        margin-bottom: 15px;
        background: #f7f7f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
    .login-form h2 {
        margin: 0 0 15px;
    }
    .login-form .hint-text {
        color: #777;
        padding-bottom: 15px;
        text-align: center;
          font-size: 13px; 
    }
    .form-control, .btn {
        min-height: 38px;
        border-radius: 2px;
    }
    .login-btn {        
        font-size: 15px;
        font-weight: bold;
    }
    .or-seperator {
        margin: 20px 0 10px;
        text-align: center;
        border-top: 1px solid #ccc;
    }
    .or-seperator i {
        padding: 0 10px;
        background: #f7f7f7;
        position: relative;
        top: -11px;
        z-index: 1;
    }
    .social-btn .btn {
        margin: 10px 0;
        font-size: 15px;
        text-align: left; 
        line-height: 24px;       
    }
    .social-btn .btn i {
        float: left;
        margin: 4px 15px  0 5px;
        min-width: 15px;
    }
    .input-group-addon .fa{
        font-size: 18px;
    }

    .invalid-feedback {
    display: block;
    color: #dc3545;
}

    </style>
@endsection
