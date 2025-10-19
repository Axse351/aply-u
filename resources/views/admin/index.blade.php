@extends('admin')

@section('title', 'Dashboard Admin')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Dashboard Admin</h1>
        </div>

        <div class="section-body">
            <h2 class="section-title">Selamat Datang, {{ Auth::user()->name }} 👋</h2>
            <p class="section-lead">
                Ini adalah halaman utama untuk admin Lockin. Kamu bisa mengelola data, melihat statistik, dan memantau
                aktivitas sistem di sini.
            </p>

            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Pengguna</h4>
                            </div>
                            <div class="card-body">
                                123
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-success">
                            <i class="fas fa-briefcase"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Lowongan Aktif</h4>
                            </div>
                            <div class="card-body">
                                18
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                            <i class="fas fa-user-check"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Pelamar Hari Ini</h4>
                            </div>
                            <div class="card-body">
                                27
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-danger">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Pesan Masuk</h4>
                            </div>
                            <div class="card-body">
                                4
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Tambah konten lain di bawah sini --}}
        </div>
    </section>
@endsection
