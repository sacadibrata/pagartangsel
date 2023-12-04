<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Fungsi yang akan menghitung rata-rata
        function hitungRataRata() {
            var harga1 = parseFloat($('#pendataan_ps_ciputats_id_{{ $komoditi->id }}').val()) || 0;
            var harga2 = parseFloat($('#pendataan_ps_cimanggis_id_{{ $komoditi->id }}').val()) || 0;
            var harga3 = parseFloat($('#pendataan_ps_jengkols_id_{{ $komoditi->id }}').val()) || 0;
            var harga4 = parseFloat($('#pendataan_ps_serpongs_id_{{ $komoditi->id }}').val()) || 0;
            var harga5 = parseFloat($('#pendataan_ps_jombangs_id_{{ $komoditi->id }}').val()) || 0;
            var harga6 = parseFloat($('#pendataan_ps_cegers_id_{{ $komoditi->id }}').val()) || 0;

            var rataRata ;

            // rataRata = harga1;

            if (harga1 !== 0 && harga2 === 0 && harga3 === 0 && harga4 === 0 && harga5 === 0 && harga6 === 0) {
            rataRata = harga1;

            } else if (harga1 === 0 && harga2 !== 0 && harga3 === 0 && harga4 === 0 && harga5 === 0 && harga6 === 0) {
                rataRata = harga2;

            } else if (harga1 === 0 && harga2 === 0 && harga3 !== 0 && harga4 === 0 && harga5 === 0 && harga6 === 0) {
                rataRata = harga3;

            } else if (harga1 === 0 && harga2 === 0 && harga3 == 0 && harga4 !== 0 && harga5 === 0 && harga6 === 0) {
                rataRata = harga4;

            } else if (harga1 === 0 && harga2 === 0 && harga3 !== 0 && harga4 === 0 && harga5 !== 0 && harga6 === 0) {
                rataRata = harga5;

            } else if (harga1 === 0 && harga2 === 0 && harga3 === 0 && harga4 === 0 && harga5 === 0 && harga6 !== 0) {
                rataRata = harga6;

            // 6 Kombinasi 2
            // 1

            } else if (harga1 !== 0 && harga2 !== 0 && harga3 === 0 && harga4 === 0 && harga5 === 0 && harga6 === 0) {
                rataRata = (harga1 + harga2) / 2;

            // 2

            } else if (harga1 !== 0 && harga2 === 0 && harga3 !== 0 && harga4 === 0 && harga5 === 0 && harga6 === 0) {
                rataRata = (harga1 + harga3) / 2;

            // 3

            } else if (harga1 !== 0 && harga2 === 0 && harga3 === 0 && harga4 !== 0 && harga5 === 0 && harga6 === 0) {
                rataRata = (harga1 + harga4) / 2;

            // 4

            } else if (harga1 !== 0 && harga2 === 0 && harga3 === 0 && harga4 === 0 && harga5 !== 0 && harga6 === 0) {
                rataRata = (harga1 + harga5) / 2;

            // 5

            } else if (harga1 !== 0 && harga2 === 0 && harga3 === 0 && harga4 === 0 && harga5 === 0 && harga6 !== 0) {
                rataRata = (harga1 + harga6) / 2;

            // 6

            } else if (harga1 === 0 && harga2 !== 0 && harga3 !== 0 && harga4 === 0 && harga5 === 0 && harga6 === 0) {
                rataRata = (harga2 + harga3) / 2;

            // 7

            } else if (harga1 === 0 && harga2 !== 0 && harga3 === 0 && harga4 !== 0 && harga5 === 0 && harga6 === 0) {
                rataRata = (harga2 + harga4) / 2;

            // 8

            } else if (harga1 === 0 && harga2 !== 0 && harga3 === 0 && harga4 === 0 && harga5 !== 0 && harga6 === 0) {
                rataRata = (harga2 + harga5) / 2;

            // 9

            } else if (harga1 === 0 && harga2 !== 0 && harga3 === 0 && harga4 === 0 && harga5 === 0 && harga6 !== 0) {
                rataRata = (harga2 + harga6) / 2;

            // 10

            } else if (harga1 === 0 && harga2 === 0 && harga3 !== 0 && harga4 !== 0 && harga5 === 0 && harga6 === 0) {
                rataRata = (harga3 + harga4) / 2;

            // 11

            } else if (harga1 === 0 && harga2 === 0 && harga3 !== 0 && harga4 === 0 && harga5 !== 0 && harga6 === 0) {
                rataRata = (harga3 + harga5) / 2;

            // 12

            } else if (harga1 === 0 && harga2 === 0 && harga3 !== 0 && harga4 === 0 && harga5 === 0 && harga6 !== 0) {
                rataRata = (harga3 + harga6) / 2;

            // 13

            } else if (harga1 === 0 && harga2 === 0 && harga3 === 0 && harga4 !== 0 && harga5 !== 0 && harga6 === 0) {
                rataRata = (harga4 + harga5) / 2;

            // 14

            } else if (harga1 === 0 && harga2 === 0 && harga3 === 0 && harga4 !== 0 && harga5 === 0 && harga6 !== 0) {
                rataRata = (harga4 + harga6) / 2;

            // 15

            } else if (harga1 === 0 && harga2 === 0 && harga3 === 0 && harga4 === 0 && harga5 !== 0 && harga6 !== 0) {
                rataRata = (harga5 + harga6) / 2;

            // 6 Kombinasi 3
            // 1

            } else if (harga1 !== 0 && harga2 !== 0 && harga3 !== 0 && harga4 === 0 && harga5 === 0 && harga6 === 0) {
                rataRata = (harga1 + harga2 + harga3) / 3;

            // 2

            } else if (harga1 !== 0 && harga2 !== 0 && harga3 === 0 && harga4 !== 0 && harga5 === 0 && harga6 === 0) {
                rataRata = (harga1 + harga2 + harga4) / 3;

            // 3

            } else if (harga1 !== 0 && harga2 !== 0 && harga3 === 0 && harga4 === 0 && harga5 !== 0 && harga6 === 0) {
                rataRata = (harga1 + harga2 + harga5) / 3;

            // 4

            } else if (harga1 !== 0 && harga2 !== 0 && harga3 === 0 && harga4 === 0 && harga5 === 0 && harga6 !== 0) {
                rataRata = (harga1 + harga2 + harga6) / 3;

            // 5

            } else if (harga1 !== 0 && harga2 === 0 && harga3 !== 0 && harga4 !== 0 && harga5 === 0 && harga6 === 0) {
                rataRata = (harga1 + harga3 + harga4) / 3;

            // 6

            } else if (harga1 !== 0 && harga2 === 0 && harga3 !== 0 && harga4 === 0 && harga5 !== 0 && harga6 === 0) {
                rataRata = (harga1 + harga3 + harga5) / 3;

            // 7

            } else if (harga1 !== 0 && harga2 === 0 && harga3 !== 0 && harga4 === 0 && harga5 === 0 && harga6 !== 0) {
                rataRata = (harga1 + harga3 + harga6) / 3;

            // 8

            } else if (harga1 !== 0 && harga2 === 0 && harga3 === 0 && harga4 !== 0 && harga5 !== 0 && harga6 === 0) {
                rataRata = (harga1 + harga4 + harga5) / 3;

            // 9

            } else if (harga1 !== 0 && harga2 === 0 && harga3 === 0 && harga4 !== 0 && harga5 === 0 && harga6 !== 0) {
                rataRata = (harga1 + harga4 + harga6) / 3;

            // 10

            } else if (harga1 !== 0 && harga2 === 0 && harga3 === 0 && harga4 === 0 && harga5 !== 0 && harga6 !== 0) {
                rataRata = (harga1 + harga5 + harga6) / 3;

            // 11

            } else if (harga1 === 0 && harga2 !== 0 && harga3 !== 0 && harga4 !== 0 && harga5 === 0 && harga6 === 0) {
                rataRata = (harga2 + harga3 + harga4) / 3;

            // 12

            } else if (harga1 === 0 && harga2 !== 0 && harga3 !== 0 && harga4 === 0 && harga5 !== 0 && harga6 === 0) {
                rataRata = (harga2 + harga3 + harga5) / 3;

            // 13

            } else if (harga1 === 0 && harga2 !== 0 && harga3 !== 0 && harga4 === 0 && harga5 === 0 && harga6 !== 0) {
                rataRata = (harga2 + harga3 + harga6) / 3;

            // 14

            } else if (harga1 === 0 && harga2 !== 0 && harga3 === 0 && harga4 !== 0 && harga5 !== 0 && harga6 === 0) {
                rataRata = (harga2 + harga4 + harga5) / 3;

            // 15

            } else if (harga1 === 0 && harga2 !== 0 && harga3 === 0 && harga4 !== 0 && harga5 === 0 && harga6 !== 0) {
                rataRata = (harga2 + harga4 + harga6) / 3;

            // 16

            } else if (harga1 === 0 && harga2 !== 0 && harga3 === 0 && harga4 === 0 && harga5 !== 0 && harga6 !== 0) {
                rataRata = (harga2 + harga5 + harga6) / 3;

            // 17

            } else if (harga1 === 0 && harga2 === 0 && harga3 !== 0 && harga4 !== 0 && harga5 !== 0 && harga6 === 0) {
                rataRata = (harga3 + harga4 + harga5) / 3;

            // 18

            } else if (harga1 === 0 && harga2 === 0 && harga3 !== 0 && harga4 !== 0 && harga5 === 0 && harga6 !== 0) {
                rataRata = (harga3 + harga4 + harga6) / 3;

            // 19

            } else if (harga1 === 0 && harga2 === 0 && harga3 !== 0 && harga4 === 0 && harga5 !== 0 && harga6 !== 0) {
                rataRata = (harga3 + harga5 + harga6) / 3;

            // 20

            } else if (harga1 === 0 && harga2 === 0 && harga3 === 0 && harga4 !== 0 && harga5 !== 0 && harga6 !== 0) {
                rataRata = (harga4 + harga5 + harga6) / 3;

            // 6 Kombinasi 4

            } else if (harga1 !== 0 && harga2 !== 0 && harga3 !== 0 && harga4 !== 0 && harga5 === 0 && harga6 === 0) {
                rataRata = (harga1 + harga2 + harga3 + harga4) / 4;

            } else if (harga1 !== 0 && harga2 !== 0 && harga3 !== 0 && harga4 === 0 && harga5 !== 0 && harga6 === 0) {
                rataRata = (harga1 + harga2 + harga3 + harga5) / 4;

            } else if (harga1 !== 0 && harga2 !== 0 && harga3 !== 0 && harga4 === 0 && harga5 === 0 && harga6 !== 0) {
                rataRata = (harga1 + harga2 + harga3 + harga6) / 4;

            } else if (harga1 !== 0 && harga2 !== 0 && harga3 === 0 && harga4 !== 0 && harga5 !== 0 && harga6 === 0) {
                rataRata = (harga1 + harga2 + harga4 + harga5) / 4;

            } else if (harga1 !== 0 && harga2 !== 0 && harga3 === 0 && harga4 !== 0 && harga5 === 0 && harga6 !== 0) {
                rataRata = (harga1 + harga2 + harga4 + harga6) / 4;

            } else if (harga1 !== 0 && harga2 !== 0 && harga3 === 0 && harga4 === 0 && harga5 !== 0 && harga6 !== 0) {
                rataRata = (harga1 + harga2 + harga5 + harga6) / 4;

            } else if (harga1 !== 0 && harga2 === 0 && harga3 !== 0 && harga4 !== 0 && harga5 !== 0 && harga6 === 0) {
                rataRata = (harga1 + harga3 + harga5 + harga4) / 4;

            } else if (harga1 !== 0 && harga2 === 0 && harga3 !== 0 && harga4 === 0 && harga5 !== 0 && harga6 !== 0) {
                rataRata = (harga1 + harga3 + harga5 + harga6) / 4;

            } else if (harga1 !== 0 && harga2 === 0 && harga3 !== 0 && harga4 !== 0 && harga5 === 0 && harga6 !== 0) {
                rataRata = (harga1 + harga3 + harga6 + harga4) / 4;

            } else if (harga1 === 0 && harga2 !== 0 && harga3 !== 0 && harga4 !== 0 && harga5 !== 0 && harga6 === 0) {
                rataRata = (harga2 + harga3 + harga4 + harga5) / 4;

            } else if (harga1 === 0 && harga2 !== 0 && harga3 !== 0 && harga4 !== 0 && harga5 === 0 && harga6 !== 0) {
                rataRata = (harga2 + harga3 + harga4 + harga6) / 4;

            } else if (harga1 === 0 && harga2 !== 0 && harga3 !== 0 && harga4 === 0 && harga5 !== 0 && harga6 !== 0) {
                rataRata = (harga2 + harga3 + harga5 + harga6) / 4;

            } else if (harga1 === 0 && harga2 === 0 && harga3 !== 0 && harga4 !== 0 && harga5 !== 0 && harga6 !== 0) {
                rataRata = (harga3 + harga4 + harga5 + harga6) / 4;

            // 6 Kombinasi 5

            } else if (harga1 !== 0 && harga2 !== 0 && harga3 !== 0 && harga4 !== 0 && harga5 !== 0 && harga6 === 0) {
                rataRata = (harga1 + harga2 + harga3 + harga4 + harga5) / 5; //6

            } else if (harga1 !== 0 && harga2 !== 0 && harga3 !== 0 && harga4 !== 0 && harga5 === 0 && harga6 !== 0) {
                rataRata = (harga1 + harga2 + harga3 + harga4 + harga6) / 5; //5

            } else if (harga1 !== 0 && harga2 === 0 && harga3 !== 0 && harga4 !== 0 && harga5 !== 0 && harga6 !== 0) {
                rataRata = (harga1 + harga3 + harga4 + harga5 + harga6) / 5; //2

            } else if (harga1 !== 0 && harga2 !== 0 && harga3 === 0 && harga4 !== 0 && harga5 !== 0 && harga6 !== 0) {
                rataRata = (harga1 + harga4 + harga5 + harga6 + harga2) / 5; //3

            } else if (harga1 !== 0 && harga2 !== 0 && harga3 !== 0 && harga4 === 0 && harga5 !== 0 && harga6 !== 0) {
                rataRata = (harga1 + harga5 + harga6 + harga2 + harga3) / 5; //4

            } else if (harga1 === 0 && harga2 !== 0 && harga3 !== 0 && harga4 !== 0 && harga5 !== 0 && harga6 !== 0) {
                rataRata = (harga2 + harga3 + harga4 + harga5 + harga6) / 5; //1

            } else {
                // Jika tidak ada kondisi di atas yang terpenuhi, hitung rata-rata normal
                rataRata = (harga1 + harga2 + harga3 + harga4 + harga5 + harga6) / 6;
            }

            // Melakukan pembulatan ke atas
            rataRata = Math.ceil(rataRata);

            $('#average_harga_{{ $komoditi->id }}').val(rataRata.toFixed(2));
        }

        // Memanggil fungsi hitungRataRata saat input berubah
        $('#pendataan_ps_ciputats_id_{{ $komoditi->id }}, #pendataan_ps_cimanggis_id_{{ $komoditi->id }}, #pendataan_ps_jengkols_id_{{ $komoditi->id }}, #pendataan_ps_serpongs_id_{{ $komoditi->id }}, #pendataan_ps_jombangs_id_{{ $komoditi->id }}, #pendataan_ps_cegers_id_{{ $komoditi->id }}').change(hitungRataRata);

        // Memanggil fungsi hitungRataRata saat halaman dimuat untuk menginisialisasi nilai rata-rata
        hitungRataRata();
    });
</script>
