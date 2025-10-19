@extends('admin') {{-- pastikan ini layout Stisla-mu --}}

@section('title', 'Daftar Pelamar')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Daftar Pelamar</h1>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4>Data Pelamar Pekerjaan</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Pelamar</th>
                                    <th>Pekerjaan</th>
                                    <th>Kategori</th>
                                    <th>Lokasi</th>
                                    <th>Umur</th>
                                    <th>Status</th>
                                    <th>Gender</th>
                                    <th>Tanggal Lamar</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($applications as $app)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $app->user->name }}</td>
                                        <td>{{ $app->job->title }}</td>
                                        <td>{{ $app->job->category->name ?? '-' }}</td>
                                        <td>{{ $app->job->location ?? '-' }}</td>
                                        <td>{{ $app->age ?? '-' }}</td>
                                        <td>{{ $app->marital_status ?? '-' }}</td>
                                        <td>{{ ucfirst($app->gender ?? '-') }}</td>
                                        <td>{{ $app->created_at->format('d M Y') }}</td>
                                        <td>
                                            <a href="{{ route('admin.applications.show', $app->id) }}"
                                                class="btn btn-sm btn-success">
                                                <i class="fas fa-eye"></i> Detail
                                            </a>
                                            <a href="{{ asset('storage/' . $app->cv_path) }}" target="_blank"
                                                class="btn btn-sm btn-primary">Lihat CV</a>
                                            <a href="{{ asset('storage/' . $app->photo_path) }}" target="_blank"
                                                class="btn btn-sm btn-info">Foto</a>
                                        </td>
                                        <td></td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="10" class="text-center">Belum ada pelamar.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-3">
                        {{ $applications->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
