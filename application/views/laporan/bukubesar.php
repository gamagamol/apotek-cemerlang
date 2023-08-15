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
                <div class="row">
                    <div class="col-md-3">
                        <input type="month" name="filter" id="filter" class="form-control ml-3 mt-2">
                    </div>
                </div>

                <div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                                <tr class="text-center">
                                    <th rowspan='3'>No.</th>
                                    <th rowspan='2'>Tanggal</th>
                                    <th rowspan='2'>Keterangan</th>
                                    <th rowspan='2'>ref</th>
                                    <th rowspan='2'>Debit</th>
                                    <th rowspan='2'>Kredit</th>
                                    <th colspan="2">Saldo</th>
                                </tr>

                                <tr class="text-center">

                                    <th>Debit</th>
                                    <th>Kredit</th>
                                </tr>

                                <tbody id="tbodyPenjualan">

                                </tbody>



                            </table>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                                <tr class="text-center">
                                    <th rowspan='3'>No.</th>
                                    <th rowspan='2'>Tanggal</th>
                                    <th rowspan='2'>Keterangan</th>
                                    <th rowspan='2'>ref</th>
                                    <th rowspan='2'>Debit</th>
                                    <th rowspan='2'>Kredit</th>
                                    <th colspan="2">Saldo</th>
                                </tr>

                                <tr class="text-center">

                                    <th>Debit</th>
                                    <th>Kredit</th>
                                </tr>

                                <tbody id="tbodyPembelian">

                                </tbody>



                            </table>
                        </div>
                    </div>



                </div>

            </div>
        </div>
</div>
</div>
<!-- /.card -->

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script>
    let base_url = '<?= base_url() ?>'
    let module = 'jurnal'
    $(document).ready(function() {
        $('#filter').change(function() {
            tgl = $(this).val()

            $.ajax({

                url: `${base_url}jurnal/buku_besarAjax/${tgl}`,
                type: 'GET',

                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    html = ''
                    total_kredit = 0;
                    total_debit = 0;
                    saldo_awal = (data.saldo_awal.penjualan[0].saldo_awal) ? parseInt(data.saldo_awal.penjualan[0].saldo_awal) : 0
                    html += ` <tr>
                                <td> - </td>
                                <td>Saldo awal</td>
                                <td>Penjualan</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>${saldo_awal}</td>
                                 </tr>`

                    data.data.penjualan.map((d, i) => {
                        html += `<tr>
                                     <td> ${i+1} </td>
                                     <td> ${d.tgl_jurnal} </td>
                                     <td> ${d.nama_coa} </td>
                                     <td></td>`

                        if (d.posisi_dr_cr == 'debet') {
                            html += ` 
                                <td></td>
                                <td></td>
                                <td> ${d.nominal} </td>
                             `
                            total_debit += parseInt(d.nominal) + saldo_awal
                        } else {
                            html += ` 
                                <td></td>
                                
                                <td> ${d.nominal} </td>
                                <td></td>
                                  <td>${ parseInt( d.nominal) + saldo_awal} </td>`
                            total_kredit += parseInt(d.nominal) + saldo_awal
                        }
                    })
                    html += `</tr>`

                    html += `<tr>
                                 <td colspan="6" class="text-center">Total</td>
                                 <td> ${total_debit }</td>
                                 <td> ${total_kredit}</td>
                            </tr> `


                    html_pembelian = ''
                    total_kredit_pembelian = 0;
                    total_debit_pembelian = 0;
                    saldo_awal_pembelian = (data.saldo_awal.pembelian[0].saldo_awal) ? parseInt(data.saldo_awal.pembelian[0].saldo_awal) : 0
                    html += ` <tr>
                                <td> - </td>
                                <td>Saldo awal</td>
                                <td>Pembelian</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>${saldo_awal}</td>
                                 </tr>`

                    data.data.pembelian.map((d, i) => {
                        html += `<tr>
                                     <td> ${i+1} </td>
                                     <td> ${d.tgl_jurnal} </td>
                                     <td> ${d.nama_coa} </td>
                                     <td></td>`

                        if (d.posisi_dr_cr == 'debet') {
                            html += ` 
                                <td></td>
                                <td></td>
                                <td> ${d.nominal} </td>
                             `
                            total_debit += parseInt(d.nominal) + saldo_awal_pembelian
                        } else {
                            html += ` 
                                <td></td>
                                
                                <td> ${d.nominal} </td>
                                <td></td>
                                  <td>${ parseInt( d.nominal) + saldo_awal} </td>`
                            total_kredit += parseInt(d.nominal) + saldo_awal
                        }
                    })
                    html += `</tr>`

                    html += `<tr>
                                 <td colspan="6" class="text-center">Total</td>
                                 <td> ${total_debit_pembelian }</td>
                                 <td> ${total_kredit_pembelian}</td>
                            </tr> `



                    

                    $('#tbodyPenjualan').html(html)


                    $('#tbodyPembelian').html(html_pembelian)





                }
            })

        })
    })
</script>