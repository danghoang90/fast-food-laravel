@extends('frontend.layouts.master')
@section('title','Discount')
@section('content')

    <h4 style="color:green">Sản Phẩm Giảm Giá</h4>
    <hr>

    <div class="kfc_menu_list pc">
        <div class="row_sp">
            <div class="row no-gutters">
                @php
                    $oldPrice = 0;
                    @endphp
                @foreach($product as  $food)
                    @php
                        $oldPrice = $food->price + $food->price /10 ;
                    @endphp
                    <div class="col-6 col-lg-4">
                        <div class="card ">
                            <div class="sp_slider">
                                <a href="#">
                                    <img src="{{ asset('storage/' . $food->image) }}" class="card-img-top"
                                         alt="COMBO GÀ RÁN A" width="100%" height="120%">
                                </a>
                            </div>
                            <div class="card-body">
                                <h4 class="card-title" style="color:orangered"><span>{{$food->name}}</span></h4>
                                <h6 class="card-price">
                                    <span>{{$food->price}}<small>.000đ</small>
                                    </span>
                                    <em class="old_price">
                                        {{$oldPrice}}<small>.000đ</small>
                                    </em>
                                </h6>
                                <div class="card-text">
                            <span>
                                <ul>
                                    <li style="color: red">{{$food->status}}</li>
                                    <li>{{$food->desc}}</li>
                                </ul>
                            </span>
                                </div>
                            </div>
                            <div class="row_btn">
                                <div class="row no-gutters">
                                    <div class="col order-lg-1">
                                        <a href="#" class="button btn_custom"type="button" data-toggle="modal" data-target="#{{$food->id}}"><span>Chi Tiết</span></a>
                                    </div>
                                    <div class="col order-lg-2">
                                        <a class="button btn_add addToCart"
                                           data-url = "{{route('cart.addCart', ['id' => $food->id])}}"
                                        ><span class="glyphicon glyphicon-shopping-cart">Đặt hàng</span></a>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade product_view" id="{{$food->id}}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <a href="#" data-dismiss="modal" class="class pull-right"><span class="glyphicon glyphicon-remove"></span></a>
                                            <h3 class="modal-title" style="color:darkviolet">Chi tiết sản phẩm</h3>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-6 product_img">
                                                    <img src="{{ asset('storage/' . $food->image) }}" class="img-responsive">
                                                </div>
                                                <div class="col-md-6 product_content">
                                                    <h4>Tên sản phẩm: <span style="color: red">{{$food->name}}</span></h4>
                                                    <div class="rating">
                                                        Mô Tả:
                                                    </div>
                                                    <p>{{$food->desc}}</p>
                                                    <h3 class="cost"> Giá Bán: <span class="glyphicon glyphicon-usd" style="color:red">{{$food->price}}<small>.000đ</small></span>
                                                        <em class="old_price">
                                                            {{$oldPrice}}<small>.000đ</small>
                                                        </em>
                                                    </h3>
                                                    <h3 class="cost"> Tình Trạng: <span class="glyphicon glyphicon-usd" style="color:red">{{$food->status}}</span> </h3>
                                                    <h3 class="rating">Thể Loại:

                                                        @foreach($food->category()->get() as $cate)
                                                            <li style="color: green">
                                                                {{$cate->name}}
                                                            </li>
                                                        @endforeach
                                                    </h3>
                                                    <div class="space-ten"></div>
                                                    <div class="btn-ground">
                                                        <button class="btn btn-danger">
                                                            <a class="button btn_add addToCart"
                                                               data-url = "{{route('cart.addCart', ['id' => $food->id])}}"
                                                            ><span class="glyphicon glyphicon-shopping-cart">Đặt hàng</span></a>
                                                        </button>
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="float: right">Close</button>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-end">
                {{$product->render()}}
            </ul>
        </nav>
    </div>


@endsection


