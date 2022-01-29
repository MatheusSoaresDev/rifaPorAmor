@extends('layouts.app')

@section('content')

    <div class="container">
        <form method="POST" id="form-part">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-6 col-sm-12 col-12 g-3" style="padding: 1em 6em 2em; text-align: center">
                    @for($i=1; $i<=$rifa->limiteParticipantes; $i++)
                        <div class="btn-group mb-3" role="group" aria-label="Basic checkbox toggle button group" @if(in_array($i, $numerosJaEscolhidos)) data-bs-toggle="tooltip" data-bs-placement="top" title="Esse número já foi escolhido" @endif>
                            <input type="checkbox" class="btn-check" name="btn-check" value="{{ $i }}" id="btncheck{{ $i }}" autocomplete="off"  @if(in_array($i, $numerosJaEscolhidos)) disabled @endif onchange="somarValorRifa('{{ $rifa->valor }}')">
                            <label class="btn btn-outline-primary" for="btncheck{{ $i }}">{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}</label>
                        </div>
                    @endfor
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12 col-12 g-3" style="padding: 1em 2em 2em;">
                    <div class="row">
                        <div class="col-12">
                            <h3 class="mb-3">Dados do usuário</h3>

                            <div class="form-group mb-3">
                                <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome e sobrenome" required>
                            </div>

                            <div class="form-group mb-3">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Endereço de email" required>
                            </div>

                            <div class="form-group mb-3">
                                <input type="email" class="form-control" name="confirmaEmail" id="confirma_email" placeholder="Confirmar email" required>
                            </div>

                            <div class="form-group mb-3">
                                <input type="text" class="form-control" name="contato" id="contato" placeholder="Contato" required>
                            </div>

                            <div class="d-grid d-flex justify-content-between">
                                <h5 style="margin-top: 10px;" id="valorRifa"> R$ 0.00 </h5>
                                <button type="submit" class="btn btn-primary justify-content-md-end">Confirmar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection
