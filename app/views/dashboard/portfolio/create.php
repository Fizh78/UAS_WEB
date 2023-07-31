  <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Create Portfolio</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Create Portfolio</li>
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
            <h3 class="card-title">Create Portfolio</h3>
            </div>
            <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" action="<?= BASEURL; ?>/DashboardPortfolio/tambah" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="title" class="col-sm-2 col-form-label">Title</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="title" name="title">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="deskripsi" class="col-sm-2 col-form-label">Client</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="client" name="client">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="venue" class="col-sm-2 col-form-label">Category</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="category" name="category">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="venue" class="col-sm-2 col-form-label">Project Date</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" id="project_date" name="project_date">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="venue" class="col-sm-2 col-form-label">Description</label>
                            <div class="col-sm-10">
                                <input type="textarea" class="form-control" id="description" name="description">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                          <label for="images" class="col-sm-2 col-form-label">Images</label>
                          <div class="col-sm-10">
                              <input type="file" class="form-control-file" id="images" name="images[]" multiple>
                              <small class="form-text text-muted">Select multiple images for the event (Hold Ctrl/Cmd to select multiple images)</small>
                          </div>
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