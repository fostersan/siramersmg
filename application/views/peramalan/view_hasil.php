  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Peramalan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="http://localhost/siramersmg/dashboard">Home</a></li>
              <li class="breadcrumb-item active">peramalan</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small cardes (Stat card) -->
      <div class="row">
        <div class="col-md-12 col-xs-12">

          <?php if ($this->session->flashdata('success')) : ?>
            <div class="alert alert-success alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <?php echo $this->session->flashdata('success'); ?>
            </div>
          <?php elseif ($this->session->flashdata('error')) : ?>
            <div class="alert alert-error alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <?php echo $this->session->flashdata('error'); ?>
            </div>
          <?php endif; ?>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Hasil Peramalan</h3>
            </div>

            <div class="card-body">
              <div class="table-responsive">
                <table id="table_data" class="table table-striped table-bordered table-hover table-sm" style="width:100%">
                  <thead>
                    <?php
                    if ($proses && !empty($proses['dataProses'])) {
                    ?>
                      <tr>
                        <th class="bg-primary" style="text-align: center;">TAHUN</th>
                        <th class="bg-primary" style="text-align: center;">PERIODE</th>
                        <th class="bg-primary" style="text-align: center;"><?php echo strtoupper($proses['namaBarang']); ?></th>
                        <th class="bg-primary" style="text-align: center;">ARIMA</th>
                        <th class="bg-primary" style="text-align: center;">ERROR</th>
                        <th class="bg-primary" style="text-align: center;">PE</th>
                      </tr>
                    <?php
                    }
                    ?>
                  </thead>
                  <tbody>
                    <?php
                    if ($proses && !empty($proses['dataProses'])) {
                      foreach ($proses['dataProses'] as $dp) {

                    ?>
                        <tr>
                          <td style="text-align: center;"><?php echo $dp['tahun']; ?></td>
                          <td style="text-align: center;"><?php echo $dp['triwulan']; ?></td>
                          <td style="text-align: center;"><?php echo $dp['jumlah_keluar']; ?></td>
                          <td style="text-align: center;"><?php echo number_format($dp['arima'], 3, ',', ''); ?></td>
                          <td style="text-align: center;"><?php echo number_format($dp['error_proses'], 4, ',', ''); ?></td>
                          <td style="text-align: center;"><?php echo number_format($dp['pe_proses'], 2, ',', ''); ?>%</td>
                        </tr>
                      <?php
                      }
                      ?>
                      <tr>
                        <td class="bg-success" style="text-align: center;" colspan="2">Periode Selanjutnya</td>
                        <td class="bg-success" style="text-align: center;" colspan="4"><?php echo number_format($proses['arimaSelanjutnya'], 3, ',', ''); ?></td>
                      </tr>
                      <tr>
                        <td style="text-align: center;">MAPE</td>
                        <td style="text-align: center;"><?php echo number_format($proses['mape'], 2, ',', ''); ?>%</td>
                      </tr>
                      <tr>
                        <td style="text-align: center;">Koefisien</td>
                        <td style="text-align: center;"><?php echo number_format($proses['koefisienProses'], 1, ',', ''); ?></td>
                      </tr>
                      <tr>
                        <td style="text-align: center;">Konstanta</td>
                        <td style="text-align: center;"><?php echo number_format($proses['konstantaProses'], 4, ',', ''); ?></td>
                      </tr>
                      <tr>
                        <td style="text-align: center;">ET</td>
                        <td style="text-align: center;"><?php echo number_format($proses['etProses'], 6, ',', ''); ?></td>
                      </tr>
                    <?php
                    }
                    ?>
                  </tbody>
                </table>
                <!-- table_data -->
              </div>
              <!-- /.table-responsive -->
            </div>
          </div>
          <!-- /.card -->
        </div>
        <!-- col-md-12 -->
      </div>
      <!-- /.row -->


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->