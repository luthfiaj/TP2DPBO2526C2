<?php

require_once "Fakultas.php";


class ProgramStudi extends Fakultas
{
    private $namaProdi;
    private $jenjang;
    private $namaKetuaProdi;
    private $akreditasiProdi;


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
        $jumlahMahasiswa,
        $namaProdi,
        $jenjang,
        $namaKetuaProdi,
        $akreditasiProdi
    ) {
        parent::__construct(
            $namaUniversitas,
            $alamat,
            $tahunBerdiri,
            $statusAkreditasi,
            $gambar,
            $namaFakultas,
            $namaDekan,
            $jumlahDosen,
            $jumlahMahasiswa
        );

        $this->namaProdi = $namaProdi;
        $this->jenjang = $jenjang;
        $this->namaKetuaProdi = $namaKetuaProdi;
        $this->akreditasiProdi = $akreditasiProdi;
    }


    // getter
    public function getNamaProdi()
    {
        return $this->namaProdi;
    }

    public function getJenjang()
    {
        return $this->jenjang;
    }

    public function getNamaKetuaProdi()
    {
        return $this->namaKetuaProdi;
    }

    public function getAkreditasiProdi()
    {
        return $this->akreditasiProdi;
    }


    // setter
    public function setNamaProdi($namaProdi)
    {
        $this->namaProdi = $namaProdi;
    }

    public function setJenjang($jenjang)
    {
        $this->jenjang = $jenjang;
    }

    public function setNamaKetuaProdi($namaKetuaProdi)
    {
        $this->namaKetuaProdi = $namaKetuaProdi;
    }

    public function setAkreditasiProdi($akreditasiProdi)
    {
        $this->akreditasiProdi = $akreditasiProdi;
    }
}

?>