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
            Master Periode Pendaftaran
        </p>
    </div>

    <!-- Button Tambah -->
    <div class="pb-2" style="display: flex; justify-content: flex-end;">
        <a href="#addPeriod" class="button btn-primary">
            <button id="openAdd" class="btn btn-primary py-1 px-2" style="display: flex; align-items: center;">
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

    <!-- Flash Message -->
    @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
            <button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @elseif (Session::has('error'))
        <div class="alert alert-danger" role="alert">
            {{ Session::get('error') }}
            <button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if ($errors->any())
    <div class="alert alert-danger">
        {{ $errors->first() }}
        <button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <!-- Flash Message -->

    <!-- Users Table -->
    <div class="table-responsive-md">
        <table class="table">
            <!-- Table Head -->
            <thead class="text-center" style="background-color: #f5f5f5">
                <tr>
                    <th scope="col" style="width: 5%;">#</th>
                    <th scope="col" style="width: 22%">NAMA PERIODE</th>
                    <th scope="col" style="width: 22%">TANGGAL MULAI</th>
                    <th scope="col" style="width: 22%">TANGGAL AKHIR</th>
                    <th scope="col" style="width: 19%">STATUS</th>
                    <th scope="col" style="width: 10%">AKSI</th>
                </tr>
            </thead>
            <!-- Table Head -->

            <!-- Table Body -->
            <tbody>
                <?php
                    use Carbon\Carbon;
                    setlocale(LC_TIME, 'id_ID');
                    Carbon::setLocale('id');
                ?>
                @foreach ($periods as $period)
                <tr>
                    <th scope="row" class="text-center">{{ $loop->iteration }}</th>
                    <td>{{ $period->mpe_name }}</td>
                    <td>{{ Carbon::parse($period->mpe_startdate)->isoFormat('D MMMM Y') }}</td>
                    <td>{{ Carbon::parse($period->mpe_enddate)->isoFormat('D MMMM Y') }}</td>
                    <td class="text-center">{{ $period->mpe_status == 0 ? 'TIDAK AKTIF' : ($period->mpe_status == 1 ? 'AKTIF' : 'INVALID') }}</td>
                    <td class="text-center">
                        <!-- VIEW -->
                        <a href="#viewPeriod"><i data-feather="eye"></i></a>
                        <!-- EDIT -->
                        <a href="#editPeriod"><i data-feather="edit-2"></i></a>
                        <!-- DELETE -->
                        <a href="#deletePeriod"><i data-feather="trash-2"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <!-- Table Body -->
        </table>
    </div>
    <!-- Users Table -->

