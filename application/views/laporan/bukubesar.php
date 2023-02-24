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
                    <h6 class="m-0 font-weight-bold ">Data Buku Besar</h6>
                </div>





                <div class="card-body">
                    <?= $this->session->flashdata("msg") ?>


                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <tr class="text-center">
                                <th>No.</th>
                                <th>Tanggal</th>
                                <th>Kode Akun</th>
                                <th>ref</th>
                                <th>Debit</th>
                                <th>Kredit</th>
                            </tr>
                            <?php
                            $no = 1;
                            ?>
                            <?php foreach ($data['penjualan'] as $d) : ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><?= $d->tgl_jurnal ?></td>
                                    <td><?= $d->nama_coa ?></td>
                                    <td></td>
                                    <?php if ($d->posisi_dr_cr == 'debet') : ?>

                                        <td><?= number_format($d->nominal) ?></td>
                                        <td> <?= '' ?> </td>
                                    <?php else : ?>
                                        <td> <?= '' ?></td>
                                        <td><?= number_format($d->nominal) ?></td>

                                    <?php endif; ?>
                                </tr>


                            <?php $no++;
                            endforeach; ?>


                        </table>
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <tr class="text-center">
                                <th>No.</th>
                                <th>Tanggal</th>
                                <th>Kode Akun</th>
                                <th>ref</th>
                                <th>Debit</th>
                                <th>Kredit</th>
                            </tr>
                            <?php
                            $no = 1;
                            ?>
                            <?php foreach ($data['penjualan'] as $d) : ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><?= $d->tgl_jurnal ?></td>
                                    <td><?= $d->nama_coa ?></td>
                                    <td></td>
                                    <?php if ($d->posisi_dr_cr == 'debet') : ?>

                                        <td><?= number_format($d->nominal) ?></td>
                                        <td> <?= '' ?> </td>
                                    <?php else : ?>
                                        <td> <?= '' ?></td>
                                        <td><?= number_format($d->nominal) ?></td>

                                    <?php endif; ?>
                                </tr>


                            <?php $no++;
                            endforeach; ?>


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