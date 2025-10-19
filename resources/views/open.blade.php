@extends('welcome')

@section('content')
    <section class="carousel">
        <div class="carousel-track">
            <img src="https://images.unsplash.com/photo-1551836022-d5d88e9218df?auto=format&fit=crop&w=1500&q=80"
                alt="Karier Digital">
            <img src="https://images.unsplash.com/photo-1521737604893-d14cc237f11d?auto=format&fit=crop&w=1500&q=80"
                alt="Kolaborasi Tim">
            <img src="https://images.unsplash.com/photo-1519389950473-47ba0277781c?auto=format&fit=crop&w=1500&q=80"
                alt="Inovasi Teknologi">
        </div>
        <button class="carousel-btn prev">&#10094;</button>
        <button class="carousel-btn next">&#10095;</button>
    </section>

    <!-- Stats Section -->
    <section class="stats">
        <div class="stat-box">
            <h3>12.4K+</h3>
            <p>Pencari kerja terdaftar</p>
        </div>
        <div class="stat-box">
            <h3>1.8K+</h3>
            <p>Lowongan aktif</p>
        </div>
        <div class="stat-box">
            <h3>320+</h3>
            <p>Perusahaan mitra</p>
        </div>
        <div class="stat-box">
            <h3>9.6K+</h3>
            <p>Lamaran terkirim</p>
        </div>
    </section>

    <!-- Job Categories -->
    <section class="categories">
        <h2>Kategori Pekerjaan Populer</h2>
        <div class="category-list">
            <div class="category-card">💻 Teknologi</div>
            <div class="category-card">🎨 Desain</div>
            <div class="category-card">📈 Marketing</div>
            <div class="category-card">💬 Customer Support</div>
            <div class="category-card">💰 Keuangan</div>
            <div class="category-card">⚙️ Engineering</div>
        </div>
    </section>

    <!-- Job Listings -->
    <section class="jobs">
        <h2>Lowongan Terbaru</h2>
        <div class="job-list">
            <div class="job-card">
                <h3>Frontend Developer</h3>
                <p><strong>PT Digital Cipta</strong> - Jakarta</p>
                <p>Menguasai ReactJS, HTML, CSS, dan API Integration.</p>
                <a href="#" class="btn-apply">Lamar Sekarang</a>
            </div>
            <div class="job-card">
                <h3>UI/UX Designer</h3>
                <p><strong>Kreativa Studio</strong> - Bandung</p>
                <p>Berpengalaman menggunakan Figma dan memahami design system.</p>
                <a href="#" class="btn-apply">Lamar Sekarang</a>
            </div>
            <div class="job-card">
                <h3>Data Analyst</h3>
                <p><strong>InsightLab</strong> - Yogyakarta</p>
                <p>Mampu menggunakan Python, SQL, dan Power BI untuk analisis data.</p>
                <a href="#" class="btn-apply">Lamar Sekarang</a>
            </div>
            <div class="job-card">
                <h3>Marketing Specialist</h3>
                <p><strong>MarketPlus</strong> - Surabaya</p>
                <p>Menguasai digital marketing, SEO, dan manajemen kampanye sosial media.</p>
                <a href="#" class="btn-apply">Lamar Sekarang</a>
            </div>
        </div>
    </section>
    @push('scripts')
        <script>
            const track = document.querySelector('.carousel-track');
            const slides = Array.from(track.children);
            const nextBtn = document.querySelector('.carousel-btn.next');
            const prevBtn = document.querySelector('.carousel-btn.prev');
            let index = 0;

            function showSlide(i) {
                index = (i + slides.length) % slides.length;
                track.style.transform = `translateX(-${index * 100}%)`;
            }

            nextBtn.addEventListener('click', () => showSlide(index + 1));
            prevBtn.addEventListener('click', () => showSlide(index - 1));

            setInterval(() => showSlide(index + 1), 5000);
        </script>
    @endpush
@endsection
