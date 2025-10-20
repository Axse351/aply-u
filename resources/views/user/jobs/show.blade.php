@extends('welcome')

@section('content')
    <link rel="stylesheet" href="{{ asset('asset/job-detail.css') }}">

    <div class="container">
        {{-- DETAIL PEKERJAAN --}}
        <div class="section">
            <h2>Detail Pekerjaan</h2>

            <div class="job-detail-header">
                <img src="https://upload.wikimedia.org/wikipedia/commons/f/fa/Google_Logo.svg" alt="Logo Perusahaan"
                    class="company-logo">
                <div class="job-info">
                    <h3>{{ $job->title }}</h3>
                    <div class="company-name">{{ $job->company }}</div>
                    <div class="job-meta">
                        📍 {{ $job->location ?? 'Lokasi tidak tersedia' }} •
                        💼 {{ $job->category->name ?? 'Tanpa Kategori' }} •
                        🗓 {{ $job->created_at->format('d M Y') }}
                    </div>
                </div>
            </div>

            <div class="job-desc">
                {!! nl2br(e($job->description)) !!}
            </div>
        </div>

        {{-- FORM LAMARAN --}}
        <div class="section">
            <h2>Form Lamaran</h2>

            {{-- Tampilkan Error --}}
            @if ($errors->any())
                <div class="alert alert-danger"
                    style="background:#f8d7da; padding:10px; margin-bottom:15px; border-radius:5px;">
                    <ul style="margin:0; padding-left:20px;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Tampilkan Success (popup sederhana) --}}
            @if (session('success'))
                <script>
                    alert("{{ session('success') }}");
                </script>
            @endif

            <form action="{{ route('user.jobs.apply', $job->id) }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-row">
                    <div>
                        <label>Nama Lengkap</label>
                        <input type="text" name="full_name" placeholder="Masukkan nama lengkap Anda"
                            value="{{ old('full_name', auth()->user()->name) }}" required>
                    </div>
                    <div>
                        <label>Usia</label>
                        <input type="number" name="age" placeholder="Contoh: 25" value="{{ old('age') }}" required>
                    </div>
                </div>

                <div class="form-row">
                    <div>
                        <label>Jenis Kelamin</label>
                        <select name="gender" required>
                            <option value="">Pilih jenis kelamin</option>
                            <option value="Laki-laki" {{ old('gender') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki
                            </option>
                            <option value="Perempuan" {{ old('gender') == 'Perempuan' ? 'selected' : '' }}>Perempuan
                            </option>
                        </select>
                    </div>
                    <div>
                        <label>Status Pernikahan</label>
                        <select name="marital_status" required>
                            <option value="">Pilih status</option>
                            <option value="Belum Menikah" {{ old('marital_status') == 'Belum Menikah' ? 'selected' : '' }}>
                                Belum Menikah</option>
                            <option value="Menikah" {{ old('marital_status') == 'Menikah' ? 'selected' : '' }}>Menikah
                            </option>
                            <option value="Cerai" {{ old('marital_status') == 'Cerai' ? 'selected' : '' }}>Cerai</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label>Alamat Lengkap</label>
                    <textarea name="address" placeholder="Masukkan alamat tempat tinggal Anda" required>{{ old('address') }}</textarea>
                </div>

                <div>
                    <label>Harapan Pekerjaan</label>
                    <textarea name="job_expectation" placeholder="Tuliskan harapan atau ekspektasi pekerjaan Anda (opsional)">{{ old('job_expectation') }}</textarea>
                </div>

                <div class="form-row">
                    <div>
                        <label>Unggah CV / Portofolio</label>
                        <input type="file" name="cv" accept=".pdf,.doc,.docx" required>
                    </div>
                    <div>
                        <label>Unggah Foto</label>
                        <input type="file" name="photo" accept=".jpg,.jpeg,.png" required>
                    </div>
                </div>

                <button type="submit" class="submit-btn">Kirim Lamaran</button>
            </form>
        </div>

        <div style="text-align:center;">
            <a href="{{ route('user.lowongan') }}" style="color:#555; text-decoration:none;">← Kembali ke Daftar
                Lowongan</a>
        </div>
    </div>

    <footer>
        <p>&copy; {{ date('Y') }} Lockin. All rights reserved.</p>
    </footer>
@endsection
