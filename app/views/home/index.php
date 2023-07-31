  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero d-flex flex-column justify-content-center align-items-center" data-aos="fade" data-aos-delay="1500">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6 text-center">
          <h2>Welcome to<span>MNO Photography Studio</span>Where Your Moments Come to Life</h2>
          <p>At MNO Photography Studio, we believe that every moment is worth capturing and cherishing for a lifetime. We are not just a photography studio; we are your memory preservers, storytellers, and artists dedicated to turning your most precious moments into stunning works of art.</p>
          <a href="<?= BASEURL; ?>/home/contact" class="btn-get-started">Available for hire</a>
        </div>
      </div>
    </div>
  </section><!-- End Hero Section -->

  <main id="main" data-aos="fade">

    <!-- ======= Gallery Section ======= -->
    <section id="gallery" class="gallery">
      <div class="container-fluid">

        <div class="row gy-4 justify-content-center">
        <?php foreach ( $data['image'] as $image ): ?>
          <div class="col-xl-3 col-lg-4 col-md-6">
            <div class="gallery-item h-100">
            <?php if (!empty($image['images'])): ?>
                <img src="<?= BASEURL; ?>/images/<?= ($image['images'][0]); ?>" class="img-fluid" alt="">
            <?php endif; ?>
              <div class="gallery-links d-flex align-items-center justify-content-center">
                <?php if (!empty($image['images'])): ?>
                  <a href="<?= BASEURL; ?>/images/<?= ($image['images'][0]); ?>" title="<?= $image['title']; ?>" class="glightbox preview-link"><i class="bi bi-arrows-angle-expand"></i></a>
                <?php endif; ?>
                <a href="<?= BASEURL; ?>/home/detail_portfolio/<?= $image['id']; ?>" class="details-link"><i class="bi bi-link-45deg"></i></a>
              </div>
            </div>
          </div><!-- End Gallery Item -->
        <?php endforeach; ?>
          
        </div>

      </div>
    </section><!-- End Gallery Section -->

  </main><!-- End #main -->