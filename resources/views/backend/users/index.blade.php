@extends('backend.layouts.app')
@section('title','Danh sách người dùng')
@section('content')

    {{--    <div class="container">--}}
    {{--        <div class="row">--}}
    {{--            <div class="col-md-12">--}}
    {{--                <a href="{{route('user.add')}}" class="btn btn-primary">Add</a>--}}
    {{--            </div>--}}
    {{--            <table class="table">--}}
    {{--                <thead class="thead-dark">--}}
    {{--                <tr>--}}
    {{--                    <th scope="col">STT</th>--}}
    {{--                    <th scope="col">Name</th>--}}
    {{--                    <th scope="col">Email</th>--}}
    {{--                    <th scope="col">Roles</th>--}}
    {{--                </tr>--}}
    {{--                </thead>--}}
    {{--                <tbody>--}}
    {{--    @foreach($listUser as $user)--}}
    {{--        <tr>--}}
    {{--            <th scope="row">{{$loop->index + 1}}</th>--}}
    {{--            <td>{{$user->name}}</td>--}}
    {{--            <td>{{$user->email}}</td>--}}
    {{--            <td>@foreach($user->roles as $role)--}}
    {{--                    {{ $role->name}}--}}
    {{--                @endforeach--}}
    {{--            </td>--}}
    {{--        </tr>--}}
    {{--    @endforeach--}}
    {{--                </tbody>--}}
    {{--            </table>--}}
    {{--        </div>--}}
    {{--    </div>--}}

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @can('user-crud')
                <a href="{{route('users.add')}}" class="btn btn-primary" style="margin: 10px">Add</a>
                @endcan
{{--                <div class="col-md-8">--}}
{{--                    <div class="input-group mb-3"> <input type="text" class="form-control input-text" placeholder="Search products...." aria-label="Recipient's username" aria-describedby="basic-addon2" name="keyword">--}}
{{--                        <div class="input-group-append"> <a class="btn btn-outline-warning btn-lg" type="button" href="{{route('users.search')}}"><i class="fa fa-search"></i></a> </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
            <div class="col-lg-12">
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                @endif
            </div>
            <div class="col-lg-12">
                <div class="main-box clearfix">
                    <div class="table-responsive">
                        <table class="table user-list">
                            <thead>
                            <tr>
                                <th><span>STT</span></th>
                                <th><span>Name</span></th>
                                <th><span>Email</span></th>
                                <th><span>Role</span></th>
                                <th>&nbsp;</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($listUser as $user)
                                <tr>
                                    <td>
                                        <span class="user-subhead">{{$loop->index + 1}}</span>
                                    </td>
                                    <td>
                                        <a href="#">{{$user->name}}</a>
                                    </td>
                                    <td>
                                        <a href="#">{{$user->email}}</a>
                                    </td>
                                    <td>
                                <span class="label label-default">@foreach($user->roles as $role)
                                        {{ $role->name}}
                                    @endforeach</span>
                                    </td>
                                    <td style="width: 20%;">
{{--                                                                                <a href="#" class="table-link">--}}
{{--                                        									<span class="fa-stack">--}}
{{--                                        										<i class="fa fa-square fa-stack-2x"></i>--}}
{{--                                        										<i class="fa fa-search-plus fa-stack-1x fa-inverse"></i>--}}
{{--                                        									</span>--}}
{{--                                                                                </a>--}}
                                                                                <a href="{{$user->id}}/update" class="table-link">
                                        									<span class="fa-stack">
                                        										<i class="fa fa-square fa-stack-2x"></i>
                                        										<i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                                        									</span>
                                                                                </a>
                                                                                <a href="{{$user->id}}/delete" id="demo"  class="table-link danger" style="color: red" type="button" onclick="return confirm('Are you sure?')">
                                        									<span class="fa-stack">
                                        										<i class="fa fa-square fa-stack-2x"></i>
                                        										<i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
                                        									</span>
                                                                                </a>
{{--                                        <a href="#" class="btn btn-primary">--}}
{{--                                            <i class="fas fa-edit"></i>--}}
{{--                                        </a>--}}
{{--                                        <button data-id="{{$user->id}}" class="btn btn-danger delete-books">--}}
{{--                                            <i class="fas fa-trash"></i>--}}
{{--                                        </button>--}}
                                    </td>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-end">
                            {{$listUser->render()}}
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
{{--    <script>--}}
{{--        function abc(){--}}
{{--            if(confirm("Bấm vào nút OK để tiếp tục") == true){--}}
{{--            true;--}}
{{--            }else{--}}
{{--                document.getElementById("demo").innerHTML =--}}
{{--                    "Bạn không muốn tiếp tục";--}}
{{--            }--}}
{{--        }--}}
{{--    </script>--}}
@endsection
