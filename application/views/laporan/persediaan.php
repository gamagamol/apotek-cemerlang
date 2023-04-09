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
                    <h6 class="m-0 font-weight-bold ">Data Persediaan</h6>
                </div>





                <div class="card-body">
                    <?= $this->session->flashdata("msg") ?>


                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <tr class="text-center">
                                <th rowspan="2" class="text-center">No.</th>
                                <th rowspan="2" class="text-center">Keterangan.</th>
                                <th colspan="3">Pembelian</th>
                                <th colspan="3">Penjualan</th>
                                <th colspan="3">Persediaan</th>
                            </tr>
                            <?php $no = 1; ?>
                            <tr>
                                <td>Unit</td>
                                <td>Harga</td>
                                <td>Jumlah</td>
                                <td>Unit</td>
                                <td>Harga</td>
                                <td>Jumlah</td>
                                <td>Unit</td>
                                <td>Harga</td>
                                <td>Jumlah</td>
                            </tr>

                            <?php foreach ($data as $d) : ?>
                                <tr>

                                    <td><?= $no ?></td>
                                    <td><?= $d->nama_coa ?></td>
                                    <?php if ($d->nama_coa == 'pembelian') : ?>
                                        <td><?= $d->qty ?></td>
                                        <td><?= number_format($d->harga) ?></td>
                                        <td><?= number_format($d->total) ?></td>
                                        <td><?= " " ?></td>
                                        <td><?= " " ?></td>
                                        <td><?= " " ?></td>
                                        <td><?= " " ?></td>
                                        <td><?= " " ?></td>
                                        <td><?= " " ?></td>
                                    <?php else : ?>
                                        <td><?= " " ?></td>
                                        <td><?= " " ?></td>
                                        <td><?= " " ?></td>
                                        <td><?= $d->qty ?></td>
                                        <td><?= number_format($d->harga) ?></td>
                                        <td><?= number_format($d->total) ?></td>
                                        <td><?= " " ?></td>
                                        <td><?= " " ?></td>
                                        <td><?= " " ?></td>
                                    <?php endif; ?>
                                </tr>

                                <?php $no++; ?>
                            <?php endforeach; ?>


                        </table>


                    </div>
                </div>
            </div>
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->