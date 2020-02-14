@extends('admin.master.master')

@section('content')

    <section class="dash_content_app">

        <header class="dash_content_app_header">
            <h2 class="icon-ticket">Ingressos</h2>

            <div class="dash_content_app_header_actions">
                <nav class="dash_content_app_breadcrumb">
                    <ul>
                        <li><a href="{{ route('admin.home') }}">Dashboard</a></li>
                        <li class="separator icon-angle-right icon-notext"></li>
                    </ul>
                </nav>

                <a href="{{ route('admin.tickets.index') }}" class="btn btn-orange icon-ticket ml-1">Gerar Ingresso</a>
            </div>
        </header>

        <div class="dash_content_app_box">
            <div class="nav">

                @if($errors->all())
                    @foreach($errors->all() as $error)
                        @message(['color' => 'orange'])
                        <p class="icon-asterisk">{{ $error }}</p>
                        @endmessage
                    @endforeach
                @endif


                <form class="app_form" action="{{ route('admin.tickets.store') }}"
                      method="post"
                      enctype="multipart/form-data">
                    @csrf

                    <div class="nav_tabs_content">
                        <div id="data">
                            <div class="label_g2">
                                <label class="label">
                                    <input type="text" name="number"
                                           placeholder="Código de Barras"/>
                                </label>

                                <label class="label">
                                    <button class="btn btn-large btn-green icon-check-square-o"
                                            type="submit" name="control">Autenticar
                                    </button>

                                </label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="dash_content_app_box_stage">
                <table id="dataTable" class="nowrap stripe" width="100" style="width: 100% !important;">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Código</th>
                        <th>Tipo</th>
                        <th>Controle</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($tickets as $ticket)
                        <tr>
                            <td>{{ $ticket->id }}</td>
                            <td><a class="text-orange">{{ $ticket->number }}</a></td>
                            <td><a class="text-orange">{{ $ticket->type }}</a></td>
                            <td><a class="text-green">{{ $ticket->control }}</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
