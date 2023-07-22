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
          <h6 class="m-0 font-weight-bold ">Data Obat</h6>
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
                <th>Kode</th>
                <th>Nama</th>
                <th>Satuan</th>
                <th>Stok</th>
                <th>Aksi</th>
              </tr>
              <?php
              $no = 1;

              ?>
              <?php foreach ($data as $d) : ?>
                <tr class="text-center">
                  <td><?= $no ?></td>
                  <td> <?= $d->kode_obat ?> </td>
                  <td> <?= $d->name ?> </td>
                  <td> <?= $d->satuan ?> </td>
                  <td> <?= $d->stock ?> </td>
                  <td>
                    <a href="#" class="btn btn-warning" onclick="edit(<?= $d->id_obat ?>)"> Edit</a>
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
        <h4 class="modal-title">Tambah Obat</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('obat/insert') ?>" method="POST">
        <div class="modal-body">
          <div class="form-group">
            <label for="addkode_obat">Kode Obat</label>
            <input type="text" class="form-control" name="kode_obat" id="addkode_obat" value="<?= $lastId; ?>" placeholder="Kode obat... " required readonly>
          </div>
          <div id="adddrugalert"></div>
          <div id="autofilldrug">
            <div class="form-group">
              <label for="addnama_obat">Nama Obat</label>
              <input type="text" class="form-control" name="nama_obat" id="addnama_obat" placeholder="Nama obat... " required>
            </div>
            <div class="form-group">
              <label for="addsatuan">Satuan</label>
              <select name="satuan" id="addsatuan" class="form-control" required>
                <option value="">-- SATUAN -- </option>
                <?php
                foreach ($satuan as $s) :
                ?>
                  <option value="<?= $s->id ?>"><?= $s->name ?></option>
                <?php endforeach; ?>
              </select>
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
      <form action="<?= base_url('obat/update') ?>" method="POST">
        <div class="modal-body">
          <input type="hidden" name="id_obat" id="edtid_obat">
          <div class="form-group">
            <label for="edtkode_obat">Kode Obat</label>
            <input type="text" class="form-control" name="kode_obat" id="edtkode_obat" placeholder="Kode obat... " required readonly>
          </div>
          <div class="form-group">
            <label for="edtnama_obat">Nama Obat</label>
            <input type="text" class="form-control" name="nama_obat" id="edtnama_obat" placeholder="Nama obat... " required>
          </div>


          <div class="form-group">
            <label for="edtsatuan">Satuan</label>
            <select name="satuan" id="edtsatuan" class="form-control" required>
              <option value="">-- SATUAN -- </option>
              <?php
              $satuan = $this->db->get("units")->result();
              foreach ($satuan as $s) :
              ?>
                <option value="<?= $s->id ?>"><?= $s->name ?></option>
              <?php endforeach; ?>
            </select>
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

      url: ' <?= base_url('obat/getDrugById/') ?>' + id,
      type: 'GET',
      dataType: 'json',
      success: function(data) {
       
        $('#edtid_obat').val(data[0].id)
        $('#edtkode_obat').val(data[0].kode_obat)
        $('#edtnama_obat').val(data[0].name)

        $('#editdrug').modal('show')

      }
    })
  }
</script>