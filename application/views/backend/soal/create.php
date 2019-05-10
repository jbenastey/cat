<div class="col-12">
    <div class="card">
        <div class="card-header">

        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-1">
                </div>
                <div class="col-10">
                    <?=form_open('soal/create/'.$ujian['ujian_id'])?>
                    <div class="row">
                        <div class="col-2">
                            <label for="soal" class="form-label">Soal :</label>
                        </div>
                        <div class="col-10">
                            <textarea name="soal" class="summernote" cols="20" required></textarea>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-2">
                            <label for="jawabana" class="form-label">Jawaban A :</label>
                        </div>
                        <div class="col-10">
                            <textarea class="summernotejawab" name="jawabana" required></textarea>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-2">
                            <label for="jawabanb" class="form-label">Jawaban B :</label>
                        </div>
                        <div class="col-10">
                            <textarea class="summernotejawab" name="jawabanb" required></textarea>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-2">
                            <label for="jawabanc" class="form-label">Jawaban C :</label>
                        </div>
                        <div class="col-10">
                            <textarea class="summernotejawab" name="jawabanc" required></textarea>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-2">
                            <label for="jawaband" class="form-label">Jawaban D :</label>
                        </div>
                        <div class="col-10">
                            <textarea class="summernotejawab" name="jawaband" required></textarea>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-2">
                            <label for="jawabane" class="form-label">Jawaban E :</label>
                        </div>
                        <div class="col-10">
                            <textarea class="summernotejawab" name="jawabane" required></textarea>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-2">
                            <label for="kuncijawaban" class="form-label">Kunci Jawaban :</label>
                        </div>
                        <div class="col-10">
                            <select name="kuncijawaban" id="kuncijawaban" class="form-control" required>
                                <option value="a">A</option>
                                <option value="b">B</option>
                                <option value="c">C</option>
                                <option value="d">D</option>
                                <option value="e">E</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-6">
                            <a href="<?=base_url('ujian/view/'.$ujian['ujian_id'])?>" class="btn btn-danger btn-block" >Batal</a>
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