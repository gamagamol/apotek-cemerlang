<<<<<<< HEAD
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
          <h1>Hutang</h1>
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
        <h3 class="card-title">Tabel</h3>
      </div>
      <div class="card-body">
        <button class="btn btn-primary btn-sm btn-flat" data-toggle="modal" data-target="#add_debt">Tambah</button>
        <br />
        <?= $this->session->flashdata("msg"); ?>
        <br />
        <table class="table table-bordered table-hover table-responsive" id="table">
          <thead>
            <tr>
             <th>No.</th>
             <th>Tanggal</th>
             <th>Debit</th>
             <th>Credit</th>
             <th>Catatan</th>
             <th>Nominal</th>
             </tr>
             </thead>
             <tbody>
             <?php $no = 1; foreach ($debt as $de): ?>
                <tr>
                  <td><?= $no++; ?></td>
                  <td><?= $de->debt_date; ?></td>
                  <td><?= $de->debit; ?></td>
                  <td><?= $de->credit; ?></td>
                 <td><?= $de->catatan_debt; ?></td>
                  <td><?= 'Rp. '. number_format($de->nominal_debt); ?></td>
                 </tr>
                 <?php endforeach; ?>
                  </tbody>
      </table>
    </div>
    <!-- /.card-footer-->
  </div>
  <!-- /.card -->

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<div class="modal fade" id="add_debt">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url("admin/add_debt") ?>" method="post">
        <div class="modal-body">
          <div class="form-group">
            <label for="addno_debt">No</label>
            <input type="number" class="form-control" name="debt_no" id="addno_debt" placeholder="Masukkan nomor hutang... ">
          </div>
          <div class="form-group">
            <label for="adddebt_date">Tanggal</label>
            <input type="date" class="form-control" name="debt_date" id="adddebt_date" placeholder="Masukkan tanggal hutang... ">
          </div>
          <div class="form-group">
            <label for="adddebit">Debit</label>
            <input type="text" class="form-control" name="debit" id="adddebit" placeholder="Masukkan jenis debit hutang... ">
          </div>
          <div class="form-group">
            <label for="addcredit">Credit</label>
            <input type="text" class="form-control" name="credit" id="addcredit" placeholder="Masukkan jenis credit hutang... ">
          </div>
          <div class="form-group">
            <label for="addcatatan_debt">Catatan</label>
            <input type="text" class="form-control" name="catatan_debt" id="addcatatan_debt" placeholder="Masukkan catatan hutang... ">
          </div>
          <div class="form-group">
            <label for="addnominal_debt">Nominal</label>
            <input type="number" class="form-control" name="nominal_debt" id="addnominal_debt" placeholder="Masukkan nominal hutang... ">
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
          <button type="submit" id="btneditdebt" class="btn btn-primary">Tambah</button> 
        </div>
      </form>
    </div>
  </div>
</div>
<!-- modal edit debt -->
<div class="modal fade" id="edidebt">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">Edit</h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<form action="<?= base_url('admin/editdebt') ?>" method="POST">
<div class="modal-body">
<input type="hidden" name="no_debt" id="no_debt">
<div class="form-group">
<label for="no_debt">Number</label>
<input type="number" class="form-control" name="no_debt" id="no_debt" placeholder="Masukkan nomor hutang..">
</div>
<div class="modal-footer justify-content-between">
<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
<button type="submit" id="btneditdebt" class="btn btn-primary">Ubah</button>
</div>
</form>
</div>
<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
=======
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
          <h1>Hutang</h1>
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
        <h3 class="card-title">Tabel</h3>
      </div>
      <div class="card-body">
        <button class="btn btn-primary btn-sm btn-flat" data-toggle="modal" data-target="#add_debt">Tambah</button>
        <br />
        <?= $this->session->flashdata("msg"); ?>
        <br />
        <table class="table table-bordered table-hover table-responsive" id="table">
          <thead>
            <tr>
             <th>No.</th>
             <th>Tanggal</th>
             <th>Debit</th>
             <th>Credit</th>
             <th>Catatan</th>
             <th>Nominal</th>
             </tr>
             </thead>
             <tbody>
             <?php $no = 1; foreach ($debt as $de): ?>
                <tr>
                  <td><?= $no++; ?></td>
                  <td><?= $de->debt_date; ?></td>
                  <td><?= $de->debit; ?></td>
                  <td><?= $de->credit; ?></td>
                 <td><?= $de->catatan_debt; ?></td>
                  <td><?= 'Rp. '. number_format($de->nominal_debt); ?></td>
                 </tr>
                 <?php endforeach; ?>
                  </tbody>
      </table>
    </div>
    <!-- /.card-footer-->
  </div>
  <!-- /.card -->

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<div class="modal fade" id="add_debt">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url("admin/add_debt") ?>" method="post">
        <div class="modal-body">
          <div class="form-group">
            <label for="addno_debt">No</label>
            <input type="number" class="form-control" name="debt_no" id="addno_debt" placeholder="Masukkan nomor hutang... ">
          </div>
          <div class="form-group">
            <label for="adddebt_date">Tanggal</label>
            <input type="date" class="form-control" name="debt_date" id="adddebt_date" placeholder="Masukkan tanggal hutang... ">
          </div>
          <div class="form-group">
            <label for="adddebit">Debit</label>
            <input type="text" class="form-control" name="debit" id="adddebit" placeholder="Masukkan jenis debit hutang... ">
          </div>
          <div class="form-group">
            <label for="addcredit">Credit</label>
            <input type="text" class="form-control" name="credit" id="addcredit" placeholder="Masukkan jenis credit hutang... ">
          </div>
          <div class="form-group">
            <label for="addcatatan_debt">Catatan</label>
            <input type="text" class="form-control" name="catatan_debt" id="addcatatan_debt" placeholder="Masukkan catatan hutang... ">
          </div>
          <div class="form-group">
            <label for="addnominal_debt">Nominal</label>
            <input type="number" class="form-control" name="nominal_debt" id="addnominal_debt" placeholder="Masukkan nominal hutang... ">
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
          <button type="submit" id="btneditdebt" class="btn btn-primary">Tambah</button> 
        </div>
      </form>
    </div>
  </div>
</div>
<!-- modal edit debt -->
<div class="modal fade" id="edidebt">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">Edit</h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<form action="<?= base_url('admin/editdebt') ?>" method="POST">
<div class="modal-body">
<input type="hidden" name="no_debt" id="no_debt">
<div class="form-group">
<label for="no_debt">Number</label>
<input type="number" class="form-control" name="no_debt" id="no_debt" placeholder="Masukkan nomor hutang..">
</div>
<div class="modal-footer justify-content-between">
<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
<button type="submit" id="btneditdebt" class="btn btn-primary">Ubah</button>
</div>
</form>
</div>
<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
>>>>>>> 4ed98b9cb575693a2950deb96a516b0c718100ca
</div>