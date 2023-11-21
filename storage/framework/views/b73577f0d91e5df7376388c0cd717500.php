<?php $__env->startSection('content'); ?>
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.css"
  rel="stylesheet"
/>

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
    <form  role="form" 
        action="<?php echo e(route('orderplace.data')); ?>" 
        method="post" 
        class="require-validation"
        data-cc-on-file="false"
        data-stripe-publishable-key="<?php echo e(env('STRIPE_KEY')); ?>"
        id="payment-form">
        <?php echo csrf_field(); ?>
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
                                    <input type="text" class="form-control" name="first_name" id="firstName" placeholder="" value="" >
                                    <div class="invalid-feedback">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="lastName">Last name</label>
                                    <input type="text" class="form-control" name="last_name" id="lastName" placeholder="" value="" >
                                    <div class="invalid-feedback">
                                        Valid last name is required.
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="email">Email <span class="text-muted">(Required)</span></label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com" value="" >
                                <div class="invalid-feedback">
                                    Please enter a valid email address for shipping updates.
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="email">Phone <span class="text-muted">(Required)</span></label>
                                <input type="text" class="form-control" id="phone" name="phone_number" placeholder="" value="" >
                                <div class="invalid-feedback">
                                    Please enter a valid phone for shipping updates.
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" id="address" name="address" placeholder="" value="" >
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
                                    <select class="form-control w-100" id="country" name="country" >
                                        <option value="">   </option>
                                        <option>United States</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Please select a valid country.
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="state">State</label>
                                    <select class="form-control w-100" id="state" name="city" >
                                        <option value=""> </option>
                                        <option>California</option>
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
                    <?php $total = 0 ?>
                    <?php if(session('cart')): ?>
                    <?php $__currentLoopData = session('cart'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $total += $details['price'] * $details['quantity'] ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                Products
                                <span>
                                $ <?php echo e($total); ?>   </span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                Shipping
                                <span>
                                $40   </span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                <div class="text-success">
                                    <h6 class="my-0">Promo code</h6>
                                    <small>EXAMPLECODE</small>
                                </div>
                                <span class="text-success">-$5.00</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                <div>
                                    <strong>Total amount</strong>
                                    <strong>
                                        <p class="mb-0">(including VAT)</p>
                                    </strong>
                                </div>
                                <span><strong>
                                $<?php echo e($total + 40-5); ?>                                               </strong></span>
                            </li>
                        </ul>
                    </div>
                </div>
                <?php endif; ?>
                <div class="redeem">
                    <div class="input-group mt-3">
                        <input type="text" class="form-control" name="promocode" value="EXAMPLECODE" placeholder="Promo code">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-secondary">Redeem</button>
                        </div>
                    </div>
                </div>
                <div class="payment mt-3">
                    <div class="card">
                        <div class="card-header py-2">
                            <h5 class="mb-0">Payment</h5>
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="custom-control custom-radio">
                                    <input id="cod" name="paymentMethod" type="radio" class="custom-control-input" value="cod" required="" checked="">
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
                        <button  type="submit" class="btn btn-primary d-block my-3" id="cc-name" name="place_order">Place
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
      jQuery(document).ready(function () {
            const stripe = Stripe('pk_test_51NdQruE2NoF9sTUC6TwZBmu6yXoeh653OujseKUWomwGxudp6aFiSVSqQgziXyOBcSkpBkPnALETZf1gQvFIJOVw00uF787B2N');
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
            const card = elements.create('card', { style });

            // Add an instance of the card Element into the `card-element` <div>.
            card.mount('#card-element');

            const form = document.getElementById('payment-form');
            form.addEventListener('submit', async (event) => {

                  let paymentMethod = document.querySelector('input[name="paymentMethod"]:checked').value

                  if (paymentMethod == 'card') {

                        event.preventDefault();


                        const { token, error } = await stripe.createToken(card);

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
      })

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('partials.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/akshay/ecommerceProject/resources/views/checkout.blade.php ENDPATH**/ ?>