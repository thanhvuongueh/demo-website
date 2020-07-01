@extends('admin.master')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Category
                    <small>List</small>
                </h1>
            </div>
            @include('admin.block.message')
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Category Parent</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cate as $ct)
                    <tr class="odd gradeX" align="center">
                        <td>{{$ct->id}}</td>
                        <td>{{$ct->name}}</td>
                        <td>
                            <?php
                                $parent_cate = App\Cate::find($ct->parent_id);
                            ?>
                            {{$parent_cate?$parent_cate->name:"None"}}
                        </td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onClick="return xacNhan('Do you want to delete?')" href="admin/cate/delete/{{$ct->id}}"> Delete</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/cate/edit/{{$ct->id}}">Edit</a></td>
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

@section('script')
<script>
    $("div > .alert").delay(3000).slideUp();
</script>
@endsection