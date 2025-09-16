@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Gallery</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.galleries.update', $gallery) }}" method="POST" enctype="multipart/form-data"
            id="form-gallery-edit">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Judul</label>
                <input type="text" name="title" id="title" class="form-control"
                    value="{{ old('title', $gallery->title) }}" required>
            </div>

            {{-- Gambar Sekarang (tidak ada nested form lagi) --}}
            <div class="mb-3">
                <label class="form-label">Gambar Sekarang</label>
                <div class="d-flex flex-wrap" id="current-images">
                    @foreach ($gallery->images as $image)
                        <div class="card me-2 mb-2 gallery-image-card" style="width:140px;"
                            data-image-id="{{ $image->id }}">
                            <img src="{{ asset('storage/' . $image->image) }}" class="card-img-top"
                                style="height:100px; object-fit:cover;">
                            <div class="card-body p-2 text-center">
                                {{-- tombol delete diubah jadi button biasa agar tidak membuat nested form --}}
                                <button type="button" class="btn btn-sm btn-danger w-100 delete-image-btn"
                                    data-url="{{ url('admin/galleries/images/' . $image->id) }}">
                                    Hapus
                                </button>

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- Tambah gambar baru (sama seperti sebelumnya) --}}
            <div id="images-container">
                <label class="form-label">Tambah Gambar Baru</label>

                <div class="image-row mb-2 d-flex align-items-center">
                    <input type="file" name="images[]" class="form-control image-input" accept="image/*">
                    <button type="button" class="btn btn-success btn-add ms-2" title="Tambah gambar">+</button>
                </div>

                <div class="preview-list mb-3"></div>
            </div>

            <button class="btn btn-primary">Update</button>
            <a href="{{ route('admin.galleries.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>

    <script>
        (function() {
            // CSRF token dari Blade
            const csrfToken = '{{ csrf_token() }}';

            // --- DELETE IMAGE (AJAX) ---
            document.getElementById('current-images').addEventListener('click', async function(e) {
                if (!e.target.classList.contains('delete-image-btn')) return;

                const button = e.target;
                const url = button.dataset.url;
                if (!confirm('Hapus gambar ini?')) return;

                // disable button sementara
                button.disabled = true;
                button.textContent = 'Menghapus...';

                try {
                    const res = await fetch(url, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': csrfToken,
                            'Accept': 'application/json',
                            'X-Requested-With': 'XMLHttpRequest',
                            'Content-Type': 'application/json'
                        },
                        credentials: 'same-origin'
                    });

                    // cek status 200-299
                    if (res.ok) {
                        // jika server mengembalikan json, bisa parse (opsional)
                        try {
                            const data = await res.json();
                            // opsional: tampilkan toast/data.message
                        } catch (err) {
                            // jika tidak JSON, ignore
                        }

                        // hapus card dari DOM
                        const card = button.closest('.gallery-image-card');
                        if (card) card.remove();
                    } else {
                        // baca json error jika ada
                        let text = await res.text();
                        try {
                            const obj = JSON.parse(text);
                            text = obj.message || JSON.stringify(obj);
                        } catch (e) {
                            // tetap gunakan text
                        }
                        alert('Gagal menghapus gambar. Server response: ' + text);
                        button.disabled = false;
                        button.textContent = 'Hapus';
                    }
                } catch (err) {
                    console.error(err);
                    alert('Terjadi kesalahan ketika menghapus gambar.');
                    button.disabled = false;
                    button.textContent = 'Hapus';
                }

            });

            // --- MULTIPLE IMAGE INPUT (add/remove preview) ---
            const container = document.getElementById('images-container');
            const previewList = container.querySelector('.preview-list');

            // delegasi event untuk tombol + dan input file
            container.addEventListener('click', function(e) {
                if (e.target.classList.contains('btn-add')) {
                    addImageInput();
                }

                if (e.target.classList.contains('btn-remove')) {
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
                    <input type="file" name="images[]" class="form-control image-input" accept="image/*">
                    <button type="button" class="btn btn-danger btn-remove ms-2" title="Hapus input">-</button>
                `;
                container.insertBefore(row, container.querySelector('.preview-list'));
            }

            function refreshPreviews() {
                previewList.innerHTML = '';
                const inputs = container.querySelectorAll('input[type="file"].image-input');
                inputs.forEach((input) => {
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
