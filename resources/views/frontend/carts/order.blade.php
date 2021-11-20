@extends('frontend.layouts.masterCart')
@section('title','showOder')
@section('content')
    <style>
        body {
            background: linear-gradient(110deg, #BBDEFB 60%, #42A5F5 60%)
        }

        .shop {
            font-size: 10px
        }

        .space {
            letter-spacing: 0.8px !important
        }

        .second a:hover {
            color: rgb(92, 92, 92)
        }

        .active-2 {
            color: rgb(92, 92, 92)
        }

        .breadcrumb>li+li:before {
            content: "" !important
        }

        .breadcrumb {
            padding: 0px;
            font-size: 10px;
            color: #aaa !important
        }

        .first {
            background-color: white
        }

        a {
            text-decoration: none !important;
            color: #aaa
        }

        .btn-lg,
        .form-control-sm:focus,
        .form-control-sm:active,
        a:focus,
        a:active {
            outline: none !important;
            box-shadow: none !important
        }

        .form-control-sm:focus {
            border: 1.5px solid #4bb8a9
        }

        .btn-group-lg>.btn,
        .btn-lg {
            padding: .5rem 0.1rem;
            font-size: 1rem;
            border-radius: 0;
            color: white !important;
            background-color: #4bb8a9;
            height: 2.8rem !important;
            border-radius: 0.2rem !important
        }

        .btn-group-lg>.btn:hover,
        .btn-lg:hover {
            background-color: #26A69A
        }

        .btn-outline-primary {
            background-color: #fff !important;
            color: #4bb8a9 !important;
            border-radius: 0.2rem !important;
            border: 1px solid #4bb8a9
        }

        .btn-outline-primary:hover {
            background-color: #4bb8a9 !important;
            color: #fff !important;
            border: 1px solid #4bb8a9
        }

        .card-2 {
            margin-top: 40px !important
        }

        .card-header {
            background-color: #fff;
            border-bottom: 0px solid #aaaa !important
        }

        p {
            font-size: 13px
        }

        .small {
            font-size: 9px !important
        }

        .form-control-sm {
            height: calc(2.2em + .5rem + 2px);
            font-size: .875rem;
            line-height: 1.5;
            border-radius: 0
        }

        .cursor-pointer {
            cursor: pointer
        }

        .boxed {
            padding: 0px 8px 0 8px;
            background-color: #4bb8a9;
            color: white
        }

        .boxed-1 {
            padding: 0px 8px 0 8px;
            color: black !important;
            border: 1px solid #aaaa
        }

        .bell {
            opacity: 0.5;
            cursor: pointer
        }

        @media (max-width: 767px) {
            .breadcrumb-item+.breadcrumb-item {
                padding-left: 0
            }
        }
    </style>


    @include('frontend.layouts.alert')
    <div class=" container-fluid my-5 ">
        <div class="row justify-content-center ">
            <div class="col-xl-12">
                    <div class="row justify-content-around">
                        <div class="col-md-6">
                            <div class="card-body pt-0">
                                <div class="card border-0 ">
                                    <div class="card-header card-2">
                                        <h2 class="card-text text-muted mt-md-4 mb-2 space">THÔNG TIN NGƯỜI NHẬN </h2>


                                        <hr class="my-2">
                                    </div>
                                </div>
                                <div class="card-body pt-0">
                                    <form action="{{route('cart.payment')}}" method="get">
                                        @csrf
                                    <div class="form-group">
                                        <h6 for="NAME" class=" text-muted mb-1">
                                            Tên Khách Hàng:
                                        </h6>

                                        <input type="text" class="form-control @error('name') is-invalid  @enderror" name="name" id="NAME" aria-describedby="helpId" placeholder="Tên khách hàng...">
                                    </div>
                                        <div class="form-group">
                                        <h6 for="NAME" class=" text-muted mb-1">
                                            Địa Chỉ Giao Hàng:
                                        </h6>

                                        <input type="text" class="form-control @error('address') is-invalid  @enderror" name="address" id="NAME" aria-describedby="helpId" placeholder="số nhà/tên đường/thành phố...">
                                    </div>
                                    <div class="form-group">
                                        <h6 for="NAME" class=" text-muted mb-1">
                                            Số Điện Thoại:
                                        </h6>
                                        <input type="text" class="form-control @error('phone') is-invalid  @enderror" name="phone" id="NAME" aria-describedby="helpId" placeholder="vd: 0969xxx">
                                    </div>
                                    <div class="form-group"> <h6 for="NAME" class=" text-muted mb-1">Hình Thức Thanh Toán:</h6> </div>
                                    <div class="row no-gutters">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="typePay" id="exampleRadios1" value="Thanh Toán Khi Nhận Hàng" checked>
                                            <label class="form-check-label" for="exampleRadios1">
                                                Thanh Toán Khi Nhận Hàng
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="typePay" id="exampleRadios2" value="Thanh Toán Chuyển Khoản">
                                            <label class="form-check-label" for="exampleRadios2">
                                                Thanh Toán Chuyển Khoản
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row mb-md-5">
                                        <div class="col"> <button type="submit" name="" id="" class="btn btn-lg btn-block ">THANH TOÁN </button> </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card border-0 ">
                                <div class="card-header card-2">
                                    <h2 class="card-text text-muted mt-md-4 mb-2 space">ĐƠN HÀNG CỦA BẠN </h2>
                                    <hr class="my-2">
                                </div>
                            </div>
                                <div class="card-body pt-0">
                                    @if(Session::has('cart') != null)
                                        @php
                                            $cartPrice = 0;
                                        @endphp
                                        @foreach($cart as $id => $ca)
                                            @php
                                                $cartPrice = $ca['quantity'] * $ca['price'];
                                            @endphp
                                    <div class="row justify-content-between">
                                        <div class="col-auto col-md-7">
                                            <div class="media flex-column flex-sm-row"> <img src=" {{ asset('storage/' . $ca['image']) }}" width="82" height="82">
                                                <div class="media-body my-auto">

                                                        <div class="col-auto">
                                                            <h4 class="mb-0"><b>{{$ca['name']}}</b></h4>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" pl-0 flex-sm-col col-auto my-auto">
                                            <p class="boxed-1">{{$ca['quantity']}}</p>
                                        </div>
                                        <div class=" pl-0 flex-sm-col col-auto my-auto ">
                                            <h4 style="color: red; size: A3"><b>{{$cartPrice}}<small style="color: red">.000VND</small></b></h4>
                                        </div>
                                    </div>

                                    @endforeach
                                    @endif

                                    <hr class="my-2">
                                    <div class="row ">
                                        <div class="col">
                                            <div class="row justify-content-between">
                                                <div class="col text-left" >
                                                    <h2><b>Phí Giao Hàng:</b></h2>
                                                </div>
                                                <div class="flex-sm-col col-auto" >
                                                    <h3 class="mb-1" style="color: red; float: right"><b>{{$totalPrice < 100 ? 20 : 0}}.000VND</b></h3>
                                                </div>
                                            </div>
                                            <div class="row justify-content-between">
                                                <div class="col text-left">
                                                    <h2><b>Total:</b></h2>
                                                </div>
                                                <div class="flex-sm-col col-auto" >
                                                    <h3 class="mb-1" style="color: red; float: right"><b>{{$totalPrice}}.000VND</b></h3>
                                                </div>
                                            </div>
                                            <hr class="my-0">
                                        </div>

                                    </div>
                                </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
