<?= $this->session->flashdata('pesan'); ?>
<div class="card shadow-sm mb-4 border-bottom-primary">
    <div class="card-header bg-white py-3">
        <div class="row">
            <div class="col">
                <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                    Daftar catatan
                </h4>
            </div>
            <!-- <div class="col-auto">
                <a href="<?= base_url('catatan/add') ?>" class="btn btn-sm btn-primary btn-icon-split">
                    <span class="icon">
                        <i class="fa fa-plus"></i>
                    </span>
                    <span class="text">
                        Tambah catatan
                    </span>
                </a>
            </div> -->
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped dt-responsive nowrap" id="dataTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Request ID</th>
                    <th>Tanggal Catatan</th>
                    <th>Note</th>
                    <th>Note By</th>
                    <th>Unit</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($catatan)): ?>
                    <?php foreach ($catatan as $index => $note): ?>
                        <tr>
                            <td><?= $index + 1; ?></td>
                            <td><a href="<?= base_url('request/detail_permintaan/') . $note->request_id ?>"><?= $note->request_id; ?></a></td>
                            <td><?= $note->tgl_note; ?></td>
                            <td><?= $note->note; ?></td>
                            <td><?= $note->nama; ?></td>
                            <td><?= $note->unit; ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center">Tidak ada catatan ditemukan</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>