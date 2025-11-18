@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="mt-4">
            <div class="card-header d-flex justify-content-between align-items-center mb-2">
                <div class="fw-bold">
                    <i class="fas fa-users"></i> Daftar Pengguna
                </div>
                <div class="btn-group">
                    <a href="{{ route('admin.users.export.csv') }}" class="btn btn-info">
                        <i class="fas fa-file-csv me-1"></i> Export CSV
                    </a>
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Foto</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>NIK</th>
                                <th>No. Telepon</th>
                                <th>Alamat</th>
                                <th>Tanggal Lahir</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    {{-- foto --}}
                                    <td>
                                        @if ($user->photo)
                                            <img src="{{ asset($user->photo) }}" alt="Foto"
                                                class="w-20 h-20 rounded-circle">
                                        @else
                                            <img src="{{ asset('images/avatar.png') }}" alt="Foto"
                                                class="w-20 h-20 rounded-circle">
                                        @endif
                                    </td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if ($user->hasRole('admin'))
                                            <span class="badge bg-primary">Admin</span>
                                        @elseif ($user->hasRole('redaksi'))
                                            <span class="badge bg-warning">Redaksi</span>
                                        @elseif ($user->hasRole('user'))
                                            <span class="badge bg-success">User</span>
                                        @endif
                                    </td>
                                    <td>{{ $user->nik }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>{{ $user->address }}</td>
                                    <td>{{ $user->birth_date }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
