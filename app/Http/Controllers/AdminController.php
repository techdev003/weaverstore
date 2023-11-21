<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Str;
use App\Models\OrderDetail;
use App\Models\OrderItem;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

     function generateSlug($string) {
        return Str::slug($string);
    }


    public function index()
    {
        $allorder =  OrderDetail::count();
         $OrderDetail =  OrderDetail::all();
          $Product =  Product::all();
         $totalsale = 0.00;
          $totalquatity = 0;
         if(!empty($OrderDetail)){
           foreach($OrderDetail as $value){
            $totalsale += $value->total;
           }  
         }
         
             if(!empty($Product)){
           foreach($Product as $value){
            $totalquatity += $value->quantity;
           }  
         }
      
 
        return view('admin/dashboard', compact('allorder', 'totalsale', 'totalquatity'));
    }

    public function productList()
    {
        $productData =  Product::all();
        
        return view('admin/productTable', compact('productData'));
    }
    public function addProduct()
    {
        return view('admin/addProduct');
    }
    public function productInsert(Request $request)
    {

      
        $validatedData = $request->validate([
            'Prod_Name' => 'required',
            'InventoryID' => 'required',
            'Price' => 'required',
            'quantity' =>  'required',
            'Description' => 'required',
            'image' => 'image | required', // Adjust validation rules as needed

        ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $imageName);
            $validatedData['image'] = $imageName;
        }


     
        $validatedData['slug'] = $this->generateSlug($validatedData['Prod_Name']);

    
        // Insert data into the database
        Product::create($validatedData); 
        return redirect()->route('productlist')->with('success', 'Data inserted successfully');

    }

    public function productEdit(Product $product)
{
    return view('admin/editProduct', compact('product'));
}


    public function productDelete(Product $product)
    {
        $product->delete();
        return redirect()->route('productlist')->with('success', 'Product deleted successfully');
    }
    

    public function productUpdate(Request $request, Product $product)
    {
        // Validate the incoming data
        
    
        $validatedData = $request->validate([
            'Prod_Name' => 'required',
            'InventoryID' => 'required',
            'Price' => 'required',
             'quantity' =>  'required',
            'Description' => 'required',
        ]);

        // Handle image upload and storage if a new image is provided
        if ($request->hasFile('image')) {
            $newImage = $request->file('image');
            $newImageName = time() . '.' . $newImage->getClientOriginalExtension();
            $newImage->move(public_path('uploads'), $newImageName);
            $validatedData['image'] = $newImageName;
        }
          
        

        // Update the product with the new data
        $product->update($validatedData);

        return redirect()->route('productlist')->with('success', 'Product updated successfully');
    }
    
    
       public function allOrder()
    {
         $allOrder = OrderDetail::orderBy('id', 'DESC')->get();
         return view('admin/allOrder', compact('allOrder'));
    
    }
    
       public function orderDetails($id)
    {
        $OrderItemData = OrderItem::where('order_id', $id)->get();

        $orderdetails = OrderDetail::where('id', $id)->first();
        return view('admin/orderdetails', compact('orderdetails', 'OrderItemData'));
    }
    

}
