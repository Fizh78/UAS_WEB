<main id="main" data-aos="fade" >

    <!-- ======= End Page Header ======= -->
    <div class="page-header d-flex align-items-center">
      <div class="container position-relative">
        <div class="row d-flex justify-content-center">
          <div class="col-lg-6 text-center">
            <h2>All Portfolio</h2>
            <p>Odio et unde deleniti. Deserunt numquam exercitationem. Officiis quo odio sint voluptas consequatur ut a odio voluptatem. Sit dolorum debitis veritatis natus dolores. Quasi ratione sint. Sit quaerat ipsum dolorem.</p>

            <a class="cta-btn" href="<?= BASEURL; ?>/home/contact">Available for hire</a>

          </div>
        </div>
      </div>
    </div><!-- End Page Header -->

    <!-- ======= Gallery Section ======= -->
    <section id="gallery" class="gallery">
      <div class="container-fluid">

        <div class="row gy-4 justify-content-center">
        <?php foreach ( $data['portfolio'] as $image ): ?>
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