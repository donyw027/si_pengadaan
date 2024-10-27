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
                <a href="<?= base_url('dpermintaan/add') ?>" class="btn btn-sm btn-primary btn-icon-split">
                    <span class="icon">
                        <i class="fa fa-plus"></i>
                    </span>
                    <span class="text">
                        Tambah permintaan
                    </span>
                </a>
            </div> -->
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-striped dt-responsive nowrap" id="dataTable">
            <thead>
                <tr>
                    <!-- <th>ID</th> -->
                    <th>Unit</th>
                    <th>Request ID</th>
                    <th>Tgl Pengajuan</th>
                    <th>Tgl Pengadaan</th>
                    <th>Status Pengadaan</th>
                    <th>Tgl Diterima</th>
                    <th>Nama Penerima</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($pengadaan)): ?>
                    <?php foreach ($pengadaan as $p): ?>
                        <tr>
                            <!-- <td><?= $p->id; ?></td> -->
                            <td><?= $p->unit; ?></td>
                            <td><a href="<?= base_url('request/detail_permintaan/') . $p->request_id ?>"><?= $p->request_id ?></a></td>
                            <td><?= $p->tgl_pengajuan; ?></td>
                            <td><?= $p->tgl_pengadaan; ?></td>
                            <td><?= $p->status_pengadaan; ?></td>
                            <td><?= $p->tgl_diterima; ?></td>
                            <td><?= $p->nama_penerima; ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="8" class="text-center">No data available.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>