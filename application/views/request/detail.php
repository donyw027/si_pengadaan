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
                            <th>Item</th>
                            <th>Deskripsi</th>
                            <th>Qty</th>
                            <th>Remark</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($request_item)) : ?>
                            <?php foreach ($request_item as $index => $item) : ?>
                                <tr>
                                    <td><?= $item->kategori; ?></td>
                                    <td><?= $item->kategori; ?></td>
                                    <td><?= $item->qty; ?></td>
                                    <td><?= $item->kategori; ?></td>
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

        <?php if (is_admin() == true || is_yys() == true || is_kepsek() == true) { ?>

            <div style="text-align: right;">
                <a style="margin: 0px; " href="<?= base_url('request/approve/' . $request->request_id); ?>" class="btn btn-success btn-sm">Approve</a>
                <a style="margin: 20px;" href="<?= base_url('request/reject/' . $request->request_id); ?>" class="btn btn-danger btn-sm">Reject</a>
            </div>

        <?php } ?>

    </div>
</div>