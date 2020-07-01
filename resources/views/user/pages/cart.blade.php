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
        <li class="active"> Shopping Cart</li>
      </ul>       
      <h1 class="heading1"><span class="maintext"> Shopping Cart</span><span class="subtext"> All items in your  Shopping Cart</span></h1>
      <!-- Cart-->
      <div class="cart-info">
        <table class="table table-striped table-bordered">
          <tr>
            <th class="image">Image</th>
            <th class="name">Product Name</th>
            <th class="quantity">Qty</th>
              <th class="total">Action</th>
            <th class="price">Unit Price</th>
            <th class="total">Total</th>
           
          </tr>
          @if(session('cart'))
          @foreach(session('cart')['items'] as $id => $item)
          <tr product-id="{{$id}}">
            <td class="image"><a href="#"><img title="product" alt="product" src="upload/product/{{$item['image']}}" height="50" width="50"></a></td>
            <td  class="name"><a href="#">{{$item['name']}}</a></td>
            <td class="quantity">
              <div class="custom-input-number">
                <input type="number" size="1" min="0" value="{{$item['quality']}}" name="quantity[]" class="col-lg-3 btn input-quantity" quantity="{{$id}}">
              </div>
            </td>
            <td class="text-center"> 
              <a href="#"><img class="remove-action" data-original-title="Remove"  src="user/img/remove.png" alt=""></a>
            </td>
            <td class="price">{{number_format($item['price'])}}</td>
            <td class="total">{{number_format($item['price'] * $item['quality'])}}</td>
          </tr>
          @endforeach
          @else
          <tr>
            <td colspan="6">None</td>
          </tr>
          @endif
        </table>
      </div>

      <div class="container">
      <div>
          <div class="col-lg-4 pull-right">
            <table class="table table-striped table-bordered ">
              <tr>
                <td><span class="extra bold totalamout">Total :</span></td>
                <td><span class="bold totalamout totalPrice">{{session('cart')? (number_format(session('cart')['totalPrice'])) : 0}} VNĐ</span></td>
              </tr>
            </table>
            <a href="checkout" class="btn btn-orange pull-right">CheckOut</a>
            <a class="btn btn-orange pull-right mr10" href="{{url()->previous()}}">Continue Shopping</a>
          </div>
        </div>
        </div>
    </div>
  </section>
</div>
@endsection
