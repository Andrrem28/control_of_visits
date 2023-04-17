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
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">Cadastrar Setor</h2>
                </div>
                <div class="card-body">
                    <!-- General Form Elements -->
                    <form action="{{ route('admin.sectors.store') }}" method="post">
                        @csrf
                        <div class="col-md-6">
                            <label for="inputText" class="col-sm-2 col-form-label">Nome</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="col-md-6">
                            <label for="inputText" class="col-form-label">Instituição pertencente</label>
                            <select class="form-select" aria-label="Default select example" name="unit_id">
                                <option selected>Selecione...</option>
                                @foreach ($units as $unit)
                                    <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-2 py-2">
                            <a href="{{ route('admin.sectors.index') }}" class="btn btn-secondary btn-sm"> <i class="fa fa-arrow-left"></i> Voltar</a>
                            <button class="btn btn-success btn-sm" type="submit"> <i class="fa fa-save"></i> Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
