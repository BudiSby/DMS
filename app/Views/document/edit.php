<?= $this->extend('template/index') ?>

<?= $this->section('content') ?>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Edit / Detail <?= $title; ?></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
                    <li class="breadcrumb-item">Maintain <?= $title; ?></li>
                    <li class="breadcrumb-item active">Edit</li>
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
                        Edit <?= $title; ?>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url($link . '/' . $data['nodoc']); ?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <input type='hidden' name='_method' value='PUT' />
                            <!-- GET, POST, PUT, PATCH, DELETE-->

                            <div class="form-group">
                                <label for="noyear">Year</label>
                                <select name="noyear" id="noyear" class="form-control <?= ($error = validation_show_error('noyear')) ? 'border-danger' : ''; ?>">
                                    <?php foreach ($year as $d) : ?>
                                        <?php if ($d['noyear'] == $data['noyear']) : ?>
                                            <option selected value="<?= $d['noyear']; ?>"><?= $d['year_name']; ?></option>
                                        <?php else : ?>
                                            <option value="<?= $d['noyear']; ?>"><?= $d['year_name']; ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <?= ($error) ? '<div class="error text-danger mb-2" style="margin-top: -15px">' . $error . '</div>' : ''; ?>


                            <div class="form-group">
                                <label for="nodiv">Division</label>
                                <select name="nodiv" id="nodiv" class="form-control <?= ($error = validation_show_error('nodiv')) ? 'border-danger' : ''; ?>">
                                    <?php foreach ($division as $d) : ?>
                                        <?php if ($d['nodiv'] == $data['nodiv']) : ?>
                                            <option selected value="<?= $d['nodiv']; ?>"><?= $d['div_name']; ?></option>
                                        <?php else : ?>
                                            <option value="<?= $d['nodiv']; ?>"><?= $d['div_name']; ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <?= ($error) ? '<div class="error text-danger mb-2" style="margin-top: -15px">' . $error . '</div>' : ''; ?>

                            <div class="form-group">
                                <label for="nodiv">Sub Division</label>
                                <select name="nosubdiv" id="nosubdiv" class="form-control <?= ($error = validation_show_error('nosubdiv')) ? 'border-danger' : ''; ?>">
                                    <?php foreach ($subdivision as $d) : ?>
                                        <?php if ($d['nosubdiv'] == $data['nosubdiv']) : ?>
                                            <option selected value="<?= $d['nosubdiv']; ?>"><?= $d['subdiv_name']; ?></option>
                                        <?php else : ?>
                                            <option value="<?= $d['nosubdiv']; ?>"><?= $d['subdiv_name']; ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <?= ($error) ? '<div class="error text-danger mb-2" style="margin-top: -15px">' . $error . '</div>' : ''; ?>

                            <div class="form-group">
                                <label for="nodoctype">Doc Type</label>
                                <select name="nodoctype" id="nodoctype" class="form-control <?= ($error = validation_show_error('nodoctype')) ? 'border-danger' : ''; ?>">
                                    <?php foreach ($doctype as $d) : ?>
                                        <?php if ($d['nodoctype'] == $data['nodoctype']) : ?>
                                            <option selected value="<?= $d['nodoctype']; ?>"><?= $d['doctype_name']; ?></option>
                                        <?php else : ?>
                                            <option value="<?= $d['nodoctype']; ?>"><?= $d['doctype_name']; ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <?= ($error) ? '<div class="error text-danger mb-2" style="margin-top: -15px">' . $error . '</div>' : ''; ?>


                            <div class="form-group">
                                <label for="doc_name">Doc Name</label>
                                <input type="text" class="form-control <?= ($error = validation_show_error('doc_name')) ? 'border-danger' : ''; ?>" id="doc_name" name="doc_name" placeholder="Docname" value="<?= $data['doc_name']; ?>">
                            </div>
                            <?= ($error) ? '<div class="error text-danger mb-2" style="margin-top: -15px">' . $error . '</div>' : ''; ?>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <input type="text" class="form-control <?= ($error = validation_show_error('description')) ? 'border-danger' : ''; ?>" id="description" name="description" placeholder="Description" value="<?= $data['description']; ?>">
                            </div>
                            <?= ($error) ? '<div class="error text-danger mb-2" style="margin-top: -15px">' . $error . '</div>' : ''; ?>

                            <div class="form-group">
                                <label for="xdoc">Doc File</label>
                                <div id="xdoc">
                                    <a href="<?= base_url(); ?>public/assets/uploads/documents/<?= $data['xdoc1']; ?>" target="xdoclink">
                                        <label for="xdoclink"><?= $data['xdoc1_name']; ?></label>
                                    </a>
                                </div>
                                <input type="file" class="form-control <?= ($error = validation_show_error('file')) ? 'border-danger' : ''; ?>" id="xdoc" name="xdoc">
                            </div>

                            <?= ($error) ? '<div class="error text-danger mb-2" style="margin-top: -15px">' . $error . '</div>' : ''; ?>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="<?= base_url($link); ?>" class="btn btn-secondary">Cancel</a>

                            <a href="javascript:window.history.go(-1);" class="btn btn-info">Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>
</section>
<?= $this->endSection('content') ?>