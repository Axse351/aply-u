@extends('admin')

@section('title', 'Manajemen Lowongan')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Manajemen Lowongan</h1>
            <div class="section-header-button">
                <a href="{{ route('jobs.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Tambah Lowongan
                </a>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Daftar Lowongan</h2>
            <p class="section-lead">
                Kelola data pekerjaan dan kategorinya di bawah ini.
            </p>

            <div class="card">
                <div class="card-header">
                    <h4>Data Lowongan</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Judul</th>
                                    <th>Kategori</th>
                                    <th>Lokasi</th>
                                    <th>Tanggal Dibuat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($jobs as $index => $job)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $job->title }}</td>
                                        <td>{{ $job->category->name ?? '-' }}</td>
                                        <td>{{ $job->location }}</td>
                                        <td>{{ $job->created_at->format('d M Y') }}</td>
                                        <td>
                                            <a href="{{ route('jobs.edit', $job->id) }}" class="btn btn-warning btn-sm"><i
                                                    class="fas fa-edit"></i></a>
                                            <form action="{{ route('jobs.destroy', $job->id) }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Yakin ingin menghapus?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">Belum ada data lowongan.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
