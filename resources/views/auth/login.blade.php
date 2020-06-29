@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('api-login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" i class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button id="login" type="button" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
                                <a href="{{route('google.login')}}" class="btn btn-primary">Login with Google</a>
                                <a href="{{route('facebook.login')}}" class="btn btn-primary">Login with Facebook</a>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('script-plugin')

<script>
$( document ).ready(function() {
    //alert("fff");
    // $.ajaxSetup({
    //     headers: {
    //     'X-CSRF-TOKEN': "{{ csrf_token() }}"
    //     }
    // });
    $("#login").click(function(){
        $.ajax({
      type: 'POST',
      url: "{{route('api-login')}}",
      data: {email:$("#email").val(),password:$("#password").val()},
      dataType: "json",
      success: function(resultData) { 
          console.log(resultData);
          if(resultData.serverResponse.isSuccess==true){
        
        sessionStorage.setItem('token',resultData.result.access_token);
        sessionStorage.setItem('type',resultData.result.user_details.roles[0].role_type);
        sessionStorage.setItem('name',resultData.result.user_details.name);
        if(resultData.result.user_details.roles[0].role_type=='ADMIN'){
            window.location = "{{asset('home')}}";
        }else{
            window.location = "{{asset('user')}}";
        }
          }else{
             alert("Unauthenticated User");
          }
        
      }
        });
        //saveData.error(function(err) { console.log(err); });
    })

});
</script>
@endpush
