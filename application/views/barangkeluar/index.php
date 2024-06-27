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

          <a href="<?php echo base_url('barangkeluar/create') ?>" class="btn btn-primary"> <i class="fa fa-plus"></i> Pakai Barang</a>

          <br> <br>

          <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
              <div class="table-responsive">
              <table class="table table-striped w-100 dt-responsive nowrap" id="dataTable">
                <thead>
                <tr>
                  <th>Kode Transaksi</th>
                  <th>Tanggal</th>
                  <th>Nama Barang</th>
                  <th>Penanggung Jawab</th>
                  <th>Jumlah Keluar</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php foreach ($barangkeluar_data as $k => $v){ ?>
                    <tr>
                      <td><?php echo $v['barangkeluar']['id']; ?></td>
                      <td><?php echo $v['barangkeluar']['tanggal_keluar']; ?></td>
                      <td><?php echo $v['barang']['nama_barang']; ?></td>
                      <td><?php echo $v['users']['nama']; ?></td>
                      <td><?php echo $v['barangkeluar']['jumlah_keluar']; ?></td>
                      <td>
                          <a href="<?php echo base_url('barangkeluar/delete/'.$v['barangkeluar']['id']) ?>" class="btn btn-default"><i class="fa fa-trash"></i></a>
                      </td>
                    </tr>
                    <?php
                  } ?>
                </tbody>
              </table>
              </div>
            </div>
            <!-- /.card-body -->
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

    function printbarang(barang_url)
    {
      $.ajax({
        url: barang_url,
        type: 'post',
        success:function(response) {

          var mywindow = window.open('', 'PRINT', 'height=400,width=600');

          mywindow.document.write(response);


          mywindow.document.close(); // necessary for IE >= 10
          mywindow.focus(); // necessary for IE >= 10*/

          mywindow.print();
          mywindow.close(); 

        }
      })
    }

    $(document).ready(function() {
      $('#datatables').DataTable({
        'order': []
      });

      $("#barangkeluarSideTree").addClass('active');
      $("#manageBarangkeluarSideTree").addClass('active');

    });
  </script>
