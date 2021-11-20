@extends('backend.layouts.app')
@section('title', 'Chi Tiết Đô ăn')
@section('content')


    <!--Section: Block Content-->
    <section class="mb-5">
        <div class="col-md-12">
            <a href="{{route('foods.list')}}" class="btn btn-warning" style="margin: 10px">Back</a>
        </div>
        <div class="row">
            <div class="col-md-6 mb-4 mb-md-0">

                <div id="mdb-lightbox-ui"></div>

                <div class="mdb-lightbox">

                    <div class="row product-gallery mx-1">

                        <div class="col-12 mb-0">
                            <figure class="view overlay rounded z-depth-1 main-img">
                                <a href="#"
                                   data-size="710x823">
                                    <img src="{{ asset('storage/' . $food->image) }}"
                                         class="img-fluid z-depth-1">
                                </a>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">

                <h3>{{$food->name}}</h3>
                <p><span class="mr-1"><strong>Thể Loại</strong></span></p>
                <ul class="rating">
                    @foreach($food->category as $cate)
                    <li>
                        <i class="fas fa-star fa-sm text-primary">{{$cate->name}}</i>
                    </li>
                    @endforeach
                </ul>
                <p><span class="mr-1"><strong>Mô Tả Sản Phẩm</strong></span></p>
                <p class="pt-1">{{$food->desc}}</p>
                <div class="table-responsive">
                    <table class="table table-sm table-borderless mb-0">
                        <tbody>
                        <tr>
                            <th class="pl-0 w-25" scope="row"><strong>Tình Trạng:</strong></th>
                            <td>{{$food->status}}</td>
                        </tr> <tr>
                            <th class="pl-0 w-25" scope="row"><strong>Giá Bán:</strong></th>
                            <td style="color: red">{{$food->price}} VND</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <hr>
            </div>
        </div>

    </section>
    <!--Section: Block Content-->

    <script>
        $(document).ready(function () {
            // MDB Lightbox Init
            $(function () {
                $("#mdb-lightbox-ui").load("mdb-addons/mdb-lightbox-ui.html");
            });
        });
    </script>


@endsection
