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
                    <h6 class="m-0 font-weight-bold ">Data Neraca Saldo</h6>
                </div>





                <div class="card-body">
                    <?= $this->session->flashdata("msg") ?>


                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <tr class="text-center">
                                <th>No.</th>
                                <th>Nama Akun</th>
                                <th>Debit</th>
                                <th>Kredit</th>
                            </tr>
                            <?php
                            $no = 1;
                            $total_kredit = 0;
                            $total_debit = 0;
                            ?>
                            <?php foreach ($data as $d) : ?>

                                <tr>
                                    <td><?= $no ?></td>
                                    <td><?= $d->nama_coa ?></td>
                                    <?php if ($d->posisi_dr_cr == 'debet') : ?>

                                        <td><?= number_format($d->total) ?></td>
                                        <td> <?= '' ?> </td>
                                        <?php $total_debit += $d->total ?>

                                    <?php else : ?>
                                        <td> <?= '' ?></td>
                                        <td><?= number_format($d->total) ?></td>
                                        <?php $total_kredit += $d->total ?>

                                    <?php endif; ?>



                                </tr>


                            <?php $no++;
                            endforeach; ?>
                            <tr>
                                <td colspan="2" class="text-center">Total</td>
                                <td><?= number_format($total_debit) ?></td>
                                <td><?= number_format($total_kredit) ?></td>
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
<!-- /.content-wrapper -->