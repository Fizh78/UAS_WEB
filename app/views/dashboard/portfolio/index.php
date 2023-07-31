<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Portfolio</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Portfolio</li>
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
            <div class="card">
              <div class="card-header">
                <h2 class="card-title">Daftar Portfolio</h2>
                <a href="<?= BASEURL; ?>/DashboardPortfolio/create" class="btn btn-primary float-right">Create Data</i></a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Title</th>
                      <th>Client</th>
                      <th>Category</th>
                      <th>Project Date</th>
                      <th>Description</th>
                      <th>Image</th>
                      <th style="width: 40px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $no = 1;
                    foreach ( $data['portfolio'] as $portfolio ): 
                    ?>
                        <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?= $portfolio['title']; ?></td>
                        <td><?= $portfolio['client']; ?></td>
                        <td><?= $portfolio['category']; ?></td>
                        <td><?= $portfolio['project_date']; ?></td>
                        <td><?= $portfolio['description']; ?></td>
                          <?php if (!empty($portfolio['images'])): ?>
                            <td>
                              <div class="image-gallery">
                                <?php foreach ($portfolio['images'] as $image): ?>
                                  <img src="<?= BASEURL; ?>/images/<?= $image; ?>" alt="Event Image" style=" max-width:30px;">
                                <?php endforeach; ?>
                              </div>
                            </td>
                          <?php endif; ?>
                        <td>
                        <div class="btn-group">
                            <a href="<?= BASEURL; ?>/DashboardPortfolio/edit/<?= $portfolio['id']; ?>" class="btn btn-success float-right" ><i class="fa fa-pen"></i></a>
                            <a href="<?= BASEURL; ?>/DashboardPortfolio/hapus/<?= $portfolio['id']; ?>" class="btn btn-danger float-right" onclick="return confirm('yakin?');"><i class="fa fa-trash"></i></a>
                        </div>
                        </td>
                        </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>