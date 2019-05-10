<div class="col-12">
    <div class="card">
        <div class="card-header">
            <?php
            if ($this->session->userdata('session_level') == 'guru'):
                ?>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalSoal">Tambah Ujian
                </button>
            <?php
            elseif ($this->session->userdata('session_level') == 'siswa'):
                ?>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalIkutUjian">Ikuti
                    Ujian
                </button>
            <?php
            endif;
            ?>
        </div>
        <div class="card-body">
            <table class="table table-bordered" id="datatable" style="width: 100%;">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Jurusan</th>
                    <th>Kelas</th>
                    <th>Matpel</th>
                    <th>Durasi</th>
                    <?php
                    if ($this->session->userdata('session_level') == 'siswa'):
                    ?>
                    <th>Status</th>
                    <?php
                    endif;
                    ?>
                    <th><i class="fa fa-gear"></i></th>
                </tr>
                </thead>
                <tbody>
                <?php
                $no = 1;
                foreach ($ujian as $key => $value) :
                    if ($value['ujian_guru_id'] == $this->userID):
                        ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $value['ujian_jurusan'] ?></td>
                            <td><?= $value['ujian_kelas'] ?></td>
                            <td><?= $value['ujian_matpel'] ?></td>
                            <td><?= $value['ujian_durasi'] ?> Menit</td>
                            <td><a href="<?= base_url('ujian/view/' . $value['ujian_id']) ?>"
                                   class="btn btn-outline-primary btn-sm">Lihat</a></td>
                        </tr>
                        <?php
                        $no++;
                    endif;
                endforeach;
                ?>
                <?php
                $no = 1;
                foreach ($ujianSiswa as $key => $value) :
                        ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $value['ujian_jurusan'] ?></td>
                            <td><?= $value['ujian_kelas'] ?></td>
                            <td><?= $value['ujian_matpel'] ?></td>
                            <td><?= $value['ujian_durasi'] ?> Menit</td>
                            <td>
                                <?php
                                if ($value['hasil_nilai'] != null):?>
                                    <label for="" class="btn btn-success btn-sm" style="cursor: context-menu">Sudah Ikut</label>
                                <?php else: ?>
                                    <label for="" class="btn btn-warning btn-sm" style="cursor: context-menu">Belum Ikut</label>
                                <?php
                                endif;
                                ?>
                            </td>
                            <td>
                                <?php
                                if ($value['hasil_nilai'] != null):?>
                                    <a href="<?= base_url('ujian/view/' . $value['ujian_id']) ?>" class="btn btn-outline-primary btn-sm"><i class="fe fe-eye"></i> Lihat Hasil</a>
                                <?php else: ?>
                                    <a href="<?= base_url('ujian/mulai/' . $value['ujian_id']) ?>" class="btn btn-outline-primary btn-sm mulai-ujian" onclick="return confirm('Mulai Ujian?')" target="_blank"><i class="fe fe-edit"></i> Mulai</a>
                                <?php
                                endif;
                                ?>
                            </td>
                        </tr>
                        <?php
                        $no++;
                endforeach;
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalSoal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Ujian Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <?= form_open('ujian/create') ?>
            <div class="modal-body">
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="kelas" class="form-label">Kelas</label>
                            <select name="kelas" id="kelas" class="form-control"  required autocomplete="off">
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="form-group">
                            <label for="jurusan" class="form-label">Jurusan</label>
                            <input type="text" class="form-control" id="jurusan" name="jurusan"  required autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="matpel" class="form-label">Mata Pelajaran</label>
                    <input type="text" class="form-control" id="matpel" name="matpel" required autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="durasi" class="form-label">Durasi (Menit)</label>
                    <input type="number" class="form-control" id="durasi" name="durasi" required autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="minimal" class="form-label">Nilai Minimal</label>
                    <input type="number" class="form-control" id="minimal" name="minimal" required autocomplete="off">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>

<div class="modal fade" id="modalIkutUjian" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pilih ujian yang akan diikuti</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <?= form_open('ujian/ikut') ?>
            <div class="modal-body">
                <div class="row">
                    <div class="col-9">
                        <div class="form-group">
                            <label for="kodeUjian" class="form-label">Kode Ujian</label>
                            <input type="text" class="form-control" id="kodeUjian" required autocomplete="off">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="lihatKode" class="form-label" style="color: white"> asdas</label>
                            <button type="button" id="lihatKode" class="btn btn-azure btn-block"><i class="fa fa-search"></i> Lihat</button>
                        </div>
                    </div>
                </div>
                <div id="hasilKode">
                    <div class="alert alert-info animated fadeInDown hide-it" role="alert">
                        <button type="button" class="close" data-dismiss="alert"></button>
                        Silahkan isi kode ujian
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn-block" name="ikut">Ikut</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>