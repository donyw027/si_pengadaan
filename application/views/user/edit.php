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
                    <!-- <div class="col-auto">
                        <a href="<?= base_url('user') ?>" class="btn btn-sm btn-secondary btn-icon-split">
                            <span class="icon">
                                <i class="fa fa-arrow-left"></i>
                            </span>
                            <span class="text">
                                Kembali
                            </span>
                        </a>
                    </div> -->
                </div>
            </div>
            <div class="card-body pb-2">
                <?= $this->session->flashdata('pesan'); ?>
                <?= form_open('', [], ['id_user' => $user['id_user']]); ?>
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="username">Username</label>
                    <div class="col-md-6">
                        <input value="<?= set_value('username', $user['username']); ?>" type="text" id="username" name="username" class="form-control" placeholder="Username">
                        <?= form_error('username', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                </div>
                <hr>
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="nama">Nama</label>
                    <div class="col-md-6">
                        <input value="<?= set_value('nama', $user['nama']); ?>" type="text" id="nama" name="nama" class="form-control" placeholder="Nama">
                        <?= form_error('nama', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="email">Jabatan</label>
                    <div class="col-md-6">
                        <input value="<?= set_value('email', $user['email']); ?>" type="text" id="email" name="email" class="form-control" placeholder="Jabatan">
                        <?= form_error('email', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="no_telp">Unit</label>
                    <div class="col-md-6">
                        <input value="<?= set_value('no_telp', $user['no_telp']); ?>" type="text" id="no_telp" name="no_telp" class="form-control" placeholder="Unit">
                        <?= form_error('no_telp', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="mail_user">Email</label>
                    <div class="col-md-6">
                        <input value="<?= set_value('mail_user', $user['mail_user']); ?>" type="text" id="mail_user" name="mail_user" class="form-control" placeholder="Email">
                        <?= form_error('mail_user', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="role">Role</label>
                    <div class="col-md-6">
                        <div class="custom-control custom-radio">
                            <input <?= $user['role'] == 'admin' ? 'checked' : ''; ?> <?= set_radio('role', 'admin'); ?> value="admin" type="radio" id="admin" name="role" class="custom-control-input">
                            <label class="custom-control-label" for="admin">Admin</label>
                        </div>
                        <!-- <div class="custom-control custom-radio">
                            <input <?= $user['role'] == 'keuangan' ? 'checked' : ''; ?> <?= set_radio('role', 'keuangan'); ?> value="keuangan" type="radio" id="keuangan" name="role" class="custom-control-input">
                            <label class="custom-control-label" for="keuangan">Keuangan</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input <?= $user['role'] == 'marketing' ? 'checked' : ''; ?> <?= set_radio('role', 'marketing'); ?> value="marketing" type="radio" id="marketing" name="role" class="custom-control-input">
                            <label class="custom-control-label" for="marketing">Marketing</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input <?= $user['role'] == 'pendidikan' ? 'checked' : ''; ?> <?= set_radio('role', 'pendidikan'); ?> value="pendidikan" type="radio" id="pendidikan" name="role" class="custom-control-input">
                            <label class="custom-control-label" for="pendidikan">Pendidikan</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input <?= $user['role'] == 'sarpras' ? 'checked' : ''; ?> <?= set_radio('role', 'sarpras'); ?> value="sarpras" type="radio" id="sarpras" name="role" class="custom-control-input">
                            <label class="custom-control-label" for="sarpras">Sarpras</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input <?= $user['role'] == 'sdm' ? 'checked' : ''; ?> <?= set_radio('role', 'sdm'); ?> value="sdm" type="radio" id="sdm" name="role" class="custom-control-input">
                            <label class="custom-control-label" for="sdm">Sdm</label>
                        </div>
                        -->
                        <div class="custom-control custom-radio">
                            <input <?= $user['role'] == 'yys' ? 'checked' : ''; ?> <?= set_radio('role', 'yys'); ?> value="yys" type="radio" id="yys" name="role" class="custom-control-input">
                            <label class="custom-control-label" for="yys">Yayasan</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input <?= $user['role'] == 'tu' ? 'checked' : ''; ?> <?= set_radio('role', 'tu'); ?> value="tu" type="radio" id="tu" name="role" class="custom-control-input">
                            <label class="custom-control-label" for="tu">Tata Usaha</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input <?= $user['role'] == 'kepsek' ? 'checked' : ''; ?> <?= set_radio('role', 'kepsek'); ?> value="kepsek" type="radio" id="kepsek" name="role" class="custom-control-input">
                            <label class="custom-control-label" for="kepsek">Kepala Sekolah</label>
                        </div>

                        <?= form_error('role', '<span class="text-danger small">', '</span>'); ?>
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