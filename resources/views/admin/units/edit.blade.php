@extends('admin.layouts.main')

@section('title', 'Área de cadastro')

@section('content')
    <section>
        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.units.index') }}">Inicio</a></li>
                <li class="breadcrumb-item"> Área de edição</li>
            </ol>
            </nav>
        </div>
        <div class="row">
            <div class="card">
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
                        </div>
                        <div class="col-md-6">
                            <label for="inputText" class="col-sm-2 col-form-label">Endereço</label>
                            <input type="text" class="form-control" name="address" value="{{ $unit->address }}">
                        </div>
                        <div class="col-md-6">
                            <label for="inputText" class="col-sm-2 col-form-label">Nº do prédio</label>
                            <input type="text" class="form-control" name="building_number" value="{{ $unit->building_number }}">
                        </div>
                        <div class="col-md-6">
                            <label for="inputText" class="col-sm-2 col-form-label">Cidade</label>
                            <input type="text" class="form-control" name="city" value="{{ $unit->city }}">
                        </div>
                        <div class="col-md-6">
                            <label for="inputText" class="col-form-label">Instituição pertencente</label>
                            <select class="form-select" aria-label="Default select example" name="institution_id" value="{{ $unit->institution->name }}">
                                <option selected>Selecione...</option>
                                @foreach ($institutions as $institution)
                                    <option value="{{ $institution->id }}">{{ $institution->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="inputText" class="col-sm-2 col-form-label">Estado</label>
                            <select class="form-select" aria-label="Default select example" name="state" value="{{ $unit->state }}">
                                <option selected>{{ $unit->state }}</option>
                                <option value="AC">Acre</option>
                                <option value="AL">Alagoas</option>
                                <option value="AP">Amapá</option>
                                <option value="AM">Amazonas</option>
                                <option value="BA">Bahia</option>
                                <option value="CE">Ceará</option>
                                <option value="DF">Distrito Federal</option>
                                <option value="ES">Espírito Santo</option>
                                <option value="GO">Goiás</option>
                                <option value="MA">Maranhão</option>
                                <option value="MT">Mato Grosso</option>
                                <option value="MS">Mato Grosso do Sul</option>
                                <option value="MG">Minas Gerais</option>
                                <option value="PA">Pará</option>
                                <option value="PB">Paraíba</option>
                                <option value="PR">Paraná</option>
                                <option value="PE">Pernambuco</option>
                                <option value="PI">Piauí</option>
                                <option value="RJ">Rio de Janeiro</option>
                                <option value="RN">Rio Grande do Norte</option>
                                <option value="RS">Rio Grande do Sul</option>
                                <option value="RO">Rondônia</option>
                                <option value="RR">Roraima</option>
                                <option value="SC">Santa Catarina</option>
                                <option value="SP">São Paulo</option>
                                <option value="SE">Sergipe</option>
                                <option value="TO">Tocantins</option>
                                <option value="EX">Estrangeiro</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="inputText" class="col-sm-2 col-form-label">CEP</label>
                            <input type="text" class="form-control" name="zip_code" value="{{ $unit->zip_code }}">
                        </div>
                        <div class="col-sm-2 py-2">
                            <a href="{{ route('admin.units.index') }}" class="btn btn-secondary btn-sm"> <i class="fa fa-arrow-left"></i> Voltar</a>
                            <button class="btn btn-success btn-sm" type="submit"> <i class="fa fa-save"></i> Atualizar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
