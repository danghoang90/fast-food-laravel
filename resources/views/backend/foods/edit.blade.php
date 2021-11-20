@extends('backend.layouts.app')
@section('title', 'Thêm mới Đô ăn')
@section('content')
    <!-- Content Header (Page header) -->
    {{--    <section class="content-header">--}}
    {{--        <div class="container-fluid">--}}
    {{--            <div class="row mb-2">--}}
    {{--                <div class="col-sm-6">--}}

    {{--                </div>--}}
    {{--                <div class="col-sm-6">--}}
    {{--                    <ol class="breadcrumb float-sm-right">--}}
    {{--                        <li class="breadcrumb-item"><a href="#">Home</a></li>--}}

    {{--                    </ol>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div><!-- /.container-fluid -->--}}
    {{--    </section>--}}

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="card-title" style="color:violet">Chỉnh sửa đồ ăn</h2>
                        </div>
                        <div class="col-md-12">
                            <a href="{{route('foods.list')}}" class="btn btn-warning" style="margin: 10px">Back</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="" enctype="multipart/form-data" class="form" method="post">
                                @csrf
                                <div class="form-group">
                                    <lable>Tên</lable><strong class="text-danger">*</strong>
                                    <input type="text" value="{{$food->name}}"
                                           class="form-control @error('name') is-invalid  @enderror" name="name">
                                    @error('name')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <lable>Mô tả</lable><strong class="text-danger">*</strong>
                                    <input type="text" value="{{ $food->desc }}"
                                           class="form-control @error('desc') is-invalid  @enderror" name="desc">
                                    @error('desc')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlFile1">Ảnh</label>
                                    <img src="{{ asset('storage/' . $food->image) }}" alt="" width="200px">
                                    <strong class="text-danger">*</strong>
                                    <input type="file" name="image" class="form-control-file" value="{{ asset('storage/' . $food->image) }}">
                                </div>

                                <div class="form-group">
                                    <label>Trạng thái</label>
                                    <strong class="text-danger">*</strong>
                                    <input type="text" value="{{ $food->status }}"
                                           class="form-control @error('status') is-invalid  @enderror" name="status">
                                    @error('status')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Giá bán</label>
                                    <strong class="text-danger">*</strong>
                                    <input type="text" value="{{$food->price}}"
                                           class="form-control @error('price') is-invalid  @enderror" name="price">
                                    @error('price')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Thể loại</label>
                                    <strong class="text-danger">*</strong>
                                    @foreach($categories as $category)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="category[{{$category->id}}]" id="category-{{$category->id}}" value="{{$category->id}}">
                                            <label class="form-check-label" for="category-{{$category->id}}" >
                                                {{$category->name}}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                                <button type="submit" class="btn btn-primary">Lưu</button>
                                <p>Trường <strong class="text-danger"> * </strong> là trường bắt buộc!</p>
                            </form>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection


