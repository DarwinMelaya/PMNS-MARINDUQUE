<!DOCTYPE html>
<html lang="en">
<?php
include 'cms/connection/connection.php';
$gia = 0;
$cest = 0;
$setup = 0;
$sscp = 0;
$sql = "SELECT * from projects";
// Execute the query
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    switch ($row['project_type']) {
      case '1':
        $gia++;
        break;
      case '2':
        $setup++;
        break;
      case '3':
        $cest++;
        break;
      case '4';
        $sscp++;
        break;
    }
  }
}
$maxtotal = max($gia, $cest, $setup, $sscp);

?>

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>PMNS - Project Management and Notification System</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <meta property="og:site_name" content="Project Management and Notification System" /> <!-- website name -->
  <meta property="og:site" content="https://pmns.dostmimaropa.ph" /> <!-- website link -->
  <meta property="og:title" content="Project Management and Notification System" /> <!-- title shown in the actual shared post -->
  <meta property="og:description" content="A web-based information system features notification and management of various projects of DOST-MIMAROPA." /> <!-- description shown in the actual shared post -->
  <meta property="og:image" content="https://pmns.dostmimaropa.ph/assets/logo.png" /> <!-- image link, make sure it's jpg -->
  <meta property="og:url" content="http://pmns.dostmimaropa.ph/" /> <!-- where do you want your post to link to -->
  <meta property="og:type" content="article" />

  <!-- Favicons -->
  <link href="cms/uploads/logo.png" rel="icon">
  <link href="cms/uploads/logo.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="cms/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="cms/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="cms/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="cms/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="cms/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="cms/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="cms/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="cms/assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Arsha
  * Updated: Jan 29 2024 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">

      <!-- Uncomment below if you prefer to use an image logo -->
      <a href="index.php" class="logo me-auto"><img src="cms/uploads/logo2.png" alt="" class="img-fluid"></a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#services">Services</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
          <li><a class="getstarted scrollto" href="signin/index.php">Sign In</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
          <h1>Project Management and Notification System</h1>
          <h2>A web-based system features managing of projects and notifying of user. </h2>
          <div class="d-flex justify-content-center justify-content-lg-start">
            <a href="signin/index.php" class="btn-get-started scrollto">Get Started</a>
            <a href="https://www.youtube.com/watch?v=aXHLN4qGSWw" class="glightbox btn-watch-video"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
          <img src="cms/assets/img/hero-img.png" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Clients Section ======= -->


    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>About PMNS</h2>
        </div>

        <div class="row content">
          <div class="col-lg-12">
            <p>
              Facilitate project planning, notification, and scheduling by providing a centralized system for tracking tasks and deadlines and improve project outcomes by ensuring that all tasks are completed on time and to the required standard.
            </p>
            <div class="row">
              <div class="col-lg-6">
                <ul>
                  <li><i class="ri-check-double-line"></i> Task management and reminder</li>
                  <li><i class="ri-check-double-line"></i> Deadline tracking</li>
                  <li><i class="ri-check-double-line"></i> Priority settings</li>
                  <li><i class="ri-check-double-line"></i> Reporting and analytics</li>
                </ul>
              </div>
              <div class="col-lg-6">
                <ul>
                  <li><i class="ri-check-double-line"></i> Contact management</li>
                  <li><i class="ri-check-double-line"></i> SMS and email broadcasting</li>
                  <li><i class="ri-check-double-line"></i> Scheduling</li>
                  <li><i class="ri-check-double-line"></i> Automated alerts and notifcation</li>
                </ul>
              </div>
            </div>

          </div>
          <div class="col-lg-6 pt-4 pt-lg-0">
            <p>
            </p>
            <a href="#" class="btn-learn-more">Learn More</a>
          </div>
        </div>

      </div>
    </section><!-- End About Us Section -->

    <!-- ======= Skills Section ======= -->
    <section id="skills" class="skills section-bg">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-6 d-flex align-items-center" data-aos="fade-right" data-aos-delay="100">
            <img src="cms/assets/img/skills.png" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 content" data-aos="fade-left" data-aos-delay="100">
            <h3>Project</h3>
            <p class="fst-italic">
              Total projects per program.
            </p>

            <div class="skills-content">

              <div class="progress">
                <span class="skill">GIA <i class="val"><?= $gia ?></i></span>
                <div class="progress-bar-wrap">
                  <div class="progress-bar" role="progressbar" aria-valuenow="<?= $gia ?>" aria-valuemin="0" aria-valuemax="<?= $maxtotal ?>"></div>
                </div>
              </div>
              <div class="progress">
                <span class="skill">CEST <i class="val"><?= $cest ?></i></span>
                <div class="progress-bar-wrap">
                  <div class="progress-bar" role="progressbar" aria-valuenow="<?= $cest ?>" aria-valuemin="0" aria-valuemax="<?= $maxtotal ?>"></div>
                </div>
              </div>

              <div class="progress">
                <span class="skill">SETUP <i class="val"><?= $setup ?></i></span>
                <div class="progress-bar-wrap">
                  <div class="progress-bar" role="progressbar" aria-valuenow="<?= $setup ?>" aria-valuemin="0" aria-valuemax="<?= $maxtotal ?>"></div>
                </div>
              </div>

              <div class="progress">
                <span class="skill">SSCP <i class="val"><?= $sscp ?></i></span>
                <div class="progress-bar-wrap">
                  <div class="progress-bar" role="progressbar" aria-valuenow="<?= $sscp ?>" aria-valuemin="0" aria-valuemax="<?= $maxtotal ?>"></div>
                </div>
              </div>

            </div>

          </div>
        </div>

      </div>
    </section><!-- End Skills Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Services</h2>
          <p></p>
        </div>

        <div class="row">
          <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-male-female"></i></div>
              <h4><a href="">GIA</a></h4>
              <p>Grant-In-Aid.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
            </div>
          </div>

          <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-buildings"></i></div>
              <h4><a href="">CEST</a></h4>
              <p>Community Empowerment thru Science and Technology.</p>
            </div>
          </div>

          <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-store"></i></div>
              <h4><a href="">SETUP</a></h4>
              <p>Small Enterprise Technology Upgrading Program.</p>
            </div>
          </div>

          <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in" data-aos-delay="400">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-library"></i></div>
              <h4><a href="">SSCP</a></h4>
              <p>Smart and Sustainable Communities Program.</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Services Section -->





    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Contact</h2>
          <p></p>
        </div>

        <div class="row">

          <div class="col-lg-5 d-flex align-items-stretch">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p>4/F DOST-PTRI Building, Gen. Santos Avenue, Bicutan, Taguig City</p>
              </div>

              <div class="website">
                <i class="bi bi-globe"></i>
                <h4>Website</h4>
                <p><a href="https://region4b.dost.gov.ph">https://region4b.dost.gov.ph</a></p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>official@mimaropa.dost.gov.ph</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p>(02) 837-2071 loc 2092 or 2093</p>
              </div>

              <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15451.867249833736!2d121.0486759!3d14.4865947!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397cf1162342b39%3A0x1b73947e2ee43d00!2sPhilippine%20Textile%20Research%20Institute!5e0!3m2!1sen!2sph!4v1715923383388!5m2!1sen!2sph" frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
            </div>

          </div>

          <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
            <form action="contact.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="form-group col-md-6">
                  <label for="name">Your Name</label>
                  <input type="text" name="name" class="form-control" id="name" required>
                </div>
                <div class="form-group col-md-6">
                  <label for="name">Your Email</label>
                  <input type="email" class="form-control" name="email" id="email" required>
                </div>
              </div>
              <div class="form-group">
                <label for="name">Subject</label>
                <input type="text" class="form-control" name="subject" id="subject" required>
              </div>
              <div class="form-group">
                <label for="name">Message</label>
                <textarea class="form-control" name="message" rows="15" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">



    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 col-md-6 footer-contact">
            <h3>DOST-MIMAROPA</h3>
            <p>
              4/F DOST-PTRI Building <br>
              Gen. Santos Avenue, Bicutan<br>
              Taguig City <br><br>
              <strong>Phone:</strong> (02) 837-2071 loc 2092 or 2093<br>
              <strong>Website:</strong><a href="https://region4b.dost.gov.ph"> https://region4b.dost.gov.ph</a><br>
              <strong>Email:</strong> official@mimaropa.dost.gov.ph<br>
            </p>
          </div>

          <div class="col-lg-4 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#hero">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#about">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#services">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>


          <div class="col-lg-4 col-md-6 footer-links">
            <h4>Our Social Networks</h4>
            <div class="social-links mt-3">
              <a href="https://x.com/dostmimaropa" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="https://www.facebook.com/DOSTMIMAROPA" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="https://www.instagram.com/dost4b/" class="instagram"><i class="bx bxl-instagram"></i></a>
              <a href="https://www.youtube.com/@dostmimaropa7349" class="youtube"><i class="bx bxl-youtube"></i></a>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="container footer-bottom clearfix">
      <div class="copyright">
        &copy; Copyright <strong><span>DOST-MIMAROPA</span></strong>. All Rights Reserved
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="cms/assets/vendor/aos/aos.js"></script>
  <script src="cms/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="cms/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="cms/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="cms/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="cms/assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="cms/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="cms/assets/js/main.js"></script>

</body>

</html>