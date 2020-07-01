@extends("user.master")
@section("content")

<div class="container big-message">
@include('admin.block.message')
</div>

<div id="maincontainer">
  <!-- Slider Start-->
  @include("user.blocks.slider")
  <!-- Slider End-->
  
  <!-- Section Start-->
  @include("user.blocks.otherdetails")
  <!-- Section End-->
  
  <!-- Latest Product-->
  <section id="latest" class="row">
    <div class="container">
      <h1 class="heading1"><span class="maintext">Latest Products</span><span class="subtext"> See Our  Latest Products</span></h1>
      <ul class="thumbnails">
        @foreach($latestProducts as $product)
        <li class="col-lg-3 col-sm-6 product-card">
          <a class="prdocutname" href="product/{{$product->id}}/{{$product->alias}}">{{$product->name}}</a>
          <div class="thumbnail">
            <div class="wrap-image">
              <a class="image-product" href="product/{{$product->id}}/{{$product->alias}}"><img alt="" src="upload/product/{{$product->image}}"></a>
            </div>
            <div class="shortlinks">
              <a class="details" href="product/{{$product->id}}/{{$product->alias}}">DETAILS</a>
              <a class="wishlist btn-add-to-cart" product-id="{{$product->id}}" href="#">ADD TO CART</a>
            </div>
            <div class="pricetag">
              <span class="spiral"></span><a href="#" product-id="{{$product->id}}" class="productcart btn-add-to-cart">ADD TO CART</a>
              <div class="price">
                <div class="pricenew">{{number_format($product->price,0)}}</div>
                <!-- <div class="priceold">$5000.00</div> -->
              </div>
            </div>
          </div>
        </li>
        @endforeach
      </ul>
    </div>
  </section>

  <!-- Random Product-->
  <section id="featured" class="row mt40">
    <div class="container">
      <h1 class="heading1"><span class="maintext">Hot Products</span><span class="subtext"> See Our Most featured Products</span></h1>
      <ul class="thumbnails">
        @foreach($hotProducts as $product)
        <li class="col-lg-3  col-sm-6 product-card">
          <a class="prdocutname" href="product/{{$product->id}}/{{$product->alias}}">{{$product->name}}</a>
          <div class="thumbnail">
            <div class="wrap-image">
              <a class="image-product" href="product/{{$product->id}}/{{$product->alias}}"><img alt="" src="upload/product/{{$product->image}}"></a>
            </div>
            <div class="shortlinks">
              <a class="details" href="product/{{$product->id}}/{{$product->alias}}">DETAILS</a>
              <a class="wishlist btn-add-to-cart" product-id="{{$product->id}}" href="#">ADD TO CART</a>
            </div>
            <div class="pricetag">
              <span class="spiral"></span><a href="#" product-id="{{$product->id}}" class="productcart btn-add-to-cart">ADD TO CART</a>
              <div class="price">
                <div class="pricenew">{{number_format($product->price,0)}}</div>
                <!-- <div class="priceold">$5000.00</div> -->
              </div>
            </div>
          </div>
        </li>
        @endforeach
      </ul>
    </div>
  </section>
  
  
  
  <!-- Section  Banner Start-->
  <section class="container smbanner">
    <div class="row">
      <div class="col-lg-3 col-sm-6"><a href="#"><img src="upload/logo/logo1.jpg" alt="" title=""></a>
      </div>
      <div class="col-lg-3 col-sm-6"><a href="#"><img src="upload/logo/logo2.jpg" alt="" title=""></a>
      </div>
      <div class="col-lg-3 col-sm-6"><a href="#"><img src="upload/logo/logo3.jpg" alt="" title=""></a>
      </div>
      <div class="col-lg-3 col-sm-6"><a href="#"><img src="upload/logo/logo4.jpg" alt="" title=""></a>
      </div>
    </div>
  </section>
  <!-- Section  End-->
  
  <!-- Popular Brands-->
  <section id="popularbrands" class="container mt40">
    <h1 class="heading1"><span class="maintext">Popular Brands</span><span class="subtext"> See Our  Popular Brands</span></h1>
    <div class="brandcarousalrelative">
      <ul id="brandcarousal">
        <li><img src="user/img/brand1.jpg" alt="" title=""/></li>
        <li><img src="user/img/brand2.jpg" alt="" title=""/></li>
        <li><img src="user/img/brand3.jpg" alt="" title=""/></li>
        <li><img src="user/img/brand4.jpg" alt="" title=""/></li>
        <li><img src="user/img/brand1.jpg" alt="" title=""/></li>
        <li><img src="user/img/brand2.jpg" alt="" title=""/></li>
        <li><img src="user/img/brand3.jpg" alt="" title=""/></li>
        <li><img src="user/img/brand4.jpg" alt="" title=""/></li>
        <li><img src="user/img/brand1.jpg" alt="" title=""/></li>
        <li><img src="user/img/brand2.jpg" alt="" title=""/></li>
        <li><img src="user/img/brand3.jpg" alt="" title=""/></li>
        <li><img src="user/img/brand4.jpg" alt="" title=""/></li>
      </ul>
      <div class="clearfix"></div>
      <a id="prev" class="prev" href="#">&lt;</a>
      <a id="next" class="next" href="#">&gt;</a>
    </div>
  </section>
  
  <!-- Newsletter Signup-->
  <section id="newslettersignup" class="mt40">
    <div class="container">
      <div class="pull-left newsletter">
        <h2> Newsletters Signup</h2>
        Sign up to Our Newsletter & get attractive Offers by subscribing to our newsletters. </div>
      <div class="pull-right">
        <form class="form-horizontal">
          <div class="input-prepend">
            <input type="text" placeholder="Subscribe to Newsletter" id="inputIcon" class="input-xlarge">
            <input value="Subscribe" class="btn btn-orange" type="submit" style="border-radius: 0px 4px 4px 0px">
            Sign in </div>
        </form>
      </div>
    </div>
  </section>
  
</div>
<!-- /maincontainer -->

@endsection
