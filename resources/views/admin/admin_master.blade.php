<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{asset('backend/images/favicon.ico')}}">

    <title>Sunny Admin - Dashboard</title>

    <!-- Vendors Style-->
    <link rel="stylesheet" href="{{asset('backend/css/vendors_css.css')}}">

    <!-- Style-->
    <link rel="stylesheet" href="{{asset('backend/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('backend/css/skin_color.css')}}">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body class="hold-transition light-skin sidebar-mini theme-primary fixed">

    <div class="wrapper">
        <!-- ini header awal -->
        @include('admin.body.header')
        <!-- ini header akhir -->

        <!-- Left side column. contains the logo and sidebar -->
        @include('admin.body.sidebar')
        <!-- Content Wrapper. Contains page content -->
        @yield('admin')
        <!-- /.content-wrapper -->
        @include('admin.body.footer')

        <!-- Control Sidebar -->
        @include('admin.body.sidebar_control')
        <!-- /.control-sidebar -->

        <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>

    </div>
    <!-- ./wrapper -->


    <!-- Vendor JS -->
    <script src="{{asset('backend/js/vendors.min.js')}}"></script>
    <script src="{{asset('assets/icons/feather-icons/feather.min.js')}}"></script>
    <script src="{{asset('assets/vendor_components/easypiechart/dist/jquery.easypiechart.js')}}"></script>
    <script src="{{asset('assets/vendor_components/apexcharts-bundle/irregular-data-series.js')}}"></script>
    <script src="{{asset('assets/vendor_components/apexcharts-bundle/dist/apexcharts.js')}}"></script>
    <!-- <script src="{{asset('assets/vendor_components/datatable/datatables.min.js')}}"></script> -->


    <!-- Sunny Admin App -->
    <script src="{{asset('backend/js/template.js')}}"></script>
    <script src="{{asset('backend/js/pages/dashboard.js')}}"></script>
    <!-- <script src="{{asset('backend/js/pages/data-table.js')}}"></script> -->



</body>
<script type="text/javascript">
    $(function() {
        $(document).on('click', '#delete', function(e) {
            e.preventDefault();
            var link = $(this).attr('href');
            Swal.fire({
                title: 'Apakah kamu Yakin?',
                text: "Data Ini Akan Dihapus Permanen",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Iya hapus data ini'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = link
                    Swal.fire(
                        'terhapus!',
                        'data berhasil dihapus',
                        'success'
                    )
                }
            })
        })

    })
</script>

</html>