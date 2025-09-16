@extends('admin.layouts.app')

@section('content')
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3>Categories</h3>
            <!-- Button trigger create modal -->
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createCategoryModal">
                + Add Category
            </button>
        </div>

        <div class="card">
            <div class="card-body p-0">
                <table class="table mb-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th width="180">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($categories as $index => $category)
                            <tr>
                                <td>{{ $categories->firstItem() + $index }}</td>
                                <td>{{ $category->name }}</td>
                                <td>
                                    <!-- Edit: buka modal edit dan set data -->
                                    {{-- button edit --}}
                                    {{-- <button class="btn btn-sm btn-warning btn-edit" data-id="{{ $category->id }}"
                                        data-name="{{ $category->name }}" data-bs-toggle="modal"
                                        data-bs-target="#editCategoryModal">
                                        Edit
                                    </button> --}}
                                    <!-- Delete: form -->
                                    <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST"
                                        class="d-inline-block"
                                        onsubmit="return confirm('Yakin ingin menghapus kategori ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center">
                                    <img src="{{ asset('images/8961448_3973477.svg') }}" alt="Tidak ada kategori"
                                        style="width: 400px;" class="d-block mx-auto mb-3">
                                    <p class="text-muted fs-6">Data Kosong</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{-- pagination --}}
        <div class="mt-3">
            {{ $categories->links() }}
        </div>
    </div>

    @include('admin.pages.categories.widgets.modal-edit')
    @include('admin.pages.categories.widgets.modal-create')
@endsection

@push('script')
    <script>
        // massage success with toast
        if (session('success')) {
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });
            Toast.fire({
                icon: "success",
                title: "{{ session('success') }}"
            });
        }
    </script>
@endpush


{{-- $('.btn-edit').click(function() {
        var id = $(this).data('id');
        var name = $(this).data('name');
        // set form action
        $('#editCategoryForm').attr('action', '{{ route('admin.categories.update', $category->id) }}');
        $('#edit-name').val(name);
    }); --}}
