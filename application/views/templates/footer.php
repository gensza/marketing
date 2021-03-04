<!-- Footer Start -->
<footer class="footer">
    <div class="container-fluid">
        <div class="row">
        <div class="col-md-6">
                Copyright MIS &copy; <script>
                document.write(new Date().getFullYear())
                </script><a href=""> MSAL Group</a>
            </div>
        </div>
    </div>
</footer>
<!-- end Footer -->

</div>

<!-- ============================================================== -->
<!-- End Page content -->
<!-- ============================================================== -->


</div>
<!-- END wrapper -->



<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>

<!-- Vendor js -->
<script src="<?= base_url() ?>/assets/js/vendor.min.js"></script>

<!-- third party js -->
<script src="<?= base_url() ?>/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url() ?>/assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>/assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url() ?>/assets/libs/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="<?= base_url() ?>/assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url() ?>/assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="<?= base_url() ?>/assets/libs/datatables.net-select/js/dataTables.select.min.js"></script>
<script src="<?= base_url() ?>/assets/libs/pdfmake/build/pdfmake.min.js"></script>
<script src="<?= base_url() ?>/assets/libs/pdfmake/build/vfs_fonts.js"></script>
<!-- third party js ends -->

<!-- Datatables init -->
<script src="<?= base_url() ?>/assets/js/pages/datatables.init.js"></script>

<!-- App js -->
<script src="<?= base_url() ?>/assets/js/app.min.js"></script>

</body>

</html>

<script type="text/javascript">
$(document).ready(function() {
    $("#k_ltc, #k_stc").keyup(function() {
        var ltc = $("#k_ltc").val();
        var stc = $("#k_stc").val();

        var saldo = parseInt(ltc) - parseInt(stc);

        if (saldo < 0) {
            Swal.fire({
                allowOutsideClick: false,
                title: 'Melebihi Total Kuantitas LTC!',
                confirmButtonText: 'OKE'
            }).then(function() {
                location.reload();
            });
        } else {
            $("#saldo").val(saldo);
        }
    });
});

$(document).ready(function() {
    $("#qty, #price, #dp_persen, #ppn").keyup(function() {
        var qty = $("#qty").val();
        var price = $("#price").val();
        var dp_persen = $("#dp_persen").val();
        var ppn = $("#ppn").val();

        var net_sales = parseInt(qty) * parseInt(price);

        var uang_muka = parseInt(dp_persen) * parseInt(net_sales) / 100;

        if (parseInt(dp_persen) == 0) {
            var dpp = parseInt(net_sales);
        } else {
            var dpp = parseInt(net_sales) - parseInt(uang_muka);
        }

        if (parseInt(ppn) == 10) {
            var cekppn = 10;
        } else {
            var cekppn = 0;
        }

        var jml_ppn = parseInt(cekppn) * parseInt(net_sales) / 100;

        var total = parseInt(dpp) + parseInt(jml_ppn);

        $("#net_sales").val(net_sales);
        $("#sub_total").val(net_sales);
        $("#dpp").val(dpp);
        $("#dp").val(uang_muka);
        $("#jml_ppn").val(jml_ppn);
        $("#total").val(total);

    });
});

$(document).ready(function() {
    $("#qty, #price,#dp_persen").keyup(function() {
        var bilangan = document.getElementById("total").value;
        var kalimat = "";
        var angka = new Array('0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0',
            '0');
        var kata = new Array('', 'Satu', 'Dua', 'Tiga', 'Empat', 'Lima', 'Enam', 'Tujuh', 'Delapan',
            'Sembilan');
        var tingkat = new Array('', 'Ribu', 'Juta', 'Milyar', 'Triliun');
        var panjang_bilangan = bilangan.length;

        /* pengujian panjang bilangan */
        if (panjang_bilangan > 15) {
            kalimat = "Diluar Batas";
        } else {
            /* mengambil angka-angka yang ada dalam bilangan, dimasukkan ke dalam array */
            for (i = 1; i <= panjang_bilangan; i++) {
                angka[i] = bilangan.substr(-(i), 1);
            }

            var i = 1;
            var j = 0;

            /* mulai proses iterasi terhadap array angka */
            while (i <= panjang_bilangan) {
                subkalimat = "";
                kata1 = "";
                kata2 = "";
                kata3 = "";

                /* untuk Ratusan */
                if (angka[i + 2] != "0") {
                    if (angka[i + 2] == "1") {
                        kata1 = "Seratus";
                    } else {
                        kata1 = kata[angka[i + 2]] + " Ratus";
                    }
                }

                /* untuk Puluhan atau Belasan */
                if (angka[i + 1] != "0") {
                    if (angka[i + 1] == "1") {
                        if (angka[i] == "0") {
                            kata2 = "Sepuluh";
                        } else if (angka[i] == "1") {
                            kata2 = "Sebelas";
                        } else {
                            kata2 = kata[angka[i]] + " Belas";
                        }
                    } else {
                        kata2 = kata[angka[i + 1]] + " Puluh";
                    }
                }

                /* untuk Satuan */
                if (angka[i] != "0") {
                    if (angka[i + 1] != "1") {
                        kata3 = kata[angka[i]];
                    }
                }

                /* pengujian angka apakah tidak nol semua, lalu ditambahkan tingkat */
                if ((angka[i] != "0") || (angka[i + 1] != "0") || (angka[i + 2] != "0")) {
                    subkalimat = kata1 + " " + kata2 + " " + kata3 + " " + tingkat[j] + " ";
                }

                /* gabungkan variabe sub kalimat (untuk Satu blok 3 angka) ke variabel kalimat */
                kalimat = subkalimat + kalimat;
                i = i + 3;
                j = j + 1;
            }

            /* mengganti Satu Ribu jadi Seribu jika diperlukan */
            if ((angka[5] == "0") && (angka[6] == "0")) {
                kalimat = kalimat.replace("Satu Ribu", "Seribu");
            }
        }
        $("#terbilang").val(kalimat);
    });
});

$(document).ready(function() {
    $("#k_ltc, #qty").keyup(function() {
        var ltc = $("#k_ltc").val();
        var stc = $("#qty").val();

        var saldo = parseInt(ltc) - parseInt(stc);

        if (saldo < 0) {
            Swal.fire({
                allowOutsideClick: false,
                title: 'Melebihi Total Kuantitas LTC!',
                confirmButtonText: 'OKE'
            }).then(function() {
                location.reload();
            });
        } else {
            $("#saldo").val(saldo);
        }
    });
});
</script>