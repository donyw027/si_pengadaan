<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title><?= $title; ?> | Sistem Informasi Pengadaan Barang</title>
    <link rel="icon" href="<?= base_url('assets/img/xto.ico'); ?>">

    <!-- Custom fonts for this template-->
    <link href="<?= base_url(); ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url(); ?>assets/css/fonts.min.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url(); ?>assets/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Datepicker -->
    <link href="<?= base_url(); ?>assets/vendor/daterangepicker/daterangepicker.css" rel="stylesheet">




    <!-- DataTables -->
    <link href="<?= base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/vendor/datatables/buttons/css/buttons.bootstrap4.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/vendor/datatables/responsive/css/responsive.bootstrap4.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/vendor/gijgo/css/gijgo.min.css" rel="stylesheet">

    <style>
        #accordionSidebar,
        .topbar {
            z-index: 1;
        }
    </style>

</head>

<body id="page-top">
    <?php date_default_timezone_set("Asia/Jakarta"); ?>



    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-white sidebar sidebar-light accordion shadow-sm" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex text-white align-items-center bg-primary justify-content-center" href="">
                <div class="sidebar-brand-icon">
                    <!-- <i class="fas fa-school"></i> -->
                    <img src="<?= base_url('assets/img/xto.png'); ?>" width="65px" height="65px" alt="">

                </div>
                <div class="sidebar-brand-text mx-3">SI Pengadaan</div>
            </a>

            <!-- Nav Item - Dashboard -->
            <?php
            if (is_admin() == true) { ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('dashboard'); ?>">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard (SU)</span>
                    </a>
                </li>
                <hr class="sidebar-divider">

            <?php } ?>

            <?php
            if (is_tu() == true) { ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('dashboard'); ?>">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard (TU)</span>
                    </a>
                </li>
            <?php } ?>

            <?php
            if (is_kepsek() == true) { ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('dashboard'); ?>">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard (KS)</span>
                    </a>
                </li>
            <?php } ?>

            <?php
            if (is_yys() == true) { ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('dashboard'); ?>">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard (YYS)</span>
                    </a>
                </li>
                <hr class="sidebar-divider">

            <?php } ?>






            <!-- <li class="nav-item">
                <a class="nav-link" href="<?= base_url('dashboard'); ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li> -->





            <?php if (is_admin() == true || is_yys() == true) { ?>
                <div class="sidebar-heading">
                    Data Master
                </div>
                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <!-- <a class="nav-link collapsed " href="#" data-toggle="collapse" data-target="#collapseMaster" aria-expanded="true" aria-controls="collapseMaster">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Data Master</span>
                    </a> -->
                    <!-- <div id="collapseMaster" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-light py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Master Data</h6>
                            <a class="collapse-item" href="<?= base_url('coa'); ?>">Coa</a>
                            <a class="collapse-item" href="<?= base_url('merk'); ?>">Acc Permintaan</a>
                            <a class="collapse-item" href="<?= base_url('kategori'); ?>">Reject Permintaan</a>
                        </div>
                    </div> -->

                    <!-- <li class="nav-item">
                    <a class="nav-link pb-0" href="<?= base_url('coa'); ?>">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Coa</span>
                    </a>
                </li> -->

                <li class="nav-item">
                    <a class="nav-link pb-0" href="<?= base_url('request/AccYayasan'); ?>">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Acc Permintaan</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link pb-0" href="<?= base_url('request/RejectYayasan'); ?>">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Reject Permintaan</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link pb-0" href="<?= base_url('request/catatan'); ?>">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Catatan Unit</span>
                    </a>
                </li>
            <?php }  ?>
            <br>
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Transaksi
            </div>

            <?php if (is_tu() == true) { ?>



                <!-- Nav Item - Dashboard -->
                <li class="nav-item">
                    <a class="nav-link pb-0" href="<?= base_url('request'); ?>">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Permintaan Pengadaan</span>
                    </a>
                </li>


                <li class="nav-item">
                    <a class="nav-link pb-0" href="<?= base_url('request/pengadaan_list'); ?>">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Konfirmasi Penerimaan </span>
                    </a>
                </li>
            <?php
            }
            ?>

            <?php if (is_kepsek() == true) { ?>

                <li class="nav-item">
                    <a class="nav-link pb-0" href="<?= base_url('dpermintaan/approve_permintaan'); ?>">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Approval Request</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link pb-0" href="<?= base_url('request/decision_log'); ?>">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Approval Log</span>
                    </a>
                </li>
            <?php } ?>

            <?php if (is_tu() == true || is_kepsek() == true) { ?>

                <li class="nav-item">
                    <a class="nav-link pb-0" href="<?= base_url('request/pending'); ?>">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Pending Request</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link pb-0" href="<?= base_url('request/catatan'); ?>">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Catatan Permintaan</span>
                    </a>
                </li>
            <?php } ?>

            <?php if (is_yys() == true || is_admin() == true) { ?>

                <li class="nav-item">
                    <a class="nav-link pb-0" href="<?= base_url('dpermintaan/approve_permintaan'); ?>">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Approval Data Permintaan</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link pb-0" href="<?= base_url('request/pengadaan_list'); ?>">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Pengadaan Barang</span>
                    </a>
                </li>
            <?php } ?>



            <br>

            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                Reporting
            </div>

            <?php if (is_tu() == true || is_kepsek() == true) { ?>

                <li class="nav-item">
                    <a class="nav-link pb-0" href="<?= base_url('dpermintaan'); ?>">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Data Permintaan</span>
                    </a>
                </li>
            <?php } ?>

            <?php if (is_admin() == true || is_yys() == true) { ?>

                <li class="nav-item">
                    <a class="nav-link pb-0" href="<?= base_url('dataaset/semuaaset'); ?>">
                        <i class="fas fa-fw fa-print"></i>
                        <span>Lap. Permintaan Barang</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link pb-0" href="<?= base_url('datadisposal/semuadisposal'); ?>">
                        <i class="fas fa-fw fa-print"></i>
                        <span>Lap. Detail Permintaan </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link pb-0" href="<?= base_url('dataaset/semuaaset'); ?>">
                        <i class="fas fa-fw fa-print"></i>
                        <span>Lap. Pengadaan Barang</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link pb-0" href="<?= base_url('datadisposal/semuadisposal'); ?>">
                        <i class="fas fa-fw fa-print"></i>
                        <span>Lap. Detail Pengadaan </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link pb-0" href="<?= base_url('request/decision_log'); ?>">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Approval Log</span>
                    </a>
                </li>
            <?php } ?>
            <br>




            <hr class="sidebar-divider">


            <?php if (is_admin() == true) { ?>
                <div class="sidebar-heading">
                    Settings
                </div>






                <li class="nav-item">
                    <a class="nav-link pb-0" href="<?= base_url('request/decision_log'); ?>">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Approval Log</span>
                    </a>
                </li>

                <?php if ($this->session->userdata('login_session')['nama'] == 'doni') { ?>
                    <li class="nav-item">
                        <a class="nav-link pb-0" href="<?= base_url('user/log'); ?>">
                            <i class="fas fa-fw fa-folder"></i>
                            <span>Log Sistem</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('user'); ?>">
                            <i class="fas fa-fw fa-user-plus"></i>
                            <span>User Management</span>
                        </a>
                    </li>
                <?php  } ?>
            <?php  } ?>




            <!-- Divider -->
            <!-- Heading -->


            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- <div class="text-center d-none d-md-inline">
                <img src="<?= base_url('assets/img/xto.png'); ?>" width="90px" height="90px"  alt="" >
            </div> -->



        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-dark bg-primary topbar mb-4 static-top shadow-sm">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link bg-transparent d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars text-white"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline small text-capitalize">
                                    <?= userdata('nama'); ?>
                                </span>
                                <img class="img-profile rounded-circle" src="<?= base_url() ?>assets/img/avatar/<?= userdata('foto'); ?>">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="<?= base_url('profile'); ?>">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <!-- <a class="dropdown-item" href="<?= base_url('profile/setting'); ?>">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a> -->
                                <a class="dropdown-item" href="<?= base_url('profile/ubahpassword'); ?>">
                                    <i class="fas fa-lock fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Change Password
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

                    <?= $contents; ?>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-light">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Sistem Informasi Pengadaan Barang | IT Yayasan Diannanda 2023</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Yakin ingin logout?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Klik "Logout" dibawah ini jika anda yakin ingin logout.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batalkan</button>
                    <a class="btn btn-primary" href="<?= base_url('logout'); ?>">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url(); ?>assets/js/sb-admin-2.min.js"></script>

    <!-- Datepicker -->
    <script src="<?= base_url(); ?>assets/vendor/daterangepicker/moment.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/daterangepicker/daterangepicker.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?= base_url(); ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/datatables/buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/datatables/buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/datatables/jszip/jszip.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/datatables/pdfmake/pdfmake.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/datatables/pdfmake/vfs_fonts.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/datatables/buttons/js/buttons.html5.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/datatables/buttons/js/buttons.print.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/datatables/buttons/js/buttons.colVis.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/datatables/responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/datatables/responsive/js/responsive.bootstrap4.min.js"></script>

    <script src="<?= base_url(); ?>assets/vendor/gijgo/js/gijgo.min.js"></script>

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
                buttons: ['copy', 'print', 'excel', 'pdf'],
                dom: "<'row px-2 px-md-4 pt-2'<'col-md-3'l><'col-md-5 text-center'B><'col-md-4'f>>" +
                    "<'row'<'col-md-12'tr>>" +
                    "<'row px-2 px-md-4 py-3'<'col-md-5'i><'col-md-7'p>>",
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

        $(document).ready(function() {
            var table = $('#dataTable1').DataTable({
                buttons: [],
                dom: "<'row px-2 px-md-4 pt-2'<'col-md-3'l><'col-md-5 text-center'B><'col-md-4'f>>" +
                    "<'row'<'col-md-12'tr>>" +
                    "<'row px-2 px-md-4 py-3'<'col-md-5'i><'col-md-7'p>>",
                lengthMenu: [
                    [25, 50, 100, -1],
                    [25, 50, 100, "All"]
                ],
                columnDefs: [{
                    targets: -1,
                    orderable: false,
                    searchable: false
                }]
            });

            table.buttons().container().appendTo('#dataTable_wrapper .col-md-5:eq(0)');
        });

        $(document).ready(function() {
            var table = $('#dataTable2').DataTable({
                buttons: [],
                dom: "<'row px-2 px-md-4 pt-2'<'col-md-3'l><'col-md-5 text-center'B><'col-md-4'f>>" +
                    "<'row'<'col-md-12'tr>>",
                lengthMenu: [
                    [25, 50, 100, -1],
                    [25, 50, 100, "All"]
                ],
                columnDefs: [{
                    targets: -1,
                    orderable: false,
                    searchable: false
                }]
            });

            table.buttons().container().appendTo('#dataTable_wrapper .col-md-5:eq(0)');
        });

        $(document).ready(function() {
            var table = $('#dataTable4').DataTable({
                buttons: [],
                dom: "<'row px-2 px-md-4 pt-2'<'col-md-3'l><'col-md-5 text-center'B><'col-md-4'f>>" +
                    "<'row'<'col-md-11'tr>>",
                lengthMenu: [
                    [5, 25, 50, 100, -1],
                    [5, 25, 50, 100, "All"]
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


    <?php if ($this->uri->segment(1) == 'dashboard') : ?>
        <!-- Chart -->
        <script src="<?= base_url(); ?>assets/vendor/chart.js/Chart.min.js"></script>


    <?php endif; ?>
</body>

</html>