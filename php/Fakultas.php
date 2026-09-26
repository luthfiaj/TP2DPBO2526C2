<?php

require_once "PerguruanTinggi.php";


class Fakultas extends PerguruanTinggi
{
    private $namaFakultas;
    private $namaDekan;
    private $jumlahDosen;
    private $jumlahMahasiswa;


    // constructor
    public function __construct(
        $namaUniversitas,
        $alamat,
        $tahunBerdiri,
        $statusAkreditasi,
        $gambar,
        $namaFakultas,
        $namaDekan,
        $jumlahDosen,
        $jumlahMahasiswa
    ) {
        parent::__construct(
            $namaUniversitas,
            $alamat,
            $tahunBerdiri,
            $statusAkreditasi,
            $gambar
        );

        $this->namaFakultas = $namaFakultas;
        $this->namaDekan = $namaDekan;
        $this->jumlahDosen = $jumlahDosen;
        $this->jumlahMahasiswa = $jumlahMahasiswa;
    }


    // getter
    public function getNamaFakultas()
    {
        return $this->namaFakultas;
    }

    public function getNamaDekan()
    {
        return $this->namaDekan;
    }

    public function getJumlahDosen()
    {
        return $this->jumlahDosen;
    }

    public function getJumlahMahasiswa()
    {
        return $this->jumlahMahasiswa;
    }


    // setter
    public function setNamaFakultas($namaFakultas)
    {
        $this->namaFakultas = $namaFakultas;
    }

    public function setNamaDekan($namaDekan)
    {
        $this->namaDekan = $namaDekan;
    }

    public function setJumlahDosen($jumlahDosen)
    {
        $this->jumlahDosen = $jumlahDosen;
    }

    public function setJumlahMahasiswa($jumlahMahasiswa)
    {
        $this->jumlahMahasiswa = $jumlahMahasiswa;
    }
}

?>