// display a modal tambah kategori
$(document).on("click", "#buttonModalTambahKategori", function (event) {
    event.preventDefault();
    let href = $(this).attr("data-attr");
    $.ajax({
        url: href,
        // return the result
        success: function (result) {
            $("#tambahkategori_view").modal("show");
            $("#showModalTambahKategori").html(result).show();
        },
        error: function (jqXHR, testStatus, error) {
            console.log(error);
            alert("Page " + href + " cannot open. Error:" + error);
        },
    });
});

// display a modal tambah kategori
$(document).on("click", "#buttonModalTambahBarang", function (event) {
    event.preventDefault();
    let href = $(this).attr("data-attr");
    $.ajax({
        url: href,
        // return the result
        success: function (result) {
            $("#tambahbarang_view").modal("show");
            $("#showModalTambahBarang").html(result).show();
        },
        error: function (jqXHR, testStatus, error) {
            console.log(error);
            alert("Page " + href + " cannot open. Error:" + error);
        },
    });
});

// display a modal tambah user
$(document).on("click", "#buttonModalTambahUser", function (event) {
    event.preventDefault();
    let href = $(this).attr("data-attr");
    $.ajax({
        url: href,
        // return the result
        success: function (result) {
            $("#tambahuser_view").modal("show");
            $("#showModalTambahUser").html(result).show();
        },
        error: function (jqXHR, testStatus, error) {
            console.log(error);
            alert("Page " + href + " cannot open. Error:" + error);
        },
    });
});


// display a modal dosen
$(document).on("click", "#buttonModalDosen", function (event) {
    event.preventDefault();
    let href = $(this).attr("data-attr");
    $.ajax({
        url: href,
        // return the result
        success: function (result) {
            $("#dosen_view").modal("show");
            $("#showModalDosen").html(result).show();
        },
        error: function (jqXHR, testStatus, error) {
            console.log(error);
            alert("Page " + href + " cannot open. Error:" + error);
        },
    });
});

let modal_content = document.getElementsByClassName("modal-content");

// click class btn-close data-bs-toggle="tab" href="#tab-1" click
$("#btnClose").click(function () {
    // function tab1 click
    $("#tab1").click();

    // href to tab 1
    $("#tab-1").addClass("show active");
    $("#tab-2").removeClass("active");
    $("#tab-3").removeClass("active");
    $("#tab-4").removeClass("active");

    // nav-link set active
    $("#tab1").addClass("active");
    $("#tab2").removeClass("active");
    $("#tab3").removeClass("active");
    $("#tab4").removeClass("active");
});

$("#tab1").click(function () {
    // change modal content
    modal_content[0].classList.add("bg-info");
    modal_content[0].classList.remove("bg-danger");
    modal_content[0].classList.remove("bg-warning");
    modal_content[0].classList.remove("bg-success");
});

$("#tab2").click(function () {
    // change modal content
    modal_content[0].classList.remove("bg-info");
    modal_content[0].classList.add("bg-danger");
    modal_content[0].classList.remove("bg-warning");
    modal_content[0].classList.remove("bg-success");
});

$("#tab3").click(function () {
    // change modal content
    modal_content[0].classList.remove("bg-info");
    modal_content[0].classList.remove("bg-danger");
    modal_content[0].classList.add("bg-warning");
    modal_content[0].classList.remove("bg-success");
});

$("#tab4").click(function () {
    // change modal content
    modal_content[0].classList.remove("bg-info");
    modal_content[0].classList.remove("bg-danger");
    modal_content[0].classList.remove("bg-warning");
    modal_content[0].classList.add("bg-success");
});


