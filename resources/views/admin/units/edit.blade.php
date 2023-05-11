@extends('admin.layouts.main')

@section('title', 'Área de cadastro')

@section('content')
    <section>
        <div class="pagetitle">
            <h1>Edição</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.units.index') }}">Inicio</a></li>
                    <li class="breadcrumb-item"> Área de edição</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="card" style="overflow: scroll;">
                <div class="card-header">
                    <h2 class="card-title">Cadastrar Unidade</h2>
                </div>
                <div class="card-body">
                    <!-- General Form Elements -->
                    <form action="{{ route('admin.units.update', $unit->id) }}" method="post">
                        @csrf
                        @method('patch')
                        <div class="col-md-6">
                            <label for="inputText" class="col-sm-2 col-form-label">Nome</label>
                            <input type="text" class="form-control" name="name" value="{{ $unit->name }}">
                            @error('name')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="inputText" class="col-sm-2 col-form-label">CEP</label>
                            <input type="text" class="form-control" id="zip_code" name="zip_code"
                                onblur="pesquisacep(this.value);" value="{{ $unit->zip_code }}">
                            @error('zip_code')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                            <span class="badge border-info border-1 text-info">Obs: Ao preencher o CPF, os demais campos
                                serão
                                preenchidos automaticamente, exceto o número.</span>
                        </div>
                        <div class="col-md-6">
                            <label for="inputText" class="col-sm-2 col-form-label">Endereço</label>
                            <input type="text" class="form-control" name="address" id="address"
                                value="{{ $unit->address }}">
                            @error('address')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="inputText" class="col-sm-2 col-form-label">Bairro</label>
                            <input type="text" class="form-control" name="neighborhood" id="neighborhood"
                                value="{{ $unit->neighborhood }}">
                            @error('neighborhood')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="inputText" class="col-sm-2 col-form-label">Nº do prédio</label>
                            <input type="text" class="form-control" name="building_number"
                                value="{{ $unit->building_number }}">
                            @error('building_number')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="inputText" class="col-sm-2 col-form-label">Cidade</label>
                            <input type="text" class="form-control" name="city" id="city"
                                value="{{ $unit->city }}">
                            @error('city')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="inputText" class="col-sm-2 col-form-label">Estado</label>
                            <input type="text" class="form-control" name="state" id="state"
                                value="{{ $unit->state }}">
                            @error('state')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="inputText" class="col-form-label">Instituição pertencente</label>
                            <select class="form-select" aria-label="Default select example" name="institution_id"
                                value="{{ $unit->institution->name }}">
                                <option selected>Selecione...</option>
                                @foreach ($institutions as $institution)
                                    <option value="{{ $institution->id }}">{{ $institution->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-2 py-2">
                            <a href="{{ route('admin.units.index') }}" class="btn btn-secondary btn-sm"> <i
                                    class="fa fa-arrow-left"></i> Voltar</a>
                            <button class="btn btn-success btn-sm" type="submit"> <i class="fa fa-save"></i>
                                Atualizar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
