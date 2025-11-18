@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <h1>Manage User Curriculum Vitae</h1>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card mt-3">
            <div class="card-body">
                @if ($resumesUser->isEmpty())
                    <p>No resumes found.</p>
                @else
                    <div class="table-responsive">
                        <table class="table table-striped table-hover align-middle">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>User</th>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Created At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($resumesUser as $resume)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            @if ($resume->user)
                                                {{ $resume->user->name }}<br>
                                                <small class="text-muted">{{ $resume->user->email }}</small>
                                            @else
                                                <em>No user</em>
                                            @endif
                                        </td>
                                        <td>{{ $resume->full_name }}</td>
                                        <td>{{ $resume->email }}</td>
                                        <td>{{ $resume->phone }}</td>
                                        <td>{{ $resume->created_at->format('Y-m-d') }}</td>
                                        <td>
                                            <a href="{{ route('admin.resumes.showAdmin', $resume->id) }}"
                                                class="btn btn-sm btn-info">View</a>
                                            <a href="{{ route('admin.resumes.exportInAdmin', $resume->id) }}"
                                                class="btn btn-primary">Export to PDF</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

