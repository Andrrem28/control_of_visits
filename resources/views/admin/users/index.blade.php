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
                <a href="{{ route('admin.users.create') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Cadastrar Funcionário</a>
            </div>
          <div class="card-body">
            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">Nome</th>
                  <th scope="col">E-mail</th>
                  <th scope="col">Cargo</th>
                  <th scope="col">Ações</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($users as $user)
                    <tr>
                        <th scope="row">{{ $user->name }}</th>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->roles()->first()->description ?? null }}</td>
                        <td class="">
                            <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-primary btn-sm"> <i class="fa fa-pen"></i> </a>
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
                                <p>Deseja deletar a Unidade</p>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> <i class="fa fa-times"></i> Não</button>
                              <form action="{{ route('admin.users.destroy', $user->id) }}" method="post">
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
