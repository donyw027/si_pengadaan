<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm mb-4 border-bottom-primary">
            <div class="card-header bg-white py-3">
                <div class="row">
                    <div class="col">
                        <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                            Form <?= $title; ?>
                        </h4>
                    </div>
                    <div class="col-auto">
                        <a href="<?= base_url('dataaset') ?>" class="btn btn-sm btn-secondary btn-icon-split">
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
            <div class="card-body pb-2">
                <?= $this->session->flashdata('pesan'); ?>
                <?= form_open('', [], ['id' => $dataaset['id']]); ?>
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="jenis_aset">jenis_aset</label>
                    <div class="col-md-6">
                        <input value="<?= set_value('jenis_aset', $dataaset['jenis_aset']); ?>" type="text" id="jenis_aset" name="jenis_aset" class="form-control" placeholder="jenis_aset">
                        <?= form_error('jenis_aset', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="nama_aset">nama_aset</label>
                    <div class="col-md-6">
                        <input value="<?= set_value('nama_aset', $dataaset['nama_aset']); ?>" type="text" id="nama_aset" name="nama_aset" class="form-control" placeholder="nama_aset">
                        <?= form_error('nama_aset', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="jumlah_unit">jumlah_unit</label>
                    <div class="col-md-6">
                        <input value="<?= set_value('jumlah_unit', $dataaset['jumlah_unit']); ?>" type="text" id="jumlah_unit" name="jumlah_unit" class="form-control" placeholder="jumlah_unit">
                        <?= form_error('jumlah_unit', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="merk">merk</label>
                    <div class="col-md-6">
                        <input value="<?= set_value('merk', $dataaset['merk']); ?>" type="text" id="merk" name="merk" class="form-control" placeholder="merk" readonly>
                        <?= form_error('merk', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="tgl_perolehan">tgl_perolehan</label>
                    <div class="col-md-6">
                        <input value="<?= set_value('tgl_perolehan', $dataaset['tgl_perolehan']); ?>" type="text" id="tgl_perolehan" name="tgl_perolehan" class="form-control" placeholder="Jabatan">
                        <?= form_error('tgl_perolehan', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="kondisi">kondisi</label>
                    <div class="col-md-6">
                        <input value="<?= set_value('kondisi', $dataaset['kondisi']); ?>" type="text" id="kondisi" name="kondisi" class="form-control" placeholder="kondisi">
                        <?= form_error('kondisi', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="lokasi">lokasi</label>
                    <div class="col-md-6">
                        <input value="<?= set_value('lokasi', $dataaset['lokasi']); ?>" type="text" id="lokasi" name="lokasi" class="form-control" placeholder="lokasi" readonly>
                        <?= form_error('lokasi', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="ruang">ruang</label>
                    <div class="col-md-6">
                        <input value="<?= set_value('ruang', $dataaset['ruang']); ?>" type="text" id="ruang" name="ruang" class="form-control" placeholder="ruang" readonly>
                        <?= form_error('ruang', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="kategori">kategori</label>
                    <div class="col-md-6">
                        <input value="<?= set_value('kategori', $dataaset['kategori']); ?>" type="text" id="kategori" name="kategori" class="form-control" placeholder="kategori" readonly>
                        <?= form_error('kategori', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="keterangan">keterangan</label>
                    <div class="col-md-6">
                        <input value="<?= set_value('keterangan', $dataaset['keterangan']); ?>" type="text" id="keterangan" name="keterangan" class="form-control" placeholder="keterangan">
                        <?= form_error('keterangan', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                </div>

                <br>
                <div class="row form-group justify-content-end">
                    <div class="col-md-8">
                        <button type="submit" class="btn btn-primary btn-icon-split">
                            <span class="icon"><i class="fa fa-save"></i></span>
                            <span class="text">Simpan</span>
                        </button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>