<main id="main" data-aos="fade" >

    <!-- ======= End Page Header ======= -->
    <div class="page-header d-flex align-items-center">
      <div class="container position-relative">
        <div class="row d-flex justify-content-center">
          <div class="col-lg-6 text-center">
            <h2><?= $data['portfolio']['title']; ?></h2>
            <a class="cta-btn" href="<?= BASEURL; ?>/home/contact">Available for hire</a>

          </div>
        </div>
      </div>
    </div><!-- End Page Header -->

    <!-- ======= Gallery Single Section ======= -->
    <section id="gallery-single" class="gallery-single">
      <div class="container">

        <div class="position-relative h-100">
          <div class="slides-1 portfolio-details-slider swiper">
            <div class="swiper-wrapper align-items-center">
              <?php foreach ($data['portfolio']['images'] as $image): ?>
                
                <div class="swiper-slide">
                  <img src="<?= BASEURL; ?>/images/<?= $image; ?>" alt="">
                </div>
              <?php endforeach; ?>              
            </div>
            <div class="swiper-pagination"></div>
          </div>
          <div class="swiper-button-prev"></div>
          <div class="swiper-button-next"></div>

        </div>

        <div class="row justify-content-between gy-4 mt-4">

          <div class="col-lg-8">
            <div class="portfolio-description">
              <h2>This is an example of portfolio detail</h2>
              <p>
                <?= $data['portfolio']['description']; ?>
              </p>

              

            </div>
          </div>

          <div class="col-lg-3">
            <div class="portfolio-info">
              <h3>Project information</h3>
              <ul>
                <li><strong>Category</strong> <span><?= $data['portfolio']['category']; ?></span></li>
                <li><strong>Client</strong> <span><?= $data['portfolio']['client']; ?></span></li>
                <li><strong>Project date</strong> <span><?= $data['portfolio']['project_date']; ?></span></li>
              </ul>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Gallery Single Section -->

  </main><!-- End #main -->