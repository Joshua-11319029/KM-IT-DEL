console.log("Script Validasi OK!");

// Validasi Input : Login.php
function validasi() {
    var username = document.getElementById("inputUsername3").value;
    var password = document.getElementById("inputPassword3").value;

    if (username.trim() == "") {
        alert("Masukkan Username dengan Benar!");
        return false;
    } else if (password.trim() == "") {
        alert("Masukkan Password dengan Benar!");
        return false;
    } else {
        return true;
    }
}
// END