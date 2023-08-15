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
          <table class="table table-bordered text-center">
        </div>
        <div class="col-md-3">
          <input type="month" name="date" id="date" class="form-control">
        </div>
        <div class="row mb-3">
          <div class="col text-center">
            <h1>Neraca Saldo</h1>
            <h3>Apotek Cemerlang</h3>
            <h5>Periode:<?= date('M-Y') ?></h5>
          </div>
        </div>



        <tr>
          <td> Kode Akun</td>
          <td> Nama Akun</td>
          <td>Debet</td>
          <td>Kredit</td>
        </tr>


        <tbody id="tbody">

        </tbody>

        </table>



      </div>
    </div>
</div>
<!-- /.card -->

</section>
<!-- /.content -->
</div>


<script>
  $(document).ready(function() {
    $('#date').change(function() {
      let base_url = '<?= base_url() ?>'
      let tgl = $(this).val()

      $.ajax({
        url: `${base_url}jurnal/neracaSaldoAjax/${tgl}`,
        type: 'GET',
        dataType: 'json',
        success: function(data) {

          html = ''
          data.map((d) => {
            html += `  <tr>`
            html += `<td>${d.kode_coa}</td>`
            html += `<td>${d.nama_coa}</td>`
            if (d.kode_coa == 401) {

              html += `<td></td>`
              html += `<td>${d.total}</td>`
            } else if (d.kode_coa == 500) {

              html += `<td></td>`
              html += `<td>${d.total}</td>`
            } else if (d.kode_coa == 101) {

              html += `<td></td>`
              html += `<td>${d.total}</td>`
            } else if (d.kode_coa == 501) {

              html += `<td></td>`
              html += `<td>${d.total}</td>`
            } else if (d.kode_coa == 510) {


              html += `<td>${d.total}</td>`
              html += `<td></td>`
            }
            html += `  </tr>`
          })


          $('#tbody').html(html)
        }
      })
    })
  })
</script>