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

                                <tbody id="tbodyKas">

                                </tbody>



                            </table>
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

                                    <tbody id="tbodyPersediaan_Obat">

                                    </tbody>



                                </table>
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

                                        <tbody id="tbodyModal">

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

                                        <tbody id="tbodyRetur_Pembelian">

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

                                        <tbody id="tbodyHPP">

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

                                        <tbody id="tbodyBeban_Gaji">

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

                                        <tbody id="tbodyBeban_Listrik_Telepon">

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

                                        <tbody id="tbodyBeban_Air">

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

                                        <tbody id="tbodyBeban_Perlengkapan">

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
<!-- 
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
                    htmlkas = ''
                    total_kredit_kas = 0;
                    total_debit_kas = 0;
                    saldo_awal_kas = (data.saldo_awal.kas[0].saldo_awal_kas) ? parseInt(data.saldo_awal.kas[0].saldo_awal_kas) : 0
                    html += ` <tr>
                                <td> - </td>
                                <td>Saldo awal</td>
                                <td>Kas</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>${saldo_awal_kas}</td>
                                 </tr>`

                    data.data.kas.map((d, i) => {
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
                            total_debit += parseInt(d.nominal) + saldo_awal_kas
                        } else {
                            html += ` 
                                <td></td>
                                
                                <td> ${d.nominal} </td>
                                <td></td>
                                  <td>${ parseInt( d.nominal) + _kas} </td>`
                            total_kredit += parseInt(d.nominal) + saldo_awal_kas
                        }
                    })
                    html += `</tr>`

                    html += `<tr>
                                 <td colspan="6" class="text-center">Total</td>
                                 <td> ${total_debit_kas }</td>
                                 <td> ${total_kredit_kas}</td>
                            </tr> `


                    htmlpersediaan_obat = ''
                    total_kredit_persediaan_obat = 0;
                    total_debit_persediaan_obat = 0;
                    saldo_awal_persediaan_obat = (data.saldo_awal.persediaan_obat[0].saldo_awal_persediaan_obat) ? parseInt(data.saldo_awal.persediaan_obat[0].saldo_awal_persediaan_obat) : 0
                    html += ` <tr>
                                <td> - </td>
                                <td>Saldo awal</td>
                                <td>Persediaan Obat</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>${saldo_awal_persediaan_obat}</td>
                                 </tr>`

                    data.data.persediaan_obat.map((d, i) => {
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
                            total_debit += parseInt(d.nominal) + saldo_awal_persediaan_obat
                        } else {
                            html += ` 
                                <td></td>
                                
                                <td> ${d.nominal} </td>
                                <td></td>
                                  <td>${ parseInt( d.nominal) + saldo_awal_persediaan_obat} </td>`
                            total_kredit += parseInt(d.nominal) + saldo_awal_persediaan_obat
                        }
                    })
                    html += `</tr>`

                    html += `<tr>
                                 <td colspan="6" class="text-center">Total</td>
                                 <td> ${total_debit_persediaan_obat }</td>
                                 <td> ${total_kredit_persediaan_obat}</td>
                            </tr> `

                    htmlmodal = ''
                    total_kredit_modal = 0;
                    total_debit_modal = 0;
                    saldo_awal_modal = (data.saldo_awal.modal[0].saldo_awal_modal) ? parseInt(data.saldo_awal.modal[0].saldo_awal_modal) : 0
                    html += ` <tr>
                                <td> - </td>
                                <td>Saldo awal</td>
                                <td>Modal</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>${saldo_awal_modal}</td>
                                 </tr>`

                    data.data.modal.map((d, i) => {
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
                            total_debit += parseInt(d.nominal) + saldo_awal_modal
                        } else {
                            html += ` 
                                <td></td>
                                
                                <td> ${d.nominal} </td>
                                <td></td>
                                  <td>${ parseInt( d.nominal) + saldo_awal_modal} </td>`
                            total_kredit += parseInt(d.nominal) + saldo_awal_modal
                        }
                    })
                    html += `</tr>`

                    html += `<tr>
                                 <td colspan="6" class="text-center">Total</td>
                                 <td> ${total_debit_modal }</td>
                                 <td> ${total_kredit_modal}</td>
                            </tr> `


                    htmlpenjualan = ''
                    total_kredit_penjualan = 0;
                    total_debit_penjualan = 0;
                    saldo_awal_penjualan = (data.saldo_awal.penjualan[0].saldo_awal_penjualan) ? parseInt(data.saldo_awal.penjualan[0].saldo_awal_penjualan) : 0
                    html += ` <tr>
                                <td> - </td>
                                <td>Saldo awal</td>
                                <td>Penjualan</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>${saldo_awal_penjualan}</td>
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
                            total_debit += parseInt(d.nominal) + saldo_awal_penjualan
                        } else {
                            html += ` 
                                <td></td>
                                
                                <td> ${d.nominal} </td>
                                <td></td>
                                  <td>${ parseInt( d.nominal) + saldo_awal_penjualan} </td>`
                            total_kredit += parseInt(d.nominal) + saldo_awal_penjualan
                        }
                    })
                    html += `</tr>`

                    html += `<tr>
                                 <td colspan="6" class="text-center">Total</td>
                                 <td> ${total_debit_penjualan }</td>
                                 <td> ${total_kredit_penjualan}</td>
                            </tr> `


                    html_retur_pembelian = ''
                    total_kredit_retur_pembelian = 0;
                    total_debit_retur_pembelian = 0;
                    saldo_awal_retur_pembelian = (data.saldo_awal.retur_pembelian[0].saldo_awal_retur_pembelian) ? parseInt(data.saldo_awal.retur_pembelian[0].saldo_awal_retur_pembelian) : 0
                    html += ` <tr>
                                <td> - </td>
                                <td>Saldo awal</td>
                                <td>Retur Pembelian</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>${saldo_awal_retur_pembelian}</td>
                                 </tr>`

                    data.data.retur_pembelian.map((d, i) => {
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
                            total_debit += parseInt(d.nominal) + saldo_awal_retur_pembelian
                        } else {
                            html += ` 
                                <td></td>
                                
                                <td> ${d.nominal} </td>
                                <td></td>
                                  <td>${ parseInt( d.nominal) + saldo_awal_retur_pembelian} </td>`
                            total_kredit += parseInt(d.nominal) + saldo_awal_retur_pembelian
                        }
                    })
                    html += `</tr>`

                    html += `<tr>
                                 <td colspan="6" class="text-center">Total</td>
                                 <td> ${total_debit_retur_pembelian }</td>
                                 <td> ${total_kredit_retur_pembelian}</td>
                            </tr> `


                    html_hpp = ''
                    total_kredit_hpp = 0;
                    total_debit_hpp = 0;
                    saldo_awal_hpp = (data.saldo_awal.hpp[0].saldo_awal_hpp) ? parseInt(data.saldo_awal.hpp[0].saldo_awal_hpp) : 0
                    html += ` <tr>
                                <td> - </td>
                                <td>Saldo awal</td>
                                <td>HPP</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>${saldo_awal_hpp}</td>
                                 </tr>`

                    data.data.hpp.map((d, i) => {
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
                            total_debit += parseInt(d.nominal) + saldo_awal_hpp
                        } else {
                            html += ` 
                                <td></td>
                                
                                <td> ${d.nominal} </td>
                                <td></td>
                                  <td>${ parseInt( d.nominal) + saldo_awal_hpp} </td>`
                            total_kredit += parseInt(d.nominal) + saldo_awal_hpp
                        }
                    })
                    html += `</tr>`

                    html += `<tr>
                                 <td colspan="6" class="text-center">Total</td>
                                 <td> ${total_debit_hpp }</td>
                                 <td> ${total_kredit_hpp}</td>
                            </tr> `

                    html_beban_gaji = ''
                    total_kredit_beban_gaji = 0;
                    total_debit_beban_gaji = 0;
                    saldo_awal_beban_gaji = (data.saldo_awal.beban_gaji[0].saldo_awal_beban_gaji) ? parseInt(data.saldo_awal.beban_gaji[0].saldo_awal_beban_gaji) : 0
                    html += ` <tr>
                                <td> - </td>
                                <td>Saldo awal</td>
                                <td>Beban Gaji</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>${saldo_awal_beban_gaji}</td>
                                 </tr>`

                    data.data.beban_gaji.map((d, i) => {
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
                            total_debit += parseInt(d.nominal) + saldo_awal_beban_gaji
                        } else {
                            html += ` 
                                <td></td>
                                
                                <td> ${d.nominal} </td>
                                <td></td>
                                  <td>${ parseInt( d.nominal) + saldo_awal_beban_gaji} </td>`
                            total_kredit += parseInt(d.nominal) + saldo_awal_beban_gaji
                        }
                    })
                    html += `</tr>`

                    html += `<tr>
                                 <td colspan="6" class="text-center">Total</td>
                                 <td> ${total_debit_beban_gaji }</td>
                                 <td> ${total_kredit_beban_gaji}</td>
                            </tr> `


                            
                    html_beban_listrik_telepon = ''
                    total_kredit_beban_listrik_telepon = 0;
                    total_debit_beban_listrik_telepon = 0;
                    saldo_awal_beban_listrik_telepon = (data.saldo_awal.beban_listrik_telepon[0].saldo_awal_beban_listrik_telepon) ? parseInt(data.saldo_awal.beban_listrik_telepon[0].saldo_awal_beban_listrik_telepon) : 0
                    html += ` <tr>
                                <td> - </td>
                                <td>Saldo awal</td>
                                <td>Beban Listrik & Telepon</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>${saldo_awal_beban_listrik_telepon}</td>
                                 </tr>`

                    data.data.beban_listrik_telepon.map((d, i) => {
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
                            total_debit += parseInt(d.nominal) + saldo_awal_beban_listrik_telepon
                        } else {
                            html += ` 
                                <td></td>
                                
                                <td> ${d.nominal} </td>
                                <td></td>
                                  <td>${ parseInt( d.nominal) + saldo_awal_beban_listrik_telepon} </td>`
                            total_kredit += parseInt(d.nominal) + saldo_awal_beban_listrik_telepon
                        }
                    })
                    html += `</tr>`

                    html += `<tr>
                                 <td colspan="6" class="text-center">Total</td>
                                 <td> ${total_debit_beban_listrik_telepon }</td>
                                 <td> ${total_kredit_beban_listrik_telepon}</td>
                            </tr> `


                    html_beban_air = ''
                    total_kredit_beban_air = 0;
                    total_debit_beban_air = 0;
                    saldo_awal_beban_air = (data.saldo_awal.beban_air[0].saldo_awal_beban_air) ? parseInt(data.saldo_awal.beban_air[0].saldo_awal_beban_air) : 0
                    html += ` <tr>
                                <td> - </td>
                                <td>Saldo awal</td>
                                <td>Beban Air</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>${saldo_awal_beban_air}</td>
                                 </tr>`

                    data.data.beban_air.map((d, i) => {
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
                            total_debit += parseInt(d.nominal) + saldo_awal_beban_air
                        } else {
                            html += ` 
                                <td></td>
                                
                                <td> ${d.nominal} </td>
                                <td></td>
                                  <td>${ parseInt( d.nominal) + saldo_awal_beban_air} </td>`
                            total_kredit += parseInt(d.nominal) + saldo_awal_beban_air
                        }
                    })
                    html += `</tr>`

                    html += `<tr>
                                 <td colspan="6" class="text-center">Total</td>
                                 <td> ${total_debit_beban_air }</td>
                                 <td> ${total_kredit_beban_air}</td>
                            </tr> `

                    
                    html_beban_perlengkapan = ''
                    total_kredit_beban_perlengkapan = 0;
                    total_debit_beban_perlengkapan = 0;
                    saldo_awal_beban_perlengkapan = (data.saldo_awal.beban_perlengkapan[0].saldo_awal_beban_perlengkapan) ? parseInt(data.saldo_awal.beban_perlengkapan[0].saldo_awal_beban_perlengkapan) : 0
                    html += ` <tr>
                                <td> - </td>
                                <td>Saldo awal</td>
                                <td>Beban Perlengkapan</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>${saldo_awal_beban_perlengkapan}</td>
                                 </tr>`

                    data.data.beban_perlengkapan.map((d, i) => {
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
                            total_debit += parseInt(d.nominal) + saldo_awal_beban_perlengkapan
                        } else {
                            html += ` 
                                <td></td>
                                
                                <td> ${d.nominal} </td>
                                <td></td>
                                  <td>${ parseInt( d.nominal) + saldo_awal_beban_perlengkapan} </td>`
                            total_kredit += parseInt(d.nominal) + saldo_awal_beban_perlengkapan
                        }
                    })
                    html += `</tr>`

                    html += `<tr>
                                 <td colspan="6" class="text-center">Total</td>
                                 <td> ${total_debit_beban_perlengkapan }</td>
                                 <td> ${total_kredit_beban_perlengkapan}</td>
                            </tr> `        

                    
                    $('#tbodyKas').html(html_kas)

                    $('#tbodyPersediaan_Obat').html(html_persediaan_obat)

                    $('#tbodyModal').html(html_modal)

                    $('#tbodyPenjualan').html(htmlpenjualan)

                    $('#tbodyRetur_Pembelian').html(html_retur_pembelian)

                    $('#tbodyHPP').html(html_hpp)

                    $('#tbodyBeban_Gaji').html(html_beban_gaji)

                    $('#tbodyBeban_Listrik_Telepon').html(html_beban_listrik_telepon)

                    $('#tbodyBeban_Air').html(html_beban_air)

                    $('#tbodyBeban_Perlengkapan').html(html_beban_perlengkapan)

                }
            })

        })
    })
</script> -->

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


                    // bukbes penjualan
                    htmlpenjualan = ''
                    total_kredit_penjualan = 0;
                    total_debit_penjualan = 0;
                    saldo_awal_penjualan = (data.saldo_awal.penjualan[0].saldo_awal_penjualan) ? parseInt(data.saldo_awal.penjualan[0].saldo_awal_penjualan) : 0
                    htmlpenjualan += ` <tr>
                                <td> - </td>
                                <td>Saldo awal</td>
                                <td>Penjualan</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>${saldo_awal_penjualan}</td>
                                 </tr>`

                    data.data.penjualan.map((d, i) => {
                        htmlpenjualan += `<tr>
                                     <td> ${i+1} </td>
                                     <td> ${d.tgl_jurnal} </td>
                                     <td> ${d.nama_coa} </td>
                                     <td></td>`

                        if (d.posisi_dr_cr == 'debet') {
                            htmlpenjualan += ` 
                                <td></td>
                                <td></td>
                                <td> ${d.nominal} </td>
                             `
                            total_debit_penjualan += parseInt(d.nominal) + saldo_awal_penjualan
                        } else {
                            htmlpenjualan += ` 
                                <td></td>
                                
                                <td> ${d.nominal} </td>
                                <td></td>
                                  <td>${ parseInt( d.nominal) + saldo_awal_penjualan} </td>`
                            total_kredit_penjualan += parseInt(d.nominal) + saldo_awal_penjualan
                        }
                    })
                    htmlpenjualan += `</tr>`

                    htmlpenjualan += `<tr>
                                 <td colspan="6" class="text-center">Total</td>
                                 <td> ${total_debit_penjualan }</td>
                                 <td> ${total_kredit_penjualan}</td>
                            </tr> `


                    $('#tbodyPenjualan').html(htmlpenjualan)

                    // akhir penjualan

                    // buku KAS


                    if (data.data.kas != null) {


                        html_kas = ''
                        total_kredit_kas = 0;
                        total_debit_kas = 0;
                        total_kas = 0
                        saldo_awal_kas = (data.saldo_awal.kas[0].saldo_awal_kas) ? parseInt(data.saldo_awal.kas[0].saldo_awal_kas) : 0
                        html_kas += ` <tr>
                                <td> - </td>
                                <td>Saldo awal</td>
                                <td>kas</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>${saldo_awal_kas}</td>
                                <td></td>
                                 </tr>`

                        data.data.kas.map((d, i) => {
                            html_kas += `<tr>
                                     <td> ${i+1} </td>
                                     <td> ${d.tgl_jurnal} </td>
                                     <td> ${d.nama_coa} </td>
                                     <td></td>`


                            if (i == 0) {

                                if (d.posisi_dr_cr == 'debet') {
                                    html_kas += ` 
                                      <td> ${d.nominal} </td>
                                    <td></td>
                                    <td>${ parseInt( d.nominal) + saldo_awal_kas} </td>
                                    <td></td>
    
                                 `
                                    total_debit_kas += parseInt(d.nominal) + saldo_awal_kas
                                } else {
                                    html_kas += ` 
                                    <td></td>
                                    <td> ${d.nominal} </td>
                                    <td></td>
                                      <td>${ parseInt( d.nominal) + saldo_awal_kas} </td>`
                                    total_kredit_kas += parseInt(d.nominal) + saldo_awal_kas
                                }
                            } else {
                                if (d.posisi_dr_cr == 'debet') {
                                    html_kas += ` 
                                      <td> ${d.nominal} </td>
                                    <td></td>`
                                    total_kas += (parseInt(d.nominal) + saldo_awal_kas)

                                    if (total_kas > 0) {
                                        html_kas += `<td>${ total_kas} </td>
                                    <td></td>`

                                    } else {
                                        html_kas += `
                                        <td></td>
                                        <td>${ total_kas} </td>
                                    `

                                    }


                                    total_debit_kas += parseInt(d.nominal) + saldo_awal_kas
                                } else {

                                    total_kas -= parseInt(d.nominal)

                                    html_kas += ` 
                                    <td></td>
                                    <td> ${d.nominal} </td>`

                                    if (total_kas > 0) {
                                        html_kas += `<td>${ total_kas} </td>
                                    <td></td>`

                                    } else {
                                        html_kas += `
                                        <td></td>
                                        <td>${ total_kas} </td>
                                    `

                                    }

                                    total_kredit_kas += parseInt(d.nominal) + saldo_awal_kas
                                }
                            }
                        })
                        html_kas += `</tr>`

                        html_kas += `<tr>
                                 <td colspan="6" class="text-center">Total</td>
                                 <td> ${total_debit_kas }</td>
                                 <td> ${total_kredit_kas}</td>
                            </tr> `


                        $('#tbodyKas').html(html_kas)
                    }

                    // akhir KAS

                    // AWAL PEMBELIAN
                    if (data.data.hpp != null) {


                        html_hpp = ''
                        total_kredit_hpp = 0;
                        total_debit_hpp = 0;
                        // total_posisi=0
                        saldo_awal_hpp = (data.saldo_awal.hpp[0].saldo_awal_hpp) ? parseInt(data.saldo_awal.hpp[0].saldo_awal_hpp) : 0
                        html_hpp += ` <tr>
                                <td> - </td>
                                <td>Saldo awal</td>
                                <td>hpp</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>${saldo_awal_hpp}</td>
                                </tr>`

                        data.data.hpp.map((d, i) => {
                            html_hpp += `<tr>
                                    <td> ${i+1} </td>
                                    <td> ${d.tgl_jurnal} </td>
                                    <td> ${d.nama_coa} </td>
                                    <td></td>`

                            if (d.posisi_dr_cr == 'debet') {
                                console.log('masuk sini');
                                html_hpp += ` 
                            <td> ${d.nominal} </td>
                                <td></td>
                                <td>${ parseInt( d.nominal) + saldo_awal_hpp} </td>
                                <td></td>

                            `
                                total_debit_hpp += parseInt(d.nominal) + saldo_awal_hpp
                            } else {
                                html_hpp += ` 
                                <td></td>
                                
                                <td> ${d.nominal} </td>
                                <td></td>
                                <td>${ parseInt( d.nominal) + saldo_awal_hpp} </td>`
                                total_kredit_hpp += parseInt(d.nominal) + saldo_awal_hpp
                            }
                        })
                        html_hpp += `</tr>`

                        html_hpp += `<tr>
                                <td colspan="6" class="text-center">Total</td>
                                <td> ${total_debit_hpp }</td>
                                <td> ${total_kredit_hpp}</td>
                            </tr> `

                        console.log(html_hpp);

                        $('#tbodyHPP').html(html_hpp)
                    }
                    // AKHIR hpp

                    //awal persediaan
                    if (data.data.persediaan_obat != null) {


                        html_persediaan_obat = ''
                        total_kredit_persediaan_obat = 0;
                        total_debit_persediaan_obat = 0;
                        // total_posisi=0
                        saldo_awal_persediaan_obat = (data.saldo_awal.persediaan_obat[0].saldo_awal_persediaan_obat) ? parseInt(data.saldo_awal.persediaan_obat[0].saldo_awal_persediaan_obat) : 0
                        html_persediaan_obat += ` <tr>
                                <td> - </td>
                                <td>Saldo awal</td>
                                <td>persediaan_obat</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>${saldo_awal_persediaan_obat}</td>
                                </tr>`

                        data.data.persediaan_obat.map((d, i) => {
                            html_persediaan_obat += `<tr>
                                    <td> ${i+1} </td>
                                    <td> ${d.tgl_jurnal} </td>
                                    <td> ${d.nama_coa} </td>
                                    <td></td>`

                            if (d.posisi_dr_cr == 'debet') {
                                console.log('masuk sini');
                                html_persediaan_obat += ` 
                            <td> ${d.nominal} </td>
                                <td></td>
                                <td>${ parseInt( d.nominal) + saldo_awal_persediaan_obat} </td>
                                <td></td>

                            `
                                total_debit_persediaan_obat += parseInt(d.nominal) + saldo_awal_persediaan_obat
                            } else {
                                html_persediaan_obat += ` 
                                <td></td>
                                
                                <td> ${d.nominal} </td>
                                <td></td>
                                <td>${ parseInt( d.nominal) + saldo_awal_persediaan_obat} </td>`
                                total_kredit_persediaan_obat += parseInt(d.nominal) + saldo_awal_persediaan_obat
                            }
                        })
                        html_persediaan_obat += `</tr>`

                        html_persediaan_obat += `<tr>
                                <td colspan="6" class="text-center">Total</td>
                                <td> ${total_debit_persediaan_obat }</td>
                                <td> ${total_kredit_persediaan_obat}</td>
                            </tr> `

                        console.log(html_persediaan_obat);

                        $('#tbodyPersediaan_Obat').html(html_persediaan_obat)


                    }

                         // buku modal


                         if (data.data.modal != null) {


                        html_modal = ''
                        total_kredit_modal = 0;
                        total_debit_modal = 0;
                        total_modal = 0
                        saldo_awal_modal = (data.saldo_awal.modal[0].saldo_awal_modal) ? parseInt(data.saldo_awal.modal[0].saldo_awal_modal) : 0
                        html_modal += ` <tr>
                                <td> - </td>
                                <td>Saldo awal</td>
                                <td>modal</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>${saldo_awal_modal}</td>
                                <td></td>
                                </tr>`

                        data.data.modal.map((d, i) => {
                            html_modal += `<tr>
                                    <td> ${i+1} </td>
                                    <td> ${d.tgl_jurnal} </td>
                                    <td> ${d.nama_coa} </td>
                                    <td></td>`


                            if (i == 0) {

                                if (d.posisi_dr_cr == 'debet') {
                                    html_modal += ` 
                                    <td> ${d.nominal} </td>
                                    <td></td>
                                    <td>${ parseInt( d.nominal) + saldo_awal_modal} </td>
                                    <td></td>

                                `
                                    total_debit_modal += parseInt(d.nominal) + saldo_awal_modal
                                } else {
                                    html_modal += ` 
                                    <td></td>
                                    <td> ${d.nominal} </td>
                                    <td></td>
                                    <td>${ parseInt( d.nominal) + saldo_awal_modal} </td>`
                                    total_kredit_modal += parseInt(d.nominal) + saldo_awal_modal
                                }
                            } else {
                                if (d.posisi_dr_cr == 'debet') {
                                    html_modal += ` 
                                    <td> ${d.nominal} </td>
                                    <td></td>`
                                    total_modal += (parseInt(d.nominal) + saldo_awal_modal)

                                    if (total_modal > 0) {
                                        html_modal += `<td>${ total_modal} </td>
                                    <td></td>`

                                    } else {
                                        html_modal += `
                                        <td></td>
                                        <td>${ total_modal} </td>
                                    `

                                    }


                                    total_debit_modal += parseInt(d.nominal) + saldo_awal_modal
                                } else {

                                    total_modal -= parseInt(d.nominal)

                                    html_modal += ` 
                                    <td></td>
                                    <td> ${d.nominal} </td>`

                                    if (total_modal > 0) {
                                        html_modal += `<td>${ total_modal} </td>
                                    <td></td>`

                                    } else {
                                        html_modal += `
                                        <td></td>
                                        <td>${ total_modal} </td>
                                    `

                                    }

                                    total_kredit_modal += parseInt(d.nominal) + saldo_awal_modal
                                }
                            }
                        })
                        html_modal += `</tr>`

                        html_modal += `<tr>
                                <td colspan="6" class="text-center">Total</td>
                                <td> ${total_debit_modal }</td>
                                <td> ${total_kredit_modal}</td>
                            </tr> `


                        $('#tbodyModal').html(html_modal)
                        }

                        // akhir modal


                        // buku retur


                        if (data.data.retur_pembelian != null) {


                        html_retur_pembelian = ''
                        total_kredit_retur_pembelian = 0;
                        total_debit_retur_pembelian = 0;
                        total_retur_pembelian = 0
                        saldo_awal_retur_pembelian = (data.saldo_awal.retur_pembelian[0].saldo_awal_retur_pembelian) ? parseInt(data.saldo_awal.retur_pembelian[0].saldo_awal_retur_pembelian) : 0
                        html_retur_pembelian += ` <tr>
                                <td> - </td>
                                <td>Saldo awal</td>
                                <td>retur_pembelian</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>${saldo_awal_retur_pembelian}</td>
                                <td></td>
                                </tr>`

                        data.data.retur_pembelian.map((d, i) => {
                            html_retur_pembelian += `<tr>
                                    <td> ${i+1} </td>
                                    <td> ${d.tgl_jurnal} </td>
                                    <td> ${d.nama_coa} </td>
                                    <td></td>`


                            if (i == 0) {

                                if (d.posisi_dr_cr == 'debet') {
                                    html_retur_pembelian += ` 
                                    <td> ${d.nominal} </td>
                                    <td></td>
                                    <td>${ parseInt( d.nominal) + saldo_awal_retur_pembelian} </td>
                                    <td></td>

                                `
                                    total_debit_retur_pembelian += parseInt(d.nominal) + saldo_awal_retur_pembelian
                                } else {
                                    html_retur_pembelian += ` 
                                    <td></td>
                                    <td> ${d.nominal} </td>
                                    <td></td>
                                    <td>${ parseInt( d.nominal) + saldo_awal_retur_pembelian} </td>`
                                    total_kredit_retur_pembelian += parseInt(d.nominal) + saldo_awal_retur_pembelian
                                }
                            } else {
                                if (d.posisi_dr_cr == 'debet') {
                                    html_retur_pembelian += ` 
                                    <td> ${d.nominal} </td>
                                    <td></td>`
                                    total_retur_pembelian += (parseInt(d.nominal) + saldo_awal_retur_pembelian)

                                    if (total_retur_pembelian > 0) {
                                        html_retur_pembelian += `<td>${ total_retur_pembelian} </td>
                                    <td></td>`

                                    } else {
                                        html_retur_pembelian += `
                                        <td></td>
                                        <td>${ total_retur_pembelian} </td>
                                    `

                                    }


                                    total_debit_retur_pembelian += parseInt(d.nominal) + saldo_awal_retur_pembelian
                                } else {

                                    total_retur_pembelian -= parseInt(d.nominal)

                                    html_retur_pembelian += ` 
                                    <td></td>
                                    <td> ${d.nominal} </td>`

                                    if (total_retur_pembelian > 0) {
                                        html_retur_pembelian += `<td>${ total_retur_pembelian} </td>
                                    <td></td>`

                                    } else {
                                        html_retur_pembelian += `
                                        <td></td>
                                        <td>${ total_retur_pembelian} </td>
                                    `

                                    }

                                    total_kredit_retur_pembelian += parseInt(d.nominal) + saldo_awal_retur_pembelian
                                }
                            }
                        })
                        html_retur_pembelian += `</tr>`

                        html_retur_pembelian += `<tr>
                                <td colspan="6" class="text-center">Total</td>
                                <td> ${total_debit_retur_pembelian }</td>
                                <td> ${total_kredit_retur_pembelian}</td>
                            </tr> `


                        $('#tbodyRetur_Pembelian').html(html_retur_pembelian)
                        }

                        // akhir retur_pembelian

                        
                        // buku beban gaji


                        if (data.data.beban_gaji != null) {


                        html_beban_gaji = ''
                        total_kredit_beban_gaji = 0;
                        total_debit_beban_gaji = 0;
                        total_beban_gaji = 0
                        saldo_awal_beban_gaji = (data.saldo_awal.beban_gaji[0].saldo_awal_beban_gaji) ? parseInt(data.saldo_awal.beban_gaji[0].saldo_awal_beban_gaji) : 0
                        html_beban_gaji += ` <tr>
                                <td> - </td>
                                <td>Saldo awal</td>
                                <td>beban_gaji</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>${saldo_awal_beban_gaji}</td>
                                <td></td>
                                </tr>`

                        data.data.beban_gaji.map((d, i) => {
                            html_beban_gaji += `<tr>
                                    <td> ${i+1} </td>
                                    <td> ${d.tgl_jurnal} </td>
                                    <td> ${d.nama_coa} </td>
                                    <td></td>`


                            if (i == 0) {

                                if (d.posisi_dr_cr == 'debet') {
                                    html_beban_gaji += ` 
                                    <td> ${d.nominal} </td>
                                    <td></td>
                                    <td>${ parseInt( d.nominal) + saldo_awal_beban_gaji} </td>
                                    <td></td>

                                `
                                    total_debit_beban_gaji += parseInt(d.nominal) + saldo_awal_beban_gaji
                                } else {
                                    html_beban_gaji += ` 
                                    <td></td>
                                    <td> ${d.nominal} </td>
                                    <td></td>
                                    <td>${ parseInt( d.nominal) + saldo_awal_beban_gaji} </td>`
                                    total_kredit_beban_gaji += parseInt(d.nominal) + saldo_awal_beban_gaji
                                }
                            } else {
                                if (d.posisi_dr_cr == 'debet') {
                                    html_beban_gaji += ` 
                                    <td> ${d.nominal} </td>
                                    <td></td>`
                                    total_beban_gaji += (parseInt(d.nominal) + saldo_awal_beban_gaji)

                                    if (total_beban_gaji > 0) {
                                        html_beban_gaji += `<td>${ total_beban_gaji} </td>
                                    <td></td>`

                                    } else {
                                        html_beban_gaji += `
                                        <td></td>
                                        <td>${ total_beban_gaji} </td>
                                    `

                                    }


                                    total_debit_beban_gaji += parseInt(d.nominal) + saldo_awal_beban_gaji
                                } else {

                                    total_beban_gaji -= parseInt(d.nominal)

                                    html_beban_gaji += ` 
                                    <td></td>
                                    <td> ${d.nominal} </td>`

                                    if (total_beban_gaji > 0) {
                                        html_beban_gaji += `<td>${ total_beban_gaji} </td>
                                    <td></td>`

                                    } else {
                                        html_beban_gaji += `
                                        <td></td>
                                        <td>${ total_beban_gaji} </td>
                                    `

                                    }

                                    total_kredit_beban_gaji += parseInt(d.nominal) + saldo_awal_beban_gaji
                                }
                            }
                        })
                        html_beban_gaji += `</tr>`

                        html_beban_gaji += `<tr>
                                <td colspan="6" class="text-center">Total</td>
                                <td> ${total_debit_beban_gaji }</td>
                                <td> ${total_kredit_beban_gaji}</td>
                            </tr> `


                        $('#tbodyBeban_Gaji').html(html_beban_gaji)
                        }

                        // akhir Beban_Gaji

                           // buku beban LISTRIK


                           if (data.data.beban_listrik != null) {


                            html_beban_listrik = ''
                            total_kredit_beban_listrik = 0;
                            total_debit_beban_listrik = 0;
                            total_beban_listrik = 0
                            saldo_awal_beban_listrik = (data.saldo_awal.beban_listrik[0].saldo_awal_beban_listrik) ? parseInt(data.saldo_awal.beban_listrik[0].saldo_awal_beban_listrik) : 0
                            html_beban_listrik += ` <tr>
                                    <td> - </td>
                                    <td>Saldo awal</td>
                                    <td>beban_listrik</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>${saldo_awal_beban_listrik}</td>
                                    <td></td>
                                    </tr>`

                            data.data.beban_listrik.map((d, i) => {
                                html_beban_listrik += `<tr>
                                        <td> ${i+1} </td>
                                        <td> ${d.tgl_jurnal} </td>
                                        <td> ${d.nama_coa} </td>
                                        <td></td>`


                                if (i == 0) {

                                    if (d.posisi_dr_cr == 'debet') {
                                        html_beban_listrik += ` 
                                        <td> ${d.nominal} </td>
                                        <td></td>
                                        <td>${ parseInt( d.nominal) + saldo_awal_beban_listrik} </td>
                                        <td></td>

                                    `
                                        total_debit_beban_listrik += parseInt(d.nominal) + saldo_awal_beban_listrik
                                    } else {
                                        html_beban_listrik += ` 
                                        <td></td>
                                        <td> ${d.nominal} </td>
                                        <td></td>
                                        <td>${ parseInt( d.nominal) + saldo_awal_beban_listrik} </td>`
                                        total_kredit_beban_listrik += parseInt(d.nominal) + saldo_awal_beban_listrik
                                    }
                                } else {
                                    if (d.posisi_dr_cr == 'debet') {
                                        html_beban_listrik += ` 
                                        <td> ${d.nominal} </td>
                                        <td></td>`
                                        total_beban_listrik += (parseInt(d.nominal) + saldo_awal_beban_listrik)

                                        if (total_beban_listrik > 0) {
                                            html_beban_listrik += `<td>${ total_beban_listrik} </td>
                                        <td></td>`

                                        } else {
                                            html_beban_listrik += `
                                            <td></td>
                                            <td>${ total_beban_listrik} </td>
                                        `

                                        }


                                        total_debit_beban_listrik += parseInt(d.nominal) + saldo_awal_beban_listrik
                                    } else {

                                        total_beban_listrik -= parseInt(d.nominal)

                                        html_beban_listrik += ` 
                                        <td></td>
                                        <td> ${d.nominal} </td>`

                                        if (total_beban_listrik > 0) {
                                            html_beban_listrik += `<td>${ total_beban_listrik} </td>
                                        <td></td>`

                                        } else {
                                            html_beban_listrik += `
                                            <td></td>
                                            <td>${ total_beban_listrik} </td>
                                        `

                                        }

                                        total_kredit_beban_listrik += parseInt(d.nominal) + saldo_awal_beban_listrik
                                    }
                                }
                            })
                            html_beban_listrik += `</tr>`

                            html_beban_listrik += `<tr>
                                    <td colspan="6" class="text-center">Total</td>
                                    <td> ${total_debit_beban_listrik }</td>
                                    <td> ${total_kredit_beban_listrik}</td>
                                </tr> `


                            $('#tbodyBeban_Listrik_Telepon').html(html_beban_listrik)
                            }

                            // akhir Beban_listrik

                             // buku beban PERLENGKAPAN


                           if (data.data.beban_perlengkapan != null) {


                            html_beban_perlengkapan = ''
                            total_kredit_beban_perlengkapan = 0;
                            total_debit_beban_perlengkapan = 0;
                            total_beban_perlengkapan = 0
                            saldo_awal_beban_perlengkapan = (data.saldo_awal.beban_perlengkapan[0].saldo_awal_beban_perlengkapan) ? parseInt(data.saldo_awal.beban_perlengkapan[0].saldo_awal_beban_perlengkapan) : 0
                            html_beban_perlengkapan += ` <tr>
                                    <td> - </td>
                                    <td>Saldo awal</td>
                                    <td>beban_perlengkapan</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>${saldo_awal_beban_perlengkapan}</td>
                                    <td></td>
                                    </tr>`

                            data.data.beban_perlengkapan.map((d, i) => {
                                html_beban_perlengkapan += `<tr>
                                        <td> ${i+1} </td>
                                        <td> ${d.tgl_jurnal} </td>
                                        <td> ${d.nama_coa} </td>
                                        <td></td>`


                                if (i == 0) {

                                    if (d.posisi_dr_cr == 'debet') {
                                        html_beban_perlengkapan += ` 
                                        <td> ${d.nominal} </td>
                                        <td></td>
                                        <td>${ parseInt( d.nominal) + saldo_awal_beban_perlengkapan} </td>
                                        <td></td>

                                    `
                                        total_debit_beban_perlengkapan += parseInt(d.nominal) + saldo_awal_beban_perlengkapan
                                    } else {
                                        html_beban_perlengkapan += ` 
                                        <td></td>
                                        <td> ${d.nominal} </td>
                                        <td></td>
                                        <td>${ parseInt( d.nominal) + saldo_awal_beban_perlengkapan} </td>`
                                        total_kredit_beban_perlengkapan += parseInt(d.nominal) + saldo_awal_beban_perlengkapan
                                    }
                                } else {
                                    if (d.posisi_dr_cr == 'debet') {
                                        html_beban_perlengkapan += ` 
                                        <td> ${d.nominal} </td>
                                        <td></td>`
                                        total_beban_perlengkapan += (parseInt(d.nominal) + saldo_awal_beban_perlengkapan)

                                        if (total_beban_perlengkapan > 0) {
                                            html_beban_perlengkapan += `<td>${ total_beban_perlengkapan} </td>
                                        <td></td>`

                                        } else {
                                            html_beban_perlengkapan += `
                                            <td></td>
                                            <td>${ total_beban_perlengkapan} </td>
                                        `

                                        }


                                        total_debit_beban_perlengkapan += parseInt(d.nominal) + saldo_awal_beban_perlengkapan
                                    } else {

                                        total_beban_perlengkapan -= parseInt(d.nominal)

                                        html_beban_perlengkapan += ` 
                                        <td></td>
                                        <td> ${d.nominal} </td>`

                                        if (total_beban_perlengkapan > 0) {
                                            html_beban_perlengkapan += `<td>${ total_beban_perlengkapan} </td>
                                        <td></td>`

                                        } else {
                                            html_beban_perlengkapan += `
                                            <td></td>
                                            <td>${ total_beban_perlengkapan} </td>
                                        `

                                        }

                                        total_kredit_beban_perlengkapan += parseInt(d.nominal) + saldo_awal_beban_perlengkapan
                                    }
                                }
                            })
                            html_beban_perlengkapan += `</tr>`

                            html_beban_perlengkapan += `<tr>
                                    <td colspan="6" class="text-center">Total</td>
                                    <td> ${total_debit_beban_perlengkapan }</td>
                                    <td> ${total_kredit_beban_perlengkapan}</td>
                                </tr> `


                            $('#tbodyBeban_Perlengkapan').html(html_beban_perlengkapan)
                            }

                            // akhir Beban_perlengkapan

                            // buku beban AIR


                           if (data.data.beban_air != null) {


                            html_beban_air = ''
                            total_kredit_beban_air = 0;
                            total_debit_beban_air = 0;
                            total_beban_air = 0
                            saldo_awal_beban_air = (data.saldo_awal.beban_air[0].saldo_awal_beban_air) ? parseInt(data.saldo_awal.beban_air[0].saldo_awal_beban_air) : 0
                            html_beban_air += ` <tr>
                                    <td> - </td>
                                    <td>Saldo awal</td>
                                    <td>beban_air</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>${saldo_awal_beban_air}</td>
                                    <td></td>
                                    </tr>`

                            data.data.beban_air.map((d, i) => {
                                html_beban_air += `<tr>
                                        <td> ${i+1} </td>
                                        <td> ${d.tgl_jurnal} </td>
                                        <td> ${d.nama_coa} </td>
                                        <td></td>`


                                if (i == 0) {

                                    if (d.posisi_dr_cr == 'debet') {
                                        html_beban_air += ` 
                                        <td> ${d.nominal} </td>
                                        <td></td>
                                        <td>${ parseInt( d.nominal) + saldo_awal_beban_air} </td>
                                        <td></td>

                                    `
                                        total_debit_beban_air += parseInt(d.nominal) + saldo_awal_beban_air
                                    } else {
                                        html_beban_air += ` 
                                        <td></td>
                                        <td> ${d.nominal} </td>
                                        <td></td>
                                        <td>${ parseInt( d.nominal) + saldo_awal_beban_air} </td>`
                                        total_kredit_beban_air += parseInt(d.nominal) + saldo_awal_beban_air
                                    }
                                } else {
                                    if (d.posisi_dr_cr == 'debet') {
                                        html_beban_air += ` 
                                        <td> ${d.nominal} </td>
                                        <td></td>`
                                        total_beban_air += (parseInt(d.nominal) + saldo_awal_beban_air)

                                        if (total_beban_air > 0) {
                                            html_beban_air += `<td>${ total_beban_air} </td>
                                        <td></td>`

                                        } else {
                                            html_beban_air += `
                                            <td></td>
                                            <td>${ total_beban_air} </td>
                                        `

                                        }


                                        total_debit_beban_air += parseInt(d.nominal) + saldo_awal_beban_air
                                    } else {

                                        total_beban_air -= parseInt(d.nominal)

                                        html_beban_air += ` 
                                        <td></td>
                                        <td> ${d.nominal} </td>`

                                        if (total_beban_air > 0) {
                                            html_beban_air += `<td>${ total_beban_air} </td>
                                        <td></td>`

                                        } else {
                                            html_beban_air += `
                                            <td></td>
                                            <td>${ total_beban_air} </td>
                                        `

                                        }

                                        total_kredit_beban_air += parseInt(d.nominal) + saldo_awal_beban_air
                                    }
                                }
                            })
                            html_beban_air += `</tr>`

                            html_beban_air += `<tr>
                                    <td colspan="6" class="text-center">Total</td>
                                    <td> ${total_debit_beban_air }</td>
                                    <td> ${total_kredit_beban_air}</td>
                                </tr> `


                            $('#tbodyBeban_Air').html(html_beban_air)
                            }

                            // akhir Beban_air

                                                    









                }
            })

        })
    })
</script>