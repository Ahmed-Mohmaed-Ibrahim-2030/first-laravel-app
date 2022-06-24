@extends('dashboard.layoutParent.app')
@section('title','Create Product')
@section('content')
<form action="{{route('store')}}" class="mx-5 py-5" method="post" enctype="multipart/form-data">
    @csrf
<div class="row mb-3 ">
    <div class="form-group col-6 ">
    {{-- <label>Name_en</label> --}}
    <input type="text" name="name_en" class="form-control py-4" placeholder="Enter Product  Name" value="{{old('name_en')}}">
  </div>

    <div class="form-group col-6 ">
    {{-- <label>Name_ar</label> --}}
    <input type="text" name="name_ar" class="form-control py-4 text-right" placeholder="ادخل اسم المنتج" value="{{old('name_ar')}}">
</div>
</div>
<div class="row my-4">


    <div class="form--group col-4">

        {{-- <span class="input-group-text h-75">$</span> --}}


      <input type="text" name="price" value="{{old('price')}}" class="form-control " placeholder="Enter Price">

  </div>
    <div class="form--group col-4">

        {{-- <span class="input-group-text h-75">$</span> --}}


      <input type="text" name="code" value="{{old('code')}}" class="form-control " placeholder="Enter code">

  </div>
    <div class="form--group col-4">

        {{-- <span class="input-group-text h-75">$</span> --}}


      <input type="text" name="quantity" value="{{old('quantity')}}" class="form-control " placeholder="Enter Quqntity">

  </div>

</div>






  <div class="row mb-4">
    <div class="col-4">
      <!-- select -->
      <div class="form-group">
        <label>status</label>
        <select name="status" class="custom-select">
          <option value="1" {{old('status')=='1'?"selected":""}}>Active</option>
          <option value='0'{{old('status')=='0'?"selected":""}}>Not Active</option>

        </select>
      </div></div>

    <div class="col-4">
      <!-- select -->
      <div class="form-group">
        <label>SubCategory</label>
        <select name="subcategory_id" class="custom-select">
            @foreach ($subs as $sub)
            <option value={{$sub->id}}>{{$sub->name_en}}</option>
        @endforeach

        </select>
      </div></div>
    {{-- <div class="col-4">
      <!-- select -->
      <div class="form-group">
        <label>Category</label>
        <select class="custom-select">
            @foreach ($cats as $cat)
            <option value="{{$cat->id}}">{{$cat->name_en}}</option>
        @endforeach

        </select>
      </div></div> --}}
    <div class="col-4">
      <!-- select -->
      <div class="form-group">
        <label>Brand </label>
        <select  name="brand_id" class="custom-select">
            @foreach ($brands as $brand)
                <option value={{$brand->id}}>{{$brand->name_en}}</option>
            @endforeach


        </select>
      </div>
    </div>




</div>
<div class="row my-3">
    <div class="col-6">
      <!-- textarea -->
      <div class="form-group">
        <label>Product Description</label>
        <textarea name="description_en" class="form-control" rows="3" placeholder="Enter ...">
            {{old('description_en')}}</textarea>
      </div></div>
    <div class="col-6">
      <!-- textarea -->
      <div class="form-group text-right">
        <label>وصف المنتج</label>
        <textarea class="form-control text-right" name="descerption_ar" rows="3" placeholder="اكتب">
            {{old('descerption_ar')}}

        </textarea>
      </div></div>
    </div>
{{-- uploat image  --}}
<div class="input-group">
    <div class="custom-file">
      <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
      <label class="custom-file-label" for="exampleInputFile">Choose file</label>
    </div></div>
    <div class="input-group-append">
      <span class="input-group-text">Upload</span>
    </div>


<div class="card-footer text-right mb-5 " >
    <button type="submit" class="btn btn-primary ">Submit</button>
  </div>

</form>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@endsection





