@extends('admin.master')

@section('title')
Add Category
@endsection

@section('content')
<hr/>

<div class="row">
    <div class="col-lg-12">
        <h3 class="text-center">Add Category</h3>
        <h4 class="text-center text-success">{{Session::get('message')}}</h4>
        
        <hr/>
        <div class="well">
            {!! Form::open(['url'=>'/category/save', 'method'=>'POST','class'=>'form-horizontal'])!!}
                <div class="form-group">
                    <label for="category_name" class="col-sm-2 control-label">Category Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="category_name">
                        <span class="text-danger">{{$errors->has('category_name')?$errors->first('category_name'):''}}</span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="category_description" class="col-sm-2 control-label">Category Description</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="category_description" rows="8"></textarea>
                        <span class="text-danger">{{$errors->has('category_description')?$errors->first('category_description'):''}}</span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label"></label>
                    <div class="col-sm-10">
                        <select class="form-control" name="active">
                            <option>Select Publication Status</option>
                            <option value="1">Published</option>
                            <option value="0">Unpublished</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-success btn-block" name="">Save Category Info</button>
                    </div>
                </div>
                
            {!! Form::close()!!}
        </div>
    </div>
</div>

@endsection
