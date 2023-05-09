@extends('admin.layouts.login-page')

@section('title', 'Iniciar Sessão')

@section('login')
    <div class="container">

        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                        <div class="card mb-3">

                            <div class="card-body">

                                <div class="pt-4 pb-2">
                                    <h5 class="card-title text-center pb-0 fs-4">Controle de Entrada</h5>
                                    <p class="text-center small">Informe o seu E-mail e senha para iniciar a sessão</p>
                                </div>

                                <form role="form" class="row g-3 needs-validation" action="{{ route('login') }}"
                                    method="post">
                                    @csrf
                                    <div class="col-12">
                                        <label for="yourUsername" class="form-label">Login</label>
                                        <div class="input-group has-validation">
                                            <span class="input-group-text" id="inputGroupPrepend">@</span>
                                            <input type="email" name="email" class="form-control" id="yourUsername">
                                            <div class="invalid-feedback">Por favor, informe o e-mail.</div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label for="yourPassword" class="form-label">Senha</label>
                                        <input type="password" name="password" class="form-control" id="yourPassword">
                                        <div class="invalid-feedback">Por favor, informe a sua senha</div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" value="true"
                                                id="rememberMe">
                                            <label class="form-check-label" for="rememberMe">Relembrar?</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100" type="submit">Entrar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
