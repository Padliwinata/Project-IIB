@extends('layouts.back.app')
@section('content')
    <style>
        .table thead th {
            color: black;
        }
        a {
            color: black;
        }
    </style>

    <div class="pb-2">
        <p style="display: flex; align-items: flex-end;">
            <!-- Home button -->
            <a href="/dashboard"><i data-feather="home" style="margin-right: 0.5rem;"></i></a>
            <!-- Home button -->
            Master Kategori Startup
        </p>
    </div>

    <!-- Button Tambah -->
    <div class="pb-2" style="display: flex; justify-content: flex-end;">
        <a href="#addStartUpCategory" class="button btn-primary">
            <button id="openAddStartUpCategory" class="btn btn-primary py-1 px-2" style="display: flex; align-items: center;">
                <i data-feather="plus" style="margin-right: 0.3rem;"></i>
                TAMBAH
            </button>
        </a>
    </div>
    <!-- Button Tambah -->

    <!-- Search Bar -->
    <div class="d-flex justify-content-end">
        <div class="pb-2">
            <div class="input-group rounded">
                <!-- Input Form -->
                <form action="" class="position-relative">
                    
                    <input type="search" class="form-control rounded" placeholder="Cari" aria-label="Search" aria-describedby="search-addon" style="width: 350px; padding-left: 2.5rem">
                    
                    <span class="position-absolute" style="top: 50%; left: 0.5rem; transform: translateY(-50%);">
                        <i data-feather="search"></i>
                    </span>
                </form>
                <!-- Input Form -->
            </div>
        </div>
    </div>
    <!-- Search Bar -->

    <!-- Users Table -->
    <div class="table-responsive-md">
        <table class="table">
            <!-- Table Head -->
            <thead class="text-center" style="background-color: #f5f5f5">
                <tr>
                    <th scope="col" style="width: 5%;">#</th>
                    <th scope="col" style="width: 25%">NAMA KATEGORI</th>
                    <th scope="col" style="width: 40%">KETERANGAN</th>
                    <th scope="col" style="width: 20%">STATUS</th>
                    <th scope="col" style="width: 10%">AKSI</th>
                </tr>
            </thead>
            <!-- Table Head -->

            <!-- Table Body -->
            <tbody>
                <tr>
                    <th scope="row" class="text-center">1</th>
                    <td>Smarttech (Smart Technology)</td>
                    <td>Smart technology lorem ipsum</td>
                    <td class="text-center">TIDAK AKTIF</td>
                    <td class="text-center">
                        <!-- VIEW -->
                        <a href="#viewStartUpCategory"><i data-feather="eye"></i></a>
                        <!-- EDIT -->
                        <a href="#editStartUpCategory"><i data-feather="edit-2"></i></a>
                        <!-- DELETE -->
                        <a href="#deleteStartUpCategory"><i data-feather="trash-2"></i></a>
                    </td>
                </tr>
            </tbody>
            <!-- Table Body -->
        </table>
    </div>
    <!-- Users Table -->

    <!-- POP-UP TAMBAH, VIEW, EDIT -->
    <!-- TAMBAH -->
    <div class="overlay" id="addStartUpCategory">
        <div class="wrapper">
            <div class="row align-items-center">
                <div class="col col-lg-9 col-md-8">
                    <h4>Tambah Kategori</h4>
                </div>
                <div class="col col-lg-3 col-md-4 d-flex justify-content-end">
                    <!-- X button -->
                    <a href="#" class="close">&times;</a>
                    <!-- X button -->
                </div>
            </div>
            <div class="content">
                <div class="container-fluid p-0">
                    <div class="input-group-lg rounded">
                        <form>
                            <!-- Input Nama Program -->
                            <input type="text" class="form-control rounded" id="namaProgram" placeholder="Nama Kategori" style="margin-top: 1rem; width: 100%">
                            <!-- Input Nama Program -->

                            <!-- Select Status -->
                            <select name="statusSelect" id="status" class="form-control rounded" style="margin-top: 1rem;">
                                <option value="none" class="text-muted">Status</option>
                                <option value="aktif">AKTIF</option>
                                <option value="tidakAktif">TIDAK AKTIF</option>
                            </select>
                            <!-- Select Status -->

                            <!-- Input Keterangan Kategori -->
                            <textarea class="form-control rounded" id="keteranganKategori" cols="20" rows="10" placeholder="Keterangan" style="margin-top: 1rem"></textarea>
                            <!-- Input Keterangan Kategori -->

                            <div class="row mt-4">
                                <!--Button Simpan -->
                                <div class="col">
                                    <button id="simpanTambah" class="btn btn-primary">
                                        Simpan
                                    </button>
                                </div>
                                <!--Button Simpan -->

                                <!--Button Kembali -->
                                <div class="col d-flex justify-content-end">
                                    <a href="#" class="button-link">Kembali</a>
                                </div>
                                <!--Button Kembali -->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- TAMBAH -->

    <!-- VIEW -->
    <div class="overlay" id="viewStartUpCategory">
        <div class="wrapper">
            <div class="row align-items-center">
                <div class="col col-lg-9 col-md-8">
                    <h4>Lihat Kategori</h4>
                </div>
                <div class="col col-lg-3 col-md-4 d-flex justify-content-end">
                    <!-- X button -->
                    <a href="#" class="close">&times;</a>
                    <!-- X button -->
                </div>
            </div>
            <div class="content">
                <div class="container-fluid p-0">
                    <div>
                        <!-- View Nama Kategori -->
                        <input 
                        type="text" 
                        class="form-control rounded" 
                        id="namaKkategori" 
                        placeholder="Nama Program" 
                        style="margin-top: 1rem; width: 100%"
                        value="Current Category Name"
                        readonly>
                        <!-- View Nama Kategori -->

                        <!-- Select Status -->
                        <select name="statusSelect" id="status" class="form-control rounded" style="margin-top: 1rem;" disabled>
                            <option value="none" class="text-muted">Status</option>
                            <option value="aktif">AKTIF</option>
                            <option value="tidakAktif">TIDAK AKTIF</option>
                        </select>
                        <!-- Select Status -->

                        <!-- View Keterangan Kategori -->
                        <textarea class="form-control rounded" id="keteranganKategori" cols="20" rows="10" style="margin-top: 1rem;" readonly>Current program description.</textarea>
                        <!-- View Keterangan Kategori -->

                        <!--Button Kembali -->
                        <div class="col d-flex justify-content-end mt-4">
                            <a href="#" class="button-link">Kembali</a>
                        </div>
                        <!--Button Kembali -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- VIEW -->

    <!-- EDIT -->
    <div class="overlay" id="editStartUpCategory">
        <div class="wrapper">
            <div class="row align-items-center">
                <div class="col col-lg-9 col-md-8">
                    <h4>Edit Kategori</h4>
                </div>
                <div class="col col-lg-3 col-md-4 d-flex justify-content-end">
                    <!-- X button -->
                    <a href="#" class="close">&times;</a>
                    <!-- X button -->
                </div>
            </div>
            <div class="content">
                <div class="container-fluid p-0">
                    <div class="input-group-lg rounded">
                        <form>
                            <!-- Edit Nama Kategori -->
                            <input 
                                type="text" 
                                class="form-control rounded" 
                                id="namaKategori" 
                                placeholder="Nama Program" 
                                style="margin-top: 1rem; width: 100%"
                                value="Current Category Name">
                            <!-- Edit Nama Kategori -->

                            <!-- Select Status -->
                            <select name="statusSelect" id="status" class="form-control rounded" style="margin-top: 1rem;">
                                <option value="none" class="text-muted">Status</option>
                                <option value="aktif">AKTIF</option>
                                <option value="tidakAktif">TIDAK AKTIF</option>
                            </select>
                            <!-- Select Status -->

                            <!-- Edit Keterangan Kategori -->
                            <textarea class="form-control rounded" id="keteranganKategori" cols="20" rows="10" placeholder="Keterangan" style="margin-top: 1rem;">Current program description.</textarea>
                            <!-- Edit Keterangan Kategori -->

                            <div class="row mt-4">
                                <!--Button Simpan -->
                                <div class="col">
                                    <button id="saveEdit" class="btn btn-primary">
                                        Perbarui
                                    </button>
                                </div>
                                <!--Button Simpan -->

                                <!--Button Kembali -->
                                <div class="col d-flex justify-content-end">
                                    <a href="#" class="button-link">Kembali</a>
                                </div>
                                <!--Button Kembali -->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- EDIT -->

    <!-- DELETE -->
    <div class="overlay" id="deleteStartUpCategory">
        <div class="wrapper" style="width: 25%">
            <div class="content">
                <p class="text-center">
                    Hapus kategori?
                </p>

                <div class="row mt-4">
                    <!--Button Ya -->
                    <div class="col">
                        <button id="delete" class="btn btn-primary" style="width: 50%">
                            Ya
                        </button>
                    </div>
                    <!--Button Ya -->

                    <!--Button Tidak -->
                    <div class="col d-flex justify-content-end">
                        <a href="#" class="button-link text-center" style="width: 50%">Tidak</a>
                    </div>
                    <!--Button Tidak -->
                </div>
            </div>
        </div>
    </div>
    <!-- DELETE -->
    <!-- POP-UP TAMBAH, VIEW, EDIT -->

    
@endsection