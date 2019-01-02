@extends('admin.master')

@section('title')
View Products
@endsection

@section('content')
<hr/>

<table class="table table-hover table-bordered">
    <tr>
        <th>Product Id</th>
        <th>{{$product->id}}</th>
    </tr>
    <tr>
        <th>Product Name</th>
        <th>{{$product->productName}}</th>
    </tr>
    <tr>
        <th>Category Name</th>
        <th>{{$product->categoryName}}</th>
    </tr>
    <tr>
        <th>Manufacturer Name</th>
        <th>{{$product->manufacturerName}}</th>
    </tr>
    <tr>
        <th>Product Price</th>
        <th>{{$product->productPrice}}</th>
    </tr>
    <tr>
        <th>Product Quantity</th>
        <th>{{$product->productQuantity}}</th>
    </tr>
    <tr>
        <th>Product Short Description</th>
        <th>{{$product->productShortDescription}}</th>
    </tr>
    <tr>
        <th>product Long Description</th>
        <th>{{$product->productLongDescription}}</th>
    </tr>
    <tr>
        <th>Product Image</th>
        <th><img src="{{asset($product->productImage)}}" alt="{{$product->productName}}" height="250px" width="250" ></th>
    </tr>
    <tr>
        <th>Publication Status</th>
        <th>{{$product->publicationStatus == 1 ? 'published' : 'Unpublished'}}</th>
    </tr>

</table>


@endsection
