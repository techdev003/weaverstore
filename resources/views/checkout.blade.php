@extends('partials.layout')

@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.css" rel="stylesheet" />

<style>
    .grid.grid-flow-col li a {
        color: white;
    }

    .block.py-navbar-item.pl-5 {
        color: white;
    }

    .Checkout {
        text-align: center;
        padding-top: 48px;
    }
</style>

<div class="container">
    <h1 class="Checkout">Checkout</h1>
    <form role="form" action="{{route('orderplace.data')}}" method="post" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
        @csrf
        <input type="hidden" name="stripeToken" id="stripe_token" value="">
        <div class="row">
            <div class="col-md-8 mb-4">
                <div class="card" style="margin-top: 57px;">
                    <div class="card-header py-3">
                        <h5 class="mb-0">Billing Address</h5>
                    </div>
                    <div class="card-body">
                        <div class="needs-validation" novalidate="">
                            <div class="row">
                                <div class="col-md-6 mb-3 pl-5">
                                    <label for="firstName">First name</label>
                                    <input type="text" class="form-control" value="{{ old('first_name') }}" name="first_name" id="firstName" placeholder="" value="">
                                    <div class="invalid-feedback">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="lastName">Last name</label>
                                    <input type="text" class="form-control" name="last_name" id="lastName" placeholder="" value="">
                                    <div class="invalid-feedback">
                                        Valid last name is required.
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="email">Email <span class="text-muted">(Required)</span></label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com" value="">
                                <div class="invalid-feedback">
                                    Please enter a valid email address for shipping updates.
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="email">Phone <span class="text-muted">(Required)</span></label>
                                <input type="text" class="form-control" id="phone" name="phone_number" placeholder="" value="">
                                <div class="invalid-feedback">
                                    Please enter a valid phone for shipping updates.
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" id="address" name="address" placeholder="" value="">
                                <div class="invalid-feedback">
                                    Please enter your shipping address.
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
                                <input type="text" class="form-control" id="address2" name="address2" placeholder="" value="">
                            </div>
                            <div class="row">
                                <div class="col-md-5 mb-3">
                                    <label for="country">Country</label>
                                    <select class="form-control w-100" id="country" name="country">
                                        <option value="">Select Country</option>
                                        <option>United States</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Please select a valid country.
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="state">State</label>
                                    <select name="state" class="form-control w-100" id="state">
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
                                    <div class="invalid-feedback">
                                        Please provide a valid state.
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="zip">Zip</label>
                                    <input type="text" class="form-control" name="post_code" id="zip" placeholder="" required="" value="">
                                    <div class="invalid-feedback">
                                        Zip code required.
                                    </div>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label for="zip">City</label>
                                    <input type="text" class="form-control" name="City" id="city" placeholder="" required="" value="">
                                    <div class="invalid-feedback">
                                        City
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                
                   <div class="flex items-center">
                  <input
                    id="sameAsBillingAddress"
                    type="checkbox"
                    
                    class="mr-3 rounded border-gray-300 text-purple-500 focus:ring-purple-500"
                  />
                  <label for="sameAsBillingAddress">Same as Shipping</label>
                </div>

                <div class="card" style="margin-top: 57px;">
                    <div class="card-header py-3">
                        <h5 class="mb-0">Shipping Address</h5>
                    </div>
                    <div class="card-body">
                        <div class="needs-validation" novalidate="">
                            <div class="row">
                                <div class="col-md-6 mb-3 pl-5">
                                    <label for="firstName">First name</label>
                                    <input type="text" class="form-control" value="{{ old('ship_firstname') }}" name="ship_firstname" id="ship_firstName" placeholder="" value="">
                                    <div class="invalid-feedback">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="lastName">Last name</label>
                                    <input type="text" class="form-control" name="ship_lastname" id="ship_lastName" placeholder="" value="">
                                    <div class="invalid-feedback">
                                        Valid last name is required.
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="email">Email <span class="text-muted">(Required)</span></label>
                                <input type="email" class="form-control" id="ship_email" name="ship_email" placeholder="you@example.com" value="">
                                <div class="invalid-feedback">
                                    Please enter a valid email address for shipping updates.
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="email">Phone <span class="text-muted">(Required)</span></label>
                                <input type="text" class="form-control" id="ship_phone" name="ship_Phone" placeholder="" value="">
                                <div class="invalid-feedback">
                                    Please enter a valid phone for shipping updates.
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" id="ship_address" name="ship_address" placeholder="" value="">
                                <div class="invalid-feedback">
                                    Please enter your shipping address.
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
                                <input type="text" class="form-control" id="ship_address2" name="ship_address2" placeholder="" value="">
                            </div>
                            <div class="row">
                                <div class="col-md-5 mb-3">
                                    <label for="country">Country</label>
                                    <select class="form-control w-100" id="ship_country" name="ship_country">
                                               <option value="">Select Country</option>
                                        <option>United States</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Please select a valid country.
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="state">State</label>
                                    <select name="ship_state" class="form-control w-100" id="ship_state">
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
                                    <div class="invalid-feedback">
                                        Please provide a valid state.
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="zip">Zip</label>
                                    <input type="text" class="form-control" name="ship_zipCode" id="ship_zip" placeholder="" required="" value="">
                                    <div class="invalid-feedback">
                                        Zip code required.
                                    </div>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label for="zip">City</label>
                                    <input type="text" class="form-control" name="ship_city" id="ship_city" placeholder="" required="" value="">
                                    <div class="invalid-feedback">
                                        City
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" style="margin-top: 57px;">
                    <div class="card-header py-3">
                        <h5 class="mb-0">Your cart</h5>
                    </div>
                    @php $total = 0;
                     $tax = 0;
                     @endphp
                    @if(session('cart'))
                    @foreach(session('cart') as $id => $details)
                    @php $total += $details['price'] * $details['quantity'];
                    $tax =   $details['tax']; 
                    @endphp
                    @endforeach
                      @php
                      $taxrate = $tax/100;
                      
                      $totalrate = $total * $taxrate;
                      
                      $totalprice = $total+ $totalrate;
                        @endphp
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                Products:
                                <span>
                                    $ {{ number_format((float)$total, 2, '.', '') }} </span>
                            </li>
                            
                               <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                Tax:
                                <span>
                                    $ {{  number_format((float)$totalrate, 2, '.', '') }} </span>
                            </li>
                      
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                <div>
                                    <strong>Total amount</strong>
                                    <strong>
                                        <p class="mb-0">(including VAT)</p>
                                    </strong>
                                </div>
                                <span><strong>
                                        ${{ number_format((float)$totalprice, 2, '.', '') }} </strong></span>
                            </li>
                        </ul>
                    </div>
                </div>
                @endif
             
                <div class="payment mt-3">
                    <div class="card">
                        <div class="card-header py-2">
                            <h5 class="mb-0">Payment</h5>
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="custom-control custom-radio">
                                    <input id="cod" name="paymentMethod" type="radio" class="custom-control-input" value="Cash on" required="" checked="">
                                    <label class="custom-control-label" for="cod" checked="">Cash on
                                        Delivery</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input id="card" name="paymentMethod" type="radio" class="custom-control-input" value="card" required="" checked="">
                                    <label class="custom-control-label" for="card">Card</label>
                                </div>
                            </div>
                            <div class="row mb-3 card-details">
                                <div class="col-md-12">
                                    <label for="card-element">
                                        Credit or debit card
                                    </label>
                                    <div id="card-element">
                                        <!-- A Stripe Element will be inserted here. -->
                                    </div>
                                    <!-- <input type="hidden" name="stripe_token" id="stripe_token" value=""> -->
                                    <!-- Used to display Element errors. -->
                                    <div id="card-errors" role="alert"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3 card-details">
                        <div class="col-md-12">
                            <button type="submit" class="btn-primary w-full py-3 text-lg" id="cc-name" name="place_order">Place
                                Order</button>
                        </div>
                    </div>
                </div>
            </div>
    </form>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://js.stripe.com/v3/"></script>

