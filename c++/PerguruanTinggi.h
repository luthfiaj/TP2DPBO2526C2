#ifndef PERGURUAN_TINGGI_H
#define PERGURUAN_TINGGI_H

#include <string>
using namespace std;

class PerguruanTinggi
{
private:
    string namaUniversitas;
    string alamat;
    int tahunBerdiri;
    string statusAkreditasi;

public:
    // constructor
    PerguruanTinggi(
        string namaUniversitas,
        string alamat,
        int tahunBerdiri,
        string statusAkreditasi
    )
    {
        this->namaUniversitas = namaUniversitas;
        this->alamat = alamat;
        this->tahunBerdiri = tahunBerdiri;
        this->statusAkreditasi = statusAkreditasi;
    }

    // getter
    string getNamaUniversitas()
    {
        return namaUniversitas;
    }

    string getAlamat()
    {
        return alamat;
    }

    int getTahunBerdiri()
    {
        return tahunBerdiri;
    }

    string getStatusAkreditasi()
    {
        return statusAkreditasi;
    }

    // setter
    void setNamaUniversitas(string namaUniversitas)
    {
        this->namaUniversitas = namaUniversitas;
    }

    void setAlamat(string alamat)
    {
        this->alamat = alamat;
    }

    void setTahunBerdiri(int tahunBerdiri)
    {
        this->tahunBerdiri = tahunBerdiri;
    }

    void setStatusAkreditasi(string statusAkreditasi)
    {
        this->statusAkreditasi = statusAkreditasi;
    }
};

#endif