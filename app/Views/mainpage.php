<!DOCTYPE html>
<html lang="en" id="home">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pusat Bisnis UINSA</title>

    <!-- Boostrap-->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
      crossorigin="anonymous">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
      integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer">

    <!-- CSS -->
    <style>
      .bg-green {
        background-image: linear-gradient(to right, var(--tw-gradient-stops));
        --tw-gradient-from: #048853;
        --tw-gradient-to: rgb(4 136 83 / 0);
        --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to);
        --tw-gradient-to: #000000de;
      }
      .bg-gray {
        background-color: #eee;
      }
      .rounded-top-left-1 {
        border-top-left-radius: 0.375rem;
      }
      .rounded-top-right-1 {
        border-top-right-radius: 0.375rem;
      }
      .rounded-bottom-left-1 {
        border-bottom-left-radius: 0.375rem;
      }
      .rounded-bottom-right-1 {
        border-bottom-right-radius: 0.375rem;
      }

      .form-feedback {
        margin-bottom: 1rem;
        width: 100%;
        padding: 0.5rem 0.6rem;
        font-size: 1.5rem;
      }

      .btn-feedback {
        padding-top: 1rem;
        padding-bottom: 1rem;
        width: 100%;
        background-color: #048853;
        color: white;
        border: none;
        font-size: 1.25rem;
        font-weight: bold;
      }
      .btn-feedback:hover {
        background-color: #037045;
      }
      .instagram-link:hover {
        color: #d62976 !important;
      }
      .twitter-link:hover {
        color: #1da1f2 !important;
      }
      .facebook-link:hover {
        color: #3b5998 !important;
      }
      .m-testimoni-card {
        margin-bottom: 1rem;
      }
      @media (max-width: 575.98px) {
        .m-testimoni-card {
          margin-bottom: 6rem;
        }
        .m-testimoni-card:last-child {
          margin-bottom: 1rem;
        }
      }
      section {
        padding-top: 5rem;
        padding-bottom: 2rem;
      }
      #contact {
        padding-top: 0rem;
        padding-bottom: 0rem;
      }
    </style>

  </head>
  <body>

  <!-- Navbar Section -->
    <nav class="navbar sticky-top navbar-expand-lg bg-light">
      <div class="container-fluid">
        <a class="navbar-brand fw-bold" href="#">
          <img
            src="img/uinsa-logo.png"
            alt="Logo"
            width="30"
            height="24"
            class="d-inline-block align-text-top">
          Pusat Bisnis UINSA
        </a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNav"
          aria-controls="navbarNav"
          aria-expanded="false"
          aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#home">Beranda</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#services">Layanan</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#feature">Fitur</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#contact">Kontak</a>
            </li>
          </ul>
          <hr class="d-lg-none" />
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a
                class="nav-link btn btn-secondary mb-1 text-white px-3 py-2 me-lg-1"
                href="/register">Daftar</a>
            </li>
            <li class="nav-item">
              <a
                class="nav-link btn btn-success text-white fw-semibold px-3 py-2"
                href="/login">Masuk</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- EndNavbar Section -->
    
    <!-- Header Section -->
    <header>
      <section
        id="beranda"
        style="height: 100vh"
        class="overflow-hidden bg-green position-relative d-lg-flex align-items-center">
        <img
          src="img/image1.png"
          class="position-absolute bottom-0 end-0 d-none d-lg-block"
          alt="">
        <img
          src="img/image2.png"
          class="position-absolute top-0 start-0"
          alt="">
        <div
          class="position-absolute d-none d-lg-block text-center text-white px-5 w-50"
          style="z-index: 10">
          <h1 class="display-3 fw-bold">Membantu Temukan Kebutuhan Terbaik</h1>
          <p class="fs-6">
            <span class="fw-bold">Pusat bisnis</span> hadir untuk temukan
            kebutuhan terbaik untukmu, untuk dijual ataupun disewa dengan sumber
            terpercaya.
          </p>
          <button
            type="button"
            class="fw-bold text-success btn btn-light text-success fs-3">
            Temukan Kebutuhan <i class="fa-solid fa-chevron-right"></i>
          </button>
        </div>
        <img
          src="img/image1.png"
          class="position-absolute bottom-0 end-0 d-lg-none w-100"
          style="z-index: 1"
          alt="">
        <div
          class="position-absolute d-lg-none text-center text-white px-5"
          style="z-index: 10">
          <h1 class="display-2 fw-bold mt-5">
            Membantu Temukan Kebutuhan Terbaik
          </h1>
          <p class="fs-6">
            <span class="fw-bold">Pusat bisnis</span> hadir untuk temukan
            kebutuhan terbaik untukmu, untuk dijual ataupun disewa dengan sumber
            terpercaya.
          </p>
          <button type="button" class="fw-bold text-success btn btn-light">
            Temukan Kebutuhan <i class="fa-solid fa-chevron-right"></i>
          </button>
        </div>
      </section>
    </header>
    <!-- EndHeader Section -->

    <!-- Main Section -->
    <main>
      <!-- Layanan Section -->
      <section id="services" class="px-5" style="background-color: #e2fdf1">
        <div class="row text-center mb-3">
          <div class="col">
            <h1 class="text-success">Layanan Kami</h1>
            <p>Pusat Pengembangan Bisnis hadir menjadi solusi bagi kamu</p>
          </div>
        </div>
        <div class="row justify-content-center mb-lg-3">
          <div class="col-lg-3 mb-3 mb-lg-0">
            <div class="card">
              <div class="card-body text-center">
                <div
                  style="width: 3rem; height: 3rem"
                  class="overflow-hidden bg-success rounded-circle mx-auto">
                  <img src="img/house.png" alt="" class="w-100" />
                </div>
                <h5 class="card-title text-success">Property Management</h5>
                <p class="card-text">
                  <small>
                    Kelola peningkatan nilai properti dan menghasilkan
                    pendapatan yang stabil dengan tujuan investasi.
                  </small>
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 mb-3 mb-lg-0">
            <div class="card">
              <div class="card-body text-center">
                <div
                  style="width: 3rem; height: 3rem"
                  class="overflow-hidden bg-success rounded-circle mx-auto">
                  <img src="img/house.png" alt="" class="w-100" />
                </div>
                <h5 class="card-title text-success">Property Management</h5>
                <p class="card-text">
                  <small>
                    Kelola peningkatan nilai properti dan menghasilkan
                    pendapatan yang stabil dengan tujuan investasi.
                  </small>
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 mb-3 mb-lg-0">
            <div class="card">
              <div class="card-body text-center">
                <div
                  style="width: 3rem; height: 3rem"
                  class="overflow-hidden bg-success rounded-circle mx-auto">
                  <img src="img/house.png" alt="" class="w-100" />
                </div>
                <h5 class="card-title text-success">Property Management</h5>
                <p class="card-text">
                  <small>
                    Kelola peningkatan nilai properti dan menghasilkan
                    pendapatan yang stabil dengan tujuan investasi.
                  </small>
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-lg-3 mb-3 mb-lg-0">
            <div class="card">
              <div class="card-body text-center">
                <div
                  style="width: 3rem; height: 3rem"
                  class="overflow-hidden bg-success rounded-circle mx-auto">
                  <img src="img/house.png" alt="" class="w-100" />
                </div>
                <h5 class="card-title text-success">Property Management</h5>
                <p class="card-text">
                  <small>
                    Kelola peningkatan nilai properti dan menghasilkan
                    pendapatan yang stabil dengan tujuan investasi.
                  </small>
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 mb-3 mb-lg-0">
            <div class="card">
              <div class="card-body text-center">
                <div
                  style="width: 3rem; height: 3rem"
                  class="overflow-hidden bg-success rounded-circle mx-auto">
                  <img src="img/house.png" alt="" class="w-100" />
                </div>
                <h5 class="card-title text-success">Property Management</h5>
                <p class="card-text">
                  <small>
                    Kelola peningkatan nilai properti dan menghasilkan
                    pendapatan yang stabil dengan tujuan investasi.
                  </small>
                </p>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- EndLayanan Section -->

      <!-- Search Section -->
      <section
        id="findSomething"
        style="height: 100vh"
        class="overflow-hidden bg-green position-relative d-flex">
        <img
          src="img/image2.png"
          class="position-absolute top-0 start-0"
          style="z-index: 1"
          alt="">
        <div
          class="container px-5 text-white d-flex align-items-center justify-content-center"
          style="z-index: 2">
          <div class="text-center">
            <h1 class="fs-1">Temukan Kebutuhan Terbaik</h1>
            <p class="px-lg-5 mb-3">
              Sekarang Anda dapat menggunakan waktu dan biaya dengan beragam
              layanan yang disediakan Pusat Bisnis UINSA
            </p>
            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li
                class="nav-item bg-gray rounded-top-left-1"
                role="presentation">
                <button
                  class="nav-link active text-success"
                  id="home-tab"
                  data-bs-toggle="tab"
                  data-bs-target="#home-tab-pane"
                  type="button"
                  role="tab"
                  aria-controls="home-tab-pane"
                  aria-selected="true">
                  Cari
                </button>
              </li>
              <li class="nav-item bg-gray" role="presentation">
                <button
                  class="nav-link text-dark"
                  id="profile-tab"
                  data-bs-toggle="tab"
                  data-bs-target="#profile-tab-pane"
                  type="button"
                  role="tab"
                  aria-controls="profile-tab-pane"
                  aria-selected="false">
                  Toko
                </button>
              </li>
              <li
                class="nav-item bg-gray rounded-top-right-1"
                role="presentation">
                <button
                  class="nav-link text-dark"
                  id="contact-tab"
                  data-bs-toggle="tab"
                  data-bs-target="#contact-tab-pane"
                  type="button"
                  role="tab"
                  aria-controls="contact-tab-pane"
                  aria-selected="false">
                  Layanan
                </button>
              </li>
            </ul>
            <div class="tab-content" id="myTabContent">
              <div
                class="tab-pane fade show active"
                id="home-tab-pane"
                role="tabpanel"
                aria-labelledby="home-tab"
                tabindex="0">
                <div class="p-3 rounded-bottom bg-white">
                  <div class="input-group">
                    <button
                      class="btn btn-light text-success dropdown-toggle border"
                      type="button"
                      data-bs-toggle="dropdown"
                      aria-expanded="false">
                      <i class="fa-solid fa-house"></i> Filter
                    </button>
                    <ul class="dropdown-menu">
                      <li>
                        <a class="dropdown-item" href="#">Action before</a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="#">Another action before</a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="#">Something else here</a>
                      </li>
                    </ul>
                    <button
                      class="btn btn-light text-success dropdown-toggle border"
                      type="button"
                      data-bs-toggle="dropdown"
                      aria-expanded="false">
                      <i class="fa-solid fa-money-bill-wave"></i> Range harga
                    </button>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="#">Action</a></li>
                      <li>
                        <a class="dropdown-item" href="#">Another action</a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="#">Something else here</a>
                      </li>
                    </ul>
                    <input
                      type="text"
                      class="form-control"
                      aria-label="Text input with 2 dropdown buttons"
                      placeholder="Cari berdasarkan kebutuhan">
                    <button class="btn btn-success border" type="button">
                      Button
                    </button>
                  </div>
                </div>
              </div>
              <div
                class="tab-pane fade"
                id="profile-tab-pane"
                role="tabpanel"
                aria-labelledby="profile-tab"
                tabindex="0">
                <div class="p-3 rounded-bottom bg-white"></div>
              </div>
              <div
                class="tab-pane fade"
                id="contact-tab-pane"
                role="tabpanel"
                aria-labelledby="contact-tab"
                tabindex="0">
                <div class="p-3 rounded-bottom bg-white"></div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- EndSearch Section -->

      <!-- Hero Section -->
      <section
        id="services"
        class="px-5 min-vh-100"
        style="background-color: #e2fdf1">
        <div class="container">
          <div class="row text-center mb-3">
            <div class="col">
              <h1 class="text-success">Apa Yang Mereka Katakan Tentang Kami</h1>
            </div>
          </div>
          <div class="row justify-content-center" style="padding-top: 6rem">
            <div class="col-lg-3 m-testimoni-card">
              <div
                class="card bg-success m-auto"
                style="width: 13rem; border-radius: 2rem">
                <div
                  class="card-body position-relative text-white text-center"
                  style="padding: 0.5rem; padding-top: 5.5rem; height: 20rem">
                  <div
                    class="rounded-circle bg-danger position-absolute overflow-hidden"
                    style="
                      width: 10rem;
                      height: 10rem;
                      top: -5rem;
                      left: 1.5rem;">
                    <img src="https://source.unsplash.com/random" alt="" />
                  </div>
                  <h4>Lorem, ipsum.</h4>
                  <p>
                    <small>
                      Lorem ipsum dolor sit amet consectetur adipisicing elit.
                      At eaque perspiciatis, saepe accusantium deserunt
                      blanditiis?
                    </small>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-lg-3 m-testimoni-card">
              <div
                class="card bg-success m-auto"
                style="width: 13rem; border-radius: 2rem">
                <div
                  class="card-body position-relative text-white text-center"
                  style="padding: 0.5rem; padding-top: 5.5rem; height: 20rem">
                  <div
                    class="rounded-circle bg-danger position-absolute overflow-hidden"
                    style="
                      width: 10rem;
                      height: 10rem;
                      top: -5rem;
                      left: 1.5rem;">
                    <img src="https://source.unsplash.com/random" alt="" />
                  </div>
                  <h4>Lorem, ipsum.</h4>
                  <p>
                    <small>
                      Lorem ipsum dolor sit amet consectetur adipisicing elit.
                      At eaque perspiciatis, saepe accusantium deserunt
                      blanditiis?
                    </small>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-lg-3 m-testimoni-card">
              <div
                class="card bg-success m-auto"
                style="width: 13rem; border-radius: 2rem">
                <div
                  class="card-body position-relative text-white text-center"
                  style="padding: 0.5rem; padding-top: 5.5rem; height: 20rem">
                  <div
                    class="rounded-circle bg-danger position-absolute overflow-hidden"
                    style="
                      width: 10rem;
                      height: 10rem;
                      top: -5rem;
                      left: 1.5rem;">
                    <img src="https://source.unsplash.com/random" alt="" />
                  </div>
                  <h4>Lorem, ipsum.</h4>
                  <p>
                    <small>
                      Lorem ipsum dolor sit amet consectetur adipisicing elit.
                      At eaque perspiciatis, saepe accusantium deserunt
                      blanditiis?
                    </small>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-lg-3 m-testimoni-card">
              <div
                class="card bg-success m-auto"
                style="width: 13rem; border-radius: 2rem">
                <div
                  class="card-body position-relative text-white text-center"
                  style="padding: 0.5rem; padding-top: 5.5rem; height: 20rem">
                  <div
                    class="rounded-circle bg-danger position-absolute overflow-hidden"
                    style="
                      width: 10rem;
                      height: 10rem;
                      top: -5rem;
                      left: 1.5rem;">
                    <img src="https://source.unsplash.com/random" alt="" />
                  </div>
                  <h4>Lorem, ipsum.</h4>
                  <p>
                    <small>
                      Lorem ipsum dolor sit amet consectetur adipisicing elit.
                      At eaque perspiciatis, saepe accusantium deserunt
                      blanditiis?
                    </small>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- EndHero Section -->

      <!-- Fitur Section -->
      <section class="px-5" id="feature" style="background-color: #e2fdf1">
        <div class="container">
          <div class="row justify-content-between mb-3">
            <div class="col-lg-4"><h1>Fitur Layanan</h1></div>
            <div class="col-lg-3 text-lg-end">
              <a href="#" class="btn btn-success px-3">
                Lihat Semua
                <i class="fa-solid fa-chevron-right"></i>
              </a>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div
                id="carouselExampleAutoplaying"
                class="carousel slide"
                data-bs-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <div class="row">
                      <div class="col-md-4 mb-3">
                        <div class="card">
                          <img
                            class="img-fluid"
                            alt="100%x280"
                            src="https://images.unsplash.com/photo-1532781914607-2031eca2f00d?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=7c625ea379640da3ef2e24f20df7ce8d">
                          <div class="card-body">
                            <h4 class="card-title">Special title treatment</h4>
                            <p class="card-text">
                              With supporting text below as a natural lead-in to
                              additional content.
                            </p>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4 mb-3">
                        <div class="card">
                          <img
                            class="img-fluid"
                            alt="100%x280"
                            src="https://images.unsplash.com/photo-1517760444937-f6397edcbbcd?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=42b2d9ae6feb9c4ff98b9133addfb698">
                          <div class="card-body">
                            <h4 class="card-title">Special title treatment</h4>
                            <p class="card-text">
                              With supporting text below as a natural lead-in to
                              additional content.
                            </p>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4 mb-3">
                        <div class="card">
                          <img
                            class="img-fluid"
                            alt="100%x280"
                            src="https://images.unsplash.com/photo-1532712938310-34cb3982ef74?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=3d2e8a2039c06dd26db977fe6ac6186a">
                          <div class="card-body">
                            <h4 class="card-title">Special title treatment</h4>
                            <p class="card-text">
                              With supporting text below as a natural lead-in to
                              additional content.
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="carousel-item">
                    <div class="row">
                      <div class="col-md-4 mb-3">
                        <div class="card">
                          <img
                            class="img-fluid"
                            alt="100%x280"
                            src="https://images.unsplash.com/photo-1517760444937-f6397edcbbcd?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=42b2d9ae6feb9c4ff98b9133addfb698">
                          <div class="card-body">
                            <h4 class="card-title">Special title treatment</h4>
                            <p class="card-text">
                              With supporting text below as a natural lead-in to
                              additional content.
                            </p>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4 mb-3">
                        <div class="card">
                          <img
                            class="img-fluid"
                            alt="100%x280"
                            src="https://images.unsplash.com/photo-1532781914607-2031eca2f00d?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=7c625ea379640da3ef2e24f20df7ce8d">
                          <div class="card-body">
                            <h4 class="card-title">Special title treatment</h4>
                            <p class="card-text">
                              With supporting text below as a natural lead-in to
                              additional content.
                            </p>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4 mb-3">
                        <div class="card">
                          <img
                            class="img-fluid"
                            alt="100%x280"
                            src="https://images.unsplash.com/photo-1532712938310-34cb3982ef74?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=3d2e8a2039c06dd26db977fe6ac6186a">
                          <div class="card-body">
                            <h4 class="card-title">Special title treatment</h4>
                            <p class="card-text">
                              With supporting text below as a natural lead-in to
                              additional content.
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="carousel-item">
                    <div class="row">
                      <div class="col-md-4 mb-3">
                        <div class="card">
                          <img
                            class="img-fluid"
                            alt="100%x280"
                            src="https://images.unsplash.com/photo-1517760444937-f6397edcbbcd?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=42b2d9ae6feb9c4ff98b9133addfb698">
                          <div class="card-body">
                            <h4 class="card-title">Special title treatment</h4>
                            <p class="card-text">
                              With supporting text below as a natural lead-in to
                              additional content.
                            </p>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4 mb-3">
                        <div class="card">
                          <img
                            class="img-fluid"
                            alt="100%x280"
                            src="https://images.unsplash.com/photo-1532712938310-34cb3982ef74?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=3d2e8a2039c06dd26db977fe6ac6186a">
                          <div class="card-body">
                            <h4 class="card-title">Special title treatment</h4>
                            <p class="card-text">
                              With supporting text below as a natural lead-in to
                              additional content.
                            </p>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4 mb-3">
                        <div class="card">
                          <img
                            class="img-fluid"
                            alt="100%x280"
                            src="https://images.unsplash.com/photo-1532712938310-34cb3982ef74?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=3d2e8a2039c06dd26db977fe6ac6186a">
                          <div class="card-body">
                            <h4 class="card-title">Special title treatment</h4>
                            <p class="card-text">
                              With supporting text below as a natural lead-in to
                              additional content.
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <button
                  class="carousel-control-prev display-1"
                  type="button"
                  data-bs-target="#carouselExampleAutoplaying"
                  data-bs-slide="prev">
                  <i class="fa-solid fa-chevron-left"></i>
                </button>
                <button
                  class="carousel-control-next display-1"
                  type="button"
                  data-bs-target="#carouselExampleAutoplaying"
                  data-bs-slide="next">
                  <i class="fa-solid fa-chevron-right"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- EndFitur Section -->

      <!-- Konsultasi Section -->
      <section
        id="contact"
        class="bg-secondary"
        style="
          background-image: url('img/twinTower.jpg');
          background-size: cover;
          background-repeat: no-repeat;">
        <div
          style="
            background-color: #000000d0;
            padding-top: 5rem;
            padding-bottom: 2rem;">
          <div class="container">
            <div class="row align-items-center text-white">
              <div class="col-lg-6 mb-3">
                <h1 class="fw-bold display-4 mb-3">
                  Butuh Konsultasi? Silahkan kontak kami, kami siap membantu
                </h1>
                <h4 class="fw-bold">Kontak</h4>
                <ul class="list-unstyled">
                  <li class="mb-1">
                    <i class="fa-solid fa-building"></i> Gedung twin towers B
                    Lt.1 UIN Sunan Ampel Surabaya
                  </li>
                  <li class="mb-1">
                    <i class="fa-solid fa-phone"></i> (031) 8410298
                  </li>
                  <li class="mb-1">
                    <i class="fa-solid fa-envelope"></i> pusbis@uinsby.ac.id
                  </li>
                </ul>

                <h4 class="fw-bold">Social Media</h4>
                <ul class="list-inline">
                  <li class="list-inline-item">
                    <a
                      href="https://www.facebook.com/UINSAOfficial/"
                      class="text-white facebook-link"
                      ><i class="fa-brands fa-facebook"></i
                    ></a>
                  </li>
                  <li class="list-inline-item">
                    <a
                      href="https://twitter.com/UINSAOfficial"
                      class="text-white twitter-link"
                      ><i class="fa-brands fa-twitter"></i
                    ></a>
                  </li>
                  <li class="list-inline-item">
                    <a
                      href="https://www.instagram.com/uinsa.official/"
                      class="text-white instagram-link"
                      ><i class="fa-brands fa-instagram"></i
                    ></a>
                  </li>
                  <li class="list-inline-item">@uinsa.official</li>
                </ul>
              </div>
              <div class="col-lg-6 mb-3 text-center">
                <h1>ada pertanyaan..?</h1>
                <form action="/send-feedback" method="POST">
                  <input
                    class="form-feedback"
                    type="text"
                    placeholder="Masukkan email anda disini...">
                  <input
                    class="form-feedback"
                    type="text"
                    placeholder="Pertanyaan anda...">
                  <button type="submit" class="btn-feedback">Kirim</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- EndKonsultasi Section -->

      <!-- Footer Section -->
      <footer class="text-center pt-2 pb-4 bg-black">
        <small class="text-white">Copyright &copy; 2023
          <a class="text-white" href="https://pusbis.uinsa.ac.id">Pusbis UINSA</a>. All Right Reserved.</small>
      </footer>
      <!-- EndFooter Section -->
    </main>
    <!-- EndMain Section -->

    <!-- Javascript -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
      crossorigin="anonymous">
    </script>
    
  </body>
</html>
