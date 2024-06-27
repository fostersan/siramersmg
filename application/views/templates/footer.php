<footer class="main-footer">
  <strong>Copyright &copy; 2020 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
  All rights reserved.
  <div class="float-right d-none d-sm-inline-block">
    <b>Created By: <a href="http://facebook.com/fikrimuzakki38">Fikri Muzakki</a> </b>with AdminLTE.io Version 3.0.0-rc.1
  </div>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo base_url(); ?>assets/adminlte3/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url(); ?>assets/adminlte3/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url(); ?>assets/adminlte3/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo base_url(); ?>assets/adminlte3/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url(); ?>assets/adminlte3/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?php echo base_url(); ?>assets/adminlte3/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/adminlte3/plugins/jqvmap/maps/jquery.vmap.world.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url(); ?>assets/adminlte3/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url(); ?>assets/adminlte3/plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/adminlte3/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url(); ?>assets/adminlte3/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Page level plugins -->
<script src="<?php echo base_url(); ?>assets/adminlte3/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/adminlte3/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/adminlte3/vendor/datatables/buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url(); ?>assets/adminlte3/vendor/datatables/buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/adminlte3/vendor/datatables/jszip/jszip.min.js"></script>
<script src="<?php echo base_url(); ?>assets/adminlte3/vendor/datatables/pdfmake/pdfmake.min.js"></script>
<script src="<?php echo base_url(); ?>assets/adminlte3/vendor/datatables/pdfmake/vfs_fonts.js"></script>
<script src="<?php echo base_url(); ?>assets/adminlte3/vendor/datatables/buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url(); ?>assets/adminlte3/vendor/datatables/buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url(); ?>assets/adminlte3/vendor/datatables/buttons/js/buttons.colVis.min.js"></script>
<script src="<?php echo base_url(); ?>assets/adminlte3/vendor/datatables/responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url(); ?>assets/adminlte3/vendor/datatables/responsive/js/responsive.bootstrap4.min.js"></script>

<script src="<?php echo base_url(); ?>assets/adminlte3/vendor/gijgo/js/gijgo.min.js"></script>
<!-- Summernote -->
<script src="<?php echo base_url(); ?>assets/adminlte3/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url(); ?>assets/adminlte3/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/adminlte3/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url(); ?>assets/adminlte3/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>assets/adminlte3/dist/js/demo.js"></script>

<script type="text/javascript">
  $(function() {
    $('.date').datepicker({
      uiLibrary: 'bootstrap4',
      format: 'yyyy-mm-dd'
    });

    var start = moment().subtract(29, 'days');
    var end = moment();

    function cb(start, end) {
      $('#tangal').val(start.format('YYYY-MM-DD') + ' - ' + end.format('YYYY-MM-DD'));
    }

    $('#tanggal').daterangepicker({
      startDate: start,
      endDate: end,
      ranges: {
        'Hari ini': [moment(), moment()],
        'Kemarin': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
        '7 hari terakhir': [moment().subtract(6, 'days'), moment()],
        '30 hari terakhir': [moment().subtract(29, 'days'), moment()],
        'Bulan ini': [moment().startOf('month'), moment().endOf('month')],
        'Bulan lalu': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
        'Tahun ini': [moment().startOf('year'), moment().endOf('year')],
        'Tahun lalu': [moment().subtract(1, 'year').startOf('year'), moment().subtract(1, 'year').endOf('year')]
      }
    }, cb);

    cb(start, end);
  });

  $(document).ready(function() {
    var table = $('#dataTable').DataTable({
      lengthMenu: [
        [5, 10, 25, 50, 100, -1],
        [5, 10, 25, 50, 100, "All"]
      ],
      columnDefs: [{
        targets: -1,
        orderable: false,
        searchable: false
      }]
    });

    table.buttons().container().appendTo('#dataTable_wrapper .col-md-5:eq(0)');
  });
</script>
</body>

</html>