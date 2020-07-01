@extends("admin.master")
@section("content")
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Bill
                    <small>List</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            @include("admin.block.message")
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Total Price</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $stt=0 ?>
                    @foreach($allBills as $bill)
                    <?php $stt++ ?>
                    <tr class="odd gradeX" align="center">
                        <td>{{$stt}}</td>
                        <td>{{$bill->first_name}}</td>
                        <td>{{$bill->last_name}}</td>
                        <td>{{$bill->phone}}</td>
                        <td>{{$bill->address}}</td>
                        <td>{{number_format($bill->total_price)}}</td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/bill/delete/{{$bill->id}}" onclick="return xacNhan('Do you want to delete?')"> Delete</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/bill/edit/{{$bill->id}}">Edit</a></td>
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