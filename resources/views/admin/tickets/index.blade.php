@extends('admin.master.master')

@section('content')

<section class="dash_content_app">

    <header class="dash_content_app_header">
        <h2 class="icon-search">Filtro</h2>

        <div class="dash_content_app_header_actions">
            <nav class="dash_content_app_breadcrumb">
                <ul>
                    <li><a href="{{ route('admin.home') }}">Dashboard</a></li>
                    <li class="separator icon-angle-right icon-notext"></li>
                    <li><a href="{{ route('admin.tickets.index') }}">Ingressos</a></li>
                    <li class="separator icon-angle-right icon-notext"></li>
                </ul>
            </nav>

            <a href="{{ route('admin.tickets.create') }}" class="btn btn-orange icon-home ml-1">Gerar Ingresso</a>
            <button class="btn btn-green icon-search icon-notext ml-1 search_open"></button>
        </div>
    </header>

    @include('admin.tickets.filter')

    <div class="dash_content_app_box">
        <div class="dash_content_app_box_stage">
            <div class="realty_list">
                    <div class="realty_list_item mt-1 mb-1">

                        <div class="realty_list_item_content">
                            <h4>Tipos de Ingresso</h4>
                        </div>

                        <form action="{{ route('admin.tickets.store') }}" method="post" class="app_form">
                            @csrf

                            <div id="data">
                                <div class="label_g2">
                                    <label class="label">
                                        <select name="number">
                                            <option value="1" {{ (old('type') == '1' ? 'selected' : '') }}>Antecipado</option>
                                            <option value="2" {{ (old('type') == '2' ? 'selected' : '') }}>Sábado</option>
                                            <option value="3" {{ (old('type') == '3' ? 'selected' : '') }}>Domingo</option>
                                        </select>
                                    </label>
                                </div>
                            </div>

                            <div class="realty_list_item_actions">
                                <div>
                                    <button class="btn btn-large btn-green icon-check-square-o">Gerar Ingresso</button>
                                </div>
                            </div>
                        </form>
                    </div>
            </div>
        </div>
    </div>
</section>
@endsection
