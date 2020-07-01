@extends("admin.master")
@section("content")
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Bill
                    <small>Add</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            @include("admin.block.error")
            @include("admin.block.message")
            <form action="" method="POST">
            @csrf
            <div class="col-lg-12">
                <h3>Bill Information</h3>
            </div>

            <div class="col-lg-7" style="padding-bottom:20px">
                
                    
                    <div class="form-group">
                        <label>First Name</label>
                        <input class="form-control" name="txtFname" placeholder="Please Enter First Name" value="{{old('txtFname')}}" />
                    </div>
                    <div class="form-group">
                        <label>Last Name</label>
                        <input class="form-control" name="txtLname" placeholder="Please Enter Last Name" value="{{old('txtLname')}}" />
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input class="form-control" name="txtPhone" placeholder="Please Enter Phone" value="{{old('txtPhone')}}" />
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <textarea class="form-control" name="txtAddress" cols="30" rows="3" placeholder="Please Enter Address">{{old('txtAddress')}}</textarea>
                    </div>

                    
                
            </div>

            <div class="col-lg-12">
                <h3>Bill Detail</h3>
            </div>

            <div class="col-lg-12" style="margin-bottom: 20px">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr align="center">
                            <th>STT</th>
                            <th>Category</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Quality</th>
                            <th>Total</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>
                                <select class="form-control sltCate" name="sltCate[]" >
                                    <option value="0">Choose Category</option>
                                    <?php showOptionSelect($allCates)?>
                                </select>
                            </td>
                            <td>Name</td>
                            <td>0</td>
                            <td><input type="number" class="form-control txtQuality" name="txtQuality[]" value=1 min=1></td>
                            <td>0</td>
                            <td class="delete-icon">Delete</td>
                        </tr>
                        
                    </tbody>
                </table>
                <div class="text-right" style="font-size: 20px; font-weight: bold">
                    Total Bill: <span id="total-bill"> 0 </span>
                </div>

                <button onclick="return false" class="btn btn-primary btn-add-product">Add Product</button>

                <div class="text-right" >
                    <button type="submit" class="btn btn-default">Bill Add</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                </div>

                
            </div>
            <form>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection

@section('script')
<script type="text/javascript">

function formatNumber(num) {
  return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
}

$(document).ready(function(){
    var stt = 1;
    var totalBill = 0;

    $(".btn-add-product").click(function(){
        stt++;
        var newRow = "<tr><td>"+stt+"</td><td><select class='form-control sltCate' name='sltCate[]' ><option value='0'>Choose Category</option><?php showOptionSelect($allCates)?></select></td><td>Name</td><td>0</td><td><input type='number' class='form-control txtQuality' name='txtQuality[]' value='1' min='1'></td><td>0</td><td class='delete-icon'>Delete</td></tr>";
        $("tbody").append(newRow);
    });

    $("table").on("change",".sltCate",function(){
        var cateId = $(this).val();
        var tr = $(this).closest("tr");
        var tdName = tr.find("td:nth-child(3)");
        var tdPrice = tr.find("td:nth-child(4)");
        var tdQuality = tr.find("td:nth-child(5)");
        var quality = tr.find("td:nth-child(5) input").val();
        var tdTotal = tr.find("td:nth-child(6)");

        $.get("admin/ajax/get-product-from-cate/"+cateId,function(data){
            tdName.html(data);
            var productId = tdName.find(':selected').val();
            $.get("admin/ajax/get-price-product/"+productId,function(data){
                var price  = data;
                tdPrice.html(formatNumber(price));
                var oldTotal = tdTotal.html().split(",").join("");
                var total = price*quality;
                totalBill = totalBill + total - oldTotal;
                tdTotal.html(formatNumber(total));
                $("#total-bill").html(formatNumber(totalBill));
            });
        });
    });

    $("table").on("change",".sltName",function(){
        var productId = $(this).val();
        var tr = $(this).closest("tr");
        var tdPrice = tr.find("td:nth-child(4)");
        var quality = tr.find("td:nth-child(5) input").val();
        var tdTotal = tr.find("td:nth-child(6)");
        $.get("admin/ajax/get-price-product/"+productId,function(data){
            var price  = data;
            tdPrice.html(formatNumber(price));
            var oldTotal = tdTotal.html().split(",").join("");
            var total = price*quality;
            tdTotal.html(formatNumber(total));
            totalBill = totalBill + total - oldTotal;
            $("#total-bill").html(formatNumber(totalBill));
        });
    });

    $("table").on("change",".txtQuality",function(){
        var quality = $(this).val();
        var tr = $(this).closest("tr");
        var price = parseInt(tr.find("td:nth-child(4)").html().split(",").join(""));
        var tdTotal = tr.find("td:nth-child(6)"); 
        var oldTotal = tdTotal.html().split(",").join("");
        var total = price*quality;
        tdTotal.html(formatNumber(total));
 
        totalBill = totalBill + total - oldTotal;
        $("#total-bill").html(formatNumber(totalBill));
    });

    $("table").on("click",".delete-icon",function(){
        stt--;
        var tr = $(this).closest("tr");
        var totalBill = $("#total-bill").html().split(",").join("");
        var tdToTal = tr.find("td:nth-child(6)").html().split(",").join("");
        $("#total-bill").html(formatNumber(totalBill - tdToTal));
        tr.remove();
    });

});
</script>
@endsection