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
                    <h6 class="m-0 font-weight-bold ">Data </h6>
                </div>

                <div class="card-body">
                    <!-- <form action="<?= base_url('beban/insert') ?>" method="POST"> -->
                    <div class="modal-body">

                        <div>
                            <div class="form-group">
                                <label for="addnama_obat">No Nota</label>
                                <input type="text" class="form-control" name="nota_num" id="nota_num" value="<?= $no_nota ?>" readonly required>
                            </div>

                        </div>
                        <div>
                            <div class="form-group">
                                <label for="addnama_obat">Tanggal Transaksi</label>
                                <input type="date" class="form-control" name="date" id="date" required>
                            </div>

                        </div>
                        <div>
                            <div class="form-group">
                                <label for="addsatuan">Nama Beban</label>
                                <input type="text" class="form-control" name="beban" id="beban" required>
                            </div>
                        </div>

                    </div>
                    <div>
                        <div class="form-group">
                            <label for="addnama_beban">Total Beban</label>
                            <input type="text" class="form-control" name="total" id="total" required>
                        </div>

                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" id="hitung">Tambah</button>
                </div>
                <!-- </form> -->
                <form action="<?= base_url('beban/insert') ?>" method="post">

                    <table class="table table-bordered" width='100%'>
                        <thead>
                            <tr>

                                <td>No Nota</td>
                                <td>Tgl Transaksi</td>
                                <td>Nama Beban</td>
                                <td>Total Beban</td>
                            </tr>
                        </thead>
                        <tbody id="tbody">

                        </tbody>
                        <tbody id="footer">

                        </tbody>
                    </table>

                    <div class="row">
                        <div class="col-md-3">
                            <button type="submit" id="btnadddrug" class="btn btn-primary" hidden>Submit</button>

                        </div>
                    </div>

                </form>

            </div>
        </div>
</div>
<!-- /.card -->

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->


<script>
    $('#harga').mask('000.000.000.000.000', {
        reverse: true
    });
    $('#jumlah').mask('000.000.000.000.000', {
        reverse: true
    });
    $('#total').mask('000.000.000.000.000', {
        reverse: true
    });
    $(document).ready(function() {
        let totalKesluruhan = 0
        $('#hitung').click(function() {
            $('#btnadddrug').removeAttr('hidden')

            let date = $('#date').val()
            let nota_num = $('#nota_num').val()
            let nama_beban = $('#beban').val()
            let total = $('#total').val().split('.')


            let total_beban = ''
            total.map((h) => {
                total_beban += h
            })



            html = ``

            html += '<tr>'


            html += `
                    <td >
                    <input type="text" class="form-control" name="nota_num[]" id='arr_nota_num' required value='${nota_num}' readonly >
                    </td>
                    
                     `
            html += `
                <td>
                <input type="date" class="form-control" name="date[]" id='arr_date' required value='${date}' readonly>
                </td>
                
                `
            html += `
                <td>
                <input type="text" class="form-control" name="nama_beban[]" id='arr_nama_beban'required value='${nama_beban}' >
                
                </td>
                
                `


            html += `
                <td>

                <input type="text" class="form-control" name="total[]" id='arr_total' required value='${total_beban}' required>
                </td>
                
                `

            html += '</tr>'
            totalKesluruhan += parseInt(total_beban)

            html1 = `<tr>
                        <td colspan='3' class='text-center'>Total</td>
                        <td>${totalKesluruhan}</td>
                        </tr>`


            $('#tbody').append(html)
            $('#footer').html(html1)

        })
    })
</script>