<body onload="window.print()">
  <div class="wrapper text-center">
    <h3>Laporan Hutang dengan <?= $ket; ?></h3>
    <br />
    <table class="table table-bordered table-hover">
      <thead>
        <tr>  
          <th>No.</th>
          <th>Tanggal</th>
          <th>Simpan_ke</th>
          <th>Hutang_dari</th>
          <th>catatan</th>
          <th>Nominal</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        foreach ($debt as $de):
        ?>
        <tr>
          <td><?= $no++; ?></td>
          <td><?= $de->tdebt; ?></td>
          <td><?= $de->simpan_ke; ?></td>
          <td><?= $de->hutang_dari; ?></td>
          <td><?= $de->catatan; ?></td>
          <td><?= 'Rp. '. number_format($de->nominal_debt); ?></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  <script>
    const wrapper = document.getElementById("wrapper");
  </script>
</body>