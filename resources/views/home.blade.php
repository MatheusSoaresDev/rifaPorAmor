@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <ul class="nav nav-pills mb-3 justify-content-end" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Abertas</button>
            </li>

            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Fechadas</button>
            </li>

            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-finalizadas" type="button" role="tab" aria-controls="pills-finalizadas" aria-selected="false">Finalizadas</button>
            </li>
        </ul>

        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="row" id="rifas-list">

                    @foreach($rifas as $rifa)

                        @if($rifa->status == 1)
                            <div class="col-lg-4 col-md-6 col-sm-6 col-12 g-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="title-card d-flex justify-content-between align-items-center">
                                            <h5 class="card-title">{{ $rifa->nome }}</h5>
                                            <span class="badge bg-success">Aberta</span>
                                        </div>
                                        <small> Fechamento: {{ $rifa->dataFechamento }}</small>
                                    </div>

                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">Participantes: {{ $rifa->limiteParticipantes }}</li>
                                        <li class="list-group-item">Premio: {{ $rifa->premio }}</li>
                                        <li class="list-group-item">
                                            <p>
                                                Objetivo:
                                                <a class="" data-bs-toggle="collapse" href="#collapseExample{{ $rifa->id }}" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                    Mostrar texto...
                                                </a>
                                            </p>
                                            <div class="collapse" id="collapseExample{{ $rifa->id }}">
                                                {{ $rifa->objetivo }}
                                            </div>
                                        </li>
                                    </ul>

                                    <button type="button" class="btn btn-primary btn-lg" onclick="window.location.href = '/rifa/admin/{{ $rifa->id }}'">Ver mais</button>
                                </div>
                            </div>
                        @endif
                    @endforeach

                    <div class="col-lg-4 col-md-6 col-sm-6 col-12 g-3">
                        <div class="card align-items-center" style="padding: 7.6em 2em 7.6em;">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">+ Criar novo</a>
                        </div>
                    </div>

                </div>
            </div>

            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <div class="row">

                    @foreach($rifas as $rifa)
                        @if($rifa->status == 0)

                            <div class="col-lg-4 col-md-6 col-sm-6 col-12 g-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="title-card d-flex justify-content-between align-items-center">
                                            <h5 class="card-title">{{ $rifa->nome }}</h5>
                                            <span class="badge bg-danger">Fechada</span>
                                        </div>
                                        <small> Fechamento: {{ $rifa->dataFechamento }}</small>
                                    </div>

                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">Participantes: {{ $rifa->limiteParticipantes }}</li>
                                        <li class="list-group-item">Premio: {{ $rifa->premio }}</li>
                                        <li class="list-group-item">
                                            <p>
                                                Objetivo:
                                                <a class="" data-bs-toggle="collapse" href="#collapseExample{{ $rifa->id }}" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                    Mostrar texto...
                                                </a>
                                            </p>
                                            <div class="collapse" id="collapseExample{{ $rifa->id }}">
                                                {{ $rifa->objetivo }}
                                            </div>
                                        </li>
                                    </ul>

                                    <button type="button" class="btn btn-primary btn-lg" onclick="window.location.href = '/rifa/admin/{{ $rifa->id }}'">Ver mais</button>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>

            <div class="tab-pane fade" id="pills-finalizadas" role="tabpanel" aria-labelledby="pills-finalizadas-tab">
                <div class="row">

                    @foreach($rifas as $rifa)
                        @if($rifa->status == 2)

                            <div class="col-lg-4 col-md-6 col-sm-6 col-12 g-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="title-card d-flex justify-content-between align-items-center">
                                            <h5 class="card-title">{{ $rifa->nome }}</h5>
                                            <span class="badge bg-warning">Finalizada</span>
                                        </div>
                                        <small> Fechamento: {{ $rifa->dataFechamento }}</small>
                                    </div>

                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">Participantes: {{ $rifa->limiteParticipantes }}</li>
                                        <li class="list-group-item">Premio: {{ $rifa->premio }}</li>
                                        <li class="list-group-item">
                                            <p>
                                                Objetivo:
                                                <a class="" data-bs-toggle="collapse" href="#collapseExample{{ $rifa->id }}" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                    Mostrar texto...
                                                </a>
                                            </p>
                                            <div class="collapse" id="collapseExample{{ $rifa->id }}">
                                                {{ $rifa->objetivo }}
                                            </div>
                                        </li>
                                    </ul>

                                    <button type="button" class="btn btn-primary btn-lg" onclick="window.location.href = '/rifa/admin/{{ $rifa->id }}'">Ver mais</button>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST" id="form-rifa">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Criar Rifa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group mb-3">
                                <input type="text" class="form-control" name="nome_rifa" id="nome_rifa" placeholder="Nome da Rifa" minlength="5" required>
                            </div>

                            <div class="form-group mb-3">
                                <input type="date" class="form-control" name="data_fechamento" id="data_fechamento" placeholder="" min="<?php echo date("Y-m-d") ?>" required>
                                <div id="emailHelp" class="form-text mb-3">Data de fechamento</div>
                            </div>

                            <div class="form-group mb-3">
                                <input type="number" class="form-control mb-3" name="limite_part" id="limite_part" placeholder="Limite de participantes" min="1" required>
                            </div>

                            <div class="form-group mb-3">
                                <input type="text" class="form-control mb-3" name="premio" id="premio" placeholder="Prêmio" required>
                            </div>

                            <div class="form-group mb-3">
                                <div class="input-group flex-nowrap">
                                    <span class="input-group-text" id="addon-wrapping">R$</span>
                                    <input type="text" class="form-control" placeholder="Valor da Rifa" name="valor" id="valor" >
                                </div>
                            </div>

                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Leave a comment here" name="objetivo" id="objetivo" style="height: 100px" required></textarea>
                                <label for="floatingTextarea2">Objetivo</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary" id="criar-button">Criar Rifa</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
