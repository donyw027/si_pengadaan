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
                    <th width="30">No.</th>
                    <th>Request ID</th>
                    <!-- <th>Tgl Pengajuan Unit</th> -->

                    <th>Tanggal Proses Pengadaan</th>
                    <th>Status Pengadaan</th>
                    <th>Tanggal diterima Unit</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                if ($pengadaan) :
                    foreach ($pengadaan as $pengadaans) :
                ?>
                        <tr>
                            <td><?= $no++; ?></td>

                            <td><a href="<?= base_url('request/detail_permintaan/') . $pengadaans['request_id'] ?>"><?= $pengadaans['request_id'] ?></a></td>
                            <td><?= $pengadaans['tgl_pengadaan']; ?></td>
                            <td><?= $pengadaans['status_pengadaan']; ?></td>
                            <td><?= $pengadaans['tgl_diterima']; ?></td>
                            <!-- <td>

                                <a href="<?= base_url('pengadaan/edit/') . $pengadaans['id'] ?>" class="btn btn-circle btn-sm btn-warning"><i class="fa fa-fw fa-edit"></i></a>
                                <a onclick="return confirm('Yakin ingin menghapus data?')" href="<?= base_url('pengadaan/delete/') . $pengadaans['id'] ?>" class="btn btn-circle btn-sm btn-danger"><i class="fa fa-fw fa-trash"></i></a>
                            </td> -->
                        </tr>
                    <?php endforeach;
                else : ?>
                    <tr>
                        <td colspan="8" class="text-center">Silahkan tambahkan pengadaan baru</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>