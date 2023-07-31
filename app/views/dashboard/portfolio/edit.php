<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Portfolio</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Portfolio</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
        <div class="col-md-12">
        <div class="card card-info">
            <div class="card-header">
            <h3 class="card-title">Edit Portfolio</h3>
            </div>
            <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" action="<?= BASEURL; ?>/DashboardPortfolio/ubah" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                        <input type="hidden" name="id" id="id" value="<?= $data['portfolio']['id']; ?>">
                        <div class="form-group row">
                            <label for="title" class="col-sm-2 col-form-label">Title</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="title" name="title" value="<?= $data['portfolio']['title']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="deskripsi" class="col-sm-2 col-form-label">Client</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="client" name="client" value="<?= $data['portfolio']['client']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="venue" class="col-sm-2 col-form-label">Category</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="category" name="category" value="<?= $data['portfolio']['category']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="venue" class="col-sm-2 col-form-label">Project Date</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" id="project_date" name="project_date" value="<?= $data['portfolio']['project_date']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="venue" class="col-sm-2 col-form-label">Description</label>
                            <div class="col-sm-10">
                                <input type="textarea" class="form-control" id="description" name="description" value="<?= $data['portfolio']['description']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="images" class="col-sm-2 col-form-label">Images</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control-file" id="images" name="images[]" multiple>
                            </div>
                        </div>

                        <!-- Image preview area -->
                        <div class="form-group row" id="imagePreviewArea">
                            <!-- Image previews will be dynamically generated here -->
                            <?php if (isset($data['imageFilenames']) && !empty($data['imageFilenames'])) : ?>
                                <?php foreach ($data['imageFilenames'] as $filename) : ?>
                                    <div class="img-preview">
                                        <img src="<?= BASEURL; ?>/path/to/images/<?= $filename; ?>" alt="Image Preview">
                                        <span class="remove-icon" data-filename="<?= $filename; ?>">X</span>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">Save</button>
                        <a href="<?= BASEURL; ?>/DashboardPortfolio" class="btn btn-default float-right">Cancel</a>
                    </div>
                <!-- /.card-footer -->
                </form>
            </div>
          </div>
        </div>
      </div>
    </section>