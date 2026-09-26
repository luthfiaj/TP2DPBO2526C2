public class Fakultas extends PerguruanTinggi {
    private String namaFakultas;
    private String namaDekan;
    private int jumlahDosen;
    private int jumlahMahasiswa;

    // constructor
    public Fakultas(String namaUniversitas, String alamat,
                    int tahunBerdiri, String statusAkreditasi,
                    String namaFakultas, String namaDekan,
                    int jumlahDosen, int jumlahMahasiswa) {

        super(namaUniversitas, alamat, tahunBerdiri, statusAkreditasi);

        this.namaFakultas = namaFakultas;
        this.namaDekan = namaDekan;
        this.jumlahDosen = jumlahDosen;
        this.jumlahMahasiswa = jumlahMahasiswa;
    }

    // getter dan setter nama fakultas
    public String getNamaFakultas() {
        return namaFakultas;
    }

    public void setNamaFakultas(String namaFakultas) {
        this.namaFakultas = namaFakultas;
    }

    // getter dan setter dekan
    public String getNamaDekan() {
        return namaDekan;
    }

    public void setNamaDekan(String namaDekan) {
        this.namaDekan = namaDekan;
    }

    // getter dan setter jumlah dosen
    public int getJumlahDosen() {
        return jumlahDosen;
    }

    public void setJumlahDosen(int jumlahDosen) {
        this.jumlahDosen = jumlahDosen;
    }

    // getter dan setter jumlah mahasiswa
    public int getJumlahMahasiswa() {
        return jumlahMahasiswa;
    }

    public void setJumlahMahasiswa(int jumlahMahasiswa) {
        this.jumlahMahasiswa = jumlahMahasiswa;
    }
}