@extends('backend.layouts.app')
@section('title','Sửa người dùng')
@section('content')

    <div class="container" style="margin-top: 20px">
        <div class="col-md-12">
            <a href="{{route('users.index')}}" class="btn btn-warning" style="margin: 10px">Back</a>
            @include('backend.users.alert')

        </div>
        <form method="post" action="">
            @csrf
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('name') is-invalid  @enderror" id="inputEmail3" placeholder="Name" name="name" value="{{$user->name}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control @error('email') is-invalid  @enderror" id="inputEmail3" placeholder="Email" name="email" value="{{$user->email}}">
                </div>
            </div>
{{--            <div class="form-group row">--}}
{{--                <label for="inputPassword3" class="col-sm-2 col-form-label">Confirm Password</label>--}}
{{--                <div class="col-sm-10">--}}
{{--                    <input type="password" class="form-control" id="inputPassword3" placeholder="Confirm Password" name="confirmPassword">--}}
{{--                </div>--}}
{{--            </div>--}}
            <fieldset class="form-group">
                <div class="row">
                    <label class="col-form-label col-sm-2 pt-0" name="role">Role</label>
                    <div class="col-sm-10">
                        <!--                            --><?php
                        //                            if (is_array($roles) || is_object($roles)) ?>
                        @foreach($roles as $role)
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="role" id="gridRadios1" value="{{$role->id}}" checked>
                                <label class="form-check-label" for="gridRadios1" >
                                    {{$role->name}}
                                </label>
                            </div>
                        @endforeach

                    </div>
                </div>
            </fieldset>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>

@endsection


