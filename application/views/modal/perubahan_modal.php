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
                        
                                
                                <th>Modal Awal</th>
                                <th><?= 'Rp'.number_format($data[0]->modal_awal) ?></th>

                            </tr>
                            <tr class="text-center">
                        
                                
                        <th>Modal Bertambah</th>
                        <th><?= 'Rp'.number_format($data[0]->bertambah) ?></th>

                    </tr>
                    <tr class="text-center">
                        
                                
                        <th>Modal Berkurang</th>
                        <th><?= 'Rp'.number_format($data[0]->berkurang) ?></th>

                    </tr>
                    <tr class="text-center">
                       <th>Total modal</th>
                      <th><?=  'Rp'.number_format($data[0]->modal_awal + $data[0]->bertambah - $data[0]->berkurang)  ?></th>
                      </tr>
                          
                      <tr class="text-center">
                       <th>Laba Rugi</th>
                      <th><?=  'Rp'.number_format($labarugi[0]->totalpenjualan - $labarugi[0]->totalbeban)  ?></th>
                      </tr>
                      <tr class="text-center">
                        <?php
                        $laba_rugi = $labarugi[0]->totalpenjualan - $labarugi[0]->totalbeban;
                        $modal = $data[0]->modal_awal + $data[0]->bertambah - $data[0]->berkurang;

                        ?>
                        <th>Total modal </th>

                        <?php if ($laba_rugi > 0) : ?>
                            <th><?= 'Rp'.number_format($laba_rugi + $modal) ?></th>
                        <?php else : ?>
                            <th><?= 'Rp'.number_format($modal + $laba_rugi) ?></th>
                        <?php endif ?>
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