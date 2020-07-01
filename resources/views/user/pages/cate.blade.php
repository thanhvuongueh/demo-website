@extends("user.master")
@section("content")
<div id="maincontainer">
  <section id="product">
    <div class="container">
     <!--  breadcrumb -->  
      <ul class="breadcrumb">
        <li>
          <a href="/">Home</a>
        </li>

        @if(isset($cate))<li><?php getBreadcrumbCate($cate->id) ?></li>@endif
        @if(isset($search))<li>/Search:{{$search}}</li>@endif
      </ul>
      <div class="row">        
        <!-- Sidebar Start-->
        <aside class="col-lg-3">
          
          @if(isset($cate))
         <!-- Category-->  
          <div class="sidewidt">
            <h2 class="heading2" id="cateId" cateId="{{$cate->id}}" cateAlias="{{$cate->alias}}" ><span>Categories {{$cate->name}}</span></h2>
            <ul class="nav nav-list categories">
              <?php $siblingCates = App\Cate::where('parent_id',$cate->parent_id)->get() ?>
              @foreach($siblingCates as $siblingCate)
              <li>
                <a href="category/{{$siblingCate->id}}/{{$siblingCate->alias}}">{{$siblingCate->name}}</a>
                @if(count($siblingCate->childCate))
                    <ul>
                      @foreach($siblingCate->childCate as $childCate)
                        <li>
                          <a href="category/{{$childCate->id}}/{{$childCate->alias}}">{{$childCate->name}}</a>
                        </li>
                      @endforeach
                    </ul> 
                @endif
              </li>
              @endforeach
            </ul>
          </div>
          @endif

          <!-- Search Page Only -->
          @if(isset($search))
          <div class="sidewidt">
            <h2 class="heading2"><span><bold>Seach:</bold> {{$search}}</span></h2>
          </div>
          @endif
         <!--  Best Seller -->  
          <div class="sidewidt hide-on-phone">
            <h2 class="heading2"><span>Best Seller</span></h2>
            <ul class="bestseller">
              @foreach($hotProducts as $product)
              <li>
                <img width="50" height="50" src="upload/product/{{$product->image}}" alt="product" title="product">
                <a class="productname" href="product/{{$product->id}}/{{$product->alias}}"> {{$product->name}} </a>
                <span class="procategory">{{$product->cate->name}}</span>
                <span class="price">{{number_format($product->price)}}</span>
              </li>
              @endforeach
            </ul>
          </div>
          <!-- Latest Product -->  
          <div class="sidewidt hide-on-phone">
            <h2 class="heading2"><span>Latest Products</span></h2>
            <ul class="bestseller">
              @foreach($latestProduct as $product)
              <li>
                <img width="50" height="50" src="upload/product/{{$product->image}}" alt="product" title="product">
                <a class="productname" href="product/{{$product->id}}/{{$product->alias}}"> {{$product->name}}</a>
                <span class="procategory">{{$product->cate->name}}</span>
                <span class="price">{{number_format($product->price)}}</span>
              </li>
              @endforeach
            </ul>
          </div>
        </aside>
        <!-- Sidebar End-->
        <!-- Category-->
        <div class="col-lg-9">          
          <!-- Category Products-->
          <section id="category">
              @if(isset($cate))
               <!-- Sorting-->
                <div class="sorting well">
                  <form class=" form-inline pull-left">
                    Sort By :
                    <select id="sltSort">
                      <option value="default">Default</option>
                      <option @if($method == "name") selected @endif value="name">Name</option>
                      <option @if($method == "price") selected @endif value="price">Price</option>
                    </select>
                  </form>
                </div>
              @endif
               <!-- Category-->
                <section id="categorygrid">
                  <ul class="thumbnails grid">
                    @foreach($products as $product)
                    <li class="col-lg-4 col-sm-6 product-card">
                      <a class="prdocutname" href="product/{{$product->id}}/{{$product->alias}}">{{$product->name}}</a>
                      <div class="thumbnail">
                        <span class="sale tooltip-test">Sale</span>
                        <div class="wrap-image">
                          <a class="image-product" href="product/{{$product->id}}/{{$product->alias}}"><img alt="" src="upload/product/{{$product->image}}"></a>
                        </div>
                        
                        <div class="shortlinks">
                          <a class="details" href="product/{{$product->id}}/{{$product->alias}}">DETAILS</a>
                          <a class="wishlist btn-add-to-cart" product-id="{{$product->id}}" href="#">ADD TO CART</a>
                        </div>
                        <div class="pricetag">
                          <span class="spiral"></span><a product-id="{{$product->id}}" href="#" class="productcart btn-add-to-cart">ADD TO CART</a>
                          <div class="price">
                            <div class="pricenew">{{number_format($product->price)}}</div>
                            <!-- <div class="priceold">$5000.00</div> -->
                          </div>
                        </div>
                      </div>
                    </li>
                    @endforeach
                  </ul>

                  <div>
                    <ul class="pagination pull-right">
                      @if($products->currentPage() > 1)
                        <li><a href="{{$products->url($products->currentPage()-1)}}">Prev</a>
                      @else
                        <li><a href="{{$products->url($products->currentPage())}}">Prev</a>
                      @endif

                      </li>
                      @for($i=1; $i <= $products->lastPage(); $i++)
                      <li class="{{($products->currentPage() == $i)?'active':''}}">
                        <a href="{{$products->url($i)}}">{{$i}}</a>
                      </li>
                      @endfor

                      @if($products->currentPage() < $products->lastPage())
                        <li><a href="{{$products->url($products->currentPage()+1)}}">Next</a>
                      @else
                        <li><a href="{{$products->url($products->currentPage())}}">Next</a>
                      @endif
                      </li>
                    </ul>
                  </div>
                </section>
          </section>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection

@section('script')
<script>
  $(document).ready(function(){
    $("#sltSort").change(function(){
      var cateId = $("#cateId").attr("cateId");
      var cateAlias = $("#cateId").attr("cateAlias");
      var method = $("#sltSort").find(":selected").val();
      window.location.replace("category/"+cateId+"/"+cateAlias+"/"+method);
    });
  });
</script>
@endsection