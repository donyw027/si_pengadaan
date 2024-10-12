<?= $this->session->flashdata('pesan'); ?>
<div class="card shadow-sm mb-4 border-bottom-primary">
    <div class="card-header bg-white py-3">
        <div class="row">
            <div class="col">
                <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                    Data aset
                </h4>
                <?php if (is_admin() == true) { ?>
                    <br>
                    <?php //$this->session->flashdata('pesan'); 
                    ?>
                    <form method="get" action="<?= base_url() ?>dataaset/">
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
                                <button class="btn btn-primary" type="submit">Lihat Aset Unit</button>
                            </div>
                        </div>

                        <br>


                    </form>
                    <br>
                <?php } ?>
            </div>
            <div class="col-auto">
                <a href="<?= base_url('dataaset/add') ?>" class="btn btn-sm btn-primary btn-icon-split">
                    <span class="icon">
                        <i class="fa fa-user-plus"></i>
                    </span>



                    <span class="text">
                        Tambah Aset
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

                    <!-- <th>qr</th> -->
                    <th>Tgl Perolehan</th>

                    <th>Jenis Aset</th>
                    <th>No Barcode</th>

                    <th>Nama Aset</th>
                    <th>Jumlah Aset</th>
                    <th>Merk</th>
                    <th>Kondisi</th>
                    <th>Lokasi</th>
                    <th>Ruang</th>
                    <th>Kategori</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $kodenya = 'doni';
                $no = 1;
                if ($dataaset) :
                    foreach ($dataaset as $dataasett) :
                        // print_r($dataasett);
                        // die();
                ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <!-- <td><img src="<?php echo site_url('dataaset/qrcode' . $kodenya) ?>" alt=""></td> -->
                            <td><?= date('d-m-Y', strtotime($dataasett['tgl_perolehan'])); ?></td>

                            <td><?= $dataasett['jenis_aset']; ?></td>
                            <td><?= $dataasett['no_barcode']; ?></td>
                            <td><?= $dataasett['nama_aset']; ?></td>
                            <td><?= $dataasett['jumlah_unit']; ?></td>
                            <td><?= $dataasett['merk']; ?></td>
                            <td><?= $dataasett['kondisi']; ?></td>

                            <td><?= $dataasett['lokasi']; ?></td>
                            <td><?= $dataasett['ruang']; ?></td>
                            <td><?= $dataasett['kategori']; ?></td>
                            <td><?= $dataasett['keterangan']; ?></td>

                            <td>
                                <a href="<?= base_url('dataaset/edit/') . $dataasett['id'] ?>" class="btn btn-circle btn-sm btn-warning"><i class="fa fa-fw fa-edit"></i></a>

                                <a onclick="return confirm('Yakin ingin menghapus data?')" href="<?= base_url('dataaset/delete/') . $dataasett['id'] ?>" class="btn btn-circle btn-sm btn-danger"><i class="fa fa-fw fa-trash"></i></a>

                                <a href="<?= base_url('dataaset/printqrcode/') .  $dataasett['nama_aset'] . " || " .  $dataasett['no_barcode'] . " || " . $dataasett['lokasi'] . " || " . $dataasett['ruang'] . " || " . $dataasett['tgl_perolehan']  ?>" class="btn btn-circle btn-sm btn-warning" target="_blank"><i class=" fa fa-fw fa-print"></i></a>
                            </td>

                        </tr>
                    <?php endforeach;
                else : ?>
                    <tr>
                        <td colspan="12" class="text-center">Silahkan tambahkan Aset baru</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>