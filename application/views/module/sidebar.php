  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url('admin') ?>" class="brand-link">
      <img src="<?= base_url('assets/') ?>dist/img/cemerlang.png" alt="cemerlang" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Apotek Cemerlang</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= base_url('assets/') ?>dist/img/ressa.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?= $this->session->name; ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-header">UTAMA</li>
          <li class="nav-item">
            <a href="<?= base_url('admin') ?>" class="nav-link <?= current_url() === base_url('admin') ? 'active' : null ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview <?= current_url() === base_url('admin/drugs') || current_url() === base_url('admin/purchases') || current_url() === base_url('admin/sales') ? 'menu-open' : null ?>">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-database"></i>
              <p>
                Master Data
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('coa') ?>" class="nav-link <?= current_url() === base_url('coa') ? 'active' : null ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>COA</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('satuan/index') ?>" class="nav-link <?= current_url() === base_url('admin/units') ? 'active' : null ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Satuan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('obat/index') ?>" class="nav-link <?= current_url() === base_url('obat/index') ? 'active' : null ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Obat</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?= base_url('suppliers') ?>" class="nav-link <?= current_url() === base_url('supplier/index') ? 'active' : null ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Supplier</p>
                </a>
              </li>

            </ul>
          </li>


          <li class="nav-item has-treeview <?= current_url() === base_url('admin/units') || current_url() === base_url('admin/suppliers') ? 'menu-open' : null ?>">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-database"></i>
              <p>
                Transaksi
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">


              <li class="nav-item">
                <a href="<?= base_url('pembelian') ?>" class="nav-link <?= current_url() === base_url('admin/purchases') ? 'active' : null ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pembelian</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('retur_pembelian') ?>" class="nav-link <?= current_url() === base_url('admin/return') ? 'active' : null ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Retur Pembelian</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('penjualan') ?>" class="nav-link <?= current_url() === base_url('admin/sales') ? 'active' : null ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Penjualan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('modal') ?>" class="nav-link <?= current_url() === base_url('admin/modal') ? 'active' : null ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Modal</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('beban') ?>" class="nav-link <?= current_url() === base_url('admin/beban') ? 'active' : null ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Beban</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-file-pdf"></i>
              <p>
                Laporan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('admin/drug_report') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Obat</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('pembelian/laporan') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pembelian</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('retur_pembelian/laporan') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Retur Pembelian</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('penjualan/laporan') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Penjualan</p>
                </a>
              </li>
            
              <li class="nav-item">
                <a href="<?= base_url('jurnal') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Jurnal</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('jurnal/buku_besar') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Buku Besar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('jurnal/neracaSaldo') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Neraca Saldo</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('jurnal/persediaan') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Persediaan </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('jurnal/labarugi') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Laporan Laba Rugi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('modal/perubahan_modal') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Laporan Perubahan Modal</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header">MENU</li>
          <li class="nav-item">
            <a href="<?= base_url('auth/logout') ?>" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Keluar
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>