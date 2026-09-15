<x-guest-layout>

    @section('title', ' | Login')

    <style>
        :root {
            --primary: #2f6b4f;
            --primary-dark: #214d39;
            --primary-light: #e8f3ec;
            --sage: #b9d5c2;
            --cream: #f6faf7;
            --text: #526158;
            --border: #dfe9e2;
        }

        body {
            margin: 0;
            background:
                radial-gradient(circle at 10% 10%, rgba(185, 213, 194, .55), transparent 28%),
                radial-gradient(circle at 90% 90%, rgba(185, 213, 194, .45), transparent 28%),
                linear-gradient(135deg, #f8fcf9 0%, #edf6f0 100%);
        }

        .login-wrapper {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 30px 20px;
            font-family: 'DM Sans', sans-serif;
        }

        .login-container {
            width: 100%;
            max-width: 1050px;
            min-height: 620px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            overflow: hidden;
            border-radius: 28px;
            background: rgba(255, 255, 255, .84);
            border: 1px solid rgba(255, 255, 255, .9);
            box-shadow: 0 30px 80px rgba(38, 78, 53, .14);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
        }

        /* =========================
           LEFT SIDE
        ========================= */

        .login-intro {
            position: relative;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 50px;
            color: white;
            background:
                radial-gradient(circle at 85% 15%, rgba(185, 213, 194, .30), transparent 25%),
                radial-gradient(circle at 15% 90%, rgba(185, 213, 194, .18), transparent 30%),
                linear-gradient(145deg, #2f6b4f, #1d4532);
        }

        .login-intro::before {
            content: "";
            position: absolute;
            width: 300px;
            height: 300px;
            border: 1px solid rgba(255, 255, 255, .12);
            border-radius: 50%;
            right: -120px;
            top: -100px;
        }

        .login-intro::after {
            content: "";
            position: absolute;
            width: 220px;
            height: 220px;
            border: 1px solid rgba(255, 255, 255, .10);
            border-radius: 50%;
            left: -120px;
            bottom: -90px;
        }

        .intro-content {
            position: relative;
            z-index: 2;
        }

        .school-logo {
            width: 70px;
            height: 70px;
            padding: 8px;
            object-fit: contain;
            border-radius: 20px;
            background: rgba(255, 255, 255, .95);
            box-shadow: 0 12px 30px rgba(0, 0, 0, .12);
            margin-bottom: 35px;
        }

        .intro-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 7px 12px;
            margin-bottom: 20px;
            border-radius: 100px;
            background: rgba(255, 255, 255, .10);
            border: 1px solid rgba(255, 255, 255, .15);
            font-size: 10px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .intro-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: #b9d5c2;
        }

        .login-intro h1 {
            margin: 0 0 18px;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 38px;
            line-height: 1.2;
            letter-spacing: -1px;
            font-weight: 800;
        }

        .login-intro h1 span {
            color: #b9d5c2;
        }

        .intro-description {
            max-width: 400px;
            color: rgba(255, 255, 255, .68);
            font-size: 14px;
            line-height: 1.8;
        }

        .intro-footer {
            position: relative;
            z-index: 2;
            display: flex;
            align-items: center;
            gap: 10px;
            color: rgba(255, 255, 255, .55);
            font-size: 11px;
        }

        .intro-line {
            width: 35px;
            height: 1px;
            background: rgba(255, 255, 255, .35);
        }

        /* =========================
           RIGHT SIDE
        ========================= */

        .login-form-area {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 50px;
            background: rgba(255, 255, 255, .72);
        }

        .login-form-container {
            width: 100%;
            max-width: 390px;
        }

        .login-heading {
            margin-bottom: 30px;
        }

        .login-heading h2 {
            margin: 0 0 8px;
            color: #17231c;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 28px;
            font-weight: 800;
            letter-spacing: -.7px;
        }

        .login-heading p {
            margin: 0;
            color: #7b877f;
            font-size: 13px;
        }

        /* Alert */

        .alert-box {
            padding: 12px 14px;
            margin-bottom: 18px;
            border-radius: 11px;
            background: #fff4f4;
            border: 1px solid #f3d5d5;
            color: #b94a48;
            font-size: 12px;
        }

        /* Form */

        .form-group {
            margin-bottom: 18px;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            color: #37443c;
            font-size: 12px;
            font-weight: 700;
        }

        .form-input {
            width: 100%;
            height: 48px;
            padding: 0 15px;
            border: 1px solid var(--border);
            border-radius: 11px;
            outline: none;
            background: #fbfdfb;
            color: #26342c;
            font-size: 13px;
            transition: .2s ease;
        }

        .form-input:focus {
            border-color: var(--primary);
            background: white;
            box-shadow: 0 0 0 4px rgba(47, 107, 79, .08);
        }

        .remember-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin: 5px 0 25px;
        }

        .remember {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #718078;
            font-size: 12px;
            cursor: pointer;
        }

        .remember input {
            width: 15px;
            height: 15px;
            accent-color: var(--primary);
        }

        .forgot {
            color: var(--primary);
            font-size: 12px;
            font-weight: 600;
            transition: .2s ease;
        }

        .forgot:hover {
            color: var(--primary-dark);
        }

        .login-button {
            width: 100%;
            height: 50px;
            border: 0;
            border-radius: 11px;
            background: linear-gradient(135deg, #2f6b4f, #265b43);
            color: white;
            font-size: 13px;
            font-weight: 700;
            cursor: pointer;
            box-shadow: 0 12px 25px rgba(47, 107, 79, .20);
            transition: .25s ease;
        }

        .login-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 16px 30px rgba(47, 107, 79, .25);
        }

        .login-button:active {
            transform: translateY(0);
        }

        .login-footer {
            margin-top: 25px;
            padding-top: 20px;
            border-top: 1px solid #edf1ee;
            text-align: center;
            color: #9aa49e;
            font-size: 10px;
            line-height: 1.6;
        }

        .login-footer strong {
            color: #637169;
        }

        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 800px) {

            .login-container {
                grid-template-columns: 1fr;
                max-width: 500px;
            }

            .login-intro {
                min-height: 330px;
                padding: 35px;
            }

            .school-logo {
                width: 55px;
                height: 55px;
                margin-bottom: 22px;
            }

            .login-intro h1 {
                font-size: 30px;
            }

            .intro-footer {
                margin-top: 35px;
            }

            .login-form-area {
                padding: 40px 30px;
            }
        }

        @media (max-width: 480px) {

            .login-wrapper {
                padding: 15px;
            }

            .login-container {
                border-radius: 20px;
            }

            .login-intro {
                padding: 28px;
            }

            .login-intro h1 {
                font-size: 26px;
            }

            .intro-description {
                font-size: 12px;
            }

            .login-form-area {
                padding: 35px 24px;
            }

            .login-heading h2 {
                font-size: 24px;
            }

            .remember-row {
                align-items: flex-start;
                gap: 10px;
                flex-direction: column;
            }
        }
    </style>


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@500;600;700;800&display=swap"
        rel="stylesheet">


    <div class="login-wrapper">

        <div class="login-container">

            <!-- =========================
                 LEFT PANEL
            ========================== -->

            <div class="login-intro">

                <div class="intro-content">

                    <a href="{{ url('/') }}">
                        <img
                            src="{{ asset('img/sma.png') }}"
                            alt="Logo SMA Wahidiyah Kediri"
                            class="school-logo">
                    </a>

                    <div class="intro-badge">
                        <span class="intro-dot"></span>
                        Sistem Informasi Pendidikan
                    </div>

                    <h1>
                        Selamat Datang di
                        <span>PMM</span>
                    </h1>

                    <p class="intro-description">
                        Sistem Pemantauan Guru Platform Merdeka Mengajar
                        SMA Wahidiyah Kediri. Kelola aktivitas, pantau
                        perkembangan, dan dukung proses pembelajaran
                        secara lebih terstruktur.
                    </p>

                </div>

                <div class="intro-footer">

                    <span class="intro-line"></span>

                    <span>
                        SMA Wahidiyah Kediri
                    </span>

                </div>

            </div>


            <!-- =========================
                 LOGIN FORM
            ========================== -->

            <div class="login-form-area">

                <div class="login-form-container">

                    <div class="login-heading">

                        <h2>
                            Masuk ke Sistem
                        </h2>

                        <p>
                            Silakan gunakan akun Anda untuk melanjutkan.
                        </p>

                    </div>


                    <!-- Session Status -->

                    <x-auth-session-status
                        class="mb-4"
                        :status="session('status')" />


                    <!-- Validation Errors -->

                    @if ($errors->any())

                    <div class="alert-box">

                        <strong>
                            Login gagal.
                        </strong>

                        <div style="margin-top: 4px;">
                            {{ $errors->first() }}
                        </div>

                    </div>

                    @endif


                    <form method="POST" action="{{ route('login') }}">

                        @csrf


                        <!-- Email -->

                        <div class="form-group">

                            <label
                                for="email"
                                class="form-label">
                                Email
                            </label>

                            <input
                                id="email"
                                class="form-input"
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
                                required
                                autofocus
                                autocomplete="username"
                                placeholder="Masukkan email Anda">

                        </div>


                        <!-- Password -->

                        <div class="form-group">

                            <label
                                for="password"
                                class="form-label">
                                Password
                            </label>

                            <input
                                id="password"
                                class="form-input"
                                type="password"
                                name="password"
                                required
                                autocomplete="current-password"
                                placeholder="Masukkan password Anda">

                        </div>


                        <!-- Remember + Forgot -->

                        <div class="remember-row">

                            <label
                                for="remember_me"
                                class="remember">

                                <input
                                    id="remember_me"
                                    type="checkbox"
                                    name="remember">

                                <span>
                                    Ingat saya
                                </span>

                            </label>


                            @if (Route::has('password.request'))

                            <a
                                href="{{ route('password.request') }}"
                                class="forgot">
                                Lupa password?
                            </a>

                            @endif

                        </div>


                        <!-- Login -->

                        <button
                            type="submit"
                            class="login-button">
                            Masuk ke Dashboard
                        </button>

                    </form>


                    <div class="login-footer">

                        <strong>
                            PMM — Platform Merdeka Mengajar
                        </strong>

                        <br>

                        Sistem Pemantauan Guru · SMA Wahidiyah Kediri

                    </div>

                </div>

            </div>

        </div>

    </div>

</x-guest-layout>