@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">

            <ul class="nav nav-pills mb-3 justify-content-end" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link @if(session('tab') == "dados" || empty(session('tab'))) active @endif" onclick= "setSession('dados')" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Dados</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link @if(session('tab') == "participantes") active @endif" onclick="setSession('participantes')" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Participantes</button>
                </li>
            </ul>

            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade @if(session('tab') == "dados" || empty(session('tab'))) show active @endif" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="row">
                        <form method="POST" id="form-alterar-rifa">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-12 g-3">
                                        <div class="form-group mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">ID da rifa</label>
                                            <input type="text" class="form-control" name="id_rifa" id="id_rifa" value="{{ $rifa->id }}" disabled>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Nome da rifa</label>
                                            <input type="text" class="form-control" name="nome_rifa" id="nome_rifa" placeholder="Nome da Rifa" minlength="5" value="{{ $rifa->nome }}" required>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Data de fechamento</label>
                                            <input type="date" class="form-control" name="data_fechamento" id="data_fechamento" placeholder="" value="{{ $rifa->dataFechamento }}" min="<?php echo date("Y-m-d") ?>">
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Limite de participantes</label>
                                            <input type="number" class="form-control mb-3" name="limite_part" id="limite_part" placeholder="Limite de participantes" min="{{ $rifa->limiteParticipantes }}" value="{{ $rifa->limiteParticipantes }}">
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-6 col-12 g-3">
                                        <div class="form-group mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Valor</label>
                                            <div class="input-group flex-nowrap">
                                                <span class="input-group-text" id="addon-wrapping">R$</span>
                                                <input type="text" class="form-control" name="valor" id="valor" value="{{ number_format($rifa->valor, 2, ',', '.') }}">
                                            </div>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Premio</label>
                                            <input type="text" class="form-control mb-3" name="premio" id="premio" placeholder="Prêmio" value="{{ $rifa->premio }}" required>
                                        </div>

                                        <div class="form-floating mb-3">
                                            <textarea class="form-control" placeholder="Leave a comment here" name="objetivo" id="objetivo" style="height: 100px" required>{{ $rifa->objetivo }}</textarea>
                                            <label for="floatingTextarea2">Objetivo</label>
                                        </div>

                                        <div class="form-group d-grid gap-2 d-md-block">
                                            <button type="submit" class="btn btn-primary g-3 float-end" id="alterar-button">Alterar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="tab-pane fade @if(session('tab') == "participantes") show active @endif" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <div class="row">
                        <div class="menu-table d-flex justify-content-between align-items-center">
                            <form id="filtro-form" action="/rifa/admin/{{ $rifa->id }}" method="GET">
                                {{ csrf_field() }}

                                <select class="form-select" name="filtro" style="width: 200px;" onchange="this.form.submit()">
                                    <option selected>Ordenar por:</option>
                                    <option value="email" {{( $filtro_session == 'email')?'selected':''}}>Participante</option>
                                    <option value="nome" {{( $filtro_session == 'nome')?'selected':''}}>Nome</option>
                                    <option value="numeroEscolhido" {{( $filtro_session == 'numeroEscolhido')?'selected':''}}>Número Escolhido</option>
                                    <option value="status" {{( $filtro_session == 'status')?'selected':''}}>Status</option>
                                </select>
                            </form>

                            <div>
                                Status: &nbsp&nbsp
                                @if($rifa->status == 0)
                                    <span class="badge bg-danger">Fechada</span>
                                @elseif($rifa->status == 1)
                                    <span class="badge bg-success">Aberta</span>
                                @elseif($rifa->status == 2)
                                    <span class="badge bg-warning">Finalizada</span>
                                @endif
                            </div>

                            <div class="dropdown">
                                <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                                    Gerenciar
                                </button>

                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                    @if($rifa->status == 0)
                                        <li><button class="dropdown-item" type="button" onclick="confirmarReabrirRifa('{{ $rifa->id }}')">Reabrir Rifa</button></li>
                                    @elseif($rifa->status == 1)
                                        <li><button class="dropdown-item" type="button" onclick="confirmarfecharRifa('{{ $rifa->id }}')">Fechar Rifa</button></li>
                                    @elseif($rifa->status == 2)

                                    @endif

                                    @if($countVencedores == 0 && $countParticipantesAprovados > 1 && ($rifa->status == 0 || $rifa->status == 1))
                                        <li><button class="dropdown-item" type="button" onclick="confirmarSortearVencedor('{{ $rifa->id }}')">Sortear Vencedor</button></li>
                                    @elseif($rifa->status == 2)
                                        <li><button class="dropdown-item" type="button" onclick="confirmarResetarSorteio('{{ $rifa->id }}')">Resetar Sorteio</button></li>
                                        <li><button class="dropdown-item" type="button">Comunicar Vencedor</button></li>
                                    @endif
                                </ul>
                            </div>
                        </div>

                        <div class="container table-container">
                            <table class="table table-striped table-hover table-responsive">
                                <thead>
                                    <tr>
                                        <!--<th scope="col">ID</th>-->
                                        <th scope="col">Numero</th>
                                        <th scope="col">Nome</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Contato</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($participantes) > 0)
                                        @foreach($participantes as $part)
                                            <tr @if ($part->vencedor == 1) style="background-color: #ffff00" @endif>
                                                <!--<th scope="row">#{{ $part->id }}</th>-->
                                                <th>#{{ $part->numeroEscolhido }}</th>
                                                <td>{{ $part->nome }}</td>
                                                <td>{{ $part->email }}</td>
                                                <td>{{ $part->contato }}</td>
                                                <td>
                                                    @if($part->status == 0)
                                                        <span class="badge rounded-pill bg-secondary">Aguardando</span>
                                                    @else
                                                        <span class="badge rounded-pill bg-success">Aprovado</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                            Ações
                                                        </button>
                                                        @if($rifa->status != 2)
                                                            <ul class="dropdown-menu">
                                                                <li>
                                                                    @if($part->status == 0)
                                                                        <a class="dropdown-item" onclick="buscarNumeros('{{ $rifa->id }}', '{{ $part->email }}', 'aprovar')">Aprovar</a>
                                                                    @elseif($part->status == 1)
                                                                        <a class="dropdown-item" onclick="buscarNumeros('{{ $rifa->id }}', '{{ $part->email }}', 'reprovar')">Cancelar</a>
                                                                    @endif
                                                                </li>

                                                                <li><hr class="dropdown-divider"></li>
                                                                <li><a class="dropdown-item" onclick="confirmarRemoverParticipante('{{ $part->id }}')">Remover</a></li>
                                                            </ul>
                                                        @endif
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <th scope="row" colspan="7">Nenhum participante encontrado!</th>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                            <div class="paginate d-flex flex-row-reverse"> {{ $participantes->links() }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

