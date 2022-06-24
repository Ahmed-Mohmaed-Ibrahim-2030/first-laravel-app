<?php

namespace App\Http\Controllers\apis;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
class productcontroller extends Controller
{
    //

public function index()
{
    $products = DB::table('products')
            ->select()
            ->get();
            return response()->json(['products'=>$products->all()],200);
        }
        public function edit($id)
        {
            $product = DB::table('products')->findOrFail($id);
            $brands =DB::table('brands')->select('id','name_en','name_ar')->orderBy('name_en')->get();
        $subcategories =DB::table('subcategories')->select('id','name_en','name_ar')->orderBy('name_en')->get();
            return response()->json(compact('product','brands','subcategories'),200);
        }
        public function create()
        {
            $brands =DB::table('brands')->select('id','name_en','name_ar')->orderBy('name_en')->get();
        $subcategories =DB::table('subcategories')->select('id','name_en','name_ar')->orderBy('name_en')->get();
        return response()->json(compact('brands','subcategories'),200);
        }
        public function store(Request $request)
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


                    return response()->json(
                        ['success'=>true,'message'=>'the product insert successfully'],200);

        }
        public function update(Request $request,$id)
        {

            $request->validate([
    'name_en'=>['required','max:20'],
    'name_ar'=>['required','max:20'],
    'code'=>['required','digits:5',"unique:products,code,{$id},id"],
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

            return response()->json(
                ['success'=>true,'message'=>'the product updated successfully'],200);


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

        return response()->json(
            ['success'=>true,'message'=>'the product deleted successfully'],200);
    }
        }