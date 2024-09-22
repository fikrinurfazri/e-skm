 <!--  Header Start -->

 <div class="content-wrapper">
     <!-- Content Header (Page header) -->

     <section class="content">
         <div class="container-fluid">
             <div class="row">
                 <div class="col-md-12">
                     <div class="card card-success shadow-lg">
                         <div class="card-body">
                             <div class="card card-success shadow-lg">
                                 <div class="card-header">
                                     <div class="d-flex justify-content-between">
                                         <div class="col-2">
                                             <img src="<?= base_url() ?>assets/images/logotasik.png" width="50%" alt="">
                                         </div>
                                         <div class="col-8 text-center">
                                             <h1>KUESIONER SURVEI KEPUASAN MASYARAKAT <br> <?= $dinas['nama'] ?></h1>
                                         </div>
                                         <div class="col-2">
                                             <img src="<?= base_url() ?>assets/images/bangga.png" width="50%" alt="">
                                         </div>
                                     </div>
                                 </div>
                                 <div class="card-body">
                                     <p style="font-size:20px">Survei ini kami lakukan untuk mengetahui sejauh mana penilaian dan tanggapan masyarakat atas pelayanan publik
                                         yang instansi kami berikan. Mohon Bapak/Ibu/Saudara/i dapat meluangkan waktu sejenak untuk menjawab pertanyaan-pertanyaan
                                         di bawah ini. Terimakasih atas partisipasi anda untuk mengisi survey ini.</p>


                                     <form action="<?= base_url() ?>home/kirim" method="post">
                                         <div class="card shadow-lg">

                                             <div class="card-header">
                                                 <h5 class="mb-3"> <i class="bi bi-people"> </i> Profile Responden</h5>

                                                 <div class="row mb-3">
                                                     <div class="form-group col-3">
                                                         <label for="usia"> Usia</label>
                                                         <input required type="number" name="umur" id="umur" class="form-control" placeholder="Usia">
                                                         <input type="hidden" name="id_user" value="<?= $dinas['id_user'] ?>" class="form-control">
                                                         <input type="hidden" name="username" value="<?= $dinas['username'] ?>" class="form-control">
                                                         <input type="hidden" name="tahun" value="<?= $dinas['tahun'] ?>" class="form-control">
                                                         <input type="hidden" name="triwulan" value="<?= $dinas['triwulan'] ?>" class="form-control">
                                                         <input type="hidden" name="id_kuisioner" value="<?= $dinas['id_kuisioner'] ?>" class="form-control">
                                                     </div>
                                                     <div class="form-group col-3">
                                                         <label for="pendidikan"> Pendidikan</label>
                                                         <select name="pendidikan" id="pendidikan" class="form-control" required>
                                                             <option>--Pilih Pendidikan--</option>
                                                             <option value="SD"> SD</option>
                                                             <option value="SMP"> SMP</option>
                                                             <option value="SMA"> SMA</option>
                                                             <option value="D3"> D3</option>
                                                             <option value="S1"> S1</option>
                                                             <option value="S2"> S2</option>
                                                             <option value="S3"> S3</option>
                                                         </select>
                                                     </div>
                                                     <div class="form-group col-3">
                                                         <label for="pekerjaan"> Pekerjaan</label>
                                                         <select name="pekerjaan" id="pekerjaan" class="form-control" required>
                                                             <option>--Pilih Pekerjaan--</option>
                                                             <option value="PELAJAR/MAHASISWA"> PELAJAR/MAHASISWA</option>
                                                             <option value="ASN"> ASN</option>
                                                             <option value="TNI"> TNI</option>
                                                             <option value="POLRI"> POLRI</option>
                                                             <option value="WIRASWASTA"> WIRASWASTA</option>
                                                             <option value="WIRAUSAHA"> WIRAUSAHA</option>
                                                             <option value="LAINNYA"> LAINNYA</option>

                                                         </select>
                                                     </div>

                                                     <div class="form-group col-3">
                                                         <label for="jk"> Jenis Kelamin</label> <br>
                                                         <input required type="radio" name="jk" id="jk" value="L"> Laki-laki
                                                         <input required type="radio" name="jk" id="jk" value="P"> Perempuan
                                                     </div>

                                                 </div>

                                                 <div class="form-group mb-5">
                                                     <label for="pelayanan"> Jenis Layanan Yang Diterima</label>
                                                     <select name="id_pelayanan" class="form-control" id="" required>
                                                         <option value="">--Pilih Layanan--</option>
                                                         <?php foreach ($pelayanan as $pl) : ?>
                                                             <option value="<?= $pl['id_pelayanan'] ?>"><?= $pl['pelayanan'] ?></option>
                                                         <?php endforeach ?>
                                                     </select>
                                                 </div>
                                                 <h5 class="mb-2"> <i class="bi bi-bag"> </i> Pendapat Responden</h5>
                                             </div>
                                             <div class="card-body">
                                                 <div class="form-group mb-3">
                                                     <label for=""> 1. Bagaimana pendapat Saudara tentang kesesuaian persyaratan pelayanan dengan jenis pelayanannya?</label>
                                                     <br>
                                                     <input required type="radio" name="u1" value="1"> Tidak sesuai <br>
                                                     <input required type="radio" name="u1" value="2"> Kurang sesuai <br>
                                                     <input required type="radio" name="u1" value="3"> sesuai <br>
                                                     <input required type="radio" name="u1" value="4"> Sangat sesuai <br>
                                                 </div>
                                                 <div class="form-group mb-3">
                                                     <label for=""> 2. Bagaimana pemahaman Saudara tentang kemudahan
                                                         prosedur pelayanan di unit ini?</label>
                                                     <br>
                                                     <input required type="radio" name="u2" value="1"> Tidak mudah <br>
                                                     <input required type="radio" name="u2" value="2"> Kurang mudah <br>
                                                     <input required type="radio" name="u2" value="3"> mudah <br>
                                                     <input required type="radio" name="u2" value="4"> Sangat mudah <br>
                                                 </div>
                                                 <div class="form-group mb-3">
                                                     <label for=""> 3. Bagaimana pendapat Saudara tentang kecepatan waktu dalam memberikan pelayanan?</label>
                                                     <br>
                                                     <input required type="radio" name="u3" value="1"> Tidak cepat<br>
                                                     <input required type="radio" name="u3" value="2"> Kurang cepat <br>
                                                     <input required type="radio" name="u3" value="3"> cepat <br>
                                                     <input required type="radio" name="u3" value="4"> Sangat cepat<br>
                                                 </div>
                                                 <div class="form-group mb-3">
                                                     <label for=""> 4. Bagaimana pendapat Saudara tentang kewajaran biaya/tarif dalam pelayanan?</label>
                                                     <br>
                                                     <input required type="radio" name="u4" value="1"> Sangat mahal<br>
                                                     <input required type="radio" name="u4" value="2"> Cukup mahal <br>
                                                     <input required type="radio" name="u4" value="3"> Murah <br>
                                                     <input required type="radio" name="u4" value="4"> Gratis<br>
                                                 </div>
                                                 <div class="form-group mb-3">
                                                     <label for=""> 5. Bagaimana pendapat Saudara tentang kesesuaian
                                                         produk pelayanan antara yang tercantum dalam
                                                         standar pelayanan dengan hasil yang diberikan?</label>
                                                     <br>
                                                     <input required type="radio" name="u5" value="1"> Tidak sesuai<br>
                                                     <input required type="radio" name="u5" value="2"> Kurang sesuai <br>
                                                     <input required type="radio" name="u5" value="3"> sesuai <br>
                                                     <input required type="radio" name="u5" value="4"> Sangat sesuai<br>
                                                 </div>
                                                 <div class="form-group mb-3">
                                                     <label for=""> 6. Bagaimana pendapat Saudara tentang kompetensi/
                                                         kemampuan petugas dalam pelayanan?</label>
                                                     <br>
                                                     <input required type="radio" name="u6" value="1"> Tidak kompeten<br>
                                                     <input required type="radio" name="u6" value="2"> Kurang kompeten <br>
                                                     <input required type="radio" name="u6" value="3"> kompeten <br>
                                                     <input required type="radio" name="u6" value="4"> Sangat kompeten<br>
                                                 </div>
                                                 <div class="form-group mb-3">
                                                     <label for=""> 7. Bagamana pendapat saudara perilaku petugas dalam
                                                         pelayanan terkait kesopanan dan keramahan?</label>
                                                     <br>
                                                     <input required type="radio" name="u7" value="1"> Tidak sopan & ramah<br>
                                                     <input required type="radio" name="u7" value="2"> Kurang sopan & ramah <br>
                                                     <input required type="radio" name="u7" value="3"> sopan & ramah <br>
                                                     <input required type="radio" name="u7" value="4"> Sangat sopan & ramah<br>
                                                 </div>
                                                 <div class="form-group mb-3">
                                                     <label for=""> 8. Bagaimana pendapat Saudara tentang kualitas sarana
                                                         dan prasarana?</label>
                                                     <br>
                                                     <input required type="radio" name="u8" value="1"> Buruk<br>
                                                     <input required type="radio" name="u8" value="2"> Cukup <br>
                                                     <input required type="radio" name="u8" value="3"> Baik <br>
                                                     <input required type="radio" name="u8" value="4"> Sangat Baik<br>
                                                 </div>
                                                 <div class="form-group mb-3">
                                                     <label for=""> 9. Bagaimana pendapat Saudara tentang penanganan
                                                         pengaduan pengguna layanan?</label>
                                                     <br>
                                                     <input required type="radio" name="u9" value="1"> Tidak ada.<br>
                                                     <input required type="radio" name="u9" value="2"> Ada tetapi tidak berfungsi <br>
                                                     <input required type="radio" name="u9" value="3"> Berfungsi kurang maksimal <br>
                                                     <input required type="radio" name="u9" value="4"> Dikelola dengan baik<br>
                                                 </div>


                                                 <button class="btn btn-success" type="submit"> Kirim</button>
                                                 <button class="btn btn-warning" type="reset"> Reset</button>
                                     </form>
                                 </div>
                             </div>

                         </div>
                     </div>

                 </div>
             </div>
         </div>
 </div>
 </div>
 <!-- /.container-fluid -->
 </section>

 </div>