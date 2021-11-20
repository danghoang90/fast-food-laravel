@extends('backend.layouts.app')
@section('title','Danh sách thể loại đồ ăn')
@section('content')
    @include('backend.users.alert')
        <h3>Danh sách thể loại</h3>
        <button class="btn btn-warning" style="margin: 2px">
            <a href="{{route('categories.add')}}">
                Thêm thể loại
            </a>
        </button>
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Thể Loại</th>
                <th scope="col"></th>
                <th scope="col">Xử Lý</th>
            </tr>
            </thead>
            <tbody>
            @foreach($category as $cate)
            <tr>
                <td>{{$cate->name}}</td>
                <td></td>
                <td>
                    <a href="{{route('categories.update', $cate->id)}}" class="table-link" style="color: #0c84ff">
                           <span class="fa-stack">
                             <i class="fa fa-square fa-stack-2x"></i>
                             <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                           </span>
                    </a>
                    <a href="{{route('categories.delete', $cate->id)}}" class="table-link danger" style="color: red" type="button"
                       onclick="return confirm('Are you sure?')">
                           <span class="fa-stack">
                              <i class="fa fa-square fa-stack-2x"></i>
                              <i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
                           </span>
                    </a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>


@endsection
