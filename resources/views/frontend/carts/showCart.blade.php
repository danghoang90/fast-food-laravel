<div class="table-responsive">
    <table class="table update_cart_url" data-url="{{route('cart.updateCart')}}">
        <thead class="delete_cart_url" data-url="{{route('cart.deleteCart')}}">
        <tr>
{{--            <th>Id</th>--}}
            <th scope="col" style="text-align: center">Tên Sản Phẩm</th>
            <th scope="col">Tình Trạng</th>
            <th scope="col">Số Lượng</th>
            <th scope="col">Giá</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @if(Session::has('cart') != null)
            @php
            $cartPrice = 0;
            @endphp
        @foreach($cart as $id => $ca)
                      @php
                      $cartPrice = $ca['quantity'] * $ca['price'];
                      @endphp
            <tr id="product-cart-{{$id}}" class="bg-blue cart">
{{--                <td>{{$id}}</td>--}}
                <td class="pt-2"> <img src="{{ asset('storage/' . $ca['image']) }}" class="rounded-circle" alt="">
                    <div class="pl-lg-5 pl-md-3 pl-1 name">{{$ca['name']}}</div>
                </td>
                <td class="pt-3 mt-1">{{$ca['status']}}</td>
                <td class="pt-3">
                    <input type="number" class="quantity-update-{{$id}}" value="{{$ca['quantity']}}" min="1" style="width: 40px">
                </td>
                <td class="pt-3" style="color: red" id="cart-price">{{$cartPrice}}.000VND</td>
                <td class="pt-3">
                    <div class="social_icon2">
                        <button data-id="{{$id}}" class="btn btn-primary cart_update">Cập Nhật</button>
                        <button data-id="{{$id}}"  class="btn btn-danger cart_delete" onclick="abc()">Xoá</button>
                    </div>
                </td>
            </tr>

            <tr id="spacing-row">
                <td></td>
            </tr>
        @endforeach
        @endif

        </tbody>
    </table>
    <hr style="border: 1px solid darkturquoise">
    <div style="float: right; width: 300px">
        <div class="row lower">
            <div class="col text-left">Số lượng:</div>
            <div class="col"><b id="total-quantity-cart">{{$totalQuantity}} </b><b> (sản phẩm)</b></div>
        </div>
        <div class="row lower">
            <div class="col text-left">Giảm giá:</div>
            <div class="col">-0</div>
        </div>
        <div class="row lower">
            <div class="col text-left"><b>Tổng tiền:</b></div>
            <div class="col" style="color: red"><b style="color: red" id="total-price-cart">{{$totalPrice}}</b>.000 ĐỒNG
            </div>
        </div>
        <div class="row lower">
            <a  href="{{route('home.index')}}">
                <button class="btn btn-warning" style="margin: 10px">

                    Tiếp tục mua hàng

                </button>
            </a>
            <a  href="{{route('cart.order')}}">

            <button class="btn btn-success" style="float: right; margin: 10px">Đặt Hàng</button>
            </a>
        </div>
    </div>

</div>
