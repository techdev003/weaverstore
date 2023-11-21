
@extends('partials.layout')

@section('content')
@if(session()->has('success'))
    <div class="btn-primary bg-emerald-500 hover:bg-emerald-600 active:bg-emerald-700">
        {{ session()->get('success') }}
    </div>
@endif
<main class="p-5">
      <div class="container lg:w-2/3 xl:w-2/3 mx-auto">
        <div class="grid grid-cols-1 sm:grid-cols-5 items-start gap-6">
          <div class="col-span-3 bg-white p-4 rounded-lg shadow">
            <!-- Profile Details -->
            <form method="post" action="{{ route('profileudate')}}">
                 @csrf
            <div class="mb-6">
              <h2 class="text-xl mb-5">Your Profile</h2>
              <div class="mb-4">
                <input
                  placeholder="Your Name"
                  type="text"
                  name="name"
                  value="{{ $UserData ? $UserData->name : ''}}"
                  class="border-gray-300 focus:border-purple-500 focus:outline-none focus:ring-purple-500 rounded-md w-full"
                />
              </div>
              <div class="mb-4">
                <input
                  placeholder="Your Email"
                  type="email"
                  name="email"
                  value="{{ $UserData ? $UserData->email : ''}}"
                  class="border-gray-300 focus:border-purple-500 focus:outline-none focus:ring-purple-500 rounded-md w-full"
                />
              </div>
              <div class="mb-4">
                <input
                  placeholder="Your Phone"
                  type="text"
                  name="phone"
                  value="{{ $UserData ? $UserData->phone : ''}}"
                  class="border-gray-300 focus:border-purple-500 focus:outline-none focus:ring-purple-500 rounded-md w-full"
                />
              </div>
            </div>
            <!--/ Profile Details -->

            <!-- Billing Address -->
            <div class="mb-6">
              <h2 class="text-xl mb-5">Billing Address</h2>
              <div class="flex gap-3">
                <div class="mb-4 flex-1">
                  <input
                    placeholder="Address 1"
                    type="text"
                    name="Address"
                    value="{{  $profileData ? $profileData->Address: '' }}"
                    class="border-gray-300 focus:border-purple-500 focus:outline-none focus:ring-purple-500 rounded-md w-full"
                  />
                </div>
                <div class="mb-4 flex-1">
                  <input
                    placeholder="Address 2"
                    type="text"
                    name="address2"
                    value="{{  $profileData ? $profileData->address2: '' }}"
                    class="border-gray-300 focus:border-purple-500 focus:outline-none focus:ring-purple-500 rounded-md w-full"
                  />
                </div>
              </div>
              <div class="flex gap-3">
                <div class="mb-4 flex-1">
                  <input
                    placeholder="City"
                    type="text"
                    name="City"
                    value="{{  $profileData ? $profileData->City: '' }}"
                    class="border-gray-300 focus:border-purple-500 focus:outline-none focus:ring-purple-500 rounded-md w-full"
                  />
                </div>
                <div class="mb-4 flex-1">
                  <input
                    placeholder="State"
                    type="text"
                    name="state"
                    value="{{  $profileData ? $profileData->state: '' }}"
                    class="border-gray-300 focus:border-purple-500 focus:outline-none focus:ring-purple-500 rounded-md w-full"
                  />
                </div>
              </div>
              <div class="flex gap-3">
                <div class="mb-4 flex-1">
                  <select
                    placeholder="Country"
                    type="text"
                    name="country"
                    class="border-gray-300 focus:border-purple-500 focus:outline-none focus:ring-purple-500 rounded-md w-full"
                  >
         <option value="">Select Country</option>
                                        <option selected >United States</option>
                  </select>
                </div>
                
              
                <div class="mb-4 flex-1">
                  <input
                    placeholder="Zipcode"
                    type="text"
                    name="ZipCode"
                    value="{{  $profileData ? $profileData->ZipCode: '' }}"
                    class="border-gray-300 focus:border-purple-500 focus:outline-none focus:ring-purple-500 rounded-md w-full"
                  />
                </div>
              </div>
            </div>
            <!--/ Billing Address -->

            <!-- Shipping Address -->
            <div class="mb-6">
              <div class="flex items-center justify-between mb-5">
                <h2 class="text-xl">Shipping Address</h2>
                <div class="flex items-center">
                  <input
                    id="sameAsBillingAddress"
                    type="checkbox"
                    
                    class="mr-3 rounded border-gray-300 text-purple-500 focus:ring-purple-500"
                  />
                  <label for="sameAsBillingAddress">Same as Billing</label>
                </div>
              </div>
              <div class="flex gap-3">
                <div class="mb-4 flex-1">
                  <input
                    placeholder="Address 1"
                    type="text"
                    name="ship_address"
                    value="{{  $profileData ? $profileData->ship_address: '' }}"
                    class="border-gray-300 focus:border-purple-500 focus:outline-none focus:ring-purple-500 rounded-md w-full"
                  />
                </div>
                <div class="mb-4 flex-1">
                  <input
                    placeholder="Address 2"
                    type="text"
                    name="ship_address2"
                    value="{{  $profileData ? $profileData->ship_address2: '' }}"
                    class="border-gray-300 focus:border-purple-500 focus:outline-none focus:ring-purple-500 rounded-md w-full"
                  />
                </div>
              </div>
              <div class="flex gap-3">
                <div class="mb-4 flex-1">
                  <input
                    placeholder="City"
                    type="text"
                    name="ship_city"
                    value="{{  $profileData ? $profileData->ship_city: '' }}"
                    class="border-gray-300 focus:border-purple-500 focus:outline-none focus:ring-purple-500 rounded-md w-full"
                  />
                </div>
                <div class="mb-4 flex-1">
                  <input
                    placeholder="State"
                    type="text"
                    name="ship_state"
                    value="{{  $profileData ? $profileData->ship_state: '' }}"
                    class="border-gray-300 focus:border-purple-500 focus:outline-none focus:ring-purple-500 rounded-md w-full"
                  />
                </div>
              </div>
              <div class="flex gap-3">
                <div class="mb-4 flex-1">
                  <select
                    placeholder="Country"
                    type="text"
                    name="ship_country"
                    class="border-gray-300 focus:border-purple-500 focus:outline-none focus:ring-purple-500 rounded-md w-full"
                  >
                    <option value="">Select Country</option>
                                        <option selected>United States</option>
                  </select>
                </div>
                <div class="mb-4 flex-1">
                  <input
                    placeholder="Zipcode"
                    type="text"
                    name="ship_zipCode"
                    value="{{  $profileData ? $profileData->ship_zipCode: '' }}"
                    class="border-gray-300 focus:border-purple-500 focus:outline-none focus:ring-purple-500 rounded-md w-full"
                  />
                </div>
              </div>
            </div>
            <!--/ Shipping Address -->

            <button type="submit" class="btn-primary bg-emerald-500 hover:bg-emerald-600 active:bg-emerald-700 w-full">Update</button>
            </form>
          </div>

          <div class="col-span-2 bg-white p-4 rounded-lg shadow">
            <h2 class="text-xl mb-5">Your Account Password</h2>
                @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @elseif (session('error'))
                                <div class="alert alert-danger" role="alert">
                                    {{ session('error') }}
                                </div>
                            @endif
            <form action="{{ route('update-password') }}" method="POST">
                        @csrf
            <div class="mb-4">
              <input
                type="password"
                name="old_password"
                 id="currentPass"
                placeholder="Your Current password"
                class="border-gray-300 focus:border-purple-500 focus:outline-none focus:ring-purple-500 rounded-md w-full"
              />
               <i onclick="show('currentPass')" class="fas fa-eye-slash" id="display"></i>
              @error('old_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
            </div>
            <div class="mb-4">
              <input
                type="password"
                name="new_password"
                placeholder="New password"
                id="newPass"
                class="border-gray-300 focus:border-purple-500 focus:outline-none focus:ring-purple-500 rounded-md w-full"
              />
               <i onclick="show('newPass')" class="fas fa-eye-slash" id="display"></i>
              @error('new_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
            </div>
            <div class="mb-4">
              <input
                type="password"
                name="new_password_confirmation"
                 id="confirm_password"
                placeholder="Repeat new password"
                class="border-gray-300 focus:border-purple-500 focus:outline-none focus:ring-purple-500 rounded-md w-full"
              />
               <i onclick="show('confirm_password')" class="fas fa-eye-slash" id="display"></i>
            </div>
            <div>
              <button type="submit" class="btn-primary bg-emerald-500 hover:bg-emerald-600 active:bg-emerald-700">Update</button>
            </div>
          </div>
        </div>
      </div>
    </main>
  </body>
</html>
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


@endsection