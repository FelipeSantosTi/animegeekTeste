@extends('admin.master.master')

@section('content')

<section class="dash_content_app">

    <header class="dash_content_app_header">
        <h2 class="icon-user-plus">Editar Usuário</h2>

        <div class="dash_content_app_header_actions">
            <nav class="dash_content_app_breadcrumb">
                <ul>
                    <li><a href="">Dashboard</a></li>
                    <li class="separator icon-angle-right icon-notext"></li>
                    <li><a href="">Usuários</a></li>
                    <li class="separator icon-angle-right icon-notext"></li>
                    <li><a href="" class="text-orange">Novo Usuário</a></li>
                </ul>
            </nav>
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

            <ul class="nav_tabs">
                <li class="nav_tabs_item">
                    <a href="#data" class="nav_tabs_item_link active">Dados Cadastrais</a>
                </li>
                <li class="nav_tabs_item">
                    <a href="#management" class="nav_tabs_item_link">Administrativo</a>
                </li>
            </ul>

            <form class="app_form" action="{{ route('admin.users.update', ['user' => $user->id]) }}" method="post"
            enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <input type="hidden" name="id" value="{{ $user->id  }}"/>

                <div class="nav_tabs_content">
                    <div id="data">
                        <label class="label">
                            <span class="legend">*Nome:</span>
                            <input type="text" name="name" placeholder="Nome Completo"
                            value="{{ old('name') ?? $user->name }}"/>
                        </label>

                        <div class="label_g2">
                            <label class="label">
                                <span class="legend">Residencial:</span>
                                <input type="tel" name="telephone" class="mask-phone"
                                       placeholder="Número do Telefonce com DDD"
                                       value="{{ old('telephone') ?? $user->telephone }}"/>
                            </label>

                            <label class="label">
                                <span class="legend">*Celular:</span>
                                <input type="tel" name="cell" class="mask-cell"
                                       placeholder="Número do Telefonce com DDD"
                                       value="{{ old('cell') ?? $user->cell }}"/>
                            </label>
                        </div>

                        <div class="label_g2">
                            <label class="label">
                                <span class="legend">*E-mail:</span>
                                <input type="email" name="email" placeholder="Melhor e-mail"
                                       value="{{ old('email') ?? $user->email }}"/>
                            </label>

                            <label class="label">
                                <span class="legend">Senha:</span>
                                <input type="password" name="password" placeholder="Senha de acesso"
                                       value=""/>
                            </label>
                        </div>
                    </div>

                    <div id="management" class="d-none">
                        <div class="label_gc">
                            <span class="legend">Conceder:</span>
                            <label class="label">
                                <input type="checkbox" name="admin" {{ (old('admin') == 'on' ||
                                old('admin') == true ? 'checked' : ($user->admin == true ? 'checked' : '')) }}><span>Administrativo</span>
                            </label>

                            <label class="label">
                                <input type="checkbox" name="seller" {{ (old('seller') == 'on' ||
                                old('seller') == true ? 'checked' : ($user->seller == true ? 'checked' : '')) }}><span>Cliente</span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="text-right mt-2">
                    <button class="btn btn-large btn-green icon-check-square-o"
                    type="submit">Salvar Alterações
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
