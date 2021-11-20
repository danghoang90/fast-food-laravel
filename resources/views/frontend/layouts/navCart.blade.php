<div class="cart_box" id="cartBox">
    <div class="dropdown">
        <a class="btn dropdown-toggle" href="{{route('cart.showCart')}}">
                        <span class="icon">
{{--                             @if(session()->has('cart'))--}}

                                <span class="number" id="cartQty">{{session()->has('cart')? count(session()->get('cart')) : 0}}</span>

{{--                            @else--}}
{{--                                <span class="number" id="cartQty">0</span>--}}
{{--                            @endif--}}
                        </span>
            <span class="text">Giỏ hàng</span>
            <span class="card-price" id="cartTotal"></span>
        </a>
    </div>

</div>

