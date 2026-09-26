<?php

class PerguruanTinggi
{
    private $namaUniversitas;
    private $alamat;
    private $tahunBerdiri;
    private $statusAkreditasi;
    private $gambar;


    // constructor
    public function __construct(
        $namaUniversitas,
        $alamat,
        $tahunBerdiri,
        $statusAkreditasi,
        $gambar
    ) {
        $this->namaUniversitas = $namaUniversitas;
        $this->alamat = $alamat;
        $this->tahunBerdiri = $tahunBerdiri;
        $this->statusAkreditasi = $statusAkreditasi;
        $this->gambar = $gambar;
    }


    // getter
    public function getNamaUniversitas()
    {
        return $this->namaUniversitas;
    }

    public function getAlamat()
    {
        return $this->alamat;
    }

    public function getTahunBerdiri()
    {
        return $this->tahunBerdiri;
    }

    public function getStatusAkreditasi()
    {
        return $this->statusAkreditasi;
    }

    public function getGambar()
    {
        return $this->gambar;
    }


    // setter
    public function setNamaUniversitas($namaUniversitas)
    {
        $this->namaUniversitas = $namaUniversitas;
    }

    public function setAlamat($alamat)
    {
        $this->alamat = $alamat;
    }

    public function setTahunBerdiri($tahunBerdiri)
    {
        $this->tahunBerdiri = $tahunBerdiri;
    }

    public function setStatusAkreditasi($statusAkreditasi)
    {
        $this->statusAkreditasi = $statusAkreditasi;
    }

    public function setGambar($gambar)
    {
        $this->gambar = $gambar;
    }
}

?>