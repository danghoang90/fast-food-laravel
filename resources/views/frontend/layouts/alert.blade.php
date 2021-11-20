@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li style="color: red">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


@if(Session::has('success'))
    <div class="alert alert-danger">
       <h3 style="color: greenyellow"> {{ Session::get('success') }}</h3>
    </div>
@endif

@if(Session::has('messenger'))
    <div class="alert alert-danger">
        <h3 style="color: red"> {{ Session::get('messenger') }}</h3>
    </div>
@endif
