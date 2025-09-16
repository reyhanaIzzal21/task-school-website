@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <h1>Tambah Gallery (Multiple Images)</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.galleries.store') }}" method="POST" enctype="multipart/form-data" id="form-gallery">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Judul</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}"
                    required>
            </div>

            <div id="images-container">
                <label class="form-label">Gambar Galeri</label>

                <div class="image-row mb-2 d-flex align-items-center">
                    <input type="file" name="images[]" class="form-control image-input" accept="image/*" required>
                    <button type="button" class="btn btn-success btn-add ms-2" title="Tambah gambar">+</button>
                </div>

                <div class="preview-list mb-3"></div>
            </div>

            <button class="btn btn-primary">Simpan</button>
            <a href="{{ route('admin.galleries.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>

    <script>
        (function() {
            const container = document.getElementById('images-container');
            const previewList = container.querySelector('.preview-list');

            // delegasi event untuk tombol + dan input file
            container.addEventListener('click', function(e) {
                if (e.target.classList.contains('btn-add')) {
                    addImageInput();
                }

                if (e.target.classList.contains('btn-remove')) {
                    // hapus row input
                    const row = e.target.closest('.image-row');
                    row.remove();
                    refreshPreviews();
                }
            });

            container.addEventListener('change', function(e) {
                if (e.target.classList.contains('image-input')) {
                    refreshPreviews();
                }
            });

            function addImageInput() {
                const row = document.createElement('div');
                row.className = 'image-row mb-2 d-flex align-items-center';
                row.innerHTML = `
            <input type="file" name="images[]" class="form-control image-input" accept="image/*" required>
            <button type="button" class="btn btn-danger btn-remove ms-2" title="Hapus input">-</button>
        `;
                container.insertBefore(row, container.querySelector('.preview-list'));
            }

            function refreshPreviews() {
                previewList.innerHTML = '';
                const inputs = container.querySelectorAll('input[type="file"].image-input');
                inputs.forEach((input, idx) => {
                    const file = input.files[0];
                    if (!file) return;
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const wrapper = document.createElement('div');
                        wrapper.className = 'd-inline-block me-2 mb-2 text-center';
                        wrapper.style.width = '140px';
                        wrapper.innerHTML = `
                    <img src="${e.target.result}" style="max-width:140px; height:100px; object-fit:cover; display:block; border:1px solid #ddd; padding:2px;">
                    <div style="font-size:12px; max-width:140px; word-break:break-word;">${file.name}</div>
                `;
                        previewList.appendChild(wrapper);
                    };
                    reader.readAsDataURL(file);
                });
            }
        })();
    </script>
@endsection
