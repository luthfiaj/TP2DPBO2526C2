public class ProgramStudi extends Fakultas {
    private String namaProdi;
    private String jenjang;
    private String namaKetuaProdi;
    private String akreditasiProdi;

    // constructor
    public ProgramStudi(String namaUniversitas, String alamat,
                        int tahunBerdiri, String statusAkreditasi,
                        String namaFakultas, String namaDekan,
                        int jumlahDosen, int jumlahMahasiswa,
                        String namaProdi, String jenjang,
                        String namaKetuaProdi, String akreditasiProdi) {

        super(namaUniversitas, alamat, tahunBerdiri,
            statusAkreditasi, namaFakultas, namaDekan,
            jumlahDosen, jumlahMahasiswa);

        this.namaProdi = namaProdi;
        this.jenjang = jenjang;
        this.namaKetuaProdi = namaKetuaProdi;
        this.akreditasiProdi = akreditasiProdi;
    }

    // getter dan setter nama prodi
    public String getNamaProdi() {
        return namaProdi;
    }

    public void setNamaProdi(String namaProdi) {
        this.namaProdi = namaProdi;
    }

    // getter dan setter jenjang
    public String getJenjang() {
        return jenjang;
    }

    public void setJenjang(String jenjang) {
        this.jenjang = jenjang;
    }

    // getter dan setter ketua prodi
    public String getNamaKetuaProdi() {
        return namaKetuaProdi;
    }

    public void setNamaKetuaProdi(String namaKetuaProdi) {
        this.namaKetuaProdi = namaKetuaProdi;
    }

    // getter dan setter akreditasi prodi
    public String getAkreditasiProdi() {
        return akreditasiProdi;
    }

    public void setAkreditasiProdi(String akreditasiProdi) {
        this.akreditasiProdi = akreditasiProdi;
    }
}