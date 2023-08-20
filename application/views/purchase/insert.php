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
                    <h6 class="m-0 font-weight-bold ">Data Pembelian</h6>
                </div>

                <div class="card-body">
                    <!-- <form action="<?= base_url('penjualan/insert') ?>" method="POST"> -->
                    <div class="modal-body">
                        <div class="modal-body">


                            <div>
                                <div class="form-group">
                                    <label for="addnama_obat">No Nota</label>
                                    <input type="text" class="form-control" name="nota_num" id="nota_num" value="<?= $no_nota ?>" readonly required>
                                </div>

                            </div>
                            <div>
                                <div class="form-group">
                                    <label for="addnama_obat">Tanggal Pembelian</label>
                                    <input type="date" class="form-control" name="date" id='date' value="<?= date('Y-m-d') ?>" readonly required>
                                </div>

                            </div>
                            <div>
                                <div class="form-group">
                                    <label for="addsatuan">Nama suppliers</label>

                                    <select name="id_suppliers" id="id_suppliers" class="form-control">
                                        <option value="">Pilih Supplier</option>
                                        <?php foreach ($supplier as $b) : ?>
                                            <option value="<?= $b->id ?>"><?= $b->name ?></option>
                                        <?php endforeach; ?>

                                    </select>
                                </div>

                            </div>
                            <div>
                                <div class="form-group">
                                    <label for="addsatuan">Nama Obat</label>


                                    <select name="id_drug" id="id_drug" class="form-control">
                                        <option value="">Pilih Obat</option>
                                        <?php foreach ($obat as $b) : ?>
                                            <option value="<?= $b->id_obat ?>"><?= $b->name ?></option>
                                        <?php endforeach; ?>


                                    </select>
                                </div>

                            </div>


                            <div>
                                <div class="form-group">
                                    <label for="stock">Tanggal Kadaluarsa</label>
                                    <input type="date" class="form-control" name="tgl_kadaluarsa" id="tgl_kadaluarsa">
                                </div>

                            </div>
                            <div>
                                <div class="form-group">
                                    <label for="stock">Stock Obat</label>
                                    <input type="text" class="form-control" name="stock" id="stock" readonly>
                                </div>

                            </div>
                            <div>
                                <div class="form-group">
                                    <label for="addnama_obat">Harga Pembelian</label>
                                    <input type="text" class="form-control" name="harga_pembelian" id="harga" required>
                                </div>

                            </div>
                            <div>
                                <div class="form-group">
                                    <label for="addnama_obat">Jumlah Pembelian</label>
                                    <input type="text" class="form-control" name="qty" id="jumlah" required>
                                </div>

                            </div>
                            <div>
                                <div class="form-group">
                                    <label for="addnama_obat">Total Pembelian</label>
                                    <input type="int" class="form-control" name="total" id="total" readonly>
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" id="hitung">Kalkulasi</button>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                    </div>
                    <!-- </form> -->
                    <form action="<?= base_url('pembelian/insert') ?>" method="post">

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <td>Tanggal Obat</td>
                                    <td>Tanggal kadaluarsa</td>
                                    <td>Nama Obat</td>
                                    <td>Qty</td>
                                    <td>harga</td>
                                    <td>subtotal</td>
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




            arrHarga = $('#harga').val().split('.')
            let harga = ''
            arrHarga.map((h) => {
                harga += h
            })

            arrJumlah = $('#jumlah').val().split('.')
            let jumlah = ''
            arrJumlah.map((j) => {
                jumlah += j
            })

            stock = parseInt($('#stock').val())

            if (jumlah > stock) {
                alert("masukan Jumlah lebih sedikit")
                $('#btnadddrug').attr('hidden', true)

            } else {
                let total = parseInt(harga) * parseInt(jumlah)
                $('#total').val(total)
                $('#btnadddrug').removeAttr('hidden')

                let date = $('#date').val()
                let nota_num = $('#nota_num').val()
                let id_drug = $('#id_drug').val()
                let nama_obat = $('#id_drug option:selected').text()
                let harga_pembelian = $('#harga').val()
                let tgl_kadaluarsa = $('#tgl_kadaluarsa').val()


                html = ``

                html += '<tr>'


                html += `
                <td hidden>
                <input type="text" class="form-control" name="arr_nota_num[]" id='arr_nota_num' required value='${nota_num}' readonly hidden>
                </td>
                
                `
                html += `
                <td>
                <input type="date" class="form-control" name="arr_date[]" id='arr_date' required value='${date}' readonly>
                </td>
                
                `
                html += `
                <td>
                <input type="date" class="form-control" name="arr_tgl_kadaluarsa[]" id='arr_tgl_kadaluarsa' required value='${tgl_kadaluarsa}' readonly>
                </td>
                
                `
                html += `
                <td>
                <input type="text" class="form-control" name="arr_id_drug[]" id='arr_id_drug'required value='${id_drug}' hidden>
                <input type="text" class="form-control"  value='${nama_obat}' readonly >
                </td>
                
                `

                html += `
                <td>

                <input type="text" class="form-control" name="arr_jumlah[]" id='arr_jumlah' required value='${jumlah}' readonly>
                </td>
                
                `

                html += `
                <td>

                <input type="text" class="form-control" name="arr_harga_pembelian[]" id='arr_harga_pembelian' required value='${harga_pembelian}' readonly>
                </td>
                
                `


                html += `
                <td>

                <input type="text" class="form-control" name="arr_total[]" id='arr_total' required value='${total}' readonly>
                </td>
                
                `

                html += '</tr>'
                totalKesluruhan += total

                html1 = `<tr>
                <td colspan='4' class='text-center'>Total</td>
                <td>${totalKesluruhan}</td>
                </tr>`


                $('#tbody').append(html)
                $('#footer').html(html1)

            }



        })


        $('#id_drug').change(function() {

            $.ajax({
                url: '<?= base_url() ?>penjualan/getStock',
                type: 'POST',
                data: {
                    id_drug: $(this).val()
                },
                dataType: 'json',
                success: function(data) {
                    $('#stock').val(data[0].stock)
                }
            })
        })

        $('#id_suppliers').change(function() {
            let url = '<?= base_url('pembelian/getDrugsBysupplier') ?>'

            id = $(this).val()
            $.ajax({
                url: `${url}/${id}`,
                type: 'GET',

                dataType: 'json',
                success: function(data) {
                    html = '<option>Pilih obat</option>'

                    data.data.map((d) => {
                        html += `<option value='${d.id}'>${d.name}</option>`
                    })


                    $('#id_drug').html(html)
                }
            })
        })




    })
</script>