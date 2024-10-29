<?= $this->session->flashdata('pesan'); ?>
<div class="card shadow-sm mb-4 border-bottom-primary">
    <div class="card-header bg-white py-3">
        <div class="row">
            <div class="col">
                <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                    Data Pengadaan
                </h4>
            </div>
            <!-- <div class="col-auto">
                <a href="<?= base_url('coa/add') ?>" class="btn btn-sm btn-primary btn-icon-split">
                    <span class="icon">
                        <i class="fa fa-plus"></i>
                    </span>
                    <span class="text">
                        Tambah Coa
                    </span>
                </a>
            </div> -->
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped dt-responsive nowrap" id="dataTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Request ID</th>
                    <th>Tanggal Pengajuan</th>

                    <th>Tanggal Pengadaan</th>
                    <th>Status Pengadaan</th>
                    <th>Tanggal Diterima</th>
                    <th>Aksi</th>
                    <!-- <th>Nama Penerima</th> -->
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($pengadaan)): ?>
                    <?php foreach ($pengadaan as $item): ?>
                        <tr>
                            <td><?= $item->id ?></td>
                            <td><a href="<?= base_url('request/detail_permintaan/') . $item->request_id ?>"><?= $item->request_id ?></a></td>
                            <td><?= $item->tgl_pengajuan ?></td>
                            <td><?= $item->tgl_pengadaan ?></td>
                            <td><?= $item->status_pengadaan ?></td>
                            <td><?= $item->tgl_diterima ?></td>
                            <td>

                                <a href="<?= base_url('dpermintaan/print_data_pengadaan/') . $item->request_id ?>" class="btn btn-circle btn-sm btn-warning" target="_blank"><i class="fa fa-fw fa-print"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="8" class="text-center">Data pengadaan tidak tersedia.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>