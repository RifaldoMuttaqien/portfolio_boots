<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <!-- BootrapIcons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- My CSS -->


    <link rel="stylesheet" href="assets/style.css">



</head>


<body id="home">
    <!--Navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#home">Domek</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#gallery">Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contac Me</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!--End Navbar-->

    <!-- Jumbotron -->
    <section class="jumbotron text-center">
        <img src="<?= $cover_profile; ?>" alt="Dinosaurus" width="200" class="rounded-circle img-thumbnail">
        <h1 class="display-4">Domek Muttaqien</h1>
        <p class="lead">Wordpress Dev | Students in UBSI</p>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#ffffff" fill-opacity="1"
                d="M0,96L180,96L360,32L540,160L720,64L900,224L1080,224L1260,0L1440,64L1440,320L1260,320L1080,320L900,320L720,320L540,320L360,320L180,320L0,320Z">
            </path>
        </svg>
    </section>


    <!-- About -->
    <section id="about">
        <div class="container">
            <div class="row text-center mb-3">
                <div class="col">
                    <h2>About Me</h2>
                </div>
            </div>
            <div class="row justify-content-evenly fs-5 text-center">
                <?php foreach ($about as $a) { ?>
                <?php if ($a->id == 1) { ?>
                <div class="col-md-4">
                    <p><?php echo $a->content; ?></p>
                </div>
                <?php } elseif ($a->id == 4) { ?>
                <div class="col-md-4">
                    <p><?php echo $a->content; ?></p>
                </div>
                <?php } ?>
                <?php } ?>
            </div>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#e2edff" fill-opacity="1"
                d="M0,256L30,245.3C60,235,120,213,180,197.3C240,181,300,171,360,149.3C420,128,480,96,540,106.7C600,117,660,171,720,197.3C780,224,840,224,900,208C960,192,1020,160,1080,154.7C1140,149,1200,171,1260,149.3C1320,128,1380,64,1410,32L1440,0L1440,320L1260,320L1080,320L900,320L720,320L540,320L360,320L180,320L0,320Z">
            </path>
        </svg>
    </section>
    <!-- End About -->

    <!-- Gallery -->
    <section id="gallery">
        <div class="container">
            <div class="row text-center mb-3">
                <div class="col">
                    <h2>My Gallery</h2>
                </div>
            </div>

            <div class="row">
                <div class="col-md-10">
                    <div class="row justify-content-center">
                        <?php foreach ($blog as $b) { ?>
                        <div class="col-md-3 mb-3">
                            <div class="card">
                                <img src="<?php echo base_url('uploads/' . $b->cover); ?>" class="card-img-top">
                                <div class="card-body">
                                    <p class="card-text">
                                        <?php echo $b->content ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>


            </div>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#ffffff" fill-opacity="1"
                d="M0,256L288,32L576,320L864,192L1152,96L1440,64L1440,320L1152,320L864,320L576,320L288,320L0,320Z">
            </path>
        </svg>
    </section>
    <!-- End Gallery -->


    <!-- Contac -->
    <section id="contact">
        <div class="container">
            <div class="row text-center mb-3">
                <div class="col">
                    <h2>Contact Me</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <form>
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="name" aria-describedby="name">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Anda</label>
                            <input type="email" class="form-control" id="email" aria-describedby="email">
                        </div>

                        <div class="mb-3">
                            <label for="pesan" class="form-label">Pesan</label>
                            <textarea class="form-control" id="pesan" rows="2"></textarea>
                        </div>


                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </form>
                </div>
            </div>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#0d6efd" fill-opacity="1"
                d="M0,160L48,181.3C96,203,192,245,288,224C384,203,480,117,576,106.7C672,96,768,160,864,160C960,160,1056,96,1152,96C1248,96,1344,160,1392,192L1440,224L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
            </path>
        </svg>
    </section>
    <!-- End Contac -->

    <!-- Footer -->
    <footer class="bg-primary text-white text-center pb-5">
        <p>Created with <i class="bi bi-balloon-heart text-danger"></i>by <a class="text-white fw-bold"
                href="https://depokloker.com/">Domek</a></p>
    </footer>
    <!-- End Footer -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
</body>

</html>