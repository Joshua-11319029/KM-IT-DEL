console.log("Validasi Mahasiswa OK!");
// Validasi Mahasiswa : mahasiswa.php
function validasiMahasiswa() {
    var nama_mhs = document.getElementById("nama_mhs").value;
    var nim_mhs = document.getElementById("nim_mhs").value;
    var no_telp = document.getElementById("no_telp").value;
    var Prodi = document.getElementById("Prodi").value;
    var Angkatan = document.getElementById("Angkatan").value;
    var Jenis_kelamin = document.getElementById("Jenis_kelamin").value;

    var number = /^[0-9]+$/;
    var alphabet = /^[a-zA-Z ]+$/;

    if (nama_mhs.trim() == "") {
        alert("Masukkan Nama Mahasiswa yang Valid!");
        return false;
    } else if (nim_mhs.trim() == "") {
        alert("Masukkan NIM Mahasiswa yang Valid!");
        return false;
    } else if (!no_telp.match(number)) {
        alert("Masukkan No.Telp dengan Benar!");
        return false;
    } else if (Prodi == 0) {
        alert("Pilih Prodi Terlebih Dahulu!");
        return false;
    } else if (Angkatan == 0) {
        alert("Pilih Angkatan Terlebih Dahulu!");
        return false;
    } else if (Jenis_kelamin == 0) {
        alert("Pilih Jenis Kelamin terlebih Dahulu!");
        return false;
    } else {
        return true;
    }
}
//