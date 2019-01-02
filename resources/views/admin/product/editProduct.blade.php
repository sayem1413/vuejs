@extends('admin.master')

@section('title')
Add Product
@endsection

@section('content')
<hr/>

<div class="row">
    <div class="col-lg-12">
        <h3 class="text-center">Edit Product Info</h3>
        <h4 class="text-center text-success">{{Session::get('message')}}</h4>

        <hr/>
        <div class="well">
            {!! Form::open(['url'=>'/product/update','name'=>'editProductForm', 'method'=>'POST','class'=>'form-horizontal','enctype'=>'multipart/form-data' ]) !!}
            <div class="form-group">
                <div class="col-sm-10">
                    <input type="hidden" value="{{$productById->id}}" class="form-control" name="productId">
                </div>
            </div>
            <div class="form-group">
                <label for="productName" class="col-sm-2 control-label">Product Name</label>
                <div class="col-sm-10">
                    <input type="text" value="{{$productById->productName}}" class="form-control" name="productName">
                    <span class="text-danger">{{$errors->has('productName')?$errors->first('productName'):''}}</span>
                </div>
            </div>
            <div class="form-group">
                <label for="" class="col-sm-2 control-label">Category Name</label>
                <div class="col-sm-10">
                    <select class="form-control" name="categoryId">
                        <option>Select Category Name</option>
                        @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->categoryName}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="" class="col-sm-2 control-label">Manufacturer Name</label>
                <div class="col-sm-10">
                    <select class="form-control" name="manufacturerId">
                        <option>Select Manufacturer Name</option>
                        @foreach($manufacturers as $manufacturer)
                        <option value="{{$manufacturer->id}}">{{$manufacturer->manufacturerName}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="productPrice" class="col-sm-2 control-label">Product Price</label>
                <div class="col-sm-10">
                    <input type="text" value="{{$productById->productPrice}}" class="form-control" name="productPrice">
                    <span class="text-danger">{{$errors->has('productPrice')?$errors->first('productPrice'):''}}</span>
                </div>
            </div>
            <div class="form-group">
                <label for="productQuantity" class="col-sm-2 control-label">Product Quntity</label>
                <div class="col-sm-10">
                    <input type="text" value="{{$productById->productQuantity}}" class="form-control" name="productQuantity">
                    <span class="text-danger">{{$errors->has('productQuantity')?$errors->first('productQuantity'):''}}</span>
                </div>
            </div>
            <div class="form-group">
                <label for="productShortDescription" class="col-sm-2 control-label">Product Short Description</label>
                <div class="col-sm-10">
                    <textarea class="form-control" value="" name="productShortDescription" rows="8">{{$productById->productShortDescription}}</textarea>
                    <span class="text-danger">{{$errors->has('productShortDescription')?$errors->first('productShortDescription'):''}}</span>
                </div>
            </div>
            <div class="form-group">
                <label for="productLongDescription" class="col-sm-2 control-label">Product Long Description</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="productLongDescription" rows="8" >{{$productById->productLongDescription}}</textarea>
                    <span class="text-danger">{{$errors->has('productLongDescription')?$errors->first('productLongDescription'):''}}</span>
                </div>
            </div>
            <div class="form-group">
                <label for="image" class="col-sm-2 control-label">Product Image</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control" name="productImage" >
                    <img src="{{asset($productById->productImage)}}" alt="" height="200px" width="200px">
                    <span class="text-danger">{{$errors->has('productImage')?$errors->first('productImage'):''}}</span>
                </div>
            </div>
            <div class="form-group">
                <label for="" class="col-sm-2 control-label"></label>
                <div class="col-sm-10">
                    <select class="form-control" name="publicationStatus">
                        <option>Select Publication Status</option>
                        <option value="1">Published</option>
                        <option value="0">Unpublished</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-success btn-block" name="">Update Product Info</button>
                </div>
            </div>

            {!! Form::close()!!}
        </div>
    </div>
</div>

<script>
    document.forms['editProductForm'].elements['categoryId'].value = {{$productById->categoryId}};
    document.forms['editProductForm'].elements['manufacturerId'].value = {{$productById->manufacturerId}};
    document.forms['editProductForm'].elements['publicationStatus'].value = {{$productById->publicationStatus}};
</script>

@endsection