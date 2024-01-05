<?= $this->extend('template/index') ?>

<?= $this->section('content') ?>
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Dashboard</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3>

              <?php
              $db = db_connect();
              $query = $db->query('SELECT COUNT(nodoc) AS count_doc FROM doc WHERE 1=1');
              //you get result as an array in here but fetch your result however you feel to
              $result = $query->getResultArray();

              foreach ($result as $d) {
                echo $d['count_doc'];
              }
              ?>

            </h3>
            <p>Document Recorded</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <a href="<?= base_url(); ?>document" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3>

              <?php
              $db = db_connect();
              $query = $db->query('SELECT COUNT(nodoc) AS count_doc FROM doc WHERE 1=1 AND xdoc1 <> ""');
              //you get result as an array in here but fetch your result however you feel to
              $result = $query->getResultArray();

              foreach ($result as $d) {
                echo $d['count_doc'];
              }
              ?>

            </h3>

            <p>Document File Recorded</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="<?= base_url(); ?>document" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
          <div class="inner">
            <h3>

              <?php
              $db = db_connect();
              $query = $db->query('SELECT COUNT(id) AS count_id FROM users WHERE 1=1');
              //you get result as an array in here but fetch your result however you feel to
              $result = $query->getResultArray();

              foreach ($result as $d) {
                echo $d['count_id'];
              }
              ?>

            </h3>

            <p>User Registrations</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>

          <a href="<?= base_url('users'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
          <div class="inner">
            <h3>

              <?php
              $rootDir = $_SERVER['DOCUMENT_ROOT'];
              $it = new RecursiveIteratorIterator(
                new RecursiveDirectoryIterator($rootDir, RecursiveDirectoryIterator::SKIP_DOTS)
              );
              $numberOfFiles = iterator_count($it);
              echo $numberOfFiles;
              ?>

            </h3>

            <p>Public Documents</p>
          </div>
          <div class="icon">
            <i class="ion ion-pie-graph"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
    </div>
    <!-- /.row -->

  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
<?= $this->endSection('content') ?>