@extends('admin.master')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Product
                    <small>List</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            @include('admin.block.message')
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Date</th>
                        <th>Category</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $stt = 0 ?>
                    @foreach($allProduct as $product)
                    <?php $stt++ ?>
                    <tr class="odd gradeX" align="center">
                        <td>{{$stt}}</td>
                        <td>{{$product->name}}</td>
                        <td>{{number_format($product->price)}}</td>
                        <td>
                            <?php
                                echo Carbon\Carbon::createFromTimeStamp(strtotime($product->created_at))->diffForHumans();
                            ?>
                        </td>
                        <td>{{$product->cate->name}}</td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/product/delete/{{$product->id}}" onclick="return xacNhan('Do you want to delete?')"> Delete</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/product/edit/{{$product->id}}">Edit</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

@endsection