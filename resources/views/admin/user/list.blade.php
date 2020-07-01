@extends("admin.master")
@section("content")
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">User
                    <small>List</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            @include("admin.block.message")
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Username</th>
                        <th>Level</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $stt=0 ?>
                    @foreach($allUsers as $user)
                    <?php $stt++ ?>
                    <tr class="odd gradeX" align="center">
                        <td>{{$stt}}</td>
                        <td>{{$user->username}}</td>
                        <td> @if($user->id == 1) SuperAdmin @else {{($user->level == 1)?"Admin":"Member"}} @endif </td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/user/delete/{{$user->id}}" onclick="return xacNhan('Do you want to delete?')"> Delete</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/user/edit/{{$user->id}}">Edit</a></td>
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