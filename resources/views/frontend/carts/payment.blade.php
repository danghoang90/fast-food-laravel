@extends('frontend.layouts.master')
@section('title','payment')
@section('content')
    <div>
        @include('frontend.layouts.alert')

        <h1 style="font-size: xxx-large; color: darkcyan;"> Đơn Hàng Của Bạn</h1>

    </div>
    @if(Session::has('cart') != null && Session::has('cart') != null)
        <table class="table table-striped ">
            <!--Table head-->
            <thead>
            <tr>
                <th>Tên Khách Hàng</th>
                <th>Địa Chỉ Nhận Hàng</th>
                <th>Số Điện Thoại</th>
                <th>Hình Thức Thanh Toán</th>
            </tr>
            </thead>
            <tbody>
            <tr class="table-info">
                <td >{{$order['name']}}</td>
                <td >{{$order['address']}}</td>
                <td >{{$order['phone']}}</td>
                <td >{{$order['typePay']}}</td>
            </tr>
            </tbody>
        </table>
    <!--Table-->
    <table class="table table-striped ">
        <!--Table head-->
        <thead>
        <tr>
            <th></th>
            <th>Tên Sản Phẩm</th>
            <th>Hình Ảnh</th>
            <th style="text-align: center">Số Lượng</th>
            <th>Tổng Tiền</th>
        </tr>
        </thead>
        <!--Table head-->

        <!--Table body-->
        <tbody>
            @foreach($cart as $id => $ca)
                @php
                    $cartPrice = $ca['quantity'] * $ca['price'];
                @endphp
        <tr class="table-info">
            <th scope="row"></th>
            <td>{{$ca['name']}}</td>
            <td><img src=" {{ asset('storage/' . $ca['image']) }}" width="82" height="82"></td>
            <td style="text-align: center">{{$ca['quantity']}}</td>
            <td><b>{{$cartPrice}}<small style="color: red">.000VND</small></b></td>
        </tr>
            @endforeach
        @endif
        </tbody>
        <!--Table body-->


    </table>
    <!--Table-->

@endsection
