@extends('admin.layouts.main')

@section('title', 'Área de cadastro')

@section('content')
    <section>
        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Inicio</a></li>
                <li class="breadcrumb-item"> Área de cadastro</li>
            </ol>
            </nav>
        </div>
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">Cadastrar Funcionário</h2>
                </div>
                <div class="card-body">
                    <!-- General Form Elements -->
                    <form action="{{ route('admin.users.update', $user->id) }}" method="post">
                        @csrf
                        @method('patch')
                        <div class="col-md-6">
                            <label for="inputText" class="col-form-label">Nome</label>
                            <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                            @error('name')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="inputText" class="col-form-label">Email</label>
                            <input type="email" class="form-control" name="email" value="{{ $user->email }}">
                            @error('email')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="inputText" class="col-form-label">Senha</label>
                            <input type="password" class="form-control" name="password">
                            <span class="badge border-info border-1 text-secondary">Obs: A senha deve conter no mínimo 8 digitos.</span>
                            @error('password')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="inputText" class="col-form-label">Cargo ocupado</label>
                            <select class="form-select" aria-label="Default select example" name="role_id">
                                <option selected>Selecione...</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->description }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-2 py-2">
                            <a href="{{ route('admin.users.index') }}" class="btn btn-secondary btn-sm"> <i class="fa fa-arrow-left"></i> Voltar</a>
                            <button class="btn btn-success btn-sm" type="submit"> <i class="fa fa-save"></i> Atualizar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
