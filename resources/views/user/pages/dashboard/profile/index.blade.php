<div id="profile" class="content-section mt-4 d-none">
    <h2 class="text-accent mb-4">Profil Pengguna</h2>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <div class="profile-img rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3"
                        style="width: 120px; height: 120px;">
                        @if (Auth::user()->photo)
                            <img src="{{ asset(Auth::user()->photo) }}" alt="Profile Photo" class="rounded-circle"
                                style="width: 100%; height: 100%; object-fit: cover;">
                        @else
                            <img src="{{ asset('images/dafault-avatar.jpg') }}" alt="avatar" class="rounded-circle"
                                style="width: 100%; height: 100%; object-fit: cover;">
                        @endif
                    </div>
                    <h5 class="text-white">{{ Auth::user()->name }}</h5>

                    {{-- form khusus update foto --}}
                    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data"
                        id="formPhoto">
                        @csrf
                        @method('PUT')
                        <input type="file" name="photo" id="photoInput" class="d-none"
                            onchange="document.getElementById('formPhoto').submit()">
                        <button type="button" class="btn btn-primary btn-sm"
                            onclick="document.getElementById('photoInput').click()">
                            <i class="fas fa-camera me-1"></i>Ubah Foto
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-warning text-dark fw-bold">
                    <i class="fas fa-edit me-2"></i>Informasi Pribadi
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label text-white">Nama Lengkap</label>
                                <input type="text" name="name" class="form-control"
                                    value="{{ old('name', Auth::user()->name) }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text-white">Email</label>
                                <input type="email" name="email" class="form-control"
                                    value="{{ old('email', Auth::user()->email) }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label text-white">No. Telepon</label>
                                <input type="text" name="phone" class="form-control"
                                    value="{{ old('phone', Auth::user()->phone) }}">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label text-white">Alamat</label>
                            <textarea name="address" class="form-control" rows="3">{{ old('address', Auth::user()->address) }}</textarea>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label text-white">Foto Profil</label>
                                <input type="file" name="photo" class="form-control">
                                @if (Auth::user()->photo)
                                    <img src="{{ asset(Auth::user()->photo) }}" alt="Profile Photo"
                                        class="mt-2 rounded" width="100">
                                @endif
                            </div>
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-1"></i>Simpan Perubahan
                            </button>
                            <button type="reset" class="btn btn-secondary">
                                <i class="fas fa-times me-1"></i>Batal
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
