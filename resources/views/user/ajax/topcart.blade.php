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