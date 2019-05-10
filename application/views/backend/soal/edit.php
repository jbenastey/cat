
<div class="col-12">
    <div class="card">
        <div class="card-header">

        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-2">
                </div>
                <div class="col-10">
                    <?=form_open('soal/edit/'.$soal['soal_id'])?>
                    <div class="row">
                        <div class="col-2">
                            <label for="soal" class="form-label">Soal :</label>
                        </div>
                        <div class="col-10">
                            <textarea name="soal" class="summernote" cols="20" required><?=$soal['soal_isi']?></textarea>
                        </div>
                    </div>
                    <?php $jawaban = json_decode($soal['soal_jawaban']);
                        foreach ($jawaban as $key=>$value):
                    ?>
                    <br>
                    <div class="row">
                        <div class="col-2">
                            <label for="jawaban<?=$key?>" class="form-label">Jawaban <?=strtoupper($key)?> :</label>
                        </div>
                        <div class="col-10">
                            <textarea class="summernotejawab" name="jawaban<?=$key?>" required><?=$value?></textarea>
                        </div>
                    </div>
                    <?php endforeach;?>
                    <br>
                    <div class="row">
                        <div class="col-2">
                            <label for="kuncijawaban" class="form-label">Kunci Jawaban :</label>
                        </div>
                        <div class="col-10">
                            <select name="kuncijawaban" id="kuncijawaban" class="form-control" required>
                                <option value="a" <?php if ($soal['soal_kunci_jawaban'] == 'a') echo 'selected'?>>A</option>
                                <option value="b" <?php if ($soal['soal_kunci_jawaban'] == 'b') echo 'selected'?>>B</option>
                                <option value="c" <?php if ($soal['soal_kunci_jawaban'] == 'c') echo 'selected'?>>C</option>
                                <option value="d" <?php if ($soal['soal_kunci_jawaban'] == 'd') echo 'selected'?>>D</option>
                                <option value="e" <?php if ($soal['soal_kunci_jawaban'] == 'e') echo 'selected'?>>E</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-6">
                            <a href="<?=base_url('soal/view/'.$soal['soal_id'])?>" class="btn btn-danger btn-block" >Batal</a>
                        </div>
                        <div class="col-6">
                            <button type="submit" class="btn btn-primary btn-block" name="simpan">Simpan</button>
                        </div>
                    </div>
                    <?=form_close()?>
                </div>
            </div>
        </div>
    </div>
</div>