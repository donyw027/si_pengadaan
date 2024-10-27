<?= $this->session->flashdata('pesan'); ?>
<div class="card shadow-sm mb-4 border-bottom-primary">
    <div class="card-header bg-white py-3">
        <div class="row">
            <div class="col">
                <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                    Detail Permintaan
                </h4>
            </div>
            <!-- <div class="col-auto">
                <a href="<?= base_url('autor/add') ?>" class="btn btn-sm btn-primary btn-icon-split">
                    <span class="icon">
                        <i class="fa fa-user-plus"></i>
                    </span>
                    <span class="text">
                        Add Data riwayat_surat_jalan
                    </span>
                </a>
            </div> -->
            <div class="col-auto">
                <a href="<?= base_url('histori_sj') ?>" class="btn btn-sm btn-secondary btn-icon-split">
                    <span class="icon">
                        <i class="fa fa-arrow-left"></i>
                    </span>
                    <span class="text">
                        Kembali
                    </span>
                </a>
            </div>
        </div>
    </div>
    <div class="table-responsive">


        <div class="card mb-4">

            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th style="width: 200px; background-color: #d5e5ff;">Request Id</th>
                        <td>
                            <?php
                            if (!empty($request->request_id)) {
                                echo $request->request_id;
                            } else {
                                echo "-";
                            }
                            ?>
                        </td>
                        <th style="width: 200px; background-color: #d5e5ff;">Tanggal Pengajuan</th>
                        <td><?php
                            if (!empty($request->tgl_pengajuan)) {
                                echo format_indo(date("Y-m-d", strtotime($request->tgl_pengajuan)));
                            } else {
                                echo "-";
                            }
                            ?></td>
                    </tr>
                    <tr>
                        <th style="width: 200px; background-color: #d5e5ff;">Status Pengajuan</th>
                        <td>
                            <?php
                            if (!empty($request->status)) {
                                echo $request->status;
                            } else {
                                echo "-";
                            }
                            ?>
                        </td>
                        <th style="width: 200px; background-color: #d5e5ff;">Total Estimasi Biaya</th>
                        <td style="color: red;"><?php
                                                if (!empty($request->total_estimasi_harga)) {
                                                    echo 'Rp. ' .  number_format($request->total_estimasi_harga, 0, ',', '.');
                                                } else {
                                                    echo "-";
                                                }
                                                ?></td>
                    </tr>


                </table>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                Detail
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr style=" background-color: #d5e5ff;">
                            <th>Kategori</th>
                            <th>Item</th>
                            <th>Spesifikasi</th>
                            <th>Qty</th>
                            <th>Est Harga</th>
                            <th>Sub Est Harga</th>
                            <th>Alasan Pengajuan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($request_item)) : ?>
                            <?php foreach ($request_item as $index => $item) : ?>
                                <tr>
                                    <td><?= $item->kategori; ?></td>
                                    <td><?= $item->nama_item; ?></td>
                                    <td><?= $item->spesifikasi; ?></td>
                                    <td><?= $item->qty; ?></td>
                                    <td>Rp. <?= number_format($item->estimasi_harga, 0, ',', '.'); ?></td>
                                    <td>Rp. <?= number_format($item->sub_estimasi_harga, 0, ',', '.'); ?></td>

                                    <td><?= $item->alasan_permintaan; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="5" class="text-center">No items found.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>


            </div>


        </div>


        <?php if (is_admin() == true || is_yys() == true || is_kepsek() == true) : ?>
            <?php if ($request->status == 'Pending Kepsek' || $request->status == 'Pending Yayasan') : ?>
                <div style="text-align: right; margin: 20px">
                    <?php if (is_admin() == true || is_yys() == true) { ?>
                        <a onclick="return confirm('Yakin ingin Approve Permintaan?')" href="<?= base_url('request/approve_pengadaan/' . $request->request_id); ?>" class="btn btn-success btn-sm">Approve</a>
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#rejectModal" onclick="setRejectModal('<?= $request->request_id; ?>')">Reject</button>
                    <?php } else { ?>
                        <a onclick="return confirm('Yakin ingin Approve Permintaan?')" href="<?= base_url('request/approve/' . $request->request_id); ?>" class="btn btn-success btn-sm">Approve</a>
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#rejectModal" onclick="setRejectModal('<?= $request->request_id; ?>')">Reject</button>
                    <?php } ?>

                </div>
            <?php endif; ?>
        <?php endif; ?>

        <?php if (is_tu() == true and $request->status == 'ACC Yayasan') { ?>
            <div style="text-align: right; margin: 20px">
                <a onclick="return confirm('Konfirmasi Pengadaan diterima?')" href="<?= base_url('request/konfirmasi_request/' . $request->request_id); ?>" class="btn btn-success btn-sm">Konfirmasi Penerimaan</a>
                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#rejectModalPengaduan" onclick="setRejectModal('<?= $request->request_id; ?>')">Pengaduan</button>
            </div>
        <?php  } ?>


    </div>
</div>


<!-- Modal Reject -->
<div class="modal fade" id="rejectModal" tabindex="-1" role="dialog" aria-labelledby="rejectModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="<?= base_url('Request/reject'); ?>" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="rejectModalLabel">Reject Request</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="note">Catatan Penolakan</label>
                        <textarea class="form-control" id="note" name="note" rows="4" required></textarea>
                    </div>
                    <input type="hidden" id="request_id" name="request_id">
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                    <button type="submit" class="btn btn-danger">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="rejectModalPengaduan" tabindex="-1" role="dialog" aria-labelledby="rejectModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="<?= base_url('Request/pengaduan'); ?>" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="rejectModalLabel">Pengaduan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="note">Catatan Pengaduan</label>
                        <textarea class="form-control" id="note" name="note" rows="4" required></textarea>
                    </div>
                    <input type="hidden" id="request_id" name="request_id">
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                    <button type="submit" class="btn btn-danger">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>



<script>
    function setRejectModal(requestId) {
        document.getElementById('request_id').value = requestId;
    }
</script>