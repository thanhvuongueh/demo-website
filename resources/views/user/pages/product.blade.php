@extends("user.master")
@section("content")
<div id="maincontainer">
  <section id="product">
    <div class="container">      
      <!-- Product Details-->
      <div class="row">
       <!-- Left Image-->
        <div class="col-lg-5">
          <ul class="thumbnails mainimage">
            <li>
              <a  rel="position: 'inside' , showTitle: false, adjustX:-4, adjustY:-4" class="thumbnail cloud-zoom" href="upload/product/{{$product->image}}">
                <img src="upload/product/{{$product->image}}" alt="" title="">
              </a>
            </li>
            @foreach($product->pimage as $image)
            <li>
              <a rel="position: 'inside' , showTitle: false, adjustX:-4, adjustY:-4" class="thumbnail cloud-zoom" href="upload/product/detail/{{$image->image}}">
                <img  src="upload/product/detail/{{$image->image}}" alt="" title="">
              </a>
            </li>
            @endforeach
          </ul>
          <span>Mouse move on Image to zoom</span>
          <ul class="thumbnails mainimage">
            <li class="producthtumb">
              <a class="thumbnail" >
                <img  src="upload/product/{{$product->image}}" alt="" title="">
              </a>
            </li>
            @foreach($product->pimage as $image)
            <li class="producthtumb">
              <a class="thumbnail" >
                <img  src="upload/product/detail/{{$image->image}}" alt="" title="">
              </a>
            </li>
            @endforeach
          </ul>
        </div>
         <!-- Right Details-->
        <div class="col-lg-7">
          <div class="row">
            <div class="col-lg-12">
              <h1 class="productname"><span class="bgnone">{{$product->name}}</span></h1>
              <div class="productprice">
                <div class="productpageprice">
                  <span class="spiral"></span>{{number_format($product->price)}}</div>
                <!-- <div class="productpageoldprice">Old price : $345.00</div> -->

              <ul class="productpagecart">
                <li><a class="cart btn-add-to-cart" product-id="{{$product->id}}" href="#">Add to Cart</a>
                </li>
              </ul>
         <!-- Product Description tab & comments-->
         <div class="productdesc">
                <ul class="nav nav-tabs" id="myTab">
                  <li class="active"><a href="#description">Description</a>
                  </li>
                  <li><a href="#producttag">Tags</a>
                  </li>
                </ul>
                <div class="tab-content">
                  <div class="tab-pane active" id="description">
                    <h2>{{$product->description}}</h2>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum <br>
                    <br>
                    <ul class="listoption3">
                      <li>Lorem ipsum dolor sit amet Consectetur adipiscing elit</li>
                      <li>Integer molestie lorem at massa Facilisis in pretium nisl aliquet</li>
                      <li>Nulla volutpat aliquam velit </li>
                      <li>Faucibus porta lacus fringilla vel Aenean sit amet erat nunc Eget porttitor lorem</li>
                    </ul>
                  </div>
                  <div class="tab-pane" id="producttag">
                    <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum <br>
                      <br>
                    </p>
                    <ul class="tags">
                      <li><a href="#"><i class="icon-tag"></i> {{$product->keywords}}</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--  Related Products-->
  <section id="related" class="row">
    <div class="container">
      <h1 class="heading1"><span class="maintext">Related Products</span><span class="subtext"> See Our Most featured Products</span></h1>
      <ul class="thumbnails">
        @foreach($relatedProducts as $product)
        <li class="col-lg-3 col-sm-3 product-card">
          <a class="prdocutname" href="product/{{$product->id}}/{{$product->alias}}">{{$product->name}}</a>
          <div class="thumbnail">
            <span class="sale tooltip-test">Sale</span>
            <a href="product/{{$product->id}}/{{$product->alias}}"><img alt="" src="upload/product/{{$product->image}}"></a>
            <div class="shortlinks">
              <a class="details" href="product/{{$product->id}}/{{$product->alias}}">DETAILS</a>
              <a class="wishlist btn-add-to-cart" product-id="{{$product->id}}" href="#">ADD TO CART</a>
            </div>
            <div class="pricetag">
              <span class="spiral"></span><a href="#" product-id="{{$product->id}}" class="productcart btn-add-to-cart">ADD TO CART</a>
              <div class="price">
                <div class="pricenew">{{number_format($product->price)}}</div>
                <!-- <div class="priceold">$5000.00</div> -->
              </div>
            </div>
          </div>
        </li>
        @endforeach
      </ul>
    </div>
  </section>
  <!-- Popular Brands-->
  <section id="popularbrands" class="container">
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
</div>
@endsection