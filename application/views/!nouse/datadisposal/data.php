<?= $this->session->flashdata('pesan'); ?>
<div class="card shadow-sm mb-4 border-bottom-primary">
    <div class="card-header bg-white py-3">
        <div class="row">
            <div class="col">
                <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                    Data Disposal Aset
                </h4>
                <?php if (is_admin() == true) { ?>
                    <br>
                    <?php //$this->session->flashdata('pesan'); 
                    ?>
                    <form method="get" action="<?= base_url() ?>datadisposal/">
                        <div class="row" style="margin-left: 20px;">
                            <label>Pilih Unit</label>
                            <div class="col-3">

                                <select class="form-control" name="lokasi">
                                    <option value="Kantor Yayasan Diannanda">--Pilih Unit--</option>
                                    <?php
                                    foreach ($lokasi as $row) { ?>

                                        <option value="<?= $row->lokasi ?>"><?= $row->id ?> : <?= $row->lokasi ?> </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-3">
                                <button class="btn btn-primary" type="submit">Lihat Disposal Aset</button>
                            </div>
                        </div>

                        <br>


                    </form>
                    <br>
                <?php } ?>
            </div>
            <div class="col-auto">
                <a href="<?= base_url('datadisposal/add') ?>" class="btn btn-sm btn-primary btn-icon-split">
                    <span class="icon">
                        <i class="fa fa-user-plus"></i>
                    </span>
                    <span class="text">
                        Tambah Disposal Aset
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
                    <th>Tgl Disposal</th>
                    <th>Jenis Aset</th>
                    <th>Nama Aset</th>
                    <th>Jumlah Unit</th>
                    <th>Merk</th>
                    <th>No Seri</th>
                    <th>Lokasi</th>
                    <th>Ruang</th>
                    <th>Kategori</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                if ($datadisposal) :
                    foreach ($datadisposal as $datadisposalt) :
                ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= date('d-m-Y', strtotime($datadisposalt['tgl_disposal'])); ?></td>
                            <td><?= $datadisposalt['jenis_aset']; ?></td>
                            <td><?= $datadisposalt['nama_aset']; ?></td>
                            <td><?= $datadisposalt['jumlah_unit']; ?></td>
                            <td><?= $datadisposalt['merk']; ?></td>
                            <td><?= $datadisposalt['no_seri']; ?></td>
                            <td><?= $datadisposalt['lokasi']; ?></td>
                            <td><?= $datadisposalt['ruang']; ?></td>
                            <td><?= $datadisposalt['kategori']; ?></td>
                            <td><?= $datadisposalt['keterangan']; ?></td>
                            <td>

                                <a href="<?= base_url('datadisposal/edit/') . $datadisposalt['id'] ?>" class="btn btn-circle btn-sm btn-warning"><i class="fa fa-fw fa-edit"></i></a>

                                <a onclick="return confirm('Yakin ingin menghapus data?')" href="<?= base_url('datadisposal/delete/') . $datadisposalt['id'] ?>" class="btn btn-circle btn-sm btn-danger"><i class="fa fa-fw fa-trash"></i></a>

                            </td>
                        </tr>
                    <?php endforeach;
                else : ?>
                    <tr>
                        <td colspan="11" class="text-center">Silahkan tambahkan Aset baru</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>