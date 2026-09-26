import java.util.ArrayList;
import java.util.List;
import java.util.Scanner;

public class Main {

    // Nama kolom tabel (dipakai bersama untuk header & perhitungan lebar dinamis)
    static final String[] HEADER = {
            "No", "Universitas", "Alamat", "Tahun", "Akreditasi Univ",
            "Fakultas", "Dekan", "Jml Dosen", "Jml Mhs",
            "Program Studi", "Jenjang", "Ketua Prodi", "Akreditasi Prodi"
    };

    public static void main(String[] args) {
        Scanner sc = new Scanner(System.in);
        List<ProgramStudi> dataList = new ArrayList<>();

        // 1. Universitas -> ITB
        dataList.add(new ProgramStudi(
                "Institut Teknologi Bandung (ITB)", "Jl. Ganesa No. 10, Bandung, Jawa Barat", 1959, "Unggul",
                "Sekolah Teknik Elektro dan Informatika (STEI)", "(Contoh) Dr. Ir. Bagus Prasetyo, M.T.", 120, 2500,
                "Teknik Informatika", "S1", "(Contoh) Dr. Hana Yuliana, S.T., M.T.", "Unggul"));

        // 2. Universitas -> UPI
        dataList.add(new ProgramStudi(
                "Universitas Pendidikan Indonesia (UPI)", "Jl. Dr. Setiabudhi No. 229, Bandung, Jawa Barat", 1954, "Unggul",
                "Fakultas Pendidikan Matematika dan IPA (FPMIPA)", "(Contoh) Prof. Dr. Sri Wahyuni, M.Pd.", 150, 4000,
                "Pendidikan Matematika", "S1", "(Contoh) Dr. Taufik Hidayat, M.Pd.", "A"));

        // 3. Institut -> IPDN (Institut Pemerintahan Dalam Negeri)
        dataList.add(new ProgramStudi(
                "Institut Pemerintahan Dalam Negeri (IPDN)", "Jl. Ir. Soekarno, Jatinangor, Sumedang, Jawa Barat", 1967, "Baik Sekali",
                "Fakultas Politik Pemerintahan", "(Contoh) Dr. Made Wirawan, M.Si.", 140, 3500,
                "Kebijakan Publik", "S1 Terapan", "(Contoh) Dr. Anisa Putri, M.Si.", "A"));

        // 4. Akademi -> Akademi Militer (Akmil)
        dataList.add(new ProgramStudi(
                "Akademi Militer (Akmil)", "Jl. Gatot Subroto, Magelang, Jawa Tengah", 1945, "Baik Sekali",
                "Direktorat Pendidikan Pertahanan", "(Contoh) Kolonel Inf. Reza Firmansyah", 80, 1200,
                "Manajemen Pertahanan", "D4 (Sarjana Terapan)", "(Contoh) Letkol Inf. Guntur Aji", "B"));

        // 5. Sekolah Tinggi -> Politeknik Statistika STIS (dahulu Sekolah Tinggi Ilmu Statistik)
        dataList.add(new ProgramStudi(
                "Politeknik Statistika STIS (d/h Sekolah Tinggi Ilmu Statistik)", "Jl. Otto Iskandardinata No. 64C, Jakarta Timur", 1958, "Baik Sekali",
                "Jurusan Statistika Sosial Kependudukan", "(Contoh) Dr. Ratna Kusuma, M.Si.", 50, 1200,
                "Statistika", "D4 (Sarjana Terapan)", "(Contoh) Dr. Yoga Pramana, M.Si.", "A"));

        boolean running = true;
        while (running) {
            System.out.println("\n===== Selamat Datang di Data Perguruan Tinggi =====");
            System.out.println("1. Tambah Data Perguruan Tinggi");
            System.out.println("2. Tampilkan Seluruh Data");
            System.out.println("3. Keluar");
            System.out.print("Pilih menu: ");

            String pilihan = sc.nextLine().trim();

            switch (pilihan) {
                case "1":
                    tambahData(sc, dataList);
                    break;
                case "2":
                    tampilkanTabel(dataList);
                    break;
                case "3":
                    running = false;
                    System.out.println("Program selesai.");
                    break;
                default:
                    System.out.println("Pilihan tidak valid, silakan coba lagi.");
            }
        }

        sc.close();
    }

