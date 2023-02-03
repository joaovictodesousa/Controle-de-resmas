@extends('layouts.main')
@section('title', 'Novacap - Histórico')
@section('content')

    <br><br>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">

    <script type="text/javascript">
        var $rows = $('#table tr');
        $('#search').keyup(function() {
            var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();

            $rows.show().filter(function() {
                var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
                return !~text.indexOf(val);
            }).hide();
        });
        </script>

    <div class="container">

        <a class="btn btn-outline-primary" href="/cadastro" role="button">NOVA SOLICITAÇÃO</a>

                        {{-- NOVA view --}}

        <a class="btn btn-outline-primary" href="/criar-impressao" role="button">GESTÃO DE IMPRESSÕES</a>
        <br><br>

        @if (session('msg'))
            <div class="alert alert-success" role="alert"style="width: 1200px;">
                <p class="msg">
                    {{ session('msg') }}
                </p>
            </div>
        @endif
        <div class="mh-100" style="width: 1200px; height: 1000px;">
            <div class="card border-dark" style="max-width: 700rem;">
                <div class="card-header text-white" style="background-color: #044f84;">Histórico de Impressões

                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <ul class="nav nav-pills card-header-pills">


                                    <li class="nav-item">
                                        <a type="button" class="nav-link active " style="margin:-32px 8px;background-color: #05395e;"
                                        href="{{route('historico')}}">Histórico de Resmas</a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>


                <div class="card-body text-dark">
                    <p class="card-text">
                        <form class="d-flex" action="{{route('historico2')}}" method="GET">
                        <select class="form-control" name="id_setores" id="id_setores">
                            <option>Selecione um setor</option>

                            @foreach ($setores as $setor)
                            <option value="{{ $setor->id }}">{{ $setor->Sigla }} &nbsp   {{ $setor->Nome }} &nbsp  -  &nbsp {{$setor->Impressora}}
                            </option>
                            @endforeach
                        </select>

                        <button class="btn btn-outline-success justify-content-md-end" type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-search" viewBox="0 0 16 16">
                            <path
                                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                        </svg>
                    </button>

                    <div class="d-flex">
                        <a class="btn btn-outline-danger" href="{{route('historico2')}}" role="button">Limpar</a>
                    </div>

                    </form>

                    <br>
                    <br>
                    <table class="table table-hover" id="table">
                        <thead class="table-primary" style="background-color: 	#E1F5FE;">
                            <tr>

                                <th>Solicitação</th>
                                <th>Setor</th>
                                <th>Impressora</th>
                                <th>Impressões</th>
                                <th>Data da solicitação</th>
                            </tr>

                        </thead>
                        <tbody>
                            @foreach ($impressoes as $impress)
                            <tr>

                                <td value="{{$impress->id }}">{{$impress->id}}</td>
                                <td value="{{$impress->id }}">{{$impress->setores->Sigla}} - {{$impress->setores->Nome}} - {{$impress->setores->Impressora}}</td>
                                <td value="{{$impress->id }}">{{$impress->setores->Impressora}}</td>
                                <td value="{{$impress->id }}">{{$impress->quant_impressoes}}</td>
                                <td value="{{$impress->id }}">{{$impress->created_at->format('d/m/Y') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <style>
                            #tessste{
                                background-color: #E1F5FE;
                                border: 1px solid dodgerblue;
                            }
                        </style>
                        <tfoot id="tessste">
                            <td><strong>Total de Impressões:</strong></td>
                            <td></td>
                            <td></td>

                            <td>{{$quant_impressoes}}</td>
                            <td></td>
                        </tfoot>
                    </table>

                    <div>
                         {{$impressoes->links()}}
                    </div>
                    </p>
                </div>


            @endsection

