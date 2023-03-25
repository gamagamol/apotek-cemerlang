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
          <h1>Modal</h1>
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
        <button class="btn btn-primary btn-sm btn-flat" data-toggle="modal" data-target="#addcapital">Tambah</button>
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
             <?php $no = 1; foreach ($capital as $cap): ?>
                <tr>
                  <td><?= $no++; ?></td>
                  <td><?= $cap->date; ?></td>
                  <td><?= $cap->debit; ?></td>
                  <td><?= $cap->credit; ?></td>
                 <td><?= $cap->catatan; ?></td>
                  <td><?= 'Rp. '. number_format($cap->nominal); ?></td>
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

<div class="modal fade" id="addcapital">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url("admin/addcapital") ?>" method="post">
        <div class="modal-body">
          <div class="form-group">
            <label for="addno_cap">No</label>
            <input type="number" class="form-control" name="no_cap" id="addno_cap" placeholder="Masukkan nomor modal... ">
          </div>
          <div class="form-group">
            <label for="adddate">Tanggal</label>
            <input type="date" class="form-control" name="date" id="adddate" placeholder="Masukkan tanggal modal... ">
          </div>
          <div class="form-group">
            <label for="adddebit">Debit</label>
            <input type="text" class="form-control" name="debit" id="adddebit" placeholder="Masukkan jenis debit modal... ">
          </div>
          <div class="form-group">
            <label for="addcredit">Credit</label>
            <input type="text" class="form-control" name="credit" id="addcredit" placeholder="Masukkan jenis credit modal... ">
          </div>
          <div class="form-group">
            <label for="addcatatan">Catatan</label>
            <input type="text" class="form-control" name="catatan" id="addcatatan" placeholder="Masukkan catatan modal... ">
          </div>
          <div class="form-group">
            <label for="addnominal">Nominal</label>
            <input type="number" class="form-control" name="nominal" id="addnominal" placeholder="Masukkan nominal modal... ">
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
          <button type="submit" id="btneditcapital" class="btn btn-primary">Tambah</button> 
        </div>
      </form>
    </div>
  </div>
</div>
<!-- modal edit capital -->
<div class="modal fade" id="editcapital">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">Edit</h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<form action="<?= base_url('admin/editcapital') ?>" method="POST">
<div class="modal-body">
<input type="hidden" name="no_cap" id="no_cap">
<div class="form-group">
<label for="no_cap">Number</label>
<input type="number" class="form-control" name="no_cap" id="no_cap" placeholder="Masukkan nomor modal..">
</div>
<div class="modal-footer justify-content-between">
<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
<button type="submit" id="btneditcapital" class="btn btn-primary">Ubah</button>
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
          <h1>Modal</h1>
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
        <button class="btn btn-primary btn-sm btn-flat" data-toggle="modal" data-target="#addcapital">Tambah</button>
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
             <?php $no = 1; foreach ($capital as $cap): ?>
                <tr>
                  <td><?= $no++; ?></td>
                  <td><?= $cap->date; ?></td>
                  <td><?= $cap->debit; ?></td>
                  <td><?= $cap->credit; ?></td>
                 <td><?= $cap->catatan; ?></td>
                  <td><?= 'Rp. '. number_format($cap->nominal); ?></td>
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

<div class="modal fade" id="addcapital">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url("admin/addcapital") ?>" method="post">
        <div class="modal-body">
          <div class="form-group">
            <label for="addno_cap">No</label>
            <input type="number" class="form-control" name="no_cap" id="addno_cap" placeholder="Masukkan nomor modal... ">
          </div>
          <div class="form-group">
            <label for="adddate">Tanggal</label>
            <input type="date" class="form-control" name="date" id="adddate" placeholder="Masukkan tanggal modal... ">
          </div>
          <div class="form-group">
            <label for="adddebit">Debit</label>
            <input type="text" class="form-control" name="debit" id="adddebit" placeholder="Masukkan jenis debit modal... ">
          </div>
          <div class="form-group">
            <label for="addcredit">Credit</label>
            <input type="text" class="form-control" name="credit" id="addcredit" placeholder="Masukkan jenis credit modal... ">
          </div>
          <div class="form-group">
            <label for="addcatatan">Catatan</label>
            <input type="text" class="form-control" name="catatan" id="addcatatan" placeholder="Masukkan catatan modal... ">
          </div>
          <div class="form-group">
            <label for="addnominal">Nominal</label>
            <input type="number" class="form-control" name="nominal" id="addnominal" placeholder="Masukkan nominal modal... ">
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
          <button type="submit" id="btneditcapital" class="btn btn-primary">Tambah</button> 
        </div>
      </form>
    </div>
  </div>
</div>
<!-- modal edit capital -->
<div class="modal fade" id="editcapital">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">Edit</h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<form action="<?= base_url('admin/editcapital') ?>" method="POST">
<div class="modal-body">
<input type="hidden" name="no_cap" id="no_cap">
<div class="form-group">
<label for="no_cap">Number</label>
<input type="number" class="form-control" name="no_cap" id="no_cap" placeholder="Masukkan nomor modal..">
</div>
<div class="modal-footer justify-content-between">
<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
<button type="submit" id="btneditcapital" class="btn btn-primary">Ubah</button>
</div>
</form>
</div>
<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
>>>>>>> 4ed98b9cb575693a2950deb96a516b0c718100ca
</div>