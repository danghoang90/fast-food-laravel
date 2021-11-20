@extends('backend.layouts.app')
@section('title', 'Thêm mới  thể loại')
@section('content')
    @include('backend.users.alert')

    <div class="card-body">
        <form action="{{ route('categories.postAdd') }}"  class="form" method="post">
            @csrf
            <div class="form-group">
                <lable>Thể Loại </lable><strong class="text-danger">*</strong>
                <input type="text" placeholder="Hãy điền thể loại mới"
                       class="form-control @error('name') is-invalid  @enderror" name="name">
                @error('name')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <button class="btn btn-primary" type="submit"> Thêm</button>
        </form>
    </div>


@endsection
