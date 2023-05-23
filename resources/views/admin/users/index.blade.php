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
                        <td>{{ $user->roles()->first()->description }}</td>
                        <td class="">
                            <div class="d-flex">
                                <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-primary btn-sm mr-2"> <i class="fa fa-pen"></i> </a>
                                <!-- Button trigger modal -->
                                <form action="{{ route('admin.users.destroy', $user->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm" style="margin-left: 3px"> <i class="fa fa-trash"></i> </button>
                                </form>
                            </div>
                        </td>
                    </tr>
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
