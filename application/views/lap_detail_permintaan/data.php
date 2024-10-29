<?= $this->session->flashdata('pesan'); ?>
<div class="card shadow-sm mb-4 border-bottom-primary">
    <div class="card-header bg-white py-3">
        <div class="row">
            <div class="col">
                <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                    Data Detail Permintaan Barang Sistem
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
                    <th width="30">No.</th>
                    <th>Request ID</th>
                    <th>Kategori</th>
                    <th>Nama Item</th>
                    <th>Spesifikasi</th>
                    <th>Qty</th>
                    <th>Estimasi Harga</th>
                    <th>Sub Estimasi Harga</th>
                    <th>Alasan Pengajuan</th>

                    <!-- <th>Aksi</th> -->
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                if ($request) :
                    foreach ($request as $requests) :
                ?>
                        <tr>
                            <td><?= $no++; ?></td>

                            <td><a href="<?= base_url('request/detail_permintaan/') . $requests['request_id'] ?>"><?= $requests['request_id'] ?></a></td>
                            <td><?= $requests['kategori']; ?></td>
                            <td><?= $requests['nama_item']; ?></td>
                            <td><?= $requests['spesifikasi']; ?></td>
                            <td><?= $requests['qty']; ?></td>
                            <td>Rp. <?= number_format($requests['estimasi_harga'], 0, ',', '.'); ?></td>
                            <td>Rp. <?= number_format($requests['sub_estimasi_harga'], 0, ',', '.'); ?></td>
                            <td><?= $requests['alasan_permintaan']; ?></td>
                            <!-- <td>

                                <a href="<?= base_url('request/edit/') . $requests['id'] ?>" class="btn btn-circle btn-sm btn-warning"><i class="fa fa-fw fa-edit"></i></a>
                                <a onclick="return confirm('Yakin ingin menghapus data?')" href="<?= base_url('request/delete/') . $requests['id'] ?>" class="btn btn-circle btn-sm btn-danger"><i class="fa fa-fw fa-trash"></i></a>
                            </td> -->
                        </tr>
                    <?php endforeach;
                else : ?>
                    <tr>
                        <td colspan="8" class="text-center">Silahkan tambahkan Data baru</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>