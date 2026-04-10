<!doctype html>
<html lang="en" class="layout-wide customizer-hide" data-assets-path="/assets/" data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>TestUjianOnline</title>

  <link rel="icon" type="image/x-icon" href="{{ asset('assets/backend/images/logos/cum.jpeg') }}" />

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet" />

  <link rel="stylesheet" href="{{ asset('assets/backend/login/vendor/fonts/iconify-icons.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/backend/login/vendor/css/core.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/backend/login/css/demo.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/backend/login/vendor/css/pages/page-auth.css') }}">

  <script src="{{ asset('assets/backend/login/vendor/js/helpers.js') }}"></script>
  <script src="{{ asset('assets/backend/login/js/config.js') }}"></script>

  <style>
    body {
      background: linear-gradient(135deg, #4f46e5, #6366f1, #22d3ee);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .authentication-inner {
      animation: fadeInUp .6s ease;
      width: 100%;
      max-width: 450px;
    }

    .card {
      border-radius: 20px;
      box-shadow: 0 25px 50px rgba(0, 0, 0, .18);
      border: none;
    }

    .app-brand img {
      border-radius: 50%;
      padding: 6px;
      background: #fff;
      box-shadow: 0 12px 30px rgba(0, 0, 0, .3);
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
      padding: 10px;
    }

    .btn-primary:hover {
      transform: translateY(-2px);
      box-shadow: 0 14px 30px rgba(99, 102, 241, .45);
    }

    .form-check-label {
      cursor: pointer;
    }

    @keyframes fadeInUp {
      from { opacity: 0; transform: translateY(30px); }
      to { opacity: 1; transform: translateY(0); }
    }
  </style>
</head>

<body>
  <div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
      <div class="authentication-inner">
        <div class="card">
          <div class="card-body">
            
            <div class="app-brand justify-content-center mb-6 mt-2">
              <a href="#" class="app-brand-link d-flex flex-column align-items-center gap-2">
                <img src="{{ asset('assets/frontend/img/TestHive_logo4.png') }}" 
                     alt="TestHive Logo" 
                     style="height: 60px;">
                <span class="app-brand-text demo text-heading fw-bold" style="font-size: 1.8rem;">TestHive</span>
              </a>
            </div>

            <h4 class="mb-1 text-center">Selamat Datang di TestHive! 👋</h4>
            <p class="mb-6 text-center text-muted">Silakan masuk ke akun Anda</p>

            <form id="formAuthentication" class="mb-3" action="{{ route('login') }}" method="POST">
              @csrf
              
              <div class="mb-4">
                <label for="email" class="form-label">Email atau Username</label>
                <input
                  type="text"
                  class="form-control @error('email') is-invalid @enderror"
                  id="email"
                  name="email"
                  value="{{ old('email') }}"
                  required 
                  autocomplete="email"
                  placeholder="Masukkan email atau username"
                  autofocus>
                @error('email')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>

       <div class="form-group position-relative">
  <label for="password">Password</label>
  <input id="password" type="password" class="form-control" name="password" required>
  
  <!-- Tombol melihat kata sandi -->
  <span toggle="#password" class="toggle-password" style="position:absolute; right:10px; top:35px; cursor:pointer;">
    👁️
  </span>
</div>

<!-- Link lupa password -->


<!-- JS Toggle Password -->
<script>
  const togglePassword = document.querySelector('.toggle-password');
  const passwordInput = document.querySelector('#password');

  togglePassword.addEventListener('click', function () {
    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordInput.setAttribute('type', type);
    // opsional: ubah ikon
    this.textContent = type === 'password' ? '👁️' : '🙈';
  });
</script>

              <div class="mb-4">
                <div class="d-flex justify-content-between align-items-center">
                  <div class="form-check mb-0">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember"> Remember Me </label>
                  </div>
                  @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">
                      <small>Forgot Password?</small>
                    </a>
                  @endif
                </div>
              </div>

              <div class="mb-3">
                <button class="btn btn-primary d-grid w-100" type="submit">Login</button>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="{{ asset('assets/backend/login/vendor/libs/jquery/jquery.js') }}"></script>
  <script src="{{ asset('assets/backend/login/vendor/js/bootstrap.js') }}"></script>
</body>

</html>