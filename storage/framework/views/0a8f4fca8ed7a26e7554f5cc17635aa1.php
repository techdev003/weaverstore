<?php $__env->startSection('content'); ?>

<link href="<?php echo e(asset('dist/output.css')); ?>" rel="stylesheet" />



<main class="p-5">
          
      <form action="<?php echo e(route('login')); ?>" method="post" class="w-[400px] mx-auto p-6 my-16">
      <?php echo csrf_field(); ?>
        <h2 class="text-2xl font-semibold text-center mb-5">
          Login to your account
        </h2>
        <p class="text-center text-gray-500 mb-6">
          or
          <a
            href="<?php echo e(route('register')); ?>"
            class="text-sm text-purple-700 hover:text-purple-600"
            >create new account</a
          >
        </p>
        <div class="mb-4">
          <input
            id="loginEmail"
            type="email"
            name="email"
            value="<?php echo e(old('email')); ?>"
            required autocomplete="email" autofocus
            placeholder="Your email address"
            class="border-gray-300 focus:border-purple-500 focus:outline-none focus:ring-purple-500 rounded-md w-full <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
          />

        </div>
        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
         <span class="invalid-feedback" role="alert">
         <strong><?php echo e($message); ?></strong>
           </span>
          <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        <div class="mb-4">
          <input
            id="loginPassword"
            type="password"
            name="password"
            placeholder="Your password"
            required autocomplete="current-password"
            class="border-gray-300 focus:border-purple-500 focus:outline-none focus:ring-purple-500 rounded-md w-full <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
          />

                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="invalid-feedback" role="alert">
                        <strong><?php echo e($message); ?></strong>
                    </span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
   <i onclick="show('loginPassword')" class="fas fa-eye-slash" id="display"></i>
        </div>

        <div class="flex justify-between items-center mb-5">
          <div class="flex items-center">
            <input
              id="loginRememberMe"
              type="checkbox"
              name="remember" 
              value="<?php echo e(old('remember') ? 'checked' : ''); ?>"
              class="mr-3 rounded border-gray-300 text-purple-500 focus:ring-purple-500"
            />
            <label for="loginRememberMe">Remember Me</label>
          </div>
          <?php if(Route::has('password.request')): ?>
          <a href="<?php echo e(route('password.request')); ?>" class="text-sm text-purple-700 hover:text-purple-600">Forgot Password?</a>

          <?php endif; ?>
                                          
        </div>
        <button
        type="submit"
          class="btn-primary bg-emerald-500 hover:bg-emerald-600 active:bg-emerald-700 w-full"
        >
          Login
        </button>
      </form>
    </main>
    
    <?php $__env->stopSection(); ?>
    
    
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

<?php echo $__env->make('partials.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u209708021/domains/weaverstore.net/public_html/resources/views/auth/login.blade.php ENDPATH**/ ?>