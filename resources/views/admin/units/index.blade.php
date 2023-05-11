@extends('admin.layouts.main')

@section('title', 'Área principal')

@section('content')
    <section class="section">
        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">Inicio</a></li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('admin.units.create') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>
                            Cadastrar Unidade</a>
                    </div>
                    <div class="card-body">
                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Endereço</th>
                                    <th scope="col">Bairro</th>
                                    <th scope="col">Cidade</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">CEP</th>
                                    <th scope="col">Instituição</th>
                                    <th scope="col">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($units as $unit)
                                    <tr>
                                        <th scope="row">{{ $unit->name }}</th>
                                        <td>{{ $unit->address }}</td>
                                        <td>{{ $unit->neighborhood }}</td>
                                        <td>{{ $unit->city }}</td>
                                        <td>{{ $unit->state }}</td>
                                        <td>{{ $unit->zip_code }}</td>
                                        <td>{{ $unit->institution->name }}</td>
                                        <td class="">
                                            <a href="{{ route('admin.units.edit', $unit->id) }}"
                                                class="btn btn-primary btn-sm"> <i class="fa fa-pen"></i> </a>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#basicModal">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="basicModal" tabindex="-1">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Tem certeza?</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Deseja deletar a Unidade</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal"> <i class="fa fa-times"></i> Não</button>
                                                    <form action="{{ route('admin.units.destroy', $unit->id) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-success"> <i
                                                                class="fa fa-check"></i> Sim</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
