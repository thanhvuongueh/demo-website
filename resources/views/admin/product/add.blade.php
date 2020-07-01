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
            <!-- /.col-lg-12 -->
            <form action="admin/product/add" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-lg-7" style="padding-bottom:120px">
                    <div class="form-group">
                        <label>Category</label>
                        <select class="form-control" name="txtCate">
                            <option value="0">Please Choose Category</option>
                            <?php showOptionSelect($cate,old('txtCate'))?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Product Name</label>
                        <input class="form-control" name="txtName" placeholder="Please Enter Product Name" value="{{old('txtName')}}" />
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input class="form-control" name="txtPrice" placeholder="Please Enter Price" value="{{old('txtPrice')}}" />
                    </div>
                    <div class="form-group">
                        <label>Intro</label>
                        <textarea class="form-control" rows="3" name="txtIntro">{{old('txtIntro')}}</textarea>
                        <script>ckeditor("txtIntro")</script>
                    </div>
                    <div class="form-group">
                        <label>Content</label>
                        <textarea class="form-control" rows="3" name="txtContent">{{old('txtContent')}}</textarea>
                        <script>ckeditor("txtContent")</script>
                    </div>
                    <div class="form-group">
                        <label>Images</label>
                        <input type="file" name="fImages" >
                    </div>
                    <div class="form-group">
                        <label>Product Keywords</label>
                        <input class="form-control" name="txtKeyword" placeholder="Please Enter Product Keywords" value="{{old('txtKeyword')}}" />
                    </div>
                    <div class="form-group">
                        <label>Product Description</label>
                        <textarea class="form-control" rows="3" name="txtDescription">{{old('txtDescription')}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Hot Product</label>
                        <label class="radio-inline">
                            <input name="rdoHot" value="1" checked="" type="radio">Yes
                        </label>
                        <label class="radio-inline">
                            <input name="rdoHot" value="0" type="radio">No
                        </label>
                    </div>
                    <button type="submit" class="btn btn-default">Product Add</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                </div>

                <div class="col-lg-1"></div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label>Detail Images</label>
                        <input type="file" name="fDetailProduct[]" >
                    </div>
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