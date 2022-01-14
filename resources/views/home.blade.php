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

        <ul class="nav nav-pills mb-3 justify-content-end" id="pills-tab" role="tablist">
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
                        <div class="card align-items-center" style="padding: 8.5em 2em 8.5em;">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">+ Criar novo</a>
                        </div>
                    </div>

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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Criar Rifa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">

                <form method="POST" id="form-rifa">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-12">
                                <input type="text" class="form-control mb-3" name="nome_rifa" id="nome_rifa" placeholder="Nome da Rifa">
                                <input type="datetime-local" class="form-control" name="data_fechamento" id="data_fechamento" placeholder="">

                                <div id="emailHelp" class="form-text mb-3">Data de fechamento</div>

                                <input type="number" class="form-control mb-3" name="limite_part" id="limite_part" placeholder="Limite de participantes">
                                <input type="text" class="form-control mb-3" name="premio" id="premio" placeholder="Prêmio">

                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a comment here" name="objetivo" id="objetivo" style="height: 100px"></textarea>
                                    <label for="floatingTextarea2">Objetivo</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" onclick="criarRifa();">Criar</button>
            </div>
        </div>
    </div>
</div>

@endsection
