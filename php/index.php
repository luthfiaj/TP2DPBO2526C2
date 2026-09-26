<?php

require_once "ProgramStudi.php";

session_start();


// ========================================
// FOLDER GAMBAR
// ========================================

$folderGambar = __DIR__ . "/uploads/";

// Pastikan folder uploads/ selalu ada dan writable
if (!is_dir($folderGambar)) {
    mkdir($folderGambar, 0755, true);
}


// ========================================
// DATA AWAL
// ========================================

if (!isset($_SESSION['dataList'])) {

    $_SESSION['dataList'] = [

        new ProgramStudi(
            "Institut Teknologi Bandung",
            "Bandung",
            1959,
            "Unggul",
            "itb.png",
            "STEI",
            "Dekan Contoh 1",
            120,
            2500,
            "Teknik Informatika",
            "S1",
            "Ketua Prodi Contoh 1",
            "Unggul"
        ),

        new ProgramStudi(
            "Universitas Pendidikan Indonesia",
            "Bandung",
            1954,
            "Unggul",
            "upi.png",
            "FPMIPA",
            "Dekan Contoh 2",
            150,
            4000,
            "Pendidikan Matematika",
            "S1",
            "Ketua Prodi Contoh 2",
            "A"
        ),

        new ProgramStudi(
            "Institut Pemerintahan Dalam Negeri",
            "Jatinangor / Sumedang",
            1967,
            "Baik Sekali",
            "ipdn.png",
            "Fakultas Politik Pemerintahan",
            "Dekan Contoh 3",
            140,
            3500,
            "Kebijakan Publik",
            "S1 Terapan",
            "Ketua Prodi Contoh 3",
            "A"
        ),

        new ProgramStudi(
            "Akademi Militer",
            "Magelang",
            1945,
            "Baik Sekali",
            "akmil.png",
            "Direktorat Pendidikan Pertahanan",
            "Dekan Contoh 4",
            80,
            1200,
            "Manajemen Pertahanan",
            "D4 (Sarjana Terapan)",
            "Ketua Prodi Contoh 4",
            "B"
        ),

        new ProgramStudi(
            "Politeknik Statistika STIS",
            "Jakarta Timur",
            1958,
            "Baik Sekali",
            "stis.png",
            "Jurusan Statistika Sosial Kependudukan",
            "Dekan Contoh 5",
            50,
            1200,
            "Statistika",
            "D4 (Sarjana Terapan)",
            "Ketua Prodi Contoh 5",
            "A"
        )

    ];
}


// ========================================
// RESET DATA
// ========================================

if (isset($_POST['reset'])) {

    unset($_SESSION['dataList']);

    header("Location: index.php");
    exit;
}


// ========================================
// TAMBAH DATA
// ========================================

$errorUpload = "";

