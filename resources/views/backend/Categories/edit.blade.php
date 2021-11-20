@extends('backend.layouts.app')
@section('title', 'Thêm mới Đô ăn')
@section('content')
    @include('backend.users.alert')

    <div class="card-body">
        <form action="{{ route('categories.edit', $category->id) }}"  class="form" method="post">
            @csrf
            <div class="form-group">
                <lable>Thể Loại </lable><strong class="text-danger">*</strong>
                <input type="text" value="{{$category->name}}"
                       class="form-control @error('name') is-invalid  @enderror" name="name">
                @error('name')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <button class="btn btn-primary" type="submit">  Sửa</button>
        </form>
    </div>


@endsection
