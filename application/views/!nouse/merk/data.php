<?= $this->session->flashdata('pesan'); ?>
<div class="card shadow-sm mb-4 border-bottom-primary">
    <div class="card-header bg-white py-3">
        <div class="row">
            <div class="col">
                <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                    Data merk
                </h4>
            </div>
            <div class="col-auto">
                <a href="<?= base_url('merk/add') ?>" class="btn btn-sm btn-primary btn-icon-split">
                    <span class="icon">
                        <i class="fa fa-user-plus"></i>
                    </span>
                    <span class="text">
                        Tambah merk
                    </span>
                </a>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped dt-responsive nowrap" id="dataTable">
            <thead>
                <tr>
                    <th width="30">No.</th>
                    <th>merk</th>

                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                if ($merk) :
                    foreach ($merk as $merki) :
                ?>
                        <tr>
                            <td><?= $no++; ?></td>

                            <td><?= $merki['merk']; ?></td>
                            <td>

                                <a href="<?= base_url('merk/edit/') . $merki['id'] ?>" class="btn btn-circle btn-sm btn-warning"><i class="fa fa-fw fa-edit"></i></a>
                                <a onclick="return confirm('Yakin ingin menghapus data?')" href="<?= base_url('merk/delete/') . $merki['id'] ?>" class="btn btn-circle btn-sm btn-danger"><i class="fa fa-fw fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach;
                else : ?>
                    <tr>
                        <td colspan="8" class="text-center">Silahkan tambahkan merk baru</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>