if (isset($_POST['tambah'])) {

    $namaUniversitas = $_POST['namaUniversitas'];
    $alamat = $_POST['alamat'];
    $tahunBerdiri = $_POST['tahunBerdiri'];
    $statusAkreditasi = $_POST['statusAkreditasi'];

    $namaFakultas = $_POST['namaFakultas'];
    $namaDekan = $_POST['namaDekan'];
    $jumlahDosen = $_POST['jumlahDosen'];
    $jumlahMahasiswa = $_POST['jumlahMahasiswa'];

    $namaProdi = $_POST['namaProdi'];
    $jenjang = $_POST['jenjang'];
    $namaKetuaProdi = $_POST['namaKetuaProdi'];
    $akreditasiProdi = $_POST['akreditasiProdi'];

    $gambar = "";


    // ========================================
    // UPLOAD GAMBAR
    // ========================================

    if (isset($_FILES['gambar']) && $_FILES['gambar']['name'] != "") {

        if ($_FILES['gambar']['error'] === UPLOAD_ERR_OK) {

            $namaFile = $_FILES['gambar']['name'];
            $tmpFile = $_FILES['gambar']['tmp_name'];

            $ekstensiDiizinkan = ['png', 'jpg', 'jpeg', 'gif', 'webp'];
            $ekstensi = strtolower(pathinfo($namaFile, PATHINFO_EXTENSION));

            if (!in_array($ekstensi, $ekstensiDiizinkan)) {

                $errorUpload = "Format file tidak didukung. Gunakan PNG, JPG, JPEG, GIF, atau WEBP.";

            } else {

                $namaBaru = uniqid() . "." . $ekstensi;
                $lokasiFile = $folderGambar . $namaBaru;

                if (move_uploaded_file($tmpFile, $lokasiFile)) {
                    $gambar = $namaBaru;
                } else {
                    $errorUpload = "Gagal menyimpan file ke folder uploads/. Cek permission foldernya (harus writable, misal chmod 755 atau 775).";
                }

            }

        } else {

            $pesanErrorUpload = [
                UPLOAD_ERR_INI_SIZE   => "Ukuran file melebihi batas upload_max_filesize di php.ini.",
                UPLOAD_ERR_FORM_SIZE  => "Ukuran file melebihi batas MAX_FILE_SIZE pada form.",
                UPLOAD_ERR_PARTIAL    => "File hanya terupload sebagian.",
                UPLOAD_ERR_NO_FILE    => "Tidak ada file yang diupload.",
                UPLOAD_ERR_NO_TMP_DIR => "Folder temporary tidak ditemukan di server.",
                UPLOAD_ERR_CANT_WRITE => "Gagal menulis file ke disk.",
                UPLOAD_ERR_EXTENSION  => "Upload dihentikan oleh ekstensi PHP.",
            ];

            $errorUpload = $pesanErrorUpload[$_FILES['gambar']['error']] ?? "Upload gagal (kode error: {$_FILES['gambar']['error']}).";

        }

    }


    // ========================================
    // MEMBUAT OBJECT PROGRAM STUDI
    // ========================================

    if ($errorUpload === "") {

        $dataBaru = new ProgramStudi(

            $namaUniversitas,
            $alamat,
            $tahunBerdiri,
            $statusAkreditasi,
            $gambar,

            $namaFakultas,
            $namaDekan,
            $jumlahDosen,
            $jumlahMahasiswa,

            $namaProdi,
            $jenjang,
            $namaKetuaProdi,
            $akreditasiProdi

        );

        $_SESSION['dataList'][] = $dataBaru;

        header("Location: index.php");
        exit;

    }

}


$dataList = $_SESSION['dataList'];

?>



<!DOCTYPE html>

