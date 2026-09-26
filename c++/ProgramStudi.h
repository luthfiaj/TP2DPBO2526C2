#ifndef PROGRAM_STUDI_H
#define PROGRAM_STUDI_H

#include "Fakultas.h"

class ProgramStudi : public Fakultas
{
private:
    string namaProdi;
    string jenjang;
    string namaKetuaProdi;
    string akreditasiProdi;

public:
    // constructor
    ProgramStudi(
        string namaUniversitas,
        string alamat,
        int tahunBerdiri,
        string statusAkreditasi,
        string namaFakultas,
        string namaDekan,
        int jumlahDosen,
        int jumlahMahasiswa,
        string namaProdi,
        string jenjang,
        string namaKetuaProdi,
        string akreditasiProdi
    )
        : Fakultas(
            namaUniversitas,
            alamat,
            tahunBerdiri,
            statusAkreditasi,
            namaFakultas,
            namaDekan,
            jumlahDosen,
            jumlahMahasiswa
        )
    {
        this->namaProdi = namaProdi;
        this->jenjang = jenjang;
        this->namaKetuaProdi = namaKetuaProdi;
        this->akreditasiProdi = akreditasiProdi;
    }

    // getter
    string getNamaProdi()
    {
        return namaProdi;
    }

    string getJenjang()
    {
        return jenjang;
    }

    string getNamaKetuaProdi()
    {
        return namaKetuaProdi;
    }

    string getAkreditasiProdi()
    {
        return akreditasiProdi;
    }

    // setter
    void setNamaProdi(string namaProdi)
    {
        this->namaProdi = namaProdi;
    }

    void setJenjang(string jenjang)
    {
        this->jenjang = jenjang;
    }

    void setNamaKetuaProdi(string namaKetuaProdi)
    {
        this->namaKetuaProdi = namaKetuaProdi;
    }

    void setAkreditasiProdi(string akreditasiProdi)
    {
        this->akreditasiProdi = akreditasiProdi;
    }
};

#endif