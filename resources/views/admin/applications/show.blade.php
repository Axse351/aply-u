@extends('admin')

@section('title', 'Detail Lamaran Pekerjaan')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Detail Lamaran Pekerjaan</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="{{ route('admin.applications.index') }}">Daftar Pelamar</a></div>
                <div class="breadcrumb-item active">Detail Lamaran</div>
            </div>
        </div>

        <div class="section-body">
            <div class="card author-box card-primary">
                <div class="card-body d-flex align-items-center">
                    <div class="author-box-left text-center mr-4">
                        <img alt="Foto Pelamar" src="{{ asset('storage/' . $application->photo_path) }}"
                            class="rounded-circle author-box-picture"
                            style="width: 120px; height: 120px; object-fit: cover;">
                        <div class="mt-2">
                            <a href="{{ asset('storage/' . $application->photo_path) }}" target="_blank"
                                class="btn btn-sm btn-info">
                                Lihat Foto
                            </a>
                        </div>
                    </div>
                    <div class="author-box-details flex-fill">
                        <div class="author-box-name">
                            <h4 class="mb-0">{{ $application->full_name }}</h4>
                        </div>
                        <div class="author-box-job text-muted">
                            Pelamar untuk posisi: <strong>{{ $application->job->title }}</strong>
                        </div>
                        <div class="mt-3">
                            <p><strong>Kategori:</strong> {{ $application->job->category->name ?? '-' }}</p>
                            <p><strong>Lokasi:</strong> {{ $application->job->location ?? '-' }}</p>
                            <p><strong>Tanggal Lamar:</strong> {{ $application->created_at->format('d M Y') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-header bg-primary text-white">
                    <h4>Data Diri Pelamar</h4>
                </div>
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <p><strong>Nama Lengkap:</strong> {{ $application->full_name }}</p>
                            <p><strong>Umur:</strong> {{ $application->age }} tahun</p>
                            <p><strong>Jenis Kelamin:</strong> {{ ucfirst($application->gender) }}</p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Status Perkawinan:</strong> {{ ucfirst($application->marital_status) }}</p>
                            <p><strong>Alamat:</strong> {{ $application->address }}</p>
                            <p><strong>Harapan dalam pekerjaan:</strong> {{ $application->job_expectation ?? '-' }}</p>
                        </div>
                    </div>

                    <hr>

                    <p><strong>CV:</strong></p>
                    @if ($application->cv_path)
                        <a href="{{ asset('storage/' . $application->cv_path) }}" target="_blank" class="btn btn-primary">
                            <i class="fas fa-file-pdf"></i> Lihat CV
                        </a>
                    @else
                        <p class="text-muted">Belum mengunggah CV.</p>
                    @endif
                </div>

                <div class="card-footer text-right">
                    <a href="{{ route('admin.applications.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
