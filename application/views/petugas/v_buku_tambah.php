<div class="container">
  <div class="card">
    <div class="card-header text-center">
      <h4> Tambah Baru </h4>
    </div>
    <div class="card-body">
      <a href="echo base_url.'petugas/buku' ?>" class='btn btn-sm
        btn-light btn-outline-dark pull-right'><i class="fa fa-arrow-left"></i> Kembali </a>
        <br/>
        <br/>

        <form method="post" action="<?php echo base_url().'petugas/buku_tambah_aksi'; ?>">
          <div class="form-group">
            <label class="font-weight-bold" for="judul">Judul Buku</label>
            <input type="text" class="form-control" name="judul" placeholder="Masukan judul buku" required="required">
          </div>
          <div class="form-group">
            <label class="font-weight-bold" for="tahun"> Tahun </label>
            <select class="form-control" name="tahun" required="required">
              <option value="">- Pilih tahun </option>
              <?php for($tahun=date('Y'); $tahun >= 1990; $tahun--){ ?>
                <option value="<?php echo $tahun; ?>"><?php echo $tahun; ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <label class="font-weight-bold" for="penulis"> Penulis Buku</label>
            <input type="text" class="form-control" name="penulis" placeholder="Masukan nama penulis" required="required">
          </div>
          <input type="submit" class="btn btn-primary" value="Simpan">
        </form>

      </div>
    </div>
  </div>
