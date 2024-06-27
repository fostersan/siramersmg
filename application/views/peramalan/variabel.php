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
              <h3 class="card-title">peramalan</h3>
            </div>
            <form role="form" action="<?php echo site_url('peramalan/proses'); ?>" method="post">
              <div class="card-body">

                <?php echo validation_errors(); ?>

                <div class="form-group">
                  <label for="group_name">Barang</label>
                  <select class="form-control" id="nama_barang" name="nama_barang" onchange="getKonstanta();">
                    <option value="">-- Pilih Barang --</option>
                    <?php foreach ($nama_barang as $k => $v) : ?>
                      <option value="<?php echo $v['id'] ?>"><?php echo $v['nama_barang'] ?></option>
                    <?php endforeach ?>
                  </select>
                </div>

                <div class="form-group">
                  <label for="konstanta">Konstanta = Rata-Rata</label>
                  <!-- <input type="number" min='0.0001' step='0.0001' class="form-control" id="konstanta" name="konstanta" placeholder="Masukkan nilai Rata-Rata dengan Copy-Paste di peramalan/index"> -->
                  <input type="text" class="form-control" id="konstanta" name="konstanta" readonly>
                </div>

                <div class="form-group">
                  <label for="nama_ruangan">et = absolut(rata-rata - nilai yang dipilih)</label>
                  <input type="number" class="form-control" id="et" name="et" placeholder="Masukkan nilai terserah">
                </div>

              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Proses</button>
              </div>
            </form>
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

  <script>
    function getKonstanta() {
      $.ajax({
        url: "<?php echo site_url('peramalan/findRataBarangKeluarById') ?>",
        type: "POST",
        data: {
          id: $('#nama_barang').val()
        },
        dataType: "JSON",
        beforeSend: function() {

        },
        success: function(data) {
          if (data.success) {
            $('#konstanta').val(data.data).trigger('change');
          } else {
            $('#konstanta').val('0').trigger('change');
          }
        },
        error: function(jqXHR, textStatus, errorThrown) {
          Swal.fire("Error : Operasi Data Gagal", errorThrown, "error");
        },
        complete: function() {}
      });
    }
  </script>