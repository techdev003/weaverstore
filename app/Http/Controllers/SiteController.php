<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Wishlist;
use App\Models\OrderDetail;
use App\Models\OrderItem;
use App\Models\PaymentDetail;
use App\Models\UserInfo;
use App\Models\UserPayment;
use App\Models\UserLogin;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Stripe\Stripe;
use Stripe\Charge;

class SiteController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {



        $productData =  Product::all();
        return view('home', compact('productData'));
    }

    public function orderDetails($id)
    {
        $OrderItemData = OrderItem::where('order_id', $id)->get();

        $orderdetails = OrderDetail::where('id', $id)->first();
        return view('order-details', compact('orderdetails', 'OrderItemData'));
    }
    public function order()
    {

        $orderData = [];
        if (Auth()->user()) {
            $orderData = OrderDetail::orderBy('id', 'DESC')->where('user_id', Auth()->user()->id)->get();
        }
        return view('orders', compact('orderData'));
    }

    public function profile()
    {
              $profileData= [];
              $UserData = [];
            if (Auth()->user()) {
            $profileData = UserInfo::orderBy('id', 'DESC')->where('UserId', Auth()->user()->id)->first();
              $UserData = User::where('id', Auth()->user()->id)->first();
            
           }
        return view('profile', compact('profileData', 'UserData'));
        
    }
    
    
    
     public function profileudate(Request $request)
    {
                    if (Auth()->user()) {
                        
                      $data =   [
                            'Address'=>$request->Address,
                            'address2'=>$request->address2,
                            'City'=>$request->City,
                            'state'=>$request->state,
                            'country'=>$request->country,
                            'ZipCode'=>$request->ZipCode,
                            'ship_address'=>$request->ship_address,
                            'ship_address2'=>$request->ship_address2,
                            'ship_city'=>$request->ship_city,
                            'ship_country'=>$request->ship_country,
                            'ship_state'=>$request->ship_state,
                            'ship_zipCode'=>$request->ship_zipCode,
                        
                            
                            ];
          UserInfo::where('UserId', Auth()->user()->id)->update($data);
          
                      $data =   [
                            'name'=>$request->name,
                            'email'=>$request->email,
                            'phone'=>$request->phone,

                            ];
          
          User::where('id', Auth()->user()->id)->update($data);
                    }
         return redirect()->route('profile')->with('success', 'Update Profile Successfully.');  
    }


    public function checkout()
    {
        return view('checkout');
    }



    public function addToCart(Request $request, Product $product)
    {
        $cart = session()->get("cart", []);
       // echo "<pre>"; print_r($cart);
       $productData = Product::find($product->id);
       $check_qun = false;
       if (isset($cart[$product->id])) {
           if ($cart[$product->id]["quantity"] >= $productData->InventoryID) {
               $check_qun = true;
           }
       }
        if ($product->InventoryID == 0 || $check_qun) {
            return response()->json(["error" => "Product is not available."]);
        } else {
            $cart = session()->get("cart", []);
            if (!isset($cart[$product->id])) {
                $slug = $product->slug;
                $productimage =  $product->image;
                $productname =  $product->Prod_Name;
                $productprice =  $product->Price;

                $cart[$product->id] = [
                    "name" => $productname,
                    "image" => $productimage,
                    "slug" => $slug,
                    "price" => $productprice,
                    "quantity" => 1,
                     "tax" => 6.5,
                ];
            } else {
                $cart[$product->id]["quantity"]++;
            }

            session()->put("cart", $cart);

            $carts = session()->get("cart");
            // Return a response indicating success
            return response()->json(["success" => "Product added to cart."]);
        }
    }



    public function shopProduct($slug)
    {

        $shopProducts = Product::where("slug", "=", $slug)->get();
        $products = Product::get();

        $lataestProducts = Product::latest()
            ->limit(4)
            ->get();

        return view(
            "product",
            compact("shopProducts", "lataestProducts", "products")
        );
        return view('');
    }


    public function showCart()
    {
           $cart = session()->get("cart", []);
           if (Auth()->user()  && !empty( $cart)) {
        $cart = Session::get("cart", []);
        $products = Product::all();
        return view("cart", compact("cart", "products"));
        
           } elseif(!Auth()->user()  && empty( $cart)) {
                      $productData =  Product::all();
        return view('home', compact('productData'));
           }else{
            return redirect()->route('login')->with('error', 'Please login before order.');
        }
    }


    public function updateCart(Request $request)
    {


        $cart = Session::get("cart");
        $check_qun = false;
        $product_ids = [];
        foreach ($request->input("quantity") as $id => $quantity) {
            $productData = Product::find($id);
            if (isset($cart[$id])) {
                if ($cart[$id]["quantity"] > $productData->InventoryID ||  $productData->InventoryID  < $quantity) {
                    $check_qun = true;
                    $product_ids[] = $cart[$id];
                } else {
                    $cart[$id]["quantity"] = $quantity;
                }
            }
        }

        Session::put("cart", $cart);

        return redirect()
            ->back()
            ->with("success", "Cart updated successfully");
    }


    public function remove(Request $request)
    {
        if ($request->id) {
            $cart = session()->get("cart");

            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put("cart", $cart);

                // Return a response indicating success
                return response()->json([
                    "message" => "Product removed successfully",
                ]);
            }
        }

        // Return a response indicating failure
        return response()->json(["message" => "Product removal failed"], 400);
    }


    public function singleaddtocart(Request $request)
    {


        $quantityValue =   $request->quantityValue;
        $productId = $request->productId;
        $productData = Product::find($productId);

        $cart = session()->get("cart", []);
        $check_qun = false;
        if (isset($cart[$productId])) {
            if ($cart[$productId]["quantity"] >= $productData->InventoryID && $quantityValue > $productData->InventoryID) {
                $check_qun = true;
            }
        }
        if ($check_qun || $quantityValue > $productData->InventoryID) {
            return response()->json(["error" => "Product is not available."]);
        } else {

            if ($quantityValue != '') {
                $quantityValue = $quantityValue;
            } else {
                $quantityValue = 1;
            }
            $cart = session()->get("cart", []);
            if (!isset($cart[$productId])) {
                $slug = $productData->slug;
                $productimage =  $productData->image;
                $productname =  $productData->Prod_Name;
                $productprice =  $productData->Price;

                $cart[$productId] = [
                    "name" => $productname,
                    "image" => $productimage,
                    "slug" => $slug,
                    "price" => $productprice,
                    "quantity" => $quantityValue,
                     "tax" => 6.5,
                ];
            } else {
                $cart[$productId]["quantity"] = $cart[$productId]["quantity"]+$quantityValue;
            }

            session()->put("cart", $cart);
            // Return a response indicating success
            return response()->json(["success" => "Product added to cart."]);
        }
    }

    public function orderplace(Request $request)
    {


        if (Auth()->user()) {
            if ($_POST['paymentMethod']  == 'card') {



                $total = 0.00;
                 $tax = 0;
                foreach (session('cart') as $id => $cartItem) {
                    $total += $cartItem['price'] * $cartItem['quantity'];
                    $tax  = $cartItem['tax'];
                }
                $taxrate = $tax/100;
                      
                      $totalrate = $total * $taxrate;
                      
                      $totalPrice = $total+ $totalrate;
                \Stripe\Stripe::setApiKey(

                    'sk_test_51O8ok1HcgXXFUfvBPw22SItHWKPKK1PqFVq9KCP1NN13B58ksWCxJcBM583q9YZxTPNfV8XZc41PjapzhxxdQS3R00L3snTFxu'
                );

                $token =  $request->stripeToken;
                $customer = \Stripe\Customer::create([
                    'name' => Auth()->user()->name,
                    'source' => $token,
                    'email' => Auth()->user()->email,
                ]);

          // echo "<pre>"; print_r($customer);
                $charge = \Stripe\Charge::create([
                    'amount' => (int)$totalPrice * 100,
                    'currency' => 'usd',
                    'description' => 'This is a test mode',
                    'customer' => $customer['id'],

                ]);



      
                $chargeID = $charge->id;
                $card = $charge->payment_method_details->card;


                $order =   new OrderDetail();
                $order->user_id = Auth()->user()->id;
                $order->payment_id = $charge->id;
                $order->paymentType = $_POST['paymentMethod'];
                $order->status = $charge->status;
                $order->total = $totalPrice;
                $order->save();


                foreach (session('cart') as $id => $cartItem) {
                    $orderItems =  new OrderItem();
                    $orderItems->product_id = $id;
                    $orderItems->product_qty  = $cartItem['quantity'];
                    $orderItems->order_id  = $order->id;
                    $orderItems->save();

                    $product = Product::find($id);

                    $InventoryID_cal =  $product->InventoryID-$cartItem['quantity'];
                     $quantity_cal =  $product->quantity-$cartItem['quantity'];
                    $product->InventoryID = $InventoryID_cal; 
                    $product->quantity = $quantity_cal; 
                    $product->save();
                }


                $paymentDetails = new PaymentDetail();
                $paymentDetails->order_id = $order->id;
                $paymentDetails->amount = $totalPrice;
                $paymentDetails->status = $charge->status;
                $paymentDetails->save();


                $userPayment = new UserPayment();
                $userPayment->userId = Auth()->user()->id;
                $userPayment->paymentType = $_POST['paymentMethod'];
                $userPayment->exp = $card->exp_year;
                $userPayment->save();


                $userInfo = new UserInfo();
                $userInfo->UserId = Auth()->user()->id;
                $userInfo->FirstName = $request->first_name;
                $userInfo->email = $request->email;
                $userInfo->LastName = $request->last_name;
                $userInfo->Address = $request->address;
                $userInfo->address2 = $request->address2;
                $userInfo->City = $request->City;
                $userInfo->country = $request->country;

                $userInfo->state = $request->state;
                $userInfo->ZipCode = $request->post_code;
                $userInfo->Phone = $request->phone_number;


             
                $userInfo->ship_firstname = $request->ship_firstname;
                $userInfo->ship_lastname = $request->ship_lastname;
                $userInfo->ship_email = $request->ship_email;
                $userInfo->ship_address = $request->ship_address;
                $userInfo->ship_address2 = $request->ship_address2;
                $userInfo->ship_country = $request->ship_country;
                $userInfo->ship_city = $request->ship_city;
                $userInfo->ship_state = $request->ship_state;
                $userInfo->ship_zipCode = $request->ship_zipCode;
                $userInfo->ship_Phone = $request->ship_Phone;


                $userInfo->save();

                session()->put("cart", []);

                return redirect()->route('ordersuccess', $order->id)->with('success', 'Order placed successfully.');
            } else {

                $total = 0.00;
                 $tax = 0;
                foreach (session('cart') as $id => $cartItem) {
                    $total += $cartItem['price'] * $cartItem['quantity'];
                       $tax  = $cartItem['tax'];
                }
                
                    $taxrate = $tax/100;
                      
                      $totalrate = $total * $taxrate;
                      
                      $totalPrice = $total+ $totalrate;
             
                $order =   new OrderDetail();
                $order->user_id = Auth()->user()->id;
                $order->payment_id = 0;
                 $order->paymentType = $_POST['paymentMethod'];
                $order->status = 'success';
                $order->total = $totalPrice;
                $order->save();


                foreach (session('cart') as $id => $cartItem) {
                    $orderItems =  new OrderItem();
                    $orderItems->product_id = $id;
                    $orderItems->product_qty  = $cartItem['quantity'];
                    $orderItems->order_id  = $order->id;
                    $orderItems->save();


                    $product = Product::find($id);

                    $InventoryID_cal =  $product->InventoryID-$cartItem['quantity'];
                     $quantity_cal =  $product->quantity-$cartItem['quantity'];
                    $product->InventoryID = $InventoryID_cal; 
                     $product->quantity = $quantity_cal; 
                    $product->save();
                }


                $paymentDetails = new PaymentDetail();
                $paymentDetails->order_id = $order->id;
                $paymentDetails->amount = $totalPrice;
                $paymentDetails->status = "success";
                $paymentDetails->save();

                $userPayment = new UserPayment();
                $userPayment->userId = Auth()->user()->id;
                $userPayment->paymentType = $_POST['paymentMethod'];
                $userPayment->save();


                $userInfo = new UserInfo();
                $userInfo->UserId = Auth()->user()->id;
                $userInfo->FirstName = $request->first_name;
                $userInfo->email = $request->email;
                $userInfo->LastName = $request->last_name;
                $userInfo->Address = $request->address;
                $userInfo->address2 = $request->address2;
                $userInfo->City = $request->City;
                $userInfo->country = $request->country;

                $userInfo->state = $request->state;
                $userInfo->ZipCode = $request->post_code;
                $userInfo->Phone = $request->phone_number;

                $userInfo->ship_firstname = $request->ship_firstname;
                $userInfo->ship_lastname = $request->ship_lastname;
                $userInfo->ship_email = $request->ship_email;
                $userInfo->ship_address = $request->ship_address;
                $userInfo->ship_address2 = $request->ship_address2;
                $userInfo->ship_country = $request->ship_country;
                $userInfo->ship_city = $request->ship_city;
                $userInfo->ship_state = $request->ship_state;
                $userInfo->ship_zipCode = $request->ship_zipCode;
                $userInfo->ship_Phone = $request->ship_Phone;

                $userInfo->save();
                session()->put("cart", []);
                return redirect()->route('ordersuccess', $order->id)->with('success', 'Order placed successfully.');
            }
        } else {
            return redirect()->route('login')->with('error', 'Please login before order.');
        }
    }


    public function wishlist()
    {


        $wishlists =  Wishlist::with('product')->get();
        
       

        return view('wishlist', compact('wishlists'));
    }

    public function wishlistShow($product_id)
    {
        if (Auth::check()) {
            Wishlist::insert([
                'user_id' => Auth::id(),
                'product_id' => $product_id,
            ]);

            return redirect()->back()->with('success', 'Item added to wishlist');
        } else {
            return Redirect::route('login')->with('message', 'Please log in to add items to your wishlist.');
        }
    }

    public function removeWishlist(Request $request)
    {
        $id =   $request->id;

        $wishlistId = Wishlist::find($id);


        $wishlistId->delete();
        return redirect()->back()->with('success', 'User Delete  successfully!');
    }

    public function updateWishlist(Request $request) 
    {
        if ($request->ajax()) {
            $data = $request->all();

            $countWishlist = Wishlist::countWishlist($data['product_id']);

            $wishlist = new Wishlist;

            if ($countWishlist == 0) {
                $wishlist->product_id = $data['product_id'];
                $wishlist->user_id    = $data['user_id'];
                $wishlist->save();

                return response()->json(['action' => 'add']);
            } else {
                Wishlist::where(['user_id' => Auth::user()->id, 'product_id' => $data['product_id']])->delete();
                return response()->json(['action' => 'remove']);
            }
        }
    }


    public function count(Request $request)
    {
        $count = Wishlist::where('user_id', auth()->id())->count();

        return response()->json(['count' => $count]);
    }

    public function ordersuccess($orderId)
    {
        $order_data =  OrderDetail::find($orderId);
        $OrderItem =  OrderItem::where('order_id',$orderId)->get();
        $total_qty = 0;
        foreach($OrderItem as $quantity){
            
            $total_qty += $quantity->product_qty;
        }
        
       
        return view("paymentSuccess", compact("orderId", "order_data", "total_qty"));
    }
    
    public function updatePassword(Request $request)
{
        # Validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);


        #Match The Old Password
        if(!Hash::check($request->old_password, auth()->user()->password)){
            return back()->with("error", "Old Password Doesn't match!");
        }


        #Update the new Password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return back()->with("status", "Password changed successfully!");
}
}
