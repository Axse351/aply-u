@extends('welcome')

@section('content')
    <section class="job-detail" style="padding: 60px 0; background-color: #f8f9fa;">
        <div class="container" style="max-width: 800px; margin: 0 auto;">
            <div class="card"
                style="background: #fff; border-radius: 12px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); padding: 30px;">
                <h2 style="font-size: 26px; font-weight: 700; margin-bottom: 15px; color: #333;">
                    {{ $job->title }}
                </h2>

                <div style="margin-bottom: 20px; color: #555;">
                    <p><strong>Kategori:</strong> {{ $job->category->name ?? 'Tanpa Kategori' }}</p>
                    <p><strong>Lokasi:</strong> {{ $job->location ?? 'Tidak tersedia' }}</p>
                    <p><strong>Tanggal Posting:</strong> {{ $job->created_at->format('d M Y') }}</p>
                </div>

                <hr style="margin: 20px 0; border: none; border-top: 1px solid #eee;">

                <div style="color: #444; line-height: 1.7;">
                    {!! nl2br(e($job->description)) !!}
                </div>

                <div style="margin-top: 30px; text-align: center;">
                    <a href="{{ route('user.jobs.apply', $job->id) }}"
                        style="
                            display: inline-block;
                            background-color: #007bff;
                            color: white;
                            padding: 12px 28px;
                            border-radius: 8px;
                            text-decoration: none;
                            font-weight: 600;
                            transition: 0.3s;">
                        Lamar Sekarang
                    </a>
                </div>
            </div>

            <div style="text-align: center; margin-top: 25px;">
                <a href="{{ route('user.lowongan') }}" style="color: #555; text-decoration: none;">
                    ← Kembali ke Daftar Lowongan
                </a>
            </div>
        </div>
    </section>
@endsection
