@extends('admin.master.master')

@section('content')
<div style="flex-basis: 100%;">
    <section class="dash_content_app">
        <header class="dash_content_app_header">
            <h2 class="icon-tachometer">Dashboard</h2>
        </header>

        <div class="dash_content_app_box">
            <section class="app_dash_home_stats">
                <article class="control radius">
                    <h4 class="icon-ticket">Ingressos Vendidos</h4>
                    <p><b>Antecipados:</b> 100</p>
                    <p><b>Online:</b> 100</p>
                    <p><b>Total:</b> 200</p>
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

    <section class="dash_content_app" style="margin-top: 40px;">
        <header class="dash_content_app_header">
            <h2 class="icon-tachometer">Dados Por Ponto de Venda</h2>
        </header>

        <div class="dash_content_app_box">
            <div class="dash_content_app_box_stage">
                <table id="dataTable" class="nowrap hover stripe" width="100" style="width: 100% !important;">
                    <thead>
                    <tr>
                        <th>Vendedor</th>
                        <th>Local de Venda</th>
                        <th>Ingressos Vendidos</th>
                        <th>Início</th>
                        <th>Vigência</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><a href="" class="text-orange">Vendedor Teste</a></td>
                        <td><a href="" class="text-orange">Local Teste</a></td>
                        <td>450</td>
                        <td><?= date('d/m/Y'); ?></td>
                        <td>12 meses</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
@endsection
