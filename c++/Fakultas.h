#ifndef FAKULTAS_H
#define FAKULTAS_H

#include "PerguruanTinggi.h"

class Fakultas : public PerguruanTinggi
{
private:
    string namaFakultas;
    string namaDekan;
    int jumlahDosen;
    int jumlahMahasiswa;

public:
    // constructor
    Fakultas(
        string namaUniversitas,
        string alamat,
        int tahunBerdiri,
        string statusAkreditasi,
        string namaFakultas,
        string namaDekan,
        int jumlahDosen,
        int jumlahMahasiswa
    )
        : PerguruanTinggi(
            namaUniversitas,
            alamat,
            tahunBerdiri,
            statusAkreditasi
        )
    {
        this->namaFakultas = namaFakultas;
        this->namaDekan = namaDekan;
        this->jumlahDosen = jumlahDosen;
        this->jumlahMahasiswa = jumlahMahasiswa;
    }

    // getter
    string getNamaFakultas()
    {
        return namaFakultas;
    }

    string getNamaDekan()
    {
        return namaDekan;
    }

    int getJumlahDosen()
    {
        return jumlahDosen;
    }

    int getJumlahMahasiswa()
    {
        return jumlahMahasiswa;
    }

    // setter
    void setNamaFakultas(string namaFakultas)
    {
        this->namaFakultas = namaFakultas;
    }

    void setNamaDekan(string namaDekan)
    {
        this->namaDekan = namaDekan;
    }

    void setJumlahDosen(int jumlahDosen)
    {
        this->jumlahDosen = jumlahDosen;
    }

    void setJumlahMahasiswa(int jumlahMahasiswa)
    {
        this->jumlahMahasiswa = jumlahMahasiswa;
    }
};

#endif