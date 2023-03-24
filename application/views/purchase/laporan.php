<!-- Navbar -->
<?php $this->load->view('module/navbar') ?>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<?php $this->load->view('module/sidebar') ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">
                        </li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="container">
            <div class="card shadow mb-4">
                <div class="card-header py-3 mt-2">
                    <h6 class="m-0 font-weight-bold "> <?= $title ?> </h6>
                </div>




                <div class="card-body">
                    <?= $this->session->flashdata("msg") ?>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <tr class="text-center">
                                <th>No.</th>
                                <th>Tanggal</th>
                                <th>Nama Obat</th>
                                <th>Total Pembelian</th>

                            </tr>
                            <?php
                            $no = 1;
                            $total = 0;
                            ?>
                            <?php foreach ($data as $d) : ?>
                                <tr class="text-center">
                                    <td><?= $no ?></td>
                                    <td><?= $d->date ?></td>
                                    <td><?= $d->name ?></td>
                                    <td><?= 'Rp' . number_format($d->total) ?></td>



                                </tr>
                                <?php
                                $no++;
                                $total += $d->total;

                                ?>
                            <?php endforeach; ?>
                            <tr>
                                <td colspan="3" class="text-center">Total</td>
                                <td class="text-center"><?= 'Rp'.number_format($total) ?></td>
                            </tr>
                        </table>

                    </div>
                </div>
            </div>
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>