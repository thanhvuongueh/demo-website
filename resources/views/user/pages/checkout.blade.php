@extends("user.master")
@section("content")
<div id="maincontainer">
  <section id="product">
    <div class="container">
    <!--  breadcrumb -->  
      <ul class="breadcrumb">
        <li>
          <a href="#">Home</a>
          <span class="divider">/</span>
        </li>
        <li class="active">Checkout</li>
      </ul>
      @include("admin.block.error")
      @include("admin.block.message")
      <div class="row">        
        <!-- Account Login-->
        <div class="col-lg-9">
          <h1 class="heading1"><span class="maintext">Checkout</span><span class="subtext"> Checkout Process Steps</span></h1>
          <form action="" method="post" class="form-horizontal">
          @csrf
          <div class="checkoutsteptitle" id="step1">Step 1: Billing Details<a class="modify">Modify</a>
          </div>
          <div class="checkoutstep">
            <div class="row">
              
              <fieldset>
                <div class="col-lg-6">
                  <div class="control-group">
                    <label class="control-label" >First Name<span class="red">*</span></label>
                    <div class="controls">
                      <input type="text" name="txtFname">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" >Last Name<span class="red">*</span></label>
                    <div class="controls">
                      <input type="text" name="txtLname">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" >Telephone<span class="red">*</span></label>
                    <div class="controls">
                      <input type="text" name="txtPhone">
                    </div>
                  </div>
                
                </div>

                <div class="col-lg-6">
                  <div class="control-group">
                    <label class="control-label" >Address<span class="red">*</span></label>
                    <div class="controls">
                      <textarea name="txtAddress" cols="30" rows="5"></textarea>
                    </div>
                  </div>
                </div>
              </fieldset>
              
            </div>
          </div>

          <div class="checkoutsteptitle" id="step2" name="step2">Step 2: Confirm Order<a class="modify">Modify</a>
          </div>
          <div class="checkoutstep">
            <div class="cart-info">
              <table class="table table-striped table-bordered">
                <tr>
                  <th class="image">Image</th>
                  <th class="name">Product Name</th>
                  <th class="quantity">Quantity</th>
                  <th>Action</th>
                  <th class="price">Unit Price</th>
                  <th class="total">Total</th>
                </tr>
                @if(session('cart'))
                @foreach(session('cart')['items'] as $id => $item)
                <tr product-id={{$id}}>
                  <td class="image"><a href="#"><img title="product" alt="product" src="upload/product/{{$item['image']}}" height="50" width="50"></a></td>
                  <td  class="name"><a href="#">{{$item['name']}}</a></td>
                  <td class="quantity">
                    <div class="custom-input-number"><input type="number" size="1" min="0" value="{{$item['quality']}}" name="quantity[]" class="col-lg-3 btn input-quantity" quantity="{{$id}}"><div>
                  </td>
                  <td class="text-center">
                    <a href="#"><img class="remove-action" data-original-title="Remove"  src="user/img/remove.png" alt=""></a>
                  </td>
                  <td class="price">{{number_format($item['price'])}}</td>
                  <td class="total totalProduct">{{number_format($item['price'] * $item['quality'])}}</td>
                </tr>
                @endforeach
                @endif
              </table>
            </div>
            <div class="row">
                <div class="col-lg-4 pull-right">
                  <table class="table table-striped table-bordered ">
                    <tbody>
                      <tr>
                        <td><span class="extra bold totalamout">Total :</span></td>
                        <td><span class="bold totalamout totalPrice">{{(session('cart')) ? number_format(session('cart')['totalPrice']) : 0}} VNĐ</span></td>
                      </tr>
                    </tbody>
                  </table>
                  <input type="submit" class="btn btn-orange pull-right" value="Check Out">
                </div>
              
            </div>
          </div>

          </form>
        </div>        
        <!-- Sidebar Start-->
        <div class="col-lg-3">
          <aside>
            <div class="sidewidt">
              <h2 class="heading2"><span> Checkout Steps</span></h2>
              <ul class="nav nav-list categories">
                <li>
                  <a href="#step1">Billing Details</a>
                </li>
                <li>
                  <a href="#step2">Confirm Order</a>
                </li>
              </ul>
            </div>
          </aside>
        </div>
        <!-- Sidebar End-->
      </div>
    </div>
  </section>
</div>
@endsection