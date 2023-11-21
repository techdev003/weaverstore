
@extends('partials.layout')

@section('content')    
<link href="{{ asset('dist/output.css') }}" rel="stylesheet" />



<main class="p-5">
      <form
        action="{{ route('register') }}"
        method="post"
        class="w-[400px] mx-auto p-6 my-16"
      >
                    @csrf
        <h2 class="text-2xl font-semibold text-center mb-4">Create an account</h2>
       
        <div class="mb-4">
          <input
            placeholder="Your name"
            type="text"
            name="name"
            value="{{ old('name') }}"
            x-model="form.name"
            required autocomplete="name" autofocus
            class="border-gray-300 focus:outline-none  rounded-md w-full @error('name') is-invalid @enderror"
            :class="errors.name ? errorClasses : (form.name ? successClasses : defaultClasses)"
          />
          @error('name')
          <small x-show="errors.name" x-text="errors.name" class="text-red-600 invalid-feedback">{{ $message }}</small>
          @enderror
        </div>
        </p>
        <div class="mb-4">
          <input
            placeholder="Your Email"
            type="email"
            name="email"
            value="{{ old('email') }}" required autocomplete="email"
            class="border-gray-300 focus:outline-none  rounded-md w-full @error('email') is-invalid @enderror"
            :class="errors.email ? errorClasses : (form.email ? successClasses : defaultClasses)"
          />
          @error('email')
          <small x-show="errors.email" x-text="errors.email" class="text-red-600">{{ $message }}</small>
          @enderror
        </div>

        <div class="mb-4">
          <input
            placeholder="Your Phome"
            type="text"
            name="phone"
            value="{{ old('phone') }}"
            required autocomplete="phone" autofocus
            class="border-gray-300 focus:outline-none  rounded-md w-full @error('phone') is-invalid @enderror"
            :class="errors.name ? errorClasses : (form.name ? successClasses : defaultClasses)"
          />
          @error('phone')
          <small x-show="errors.phone" x-text="errors.phone" class="text-red-600 invalid-feedback">{{ $message }}</small>
          @enderror
        </div>

        <div class="mb-4">
          <input
            placeholder="Your Address"
            type="text"
            name="address"
            value="{{ old('address') }}"
            x-model="form.name"
            required autocomplete="address" autofocus
            class="border-gray-300 focus:outline-none  rounded-md w-full @error('address') is-invalid @enderror"
            :class="errors.name ? errorClasses : (form.name ? successClasses : defaultClasses)"
          />
          @error('address')
          <small x-show="errors.address" x-text="errors.address" class="text-red-600 invalid-feedback">{{ $message }}</small>
          @enderror
        </div>
        
           <div class="mb-4">
          <input
            placeholder="Your City"
            type="text"
            name="city"
            value="{{ old('city') }}"
            x-model="form.city"
            required autocomplete="city" autofocus
            class="border-gray-300 focus:outline-none  rounded-md w-full @error('city') is-invalid @enderror"
            :class="errors.city ? errorClasses : (form.city ? successClasses : defaultClasses)"
          />
          @error('city')
          <small x-show="errors.city" x-text="errors.city" class="text-red-600 invalid-feedback">{{ $message }}</small>
          @enderror
        </div>
        
           <div class="mb-4">
     
                  <select placeholder="Country" type="text" name="country" class="border-gray-300 focus:border-purple-500 focus:outline-none focus:ring-purple-500 rounded-md w-full">
         <option value="">Select Country</option>
                                        <option selected="">United States</option>
                  </select>
              
          @error('country')
          <small x-show="errors.country" x-text="errors.country" class="text-red-600 invalid-feedback">{{ $message }}</small>
          @enderror
        </div>
        
        
           <div class="mb-4">
              <select placeholder="state" type="text" name="state" class="border-gray-300 focus:border-purple-500 focus:outline-none focus:ring-purple-500 rounded-md w-full">
        
                                        <option value="">Please select State</option>
                                        <option value="AL">Alabama</option>
                                        <option value="AK">Alaska</option>
                                        <option value="AZ">Arizona</option>
                                        <option value="AR">Arkansas</option>
                                        <option value="CA">California</option>
                                        <option value="CO">Colorado</option>
                                        <option value="CT">Connecticut</option>
                                        <option value="DE">Delaware</option>
                                        <option value="DC">District of Columbia</option>
                                        <option value="FL">Florida</option>
                                        <option value="GA">Georgia</option>
                                        <option value="HI">Hawaii</option>
                                        <option value="ID">Idaho</option>
                                        <option value="IL">Illinois</option>
                                        <option value="IN">Indiana</option>
                                        <option value="IA">Iowa</option>
                                        <option value="KS">Kansas</option>
                                        <option value="KY">Kentucky</option>
                                        <option value="LA">Louisiana</option>
                                        <option value="ME">Maine</option>
                                        <option value="MD">Maryland</option>
                                        <option value="MA">Massachusetts</option>
                                        <option value="MI">Michigan</option>
                                        <option value="MN">Minnesota</option>
                                        <option value="MS">Mississippi</option>
                                        <option value="MO">Missouri</option>
                                        <option value="MT">Montana</option>
                                        <option value="NE">Nebraska</option>
                                        <option value="NV">Nevada</option>
                                        <option value="NH">New Hampshire</option>
                                        <option value="NJ">New Jersey</option>
                                        <option value="NM">New Mexico</option>
                                        <option value="NY">New York</option>
                                        <option value="NC">North Carolina</option>
                                        <option value="ND">North Dakota</option>
                                        <option value="OH">Ohio</option>
                                        <option value="OK">Oklahoma</option>
                                        <option value="OR">Oregon</option>
                                        <option value="PA">Pennsylvania</option>
                                        <option value="RI">Rhode Island</option>
                                        <option value="SC">South Carolina</option>
                                        <option value="SD">South Dakota</option>
                                        <option value="TN">Tennessee</option>
                                        <option value="TX">Texas</option>
                                        <option value="UT">Utah</option>
                                        <option value="VT">Vermont</option>
                                        <option value="VA">Virginia</option>
                                        <option value="WA">Washington</option>
                                        <option value="WV">West Virginia</option>
                                        <option value="WI">Wisconsin</option>
                                        <option value="WY">Wyoming</option>
                              
                  </select>
          @error('address')
          <small x-show="errors.country" x-text="errors.country" class="text-red-600 invalid-feedback">{{ $message }}</small>
          @enderror
        </div>
        
        
           <div class="mb-4">
          <input
            placeholder="Your Zip code"
            type="text"
            name="zip_code"
            value="{{ old('zip_code') }}"
            x-model="form.zip_code"
            required autocomplete="zip_code" autofocus
            class="border-gray-300 focus:outline-none  rounded-md w-full @error('zip_code') is-invalid @enderror"
            :class="errors.zip_code ? errorClasses : (form.zip_code ? successClasses : defaultClasses)"
          />
          @error('zip_code')
          <small x-show="errors.zip_code" x-text="errors.zip_code" class="text-red-600 invalid-feedback">{{ $message }}</small>
          @enderror
        </div>

        <div class="mb-4">
          <input
            placeholder="Password"
            type="password"
            name="password"
            id="newpassword"
            required autocomplete="new-password"
            class="border-gray-300 focus:outline-none  rounded-md w-full @error('password') is-invalid @enderror"
            :class="errors.password ? errorClasses : (form.password ? successClasses : defaultClasses)"
          />
          @error('password')
          <small x-show="errors.password" x-text="errors.password" class="text-red-600">{{ $message }}</small>
          @enderror
          <i onclick="show('newpassword')" class="fas fa-eye-slash" id="display"></i>
        </div>
        </div>

        <div class="mb-4">
          <input
            placeholder="Repeat Password"
            type="password"
            name="password_confirmation" required autocomplete="new-password"
            id="confirm_password"
           
            class="border-gray-300 focus:outline-none  rounded-md w-full"
            :class="errors.password_repeat ? errorClasses : (form.password_repeat ? successClasses : defaultClasses)"
          />
         
        <i onclick="show('confirm_password')" class="fas fa-eye-slash" id="display"></i>
        </div>
       
        <button
        type="submit"
          class="btn-primary bg-emerald-500 hover:bg-emerald-600 active:bg-emerald-700 w-full"
        >
          Sign up
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