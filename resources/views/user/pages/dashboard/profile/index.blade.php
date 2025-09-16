<div id="profile" class="content-section mt-4 d-none">
    <h2 class="text-warning mb-4">Profil Pengguna</h2>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <div class="profile-img rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3"
                        style="width: 120px; height: 120px;">
                        <i class="fas fa-user fs-1"></i>
                    </div>
                    <h5 class="text-white">{{ Auth::user()->name }}</h5>
                    <button class="btn btn-primary btn-sm">
                        <i class="fas fa-camera me-1"></i>Ubah Foto
                    </button>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-warning text-dark fw-bold">
                    <i class="fas fa-edit me-2"></i>Informasi Pribadi
                </div>
                <div class="card-body">
                    <form>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label text-white">Nama Lengkap</label>
                                <input type="text" class="form-control" value="John Doe">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text-white">Username</label>
                                <input type="text" class="form-control" value="johndoe">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label text-white">Email</label>
                                <input type="email" class="form-control" value="john.doe@email.com">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text-white">No. Telepon</label>
                                <input type="tel" class="form-control" value="+62 812-3456-7890">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-white">Alamat</label>
                            <textarea class="form-control" rows="3">Jl. Contoh No. 123, Kota, Provinsi</textarea>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label text-white">Tanggal Lahir</label>
                                <input type="date" class="form-control" value="1990-01-01">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text-white">Jenis Kelamin</label>
                                <select class="form-select form-control">
                                    <option>Laki-laki</option>
                                    <option>Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-1"></i>Simpan Perubahan
                            </button>
                            <button type="button" class="btn btn-secondary">
                                <i class="fas fa-times me-1"></i>Batal
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
