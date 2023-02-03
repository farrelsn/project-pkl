const charts = document.querySelectorAll(".chart");

charts.forEach(function (chart) {
  var ctx = chart.getContext("2d");
  var myChart = new Chart(ctx, {
    type: "bar",
    data: {
      labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
      datasets: [
        {
          label: "# of Votes",
          data: [12, 19, 3, 5, 2, 3],
          backgroundColor: [
            "rgba(255, 99, 132, 0.2)",
            "rgba(54, 162, 235, 0.2)",
            "rgba(255, 206, 86, 0.2)",
            "rgba(75, 192, 192, 0.2)",
            "rgba(153, 102, 255, 0.2)",
            "rgba(255, 159, 64, 0.2)",
          ],
          borderColor: [
            "rgba(255, 99, 132, 1)",
            "rgba(54, 162, 235, 1)",
            "rgba(255, 206, 86, 1)",
            "rgba(75, 192, 192, 1)",
            "rgba(153, 102, 255, 1)",
            "rgba(255, 159, 64, 1)",
          ],
          borderWidth: 1,
        },
      ],
    },
    options: {
      scales: {
        y: {
          beginAtZero: true,
        },
      },
    },
  });
});

$(document).ready(function () {
  $(".data-table").each(function (_, table) {
    $(table).DataTable();
  });
});

var inputFoto = document.getElementById("foto-profil");

// var stok_awal_container = document.getElementById("stok_awal_container");
// var stok_akhir_container = document.getElementById("stok_akhir_container");
// var nama_barang = document.getElementById("nama_barang");
// var jumlah_barang = document.getElementById("jumlah_barang");
// var stok_awal = document.getElementById("stok_awal").value;

// nama_barang.addEventListener("change", function () {
//   if(this.value != ""){
//     stok_awal_container.style.display = "block";
//     stok_akhir_container.style.display = "block";
//     stok_awal = "{{ $alat_kerja->stok }}";
//     console.log("Value Nama Barang : " + nama_barang.value);
//   }
//   else{
//     stok_awal_container.style.display = "none";
//     stok_akhir_container.style.display = "none";
//   }
// });




// jumlah_barang.addEventListener("keyup", function () {
//   //"SELECT stok FROM tb_alat_kerja WHERE nama_alat_kerja = '" + nama_barang.value + "'";
//   console.log("Stok Awal: " + stok_awal);
//   var stok_akhir = document.getElementById("stok_akhir");
//   stok_akhir.value = parseInt(stok_awal) + parseInt(this.value);
// });

// // function TampilkanStok(){
// //   if(nama_barang.value != null){
// //     stok_awal.style.display = "block";
// //     stok_akhir.style.display = "block";
// //     //stok_awal.value = "SELECT stok FROM tb_alat_kerja WHERE nama_alat_kerja = '" + nama_barang.value + "'";
// //     //stok_akhir.value = "SELECT stok FROM tb_alat_kerja WHERE nama_alat_kerja = '" + nama_barang.value + "'" + " + " + jumlah_barang.value;
// //   }
// //   else{
// //     stok_awal.style.display = "none";
// //     stok_akhir.style.display = "none";
// //   }
// // }

// // function PreviewStok(){
// //   stok_akhir.value = stok_awal.value + jumlah_barang.value;
// // }