@extends('layouts.app')

@section('content')

    <div class="container" style="text-align: center;">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                <img src="{{ asset('img/qr_code.png') }}" class="img-fluid g-3" alt="..." style="width: 300px;">
                <p class="g-3" style="">Escaneie o qr code acima e faça um pix no valor de R$ {{ number_format(session('valorTotalRifa'), 2) }} para participar do sorteio. Você será notificado quando o sorteio acontecer!</p>
            </div>
        </div>
    </div>

@endsection