<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Data Perguruan Tinggi</title>


    <style>

        * {
            box-sizing: border-box;
        }


        body {

            margin: 0;

            padding: 0;

            font-family: Arial, sans-serif;

            background: #f2f4f7;

            color: #333;

        }


        .container {

            width: 95%;

            max-width: 1500px;

            margin: 30px auto;

        }


        /* ========================================
           HEADER
        ======================================== */

        .header {

            background: #1f2937;

            color: white;

            padding: 25px;

            border-radius: 12px;

            margin-bottom: 25px;

        }


        .header h1 {

            margin: 0 0 8px 0;

            font-size: 28px;

        }


        .header p {

            margin: 0;

            color: #d1d5db;

        }


        /* ========================================
           ALERT ERROR
        ======================================== */

        .alert-error {

            background: #fee2e2;

            color: #991b1b;

            padding: 14px 18px;

            border-radius: 10px;

            margin-bottom: 20px;

            border: 1px solid #fca5a5;

            font-weight: bold;

        }



        /* ========================================
           CARD
        ======================================== */

        .card {

            background: white;

            padding: 25px;

            border-radius: 12px;

            margin-bottom: 25px;

            box-shadow: 0 3px 12px rgba(0, 0, 0, 0.08);

        }


        .card h2 {

            margin-top: 0;

            margin-bottom: 20px;

            color: #1f2937;

        }



        /* ========================================
           FORM
        ======================================== */

        .form-grid {

            display: grid;

            grid-template-columns: 1fr 1fr;

            gap: 20px;

        }


        .form-group {

            display: flex;

            flex-direction: column;

        }


        .form-group label {

            font-weight: bold;

            margin-bottom: 7px;

        }


        .form-group input,

        .form-group select {

            padding: 10px;

            border: 1px solid #d1d5db;

            border-radius: 7px;

            font-size: 14px;

        }


        .form-group input:focus,

        .form-group select:focus {

            outline: none;

            border-color: #2563eb;

        }


        .section-title {

            grid-column: 1 / -1;

            font-size: 18px;

            font-weight: bold;

            color: #2563eb;

            border-bottom: 2px solid #e5e7eb;

            padding-bottom: 8px;

            margin-top: 10px;

        }



        /* ========================================
           UPLOAD
        ======================================== */

        .upload-box {

            grid-column: 1 / -1;

            border: 2px dashed #9ca3af;

            padding: 20px;

            border-radius: 10px;

            background: #f9fafb;

        }


        .upload-box label {

            display: block;

            font-weight: bold;

            margin-bottom: 10px;

        }


        .upload-box input {

            width: 100%;

        }



        /* ========================================
           BUTTON
        ======================================== */

        .button-area {

            grid-column: 1 / -1;

            display: flex;

            gap: 10px;

            margin-top: 10px;

        }


        button {

            border: none;

            padding: 11px 20px;

            border-radius: 7px;

            cursor: pointer;

            font-weight: bold;

            font-size: 14px;

        }


        .btn-tambah {

            background: #2563eb;

            color: white;

        }


        .btn-tambah:hover {

            background: #1d4ed8;

        }


        .btn-reset {

            background: #dc2626;

            color: white;

        }


        .btn-reset:hover {

            background: #b91c1c;

        }



        /* ========================================
           TABLE
        ======================================== */

        .table-container {

            width: 100%;

            overflow-x: auto;

        }


        table {

            width: 100%;

            min-width: 1600px;

            border-collapse: collapse;

        }


        table th {

            background: #1f2937;

            color: white;

            padding: 12px;

            text-align: center;

            white-space: nowrap;

        }


        table td {

            padding: 12px;

            border-bottom: 1px solid #e5e7eb;

            text-align: center;

            vertical-align: middle;

        }


        table tbody tr:nth-child(even) {

            background: #f9fafb;

        }


        table tbody tr:hover {

            background: #eef2ff;

        }



        /* ========================================
           GAMBAR
        ======================================== */

        .logo-kampus {

            width: 60px;

            height: 60px;

            object-fit: contain;

            border: 1px solid #d1d5db;

            border-radius: 8px;

            padding: 4px;

            background: white;

            display: block;

            margin: auto;

        }


        .no-image {

            width: 60px;

            height: 60px;

            display: flex;

            justify-content: center;

            align-items: center;

            text-align: center;

            background: #e5e7eb;

            color: #6b7280;

            border-radius: 8px;

            font-size: 10px;

            margin: auto;

        }



        /* ========================================
           BADGE
        ======================================== */

        .badge {

            display: inline-block;

            padding: 5px 9px;

            border-radius: 20px;

            background: #e5e7eb;

            font-size: 12px;

            font-weight: bold;

        }



        /* ========================================
           RESPONSIVE
        ======================================== */

        @media (max-width: 700px) {

            .form-grid {

                grid-template-columns: 1fr;

            }


            .section-title,

            .upload-box,

            .button-area {

                grid-column: 1;

            }


            .button-area {

                flex-direction: column;

            }


            .header h1 {

                font-size: 22px;

            }

        }

    </style>

</head>



<body>


