<?= $this->extend('template/index') ?>

<?= $this->section('content') ?>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Master <?= $title; ?></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
                    <li class="breadcrumb-item">Doc Management</li>
                    <li class="breadcrumb-item"><?= $title; ?></li>
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
            <div class="col-12">
                <form action='<?= base_url($link); ?>' method='get' enctype='multipart/form-data'>
                    <div class="form-actions no-color">
                        <p>
                            <label for="findby">Find by</label>
                            <select name="findby" id="findby">
                                <option value="div_name" <?= $div_name_selected; ?>>Div Name</option>
                                <option value="description" <?= $description_selected; ?>>Description</option>
                                <option value="subdiv_name" <?= $subdiv_name_selected; ?>>Sub Div Name</option>
                            </select>
                            <label for="keyword"> : </label>
                            <input type="text" class="input_filter" id="keyword" name="keyword" value="<?= $keyword; ?>" />
                            <button class="btn btn-primary btn-sm mb-2" type="submit">Search</button> |
                            <a href='<?= base_url($link); ?>'>Back to full List</a>
                        </p>
                    </div>
                </form>
                <a href="<?= base_url($link . '/new'); ?>" class="btn btn-primary btn-sm mb-2">New Sub Division</a>
                <div class="card">
                    <div class="card-header">
                        Maintain <?= $title; ?>
                    </div>
                    <div class="card-body">
                        <table class="table" id="table2">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Div Name</th>
                                    <th>Description</th>
                                    <th>Sub Div Name</th>
                                    <th>Created At</th>
                                    <th>Update At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $a = 1;
                                foreach ($data as $d) : ?>
                                    <tr>
                                        <td><?= ($a++ + ($listperpage  * ($page - 1))) ?></td>
                                        <td><?= $d['div_name']; ?></td>
                                        <td><?= $d['description']; ?></td>
                                        <td><?= $d['subdiv_name']; ?></td>
                                        <td><?= $d['created_at']; ?></td>
                                        <td><?= $d['updated_at']; ?></td>
                                        <td>
                                            <a class="btn btn-warning btn-sm mb-2" href="<?= base_url($link . '/' . $d['nosubdiv'] . '/edit'); ?>">Edit / Detail</a>
                                            <form class="d-inline" action='<?= base_url($link . '/' . $d['nosubdiv']); ?>' method='post' enctype='multipart/form-data'>
                                                <?= csrf_field(); ?>
                                                <input type='hidden' name='_method' value='DELETE' />
                                                <!-- GET, POST, PUT, PATCH, DELETE-->
                                                <button type='button' onclick='deleteTombol(this)' class='btn btn-sm mb-2 btn-danger'>Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <?= $pager->links('default', 'pagination'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection('content') ?>