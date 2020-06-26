$(document).ready(function () {
    $(".tabel-kadep").load("http://localhost/KM%20IT%20DEL/Home/tabelKadep");
    $("#keyword").on("keyup", function () {
        var keyword = $(this).val();

        $.ajax({
            type: "POST",
            url: "http://localhost/KM%20IT%20DEL/Home/tabelKadep",
            data: {
                keyword: keyword,
            },
            success: function (data) {
                $(".tabel-kadep").html(data);
            },
        });
    });
});

$(document).ready(function () {
    $(".tabel-kas").load("http://localhost/KM%20IT%20DEL/Home/tabelKas");
    $("#keyword").on("keyup", function () {
        var keyword = $(this).val();

        $.ajax({
            type: "POST",
            url: "http://localhost/KM%20IT%20DEL/Home/tabelKas",
            data: {
                keyword: keyword,
            },
            success: function (data) {
                $(".tabel-kas").html(data);
            },
        });
    });
});

$(document).ready(function () {
    $(".tabel-pengeluaran").load("http://localhost/KM%20IT%20DEL/Home/tabelPengeluaran");
    $("#keyword").on("keyup", function () {
        var keyword = $(this).val();

        $.ajax({
            type: "POST",
            url: "http://localhost/KM%20IT%20DEL/Home/tabelPengeluaran",
            data: {
                keyword: keyword,
            },
            success: function (data) {
                $(".tabel-pengeluaran").html(data);
            },
        });
    });
});


$(document).ready(function () {
    $(".tabel-anggota").load("http://localhost/KM%20IT%20DEL/Home/tabelAnggota");
    $("#keyword").on("keyup", function () {
        var keyword = $(this).val();

        $.ajax({
            type: "POST",
            url: "http://localhost/KM%20IT%20DEL/Home/tabelAnggota",
            data: {
                keyword: keyword,
            },
            success: function (data) {
                $(".tabel-anggota").html(data);
            },
        });
    });
});