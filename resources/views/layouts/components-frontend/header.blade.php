<!-- HEADER HTML -->
<header id="header" class="header d-flex align-items-center">
  <div class="container-fluid container-xl position-relative d-flex align-items-center">

    <div class="d-flex align-items-center me-auto" style="gap: 0;">
      <img src="{{ asset('assets/frontend/img/logo-TestHivee.png') }}" alt="TestHive Logo" style="height: 50px;">
    </div>

    <nav id="navmenu" class="navmenu">
      <ul>
        <li><a href="#hero" class="active">Home<br></a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#services">Services</a></li>
        <li><a href="#team">Team</a></li>

        @guest
          @if (Route::has('login'))
            <a class="btn-getstarted flex-md-shrink-0" href="{{ route('login') }}">Mulai Sekarang</a>
          @endif
        @else
          <a class="btn-getstarted flex-md-shrink-0" href="{{ route('dashboard') }}">Dashboard</a>
        @endguest
      </ul>
    </nav>

  </div>
</header>

<!-- CSS -->
<style>
  /* Dasar header */
  #header {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    background: #ffffff;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    z-index: 9999;
    transition: top 0.3s ease-in-out;
  }

  /* Jarak supaya konten tidak ketutup header */
  body {
    padding-top: 70px; /* sesuaikan dengan tinggi header */
  }

  /* Navbar link */
  .navmenu ul li a {
    text-decoration: none;
    font-weight: 500;
    color: #333;
    margin-right: 15px;
  }

  .navmenu ul li a:hover {
    color: #0c2e8a;
  }

  .btn-getstarted {
    background: #0c2e8a;
    color: #fff !important;
    padding: 6px 16px;
    border-radius: 20px;
    font-size: 14px;
    text-decoration: none;
    transition: 0.3s;
  }

  .btn-getstarted:hover {
    background: #0941c4;
  }
</style>

<!-- JS untuk auto-hide navbar -->
<script>
  let prevScrollpos = window.pageYOffset;
  const header = document.getElementById("header");

  window.onscroll = function() {
    const currentScrollPos = window.pageYOffset;

    if (prevScrollpos > currentScrollPos) {
      // scroll ke atas → tampilkan navbar
      header.style.top = "0";
    } else {
      // scroll ke bawah → sembunyikan navbar
      header.style.top = "-100px"; // geser header ke atas
    }
    prevScrollpos = currentScrollPos;
  }
</script>