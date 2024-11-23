<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <!-- Judul Halaman Sesuai dengan Level -->
      <small>
        <?php
        // Cek level pengguna dan tampilkan judul yang sesuai
        if ($_SESSION['level'] == "admin") {
          echo "Halaman Admin";
        } elseif ($_SESSION['level'] == "pegawai") {
          echo "Halaman Pegawai";
        }
        ?>
      </small>
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">
    <?php
    // Menampilkan pesan yang sesuai dengan level pengguna
    if ($_SESSION['level'] == "admin") {
      echo "<h4>Pilih Menu Disamping Untuk Mengelola Data.</h4>";
    } elseif ($_SESSION['level'] == "pegawai") {
      echo "<h4>Anda Sebagai Pegawai Toko BukaBuku.</h4>";
    }
    ?><br>

    <div class="modal fade" id="filmModal" tabindex="-1" role="dialog" aria-labelledby="filmModalLabel"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">

            <h5 class="modal-title" id="filmModalLabel">Detail Komik</h5>

            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-4">
                <!-- Gambar di sebelah kiri -->
                <img id="modalImage" src="" alt="Buku" class="img-fluid mb-3" />
              </div>
              <div class="col-md-8">
                <!-- Info di sebelah kanan -->
                <h5 id="modalTitle"></h5>
                <!-- Menghapus bagian deskripsi -->
                <p><strong>Penulis:</strong> <span id="modalPenulis"></span></p>
                <p><strong>Harga:</strong> <span id="modalHarga"></span></p>
                <p><strong>Stok:</strong> <span id="modalStock"></span></p>
              </div>
            </div>
          </div>


          <div class="modal-footer d-flex justify-content-between">
            <?php if ($_SESSION['level'] == 'pegawai'): ?>
              <form action="index.php?page=data_multiitem" method="post" class="mb-0">
                <input type="hidden" name="id_buku" value="id_">
                <button type="submit" class="btn btn-primary">Beli</button>
              </form>
            <?php endif; ?>

            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          </div>

        </div>
      </div>
    </div>

    <!-- Poster Film Section -->
    <div class="row">
      <?php
      include "conf/conn.php";  // Pastikan koneksi database sudah dibuat
      $query = "SELECT id_buku, judul, stok, gambar, penulis, harga_jual FROM buku";
      $result = mysqli_query($koneksi, $query);

      $class_index = 1; // Inisialisasi variabel untuk kelas gambar
      
      while ($row = mysqli_fetch_assoc($result)) {
        // Tentukan kelas untuk gambar berdasarkan iterasi
        $class = 'class-' . $class_index;
        // Pindahkan ke kelas berikutnya (1, 2, atau 3)
        $class_index = ($class_index % 3) + 1;
        ?>
        <div class="col-md-4 mb-3">
          <div class="card shadow" data-toggle="modal" data-target="#filmModal" data-title="<?php echo $row['judul']; ?>"
            data-image="dist/img/<?php echo $row['gambar']; ?>" data-stock="<?php echo $row['stok']; ?>"
            data-penulis="<?php echo $row['penulis']; ?>" data-harga="<?php echo $row['harga_jual']; ?>">
            <img src="dist/img/<?php echo $row['gambar']; ?>" class="card-img-top <?php echo $class; ?>"
              alt="<?php echo $row['judul']; ?>">
            <div class="card-body">
              <h5 class="card-title"><?php echo $row['judul']; ?></h5>
            </div>
            <button class="btn btn-info w-100">Detail</button>
          </div>


        </div>
        <?php
      }
      ?>
    </div>

    <script>
      // Event listener untuk card
      document.querySelectorAll('.card').forEach(card => {
        card.addEventListener('click', function () {
          // Ambil data dari atribut card
          const title = this.getAttribute('data-title');
          const image = this.getAttribute('data-image');
          const stock = this.getAttribute('data-stock');
          const penulis = this.getAttribute('data-penulis');
          const harga = this.getAttribute('data-harga');

          // Masukkan data ke dalam modal
          document.getElementById('modalTitle').textContent = title;
          document.getElementById('modalImage').src = image;
          document.getElementById('modalStock').textContent = stock;
          document.getElementById('modalPenulis').textContent = penulis;
          document.getElementById('modalHarga').textContent = harga;
        });
      });


    </script>

    <!-- END -->

    <style>
      /* CSS untuk card dengan border-radius dan shadow */
      .card {
        border-radius: 10px;
        transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        cursor: pointer;
        overflow: hidden;
        background-color: #5727A3;
        margin-bottom: 20px;
        height: 550px;
        width: 300px;
        display: flex;
        flex-direction: column;
        box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
        /* Default shadow */
      }

      /* Mengurangi jarak antar card */
      .col-md-4.mb-3 {
        margin-bottom: 10px;
        /* Jarak antar card */
        padding-left: 85px;
        /* Mengurangi jarak di antara kolom */
        padding-right: 5px;
      }

      .col-md-4 img.img-fluid.mb-3 {
        width: 190px;
        max-height: auto;
        border-radius: 12px;
        box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.2);
      }

      /* Hover effect pada card */
      .card:hover {
        transform: scale(1.05);
        box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.2);
        /* Hover shadow */
      }

      /* Gambar pada card dengan kelas yang berbeda */
      .card-img-top {
        border-radius: 10px 10px 0 0;
        object-fit: cover;
        height: 300px;
        /* Sesuaikan tinggi gambar */
      }

      .class-1 {
        height: auto;
        border-radius: 12;
      }

      .class-2 {
        height: auto;
        border-radius: 12;
      }

      .class-3 {
        height: auto;
        border-radius: 12;
      }

      /* Desain teks pada card (Judul) */
      .card-title {
        font-size: 2rem;
        /* Membuat font lebih besar */
        font-weight: bold;
        color: #ffff;
        text-align: center;
        /* Menempatkan judul di tengah */
        margin-bottom: 15px;
        /* Memberikan jarak antara judul dan tombol stok */
      }

      .card-text {
        color: #666;
        font-size: 1.1rem;
      }

      /* Styling untuk tombol stok */
      .btn-info {
        background-color: #f39c12;
        border-color: #f39c12;
        font-size: 1.3rem;
        padding: 12px 0;
        margin-top: auto;
        box-shadow: 0px -8px 10px rgba(0, 0, 0, 0.2);
        /* Pastikan tombol berada di bawah */
      }

      .btn-info:hover {
        background-color: #f39c12;
        border-color: #1B0044;
      }

      .content-wrapper {
        background-color: #EDEEF7;
        padding: 20px;
      }

      .modal-title {
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        height: 30px;
        background-color: #1B0044;
        color: #ffff;
        text-align: center;
        font-weight: bold;
        font-size: 20px;
      }

      .modal-footer {
        background-color: #1B0044;
      }

      .modal-footer button {
        background-color: #f39c12;
        color: #ffff;
      }

      .close {
        width: 50px;
        height: 50px;
      }

      .modal-footer {
        display: flex;
        justify-content: flex-end;
        /* Atur tombol ke ujung kanan */
        align-items: center;
        /* Vertikal sejajar */
        gap: 10px;
        /* Jarak antara tombol */
      }

      .modal-footer form {
        margin: 0;
        /* Hilangkan margin default pada form */
      }


    </style>

  </section>
  <!-- /.Main content -->
</div>
<!-- /.content-wrapper -->