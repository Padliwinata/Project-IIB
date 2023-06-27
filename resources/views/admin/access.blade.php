@extends('layouts.back.app')
@section('content')
<div class="pb-4">
    <p style="display: flex; align-items: flex-end;">
        <!-- Home button -->
        <a href="{{ route('dashboard') }}" style="color: black"><i data-feather="home" style="margin-right: 0.5rem;"></i></a>
        <!-- Home button -->
        Hak Akses
    </p>
</div>
<div class="text-center grid-margin">
    <div>
        <h4>Pengaturan Hak Akses</h4>
    </div>
</div>
<form method="POST" action="{{ route('access.submit') }}">
    @csrf
    <div class="container-fluid" style="background-color: #F0F0F0; height: 90%;">
        <div class="row d-flex justify-content-between align-items-center flex-wrap grid-margin">
            <div class="col-md-6">
                <div class="auth-form-wrapper p-4">
                        <!-- User Role -->
                        <div class="mb-3">
                            <select class="form-select" name="role" id="role-select">
                                <option selected disabled>User Role</option>
                                <option value="peserta">Peserta</option>
                                <option value="penilai">Penilai</option>
                                <option value="pemateri">Pemateri</option>
                                <option value="mentor">Mentor</option>
                                <option value="dosen">Dosen</option>
                                <option value="management">Management</option>
                            </select>
                        </div>
                        <!-- User Role -->
                    </div>
                    <!-- Form ubah password -->
                </div>
                
                <!-- Kolom syarat -->
            <div class="col-md-3 p-4">
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary px-4">Terapkan</button>
                </div>
            </div>
            <div class="col-md-3 p-4">
                <div class="mb-3">
                    <a class="btn btn-primary" href="{{ route('access.reset') }}">Reset Semua Akses</a>
                    {{-- <button class="btn btn-primary px-4">Reset Semua Akses</button> --}}
                </div>
            </div>
            <!-- Kolom syarat -->
        </div>
        <div class="row">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <th>#</th>
                        <th>NAMA MENU</th>
                        <th>TAMBAH</th>
                        <th>UBAH</th>
                        <th>HAPUS</th>
                        <th>LIHAT</th>
                        <th>SEMUA</th>
                    </thead>
                    <tbody>
                        <tr>
                            <th>1</th>
                            <td>Master Pengguna</td>
                            <td>
                                <div class="form-check">
                                    <input type="checkbox" name="pengguna[]" class="form-check-input check-pengguna" value="pengguna-tambah">
                                </div>
                            </td>
                            <td>
                                <div class="form-check">
                                    <input type="checkbox" name="pengguna[]" class="form-check-input check-pengguna" value="pengguna-ubah">
                                </div>
                            </td>
                            <td>
                                <div class="form-check">
                                    <input type="checkbox" name="pengguna[]" class="form-check-input check-pengguna" value="pengguna-hapus">
                                </div>
                            </td>
                            <td>
                                <div class="form-check">
                                    <input type="checkbox" name="pengguna[]" class="form-check-input check-pengguna" value="pengguna-lihat">
                                </div>
                            </td>
                            <td>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input check-pengguna" id="pengguna">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th>2</th>
                            <td>Master Program Inkubasi</td>
                            <td>
                                <div class="form-check">
                                    <input type="checkbox" name="program-inkubasi[]" class="form-check-input check-program-inkubasi" value="program-inkubasi-tambah">
                                </div>
                            </td>
                            <td>
                                <div class="form-check">
                                    <input type="checkbox" name="program-inkubasi[]" class="form-check-input check-program-inkubasi" value="program-inkubasi-ubah">
                                </div>
                            </td>
                            <td>
                                <div class="form-check">
                                    <input type="checkbox" name="program-inkubasi[]" class="form-check-input check-program-inkubasi" value="program-inkubasi-hapus">
                                </div>
                            </td>
                            <td>
                                <div class="form-check">
                                    <input type="checkbox" name="program-inkubasi[]" class="form-check-input check-program-inkubasi" value="program-inkubasi-lihat">
                                </div>
                            </td>
                            <td>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input check-program-inkubasi" id="program-inkubasi">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th>3</th>
                            <td>Master Kategori Startup</td>
                            <td>
                                <div class="form-check">
                                    <input type="checkbox" name="kategori-startup[]" class="form-check-input check-kategori-startup" value="kategori-startup-tambah">
                                </div>
                            </td>
                            <td>
                                <div class="form-check">
                                    <input type="checkbox" name="kategori-startup[]" class="form-check-input check-kategori-startup" value="kategori-startup-ubah">
                                </div>
                            </td>
                            <td>
                                <div class="form-check">
                                    <input type="checkbox" name="kategori-startup[]" class="form-check-input check-kategori-startup" value="kategori-startup-hapus">
                                </div>
                            </td>
                            <td>
                                <div class="form-check">
                                    <input type="checkbox" name="kategori-startup[]" class="form-check-input check-kategori-startup" value="kategori-startup-lihat">
                                </div>
                            </td>
                            <td>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input check-kategori-startup" id="kategori-startup">
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</form>
@endsection
@section('extra-script')
<script>
    $(document).ready(function() {
        $('#pengguna').change(function() {
            event.preventDefault(); // Prevent default click behavior

            var isChecked = $(this).prop('checked');
            $('.check-pengguna').prop('checked', isChecked);
        });

        $('#program-inkubasi').change(function() {
            event.preventDefault(); // Prevent default click behavior

            var isChecked = $(this).prop('checked');
            $('.check-program-inkubasi').prop('checked', isChecked);
        });

        $('#kategori-startup').change(function() {
            event.preventDefault(); // Prevent default click behavior

            var isChecked = $(this).prop('checked');
            $('.check-kategori-startup').prop('checked', isChecked);
        });
    });
</script>
@endsection