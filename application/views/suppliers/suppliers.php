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
          <h6 class="m-0 font-weight-bold "><?= $title ?></h6>
        </div>

        <form action="{{ url('COA') }}" method="get">
          <div class="form-group col-md-6 ml-2 mt-2">

            </select>
          </div>
        </form>



        <div class="card-body">
          <?= $this->session->flashdata("msg") ?>

          <a href="#" class="btn btn-primary ml-1 mt-3 mb-3" id="tambah"> <i class="fas fa-plus-circle me-1  " style="letter-spacing: 2px"></i> Tambah </a>
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <tr class="text-center">
                <th>No.</th>
                <th>Nama</th>
                <th>hp</th>
                <th>alamat</th>
                <th>Aksi</th>
              </tr>
              <?php
              $no = 1;

              ?>
              <?php foreach ($data as $d) : ?>
                <tr class="text-center">
                  <td><?= $no ?></td>
                  <td> <?= $d->name ?> </td>
                  <td> <?= $d->hp ?> </td>
                  <td> <?= $d->address ?> </td>
                  <td>
                    <a href="#" class="btn btn-warning" onclick="edit(<?= $d->id ?>)"> Edit</a>
                  </td>

                </tr>
                <?php
                $no++;

                ?>
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

<!-- modal add drug -->
<div class="modal fade" id="add-drug">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah Supplier</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('suppliers/insert') ?>" method="POST">
        <div class="modal-body">
          <div id="adddrugalert"></div>
          <div id="autofilldrug">
            <div class="form-group">
              <label for="addnama_obat">Nama Pemasok</label>
              <input type="text" class="form-control" name="nama" placeholder="Nama Pemasok... " required>
            </div>
            <div class="form-group">
              <label for="addnama_obat">No HP Pemasok</label>
              <input type="text" class="form-control" name="hp" id="hp" placeholder="No Telepon Pemasok... " required>
            </div>
            <div class="form-group">
              <label for="addnama_obat">Alamat Pemasok</label>
              <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat Pemasok... " required>
            </div>

          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
          <button type="submit" id="btnadddrug" class="btn btn-primary">Tambah</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<!-- modal edit drug -->
<div class="modal fade" id="editdrug">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <div class="modal-title">
          <h5>Edit Data</h5>
        </div>
      </div>
      <form action="<?= base_url('suppliers/update') ?>" method="POST">
        <div class="modal-body">
          <input type="text" class="form-control" name="id" id="edtid"  required hidden>
          <div class="form-group">
            <label for="addnama_obat">Nama Pemasok</label>
            <input type="text" class="form-control" name="nama" id="edtnama" placeholder="Nama Pemasok... " required>
          </div>
          <div class="form-group">
            <label for="addnama_obat">No HP Pemasok</label>
            <input type="text" class="form-control" name="hp" id="edthp" placeholder="No Telepon Pemasok... " required>
          </div>
          <div class="form-group">
            <label for="addnama_obat">Alamat Pemasok</label>
            <input type="text" class="form-control" name="alamat" id="edtalamat" placeholder="Alamat Pemasok... " required>
          </div>


        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary">Ubah</button>
        </div>
      </form>
    </div>
  </div>
</div>
<script>
  $(document).ready(() => {
    $('#tambah').click(function() {
      $('#add-drug').modal('show')
    })



  })

  function edit(id) {
    $.ajax({

      url: ' <?= base_url('suppliers/getsupplierById/') ?>' + id,
      type: 'GET',
      dataType: 'json',
      success: function(data) {
       
        $('#edtid').val(data[0].id)
        $('#edtnama').val(data[0].name)
        $('#edthp').val(data[0].hp)
        $('#edtalamat').val(data[0].address)

        $('#editdrug').modal('show')

      }
    })
  }
</script>