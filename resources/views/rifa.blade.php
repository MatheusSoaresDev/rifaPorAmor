@extends('layouts.app')

@section('content')

    <form method="POST" id="form-alterar-rifa">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 col-sm-6 col-12 g-3">
                    <div class="form-group mb-3">
                        <label for="exampleFormControlInput1" class="form-label">ID da rifa</label>
                        <input type="text" class="form-control" name="id_rifa" id="id_rifa" value="{{ $rifa->id }}" disabled>
                    </div>

                    <div class="form-group mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nome da rifa</label>
                        <input type="text" class="form-control" name="nome_rifa" id="nome_rifa" placeholder="Nome da Rifa" value="{{ $rifa->nome }}" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Data de fechamento</label>
                        <input type="date" class="form-control" name="data_fechamento" id="data_fechamento" placeholder="" value="{{ $rifa->dataFechamento }}" min="<?php echo date("Y-m-d") ?>" required>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-6 col-12 g-3">
                    <div class="form-group mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Limite de participantes</label>
                        <input type="number" class="form-control mb-3" name="limite_part" id="limite_part" placeholder="Limite de participantes" min="1" value="{{ $rifa->limiteParticipantes }}" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Premio</label>
                        <input type="text" class="form-control mb-3" name="premio" id="premio" placeholder="Prêmio" value="{{ $rifa->premio }}" required>
                    </div>

                    <div class="form-floating mb-3">
                        <textarea class="form-control" placeholder="Leave a comment here" name="objetivo" id="objetivo" style="height: 100px" required>{{ $rifa->objetivo }}</textarea>
                        <label for="floatingTextarea2">Objetivo</label>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary g-3 float-end" id="alterar-button">Alterar</button>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-6 col-12 g-3">
                    <div class="d-grid gap-3 buttons-actions">
                        <button class="btn btn-danger " type="button">Fechar Rifa</button>
                        <button class="btn btn-primary" type="button">Sortear Vencedor</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="container" style="margin-top: 75px;">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Email</th>
                        <th scope="col">Contato</th>
                        <th scope="col">Numero</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>

                <tbody>
                    <>
                        <th scope="row">#part_61e6266af3c76</th>
                        <td>Matheus Soares</td>
                        <td>matheus_onlive@live.com</td>
                        <td>21966343936</td>
                        <td>25</td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    Ações
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="#">Separated link</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>

        </div>
    </form>

@endsection

