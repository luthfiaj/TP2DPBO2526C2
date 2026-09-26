public class PerguruanTinggi {
    private String namaUniversitas;
    private String alamat;
    private int tahunBerdiri;
    private String statusAkreditasi;

    // constructor
    public PerguruanTinggi(String namaUniversitas, String alamat,int tahunBerdiri, String statusAkreditasi) {
        this.namaUniversitas = namaUniversitas;
        this.alamat = alamat;
        this.tahunBerdiri = tahunBerdiri;
        this.statusAkreditasi = statusAkreditasi;
    }

    // getter dan setter nama universitas
    public String getNamaUniversitas() {
        return namaUniversitas;
    }

    public void setNamaUniversitas(String namaUniversitas) {
        this.namaUniversitas = namaUniversitas;
    }

    // getter dan setter alamat
    public String getAlamat() {
        return alamat;
    }

    public void setAlamat(String alamat) {
        this.alamat = alamat;
    }

    // getter dan setter tahun berdiri
    public int getTahunBerdiri() {
        return tahunBerdiri;
    }

    public void setTahunBerdiri(int tahunBerdiri) {
        this.tahunBerdiri = tahunBerdiri;
    }

    // getter dan setter akreditasi
    public String getStatusAkreditasi() {
        return statusAkreditasi;
    }

    public void setStatusAkreditasi(String statusAkreditasi) {
        this.statusAkreditasi = statusAkreditasi;
    }
}