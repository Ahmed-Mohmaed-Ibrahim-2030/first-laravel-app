<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
class allproductscontroller extends Controller
{
    //

    public function allproducts()
    {
        $products = DB::table('products')
            ->select()
            ->get();
        return view('dashboard\products\allproducts',['products'=>$products]);
    }
    public function createProduct()
    {
        # code...
        $brands = DB::table('brands')
        ->select('id','name_en')
        ->get();
        $subs = DB::table('subcategories')
        ->select('id','name_en')
        ->get();

        return view('dashboard\products\create',['brands'=>$brands,'subs'=>$subs]);
    }
    public function create(Request $request)
    {

        $request->validate([
'name_en'=>['required','max:20'],
'name_ar'=>['required','max:20'],
'code'=>['required','digits:5','unique:products,code'],
'price'=>['required','numeric','between:1,99999'],
'quantity'=>['nullable','integer'],
'description_en'=>['required'],
'descerption_ar'=>['required'],
'brand_id'=>['required','integer','exists:brands,id'],
'subcategory_id'=>['required','integer','exists:subcategories,id'],
'image'=>['required','max:1000','mimes:png,jpg,jpeg']
]
);
$productIamge=uniqid().''.$request->file('image')->extension();
        $request->file('image')->move(public_path('assets\images\products'),$productIamge);
        $data=$request->except('_token','image');
        $data['image']=$productIamge;
        DB::table('products')->insert($data);


        return redirect()->route('allproducts')->with('success','Data inserted successfuly');

    }
    public function edit($id){
        $subcategories = DB::table('subcategories')->select('id','name_en')->orderBy('name_en')->get();
        $brands = DB::table('brands')->select('id','name_en')->orderBy('name_en')->get();
        $product = DB::table('products')->where('id',$id)->first();
        if(is_null($product)){
            abort(404);
        }
$product=DB::table('products')->find($id);
return  view('dashboard\products\edit',compact('subcategories','brands','product'));
    }
    public function update(Request $request,$id)
    {

        $request->validate([
'name_en'=>['required','max:20'],
'name_ar'=>['required','max:20'],
'code'=>['required','digits:5',"unique:products,code,$id,id"],
'price'=>['required','numeric','between:1,99999'],
'quantity'=>['nullable','integer'],
'description_en'=>['required'],
'descerption_ar'=>['required'],
'brand_id'=>['nullable','integer','exists:brands,id'],
'subcategory_id'=>['required','integer','exists:subcategories,id'],
'image'=>['nullable','max:1000','mimes:png,jpg,jpeg']
]
);

$productIamge=uniqid().''.$request->file('image')->extension();
        $request->file('image')->move(public_path('assets\images\products'),$productIamge);
        $data=$request->except('_token','image');
        $data['image']=$productIamge;
        DB::table('products')->where('id',$id)->update($data);


        return redirect()->route('allproducts')->with('success','Data updated successfuly');

    }
    public function delete($id)
    {
        $product = DB::table('products')->find($id);
        if(is_null($product)){
            abort(404);
        }
        //remove image
        $removedPhotoPath = public_path("assets\images\products\\{$product->image}");
     File::delete($removedPhotoPath);

        DB::table('products')->where('id',$id)->delete();
        return redirect()->route('allproducts')->with('success','Product Deleted Successfully');
    }
}
