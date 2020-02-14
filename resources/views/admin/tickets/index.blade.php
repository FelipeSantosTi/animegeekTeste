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

        @include('admin.tickets.filter')

        <div style="flex-basis: 100%;">
            <section class="dash_content_app">
                <div class="dash_content_app_box">
                    <section class="app_dash_home_stats">
                        <article class="control radius">
                            <h4 class="icon-ticket">Ingressos Vendidos</h4>
                            <p><b>Antecipados:</b> {{ $antecipated  }}</p>
                            <p><b>Sábado:</b> {{ $saturday  }}</p>
                            <p><b>Domingo:</b> {{ $sunday }}</p>
                            <p><b>Total:</b> {{ $total }}</p>
                        </article>

                        <article class="blog radius">
                            <h4 class="icon-home">Pontos de Venda</h4>
                            <p><b>Disponíveis:</b> 3</p>
                            <p><b>Total Ingressos Vendidos:</b> 200</p>
                        </article>

                        <article class="users radius">
                            <h4 class="icon-money">Arrecadado</h4>
                            <p><b>Total R$:</b> XXX</p>
                        </article>
                    </section>
                </div>
            </section>

        </div>

        <form action="{{ route('admin.tickets.store') }}" method="post" class="app_form">
            @csrf
            <div style="flex-basis: 100%;">
                <section class="dash_content_app">
                    <div class="dash_content_app_box">

                        <section class="app_dash_home_stats">

                            <article class="blog radius">
                                <h4 class="icon-ticket">Ingresso Antecipado</h4>
                                <button type="submit" class="btn btn-large btn-green icon-check-square-o"
                                        name="action" value="Antecipado"
                                        >Antecipado
                                </button>
                            </article>

                            <article class="blog radius">
                                <h4 class="icon-ticket">Ingresso Sábado</h4>
                                <button type="submit" class="btn btn-large btn-green icon-check-square-o"
                                        name="action" value="Sábado" >Sábado
                                </button>
                            </article>

                            <article class="blog radius">
                                <h4 class="icon-ticket">Ingresso Domingo</h4>
                                <button type="submit" class="btn btn-large btn-green icon-check-square-o"
                                        name="action" value="Domingo" >Domingo
                                </button>
                            </article>

                        </section>
                    </div>
                </section>
            </div>
        </form>
    </section>
@endsection
