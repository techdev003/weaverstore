<?php $__env->startSection('content'); ?>
<?php if(session()->has('success')): ?>
    <div class="btn-primary bg-emerald-500 hover:bg-emerald-600 active:bg-emerald-700">
        <?php echo e(session()->get('success')); ?>

    </div>
<?php endif; ?>
<main class="p-5">
      <div class="container lg:w-2/3 xl:w-2/3 mx-auto">
        <div class="grid grid-cols-1 sm:grid-cols-5 items-start gap-6">
          <div class="col-span-3 bg-white p-4 rounded-lg shadow">
            <!-- Profile Details -->
            <form method="post" action="<?php echo e(route('profileudate')); ?>">
                 <?php echo csrf_field(); ?>
            <div class="mb-6">
              <h2 class="text-xl mb-5">Your Profile</h2>
              <div class="mb-4">
                <input
                  placeholder="Your Name"
                  type="text"
                  name="name"
                  value="<?php echo e($UserData ? $UserData->name : ''); ?>"
                  class="border-gray-300 focus:border-purple-500 focus:outline-none focus:ring-purple-500 rounded-md w-full"
                />
              </div>
              <div class="mb-4">
                <input
                  placeholder="Your Email"
                  type="email"
                  name="email"
                  value="<?php echo e($UserData ? $UserData->email : ''); ?>"
                  class="border-gray-300 focus:border-purple-500 focus:outline-none focus:ring-purple-500 rounded-md w-full"
                />
              </div>
              <div class="mb-4">
                <input
                  placeholder="Your Phone"
                  type="text"
                  name="phone"
                  value="<?php echo e($UserData ? $UserData->phone : ''); ?>"
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
                    value="<?php echo e($profileData ? $profileData->Address: ''); ?>"
                    class="border-gray-300 focus:border-purple-500 focus:outline-none focus:ring-purple-500 rounded-md w-full"
                  />
                </div>
                <div class="mb-4 flex-1">
                  <input
                    placeholder="Address 2"
                    type="text"
                    name="address2"
                    value="<?php echo e($profileData ? $profileData->address2: ''); ?>"
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
                    value="<?php echo e($profileData ? $profileData->City: ''); ?>"
                    class="border-gray-300 focus:border-purple-500 focus:outline-none focus:ring-purple-500 rounded-md w-full"
                  />
                </div>
                <div class="mb-4 flex-1">
                  <input
                    placeholder="State"
                    type="text"
                    name="state"
                    value="<?php echo e($profileData ? $profileData->state: ''); ?>"
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
                    value="<?php echo e($profileData ? $profileData->ZipCode: ''); ?>"
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
                    value="<?php echo e($profileData ? $profileData->ship_address: ''); ?>"
                    class="border-gray-300 focus:border-purple-500 focus:outline-none focus:ring-purple-500 rounded-md w-full"
                  />
                </div>
                <div class="mb-4 flex-1">
                  <input
                    placeholder="Address 2"
                    type="text"
                    name="ship_address2"
                    value="<?php echo e($profileData ? $profileData->ship_address2: ''); ?>"
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
                    value="<?php echo e($profileData ? $profileData->ship_city: ''); ?>"
                    class="border-gray-300 focus:border-purple-500 focus:outline-none focus:ring-purple-500 rounded-md w-full"
                  />
                </div>
                <div class="mb-4 flex-1">
                  <input
                    placeholder="State"
                    type="text"
                    name="ship_state"
                    value="<?php echo e($profileData ? $profileData->ship_state: ''); ?>"
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
                    value="<?php echo e($profileData ? $profileData->ship_zipCode: ''); ?>"
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
                <?php if(session('status')): ?>
                                <div class="alert alert-success" role="alert">
                                    <?php echo e(session('status')); ?>

                                </div>
                            <?php elseif(session('error')): ?>
                                <div class="alert alert-danger" role="alert">
                                    <?php echo e(session('error')); ?>

                                </div>
                            <?php endif; ?>
            <form action="<?php echo e(route('update-password')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
            <div class="mb-4">
              <input
                type="password"
                name="old_password"
                 id="currentPass"
                placeholder="Your Current password"
                class="border-gray-300 focus:border-purple-500 focus:outline-none focus:ring-purple-500 rounded-md w-full"
              />
               <i onclick="show('currentPass')" class="fas fa-eye-slash" id="display"></i>
              <?php $__errorArgs = ['old_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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
              <?php $__errorArgs = ['new_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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


<?php $__env->stopSection(); ?>
<?php echo $__env->make('partials.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u209708021/domains/weaverstore.net/public_html/resources/views/profile.blade.php ENDPATH**/ ?>