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
                    <li class="breadcrumb-item">Div Management</li>
                    <li class="breadcrumb-item"><?= $title; ?></li>
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
                        <form action="<?= base_url($link . '/' . $data['nosubdiv']); ?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <input type='hidden' name='_method' value='PUT' />
                            <!-- GET, POST, PUT, PATCH, DELETE-->
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
                                <label for="div_name">Sub Div Name</label>
                                <input type="text" class="form-control <?= ($error = validation_show_error('subdiv_name')) ? 'border-danger' : ''; ?>" id="subdiv_name" name="subdiv_name" placeholder="subDivname" value="<?= $data['subdiv_name']; ?>">
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