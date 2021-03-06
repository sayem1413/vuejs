@extends('admin.master')

@section('title')
Add Category
@endsection

@section('content')
<hr/>

<div class="row">
    <div class="col-lg-12">
        <h3 class="text-center">Edit Category</h3>
        <!-- <h4 class="text-center text-success">{{Session::get('message')}}</h4> -->

        <hr/>
        <div class="well">
            {!! Form::open(['url'=>'category/update', 'method'=>'POST','class'=>'form-horizontal','name'=>'editCategoryForm'])!!}
            <div class="form-group">
                <div class="col-sm-10">
                    <input type="hidden" value="{{$categoryById->id}}" class="form-control" name="categoryId">
                </div>
            </div>
            <div class="form-group">
                <label for="category_name" class="col-sm-2 control-label">Category Name</label>
                <div class="col-sm-10">
                    <input type="text" value="{{$categoryById->category_name}}" class="form-control" name="category_name">
                </div>
            </div>
            <div class="form-group">
                <label for="category_description" class="col-sm-2 control-label">Category Description</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="category_description" rows="8">{{$categoryById->category_description}}</textarea>
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
                    <button type="submit" class="btn btn-success btn-block" name="">Upadte Category Info</button>
                </div>
            </div>

            {!! Form::close()!!}
        </div>
    </div>
</div>

<script>
    document.forms['editCategoryForm'].elements['active'].value = {{$categoryById->active}};
</script>

@endsection


