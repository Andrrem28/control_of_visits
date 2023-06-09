@extends('admin.layouts.main')

@section('title', 'Área de cadastro')

@section('content')
    <section>
        <div class="pagetitle">
            <h1>Cadastro</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.visits.index') }}">Inicio</a></li>
                    <li class="breadcrumb-item"> Área de cadastro</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="card" style="overflow: scroll;">
                <div class="card-header">
                    <h2 class="card-title">Cadastrar Visitante</h2>
                    <span class="badge bg-info text-dark"><i class="bi bi-info-circle me-1"></i> Visitante não encontrado no
                        sistema.</span>
                </div>
                <div class="card-body">
                    <!-- General Form Elements -->
                    <form action="{{ route('admin.visits.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-6">
                            <label for="inputText" class="col-form-label">Nome do visitante</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                            @error('name')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="inputText" class="col-sm-2 col-form-label">CPF do visitante</label>
                            <input type="text" class="form-control cpf" name="individual_registration"
                                value="{{ old('individual_registration') }}">
                            @error('individual_registration')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="inputText" class="col-sm-2 col-form-label">RG do visitante</label>
                            <input type="text" class="form-control rg" name="general_record"
                                value="{{ old('general_record') }}">
                            @error('general_record')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="inputText" class="col-sm-2 col-form-label">Nº para contato</label>
                            <input type="text" class="form-control tel" name="phone_number"
                                value="{{ old('phone_number') }}">
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
                            {{--
                                <div class="py-1">
                                    <a href="{{ route('admin.take-a-picture')}}" class="btn btn-info btn-sm" target="blank"> <i class="fa fa-camera" ></i> Tirar foto</a>
                                </div>
                            --}}
                        </div>

                        <div class="col-md-6">
                            <label for="inputText" class="col-form-label">Unidade visitada.</label>
                            <select class="form-select" aria-label="Default select example" name="unit_id">
                                <option selected>Selecione...</option>
                                @foreach ($units as $unit)
                                    <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                @endforeach
                            </select>
                            @error('general_record')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="inputText" class="col-form-label">Data/Agendamento da visita</label>
                            <input type="date" class="form-control" name="date" value="{{ old('date') }}">
                            @error('date')
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
                            @error('general_record')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-sm-2 py-2">
                            <a href="{{ route('admin.visits.index') }}" class="btn btn-secondary btn-sm"> <i
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
