@extends('admin.layouts.main')

@section('title', 'Área principal')

@section('content')
    <section class="section">
        <div class="pagetitle">
            <h1>Área dos Visitantes/Visitas</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">Inicio</a></li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card" style="overflow: scroll;">
                    @can('manage_visit_and_visitor')
                        <div class="card-header">
                            <a href="{{ route('admin.verification') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>
                                Cadastrar Visitante</a>
                        </div>
                    @endcan
                    <div class="card-body">
                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">Nome do visitante</th>
                                    <th scope="col">CPF</th>
                                    <th scope="col">RG</th>
                                    <th scope="col">Contato</th>
                                    <th scope="col">Foto</th>
                                    <th scope="col">Data</th>
                                    <th scope="col">Status da visita</th>
                                    <th scope="col">Unidade visitada</th>
                                    <th scope="col">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($visits as $visit)
                                    <tr>
                                        <th scope="row">{{ $visit->visitor->name }}</th>
                                        <td>{{ $visit->visitor->individual_registration }}</td>
                                        <td>{{ $visit->visitor->general_record }}</td>
                                        <td>{{ $visit->visitor->general_record }}</td>
                                        <td>
                                            <img src="{{ asset('storage/' . str_replace('public/', '', $visit->visitor->image)) }}"
                                                alt="" width="50" height="50" />
                                        </td>
                                        <td>{{ $visit->date }}</td>
                                        <td>{{ $visit->status }}</td>
                                        <td>{{ $visit->unit->name }}</td>
                                        <td class="">
                                            @can('manage_visit_and_visitor')
                                                <a href="{{ route('admin.visits.edit', $visit->id) }}"
                                                    class="btn btn-primary btn-sm"> <i class="fa fa-pen"></i> </a>
                                            @endcan

                                            <!-- Button trigger modal -->
                                            @can('manage_visit_and_visitor')
                                                <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#confirmVisit">
                                                    <i class="fa fa-check"></i>
                                                </button>
                                            @endcan
                                            @can('manage_visit_and_visitor')
                                                <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#cancelVisit">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            @endcan
                                            @can('manage_all')
                                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#deleteVisit">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            @endcan
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="confirmVisit" tabindex="-1">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Tem certeza?</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Deseja confirmar esta visita?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal"> <i class="fa fa-times"></i> Não</button>
                                                    <form action="{{ route('admin.confirmed', $visit->id) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('patch')
                                                        <button type="submit" class="btn btn-success"> <i
                                                                class="fa fa-check"></i> Sim</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="cancelVisit" tabindex="-1">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Tem certeza?</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Deseja cancelar esta visita?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal"> <i class="fa fa-times"></i> Não</button>
                                                    <form action="{{ route('admin.canceled', $visit->id) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('patch')
                                                        <button type="submit" class="btn btn-success"> <i
                                                                class="fa fa-check"></i> Sim</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="deleteVisit" tabindex="-1">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Tem certeza?</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Deseja deletar esta visita/visitante?</p>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal"> <i class="fa fa-times"></i> Não</button>
                                                    <form action="{{ route('admin.visits.destroy', $visit->id) }}"
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