<script>
    jQuery(document).ready(function() {
        const stripe = Stripe('pk_test_51O8ok1HcgXXFUfvBvxNWYq6UdNopMNJQJTFHqDscagjmsIqAz3H5zdHuTO5uoHbzMRpw9LK9tbDUQVtJoyiOkkMT001wCo3FjM');
        const elements = stripe.elements();

        // Custom styling can be passed to options when creating an Element.
        const style = {
            base: {
                // Add your base input styles here. For example:
                fontSize: '12px',
                color: '#32325d',
            },
        };

        // Create an instance of the card Element.
        const card = elements.create('card', {
            style
        });

        // Add an instance of the card Element into the `card-element` <div>.
        card.mount('#card-element');

        const form = document.getElementById('payment-form');
        form.addEventListener('submit', async (event) => {

            let paymentMethod = document.querySelector('input[name="paymentMethod"]:checked').value

            if (paymentMethod == 'card') {

                event.preventDefault();


                const {
                    token,
                    error
                } = await stripe.createToken(card);

                if (error) {
                    // Inform the customer that there was an error.
                    const errorElement = document.getElementById('card-errors');
                    errorElement.textContent = error.message;
                } else {
                    // Send the token to your server.
                    stripeTokenHandler(token);
                }
            }
        });

        const stripeTokenHandler = (token) => {
            // Insert the token ID into the form so it gets submitted to the server
            const form = document.getElementById('payment-form');
            const hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'stripeToken');
            hiddenInput.setAttribute('value', token.id);
            form.appendChild(hiddenInput);

            // Submit the form
            form.submit();
        }
        
        $("#sameAsBillingAddress").click(function(){
            var firstName = $("#firstName").val();
             var lastName = $("#lastName").val();
               var phone = $("#phone").val();
            var email = $("#email").val();
            var address = $("#address").val();
            var address2 = $("#address2").val();
            var country = $("#country").val();
            var state = $("#state").val();
            var zip = $("#zip").val();
            var city = $("#city").val();
              if($('#sameAsBillingAddress').prop('checked')){
              $("#ship_firstName").val(firstName);
              $("#ship_lastName").val(lastName);
               $("#ship_phone").val(phone);
               $("#ship_email").val(email);
               $("#ship_address").val(address);
               $("#ship_address2").val(address2);
               $("#ship_country").val(country);
              $("#ship_state").val(state);
                $("#ship_zip").val(zip);
              $("#ship_city").val(city);
              }else{
                $("#ship_firstName").val('');
              $("#ship_lastName").val('');
               $("#ship_phone").val('');
               $("#ship_email").val('');
               $("#ship_address").val('');
               $("#ship_address2").val('');
               $("#ship_country").val('');
              $("#ship_state").val('');
                $("#ship_zip").val('');
              $("#ship_city").val('');    
              }
             
           
          });
        
    })
</script>
@endsection