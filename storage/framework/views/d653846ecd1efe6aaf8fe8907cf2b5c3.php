<link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
	
<link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js">
  </script>
<script>    
    jQuery(document).ready(function($) {
        $('.wishlistItem').click(function(e) {
            e.preventDefault();
            var product_id = $(this).data('productid');
            var user_id = "<?php echo e(Auth::id()); ?>";
         
            var thisObj = $(this); 

           

            $.ajax({
                url: '/updateWishlist',
                type: 'post',
                data: {
                    _token: "<?php echo e(csrf_token()); ?>",
                    product_id: product_id,
                    user_id: user_id
                },
                success: function(resp) {
                    if (resp.action == 'add') {
                        toastr.success(resp.message, 'Added to Wishlist');

                        $('.activeAjax').fadeIn();
                        $('.activeAjax').text(resp.message);

                        setTimeout(function() {
                            thisObj.find('svg#wishlist-icon').addClass('wishlist-icon');

                            thisObj.addClass('response-success'); 
                        }, 300);
                    } else if (resp.action == 'remove') {
                        toastr.success(resp.message, 'Removed from Wishlist');

                        $('.activeAjax').fadeIn();

                        thisObj.find('svg#wishlist-icon').removeClass('wishlist-icon');

                        thisObj.removeClass('response-success'); 
                    }
                },
                error: function(xhr, status, error) {
                    console.error(error);
                    toastr.error('user login', 'Please user login');
                }
            });
        });
    });
</script>




<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.16/dist/sweetalert2.all.min.js"></script>

<script>
    $(document).ready(function() {
        // Function to handle AJAX actions with Toastr
        function handleAjaxWithToastr(options) {
            $.ajax({
                url: options.url,
                type: options.method || 'POST',
                data: {
                    _token: "<?php echo e(csrf_token()); ?>",
                    ...options.data,
                },
                success: function(response) {
                
                  if(response.error == 'Product is not available.'){
                        toastr.error(response.error || 'Product' || 'Error!');
                     }else{
                    toastr.success(options.successMessage || 'Action completed successfully.', options.successTitle || 'Success!');
                    // Reload the page after successful action
                    setTimeout(function() {
                        location.reload();
                    }, 1500); // You can adjust the delay as needed
                     }
                },
                error: function(xhr, status, error) {
                   toastr.error(options.errorMessage || 'An error occurred.', options.errorTitle || 'Error!');
                },
            });
        }

        // Handle the click event on the Clear All button


        // Handle the click event on the delete button


        // Handle the click event on the Add to Cart button
        $(".add-to-cart-btn").on("click", function(e) {
            e.preventDefault();

            var productId = $(this).data("productid");
            var productimage = $(this).data("productimage");
            var productname = $(this).data("productname");
            var productprice = $(this).data("productprice");

            // Use the global function to handle the AJAX request with Toastr
            handleAjaxWithToastr({
                url: "/add-to-cart/" + productId,
                successTitle: 'Product Added!',
                successMessage: 'Product added to cart.',
                errorTitle: 'Error!',
                errorMessage: 'An error occurred while adding the product to the cart.',
                productimage,
                productname,
                productprice
            });
        });


        $(".deleteCart").on("click", function(e) {
            e.preventDefault();

            var itemId = $(this).data("item-id");

            // Use the global function to handle the AJAX request with Toastr
            handleAjaxWithToastr({
                url: "<?php echo e(route('remove.from.cart')); ?>",
                method: 'DELETE',
                data: {
                    id: itemId,
                },
                successTitle: 'Deleted!',
                successMessage: 'The item has been deleted successfully.',
                errorTitle: 'Error!',
                errorMessage: 'An error occurred while deleting the item.',
            });
        });


        
        $(".deletewishlist").on("click", function(e) {
            e.preventDefault();

            var itemId = $(this).data("item-id");

            // Use the global function to handle the AJAX request with Toastr
            handleAjaxWithToastr({
                url: "<?php echo e(route('wishlist.delete')); ?>",
                method: 'POST',
                data: {
                    id: itemId,
                },
                successTitle: 'Deleted!',
                successMessage: 'The item has been deleted successfully.',
                errorTitle: 'Error!',
                errorMessage: 'An error occurred while deleting the item.',
            });
        });


        $(".add-to-cart-btn2").on("click", function(e) {
            e.preventDefault();
            var quantityInput = document.querySelector('[x-ref="quantityEl"]');
            var quantity_Value = quantityInput.value;
            var product_Id = $(this).data("productid");    
        $.ajax({
                url:  "<?php echo e(route('single.addto.cart')); ?>",
                type: 'POST',
                data: {
                    _token: "<?php echo e(csrf_token()); ?>",
                    quantityValue: quantity_Value,
                    productId: product_Id
                },
                success: function(response) {
                
                  if(response.error == 'Product is not available.'){
                        toastr.error(response.error || 'Product' || 'Error!');
                     }else{
                    toastr.success('Product added to cart.' || 'Action completed successfully.', 'Product Added!' || 'Success!');
                    // Reload the page after successful action
                    setTimeout(function() {
                        location.reload();
                    }, 1500); // You can adjust the delay as needed
                    
                     }
                },
                error: function(xhr, status, error) {
                   toastr.error('An error occurred while deleting the item.'|| 'An error occurred.', 'Error!' || 'Error!');
                },
            });
          
        });
    });
</script> 


<?php /**PATH /home/u209708021/domains/weaverstore.net/public_html/resources/views/partials/js.blade.php ENDPATH**/ ?>