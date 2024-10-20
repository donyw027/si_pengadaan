<?= $this->session->flashdata('pesan'); ?>
<div class="card shadow-sm mb-4 border-bottom-primary">
    <div class="card-header bg-white py-3">
        <div class="row">
            <div class="col">
                <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                    Approval Log
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
                    <th>Tanggal</th>
                    <th>Request ID</th>
                    <th>Ubah Status</th>
                    <th>Action By</th>
                    <th>Unit</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($decision_logs)) : ?>
                    <?php foreach ($decision_logs as $log) : ?>
                        <tr>
                            <td><?= $log->tgl; ?></td>
                            <td><a href="<?= base_url('request/detail_permintaan/') . $log->request_id ?>"><?= $log->request_id ?></a></td>
                            <td><?= $log->status; ?></td>
                            <td><?= $log->nama; ?></td>
                            <td><?= $log->unit; ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="6" class="text-center">No decision logs found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>