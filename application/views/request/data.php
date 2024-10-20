<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card shadow-sm mb-4 border-bottom-primary">
            <div class="card-header bg-white py-3">
                <div class="row">
                    <div class="col">
                        <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                            Form <?= $title; ?>
                        </h4>
                    </div>
                    <div class="col-auto">
                        <a href="<?= base_url('dashboard') ?>" class="btn btn-sm btn-secondary btn-icon-split">
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
            <div class="card-body">
                <?= $this->session->flashdata('pesan'); ?>
                <?= form_open(); ?>




                <div class="row">
                    <div style="margin-bottom: 50px;" class="col-md-12">



                        <div class="row form-group">
                            <label class="col-2 text-md-right" for="tgl_pengajuan">Tanggal Pengajuan</label>
                            <div class="col-md-5">
                                <input value="<?= set_value('tgl_pengajuan'); ?>" type="date" id="tgl_pengajuan" name="tgl_pengajuan" class="form-control" placeholder="Masukan tgl_pengajuan">
                                <?= form_error('tgl_pengajuan', '<span class="text-danger small">', '</span>'); ?>
                            </div>
                        </div>

                        <?php
                        $re_id = strtotime('now');
                        $unit = $this->session->userdata('login_session')['no_telp'];

                        ?>

                        <div class="row form-group">
                            <label class="col-2 text-md-right" for="request_id">Request Id</label>
                            <div class="col-md-5">
                                <input value="<?= $unit . '_' . $re_id; ?>" type="text" id="request_id" name="request_id" class="form-control" placeholder="Masukan Request Id" readonly>
                                <?= form_error('request_id', '<span class="text-danger small">', '</span>'); ?>
                            </div>
                        </div>









                    </div>

                    <!-- <div   class="col-md-6">




                        <div class="row form-group">
                            <label class="col-3 text-md-right" for="inv_no">inv_no</label>
                            <div class="col-md-9">
                                <input value="<?= set_value('inv_no'); ?>" type="text" id="inv_no" name="inv_no" class="form-control" placeholder="Masukan inv_no">
                                <?= form_error('inv_no', '<span class="text-danger small">', '</span>'); ?>
                            </div>
                        </div>



                        <div class="row form-group">
                            <label class="col-3 text-md-right" for="author">author</label>
                            <div class="col-md-9">
                                <input value="<?= set_value('author'); ?>" type="text" id="author" name="author" class="form-control" placeholder="Masukan author">

                                <?= form_error('author', '<span class="text-danger small">', '</span>'); ?>
                            </div>
                        </div>

                        <div class="row form-group">
                            <label class="col-3 text-md-right" for="receiver">receiver</label>
                            <div class="col-md-9">
                                <input value="<?= set_value('receiver'); ?>" type="text" id="receiver" name="receiver" class="form-control" placeholder="Masukan receiver">

                                <?= form_error('receiver', '<span class="text-danger small">', '</span>'); ?>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label class="col-3 text-md-right" for="paraf_pic">PIC</label>
                            <div class="col-md-9">
                                <input style="background-color: yellow;" value="<?= set_value('paraf_pic'); ?>" type="text" id="paraf_pic" name="paraf_pic" class="form-control" placeholder="Masukan PIC">
                                <?= form_error('paraf_pic', '<span class="text-danger small">', '</span>'); ?>
                            </div>
                        </div>


                    </div> -->

                </div>

                <div id="form-container">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="row form-group">
                                <label class="col-3 text-md-right" for="kategori">Kategori</label>
                                <div class="col-md-9">
                                    <select value="<?= set_value('kategori'); ?>" type="text" id="kategori" name="kategori[]" class="form-control" placeholder="Masukan kategori">
                                        <option value="Barang">Barang</option>
                                        <option value="Jasa">Jasa</option>
                                    </select>

                                    <!-- <input value="<?= set_value('kategori'); ?>" type="text" id="kategori" name="kategori[]" class="form-control" placeholder="Masukan kategori"> -->
                                    <?= form_error('kategori[]', '<span class="text-danger small">', '</span>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="row form-group">
                                <label class="col-3 text-md-right" for="item">Nama Item</label>
                                <div class="col-md-9">
                                    <input value="<?= set_value('item'); ?>" type="text" id="item" name="item[]" class="form-control" placeholder="Masukan item">
                                    <?= form_error('item[]', '<span class="text-danger small">', '</span>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="row form-group">
                                <label class="col-3 text-md-right" for="spesifikasi">Spesifikasi</label>
                                <div class="col-md-9">
                                    <input value="<?= set_value('spesifikasi'); ?>" type="text" id="spesifikasi" name="spesifikasi[]" class="form-control" placeholder="Masukan spesifikasi">
                                    <?= form_error('spesifikasi', '<span class="text-danger small">', '</span>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="row form-group">
                                <label class="col-3 text-md-right" for="qty">Qty</label>
                                <div class="col-md-9">
                                    <input value="<?= set_value('qty'); ?>" type="text" id="qty" name="qty[]" class="form-control" placeholder="Masukan qty">
                                    <?= form_error('qty[]', '<span class="text-danger small">', '</span>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="row form-group">
                                <label class="col-3 text-md-right" for="estimasi_harga">Est. Harga Satuan</label>
                                <div class="col-md-9">
                                    <input value="<?= set_value('estimasi_harga'); ?>" type="text" id="estimasi_harga" name="estimasi_harga[]" class="form-control" placeholder="Masukan estimasi_harga">
                                    <?= form_error('estimasi_harga[]', '<span class="text-danger small">', '</span>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="row form-group">
                                <label class="col-3 text-md-right" for="alasan_permintaan">Keterangan/Alasan</label>
                                <div class="col-md-9">
                                    <input value="<?= set_value('alasan_permintaan'); ?>" type="text" id="alasan_permintaan" name="alasan_permintaan[]" class="form-control" placeholder="Masukan alasan_permintaan">
                                    <?= form_error('alasan_permintaan[]', '<span class="text-danger small">', '</span>'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 text-center">
                        <button type="button" class="btn btn-success btn-icon-split" id="add-row">
                            <span class="icon"><i class="fa fa-plus"></i></span>
                            <span class="text">Tambah</span>
                        </button>
                        <button type="button" class="btn btn-danger btn-icon-split" id="remove-row">
                            <span class="icon"><i class="fa fa-minus"></i></span>
                            <span class="text">Kurangi</span>
                        </button>
                    </div>
                </div>

                <br>
                <br><br><br>


                <div class="row justify-content-center">
                    <div class="col-md-8 text-center">
                        <button type="submit" class="btn btn-primary btn-icon-split" onclick="return confirm('Yakin ingin Simpan dan Ajukan data?')">
                            <span class="icon"><i class="fa fa-save"></i></span>
                            <span class="text">Simpan & Pengajuan</span>
                        </button>


                    </div>
                </div>

                <?= form_close(); ?>
            </div>

        </div>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const formContainer = document.getElementById('form-container');
        document.getElementById('add-row').addEventListener('click', function() {
            const newRow = document.createElement('div');
            newRow.className = 'row';

            newRow.innerHTML = `

             <div class="col-md-12">
            <hr><br>
        </div>
                <div class="col-md-4">
                    <div class="row form-group">
                        <label class="col-3 text-md-right" for="kategori">Kategori</label>
                        <div class="col-md-9">
                         <select  id="kategori" name="kategori[]" class="form-control" placeholder="Masukan kategori">
                                        <option value="Barang">Barang</option>
                                        <option value="Jasa">Jasa</option>
                                    </select>

                       
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="row form-group">
                        <label class="col-3 text-md-right" for="item">Nama Item</label>
                        <div class="col-md-9">
                            <input type="text" name="item[]" class="form-control" placeholder="Masukan item">
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="row form-group">
                        <label class="col-3 text-md-right" for="spesifikasi">Spesifikasi</label>
                        <div class="col-md-9">
                            <input type="text" name="spesifikasi[]" class="form-control" placeholder="Masukan spesifikasi">
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="row form-group">
                        <label class="col-3 text-md-right" for="qty">Qty</label>
                        <div class="col-md-9">
                            <input type="text" name="qty[]" class="form-control" placeholder="Masukan qty">
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="row form-group">
                        <label class="col-3 text-md-right" for="estimasi_harga">Est. Harga Satuan</label>
                        <div class="col-md-9">
                            <input type="text" name="estimasi_harga[]" class="form-control" placeholder="Masukan estimasi_harga">
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="row form-group">
                        <label class="col-3 text-md-right" for="alasan_permintaan">Keterangan/Alasan</label>
                        <div class="col-md-9">
                            <input type="text" name="alasan_permintaan[]" class="form-control" placeholder="Masukan alasan_permintaan">
                        </div>
                    </div>
                </div>
            `;

            formContainer.appendChild(newRow);
        });

        document.getElementById('remove-row').addEventListener('click', function() {
            if (formContainer.children.length > 1) {
                formContainer.removeChild(formContainer.lastElementChild);
            }
        });
    });
</script>