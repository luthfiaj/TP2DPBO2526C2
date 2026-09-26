from fakultas import Fakultas


class ProgramStudi(Fakultas):
    def __init__(
        self,
        namaUniversitas,
        alamat,
        tahunBerdiri,
        statusAkreditasi,
        namaFakultas,
        namaDekan,
        jumlahDosen,
        jumlahMahasiswa,
        namaProdi,
        jenjang,
        namaKetuaProdi,
        akreditasiProdi
    ):
        super().__init__(
            namaUniversitas,
            alamat,
            tahunBerdiri,
            statusAkreditasi,
            namaFakultas,
            namaDekan,
            jumlahDosen,
            jumlahMahasiswa
        )

        self._namaProdi = namaProdi
        self._jenjang = jenjang
        self._namaKetuaProdi = namaKetuaProdi
        self._akreditasiProdi = akreditasiProdi

    # getter dan setter nama prodi
    def getNamaProdi(self):
        return self._namaProdi

    def setNamaProdi(self, namaProdi):
        self._namaProdi = namaProdi

    # getter dan setter jenjang
    def getJenjang(self):
        return self._jenjang

    def setJenjang(self, jenjang):
        self._jenjang = jenjang

    # getter dan setter ketua prodi
    def getNamaKetuaProdi(self):
        return self._namaKetuaProdi

    def setNamaKetuaProdi(self, namaKetuaProdi):
        self._namaKetuaProdi = namaKetuaProdi

    # getter dan setter akreditasi prodi
    def getAkreditasiProdi(self):
        return self._akreditasiProdi

    def setAkreditasiProdi(self, akreditasiProdi):
        self._akreditasiProdi = akreditasiProdi