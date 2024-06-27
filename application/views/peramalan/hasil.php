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
              <li class="breadcrumb-item"><a href="http://localhost/siramegrsmg/dashboard">Home</a></li>
              <li class="breadcrumb-item active">Peramalan</li>
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
            <!-- /.card-header -->
            <div class="card-body">
              <table id="datatables" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID Barang</th>
                  <th>Konstanta</th>
                  <th>et</th>
                </tr>
                </thead>
                <tbody>
                   <?php
                     if ($result){
                       $no = 1;
                       $array = json_decode($hasil, true);
                       foreach($array as $v) {
                       ?>
                     <tr>
                        <td><?php echo $v['barang_id'];?></td>
                        <td><?php echo $v['konstanta'];?></td>
                        <td><?php echo $v['et'];?></td>
                     </tr>
                  <?php
                    }
                      }
                  ?>
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
