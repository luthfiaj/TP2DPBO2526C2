class PerguruanTinggi:
    def __init__(self, namaUniversitas, alamat, tahunBerdiri, statusAkreditasi):
        self._namaUniversitas = namaUniversitas
        self._alamat = alamat
        self._tahunBerdiri = tahunBerdiri
        self._statusAkreditasi = statusAkreditasi

    # getter dan setter nama universitas
    def getNamaUniversitas(self):
        return self._namaUniversitas

    def setNamaUniversitas(self, namaUniversitas):
        self._namaUniversitas = namaUniversitas

    # getter dan setter alamat
    def getAlamat(self):
        return self._alamat

    def setAlamat(self, alamat):
        self._alamat = alamat

    # getter dan setter tahun berdiri
    def getTahunBerdiri(self):
        return self._tahunBerdiri

    def setTahunBerdiri(self, tahunBerdiri):
        self._tahunBerdiri = tahunBerdiri

    # getter dan setter akreditasi
    def getStatusAkreditasi(self):
        return self._statusAkreditasi

    def setStatusAkreditasi(self, statusAkreditasi):
        self._statusAkreditasi = statusAkreditasi