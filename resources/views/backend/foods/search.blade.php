@extends('backend.layouts.app')
@section('title','Danh sách đồ ăn')
@section('content')





    <div class="container">
        <div class="table-wrap">
            <div class="col-md-12">
                <a href="{{route('foods.list')}}" class="btn btn-warning" style="margin: 10px">List Food</a>
            </div>
            <h4 style="color:green">Tìm Thấy {{count($product)}} Sản Phẩm</h4>
{{--            <div style="float: right">--}}
{{--                <a href="{{route('foods.add')}}" class="btn btn-primary" style="margin: 10px">   Add   </a>--}}
{{--            </div>--}}
            {{--            <div class="col-md-8">--}}
            {{--                <div class="input-group mb-3"> <input type="text" class="form-control input-text" placeholder="Search users...." aria-label="Recipient's username" aria-describedby="basic-addon2">--}}
            {{--                    <div class="input-group-append"> <button class="btn btn-outline-warning btn-lg" type="button"><i class="fa fa-search"></i></button> </div>--}}
            {{--                </div>--}}
            {{--            </div>--}}
{{--            <div class="col-lg-12">--}}
{{--                @if (session('success'))--}}
{{--                    <div class="alert alert-success" role="alert">--}}
{{--                        {{ session('success') }}--}}
{{--                    </div>--}}
{{--                @endif--}}
{{--            </div>--}}
            <table class="table table-responsive table-borderless">
                <thead>
                <th class="text-center">Image</th>
                <th>Name</th>
                <th>Status</th>
                <th>Price</th>
                <th>Category</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
                </thead>
                <tbody>
                @foreach($product as $food)
                    <tr class="align-middle alert border-bottom" role="alert">
                        <td >
                            @if($food->image)
                                <img src="{{ asset('storage/' . $food->image) }}" alt=""
                                     style="width: 120px">
                            @else
                                {{'chưa có ảnh '}}
                            @endif
                        </td>
                        <td>
                            <div>
                                <p class="m-0 fw-bold">{{$food->name}}</p>
                            </div>
                        </td>
                        <td>
                            <p class="m-0 fw-bold">{{$food->status}}</p>
                        </td>
                        <td>
                            <p class="m-0 fw-bold">{{$food->price}}</p>
                        </td>
                        <td>
                            @foreach($food->category as $cate)
                                <p class="m-0 fw-bold">
                                    {{$cate->name}}
                                </p>
                            @endforeach
                        </td>

                        <td>
                            <a href="#" class="table-link" style="color:#1ebc8d;">
                                        									<span class="fa-stack">
                                        										<i class="fa fa-square fa-stack-2x"></i>
                                        										<i class="fa fa-search-plus fa-stack-1x fa-inverse"></i>
                                        									</span>
                            </a>
                        </td>
                        <td>
                            <a href="foods/{{$food->id}}/update" class="table-link" style="color: #0c84ff">
                                        									<span class="fa-stack">
                                        										<i class="fa fa-square fa-stack-2x"></i>
                                        										<i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                                        									</span>
                            </a>
                        </td>
                        <td><a href="foods/{{$food->id}}/delete" class="table-link danger" style="color: red">
                                        									<span class="fa-stack">
                                        										<i class="fa fa-square fa-stack-2x"></i>
                                        										<i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
                                        									</span>
                            </a>
                        </td>
                    </tr>
                @endforeach
                {{--            <tr class="align-middle alert border-bottom" role="alert">--}}
                {{--                <td> <input type="checkbox" id="check"> </td>--}}
                {{--                <td class="text-center"> <img class="pic" src="https://www.freepnglogos.com/uploads/shoes-png/download-vector-shoes-image-png-image-pngimg-2.png" alt=""> </td>--}}
                {{--                <td>--}}
                {{--                    <div>--}}
                {{--                        <p class="m-0 fw-bold">Sneakers Shoes 2020 For Men</p>--}}
                {{--                        <p class="m-0 text-muted">Fugiat Voluptates quasi nemo,ipsa perferencis</p>--}}
                {{--                    </div>--}}
                {{--                </td>--}}
                {{--                <td>--}}
                {{--                    <div class="fw-600">$54.99</div>--}}
                {{--                </td>--}}
                {{--                <td class="d-"> <input class="input" type="text" placeholder="2"> </td>--}}
                {{--                <td> $108.98 </td>--}}
                {{--                <td>--}}
                {{--                    <div class="btn" data-bs-dismiss="alert"> <span class="fas fa-times"></span> </div>--}}
                {{--                </td>--}}
                {{--            </tr>--}}
                {{--            <tr class="align-middle alert border-bottom" role="alert">--}}
                {{--                <td> <input type="checkbox" id="check"> </td>--}}
                {{--                <td class="text-center"> <img class="pic" src="https://www.freepnglogos.com/uploads/shoes-png/running-shoes-png-transparent-running-shoes-images-6.png" alt=""> </td>--}}
                {{--                <td>--}}
                {{--                    <div>--}}
                {{--                        <p class="m-0 fw-bold">Sneakers Shoes 2020 For Men</p>--}}
                {{--                        <p class="m-0 text-muted">Fugiat Voluptates quasi nemo,ipsa perferencis</p>--}}
                {{--                    </div>--}}
                {{--                </td>--}}
                {{--                <td>--}}
                {{--                    <div class="fw-600">$50.99</div>--}}
                {{--                </td>--}}
                {{--                <td class="d-"> <input class="input" type="text" placeholder="2"> </td>--}}
                {{--                <td> $100.98 </td>--}}
                {{--                <td>--}}
                {{--                    <div class="btn" data-bs-dismiss="alert"> <span class="fas fa-times"></span> </div>--}}
                {{--                </td>--}}
                {{--            </tr>--}}
                {{--            <tr class="align-middle alert border-bottom" role="alert">--}}
                {{--                <td> <input type="checkbox" id="check"> </td>--}}
                {{--                <td class="text-center"> <img class="pic" src="https://www.freepnglogos.com/uploads/shoes-png/find-your-perfect-running-shoes-26.png" alt=""> </td>--}}
                {{--                <td>--}}
                {{--                    <div>--}}
                {{--                        <p class="m-0 fw-bold">Sneakers Shoes 2020 For Men</p>--}}
                {{--                        <p class="m-0 text-muted">Fugiat Voluptates quasi nemo,ipsa perferencis</p>--}}
                {{--                    </div>--}}
                {{--                </td>--}}
                {{--                <td>--}}
                {{--                    <div class="fw-600">$74.99</div>--}}
                {{--                </td>--}}
                {{--                <td> <input class="input" type="text" placeholder="2"> </td>--}}
                {{--                <td> $148.98 </td>--}}
                {{--                <td>--}}
                {{--                    <div class="btn" data-bs-dismiss="alert"> <span class="fas fa-times"></span> </div>--}}
                {{--                </td>--}}
                {{--            </tr>--}}
                </tbody>
            </table>
        </div>
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-end">
                {{$product->render()}}
            </ul>
        </nav>
    </div>


    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Roboto', sans-serif
        }

        .pic {
            width: 50px;
            height: 50px;
            object-fit: contain
        }

        .table thead {
            background-color: #21cf95
        }

        .table thead th {
            padding: 30px;
            font-size: 14px;
            color: white
        }

        .table tbody td input[type="checkbox"] {
            appearance: none;
            width: 20px;
            height: 20px;
            background-color: #eee;
            position: relative;
            border-radius: 3px;
            cursor: pointer
        }

        .container .table-wrap {
            margin: 20px auto;
            overflow-x: auto
        }

        .container .table-wrap::-webkit-scrollbar {
            height: 5px
        }

        .container .table-wrap::-webkit-scrollbar-thumb {
            border-radius: 5px;
            background-image: linear-gradient(to right, #5D7ECD, #0C91E6)
        }

        .table > :not(caption) > * > * {
            padding: 2rem 0.5rem
        }

        .input {
            width: 30px;
            height: 30px;
            color: black;
            font-weight: 600;
            outline: none;
            padding: 8px
        }

        ::placeholder {
            color: black;
            font-weight: 600
        }

        .table tbody td input[type="checkbox"]:after {
            position: absolute;
            width: 100%;
            height: 100%;
            font-family: "Font Awesome 5 Free";
            font-weight: 600;
            content: "\f00c";
            color: #fff;
            font-size: 15px;
            display: none
        }

        .table tbody td input[type="checkbox"]:checked,
        .table tbody td input[type="checkbox"]:checked:hover {
            background-color: #21cf95
        }

        .table tbody td input[type="checkbox"]:checked::after {
            display: flex;
            align-items: center;
            justify-content: center
        }

        .table tbody td input[type="checkbox"]:hover {
            background-color: #ddd
        }

        .table tbody td {
            padding: 30px;
            margin: 0;
            font-size: 14.5px;
            font-weight: 600
        }

        .table tbody td .fa-times {
            color: #D32F2F
        }

        .text-muted {
            font-size: 12.5px
        }

        .table tbody tr td:nth-of-type(3) {
            min-width: 320px
        }

        @media (min-width: 992px) {
            .container .table-wrap {
                overflow: hidden
            }
        }
    </style>
@endsection

