@extends('admin.layouts.main')

@section('title', 'Área de cadastro')

@section('content')
    <section>
        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.visits.index') }}">Inicio</a></li>
                <li class="breadcrumb-item"> Área de cadastro</li>
            </ol>
            </nav>
        </div>
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">Cadastrar Visitante</h2>
                </div>
                <div class="card-body">
                    <!-- General Form Elements -->
                    <form action="{{ route('admin.visits.update', $visit->id ) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="col-md-6">
                            <label for="inputText" class="col-form-label">Nome do visitante</label>
                            <input type="text" class="form-control" name="name" value="{{ $visit->visitor->name }}">
                            @error('name')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="inputText" class="col-sm-2 col-form-label">CPF do visitante</label>
                            <input type="text" class="form-control cpf" name="individual_registration" value="{{ $visit->visitor->individual_registration }}">
                            @error('individual_registration')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="inputText" class="col-sm-2 col-form-label">RG do visitante</label>
                            <input type="text" class="form-control rg" name="general_record" value="{{ $visit->visitor->general_record }}">
                            @error('general_record')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="inputText" class="col-sm-2 col-form-label">Nº para contato</label>
                            <input type="text" class="form-control tel" name="phone_number" value="{{ $visit->visitor->phone_number }}">
                            @error('phone_number')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="" class="col-form-label">Foto</label>
                            <input type="file" class="form-control" name="image" />
                            @error('image')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
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

                        <div class="col-md-6">
                            <label for="inputText" class="col-form-label">Data/Agendamento da visita</label>
                            <input type="date" class="form-control" name="date" value="{{ $visit->date }}">
                            @error('phone_number')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="inputText" class="col-form-label">Situação</label>
                            <select class="form-select" aria-label="Default select example" name="status">
                                <option selected>Selecione...</option>
                                <option value="Visitado">Visitado</option>
                                <option value="Agendado">Agendado</option>
                            </select>
                        </div>
                        <div class="col-sm-2 py-2">
                            <a href="{{ route('admin.visits.index') }}" class="btn btn-secondary btn-sm"> <i class="fa fa-arrow-left"></i> Voltar</a>
                            <button class="btn btn-success btn-sm" type="submit"> <i class="fa fa-save"></i> Atualizar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
