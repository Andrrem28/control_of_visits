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
        <div class="card" style="overflow: scroll;">
            <div class="card-header">
                <a href="{{ route('admin.sectors.create') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Cadastrar Setor</a>
            </div>
        <div class="card-body">
            <!-- Table with stripped rows -->
            <table class="table datatable">
            <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Unidade</th>
                <th scope="col">Funcionários</th>
                <th scope="col">Ações</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($sectors as $sector)
                <tr>
                    <th scope="row">{{ $sector->name }}</th>
                    <td>{{ $sector->unit->name }}</td>
                    <td>{{ $sector->user->name }}</td>
                    <td class="">
                        <a href="{{ route('admin.sectors.edit', $sector->id) }}" class="btn btn-primary btn-sm"> <i class="fa fa-pen"></i> </a>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#basicModal">
                            <i class="fa fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                    <div class="modal fade" id="basicModal" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Tem certeza?</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                    <div class="modal-body">
                                        <p>Deseja deletar o Setor?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> <i class="fa fa-times"></i> Não</button>
                                        <form action="{{ route('admin.sectors.destroy', $sector->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Sim</button>
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