<!-- POP-UP TAMBAH, VIEW, EDIT -->
    <!-- TAMBAH -->
    <div class="overlay" id="addPeriod">
        <div class="wrapper">
            <div class="row align-items-center">
                <div class="col col-lg-9 col-md-8">
                    <h4>Tambah Periode</h4>
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
                        <form action="/master/periode" method="POST">
                            @csrf
                            <!-- Nama Periode -->
                            <div class="form-group row align-items-center" style="margin-top: 1rem">
                                <label for="addNamaPeriode" class="col-sm-3">Nama Periode</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="addNamaPeriode" name="addNamaPeriode" placeholder="Nama Periode">
                                </div>
                            </div>
                            <!-- Nama Periode -->

                            <!-- Tanggal Mulai -->
                            <div class="form-group row align-items-center" style="margin-top: 1rem">
                                <label for="addTanggalMulai" class="col-sm-3">Tanggal Mulai</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" id="addTanggalMulai" name="addTanggalMulai">
                                </div>
                            </div>
                            <!-- Tanggal Mulai -->

                            <!-- Tanggal Akhir -->
                            <div class="form-group row align-items-center" style="margin-top: 1rem">
                                <label for="addTanggalSelesai" class="col-sm-3">Tanggal Akhir</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" id="addTanggalSelesai" name="addTanggalSelesai">
                                </div>
                            </div>
                            <!-- Tanggal Akhir -->

                            <!-- Keterangan -->
                            <div class="form-group row align-items-center" style="margin-top: 1rem">
                                <label for="addKeteranganPeriode" class="col-sm-3">Keterangan</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" id="addKeteranganPeriode" name="addKeteranganPeriode" cols="20" rows="5" placeholder="Keterangan"></textarea>
                                </div>
                            </div>
                            <!-- Keterangan -->

                            <!-- Status -->
                            <div class="form-group row align-items-center" style="margin-top: 1rem">
                                <label for="addStatusPeriode" class="col-sm-3">Status</label>
                                <div class="col-sm-9">
                                    <select name="addStatusPeriode" id="addStatusPeriode" class="form-control form-select">
                                        <option value="" class="text-muted">Pilih status</option>
                                        <option value="1">AKTIF</option>
                                        <option value="0">TIDAK AKTIF</option>
                                    </select>
                                </div>
                            </div>
                            <!-- Status -->

                            <div class="row mt-4">
                                <!--Button Simpan -->
                                <div class="col">
                                    <button type="submit" id="simpanTambah" class="btn btn-primary">
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
    <div class="overlay" id="viewPeriod">
        <div class="wrapper">
            <div class="row align-items-center">
                <div class="col col-lg-9 col-md-8">
                    <h4>Lihat Periode</h4>
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
                        <!-- Nama Periode -->
                        <div class="form-group row align-items-center" style="margin-top: 1rem">
                            <label for="namaPeriode" class="col-sm-3">Nama Periode</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="namaPeriode" placeholder="Nama Periode" readonly>
                            </div>
                        </div>
                        <!-- Nama Periode -->

                        <!-- Tanggal Mulai -->
                        <div class="form-group row align-items-center" style="margin-top: 1rem">
                            <label for="tanggalMulai" class="col-sm-3">Tanggal Mulai</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" id="tangalMulai" readonly>
                            </div>
                        </div>
                        <!-- Tanggal Mulai -->

                        <!-- Tanggal Akhir -->
                        <div class="form-group row align-items-center" style="margin-top: 1rem">
                            <label for="tanggalAkhir" class="col-sm-3">Tanggal Akhir</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" id="tangalAkhir" readonly>
                            </div>
                        </div>
                        <!-- Tanggal Akhir -->

                        <!-- Keterangan -->
                        <div class="form-group row align-items-center" style="margin-top: 1rem">
                            <label for="tanggalAkhir" class="col-sm-3">Keterangan</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="keteranganPeriode" cols="20" rows="5" placeholder="Keterangan" readonly></textarea>
                            </div>
                        </div>
                        <!-- Keterangan -->

                        <!-- Status -->
                        <div class="form-group row align-items-center" style="margin-top: 1rem">
                            <label for="statusPeriode" class="col-sm-3">Status</label>
                            <div class="col-sm-9">
                                <select name="statusPeriose" id="status" class="form-control form-select" disabled>
                                    <option value="" class="text-muted">Pilih status</option>
                                    <option value="AKTIF">AKTIF</option>
                                    <option value="TIDAK AKTIF">TIDAK AKTIF</option>
                                </select>
                            </div>
                        </div>
                        <!-- Status -->

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
    <div class="overlay" id="editPeriod">
        <div class="wrapper">
            <div class="row align-items-center">
                <div class="col col-lg-9 col-md-8">
                    <h4>Edit Periode</h4>
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
                            <!-- Nama Periode -->
                            <div class="form-group row align-items-center" style="margin-top: 1rem">
                                <label for="namaPeriode" class="col-sm-3">Nama Periode</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="namaPeriode" placeholder="Nama Periode" value="Period Name">
                                </div>
                            </div>
                            <!-- Nama Periode -->

                            <!-- Tanggal Mulai -->
                            <div class="form-group row align-items-center" style="margin-top: 1rem">
                                <label for="tanggalMulai" class="col-sm-3">Tanggal Mulai</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" id="tangalMulai">
                                </div>
                            </div>
                            <!-- Tanggal Mulai -->

                            <!-- Tanggal Akhir -->
                            <div class="form-group row align-items-center" style="margin-top: 1rem">
                                <label for="tanggalAkhir" class="col-sm-3">Tanggal Akhir</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" id="tangalAkhir">
                                </div>
                            </div>
                            <!-- Tanggal Akhir -->

                            <!-- Keterangan -->
                            <div class="form-group row align-items-center" style="margin-top: 1rem">
                                <label for="tanggalAkhir" class="col-sm-3">Keterangan</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" id="keteranganPeriode" cols="20" rows="5" placeholder="Keterangan">lorem ipsum</textarea>
                                </div>
                            </div>
                            <!-- Keterangan -->

                            <!-- Status -->
                            <div class="form-group row align-items-center" style="margin-top: 1rem">
                                <label for="statusPeriode" class="col-sm-3">Status</label>
                                <div class="col-sm-9">
                                    <select name="statusPeriose" id="status" class="form-control form-select">
                                        <option value="" class="text-muted">Pilih status</option>
                                        <option value="AKTIF">AKTIF</option>
                                        <option value="TIDAK AKTIF">TIDAK AKTIF</option>
                                    </select>
                                </div>
                            </div>
                            <!-- Status -->

                            <div class="row mt-4">
                                <!--Button Perbarui -->
                                <div class="col">
                                    <button id="saveEdit" class="btn btn-primary">
                                        Perbarui
                                    </button>
                                </div>
                                <!--Button Perbarui -->

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
    <div class="overlay" id="deletePeriod">
        <div class="wrapper" style="width: 25%">
            <div class="content">
                <p class="text-center">
                    Hapus periode?
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