<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Thumbnail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Image;
class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return view('product.index',[
          'all_products'=>Product::where('vendor_id',auth()->id())->get()
       ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        return view('product.create',[
            'categories'=>Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $photo = Auth::id().time().'.'.$request->file('product_img')->getClientOriginalExtension();
        Image::make($request->file('product_img'))->resize(400, 400)->save(base_path('public/uploads/product/'.$photo));
 
        $product_id =  Product::insertGetId([
            'vendor_id'=>auth()->id(),
           'name'=>$request->name,
           'category_id'=>$request->category_id,
           'price'=>$request->price,
           'shor_desp'=>$request->shor_desp,
           'long_desp'=>$request->long_desp,
           'product_img'=>$photo,
           'slug'=>time().'-'.Str::slug($request->name).Str::random(5),
           'product_quantity'=>$request->product_quantity,
           'sku'=>auth()->id().time().'-'.Str::random(7),
           'created_at'=>Carbon::now()
       ]);

       
      foreach($request->file('thumbnail') as $thumb){
        $photo = $product_id.time().Str::random(4).'.'.$thumb->getClientOriginalExtension();
        Image::make($thumb)->resize(400, 400)->save(base_path('public/uploads/thumb/'.$photo));
           
        Thumbnail::insert([
          'product_id'=>$product_id,
          'thumbnail'=>$photo,
          'created_at'=>Carbon::now()
        ]);
          
      }
      return back();
      
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        unlink(public_path('uploads/product/'.$product->product_img));
        $product->delete();
        return back();
    }
    function thumLsit() {

      return view('product.thumbnail',[
        'thumbnails'=>Thumbnail::paginate(10)
      ]);
    }
    function del_thumb($id){
        $del_thumb = Thumbnail::find($id);
        unlink(base_path('public/uploads/thumb/'.$del_thumb->thumbnail));
        $del_thumb->delete();
        return back();
    }

    public function shop(){
        if(isset($_GET['min'])){
            $min = $_GET['min'];
            $max = $_GET['max'];
            $all_products = Product::whereBetween('price',[$_GET['min'],$_GET['max']])->get();
        }else{
            $min = "";
            $max = "";
            $all_products = Product::all();
        }
        return view('product.shop',compact('all_products','min','max'));
    }
   
}
