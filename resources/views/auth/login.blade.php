
@extends('partials.layout')

@section('content')

<link href="{{ asset('dist/output.css') }}" rel="stylesheet" />



<main class="p-5">
          
      <form action="{{ route('login') }}" method="post" class="w-[400px] mx-auto p-6 my-16">
      @csrf
        <h2 class="text-2xl font-semibold text-center mb-5">
          Login to your account
        </h2>
        <p class="text-center text-gray-500 mb-6">
          or
          <a
            href="{{ route('register') }}"
            class="text-sm text-purple-700 hover:text-purple-600"
            >create new account</a
          >
        </p>
        <div class="mb-4">
          <input
            id="loginEmail"
            type="email"
            name="email"
            value="{{ old('email') }}"
            required autocomplete="email" autofocus
            placeholder="Your email address"
            class="border-gray-300 focus:border-purple-500 focus:outline-none focus:ring-purple-500 rounded-md w-full @error('email') is-invalid @enderror"
          />

        </div>
        @error('email')
         <span class="invalid-feedback" role="alert">
         <strong>{{ $message }}</strong>
           </span>
          @enderror
        <div class="mb-4">
          <input
            id="loginPassword"
            type="password"
            name="password"
            placeholder="Your password"
            required autocomplete="current-password"
            class="border-gray-300 focus:border-purple-500 focus:outline-none focus:ring-purple-500 rounded-md w-full @error('password') is-invalid @enderror"
          />

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
   <i onclick="show('loginPassword')" class="fas fa-eye-slash" id="display"></i>
        </div>

        <div class="flex justify-between items-center mb-5">
          <div class="flex items-center">
            <input
              id="loginRememberMe"
              type="checkbox"
              name="remember" 
              value="{{ old('remember') ? 'checked' : '' }}"
              class="mr-3 rounded border-gray-300 text-purple-500 focus:ring-purple-500"
            />
            <label for="loginRememberMe">Remember Me</label>
          </div>
          @if (Route::has('password.request'))
          <a href="{{ route('password.request') }}" class="text-sm text-purple-700 hover:text-purple-600">Forgot Password?</a>

          @endif
                                          
        </div>
        <button
        type="submit"
          class="btn-primary bg-emerald-500 hover:bg-emerald-600 active:bg-emerald-700 w-full"
        >
          Login
        </button>
      </form>
    </main>
    
    @endsection
    
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

<script>
    function show(a) {
       
  var x=document.getElementById(a);
  var c=x.nextElementSibling
  if (x.getAttribute('type') == "password") {
  c.removeAttribute("class");
  c.setAttribute("class","fas fa-eye");
  x.removeAttribute("type");
    x.setAttribute("type","text");
  } else {
  x.removeAttribute("type");
    x.setAttribute('type','password');
 c.removeAttribute("class");
  c.setAttribute("class","fas fa-eye-slash");
  }
}
</script>
