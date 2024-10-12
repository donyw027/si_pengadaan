<?= $this->session->flashdata('pesan'); ?>
<div class="card shadow-sm mb-4 border-bottom-primary">
    <div class="card-header bg-white py-3">
        <div class="row">
            <div class="col">
                <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                    Data aset
                </h4>

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