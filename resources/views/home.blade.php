@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <!--<div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>-->

        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Abertas</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Fechadas</button>
            </li>
        </ul>

        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="row">
                    <div class="col-sm-3 g-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Rifa de ano novo</h5>
                                <small> Fechamento: 21/01/2022 </small>
                            </div>

                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Participantes: 50</li>
                                <li class="list-group-item">Premio: Cupom Ifood</li>
                                <li class="list-group-item">Objetivo: Almoço solidário</li>
                            </ul>

                            <div class="d-grid">
                                <button class="btn btn-primary mb-2" type="button">Editar</button>
                                <button class="btn btn-danger" type="button">Fechar</button>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-3 g-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Rifa de Páscoa</h5>
                                <small> Fechamento: 21/01/2022 </small>
                            </div>

                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Participantes: 30</li>
                                <li class="list-group-item">Premio: Cupom Outback</li>
                                <li class="list-group-item">Objetivo: Almoço solidário</li>
                            </ul>

                            <div class="d-grid">
                                <button class="btn btn-primary mb-2" type="button">Editar</button>
                                <button class="btn btn-danger" type="button">Fechar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <div class="row">
                    <div class="col-sm-3 g-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Rifa de ano novo</h5>
                                <small> Fechamento: 21/01/2022 </small>
                            </div>

                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Participantes: 50</li>
                                <li class="list-group-item">Premio: Cupom Ifood</li>
                                <li class="list-group-item">Objetivo: Almoço solidário</li>
                            </ul>

                            <div class="d-grid">
                                <button class="btn btn-primary mb-2" type="button">Editar</button>
                                <button class="btn btn-danger" type="button">Fechar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
