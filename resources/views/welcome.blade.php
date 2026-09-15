<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>PMM — Platform Merdeka Mengajar</title>

    <link rel="shortcut icon" href="{{ asset('img/sma.png') }}" type="image/x-icon">

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary: #2f6b4f;
            --primary-dark: #214d39;
            --primary-light: #e8f3ec;
            --sage: #b9d5c2;
            --mint: #f1f8f3;
            --cream: #fafcf9;
            --dark: #17231c;
            --text: #536158;
            --white: #ffffff;
            --border: #e3ebe5;
            --shadow: 0 20px 60px rgba(35, 76, 52, .10);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'DM Sans', sans-serif;
            color: var(--dark);
            background: var(--cream);
            line-height: 1.6;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        /* =========================
           NAVBAR
        ========================= */

        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1000;
            padding: 18px 5%;
        }

        .nav-container {
            max-width: 1200px;
            margin: auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 12px 18px;
            background: rgba(255, 255, 255, .82);
            backdrop-filter: blur(18px);
            -webkit-backdrop-filter: blur(18px);
            border: 1px solid rgba(255, 255, 255, .8);
            border-radius: 18px;
            box-shadow: 0 10px 40px rgba(34, 74, 50, .08);
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .brand img {
            width: 43px;
            height: 43px;
            object-fit: contain;
        }

        .brand-text {
            line-height: 1.15;
        }

        .brand-title {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 17px;
            font-weight: 800;
            color: var(--primary-dark);
        }

        .brand-subtitle {
            font-size: 10px;
            color: #78857c;
            margin-top: 3px;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 30px;
            font-size: 14px;
            font-weight: 600;
            color: #5d6961;
        }

        .nav-links a {
            transition: .25s ease;
        }

        .nav-links a:hover {
            color: var(--primary);
        }

        .nav-login {
            padding: 11px 20px;
            border-radius: 11px;
            background: var(--primary);
            color: white !important;
            box-shadow: 0 8px 20px rgba(47, 107, 79, .20);
        }

        .nav-login:hover {
            background: var(--primary-dark);
            transform: translateY(-1px);
        }

        /* =========================
           HERO
        ========================= */

        .hero {
            position: relative;
            overflow: hidden;
            min-height: 760px;
            display: flex;
            align-items: center;
            padding: 150px 5% 100px;
            background:
                radial-gradient(circle at 85% 20%, rgba(185, 213, 194, .55), transparent 28%),
                radial-gradient(circle at 10% 70%, rgba(232, 243, 236, .9), transparent 32%),
                linear-gradient(135deg, #f9fcfa 0%, #edf7f0 100%);
        }

        .hero::before {
            content: "";
            position: absolute;
            width: 450px;
            height: 450px;
            border-radius: 50%;
            background: rgba(255, 255, 255, .45);
            top: -200px;
            right: -120px;
        }

        .hero-container {
            position: relative;
            z-index: 2;
            width: 100%;
            max-width: 1200px;
            margin: auto;
            display: grid;
            grid-template-columns: 1.05fr .95fr;
            align-items: center;
            gap: 70px;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 14px;
            background: rgba(255, 255, 255, .72);
            border: 1px solid rgba(47, 107, 79, .12);
            border-radius: 100px;
            color: var(--primary);
            font-size: 12px;
            font-weight: 700;
            margin-bottom: 22px;
        }

        .badge-dot {
            width: 7px;
            height: 7px;
            background: #4d9a6c;
            border-radius: 50%;
            box-shadow: 0 0 0 5px rgba(77, 154, 108, .12);
        }

        .hero h1 {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: clamp(42px, 5vw, 70px);
            line-height: 1.08;
            letter-spacing: -2.5px;
            font-weight: 800;
            margin-bottom: 25px;
        }

        .hero h1 span {
            color: var(--primary);
        }

        .hero-description {
            max-width: 570px;
            color: var(--text);
            font-size: 17px;
            line-height: 1.8;
            margin-bottom: 34px;
        }

        .hero-buttons {
            display: flex;
            flex-wrap: wrap;
            gap: 13px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 9px;
            padding: 14px 23px;
            border-radius: 12px;
            font-size: 14px;
            font-weight: 700;
            transition: .25s ease;
        }

        .btn-primary {
            color: white;
            background: var(--primary);
            box-shadow: 0 12px 25px rgba(47, 107, 79, .22);
        }

        .btn-primary:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
        }

        .btn-secondary {
            color: var(--primary-dark);
            background: white;
            border: 1px solid var(--border);
        }

        .btn-secondary:hover {
            border-color: var(--sage);
            transform: translateY(-2px);
        }

        /* Hero visual */

        .hero-visual {
            position: relative;
        }

        .dashboard-card {
            position: relative;
            padding: 20px;
            border-radius: 28px;
            background: rgba(255, 255, 255, .72);
            border: 1px solid rgba(255, 255, 255, .9);
            box-shadow: 0 35px 80px rgba(38, 78, 53, .15);
            backdrop-filter: blur(15px);
        }

        .dashboard-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 18px;
        }

        .dashboard-title {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-weight: 800;
            font-size: 14px;
        }

        .dashboard-menu {
            display: flex;
            gap: 5px;
        }

        .dashboard-menu span {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: #c8d7cd;
        }

        .dashboard-main {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
        }

        .stat-card {
            padding: 18px;
            border-radius: 17px;
            background: white;
            border: 1px solid var(--border);
        }

        .stat-label {
            font-size: 11px;
            color: #87928b;
            margin-bottom: 7px;
        }

        .stat-number {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 25px;
            font-weight: 800;
            color: var(--primary-dark);
        }

        .stat-growth {
            font-size: 10px;
            color: #57966e;
            margin-top: 5px;
        }

        .chart-card {
            grid-column: span 2;
            padding: 18px;
            border-radius: 17px;
            background: var(--primary-dark);
            color: white;
            min-height: 180px;
        }

        .chart-heading {
            font-size: 12px;
            opacity: .75;
            margin-bottom: 15px;
        }

        .chart {
            height: 100px;
            display: flex;
            align-items: end;
            gap: 10px;
        }

        .bar {
            flex: 1;
            background: rgba(255, 255, 255, .2);
            border-radius: 5px 5px 2px 2px;
        }

        .bar:nth-child(1) {
            height: 35%;
        }

        .bar:nth-child(2) {
            height: 55%;
        }

        .bar:nth-child(3) {
            height: 42%;
        }

        .bar:nth-child(4) {
            height: 72%;
        }

        .bar:nth-child(5) {
            height: 61%;
        }

        .bar:nth-child(6) {
            height: 88%;
        }

        .bar:nth-child(7) {
            height: 78%;
        }

        .floating-card {
            position: absolute;
            bottom: -25px;
            left: -35px;
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 14px 17px;
            background: white;
            border-radius: 15px;
            box-shadow: 0 20px 45px rgba(34, 74, 50, .15);
        }

        .floating-icon {
            width: 40px;
            height: 40px;
            border-radius: 12px;
            background: var(--primary-light);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary);
            font-size: 19px;
        }

        .floating-title {
            font-size: 12px;
            font-weight: 800;
        }

        .floating-text {
            font-size: 10px;
            color: #89948d;
        }

        /* =========================
           TRUST
        ========================= */

        .trust {
            background: white;
            border-bottom: 1px solid var(--border);
        }

        .trust-container {
            max-width: 1200px;
            margin: auto;
            padding: 27px 5%;
            display: flex;
            justify-content: center;
            gap: 55px;
            flex-wrap: wrap;
        }

        .trust-item {
            color: #87928b;
            font-size: 12px;
            font-weight: 700;
        }

        /* =========================
           SECTION
        ========================= */

        .section {
            padding: 100px 5%;
        }

        .section-container {
            max-width: 1200px;
            margin: auto;
        }

        .section-heading {
            max-width: 700px;
            margin: 0 auto 55px;
            text-align: center;
        }

        .section-label {
            display: inline-block;
            color: var(--primary);
            font-size: 12px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 13px;
        }

        .section-heading h2 {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: clamp(30px, 4vw, 44px);
            line-height: 1.2;
            letter-spacing: -1px;
            margin-bottom: 15px;
        }

        .section-heading p {
            color: var(--text);
            font-size: 15px;
        }

        /* =========================
           FEATURES
        ========================= */

        .features {
            background: var(--cream);
        }

        .feature-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .feature-card {
            padding: 30px;
            background: white;
            border: 1px solid var(--border);
            border-radius: 20px;
            transition: .3s ease;
        }

        .feature-card:hover {
            transform: translateY(-6px);
            box-shadow: var(--shadow);
            border-color: #d1e1d6;
        }

        .feature-icon {
            width: 52px;
            height: 52px;
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--primary-light);
            color: var(--primary);
            font-size: 23px;
            margin-bottom: 21px;
        }

        .feature-card h3 {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 17px;
            margin-bottom: 10px;
        }

        .feature-card p {
            color: var(--text);
            font-size: 13px;
            line-height: 1.7;
        }

        /* =========================
           ABOUT
        ========================= */

        .about {
            background: white;
        }

        .about-grid {
            display: grid;
            grid-template-columns: .9fr 1.1fr;
            align-items: center;
            gap: 80px;
        }

        .about-visual {
            position: relative;
            padding: 40px;
            border-radius: 28px;
            background: linear-gradient(145deg, #e8f3ec, #f8fbf8);
            min-height: 400px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .about-circle {
            width: 260px;
            height: 260px;
            border-radius: 50%;
            background: white;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 25px 60px rgba(38, 78, 53, .12);
        }

        .about-circle img {
            width: 145px;
            height: 145px;
            object-fit: contain;
        }

        .about-content .section-label {
            margin-bottom: 12px;
        }

        .about-content h2 {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 38px;
            line-height: 1.2;
            margin-bottom: 20px;
        }

        .about-content p {
            color: var(--text);
            font-size: 15px;
            line-height: 1.9;
            margin-bottom: 18px;
        }

        .check-list {
            list-style: none;
            margin-top: 25px;
        }

        .check-list li {
            display: flex;
            gap: 10px;
            align-items: center;
            margin-bottom: 12px;
            font-size: 13px;
            font-weight: 600;
        }

        .check {
            width: 21px;
            height: 21px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--primary-light);
            color: var(--primary);
            font-size: 11px;
            font-weight: 800;
        }

        /* =========================
           STATS
        ========================= */

        .stats {
            padding: 65px 5%;
            background: var(--primary-dark);
            color: white;
        }

        .stats-grid {
            max-width: 1000px;
            margin: auto;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            text-align: center;
        }

        .stat-big {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 35px;
            font-weight: 800;
            margin-bottom: 5px;
        }

        .stat-desc {
            font-size: 12px;
            opacity: .65;
        }

        /* =========================
           CTA
        ========================= */

        .cta {
            padding: 100px 5%;
            background: var(--cream);
        }

        .cta-box {
            max-width: 1000px;
            margin: auto;
            padding: 70px 50px;
            text-align: center;
            border-radius: 30px;
            background:
                radial-gradient(circle at 80% 20%, rgba(185, 213, 194, .35), transparent 30%),
                linear-gradient(135deg, #e8f3ec, #f6faf7);
            border: 1px solid #dbe9df;
        }

        .cta-box h2 {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 38px;
            line-height: 1.2;
            margin-bottom: 15px;
        }

        .cta-box p {
            max-width: 600px;
            margin: auto auto 27px;
            color: var(--text);
            font-size: 15px;
        }

        /* =========================
           FOOTER
        ========================= */

        footer {
            background: #14231a;
            color: white;
            padding: 55px 5% 25px;
        }

        .footer-container {
            max-width: 1200px;
            margin: auto;
        }

        .footer-main {
            display: grid;
            grid-template-columns: 1.4fr 1fr 1fr;
            gap: 60px;
            padding-bottom: 45px;
        }

        .footer-brand {
            display: flex;
            gap: 12px;
            align-items: center;
            margin-bottom: 17px;
        }

        .footer-brand img {
            width: 43px;
            height: 43px;
            object-fit: contain;
        }

        .footer-brand strong {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .footer-description {
            max-width: 370px;
            color: rgba(255, 255, 255, .55);
            font-size: 12px;
            line-height: 1.8;
        }

        .footer-title {
            font-size: 12px;
            font-weight: 800;
            margin-bottom: 18px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .footer-links {
            display: flex;
            flex-direction: column;
            gap: 10px;
            color: rgba(255, 255, 255, .55);
            font-size: 12px;
        }

        .footer-links a:hover {
            color: white;
        }

        .footer-bottom {
            padding-top: 22px;
            border-top: 1px solid rgba(255, 255, 255, .09);
            display: flex;
            justify-content: space-between;
            gap: 20px;
            color: rgba(255, 255, 255, .4);
            font-size: 11px;
        }

        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 900px) {
            .nav-links a:not(.nav-login) {
                display: none;
            }

            .hero {
                min-height: auto;
                padding-top: 130px;
            }

            .hero-container,
            .about-grid {
                grid-template-columns: 1fr;
                gap: 55px;
            }

            .hero-content {
                text-align: center;
            }

            .hero-description {
                margin-left: auto;
                margin-right: auto;
            }

            .hero-buttons {
                justify-content: center;
            }

            .hero-visual {
                max-width: 600px;
                width: 100%;
                margin: auto;
            }

            .feature-grid {
                grid-template-columns: 1fr 1fr;
            }

            .stats-grid {
                grid-template-columns: 1fr 1fr;
                gap: 35px;
            }

            .about-content {
                text-align: center;
            }

            .about-content .section-label {
                display: block;
            }

            .check-list {
                display: inline-block;
                text-align: left;
            }

            .footer-main {
                grid-template-columns: 1fr 1fr;
            }
        }

        @media (max-width: 600px) {
            .navbar {
                padding: 10px 3%;
            }

            .nav-container {
                padding: 9px 13px;
            }

            .brand-subtitle {
                display: none;
            }

            .hero {
                padding: 115px 5% 80px;
            }

            .hero h1 {
                font-size: 39px;
                letter-spacing: -1.5px;
            }

            .hero-description {
                font-size: 14px;
            }

            .dashboard-card {
                padding: 13px;
            }

            .floating-card {
                left: 5px;
            }

            .feature-grid {
                grid-template-columns: 1fr;
            }

            .section {
                padding: 75px 5%;
            }

            .stats-grid {
                grid-template-columns: 1fr 1fr;
            }

            .about-content h2,
            .cta-box h2 {
                font-size: 30px;
            }

            .cta-box {
                padding: 50px 25px;
            }

            .footer-main {
                grid-template-columns: 1fr;
                gap: 35px;
            }

            .footer-bottom {
                flex-direction: column;
                text-align: center;
            }
        }
    </style>
</head>

<body>

    <!-- ================= NAVBAR ================= -->

    <header class="navbar">
        <div class="nav-container">

            <a href="{{ url('/') }}" class="brand">
                <img src="{{ asset('img/sma.png') }}" alt="Logo PMM">

                <div class="brand-text">
                    <div class="brand-title">PMM</div>
                    <div class="brand-subtitle">Platform Merdeka Mengajar</div>
                </div>
            </a>

            <nav class="nav-links">
                <a href="#beranda">Beranda</a>
                <a href="#fitur">Fitur</a>
                <a href="#tentang">Tentang</a>

                @if (Route::has('login'))
                @auth
                <a href="{{ url('/dashboard') }}" class="nav-login">
                    Dashboard
                </a>
                @else
                <a href="{{ route('login') }}" class="nav-login">
                    Masuk
                </a>
                @endauth
                @endif
            </nav>

        </div>
    </header>


    <!-- ================= HERO ================= -->

    <section class="hero" id="beranda">

        <div class="hero-container">

            <div class="hero-content">

                <div class="hero-badge">
                    <span class="badge-dot"></span>
                    Platform Pendidikan Indonesia
                </div>

                <h1>
                    Belajar, Berkarya &
                    <span>Berbagi</span>
                    untuk Pendidikan.
                </h1>

                <p class="hero-description">
                    Platform Merdeka Mengajar membantu pendidik menemukan
                    inspirasi, mengembangkan kompetensi, berbagi praktik baik,
                    dan menciptakan pembelajaran yang lebih bermakna.
                </p>

                <div class="hero-buttons">

                    @if (Route::has('login'))
                    @auth
                    <a href="{{ url('/dashboard') }}" class="btn btn-primary">
                        Buka Dashboard
                        <span>→</span>
                    </a>
                    @else
                    <a href="{{ route('login') }}" class="btn btn-primary">
                        Mulai Sekarang
                        <span>→</span>
                    </a>
                    @endauth
                    @endif

                    <a href="#fitur" class="btn btn-secondary">
                        Jelajahi Fitur
                    </a>

                </div>

            </div>


            <!-- Dashboard Illustration -->

            <div class="hero-visual">

                <div class="dashboard-card">

                    <div class="dashboard-top">

                        <div class="dashboard-title">
                            Dashboard PMM
                        </div>

                        <div class="dashboard-menu">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>

                    </div>

                    <div class="dashboard-main">

                        <div class="stat-card">
                            <div class="stat-label">Aktivitas</div>
                            <div class="stat-number">128</div>
                            <div class="stat-growth">↑ 18% bulan ini</div>
                        </div>

                        <div class="stat-card">
                            <div class="stat-label">Pembelajaran</div>
                            <div class="stat-number">42</div>
                            <div class="stat-growth">↑ 12% bulan ini</div>
                        </div>

                        <div class="chart-card">

                            <div class="chart-heading">
                                Perkembangan Aktivitas
                            </div>

                            <div class="chart">
                                <div class="bar"></div>
                                <div class="bar"></div>
                                <div class="bar"></div>
                                <div class="bar"></div>
                                <div class="bar"></div>
                                <div class="bar"></div>
                                <div class="bar"></div>
                            </div>

                        </div>

                    </div>

                </div>


                <div class="floating-card">

                    <div class="floating-icon">
                        ✓
                    </div>

                    <div>
                        <div class="floating-title">
                            Kompetensi meningkat
                        </div>

                        <div class="floating-text">
                            Terus berkembang bersama PMM
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </section>


    <!-- ================= TRUST ================= -->

    <div class="trust">

        <div class="trust-container">

            <div class="trust-item">
                ✓ Pembelajaran Mandiri
            </div>

            <div class="trust-item">
                ✓ Komunitas Pendidik
            </div>

            <div class="trust-item">
                ✓ Praktik Baik
            </div>

            <div class="trust-item">
                ✓ Pengembangan Kompetensi
            </div>

        </div>

    </div>


    <!-- ================= FEATURES ================= -->

    <section class="section features" id="fitur">

        <div class="section-container">

            <div class="section-heading">

                <span class="section-label">
                    Fitur Utama
                </span>

                <h2>
                    Semua yang dibutuhkan pendidik dalam satu platform.
                </h2>

                <p>
                    Temukan berbagai sumber belajar dan ruang untuk berkembang
                    bersama komunitas pendidikan.
                </p>

            </div>


            <div class="feature-grid">

                <div class="feature-card">

                    <div class="feature-icon">
                        📚
                    </div>

                    <h3>
                        Perangkat Ajar
                    </h3>

                    <p>
                        Akses berbagai referensi dan perangkat pembelajaran
                        yang dapat membantu guru mempersiapkan kegiatan belajar.
                    </p>

                </div>


                <div class="feature-card">

                    <div class="feature-icon">
                        🎓
                    </div>

                    <h3>
                        Pelatihan Mandiri
                    </h3>

                    <p>
                        Kembangkan kompetensi melalui berbagai materi dan
                        aktivitas pembelajaran yang dapat dilakukan secara mandiri.
                    </p>

                </div>


                <div class="feature-card">

                    <div class="feature-icon">
                        💡
                    </div>

                    <h3>
                        Inspirasi Mengajar
                    </h3>

                    <p>
                        Temukan ide dan inspirasi dari praktik baik yang
                        dilakukan oleh pendidik di berbagai daerah.
                    </p>

                </div>


                <div class="feature-card">

                    <div class="feature-icon">
                        🤝
                    </div>

                    <h3>
                        Komunitas
                    </h3>

                    <p>
                        Terhubung dengan komunitas dan sesama pendidik untuk
                        bertukar pengalaman serta pengetahuan.
                    </p>

                </div>


                <div class="feature-card">

                    <div class="feature-icon">
                        📊
                    </div>

                    <h3>
                        Perkembangan
                    </h3>

                    <p>
                        Pantau perjalanan belajar dan perkembangan aktivitas
                        secara lebih terstruktur.
                    </p>

                </div>


                <div class="feature-card">

                    <div class="feature-icon">
                        🌱
                    </div>

                    <h3>
                        Bertumbuh Bersama
                    </h3>

                    <p>
                        Bangun budaya belajar yang berkelanjutan untuk
                        menciptakan pendidikan yang lebih berkualitas.
                    </p>

                </div>

            </div>

        </div>

    </section>


    <!-- ================= ABOUT ================= -->

    <section class="section about" id="tentang">

        <div class="section-container">

            <div class="about-grid">

                <div class="about-visual">

                    <div class="about-circle">

                        <img src="{{ asset('img/sma.png') }}" alt="Logo SMA">

                    </div>

                </div>


                <div class="about-content">

                    <span class="section-label">
                        Tentang PMM
                    </span>

                    <h2>
                        Mendorong guru untuk terus belajar dan berkembang.
                    </h2>

                    <p>
                        Platform Merdeka Mengajar merupakan ruang digital
                        yang dirancang untuk mendukung pendidik dalam
                        melaksanakan pembelajaran dan mengembangkan kompetensi.
                    </p>

                    <p>
                        Melalui teknologi dan kolaborasi, pendidik dapat
                        memperoleh inspirasi, belajar dari praktik baik,
                        serta berbagi pengalaman dengan komunitas pendidikan.
                    </p>

                    <ul class="check-list">

                        <li>
                            <span class="check">✓</span>
                            Sumber belajar yang relevan
                        </li>

                        <li>
                            <span class="check">✓</span>
                            Mendukung pengembangan kompetensi
                        </li>

                        <li>
                            <span class="check">✓</span>
                            Membangun kolaborasi antarpendidik
                        </li>

                        <li>
                            <span class="check">✓</span>
                            Mendorong praktik pembelajaran yang bermakna
                        </li>

                    </ul>

                </div>

            </div>

        </div>

    </section>


    <!-- ================= STATS ================= -->

    <section class="stats">

        <div class="stats-grid">

            <div>
                <div class="stat-big">100+</div>
                <div class="stat-desc">Materi Pembelajaran</div>
            </div>

            <div>
                <div class="stat-big">50+</div>
                <div class="stat-desc">Aktivitas Belajar</div>
            </div>

            <div>
                <div class="stat-big">24/7</div>
                <div class="stat-desc">Akses Platform</div>
            </div>

            <div>
                <div class="stat-big">∞</div>
                <div class="stat-desc">Kesempatan Berkembang</div>
            </div>

        </div>

    </section>


    <!-- ================= CTA ================= -->

    <section class="cta">

        <div class="cta-box">

            <h2>
                Siap untuk terus berkembang?
            </h2>

            <p>
                Mulai perjalanan belajar Anda dan temukan berbagai
                inspirasi untuk menciptakan pembelajaran yang lebih bermakna.
            </p>

            @if (Route::has('login'))

            @auth

            <a href="{{ url('/dashboard') }}" class="btn btn-primary">
                Masuk ke Dashboard →
            </a>

            @else

            <a href="{{ route('login') }}" class="btn btn-primary">
                Mulai Sekarang →
            </a>

            @endauth

            @endif

        </div>

    </section>


    <!-- ================= FOOTER ================= -->

    <footer>

        <div class="footer-container">

            <div class="footer-main">

                <div>

                    <div class="footer-brand">

                        <img src="{{ asset('img/sma.png') }}" alt="Logo">

                        <strong>
                            PMM
                        </strong>

                    </div>

                    <p class="footer-description">
                        Platform Merdeka Mengajar untuk mendukung pendidik
                        dalam belajar, berkarya, berbagi, dan terus berkembang
                        demi pendidikan Indonesia.
                    </p>

                </div>


                <div>

                    <div class="footer-title">
                        Navigasi
                    </div>

                    <div class="footer-links">
                        <a href="#beranda">Beranda</a>
                        <a href="#fitur">Fitur</a>
                        <a href="#tentang">Tentang PMM</a>
                    </div>

                </div>


                <div>

                    <div class="footer-title">
                        Tautan
                    </div>

                    <div class="footer-links">

                        <a href="https://www.smawahidiyahkediri.my.id/" target="_blank">
                            SMAWA
                        </a>

                        <a href="https://pmm.smawahidiyahkediri.my.id/" target="_blank">
                            PMM
                        </a>

                        @if (Route::has('login'))
                        @auth
                        <a href="{{ url('/dashboard') }}">
                            Dashboard
                        </a>
                        @else
                        <a href="{{ route('login') }}">
                            Login
                        </a>
                        @endauth
                        @endif

                    </div>

                </div>

            </div>


            <div class="footer-bottom">

                <div>
                    © {{ date('Y') }} PMM. All rights reserved.
                </div>

                <div>
                    Laravel v{{ Illuminate\Foundation\Application::VERSION }}
                    · PHP v{{ PHP_VERSION }}
                </div>

            </div>

        </div>

    </footer>

</body>

</html>