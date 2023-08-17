<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;
class CategoryController extends Controller
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
        return view('category.index',[
            'categories'=>Category::paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.category');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
           '*'=>'required'
        ]);
        $photo = Auth::id().time().'.'.$request->file('category_photo')->getClientOriginalExtension();
        Image::make($request->file('category_photo'))->resize(600, 328)->save(base_path('public/uploads/category/'.$photo));
                
        Category::insert([
           'category_name'=>$request->category_name,
           'category_tag'=>$request->category_tag,
           'category_photo'=>$photo,
           'created_at'=>Carbon::now()
        ]);
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
      
      return view('category.edit',[
         'categori_edit'=>Category::find($id)
      ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
           '*'=>'required'
        ]);
      
        if($request->hasFile('category_photo')){
            unlink(base_path('public/uploads/category/'.Category::find($id)->category_photo));
            $photo = Auth::id().time().'.'.$request->file('category_photo')->getClientOriginalExtension();
            Image::make($request->file('category_photo'))->resize(600, 328)->save(base_path('public/uploads/category/'.$photo));

               Category::find($id)->update([
                 'category_photo' => $photo 
               ]);     
        }
        Category::find($id)->update([
            'category_name' => $request->category_name,
            'category_tag' => $request->category_tag,
            'status' => $request->status,
            'updated_at' => Carbon::now()
          ]);    
          return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category =  Category::find($id);
        unlink(base_path('public/uploads/category/'.$category->category_photo));
        $category->delete();
        return back();
    }
}
