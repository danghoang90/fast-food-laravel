@extends('frontend.layouts.masterCart')
@section('title','showCart')
@section('content')




<div class="container rounded bg-white p-md-5">
    <div class="h2 font-weight-bold" style="color:darkcyan">Giỏ Hàng Của Bạn </div>
    @if(Session::has('cart') != null)
    @include('frontend.carts.showCart')

    @endif
</div>

@endsection
