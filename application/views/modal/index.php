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
                    <h6 class="m-0 font-weight-bold ">Data Modal</h6>
                </div>

                <form action="{{ url('COA') }}" method="get">
                    <div class="form-group col-md-6 ml-2 mt-2">
                        <select name="cari" id="" class="form-control">

                        </select>
                    </div>
                    <button type=submit name=submit class="btn btn-primary ml-4">submit</button>
                </form>



                <div class="card-body">
                    <?= $this->session->flashdata("msg") ?>

                    <a href="#" class="btn btn-primary ml-1 mt-3 mb-3" id="tambah"> <i class="fas fa-plus-circle me-1  " style="letter-spacing: 2px"></i> Tambah </a>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <tr class="text-center">
                                <th>No.</th>
                                <th>No Nota</th>
                                <th>Tgl Transaksi</th>
                                <th>Nama modal</th>
                                <th>Total modal</th>
                            </tr>
                            <?php
                            $no = 1;

                            ?>
                            <?php foreach ($data as $d) : ?>
                                <tr class="text-center">
                                    <td><?= $no ?></td>
                                    <td> <?= $d->nota_num ?> </td>
                                    <td> <?= $d->date ?> </td>
                                    <td> <?= $d->nama_modal ?> </td>
                                    <td><?= 'Rp' . number_format($d->total) ?></td>


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

<!-- modal add modal -->
<div class="modal fade" id="add">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah modal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('modal/insert') ?>" method="POST">
                <div class="modal-body">


                    <div>
                        <div class="form-group">
                            <label for="addnama_modal">No Nota</label>
                            <input type="text" class="form-control" name="nota_num" value="<?= $no_nota ?>" readonly required>
                        </div>

                    </div>
                    <div>
                        <div class="form-group">
                            <label for="addnama_modal">Tanggal Transaksi</label>
                            <input type="date" class="form-control" name="date" required>
                        </div>

                    </div>
                    <div>
                        <div class="form-group">
                            <label for="addnama_modal">Jenis modal</label>
                            <select name="nama_modal" id="nama_modal" class="form-control">
                                <option value="bertambah">bertambah</option>
                                <option value="berkurang">berkurang</option>
                            </select>
                        </div>

                    </div>
                    <div>
                        <div class="form-group">
                            <label for="addnama_modal">Total modal</label>
                            <input type="int" class="form-control" name="total" required>
                        </div>

                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    <button type="submit" id="btnaddmodal" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<script>
    $(document).ready(function() {
        $('#tambah').click(function() {
            $('#add').modal('show')
        })
    })
</script>