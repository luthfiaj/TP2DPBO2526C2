from program_studi import ProgramStudi


# Nama kolom tabel
HEADER = [
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
]




def main():

    # list untuk menyimpan data
    dataList = []

    # 1. Institut -> ITB
    dataList.append(
        ProgramStudi(
            "Institut Teknologi Bandung (ITB)",
            "Jl. Ganesa No. 10, Bandung, Jawa Barat",
            1959,
            "Unggul",
            "Sekolah Teknik Elektro dan Informatika (STEI)",
            "(Contoh) Dr. Ir. Bagus Prasetyo, M.T.",
            120,
            2500,
            "Teknik Informatika",
            "S1",
            "(Contoh) Dr. Hana Yuliana, S.T., M.T.",
            "Unggul"
        )
    )

    # 2. Universitas -> UPI
    dataList.append(
        ProgramStudi(
            "Universitas Pendidikan Indonesia (UPI)",
            "Jl. Dr. Setiabudhi No. 229, Bandung, Jawa Barat",
            1954,
            "Unggul",
            "Fakultas Pendidikan Matematika dan IPA (FPMIPA)",
            "(Contoh) Prof. Dr. Sri Wahyuni, M.Pd.",
            150,
            4000,
            "Pendidikan Matematika",
            "S1",
            "(Contoh) Dr. Taufik Hidayat, M.Pd.",
            "A"
        )
    )

    # 3. Institut -> IPDN
    dataList.append(
        ProgramStudi(
            "Institut Pemerintahan Dalam Negeri (IPDN)",
            "Jl. Ir. Soekarno, Jatinangor, Sumedang, Jawa Barat",
            1967,
            "Baik Sekali",
            "Fakultas Politik Pemerintahan",
            "(Contoh) Dr. Made Wirawan, M.Si.",
            140,
            3500,
            "Kebijakan Publik",
            "S1 Terapan",
            "(Contoh) Dr. Anisa Putri, M.Si.",
            "A"
        )
    )

    # 4. Akademi -> Akademi Militer
    dataList.append(
        ProgramStudi(
            "Akademi Militer (Akmil)",
            "Jl. Gatot Subroto, Magelang, Jawa Tengah",
            1945,
            "Baik Sekali",
            "Direktorat Pendidikan Pertahanan",
            "(Contoh) Kolonel Inf. Reza Firmansyah",
            80,
            1200,
            "Manajemen Pertahanan",
            "D4 (Sarjana Terapan)",
            "(Contoh) Letkol Inf. Guntur Aji",
            "B"
        )
    )

    # 5. Sekolah Tinggi -> STIS
    dataList.append(
        ProgramStudi(
            "Politeknik Statistika STIS (d/h Sekolah Tinggi Ilmu Statistik)",
            "Jl. Otto Iskandardinata No. 64C, Jakarta Timur",
            1958,
            "Baik Sekali",
            "Jurusan Statistika Sosial Kependudukan",
            "(Contoh) Dr. Ratna Kusuma, M.Si.",
            50,
            1200,
            "Statistika",
            "D4 (Sarjana Terapan)",
            "(Contoh) Dr. Yoga Pramana, M.Si.",
            "A"
        )
    )

    running = True

    while running:

        print("\n===== Selamat Datang di Data Perguruan Tinggi =====")
        print("1. Tambah Data Perguruan Tinggi")
        print("2. Tampilkan Seluruh Data")
        print("3. Keluar")
        print("Pilih menu: ", end="")

        pilihan = input().strip()

        if pilihan == "1":
            tambahData(dataList)

        elif pilihan == "2":
            tampilkanTabel(dataList)

        elif pilihan == "3":
            running = False
            print("Program selesai.")

        else:
            print("Pilihan tidak valid, silakan coba lagi.")



def tambahData(dataList):

    print("\n-- Tambah Data Baru --")

    print("Nama Universitas   : ", end="")
    namaUniversitas = input()

    print("Alamat             : ", end="")
    alamat = input()

    print("Tahun Berdiri      : ", end="")
    tahunBerdiri = parseIntSafe(input())

    print("Status Akreditasi  : ", end="")
    statusAkreditasi = input()

    print("Nama Fakultas      : ", end="")
    namaFakultas = input()

    print("Nama Dekan         : ", end="")
    namaDekan = input()

    print("Jumlah Dosen       : ", end="")
    jumlahDosen = parseIntSafe(input())

    print("Jumlah Mahasiswa   : ", end="")
    jumlahMahasiswa = parseIntSafe(input())

    print("Nama Program Studi : ", end="")
    namaProdi = input()

    print("Jenjang            : ", end="")
    jenjang = input()

    print("Nama Ketua Prodi   : ", end="")
    namaKetuaProdi = input()

    print("Akreditasi Prodi   : ", end="")
    akreditasiProdi = input()

    baru = ProgramStudi(
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
    )

    dataList.append(baru)

    print("Data berhasil ditambahkan!")


def parseIntSafe(s):

    try:
        return int(s.strip())

    except ValueError:
        return 0


def tampilkanTabel(dataList):

    if len(dataList) == 0:
        print("\nBelum ada data.")
        return

    kolom = len(HEADER)

    rows = []

    for i in range(len(dataList)):

        p = dataList[i]

        row = [
            str(i + 1),
            p.getNamaUniversitas(),
            p.getAlamat(),
            str(p.getTahunBerdiri()),
            p.getStatusAkreditasi(),
            p.getNamaFakultas(),
            p.getNamaDekan(),
            str(p.getJumlahDosen()),
            str(p.getJumlahMahasiswa()),
            p.getNamaProdi(),
            p.getJenjang(),
            p.getNamaKetuaProdi(),
            p.getAkreditasiProdi()
        ]

        rows.append(row)

    width = [0] * kolom

    for c in range(kolom):

        width[c] = len(HEADER[c])

        for row in rows:

            if row[c] is not None and len(row[c]) > width[c]:
                width[c] = len(row[c])

    print("\n===== DATA PERGURUAN TINGGI - FAKULTAS - PROGRAM STUDI =====")

    printSeparator(width)

    printRow(HEADER, width)

    printSeparator(width)

    for row in rows:
        printRow(row, width)

    printSeparator(width)


def printRow(row, width):

    sb = "|"

    for c in range(len(row)):

        sb += " "
        sb += padRight(row[c], width[c])
        sb += " |"

    print(sb)


def printSeparator(width):

    sb = "+"

    for w in width:

        for i in range(w + 2):
            sb += "-"

        sb += "+"

    print(sb)


def padRight(s, width):

    if s is None:
        s = ""

    sb = s

    while len(sb) < width:
        sb += " "

    return sb

if __name__ == "__main__":
    main()