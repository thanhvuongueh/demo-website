<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Khóa Học Lập Trình Laravel Framework 5.x Tại Khoa Phạm">
    <meta name="author" content="">
    <title>Admin - Vương Nguyễn - Demo Project</title>
    <link rel="icon" type="image/png" sizes="16x16" href="favicon.png">
    <base href="{{asset('')}}">

    <!-- Bootstrap Core CSS -->
    <link href="admin/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="admin/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="admin/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="admin/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- DataTables CSS -->
    <link href="admin/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="admin/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">

    <!-- My CSS -->
    <link href="admin/mycss.css" rel="stylesheet">

    <!-- CkEditor & CkFinder -->
    <script src="{{ asset('admin/js/ckeditor/ckeditor.js') }}"></script>
    <script>
        function ckeditor(name){
            var editor = CKEDITOR.replace(name, {
                filebrowserBrowseUrl: '{{ asset('admin/js/ckfinder/ckfinder.html') }}',
                filebrowserImageBrowseUrl: '{{ asset('admin/js/ckfinder/ckfinder.html?type=Images') }}',
                filebrowserFlashBrowseUrl: '{{ asset('admin/js/ckfinder/ckfinder.html?type=Flash') }}',
                filebrowserUploadUrl: '{{ asset('upload/product') }}',
                filebrowserImageUploadUrl: '{{ asset('upload/product') }}',
                filebrowserFlashUploadUrl: '{{ asset('upload/product') }}'
            } );
        }
    </script>

    
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{asset("")}}">Trang quản trị</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="admin/user/edit/{{Auth::user()->id}}"><i class="fa fa-user fa-fw"></i> {{Auth::user()->username}}</a>
                        </li>
                        <li><a href="admin/user/edit/{{Auth::user()->id}}"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="admin/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href=""><i class="fa fa-dashboard fa-fw"></i> Trang chủ</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-cubes fa-fw"></i> Category<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="admin/cate/list">List Category</a>
                                </li>
                                <li>
                                    <a href="admin/cate/add">Add Category</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-cube fa-fw"></i> Product<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="admin/product/list">List Product</a>
                                </li>
                                <li>
                                    <a href="admin/product/add">Add Product</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-users fa-fw"></i> User<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="admin/user/list">List User</a>
                                </li>
                                <li>
                                    <a href="admin/user/add">Add User</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-barcode fa-fw"></i> Bill<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="admin/bill/list">List Bills</a>
                                </li>
                                <li>
                                    <a href="admin/bill/add">Add Bill</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        @yield('content')
        

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="admin/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="admin/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="admin/dist/js/sb-admin-2.js"></script>

    <!-- DataTables JavaScript -->
    <script src="admin/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="admin/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>


   
    
    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>

    <!-- MyScript -->
    <script>
    function xacNhan(msg){
        if(window.confirm(msg)){
            return true;
        };
        return false;
    };

    $(document).ready(function() {
        $("#btn-add-image").click(function(){
            $("#product-image-area").append("<input type='file' name='fDetailProduct[]' class='mb-2'>");
        });

        $(".icon-delete-img").click(function(){
            if(window.confirm("Do you want to delete this image?")){
                var id = $(this).attr("idHinh");
                var _token = $("form[name='frmEditProduct']").find("input[name='_token']").val();
                var current = $(this);
                
                $.post("admin/product/delete-image/"+id,{_token: _token},function(data){
                    if(data == "Oke"){
                        current.parent().remove();
                        var numberDetailImage = $("#numberDetailImage").html();
                        $("#numberDetailImage").html(numberDetailImage-1);
                    };
                });
            };
        });
    });
    </script>

    @yield('script')
</body>

</html>
