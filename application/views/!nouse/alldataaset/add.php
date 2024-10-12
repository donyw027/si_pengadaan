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
                        <a href="<?= base_url('user') ?>" class="btn btn-sm btn-secondary btn-icon-split">
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
                <?= form_open(); ?>

                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="tgl_perolehan">tgl_perolehan</label>
                    <div class="col-md-6">
                        <input value="<?= set_value('tgl_perolehan'); ?>" type="date" id="tgl_perolehan" name="tgl_perolehan" class="form-control" placeholder="tgl_perolehan">
                        <?= form_error('tgl_perolehan', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="jenis_aset">jenis_aset</label>
                    <div class="col-md-6">
                        <input value="<?= set_value('jenis_aset'); ?>" type="text" id="jenis_aset" name="jenis_aset" class="form-control" placeholder="jenis_aset">
                        <?= form_error('jenis_aset', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="nama_aset">nama_aset</label>
                    <div class="col-md-6">
                        <input value="<?= set_value('nama_aset'); ?>" type="text" id="nama_aset" name="nama_aset" class="form-control" placeholder="nama_aset">
                        <?= form_error('nama_aset', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="jumlah_unit">jumlah_unit</label>
                    <div class="col-md-6">
                        <input value="<?= set_value('jumlah_unit'); ?>" type="text" id="jumlah_unit" name="jumlah_unit" class="form-control" placeholder="jumlah_unit">
                        <?= form_error('jumlah_unit', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="merk">merk</label>
                    <div class="col-md-6">
                        <select class="form-control" name="merk">
                            <option>--Pilih merk--</option>
                            <?php
                            foreach ($merk as $row) { ?>

                                <option value="<?= $row->merk ?>"><?= $row->merk ?> </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>



                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="kondisi">kondisi</label>
                    <div class="col-md-6">
                        <input value="<?= set_value('kondisi'); ?>" type="text" id="kondisi" name="kondisi" class="form-control" placeholder="kondisi">
                        <?= form_error('kondisi', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="lokasi">lokasi</label>
                    <div class="col-md-6">
                        <select class="form-control" name="lokasi">
                            <option>--Pilih lokasi--</option>
                            <?php
                            foreach ($lokasi as $row) { ?>

                                <option value="<?= $row->lokasi ?>"><?= $row->lokasi ?> </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="ruang">ruang</label>
                    <div class="col-md-6">
                        <select class="form-control" name="ruang">
                            <option>--Pilih ruang--</option>
                            <?php
                            foreach ($ruang as $row) { ?>

                                <option value="<?= $row->ruang ?>"><?= $row->ruang ?> </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="kategori">kategori</label>
                    <div class="col-md-6">
                        <select class="form-control" name="kategori">
                            <option>--Pilih kategori--</option>
                            <?php
                            foreach ($kategori as $row) { ?>

                                <option value="<?= $row->kategori ?>"><?= $row->kategori ?> </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="keterangan">keterangan</label>
                    <div class="col-md-6">
                        <textarea value="<?= set_value('keterangan'); ?>" type="text" id="keterangan" name="keterangan" class="form-control" placeholder="keterangan"></textarea>
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
                        <button type="reset" class="btn btn-secondary">
                            Reset
                        </button>
                    </div>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>