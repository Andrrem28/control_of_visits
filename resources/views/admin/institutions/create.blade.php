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
            <div class="card" style="overflow: scroll;">
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
                            <input type="text" class="form-control" id="zip_code" name="zip_code"
                                onblur="pesquisacep(this.value);" value="{{ old('zip_code') }}">
                            @error('zip_code')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                            <span class="badge border-info border-1 text-info">Obs: Ao preencher o CEP, os demais campos
                                serão
                                preenchidos automaticamente, exceto o número.</span>
                        </div>
                        <div class="col-md-6">
                            <label for="inputText" class="col-sm-2 col-form-label">Endereço</label>
                            <input type="text" class="form-control" name="address" id="address"
                                value="{{ old('address') }}">
                            @error('address')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="inputText" class="col-sm-2 col-form-label">Bairro</label>
                            <input type="text" class="form-control" name="neighborhood" id="neighborhood"
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
                            <input type="text" class="form-control" name="city" id="city"
                                value="{{ old('city') }}">
                            @error('city')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="inputText" class="col-sm-2 col-form-label">Estado</label>
                            <input type="text" class="form-control" name="state" id="state"
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
        <label>Estado:
            <input name="uf" type="text" id="uf" size="2" /></label><br />
        <label>IBGE:
            <input name="ibge" type="text" id="ibge" size="8" /></label><br />
    </div>
@endsection
