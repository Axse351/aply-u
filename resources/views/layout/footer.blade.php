<footer>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        .social-icons i {
            font-family: "Font Awesome 6 Brands";
            font-size: 20px;
            color: #f3f4f6;
        }

        .social-icons a:hover i {
            color: #3b82f6;
        }
    </style>
    <div class="footer-container">
        <!-- Logo & Deskripsi -->
        <div class="footer-column">
            <div class="footer-logo">Lockin</div>
            <p class="footer-description">Platform terbaik untuk mencari informasi, memasang iklan, dan terhubung dengan
                komunitas. Selalu aman dan terpercaya.</p>
            <div class="social-icons">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-linkedin-in"></i></a>
            </div>
        </div>

        <!-- Navigasi -->
        <div class="footer-column">
            <h4>Navigasi</h4>
            <ul>
                <li><a href="{{ url('/about') }}">Tentang Kami</a></li>
                <li><a href="{{ url('/contact') }}">Hubungi Kami</a></li>
                <li><a href="{{ url('/ads') }}">Pasang Iklan</a></li>
                <li><a href="#">Privacy Policy</a></li>
                <li><a href="#">Terms of Service</a></li>
            </ul>
        </div>

        <!-- Bantuan -->
        <div class="footer-column">
            <h4>Bantuan</h4>
            <ul>
                <li><a href="#">FAQ</a></li>
                <li><a href="#">Cara Memasang Iklan</a></li>
                <li><a href="#">Syarat & Ketentuan</a></li>
            </ul>
        </div>

        <!-- Kontak -->
        <div class="footer-column">
            <h4>Kontak</h4>
            <p>Email: support@lockin.com</p>
            <p>Telepon: +62 812-3456-7890</p>
            <p>Alamat: Jl. Contoh No.123, Jakarta</p>
        </div>
    </div>

    <div class="footer-bottom">
        © 2025 Lockin. All Rights Reserved.
    </div>
</footer>
