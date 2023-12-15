<?= $this->extend('template/index') ?>

<?= $this->section('content') ?>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">New Digital <?= $title; ?></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
                    <li class="breadcrumb-item">Digital <?= $title; ?></li>
                    <li class="breadcrumb-item active">New</li>
                </ol>
            </div>
            <!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->


<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">
                        New <?= $title; ?>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url($link); ?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <div class="form-group">
                                <label for="docname">Doc Name</label>
                                <input type="text" class="form-control <?= ($error = validation_show_error('docname')) ? 'border-danger' : ''; ?>" id="docname" name="docname" placeholder="Document Name" value="<?= old('docname'); ?>">
                            </div>
                            <?= ($error) ? '<div class="error text-danger mb-2" style="margin-top: -15px">' . $error . '</div>' : ''; ?>

                            <div class="form-group">
                                <label for="docdescription">Description</label>
                                <input type="text" class="form-control <?= ($error = validation_show_error('docdescription')) ? 'border-danger' : ''; ?>" id="docdescription" name="docdescription" placeholder="Document Description">
                            </div>
                            <?= ($error) ? '<div class="error text-danger mb-2" style="margin-top: -15px">' . $error . '</div>' : ''; ?>

                            <div class="form-group">
                                <label for="docfile">Doc File</label>
                                <input type="file" class="form-control <?= ($error = validation_show_error('image')) ? 'border-danger' : ''; ?>" id="docfile" name="docfile">
                            </div>

                            <?= ($error) ? '<div class="error text-danger mb-2" style="margin-top: -15px">' . $error . '</div>' : ''; ?>

                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="<?= base_url($link); ?>" class="btn btn-secondary">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>
</section>
<?= $this->endSection('content') ?>