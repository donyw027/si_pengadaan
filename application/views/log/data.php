<?= $this->session->flashdata('pesan'); ?>
<div class="card shadow-sm mb-4 border-bottom-primary">
    <div class="card-header bg-white py-3">
        <div class="row">
            <div class="col">
                <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                    Data Log
                </h4>
            </div>
            <!-- <div class="col-auto">
                <a href="<?= base_url('PKWT/add') ?>" class="btn btn-sm btn-primary btn-icon-split">
                    <span class="icon">
                        <i class="fa fa-user-plus"></i>
                    </span>
                    <span class="text">
                        Edit Data PKWT / HRD
                    </span>
                </a>
            </div> -->
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped dt-responsive nowrap" id="dataTable">
            <thead>
                <tr>
                    <th width="30">No.</th>
                    <th>Tanggal</th>
                    <th>Action</th>
                    <th>Aktor</th>
                
                <?php if ($this->session->userdata('login_session')['nama'] == 'Doni') { ?>
                    <th>Aksi</th>
                <?php } ?>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                if ($log) :
                    foreach ($log as $logi) :
                ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $logi['tanggal']; ?></td>
                            <td><?= $logi['aksi']; ?></td>
                            <td><?= $logi['aktor']; ?></td>

                            <?php if ($this->session->userdata('login_session')['nama'] == 'Doni') { ?>
                                <td>
                                <a onclick="return confirm('Yakin ingin menghapus data?')" href="<?= base_url('user/logdelete/') . $logi['id'] ?>" class="btn btn-circle btn-sm btn-danger"><i class="fa fa-fw fa-trash"></i></a>
                            </td>
                <?php } ?>
                            
                        </tr>
                    <?php endforeach;
                else : ?>
                    <tr>
                        <td colspan="8" class="text-center">Silahkan tambahkan log</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>