<div class="container">



    <!-- ========================================
         HEADER
    ======================================== -->

    <div class="header">

        <h1>Sistem Data Perguruan Tinggi</h1>

        <p>
            Implementasi Multilevel Inheritance:
            PerguruanTinggi → Fakultas → ProgramStudi
        </p>

    </div>


    <!-- ========================================
         PESAN ERROR UPLOAD (jika ada)
    ======================================== -->

    <?php if (!empty($errorUpload)): ?>

        <div class="alert-error">
            ⚠️ <?= htmlspecialchars($errorUpload) ?>
        </div>

    <?php endif; ?>



    <!-- ========================================
         FORM TAMBAH DATA
    ======================================== -->

    <div class="card">

        <h2>Tambah Data Perguruan Tinggi</h2>


        <form method="POST" enctype="multipart/form-data">


            <div class="form-grid">



                <!-- DATA PERGURUAN TINGGI -->

                <div class="section-title">
                    Data Perguruan Tinggi
                </div>


                <div class="form-group">

                    <label>Nama Perguruan Tinggi</label>

                    <input
                        type="text"
                        name="namaUniversitas"
                        required
                    >

                </div>


                <div class="form-group">

                    <label>Alamat</label>

                    <input
                        type="text"
                        name="alamat"
                        required
                    >

                </div>


                <div class="form-group">

                    <label>Tahun Berdiri</label>

                    <input
                        type="number"
                        name="tahunBerdiri"
                        required
                    >

                </div>


                <div class="form-group">

                    <label>Akreditasi Perguruan Tinggi</label>

                    <select
                        name="statusAkreditasi"
                        required
                    >

                        <option value="">-- Pilih --</option>

                        <option value="Unggul">Unggul</option>

                        <option value="Baik Sekali">Baik Sekali</option>

                        <option value="Baik">Baik</option>

                        <option value="A">A</option>

                        <option value="B">B</option>

                        <option value="C">C</option>

                    </select>

                </div>



                <!-- DATA FAKULTAS -->

                <div class="section-title">
                    Data Fakultas
                </div>


                <div class="form-group">

                    <label>Nama Fakultas</label>

                    <input
                        type="text"
                        name="namaFakultas"
                        required
                    >

                </div>


                <div class="form-group">

                    <label>Nama Dekan</label>

                    <input
                        type="text"
                        name="namaDekan"
                        required
                    >

                </div>


                <div class="form-group">

                    <label>Jumlah Dosen</label>

                    <input
                        type="number"
                        name="jumlahDosen"
                        required
                    >

                </div>


                <div class="form-group">

                    <label>Jumlah Mahasiswa</label>

                    <input
                        type="number"
                        name="jumlahMahasiswa"
                        required
                    >

                </div>



                <!-- DATA PROGRAM STUDI -->

                <div class="section-title">
                    Data Program Studi
                </div>


                <div class="form-group">

                    <label>Nama Program Studi</label>

                    <input
                        type="text"
                        name="namaProdi"
                        required
                    >

                </div>


                <div class="form-group">

                    <label>Jenjang</label>

                    <input
                        type="text"
                        name="jenjang"
                        placeholder="Contoh: S1"
                        required
                    >

                </div>


                <div class="form-group">

                    <label>Ketua Program Studi</label>

                    <input
                        type="text"
                        name="namaKetuaProdi"
                        required
                    >

                </div>


                <div class="form-group">

                    <label>Akreditasi Program Studi</label>

                    <select
                        name="akreditasiProdi"
                        required
                    >

                        <option value="">-- Pilih --</option>

                        <option value="Unggul">Unggul</option>

                        <option value="A">A</option>

                        <option value="B">B</option>

                        <option value="C">C</option>

                    </select>

                </div>



                <!-- UPLOAD GAMBAR -->

                <div class="upload-box">

                    <label>Logo / Gambar Perguruan Tinggi</label>

                    <input
                        type="file"
                        name="gambar"
                        accept="image/*"
                    >

                </div>



                <!-- BUTTON -->

                <div class="button-area">

                    <button
                        type="submit"
                        name="tambah"
                        class="btn-tambah"
                    >
                        + Tambah Data
                    </button>


                    <button
                        type="submit"
                        name="reset"
                        class="btn-reset"
                        onclick="return confirm('Yakin ingin mengembalikan data ke data awal?')"
                    >
                        Reset Data
                    </button>

                </div>


            </div>

        </form>

    </div>



    <!-- ========================================
         TABEL DATA
    ======================================== -->

    <div class="card">

        <h2>Daftar Perguruan Tinggi</h2>


        <div class="table-container">

            <table>


                <thead>

                    <tr>

                        <th>No</th>

                        <th>Gambar</th>

                        <th>Universitas</th>

                        <th>Alamat</th>

                        <th>Tahun</th>

                        <th>Akreditasi Univ</th>

                        <th>Fakultas</th>

                        <th>Dekan</th>

                        <th>Jml Dosen</th>

                        <th>Jml Mhs</th>

                        <th>Program Studi</th>

                        <th>Jenjang</th>

                        <th>Ketua Prodi</th>

                        <th>Akreditasi Prodi</th>

                    </tr>

                </thead>



                <tbody>


                <?php

                $no = 1;

                foreach ($dataList as $data):

                ?>


                    <tr>


                        <!-- NO -->

                        <td>

                            <?= $no++ ?>

                        </td>



                        <!-- GAMBAR -->

                        <td>

                            <?php

                            $namaGambar = $data->getGambar();

                            $lokasiGambar = $folderGambar . $namaGambar;

                            ?>


                            <?php if (
                                $namaGambar != "" &&
                                file_exists($lokasiGambar)
                            ): ?>


                                <img

                                    src="uploads/<?= htmlspecialchars($namaGambar) ?>"

                                    class="logo-kampus"

                                    alt="Logo <?= htmlspecialchars($data->getNamaUniversitas()) ?>"

                                >


                            <?php else: ?>


                                <div class="no-image" title="<?= htmlspecialchars($lokasiGambar) ?>">

                                    Gambar<br>

                                    tidak ada

                                </div>

                                <?php if (isset($_GET['debug'])): ?>
                                    <div style="font-size:9px;color:#dc2626;word-break:break-all;max-width:150px;margin:4px auto;">
                                        Dicari di:<br>
                                        <?= htmlspecialchars($lokasiGambar) ?><br>
                                        Ada?: <?= file_exists($lokasiGambar) ? 'YA' : 'TIDAK' ?>
                                    </div>
                                <?php endif; ?>


                            <?php endif; ?>


                        </td>



                        <!-- UNIVERSITAS -->

                        <td>

                            <?= htmlspecialchars(
                                $data->getNamaUniversitas()
                            ) ?>

                        </td>



                        <!-- ALAMAT -->

                        <td>

                            <?= htmlspecialchars(
                                $data->getAlamat()
                            ) ?>

                        </td>



                        <!-- TAHUN -->

                        <td>

                            <?= htmlspecialchars(
                                $data->getTahunBerdiri()
                            ) ?>

                        </td>



                        <!-- AKREDITASI UNIVERSITAS -->

                        <td>

                            <span class="badge">

                                <?= htmlspecialchars(
                                    $data->getStatusAkreditasi()
                                ) ?>

                            </span>

                        </td>



                        <!-- FAKULTAS -->

                        <td>

                            <?= htmlspecialchars(
                                $data->getNamaFakultas()
                            ) ?>

                        </td>



                        <!-- DEKAN -->

                        <td>

                            <?= htmlspecialchars(
                                $data->getNamaDekan()
                            ) ?>

                        </td>



                        <!-- JUMLAH DOSEN -->

                        <td>

                            <?= htmlspecialchars(
                                $data->getJumlahDosen()
                            ) ?>

                        </td>



                        <!-- JUMLAH MAHASISWA -->

                        <td>

                            <?= htmlspecialchars(
                                $data->getJumlahMahasiswa()
                            ) ?>

                        </td>



                        <!-- PROGRAM STUDI -->

                        <td>

                            <?= htmlspecialchars(
                                $data->getNamaProdi()
                            ) ?>

                        </td>



                        <!-- JENJANG -->

                        <td>

                            <?= htmlspecialchars(
                                $data->getJenjang()
                            ) ?>

                        </td>



                        <!-- KETUA PRODI -->

                        <td>

                            <?= htmlspecialchars(
                                $data->getNamaKetuaProdi()
                            ) ?>

                        </td>



                        <!-- AKREDITASI PRODI -->

                        <td>

                            <span class="badge">

                                <?= htmlspecialchars(
                                    $data->getAkreditasiProdi()
                                ) ?>

                            </span>

                        </td>


                    </tr>


                <?php endforeach; ?>


                </tbody>


            </table>

        </div>

    </div>


</div>


</body>

</html>