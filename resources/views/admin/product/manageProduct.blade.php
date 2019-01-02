@extends('admin.master')

@section('title')
Manage Products
@endsection

@section('content')

<hr/>
<h4 class="text-center text-success">{{Session::get('message')}}</h4>
<hr/>
<table class="table table-hover table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Product Name</th>
            <th>Product Category</th>
            <th>Product Manufacturer</th>
            <th>Product Price</th>
            <th>Product Quantity</th>
            <th>Product Short Description</th>
            <th>Product Long Description</th>
            <th>Product Image</th>
            <th>Publication Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr>
            <td scope="row">{{$product->id}}</td>
            <td>{{$product->productName}}</td>
            <td>{{$product->categoryName}}</td>
            <td>{{$product->manufacturerName}}</td>
            <td>TK. {{$product->productPrice}}</td>
            <td>{{$product->productQuantity}}</td>
            <td>{{$product->productShortDescription}}</td>
            <td>{{$product->productLongDescription}}</td>
            <td><img src="{{asset($product->productImage)}}" alt="" height="100px" width="100px"></td>
            <td>{{$product->publicationStatus == 1 ? 'Published':'Unpublished' }}</td>
            <td>
                <a href="{{url('/product/view/'.$product->id)}}" class="btn btn-info" title="Product View">
                    <span class="glyphicon glyphicon-info-sign"></span>
                </a>
                <a href="{{url('/product/edit/'.$product->id)}}" class="btn btn-success" title="Product Edit">
                    <span class="glyphicon glyphicon-edit"></span>
                </a>
                <a href="{{url('/product/delete/'.$product->id)}}" class="btn btn-danger" title="Product Delete" onclick="return confirm('Are you sure to delete this?')">
                    <span class="glyphicon glyphicon-trash"></span>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>


@endsection

