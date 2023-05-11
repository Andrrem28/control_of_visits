@extends('admin.layouts.main')

@section('title', 'Verificar visitante')

@section('content')
    <section>
        <div class="pagetitle">
            <h1>Verificação</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"> Área de verificação</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">Verificar Visitante</h2>
                </div>
                <div class="card-body">
                    <!-- General Form Elements -->
                    <form action="{{ route('admin.verification-visitor') }}" method="post">
                        @csrf
                        <div class="col-md-6">
                            <label for="inputText" class="col-sm-2 col-form-label">CPF do visitante</label>
                            <input type="text" class="form-control cpf" name="individual_registration"
                                value="{{ old('individual_registration') }}">
                            @error('individual_registration')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                            <div class="mt-1">
                                <button class="btn btn-info btn-sm" type="submit"> <i class="fa fa-search"></i>
                                    Consultar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
