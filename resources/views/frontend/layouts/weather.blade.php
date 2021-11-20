{{--<div class="card bg-dark text-white" style="border-radius: 40px;">--}}
@php

    date_default_timezone_set('Asia/Ho_Chi_Minh');

@endphp
    <div class="bg-image" style="border-radius: 35px;">
        <img
            src="https://mdbootstrap.com/img/Photos/new-templates/bootstrap-weather/draw1.png"
            class="card-img"
            alt="weather"
            height="100%"
        />
        <div class="mask" style="background-color: rgba(190, 216, 232, .5);"></div>
    </div>
    <div class="card-img-overlay text-dark p-5">
        <h2 class="mb-0" style="font-size: x-large">{{$data->name}},{{ date("l g:i a", $currentTime) }}</h2>
        <h2 class="mb-0" style="font-size: x-large">{{ date("jS F, Y",$currentTime) }}</h2>
        <p class="display-2 my-3">{{ $data->main->temp  - 273.15}}°C</p>
        <p class="mb-2">Độ Ẩm: <strong>{{ $data->main->humidity }} %</strong></p>
        <h5>Gió: {{  $data->wind->speed * 3.6}} km/h</h5>
    </div>
{{--</div>--}}


