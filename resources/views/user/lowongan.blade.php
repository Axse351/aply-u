@extends('welcome')

@section('content')
    <!-- Filter Kategori -->
    <section class="filter-category">
        <div class="container" style="text-align:center; margin:40px auto;">
            <h2>Pilih Kategori Pekerjaan</h2>
            <form method="GET" action="{{ route('user.lowongan') }}">
                <select name="category_id" onchange="this.form.submit()"
                    style="padding:12px 18px; border-radius:8px; border:1px solid #ccc; min-width:250px; margin-top:15px;">
                    <option value="">Semua Kategori</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </form>
        </div>
    </section>

    <!-- Job Listings -->
    <section class="jobs" style="padding-bottom:60px;">
        <h2>Daftar Lowongan</h2>
        <div class="job-list">
            @forelse ($jobs as $job)
                <div class="job-card">
                    <h3>{{ $job->title }}</h3>
                    <p>
                        <strong>{{ $job->category->name ?? 'Tanpa Kategori' }}</strong>
                        - {{ $job->location ?? 'Lokasi tidak tersedia' }}
                    </p>
                    <p>{{ Str::limit($job->description, 120) }}</p>
                    <a href="{{ route('user.jobs.show', $job->id) }}" class="btn-apply">Lamar Sekarang</a>
                </div>
            @empty
                <p style="text-align:center;">Belum ada lowongan yang tersedia.</p>
            @endforelse
        </div>
    </section>
@endsection
