@extends('welcome')

@section('content')
    <section class="apply-section" style="padding: 80px 0; background: var(--gray-light);">
        <div class="container" style="max-width: 800px; margin: 0 auto;">

            {{-- ALERT ERROR --}}
            @if ($errors->any())
                <div style="background: #fee2e2; color: #b91c1c; padding: 15px; border-radius: 10px; margin-bottom: 20px;">
                    <strong>Terjadi Kesalahan:</strong>
                    <ul style="margin-top: 8px; margin-left: 20px;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- ALERT SUCCESS --}}
            @if (session('success'))
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil!',
                            text: '{{ session('success') }}',
                            confirmButtonColor: '#0ea5e9'
                        }).then(() => {
                            window.location.href = "{{ route('user.lowongan') }}";
                        });
                    });
                </script>
            @endif

            <div class="apply-card"
                style="
                    background: #fff;
                    border-radius: 20px;
                    padding: 40px 50px;
                    box-shadow: 0 6px 20px var(--shadow);
                    border: 1px solid #e2e8f0;
                ">
                <h2
                    style="
                        font-size: 28px;
                        font-weight: 700;
                        color: var(--navy);
                        text-align: center;
                        margin-bottom: 25px;
                    ">
                    Lamar Pekerjaan: <span style="color: var(--sky);">{{ $job->title }}</span>
                </h2>

                <form action="{{ route('user.jobs.store', $job->id) }}" method="POST" enctype="multipart/form-data"
                    style="margin-top: 20px;">
                    @csrf

                    <div class="form-group" style="margin-bottom: 20px;">
                        <label style="font-weight: 600; color: var(--gray-dark);">Nama Lengkap</label>
                        <input type="text" class="form-control" value="{{ auth()->user()->name }}" readonly
                            style="width: 100%; padding: 12px; border-radius: 10px; border: 1px solid #cbd5e1; background: #f1f5f9;">
                    </div>

                    <div class="form-group" style="margin-bottom: 20px;">
                        <label>Umur</label>
                        <input type="number" name="age" class="form-control" required
                            style="width: 100%; padding: 12px; border-radius: 10px; border: 1px solid #cbd5e1;">
                    </div>

                    <div class="form-group" style="margin-bottom: 20px;">
                        <label>Status Perkawinan</label>
                        <select name="marital_status" class="form-control" required
                            style="width: 100%; padding: 12px; border-radius: 10px; border: 1px solid #cbd5e1;">
                            <option value="">-- Pilih --</option>
                            <option value="Belum Menikah">Belum Menikah</option>
                            <option value="Menikah">Menikah</option>
                        </select>
                    </div>

                    <div class="form-group" style="margin-bottom: 20px;">
                        <label>Jenis Kelamin</label>
                        <select name="gender" class="form-control" required
                            style="width: 100%; padding: 12px; border-radius: 10px; border: 1px solid #cbd5e1;">
                            <option value="">-- Pilih --</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>

                    <div class="form-group" style="margin-bottom: 20px;">
                        <label>Alamat</label>
                        <textarea name="address" class="form-control" required
                            style="width: 100%; padding: 12px; border-radius: 10px; border: 1px solid #cbd5e1; min-height: 90px;"></textarea>
                    </div>

                    <div class="form-group" style="margin-bottom: 20px;">
                        <label>Harapan dalam Pekerjaan</label>
                        <textarea name="job_expectation" class="form-control"
                            style="width: 100%; padding: 12px; border-radius: 10px; border: 1px solid #cbd5e1; min-height: 90px;"></textarea>
                    </div>

                    <div class="form-group" style="margin-bottom: 20px;">
                        <label>Upload CV (PDF)</label>
                        <input type="file" name="cv" accept=".pdf" class="form-control" required
                            style="width: 100%; padding: 10px; border-radius: 10px; border: 1px solid #cbd5e1;">
                    </div>

                    <div class="form-group" style="margin-bottom: 30px;">
                        <label>Upload Foto Diri</label>
                        <input type="file" name="photo" accept="image/*" class="form-control" required
                            style="width: 100%; padding: 10px; border-radius: 10px; border: 1px solid #cbd5e1;">
                    </div>

                    <div style="text-align: center;">
                        <button type="submit" class="btn-apply"
                            style="
                                background: var(--sky);
                                color: white;
                                border: none;
                                padding: 14px 32px;
                                border-radius: 12px;
                                font-weight: 600;
                                cursor: pointer;
                                font-size: 16px;
                                transition: all 0.3s ease;
                                box-shadow: 0 4px 15px rgba(56,189,248,0.3);
                            "
                            onmouseover="this.style.background='var(--teal)'"
                            onmouseout="this.style.background='var(--sky)'">
                            Kirim Lamaran
                        </button>
                    </div>
                </form>
            </div>

            <div style="text-align: center; margin-top: 25px;">
                <a href="{{ route('user.lowongan') }}" style="color: var(--gray-dark); text-decoration: none;">
                    ← Kembali ke Daftar Lowongan
                </a>
            </div>
        </div>
    </section>

    {{-- SweetAlert CDN --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
