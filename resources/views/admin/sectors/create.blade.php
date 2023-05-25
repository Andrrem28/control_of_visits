@extends('admin.layouts.main')

@section('title', 'Área de cadastro')

@section('content')
    <section>
        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.sectors.index') }}">Inicio</a></li>
                    <li class="breadcrumb-item"> Área de cadastro</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="card" style="overflow: scroll;">
                <div class="card-header">
                    <h2 class="card-title">Cadastrar Setor</h2>
                </div>
                <div class="card-body">
                    <!-- General Form Elements -->
                    <form action="{{ route('admin.sectors.store') }}" method="post">
                        @csrf
                        <div class="col-md-6">
                            <label for="inputText" class="col-sm-2 col-form-label">Nome do setor</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                            @error('name')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="inputText" class="col-form-label">Unidade relacionada</label>
                            <select class="form-select" aria-label="Default select example" name="unit_id"
                                value="{{ old('unit_id') }}">
                                <option value="" selected>Selecione...</option>
                                @foreach ($units as $units)
                                    <option value="{{ $units->id }}">{{ $units->name }}</option>
                                @endforeach
                            </select>
                            @error('unit_id')
                                <div class="alert alert-danger mt-2">
                                    <span class="badge border-danger border-1 text-danger">Obs: Obrigatório selecionar uma
                                        Unidade.</span>

                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="inputText" class="col-form-label">Funcionário deste setor</label>
                            <select class="form-select" aria-label="Default select example" name="user_id"
                                value="{{ old('user_id') }}">
                                <option value="" selected>Selecione...</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                            @error('user_id')
                                <div class="alert alert-danger mt-2">
                                    <span class="badge border-danger border-1 text-danger">Obs: Obrigatório selecionar um(a) funcionário(a).</span>

                                </div>
                            @enderror
                        </div>
                        <div class="col-sm-2 py-2">
                            <a href="{{ route('admin.sectors.index') }}" class="btn btn-secondary btn-sm"> <i
                                    class="fa fa-arrow-left"></i> Voltar</a>
                            <button class="btn btn-success btn-sm" type="submit"> <i class="fa fa-save"></i>
                                Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
