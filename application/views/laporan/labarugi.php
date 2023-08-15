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
                    <h6 class="m-0 font-weight-bold "></h6>
                </div>



                <div class="card-body">
                    <?= $this->session->flashdata("msg") ?>
                    <table class="table">
                </div>
                <div class="col-md-3">
                    <input type="month" name="date" id="date" class="form-control">
                </div>
                <div class="row mb-3">
                    <div class="col text-center">
                        <h1>Laba Rugi</h1>
                        <h3>Apotek Cemerlang</h3>
                        <h5>Periode:<?= date('M-Y') ?></h5>
                    </div>
                </div>
                <tr>
                    <td>Penjualan</td>
                    <td>:</td>
                    <td><?= $data[0]->totalpenjualan ?></td>
                </tr>
                <tr>
                    <td>Beban listrik</td>
                    <td>:</td>
                    <td><?= $data[0]->beban_listrik ?></td>
                </tr>
                <tr>
                    <td>total pembelian</td>
                    <td>:</td>
                    <td><?= $data[0]->total_pembelian ?></td>
                </tr>
                <tr>
                    <td>laba rugi</td>
                    <td>:</td>
                    <td><?= $data[0]->totalpenjualan - $data[0]->beban_listrik - $data[0]->total_pembelian ?></td>
                </tr>
                </table>

            </div>
        </div>
</div>
</section>
</div>