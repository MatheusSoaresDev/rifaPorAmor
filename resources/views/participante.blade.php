@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-6 col-sm-6 col-12 g-3" style="padding: 1em 2em 2em;">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group mb-3">
                            <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome e sobrenome" required>
                        </div>

                        <div class="form-group mb-3">
                            <input type="text" class="form-control" name="email" id="email" placeholder="Endereço de email" required>
                        </div>

                        <div class="form-group mb-3">
                            <input type="text" class="form-control" name="confirmaEmail" id="confirmaEmail" placeholder="Confirmar email" required>
                        </div>

                        <div class="form-group mb-3">
                            <input type="text" class="form-control" name="contato" id="contato" placeholder="Contato" required>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6 col-12 g-3" style="padding: 1em 6em 2em;">

                @for($i=1; $i<=$rifa->limiteParticipantes; $i++)
                    <div class="btn-group mb-3" role="group" aria-label="Basic checkbox toggle button group" @if(in_array($i, $numerosJaEscolhidos)) data-bs-toggle="tooltip" data-bs-placement="top" title="Esse número já foi escolhido" @endif>
                        <input type="checkbox" class="btn-check" id="btncheck{{ $i }}" autocomplete="off"  @if(in_array($i, $numerosJaEscolhidos)) disabled checked @endif>
                        <label class="btn btn-outline-primary" for="btncheck{{ $i }}">{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}</label>
                    </div>
                @endfor
            </div>
        </div>
    </div>

@endsection
