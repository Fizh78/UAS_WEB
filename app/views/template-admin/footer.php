</div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= BASEURL; ?>/assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= BASEURL; ?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= BASEURL; ?>/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= BASEURL; ?>/assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- Di halaman dashboard atau halaman tujuan setelah login berhasil -->
<script>
    // Function to handle image previews and removal
    function handleImagePreview(input) {
        const previewArea = document.getElementById('imagePreviewArea');
        previewArea.innerHTML = ''; // Clear the preview area

        if (input.files && input.files.length > 0) {
            for (let i = 0; i < input.files.length; i++) {
                const file = input.files[i];
                const reader = new FileReader();

                reader.onload = function (event) {
                    // Create the image preview element
                    const imgPreview = document.createElement('div');
                    imgPreview.classList.add('img-preview');

                    // Create the image element
                    const imgElement = document.createElement('img');
                    imgElement.src = event.target.result;
                    imgElement.alt = 'Image Preview';
                    imgElement.style.width = '100px';
                    imgElement.style.height = '100px';

                    // Create the "X" icon for image removal
                    const removeIcon = document.createElement('span');
                    removeIcon.textContent = 'X';
                    removeIcon.classList.add('remove-icon');
                    removeIcon.addEventListener('click', function () {
                        // Remove the image preview and file from the input
                        imgPreview.remove();
                        input.value = '';
                    });

                    // Append the "X" icon before the image
                    imgPreview.appendChild(removeIcon);
                    imgPreview.appendChild(imgElement); // Append the image

                    // Append the preview element to the preview area
                    previewArea.appendChild(imgPreview);
                };

                reader.readAsDataURL(file); // Read the image file
            }
        }
    }

    // Listen for changes in the image input
    const imageInput = document.getElementById('images');
    imageInput.addEventListener('change', function () {
        handleImagePreview(this);
    });
</script>


</body>
</html>
