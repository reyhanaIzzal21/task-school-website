<div class="modal fade" id="editCategoryModal" tabindex="-1" aria-labelledby="editCategoryLabel" aria-hidden="true">
    <div class="modal-dialog">
        <!-- action akan di-set via JS -->
        {{-- <form action="{{ route('admin.categories.update', $category->id) }}" method="POST" class="modal-content"> --}}
        @csrf
        @method('PUT')
        <div class="modal-header">
            <h5 class="modal-title" id="editCategoryLabel">Edit Kategori</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="mb-3">
                <label for="edit-name" class="form-label">Nama Kategori</label>
                {{-- <input type="text" name="name" id="edit-name" --}}
                {{-- class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $category->name) }}" required> --}}
                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
        </form>
    </div>
</div>
