<?= $this->session->flashdata('pesan'); ?>
<div class="card shadow-sm mb-4 border-bottom-primary">
    <div class="card-header bg-white py-3">
        <div class="row">
            <div class="col">
                <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                    Data lokasi
                </h4>
            </div>
            <div class="col-auto">
                <a href="<?= base_url('lokasi/add') ?>" class="btn btn-sm btn-primary btn-icon-split">
                    <span class="icon">
                        <i class="fa fa-user-plus"></i>
                    </span>
                    <span class="text">
                        Tambah lokasi
                    </span>
                </a>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped dt-responsive nowrap" id="dataTable">
            <thead>
                <tr>
                    <th width="30">No.</th>
                    <th>lokasi</th>

                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                if ($lokasi) :
                    foreach ($lokasi as $lokasii) :
                ?>
                        <tr>
                            <td><?= $no++; ?></td>

                            <td><?= $lokasii['lokasi']; ?></td>
                            <td>

                                <a href="<?= base_url('lokasi/edit/') . $lokasii['id'] ?>" class="btn btn-circle btn-sm btn-warning"><i class="fa fa-fw fa-edit"></i></a>
                                <a onclick="return confirm('Yakin ingin menghapus data?')" href="<?= base_url('lokasi/delete/') . $lokasii['id'] ?>" class="btn btn-circle btn-sm btn-danger"><i class="fa fa-fw fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach;
                else : ?>
                    <tr>
                        <td colspan="8" class="text-center">Silahkan tambahkan lokasi baru</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>