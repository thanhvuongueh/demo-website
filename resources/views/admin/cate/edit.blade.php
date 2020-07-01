@extends('admin.master')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Category
                    <small>Edit</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            
            <div class="col-lg-7" style="padding-bottom:120px">
            @include('admin.block.error')
            @include('admin.block.message')
                <form action="admin/cate/edit/{{$cate->id}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Category Parent</label>
                        <select class="form-control" name="txtCateParent">
                            <option value="0">Please Choose Category</option>
                            
                            <?php showOptionSelect($allCate,$cate->parent_id)?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Category Name</label>
                        <input class="form-control" name="txtCateName" placeholder="Please Enter Category Name" value="{{$cate->name}}" />
                    </div>
                    <div class="form-group">
                        <label>Category Order</label>
                        <input class="form-control" name="txtOrder" placeholder="Please Enter Category Order" value="{{$cate->order}}" />
                    </div>
                    <div class="form-group">
                        <label>Category Keywords</label>
                        <input class="form-control" name="txtKeywords" placeholder="Please Enter Category Keywords" value="{{$cate->keyword}}" />
                    </div>
                    <div class="form-group">
                        <label>Category Description</label>
                        <textarea class="form-control" name="txtDescription" rows="3">{{$cate->description}}</textarea>
                    </div>
                    
                    <button type="submit" class="btn btn-default">Category Add</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection