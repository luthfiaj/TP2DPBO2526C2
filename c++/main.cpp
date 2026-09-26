#include <iostream>
#include <vector>
#include <iomanip>
#include <sstream>
#include <string>
#include "ProgramStudi.h"

using namespace std;

// header tabel
string HEADER[] =
{
    "No",
    "Universitas",
    "Alamat",
    "Tahun",
    "Akreditasi Univ",
    "Fakultas",
    "Dekan",
    "Jml Dosen",
    "Jml Mhs",
    "Program Studi",
    "Jenjang",
    "Ketua Prodi",
    "Akreditasi Prodi"
};

const int JUMLAH_HEADER = 13;


string intToString(int angka)
{
    return to_string(angka);
}


int parseIntSafe(string input)
{
    try
    {
        return stoi(input);
    }
    catch (...)
    {
        return 0;
    }
}

void tambahData(vector<ProgramStudi>& dataList)
{
    string namaUniversitas;
    string alamat;
    string tahunBerdiri;
    string statusAkreditasi;

    string namaFakultas;
    string namaDekan;
    string jumlahDosen;
    string jumlahMahasiswa;

    string namaProdi;
    string jenjang;
    string namaKetuaProdi;
    string akreditasiProdi;

    cout << "\n========================================\n";
    cout << "       TAMBAH DATA PERGURUAN TINGGI\n";
    cout << "========================================\n";

    // nerima inputan perguruan tinggi
    cout << "Nama Perguruan Tinggi : ";
    getline(cin, namaUniversitas);

    cout << "Alamat                : ";
    getline(cin, alamat);

    cout << "Tahun Berdiri         : ";
    getline(cin, tahunBerdiri);

    cout << "Akreditasi Universitas: ";
    getline(cin, statusAkreditasi);


    // nerima inputan fakultas
    cout << "Nama Fakultas         : ";
    getline(cin, namaFakultas);

    cout << "Nama Dekan            : ";
    getline(cin, namaDekan);

    cout << "Jumlah Dosen          : ";
    getline(cin, jumlahDosen);

    cout << "Jumlah Mahasiswa      : ";
    getline(cin, jumlahMahasiswa);


    // nerima inputan program studi
    cout << "Nama Program Studi    : ";
    getline(cin, namaProdi);

    cout << "Jenjang               : ";
    getline(cin, jenjang);

    cout << "Nama Ketua Prodi      : ";
    getline(cin, namaKetuaProdi);

    cout << "Akreditasi Prodi      : ";
    getline(cin, akreditasiProdi);


    // bikin object baru
    ProgramStudi baru(
        namaUniversitas,
        alamat,
        parseIntSafe(tahunBerdiri),
        statusAkreditasi,
        namaFakultas,
        namaDekan,
        parseIntSafe(jumlahDosen),
        parseIntSafe(jumlahMahasiswa),
        namaProdi,
        jenjang,
        namaKetuaProdi,
        akreditasiProdi
    );

    // masukin object ke vector
    dataList.push_back(baru);

    cout << "\nData berhasil ditambahkan!\n";
}

void printSeparator(vector<int>& width)
{
    cout << "+";

    for (int i = 0; i < JUMLAH_HEADER; i++)
    {
        cout << string(width[i] + 2, '-');
        cout << "+";
    }

    cout << endl;
}

void printRow(vector<string>& row, vector<int>& width)
{
    cout << "|";

    for (int i = 0; i < JUMLAH_HEADER; i++)
    {
        cout << " ";
        cout << left << setw(width[i]) << row[i];
        cout << " |";
    }

    cout << endl;
}


