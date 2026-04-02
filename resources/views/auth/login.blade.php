<!doctype html>
<html
  lang="en"
  class="layout-wide customizer-hide"
  data-assets-path="/assets/"
  data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8" />
  <meta name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>TestUjianOnline</title>

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon"
    href="{{ asset('assets/backend/images/logos/cum.jpeg') }}" />

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap"
    rel="stylesheet" />

  <!-- Core CSS -->
  <link rel="stylesheet"
    href="{{ asset('assets/backend/login/vendor/fonts/iconify-icons.css') }}">
  <link rel="stylesheet"
    href="{{ asset('assets/backend/login/vendor/css/core.css') }}">
  <link rel="stylesheet"
    href="{{ asset('assets/backend/login/css/demo.css') }}">
  <link rel="stylesheet"
    href="{{ asset('assets/backend/login/vendor/css/pages/page-auth.css') }}">

  <script src="{{ asset('assets/backend/login/vendor/js/helpers.js') }}"></script>
  <script src="{{ asset('assets/backend/login/js/config.js') }}"></script>

  <!-- 🌈 CUSTOM STYLE -->
  <style>
    body {
      background: linear-gradient(135deg, #4f46e5, #6366f1, #22d3ee);
      min-height: 100vh;
    }

    .authentication-inner {
      animation: fadeInUp .6s ease;
    }

    .card {
      border-radius: 20px;
      box-shadow: 0 25px 50px rgba(0,0,0,.18);
    }

    .app-brand img {
      border-radius: 50%;
      padding: 6px;
      background: #fff;
      box-shadow: 0 12px 30px rgba(0,0,0,.3);
    }

    .app-brand-text {
      color: #4338ca;
      letter-spacing: .5px;
    }

    h4 {
      font-weight: 700;
      color: #1e293b;
    }

    .form-control {
      border-radius: 12px;
    }

    .btn-primary {
      background: linear-gradient(135deg, #6366f1, #22d3ee);
      border: none;
      border-radius: 14px;
      font-weight: 600;
      transition: all .3s ease;
    }

    .btn-primary:hover {
      transform: translateY(-2px);
      box-shadow: 0 14px 30px rgba(99,102,241,.45);
    }

    .form-check-label {
      cursor: pointer;
    }

    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(30px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
  </style>
</head>

<body>
  <div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
      <div class="authentication-inner">
        <div class="card px-sm-6 px-0">
          <div class="card-body">

            <!-- LOGO -->
            <div class="app-brand justify-content-center mb-4">
              <div class="d-flex flex-column align-items-center gap-2">
                <img src="{{ asset('assets/backend/images/logos/cum.jpeg') }}"
                     alt="Logo"
                     style="height:110px;">
                <span class="app-brand-text fw-bold"
                      style="font-size:1.8rem;">
                  TestUjianOnline
                </span>
              </div>
            </div>

            <h4 class="mb-2 text-center">
              Selamat Datang 👋
            </h4>

            <!-- FORM LOGIN -->
            <form method="POST" action="{{ route('login') }}">
              @csrf

              <!-- EMAIL -->
              <div class="mb-3">
                <label class="form-label">Email atau Username</label>
                <input type="text"
                       name="email"
                       class="form-control @error('email') is-invalid @enderror"
                       value="{{ old('email') }}"
                       required autofocus>

                @error('email')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <!-- PASSWORD -->
              <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password"
                       name="password"
                       class="form-control @error('password') is-invalid @enderror"
                       required>

                @error('password')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <!-- REMEMBER ME -->
              <div class="mb-4 d-flex justify-content-between align-items-center">
                <div class="form-check">
                  <input class="form-check-input"
                         type="checkbox"
                         name="remember"
                         id="remember"
                         {{ old('remember') ? 'checked' : '' }}>
                  <label class="form-check-label" for="remember">
                    Remember Me
                  </label>
                </div>

                @if (Route::has('password.request'))
                  <a href="{{ route('password.request') }}"
                     class="fw-semibold text-primary">
                    Forgot Password?
                  </a>
                @endif
              </div>

              <!-- BUTTON -->
              <button type="submit"
                      class="btn btn-primary w-100 py-2">
                Login
              </button>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- JS -->
  <script src="{{ asset('assets/backend/login/vendor/libs/jquery/jquery.js') }}"></script>
  <script src="{{ asset('assets/backend/login/vendor/js/bootstrap.js') }}"></script>
</body>
</html>
