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

                    <div class="row mb-5">
                        <div class="col-md-3">
                            <select name="id_obat" id="id_obat" class="form-control">
                                <option value="null">Pilih Obat</option>
                                <?php foreach ($data as $d) : ?>
                                    <option value="<?= $d->id_obat ?>"><?= $d->name ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <input type="month" name="date" id="date" class="form-control">
                        </div>
                    </div>
                    <div class="col text-center">
                        <h1>Kartu Stok Obat</h1>
                        <h3>Apotek Cemerlang</h3>
                        <h5>Periode:<?= date('M-Y') ?></h5>
                    </div>
                </div>



                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr class="text-center">
                                <th rowspan="2" class="text-center">No.</th>
                                <th rowspan="2" class="text-center">Keterangan.</th>
                                <th colspan="3">Pembelian</th>
                                <th colspan="3">Penjualan</th>
                                <th colspan="3">Persediaan</th>
                            </tr>

                            <tr>
                                <td>Unit</td>
                                <td>Harga</td>
                                <td>Jumlah</td>
                                <td>Unit</td>
                                <td>Harga</td>
                                <td>Jumlah</td>
                                <td>Unit</td>
                                <td>Harga</td>
                                <td>Jumlah</td>
                            </tr>
                        </thead>

                        <tbody id="tBodytable">

                        </tbody>



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

<script>
    $(document).ready(function() {
        base_url = "<?= base_url('/') ?>"

        $('#id_obat').change(function() {
            getData($(this).val())
        })

        $('#date').change(function() {

            getData($('#id_obat').val(), $(this).val())
        })

        function getData(id_obat, date = null) {

            url = `${base_url}jurnal/getDataPersediaan/${id_obat}`

            if (date != null) {
                url = `${base_url}jurnal/getDataPersediaan/${id_obat}/${date}`
            }




            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    html = ''
                    no = 1
                    unit_total_persedian = []
                    harga_total_persedian = []
                    total_persedian = []
                    if (data.length > 0) {
                        data.map((d) => {
                            html += `<tr>`
                            if (d.nama_coa == 'pembelian') {
                                html += `<td> ${no}</td>`
                                html += `<td> ${d.nama_coa}</td>`
                                html += `<td> ${d.qty}</td>`
                                html += `<td> ${d.harga_pembelian}</td>`
                                html += `<td> ${d.total}</td>`

                                html += `<td></td>`
                                html += `<td></td>`
                                html += `<td></td>`

                                // perhitungan
                                unit_total_persedian.push(d.qty)
                                harga_total_persedian.push(d.harga_pembelian)
                                total_persedian.push(d.total)



                                html += `<td>${unit_total_persedian.map((u)=>`${u}<br>`)}</td>`
                                html += `<td>${harga_total_persedian.map((u)=>`${ u}<br>`)}</td>`

                                html += `<td>${total_persedian.map((u)=>`${u}<br>`)}</td>`

                            } else if (d.nama_coa == 'penjualan') {
                                html += `<td> ${no}</td>`
                                html += `<td> ${d.nama_coa}</td>`
                                html += `<td></td>`
                                html += `<td></td>`
                                html += `<td></td>`


                                html += `<td> ${d.qty}</td>`
                                html += `<td> ${d.harga_pembelian}</td>`
                                html += `<td> ${d.total}</td>`

                                // perhitungan
                                for (let i = 0; i < unit_total_persedian.length; i++) {

                                    if (unit_total_persedian[i] != 0) {
                                        unit_total_persedian[i] = unit_total_persedian[i] -= d.qty
                                        harga_total_persedian[i] = harga_total_persedian[i] * unit_total_persedian[i]
                                        break
                                    }
                                }




                                html += `<td>${unit_total_persedian.map((u)=>`${u}<br>`)}</td>`
                                html += `<td>${harga_total_persedian.map((u)=>`${u}<br>`)}</td>`
                              
                                html += `<td>${total_persedian.map((u)=>`${u}<br>`)}</td>`
                            } else if (d.nama_coa == 'retur pembelian') {
                                unit = parseInt(d.qty)
                                total = parseInt(d.total)

                                html += `<td> ${no}</td>`
                                html += `<td> ${d.nama_coa}</td>`



                                html += `<td> ${d.qty}</td>`
                                html += `<td> ${new Intl.NumberFormat('en-IN', { maximumSignificantDigits: 3 }).format(d.harga_pembelian)}</td>`
                                html += `<td> ${d.total}</td>`

                                html += `<td></td>`
                                html += `<td></td>`
                                html += `<td></td>`

                                // perhitungan
                                for (let i = 0; i < unit_total_persedian.length; i++) {

                                    if (unit_total_persedian[i] != 0) {
                                        unit_total_persedian[i] = unit_total_persedian[i] -= unit
                                        harga_total_persedian[i] = harga_total_persedian[i] * unit_total_persedian[i]
                                        break
                                    }
                                }


                           


                                html += `<td>${unit_total_persedian.map((u)=>`${u}<br>`)}</td>`
                                html += `<td>${harga_total_persedian.map((u)=>`${new Intl.NumberFormat('en-IN', { maximumSignificantDigits: 3 }).format(u)}<br>`)}</td>`
                      

                                html += `<td>${total_persedian.map((u)=>`${new Intl.NumberFormat('en-IN', { maximumSignificantDigits: 3 }).format(u)}<br>`)}</td>`

                            }
                            html += `</tr>`

                            no++
                        })
                    }
                    $('#tBodytable').html(html)
                }
            })
        }

    })
</script>