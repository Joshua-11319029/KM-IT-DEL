console.log("Validasi Signup OK!");

// Validasi Input : Signup.php
function validate() {
    var NimMhs = document.getElementById("NimMhs").value;
    var Username = document.getElementById("Username").value;
    var Password = document.getElementById("Password").value;
    var Divisi = document.getElementById("Divisi").value;
    var Prodi = document.getElementById("Prodi").value;
    var Angkatan = document.getElementById("Angkatan").value;

    console.log(NimMhs);

    if (NimMhs.trim() == "") {
        alert("Masukkan NIM dengan Benar!");
        return false;
    } else if (Username.trim() == " ") {
        alert("Masukkan Username dengan Benar!");
        return false;
    } else if (Password.trim() == " ") {
        alert("Masukkan Password dengan Benar!");
        return false;
    } else if (Divisi == "0") {
        alert("Silahkan pilih Divisi terlebih dahulu!");
        return false;
    } else if (Prodi == "0") {
        alert("Silahkan pilih Prodi terlebih dahulu!");
        return false;
    } else if (Angkatan == "0") {
        alert("Silahkan pilih Angkatan terlebih dahulu!");
        return false;
    } else {
        alert("Data Segera Di Process!");
        return true;
    }
}
// END