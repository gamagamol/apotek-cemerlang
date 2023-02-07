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
          <h1>Piutang</h1>
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
        <button class="btn btn-primary btn-sm btn-flat" data-toggle="modal" data-target="#addreceivable">Tambah</button>
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
             <?php $no = 1; foreach ($receivable as $re): ?>
                <tr>
                  <td><?= $no++; ?></td>
                  <td><?= $re->re_date; ?></td>
                  <td><?= $re->debit; ?></td>
                  <td><?= $re->credit; ?></td>
                 <td><?= $re->catatan; ?></td>
                  <td><?= 'Rp. '. number_format($re->nominal); ?></td>
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

<div class="modal fade" id="addreceivable">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url("admin/addreceivable") ?>" method="post">
        <div class="modal-body">
          <div class="form-group">
            <label for="addno_re">No</label>
            <input type="number" class="form-control" name="no_re" id="addno_re" placeholder="Masukkan nomor piutang... ">
          </div>
          <div class="form-group">
            <label for="addre_date">Tanggal</label>
            <input type="date" class="form-control" name="re_date" id="addre_date" placeholder="Masukkan tanggal piutang... ">
          </div>
          <div class="form-group">
            <label for="adddebit">Debit</label>
            <input type="text" class="form-control" name="debit" id="adddebit" placeholder="Masukkan jenis debit piutang... ">
          </div>
          <div class="form-group">
            <label for="addcredit">Credit</label>
            <input type="text" class="form-control" name="credit" id="addcredit" placeholder="Masukkan jenis credit piutang... ">
          </div>
          <div class="form-group">
            <label for="addcatatan">Catatan</label>
            <input type="text" class="form-control" name="catatan" id="addcatatan" placeholder="Masukkan catatan piutang... ">
          </div>
          <div class="form-group">
            <label for="addnominal">Nominal</label>
            <input type="number" class="form-control" name="nominal" id="addnominal" placeholder="Masukkan nominal piutang... ">
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
          <button type="submit" id="btneditreceivable" class="btn btn-primary">Tambah</button> 
        </div>
      </form>
    </div>
  </div>
</div>
<!-- modal edit receivable -->
<div class="modal fade" id="editreceivable">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">Edit</h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<form action="<?= base_url('admin/editreceivable') ?>" method="POST">
<div class="modal-body">
<input type="hidden" name="no_re" id="no_re">
<div class="form-group">
<label for="no_re">Number</label>
<input type="number" class="form-control" name="no_re" id="no_re" placeholder="Masukkan nomor piutang..">
</div>
<div class="modal-footer justify-content-between">
<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
<button type="submit" id="btneditreceivable" class="btn btn-primary">Ubah</button>
</div>
</form>
</div>
<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
</div>