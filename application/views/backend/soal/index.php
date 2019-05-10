<div class="col-12">
    <div class="card">
        <div class="card-header">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalSoal">Tambah Soal
            </button>
        </div>
        <div class="card-body">
            <table class="table table-bordered" id="datatable" style="width: 100%;">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Jurusan</th>
                    <th>Kelas</th>
                    <th>Matpel</th>
                    <th>Lihat</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $no = 1;
                foreach ($soal as $key => $value) :
                    ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $value['soal_jurusan'] ?></td>
                        <td><?= $value['soal_kelas'] ?></td>
                        <td><?= $value['soal_matpel'] ?></td>
                        <td>lihat</td>
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
<div class="modal fade" id="modalSoal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Soal Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="" class="form-label">Kelas</label>
                            <input type="text" class="form-control" required autocomplete="off">
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="form-group">
                            <label for="" class="form-label">Jurusan</label>
                            <input type="text" class="form-control" required autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="form-label">Mata Pelajaran</label>
                    <input type="text" class="form-control" required autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="" class="form-label">Soal</label>
                    <textarea class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="" class="form-label">Jawaban A</label>
                    <input type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label for="" class="form-label">Jawaban B</label>
                    <input type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label for="" class="form-label">Jawaban C</label>
                    <input type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label for="" class="form-label">Jawaban D</label>
                    <input type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label for="" class="form-label">Jawaban E</label>
                    <input type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label for="" class="form-label">Kunci Jawaban</label>
                    <select name="" id="" class="form-control">
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                        <option value="E">E</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>