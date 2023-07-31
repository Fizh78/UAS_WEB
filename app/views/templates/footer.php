  <footer id="footer" class="footer">
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>PhotoFolio</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        Designed by <a href="#">PhotoFolio</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <!-- Add this in the <head> section of your HTML file -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <script src="<?= BASEURL; ?>/frontend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= BASEURL; ?>/frontend/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="<?= BASEURL; ?>/frontend/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="<?= BASEURL; ?>/frontend/assets/vendor/aos/aos.js"></script>
  <!-- <script src="<?= BASEURL; ?>/frontend/assets/vendor/php-email-form/validate.js"></script> -->

  <!-- Template Main JS File -->
  <script src="<?= BASEURL; ?>/frontend/assets/js/main.js"></script>
  <!-- Add this script after including jQuery -->
  <script>
    $(document).ready(function() {
      $("#contactForm").submit(function(e) {
        e.preventDefault(); // Prevent the default form submission

        var form = $(this);
        var url = form.attr("action");
        var formData = form.serialize();

        // Show loading message while submitting
        form.find(".loading").fadeIn();
        form.find(".error-message").hide();
        form.find(".sent-message").hide();

        // AJAX form submission
        $.ajax({
          type: "POST",
          url: url,
          data: formData,
          success: function(response) {
            // Hide loading message and show success message
            form.find(".loading").fadeOut();
            form.find(".sent-message").fadeIn().delay(3000).fadeOut(); // Show success message for 3 seconds

            // Clear the form fields after successful submission
            form.trigger("reset");
          },
          error: function(xhr, status, error) {
            // Hide loading message and show error message
            form.find(".loading").fadeOut();
            form.find(".error-message").text("Error: " + error).fadeIn();
          }
        });
      });
    });
  </script>

 

</body>

</html>