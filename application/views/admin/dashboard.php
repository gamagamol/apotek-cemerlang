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
          <h1>Dashboard</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">
              <?= $bc ?>
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
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Overview</h3>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <?php
                $drugs = $this->db->get('drugs')->result();
                $cdrugs = 0;
                foreach($drugs as $d){
                  $cdrugs += $d->stock;
                }
                ?>
                <h3><?= $cdrugs ?></h3>

                <p>
                  OBAT
                </p>
              </div>
              <a href="<?= base_url('admin/drugs') ?>" class="small-box-footer">Lihat data <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <?php
                $purchase = $this->db->get('purchase')->result();
                $totalpurchase = 0;
                foreach($purchase as $p){
                  $totalpurchase += $p->total;
                }
                ?>
                <h3><?= 'Rp. '.number_format($totalpurchase) ?></h3>
                <p>
                  PEMBELIAN
                </p>
              </div>
              <a href="<?= base_url('admin/purchase') ?>" class="small-box-footer">Lihat data <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-12">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <?php
                $sales = $this->db->get('sales')->result();
                $totalsales = 0;
                foreach($sales as $s){
                  $totalsales += $s->total;
                }
                ?>
                <h3><?= 'Rp. '.number_format($totalsales) ?></h3>

                <p>
                  Penjualan
                </p>
              </div>
              <a href="<?= base_url('admin/sales') ?>" class="small-box-footer">Lihat data <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <?php
                $debt = $this->db->get('debt')->result();
                $nominal_debt = 0;
                foreach($debt as $de){
                  $nominal_debt += $de->nominal_debt;
                }
                ?>
                <h3><?= 'Rp. '.number_format($nominal_debt) ?></h3>
                <p>
                  HUTANG
                </p>
              </div>
              <a href="<?= base_url('admin/debt') ?>" class="small-box-footer">Lihat data <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <?php
                $receivable = $this->db->get('receivable')->result();
                $nominal = 0;
                foreach($receivable as $re){
                  $nominal += $re->nominal;
                }
                ?>
                <h3><?= 'Rp. '.number_format($nominal) ?></h3>
                <p>
                  PIUTANG
                </p>
              </div>
              <a href="<?= base_url('admin/receivable') ?>" class="small-box-footer">Lihat data <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <?php
                $capital = $this->db->get('capital')->result();
                $nominal = 0;
                foreach($capital as $cap){
                  $nominal += $cap->nominal;
                }
                ?>
                <h3><?= 'Rp. '.number_format($nominal) ?></h3>
                <p>
                  MODAL
                </p>
              </div>
              <a href="<?= base_url('admin/capital') ?>" class="small-box-footer">Lihat data <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
           <!-- ./col -->
           <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <?php
                $return = $this->db->get('purchase_return')->result();
                $nominal = 0;
                foreach($return as $cap){
                  $nominal += $cap->nominal;
                }
                ?>
                <h3><?= 'Rp. '.number_format($nominal) ?></h3>
                <p>
                  RETUR PEMBELIAN
                </p>
              </div>
              <a href="<?= base_url('admin/purchase_return') ?>" class="small-box-footer">Lihat data <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->