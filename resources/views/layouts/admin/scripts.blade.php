<!-- plugins:js -->
<script src="{{ asset('panel/vendors/base/vendor.bundle.base.js') }}"></script>
<!-- endinject -->
<!-- Plugin js for this page-->
<script src="{{ asset('panel/vendors/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('panel/vendors/datatables.net/jquery.dataTables.js') }}"></script>
<script src="{{ asset('panel/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="{{ asset('panel/js/off-canvas.js') }}"></script>
<script src="{{ asset('panel/js/hoverable-collapse.js') }}"></script>
<script src="{{ asset('panel/js/template.js') }}"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="{{ asset('panel/js/dashboard.js') }}"></script>
<script src="{{ asset('panel/js/data-table.js') }}"></script>
<script src="{{ asset('panel/js/jquery.dataTables.js') }}"></script>
<script src="{{ asset('panel/js/dataTables.bootstrap4.js') }}"></script>
<script src="{{ asset('panel/js/file-upload.js') }}"></script>
@yield('scripts')
