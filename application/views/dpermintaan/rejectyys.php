<?= $this->session->flashdata('pesan'); ?>
<div class="card shadow-sm mb-4 border-bottom-primary">
    <div class="card-header bg-white py-3">
        <div class="row">
            <div class="col">
                <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                    Data permintaan
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
                    <th>Tanggal Pengajuan</th>

                    <th>ID Request</th>
                    <th>Status</th>
                    <th>Unit</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($requests)) : ?>
                    <?php foreach ($requests as $request) : ?>
                        <tr>
                            <td><?= format_indo(date("Y-m-d", strtotime($request->tgl_pengajuan))); ?></td>
                            <td><a href="<?= base_url('request/detail_permintaan/') . $request->request_id ?>"><?= $request->request_id; ?></a></td>
                            <td><?= $request->status; ?></td>
                            <td><?= $request->unit; ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="4" class="text-center">No requests found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>