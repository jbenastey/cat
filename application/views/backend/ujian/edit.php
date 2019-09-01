<div class="col-12">
    <div class="card">
        <div class="card-header">
            Edit Latihan
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-2"></div>
                <div class="col-8">
                    <form action="<?=base_url('ujian/edit/'.$ujian['ujian_id'])?>" method="post">
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="kelas" class="form-label">Kelas</label>
                                <select name="kelas" id="kelas" class="form-control">
                                    <option value="10" <?php if ($ujian['ujian_kelas'] == '10') echo 'selected'?>>10</option>
                                    <option value="11" <?php if ($ujian['ujian_kelas'] == '11') echo 'selected'?>>11</option>
                                    <option value="12" <?php if ($ujian['ujian_kelas'] == '12') echo 'selected'?>>12</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="form-group">
                                <label for="jurusan" class="form-label">Jurusan</label>
                                <input type="text" class="form-control" id="jurusan" name="jurusan" value="<?=$ujian['ujian_jurusan']?>" required autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="matpel" class="form-label">Mata Pelajaran</label>
                        <input type="text" class="form-control" id="matpel" name="matpel" value="<?=$ujian['ujian_matpel']?>" required autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="durasi" class="form-label">Durasi (Menit)</label>
                        <input type="number" class="form-control" id="durasi" name="durasi" value="<?=$ujian['ujian_durasi']?>" required autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="minimal" class="form-label">Nilai Minimal</label>
                        <input type="number" class="form-control" id="minimal" name="minimal" value="<?=$ujian['ujian_nilai_minimal']?>" required autocomplete="off">
                    </div>
                    <div style="float: right">
                        <button type="submit" class="btn btn-primary" name="update">Simpan</button>
                    </div>
                    </form>
                </div>
                <div class="col-2"></div>
            </div>
        </div>
    </div>
</div>
