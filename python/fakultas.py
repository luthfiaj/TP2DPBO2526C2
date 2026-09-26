from perguruan_tinggi import PerguruanTinggi


class Fakultas(PerguruanTinggi):
    def __init__(
        self,
        namaUniversitas,
        alamat,
        tahunBerdiri,
        statusAkreditasi,
        namaFakultas,
        namaDekan,
        jumlahDosen,
        jumlahMahasiswa
    ):
        super().__init__(
            namaUniversitas,
            alamat,
            tahunBerdiri,
            statusAkreditasi
        )

        self._namaFakultas = namaFakultas
        self._namaDekan = namaDekan
        self._jumlahDosen = jumlahDosen
        self._jumlahMahasiswa = jumlahMahasiswa

    # getter dan setter nama fakultas
    def getNamaFakultas(self):
        return self._namaFakultas

    def setNamaFakultas(self, namaFakultas):
        self._namaFakultas = namaFakultas

    # getter dan setter dekan
    def getNamaDekan(self):
        return self._namaDekan

    def setNamaDekan(self, namaDekan):
        self._namaDekan = namaDekan

    # getter dan setter jumlah dosen
    def getJumlahDosen(self):
        return self._jumlahDosen

    def setJumlahDosen(self, jumlahDosen):
        self._jumlahDosen = jumlahDosen

    # getter dan setter jumlah mahasiswa
    def getJumlahMahasiswa(self):
        return self._jumlahMahasiswa

    def setJumlahMahasiswa(self, jumlahMahasiswa):
        self._jumlahMahasiswa = jumlahMahasiswa