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
                    <th width="30">No.</th>
                    <th>Request Id</th>
                    <th>tgl Pengajuan</th>
                    <th>Status</th>
                    <th>Total Estimasi Harga</th>
                    <?php if (is_admin() == true) { ?>
                        <th>Aksi</th>
                    <?php } ?>
                </tr>
            </thead>
            <tbody>
                <?php if (count($requests) > 0): ?>
                    <?php foreach ($requests as $key => $request): ?>
                        <tr>
                            <td><?= $key + 1; ?></td>
                            <td><a href="<?= base_url('request/detail_permintaan/') . $request['request_id'] ?>"><?= $request['request_id'] ?></a></td>
                            <td><?= $request['tgl_pengajuan']; ?></td>
                            <td><?= $request['status']; ?></td>
                            <td>Rp. <?= number_format($request['total_estimasi_harga'], 0, ',', '.'); ?></td>
                            <?php if (is_admin() == true) { ?>
                                <td>

                                    <!-- <a href="<?= base_url('dpermintaan/edit/') . $request['id'] ?>" class="btn btn-circle btn-sm btn-warning"><i class="fa fa-fw fa-edit"></i></a> -->
                                    <a onclick="return confirm('Yakin ingin menghapus data?')" href="<?= base_url('dpermintaan/delete/') . $request['id'] ?>" class="btn btn-circle btn-sm btn-danger"><i class="fa fa-fw fa-trash"></i></a>
                                </td>s
                            <?php } ?>

                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="text-center">Tidak ada data permintaan</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>