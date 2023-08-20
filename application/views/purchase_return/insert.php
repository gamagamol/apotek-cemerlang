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
                    <h6 class="m-0 font-weight-bold ">Data Retur Pembelian</h6>
                </div>

                <div class="card-body">
                    <!-- <form action="<?= base_url('retur_pembelian/insert') ?>" method="POST"> -->
                    <div class="modal-body">

                        <div>
                            <div class="form-group">
                                <label for="addnama_obat">No Nota</label>
                                <input type="text" class="form-control" name="nota_num" id="nota_num" value="<?= $no_nota ?>" readonly required>
                            </div>

                        </div>
                        <div>
                            <div class="form-group">
                                <label for="addnama_obat">No Pembelian</label>
                                <select name="no_pembelian" id="no_pembelian" class="form-control">
                                    <option value="">pilih no pembelian</option>
                                    <?php foreach ($no_pembelian as $np) :    ?>
                                        <option value="<?= $np->nota_num ?>"><?= $np->nota_num ?></option>
                                    <?php endforeach;    ?>
                                </select>
                            </div>

                        </div>
                        <div>
                            <div class="form-group">
                                <label for="addnama_obat">Tanggal Retur Pembelian</label>
                                <input type="date" class="form-control" name="date" id="date" value="<?= date('Y-m-d') ?>" readonly required>
                            </div>

                        </div>


                    </div>

                    <!-- </form> -->
                    <form action="<?= base_url('retur_pembelian/insert') ?>" method="post">
                        <button class="btn btn-primary my-3" hidden id="btn-submit">Submit</button>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <td>Tanggal Obat</td>
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
                let harga_retur_pembelian = $('#harga').val()


                html = ``

                html += '<tr>'


                html += `
                <td hidden>
                <input type="text" class="form-control" name="nota_num[]" id='arr_nota_num' required value='${nota_num}' readonly hidden>
                </td>
                
                `
                html += `
                <td>
                <input type="date" class="form-control" name="date[]" id='arr_date' required value='${date}' readonly>
                </td>
                
                `
                html += `
                <td>
                <input type="text" class="form-control" name="id_drug[]" id='arr_id_drug'required value='${id_drug}' hidden>
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

                <input type="text" class="form-control" name="harga_retur_pembelian[]" id='arr_harga_retur_pembelian' required value='${harga_retur_pembelian}' readonly>
                </td>
                
                `


                html += `
                <td>

                <input type="text" class="form-control" name="total[]" id='arr_total' required value='${total}' readonly>
                </td>
                
                `

                html += '</tr>'
                totalKesluruhan += total

                html1 = `<tr>
                <td colspan='4' class='text-center'>Total</td>
                <td>${totalKesluruhan}</td>
                </tr>`


                $('#tbody').html(html)
                $('#footer').html(html1)

            }



        })


        $('#id_drug').change(function() {

            $.ajax({
                url: '<?= base_url() ?>retur_pembelian/getStock',
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


        $('#no_pembelian').change(function() {
            let no_pembelian = $(this).val()
            let nota_num = $('#nota_num').val()
            $('#btn-submit').removeAttr('hidden')

            $.ajax({

                url: `<?= base_url() ?>retur_pembelian/findPurchase`,
                type: 'POST',
                data: {
                    no_pembelian: no_pembelian
                },
                dataType: 'json',
                success: function(data) {
                    html = ``
                    let totalKesluruhan = 0
                    data.map((d) => {
                        html += '<tr>'


                        html += `
                <td hidden>
                <input type="text" class="form-control" name="nota_num[]" id='arr_nota_num' required value='${nota_num}' readonly hidden>
                </td>
                
                `
                        html += `
                <td>
                <input type="date" class="form-control" name="date[]" id='arr_date' required value='${d.date}' readonly>
                </td>
                
                `
                        html += `
                <td>
                <input type="text" class="form-control" name="id_drug[]" id='arr_id_drug'required value='${d.id_drug}' hidden>
                <input type="text" class="form-control"  value='${d.name}' readonly >
                </td>
                
                `

                        html += `
                <td>

                <input type="text" class="form-control" name="arr_jumlah[]" id='arr_jumlah' required value='${d.qty}' readonly>
                </td>
                
                `

                        html += `
                <td>

                <input type="text" class="form-control" name="harga_retur_pembelian[]" id='arr_harga_retur_pembelian' required value='${d.harga_pembelian}' readonly>
                </td>
                
                `


                        html += `
                <td>

                <input type="text" class="form-control" name="total[]" id='arr_total' required value='${d.total}' readonly>
                </td>
                
                `

                        html += '</tr>'

                        totalKesluruhan += parseInt(d.total)
                    })

                    html1 = `<tr>
                <td colspan='4' class='text-center'>Total</td>
                <td>${totalKesluruhan}</td>
                </tr>`


                    $('#tbody').html(html)
                    $('#footer').html(html1)
                }
            })
        })



    })
</script>