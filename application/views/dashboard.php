 <div class="row">


     <?php
        $role = $this->session->userdata('login_session')['role'];
        $yang_login = $this->session->userdata('login_session')['nama'];
        ?>
     <div class="col-xl-12 ">
         <div class="card shadow mb-4">
             <!-- Card Header - Dropdown -->
             <div class="card-header bg-primary py-3 d-flex flex-row align-items-center justify-content-between">
                 <h3 class="m-0 font-weight-bold text-white">Selamat datang <font style="color:yellow;"><?= $yang_login ?></font> <br> di Sistem Informasi Pengadaan Barang Yayasan Diannanda </h3>
             </div>
             <!-- Card Body -->

         </div>

         <?php if ($this->session->userdata('login_session')['nama'] == 'doni') : ?>

             <div class="col-xl-12">
                 <div class="card shadow mb-4">
                     <!-- Card Header - Dropdown -->
                     <div class="card-header bg-dark py-3 d-flex flex-row align-items-center justify-content-between">
                         <h5 class="m-0 font-weight-bold text-white">Last Update Pada <?= $log->tanggal ?> <br> <?= $log->aktor ?> Melakukan <?= $log->aksi ?> </h5>
                     </div>
                     <!-- Card Body -->

                 </div>
             </div>
         <?php endif; ?>
     </div>
     <div class="col-xl-4 col-6 mb-4">
         <div class="card border-left-primary shadow h-100 py-2">
             <div class="card-body">
                 <div class="row no-gutters align-items-center">
                     <div class="col mr-2">
                         <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Role</div>
                         <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $role; ?></div>
                     </div>
                     <div class="col-auto">
                         <i class="fas fa-folder fa-2x text-gray-300"></i>
                     </div>
                 </div>
             </div>
         </div>
     </div>


     <div class="col-xl-4 col-6 mb-4">
         <div class="card border-left-success shadow h-100 py-2">
             <div class="card-body">
                 <div class="row no-gutters align-items-center">
                     <div class="col mr-2">
                         <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Date</div>
                         <?php date_default_timezone_set("Asia/Jakarta"); ?>

                         <div class="h5 mb-0 font-weight-bold text-gray-800"><?= date('D , d-M-Y | h:i'); ?></div>
                     </div>
                     <div class="col-auto">
                         <i class="fas fa-calendar fa-2x text-gray-300"></i>
                     </div>
                 </div>
             </div>
         </div>
     </div>

     <div class="col-xl-4 col-6 mb-4">
         <div class="card border-left-warning shadow h-100 py-2">
             <div class="card-body">
                 <div class="row no-gutters align-items-center">
                     <div class="col mr-2">
                         <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total User</div>
                         <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $user; ?></div>
                     </div>
                     <div class="col-auto">
                         <i class="fas fa-user-plus fa-2x text-gray-300"></i>
                     </div>
                 </div>
             </div>
         </div>
     </div>


     <div class="col-xl-4 col-6 mb-4">
         <div class="card border-left-warning shadow h-100 py-2">
             <div class="card-body">
                 <div class="row no-gutters align-items-center">
                     <div class="col mr-2">
                         <div class="text-xs font-weight-bold text-warning text-uppercase mb-1"> Request Approval Pengadaan Unit</div>
                         <div class="h5 mb-0 font-weight-bold text-gray-800">

                             <a href="<?= base_url('dpermintaan/approve_permintaan/') ?>"><?= $pending_yayasan; ?></a>
                         </div>
                     </div>
                     <div class="col-auto">
                         <i class="fas fa-folder fa-2x text-gray-300"></i>
                     </div>
                 </div>
             </div>
         </div>
     </div>


     <div class="col-xl-4 col-6 mb-4">
         <div class="card border-left-primary shadow h-100 py-2">
             <div class="card-body">
                 <div class="row no-gutters align-items-center">
                     <div class="col mr-2">
                         <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Data ACC Permintaan </div>
                         <div class="h5 mb-0 font-weight-bold text-gray-800">

                             <a href="<?= base_url('request/AccYayasan/') ?>"><?= $acc_yayasan; ?></a>
                         </div>
                     </div>
                     <div class="col-auto">
                         <i class="fas fa-folder fa-2x text-gray-300"></i>
                     </div>
                 </div>
             </div>
         </div>
     </div>


     <div class="col-xl-4 col-6 mb-4">
         <div class="card border-left-success shadow h-100 py-2">
             <div class="card-body">
                 <div class="row no-gutters align-items-center">
                     <div class="col mr-2">
                         <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Data Reject Permintaan </div>
                         <?php date_default_timezone_set("Asia/Jakarta"); ?>

                         <div class="h5 mb-0 font-weight-bold text-gray-800">
                             <a href="<?= base_url('request/RejectYayasan/') ?>"> <?= $reject_yayasan; ?></a>

                         </div>
                     </div>
                     <div class="col-auto">
                         <i class="fas fa-folder fa-2x text-gray-300"></i>
                     </div>
                 </div>
             </div>
         </div>
     </div>

     <div class="col-xl-12 col-12 mb-12">
         <div class="card border-left-success shadow h-100 py-2">
             <div class="card-body">
                 <div class="row no-gutters align-items-center">
                     <div class="col mr-2">
                         <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Pengadaan Barang</div>
                         <?php date_default_timezone_set("Asia/Jakarta"); ?>

                         <div class="h5 mb-0 font-weight-bold text-gray-800">

                             <a href="<?= base_url('request/pengadaan_list/') ?>"> <?= $pengadaan; ?></a>
                         </div>
                     </div>
                     <div class="col-auto">
                         <i class="fas fa-folder fa-2x text-gray-300"></i>
                     </div>
                 </div>
             </div>
         </div>
     </div>




 </div>

 <!-- <div class="row">



     <div class="col-xl-6 col-6 mb-4">
         <div class="card border-left-primary shadow h-100 py-2">
             <div class="card-body">
                 <div class="row no-gutters align-items-center">
                     <div class="col mr-2">
                         <div class="text-xl font-weight-bold text-primary text-uppercase mb-1">Data Jumlah Aset</div>


                     </div>

                 </div>
             </div>
         </div>
     </div>


     <div class="col-xl-6 col-6 mb-4">
         <div class="card border-left-success shadow h-100 py-2">
             <div class="card-body">
                 <div class="row no-gutters align-items-center">
                     <div class="col mr-2">
                         <div class="text-xl font-weight-bold text-primary text-uppercase mb-1">Data Jumlah Disposal Aset</div>


                     </div>

                 </div>
             </div>
         </div>
     </div>



 </div> -->


 <!-- </div>
        </div>
    </div>

</div>   -->