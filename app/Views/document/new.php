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
                                <label for="noyear">Year</label>
                                <select name="noyear" id="noyear" class="form-control <?= ($error = validation_show_error('noyear')) ? 'border-danger' : ''; ?>">
                                    <?php foreach ($year as $d) : ?>
                                        <option value="<?= $d['noyear']; ?>"><?= $d['year_name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <?= ($error) ? '<div class="error text-danger mb-2" style="margin-top: -15px">' . $error . '</div>' : ''; ?>


                            <div class="form-group">
                                <label for="nodiv">Division</label>
                                <select name="nodiv" id="nodiv" class="form-control <?= ($error = validation_show_error('nodiv')) ? 'border-danger' : ''; ?>">
                                    <?php foreach ($division as $d) : ?>
                                        <option value="<?= $d['nodiv']; ?>"><?= $d['div_name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <?= ($error) ? '<div class="error text-danger mb-2" style="margin-top: -15px">' . $error . '</div>' : ''; ?>

                            <div class="form-group">
                                <label for="nodiv">Sub Division</label>
                                <select name="nosubdiv" id="nosubdiv" class="form-control <?= ($error = validation_show_error('nosubdiv')) ? 'border-danger' : ''; ?>">
                                    <?php foreach ($subdivision as $d) : ?>
                                        <option value="<?= $d['nosubdiv']; ?>"><?= $d['subdiv_name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <?= ($error) ? '<div class="error text-danger mb-2" style="margin-top: -15px">' . $error . '</div>' : ''; ?>

                            <div class="form-group">
                                <label for="nodoctype">Doc Type</label>
                                <select name="nodoctype" id="nodoctype" class="form-control <?= ($error = validation_show_error('nodoctype')) ? 'border-danger' : ''; ?>">
                                    <?php foreach ($doctype as $d) : ?>
                                        <option value="<?= $d['nodoctype']; ?>"><?= $d['doctype_name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <?= ($error) ? '<div class="error text-danger mb-2" style="margin-top: -15px">' . $error . '</div>' : ''; ?>


                            <div class="form-group">
                                <label for="doc_name">Doc Name</label>
                                <input type="text" class="form-control <?= ($error = validation_show_error('doc_name')) ? 'border-danger' : ''; ?>" id="doc_name" name="doc_name" placeholder="Document Name" value="<?= old('doc_name'); ?>">
                            </div>
                            <?= ($error) ? '<div class="error text-danger mb-2" style="margin-top: -15px">' . $error . '</div>' : ''; ?>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <input type="text" class="form-control <?= ($error = validation_show_error('description')) ? 'border-danger' : ''; ?>" id="description" name="description" placeholder="Document Description">
                            </div>
                            <?= ($error) ? '<div class="error text-danger mb-2" style="margin-top: -15px">' . $error . '</div>' : ''; ?>

                            <div class="form-group">
                                <label for="xdoc">Doc File</label>
                                <input type="file" class="form-control <?= ($error = validation_show_error('file')) ? 'border-danger' : ''; ?>" id="xdoc" name="xdoc">
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