    //nerima inputan
    static void tambahData(Scanner sc, List<ProgramStudi> dataList) {
        System.out.println("\n-- Tambah Data Baru --");

        System.out.print("Nama Universitas   : ");
        String namaUniversitas = sc.nextLine();

        System.out.print("Alamat             : ");
        String alamat = sc.nextLine();

        System.out.print("Tahun Berdiri      : ");
        int tahunBerdiri = parseIntSafe(sc.nextLine());

        System.out.print("Status Akreditasi  : ");
        String statusAkreditasi = sc.nextLine();

        System.out.print("Nama Fakultas      : ");
        String namaFakultas = sc.nextLine();

        System.out.print("Nama Dekan         : ");
        String namaDekan = sc.nextLine();

        System.out.print("Jumlah Dosen       : ");
        int jumlahDosen = parseIntSafe(sc.nextLine());

        System.out.print("Jumlah Mahasiswa   : ");
        int jumlahMahasiswa = parseIntSafe(sc.nextLine());

        System.out.print("Nama Program Studi : ");
        String namaProdi = sc.nextLine();

        System.out.print("Jenjang            : ");
        String jenjang = sc.nextLine();

        System.out.print("Nama Ketua Prodi   : ");
        String namaKetuaProdi = sc.nextLine();

        System.out.print("Akreditasi Prodi   : ");
        String akreditasiProdi = sc.nextLine();

        ProgramStudi baru = new ProgramStudi(
                namaUniversitas, alamat, tahunBerdiri, statusAkreditasi,
                namaFakultas, namaDekan, jumlahDosen, jumlahMahasiswa,
                namaProdi, jenjang, namaKetuaProdi, akreditasiProdi);

        dataList.add(baru);
        System.out.println("Data berhasil ditambahkan!");
    }

    static int parseIntSafe(String s) {
        try {
            return Integer.parseInt(s.trim());
        } catch (NumberFormatException e) {
            return 0;
        }
    }

    // nampilin data perguruan tinggi nya
    static void tampilkanTabel(List<ProgramStudi> dataList) {
        if (dataList.isEmpty()) {
            System.out.println("\nBelum ada data.");
            return;
        }

        int kolom = HEADER.length;
        String[][] rows = new String[dataList.size()][kolom];

        for (int i = 0; i < dataList.size(); i++) {
            ProgramStudi p = dataList.get(i);
            rows[i][0] = String.valueOf(i + 1);
            rows[i][1] = p.getNamaUniversitas();
            rows[i][2] = p.getAlamat();
            rows[i][3] = String.valueOf(p.getTahunBerdiri());
            rows[i][4] = p.getStatusAkreditasi();
            rows[i][5] = p.getNamaFakultas();
            rows[i][6] = p.getNamaDekan();
            rows[i][7] = String.valueOf(p.getJumlahDosen());
            rows[i][8] = String.valueOf(p.getJumlahMahasiswa());
            rows[i][9] = p.getNamaProdi();
            rows[i][10] = p.getJenjang();
            rows[i][11] = p.getNamaKetuaProdi();
            rows[i][12] = p.getAkreditasiProdi();
        }

        // Hitung lebar setiap kolom secara dinamis (max dari header & isi data)
        int[] width = new int[kolom];
        for (int c = 0; c < kolom; c++) {
            width[c] = HEADER[c].length();
            for (String[] row : rows) {
                if (row[c] != null && row[c].length() > width[c]) {
                    width[c] = row[c].length();
                }
            }
        }

        System.out.println("\n===== DATA PERGURUAN TINGGI - FAKULTAS - PROGRAM STUDI =====");
        printSeparator(width);
        printRow(HEADER, width);
        printSeparator(width);
        for (String[] row : rows) {
            printRow(row, width);
        }
        printSeparator(width);
    }

    static void printRow(String[] row, int[] width) {
        StringBuilder sb = new StringBuilder("|");
        for (int c = 0; c < row.length; c++) {
            sb.append(" ").append(padRight(row[c], width[c])).append(" |");
        }
        System.out.println(sb.toString());
    }

    static void printSeparator(int[] width) {
        StringBuilder sb = new StringBuilder("+");
        for (int w : width) {
            for (int i = 0; i < w + 2; i++) sb.append("-");
            sb.append("+");
        }
        System.out.println(sb.toString());
    }

    static String padRight(String s, int width) {
        if (s == null) s = "";
        StringBuilder sb = new StringBuilder(s);
        while (sb.length() < width) sb.append(" ");
        return sb.toString();
    }
}