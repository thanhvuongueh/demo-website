@extends('admin.master')
@section('content')

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Product
                    <small>Add</small>
                </h1>
            </div>
            @include('admin.block.error')
            @include('admin.block.message')
            <!-- /.col-lg-12 -->
            <form action="admin/product/edit/{{$product->id}}" method="POST" enctype="multipart/form-data" name="frmEditProduct">
                @csrf
                <div class="col-lg-7" style="padding-bottom:120px">
                    <div class="form-group">
                        <label>Category</label>
                        <select class="form-control" name="txtCate">
                            <option value="0">Please Choose Category</option>
                            <?php showOptionSelect($cate,$product->cate_id)?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Product Name</label>
                        <input class="form-control" name="txtName" placeholder="Please Enter Product Name" value="{{$product->name}}" />
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input class="form-control" name="txtPrice" placeholder="Please Enter Price" value="{{$product->price}}" />
                    </div>
                    <div class="form-group">
                        <label>Intro</label>
                        <textarea class="form-control" rows="3" name="txtIntro">{{$product->intro}}</textarea>
                        <script>ckeditor("txtIntro")</script>
                    </div>
                    <div class="form-group">
                        <label>Content</label>
                        <textarea class="form-control" rows="3" name="txtContent">{{$product->content}}</textarea>
                        <script>ckeditor("txtContent")</script>
                    </div>
                    <div class="form-group">
                        <label>Current Images</label></br>
                        <img src="upload/product/{{$product->image}}" width="150px" class="mb-2">
                        <input type="file" name="fImages">
                    </div>
                    <div class="form-group">
                        <label>Product Keywords</label>
                        <input class="form-control" name="txtKeyword" placeholder="Please Enter Product Keywords" value="{{$product->keywords}}" />
                    </div>
                    <div class="form-group">
                        <label>Product Description</label>
                        <textarea class="form-control" rows="3" name="txtDescription">{{$product->description}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Product Status</label>
                        <label class="radio-inline">
                            <input name="rdoStatus" value="1" checked="" type="radio">Visible
                        </label>
                        <label class="radio-inline">
                            <input name="rdoStatus" value="0" type="radio">Invisible
                        </label>
                    </div>
                    <button type="submit" class="btn btn-default">Product Add</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                </div>

                <div class="col-lg-1"></div>
                <div class="col-lg-4">
                    <label style="margin-bottom: 10px">Detail Product Images <span class="badge badge-primary" id="numberDetailImage">{{count($product->pimage)}}</span></label></br>
                    @foreach($product->pimage as $image)
                        <div class="wrap-detail-image">
                            <img src="upload/product/detail/{{$image->image}}" idHinh="{{$image->id}}" width="200px">
                            <a class="btn btn-danger btn-circle icon-delete-img" idHinh="{{$image->id}}"><i class="fa fa-times"></i></a></br>
                            <!-- <input type="file" name="fDetailProduct[]" class="mb-2"> -->
                        </div>
                    @endforeach
                    <div id="product-image-area"></div>
                    <a class="btn btn-primary mb-2" id="btn-add-image">More Image</a>
                    
                    
                </div>
            <form>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

@endsection