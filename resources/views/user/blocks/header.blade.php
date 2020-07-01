<!-- Header Start -->
<header>
    <div class="headerstrip">
        <div class="container">
            <div class="row">
                <div class="col-lg-12"> <a href="" class="logo pull-left"><img src="upload/logo.png" alt="SimpleOne" title="SimpleOne"></a> 
                    <!-- Top Nav Start -->
                    <div class="pull-left">
                        <div class="navbar" id="topnav">
                            <div class="navbar-inner">
                                <ul class="nav" >
                                    <li><a class="home active" href="">Home</a> </li>
                                    <li><a class="shoppingcart" href="cart">Shopping Cart</a> </li>
                                    <li><a class="checkout" href="checkout">CheckOut</a> </li>
                                    @if(Auth::check())
                                        <li><a class="myaccount" href="admin/user/edit/{{Auth::user()->id}}">My Account</a> </li>
                                    @else
                                        <li><a class="myaccount" href="admin/login">Login</a> </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Top Nav End -->
                    <div class="pull-right">
                        <form action="search" class="form-search top-search" method="get">
                            <input type="text" class="input-medium search-query" name="txtSearch" placeholder="Search Here…">
                            <button type="submit" style="width:34px; height:34px; position: absolute; right:14px; opacity:0"></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="headerdetails">
            <!-- <div class="pull-left">
                <ul class="nav language pull-left">
                    <li class="dropdown hover"> <a href="#" class="dropdown-toggle" data-toggle="">US Doller <b class="caret"></b></a>
                        <ul class="dropdown-menu currency">
                            <li><a href="#">US Doller</a> </li>
                            <li><a href="#">Euro </a> </li>
                            <li><a href="#">British Pound</a> </li>
                        </ul>
                    </li>
                    <li class="dropdown hover"> <a href="#" class="dropdown-toggle" data-toggle="">English <b class="caret"></b></a>
                        <ul class="dropdown-menu language">
                            <li><a href="#">English</a> </li>
                            <li><a href="#">Spanish</a> </li>
                            <li><a href="#">German</a> </li>
                        </ul>
                    </li>
                </ul>
            </div> -->
            <div class="pull-right">
                <ul class="nav topcart pull-left">
                    <li class="dropdown hover carticon "> <a href="cart" class="dropdown-toggle" > Shopping Cart <span class="label label-orange font14 numberItems">{{(session('cart'))?(session('cart')['numberItems']):0}} item(s)</span> - <span class="totalPrice">{{(session('cart'))?number_format(session('cart')['totalPrice']):0}} VNĐ</span><b class="caret"></b></a>
                        @if(session('cart'))
                        <ul class="dropdown-menu topcartopen ">
                            <li>
                                <table id="table-topcart">
                                    <tbody>
                                    
                                        @foreach(session('cart')['items'] as $id => $item)
                                        <tr product-id={{$id}}>
                                            <td class="image"><a href="product/{{$id}}/product"><img width="50" height="50" src="upload/product/{{$item['image']}}" alt="product" title="product"></a></td>
                                            <td class="name"><a href="product/{{$id}}/product">{{$item['name']}}</a></td>
                                            <td class="quantity">x&nbsp;<span class="numberProduct">{{$item['quality']}}</span></td>
                                            <td class="total">{{number_format($item['price'])}}</td>
                                            <td class="remove"><i class="icon-remove"></i></td>
                                        </tr>
                                        @endforeach
                                     
                                    </tbody>
                                </table>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="textright"><b>Total:</b></td>
                                            <td class="textright totalPrice">{{(session('cart'))?number_format(session('cart')['totalPrice']):0}} VNĐ</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="well pull-right buttonwrap"> 
                                    <a class="btn btn-orange" href="cart">View Cart</a>
                                    <a class="btn btn-orange" href="checkout">Checkout</a> 
                                </div>
                            </li>
                        </ul>
                        @endif  
                    </li>
                </ul>
            </div>
        </div>
        @include("user.blocks.nav")
    </div>
</header>
<!-- Header End -->