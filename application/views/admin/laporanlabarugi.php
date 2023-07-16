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
          <h6 class="m-0 font-weight-bold ">Laba Rugi</h6>
        </div>





        <div class="card-body">
          <?= $this->session->flashdata("msg") ?>
          <table class="table table-bordered text-center">
            <tr>
              <td colspan='2'> Aktiva Lancar</td>
              <td colspan='2'> Ekuitas</td>
            </tr>
            <tr>
              <td>Persediaan</td>
              <td></td>
              <td>Modal Awal </td>
              <td></td>
            </tr>
            <tr>
              <td></td>
              <td></td>
              <td>Laba</td>
              <td>-</td>
            </tr>
          </table>


        </div>
      </div>
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->