void tampilkanTabel(vector<ProgramStudi>& dataList)
{
    if (dataList.empty())
    {
        cout << "\nBelum ada data.\n";
        return;
    }

    // nyiapin tempat buat semua baris
    vector<vector<string>> rows;


    // masukin data object ke tabel
    for (int i = 0; i < dataList.size(); i++)
    {
        vector<string> row;

        row.push_back(intToString(i + 1));
        row.push_back(dataList[i].getNamaUniversitas());
        row.push_back(dataList[i].getAlamat());
        row.push_back(intToString(dataList[i].getTahunBerdiri()));
        row.push_back(dataList[i].getStatusAkreditasi());

        row.push_back(dataList[i].getNamaFakultas());
        row.push_back(dataList[i].getNamaDekan());
        row.push_back(intToString(dataList[i].getJumlahDosen()));
        row.push_back(intToString(dataList[i].getJumlahMahasiswa()));

        row.push_back(dataList[i].getNamaProdi());
        row.push_back(dataList[i].getJenjang());
        row.push_back(dataList[i].getNamaKetuaProdi());
        row.push_back(dataList[i].getAkreditasiProdi());

        rows.push_back(row);
    }


    // ukuran awal kolom = panjang header
    vector<int> width(JUMLAH_HEADER);

    for (int i = 0; i < JUMLAH_HEADER; i++)
    {
        width[i] = HEADER[i].length();
    }


    // cari data yang paling panjang
    for (int i = 0; i < rows.size(); i++)
    {
        for (int j = 0; j < JUMLAH_HEADER; j++)
        {
            if (rows[i][j].length() > width[j])
            {
                width[j] = rows[i][j].length();
            }
        }
    }


    cout << "\n========================================\n";
    cout << "       DATA PERGURUAN TINGGI\n";
    cout << "========================================\n\n";


    // nampilin garis atas
    printSeparator(width);

    // nampilin header
    vector<string> headerRow;

    for (int i = 0; i < JUMLAH_HEADER; i++)
    {
        headerRow.push_back(HEADER[i]);
    }

    printRow(headerRow, width);

    // garis setelah header
    printSeparator(width);


    // nampilin semua data
    for (int i = 0; i < rows.size(); i++)
    {
        printRow(rows[i], width);
    }

    // garis paling bawah
    printSeparator(width);
}


int main()
{
    // tempat nyimpen object ProgramStudi
    vector<ProgramStudi> dataList;


    dataList.push_back(
        ProgramStudi(
            "Institut Teknologi Bandung",
            "Bandung",
            1959,
            "Unggul",
            "STEI",
            "Dekan Contoh 1",
            120,
            2500,
            "Teknik Informatika",
            "S1",
            "Ketua Prodi Contoh 1",
            "Unggul"
        )
    );


    dataList.push_back(
        ProgramStudi(
            "Universitas Pendidikan Indonesia",
            "Bandung",
            1954,
            "Unggul",
            "FPMIPA",
            "Dekan Contoh 2",
            150,
            4000,
            "Pendidikan Matematika",
            "S1",
            "Ketua Prodi Contoh 2",
            "A"
        )
    );


    dataList.push_back(
        ProgramStudi(
            "Institut Pemerintahan Dalam Negeri",
            "Jatinangor / Sumedang",
            1967,
            "Baik Sekali",
            "Fakultas Politik Pemerintahan",
            "Dekan Contoh 3",
            140,
            3500,
            "Kebijakan Publik",
            "S1 Terapan",
            "Ketua Prodi Contoh 3",
            "A"
        )
    );


    dataList.push_back(
        ProgramStudi(
            "Akademi Militer",
            "Magelang",
            1945,
            "Baik Sekali",
            "Direktorat Pendidikan Pertahanan",
            "Dekan Contoh 4",
            80,
            1200,
            "Manajemen Pertahanan",
            "D4 (Sarjana Terapan)",
            "Ketua Prodi Contoh 4",
            "B"
        )
    );


    dataList.push_back(
        ProgramStudi(
            "Politeknik Statistika STIS",
            "Jakarta Timur",
            1958,
            "Baik Sekali",
            "Jurusan Statistika Sosial Kependudukan",
            "Dekan Contoh 5",
            50,
            1200,
            "Statistika",
            "D4 (Sarjana Terapan)",
            "Ketua Prodi Contoh 5",
            "A"
        )
    );

//menu

    int pilihan = 0;

    do
    {
        cout << "\n========================================\n";
        cout << "       DATA PERGURUAN TINGGI\n";
        cout << "========================================\n";
        cout << "1. Tambah Data Perguruan Tinggi\n";
        cout << "2. Tampilkan Seluruh Data\n";
        cout << "3. Keluar\n";
        cout << "========================================\n";
        cout << "Pilihan : ";

        string inputPilihan;
        getline(cin, inputPilihan);

        pilihan = parseIntSafe(inputPilihan);


        if (pilihan == 1)
        {
            tambahData(dataList);
        }
        else if (pilihan == 2)
        {
            tampilkanTabel(dataList);
        }
        else if (pilihan == 3)
        {
            cout << "\nProgram selesai.\n";
        }
        else
        {
            cout << "\nPilihan tidak valid!\n";
        }

    } while (pilihan != 3);


    return 0;
}