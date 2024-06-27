  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Barang</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="http://localhost/silapangrsmg/dashboard">Home</a></li>
              <li class="breadcrumb-item active">Barang</li>
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

          <a href="<?php echo base_url('barang/create') ?>" class="btn btn-primary"> <i class="fa fa-plus"></i> Tambah Barang</a>

          <br> <br>


            <!-- <a href="<?php echo base_url('barang/create') ?>" class="btn btn-primary"> <i class="fa fa-plus"></i>Tambah Pemarkir</a>
            <br /> <br /> -->

          <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
              <table id="datatables" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Kode Barang</th>
                  <th>Nama Barang</th>
                  <th>Jenis Barang</th>
                  <th>Stok</th>
                  <th>Satuan</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php foreach ($barang_data as $k => $v){ ?>
                    <tr>
                      <td><?php echo $v['barang']['id']; ?></td>
                      <td><?php echo $v['barang']['nama_barang']; ?></td>
                      <td><?php echo $v['jenis']['nama_jenis']; ?></td>
                      <td><?php echo $v['barang']['stok']; ?></td>
                      <td><?php echo $v['satuan']['nama_satuan']; ?></td>
                      <td>
                          <a href="<?php echo base_url('barang/delete/'.$v['barang']['id']) ?>" class="btn btn-default"><i class="fa fa-trash"></i></a>
                      </td>
                    </tr>
                    <?php
                  } ?>
                </tbody>
              </table>
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

      $("#barangSideTree").addClass('active');
      $("#managebarangSideTree").addClass('active');

    });
  </script>
