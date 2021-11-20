@extends('backend.layouts.app')
@section('title', 'Thêm mới Đô ăn')
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="card-title" style="color:violet">Thêm mới đồ ăn</h2>

                        </div>
                        <div class="col-md-12">
                            <a href="{{route('foods.list')}}" class="btn btn-warning" style="margin: 10px">Back</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="{{ route('foods.postAdd') }}" enctype="multipart/form-data" class="form" method="post">
                                @csrf
                                <div class="form-group">
                                    <lable>Tên</lable><strong class="text-danger">*</strong>
                                    <input type="text" value="{{ old('name') }}"
                                           class="form-control @error('name') is-invalid  @enderror" name="name">
                                    @error('name')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <lable>Mô tả</lable><strong class="text-danger">*</strong>
                                    <input type="text" value="{{ old('desc') }}"
                                           class="form-control @error('desc') is-invalid  @enderror" name="desc">
                                    @error('desc')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlFile1">Ảnh</label>
                                    <strong class="text-danger">*</strong>
                                    <input type="file" name="image" class="form-control-file @error('image') is-invalid  @enderror">
                                    @error('image')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Trạng thái</label>
                                    <strong class="text-danger">*</strong>
                                    <input type="text" value="{{ old('status') }}"
                                           class="form-control @error('status') is-invalid  @enderror" name="status">
                                    @error('status')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Giá bán</label>
                                    <strong class="text-danger">*</strong>
                                    <input type="text" value="{{ old('price') }}"
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
                                        <input class="form-check-input" type="checkbox" name="category[{{$category->id}}]" id="gridRadios1" value="{{$category->id}}">
                                        <label class="form-check-label" for="gridRadios1" >
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

