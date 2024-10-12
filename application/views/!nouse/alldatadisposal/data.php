<?= $this->session->flashdata('pesan'); ?>
<div class="card shadow-sm mb-4 border-bottom-primary">
    <div class="card-header bg-white py-3">
        <div class="row">
            <div class="col">
                <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                    Data Disposal Aset
                </h4>

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