  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Barang Keluar</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="http://localhost/siramersmg/dashboard">Home</a></li>
              <li class="breadcrumb-item active">Barang Keluar</li>
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
          
          <?php if($this->session->flashdata('success')): ?>
            <div class="alert alert-success alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <?php echo $this->session->flashdata('success'); ?>
            </div>
          <?php elseif($this->session->flashdata('error')): ?>
            <div class="alert alert-error alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <?php echo $this->session->flashdata('error'); ?>
            </div>
          <?php endif; ?>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Barang keluar</h3>
            </div>
            <form role="form" action="<?php base_url('barangkeluar/create') ?>" method="post">
              <div class="card-body">

                <?php echo validation_errors(); ?>

                <div class="form-group">
                  <label for="nama">User</label>
                  <input type="text" class="form-control" id="nama" readonly name="nama" value="<?php echo $user_data['id']; ?>">
                </div>

                <div class="form-group">
                    <label class="tanggal_keluar" for="tanggal_keluar">Tanggal Keluar</label>
                      <input value="<?= set_value('tanggal_keluar', date('Y-m-d')); ?>" name="tanggal_keluar" id="tanggal_keluar" type="text" class="form-control date" placeholder="Tanggal keluar...">
                </div>

                  <div class="form-group">
                  <label for="nama_barang">Barang</label>
                  <select class="form-control" id="nama_barang" name="nama_barang">
                    <option value="">-- Pilih Nama Barang --</option>
                    <?php foreach ($nama_barang as $k => $v): ?>
                      <option value="<?php echo $v['id'] ?>"><?php echo $v['nama_barang'] ?></option>
                    <?php endforeach ?>
                  </select>
                </div>

                <div class="form-group">
                    <label class="jumlah_keluar" for="jumlah_keluar">Jumlah keluar</label>
                    <div class="input-group">
                      <input value="<?= set_value('jumlah_keluar'); ?>" name="jumlah_keluar" id="jumlah_keluar" type="number" class="form-control" placeholder="Jumlah keluar...">
                    </div>
                </div>

              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan Perubahaan</button>
                <a href="<?php echo base_url('barangkeluar/') ?>" class="btn btn-warning">Kembali</a>
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


  <script type="text/javascript">
    $(document).ready(function() {
      $("#parkingSideTree").addClass('active');
      $("#createParkingSideTree").addClass('active');

      $('#parking_slot').select2();

      $("#vehicle_cat").on('change', function() {
        var value = $(this).val();

        $.ajax({
          url: <?php echo "'". base_url('parking/getCategoryRate/') . "'"; ?>  + value,
          type: 'post',
          dataType: 'json',
          success:function(response) {
            $("#vehicle_rate").html(response);
          }
        });
      });
    });
  </script>
