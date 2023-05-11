@extends('admin.layouts.main')

@section('title', 'Área de cadastro')

@section('content')
    <section>
        <div class="pagetitle">
            <h1>Cadastro</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.institutions.index') }}">Inicio</a></li>
                    <li class="breadcrumb-item"> Área de cadastro</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">Cadastrar Instituição</h2>
                </div>
                <div class="card-body">
                    <!-- General Form Elements -->
                    <form action="{{ route('admin.institutions.store') }}" method="post">
                        @csrf
                        <div class="col-md-6">
                            <label for="inputText" class="col-sm-2 col-form-label">Nome</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                            @error('name')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="inputText" class="col-sm-2 col-form-label">CEP</label>
                            <input type="text" class="form-control" id="cep" name="zip_code"
                                onblur="pesquisacep(this.value);" value="{{ old('zip_code') }}">
                            @error('zip_code')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="inputText" class="col-sm-2 col-form-label">Endereço</label>
                            <input type="text" class="form-control" name="address" id="rua"
                                value="{{ old('address') }}">
                            @error('address')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="inputText" class="col-sm-2 col-form-label">Bairro</label>
                            <input type="text" class="form-control" name="neighborhood" id="bairro"
                                value="{{ old('neighborhood') }}">
                            @error('neighborhood')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="inputText" class="col-sm-2 col-form-label">Nº do prédio</label>
                            <input type="text" class="form-control" name="building_number"
                                value="{{ old('building_number') }}">
                            @error('building_number')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="inputText" class="col-sm-2 col-form-label">Cidade</label>
                            <input type="text" class="form-control" name="city" id="cidade"
                                value="{{ old('city') }}">
                            @error('city')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="inputText" class="col-sm-2 col-form-label">Estado</label>
                            <input type="text" class="form-control" name="state" id="uf"
                                value="{{ old('state') }}">
                            @error('city')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-sm-2 py-2">
                            <a href="{{ route('admin.institutions.index') }}" class="btn btn-secondary btn-sm"> <i
                                    class="fa fa-arrow-left"></i> Voltar</a>
                            <button class="btn btn-success btn-sm" type="submit"> <i class="fa fa-save"></i>
                                Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <div class="d-none">
        <label>Cep:
            <input name="cep" type="text" id="cep" value="" size="10" maxlength="9"
                onblur="pesquisacep(this.value);" /></label><br />
        <label>Rua:
            <input name="rua" type="text" id="rua" size="60" /></label><br />
        <label>Bairro:
            <input name="bairro" type="text" id="bairro" size="40" /></label><br />
        <label>Cidade:
            <input name="cidade" type="text" id="cidade" size="40" /></label><br />
        <label>Estado:
            <input name="uf" type="text" id="uf" size="2" /></label><br />
        <label>IBGE:
            <input name="ibge" type="text" id="ibge" size="8" /></label><br />
    </div>
@endsection
