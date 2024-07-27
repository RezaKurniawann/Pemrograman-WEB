<!DOCTYPE html>
<html>
<head>
    <title>Contoh Form dengan PHP dan jQuery</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

<h2>Contoh Formulir</h2>

<form id="myForm">
    <label for="buah">Pilih Buah:</label><br/>
    <select name="buah" id="buah">
        <option value="">--Pilih--</option>
        <option value="apel">Apel</option>
        <option value="pisang">Pisang</option>
        <option value="mangga">Mangga</option>
        <option value="jeruk">Jeruk</option>
    </select><br/><br/>

    <label>Pilih Warna Favorit:</label><br/>
    <input type="checkbox" name="warna[]" value="merah"> Merah<br/>
    <input type="checkbox" name="warna[]" value="biru"> Biru<br/>
    <input type="checkbox" name="warna[]" value="hijau"> Hijau<br/><br/>

    <label>Pilih Jenis Kelamin:</label><br/>
    <input type="radio" name="jenis_kelamin" value="laki-laki"> Laki-laki<br/>
    <input type="radio" name="jenis_kelamin" value="perempuan"> Perempuan<br/><br/>

    <input type="submit" value="Kirim">
</form>

<div id="hasil"></div>

<script>
$(document).ready(function() {
    $("#myForm").submit(function(e) {
        e.preventDefault(); // Mencegah pengiriman form secara default

        // Mengumpulkan data form
        var formData = $(this).serialize();

        // Kirim data ke server
        $.ajax({
            url: 'proses_lanjut.php', // Ganti dengan nama file PHP yang sesuai
            type: 'POST',
            data: formData,
            success: function(response) {
                // Tampilkan hasil dari server di div "hasil"
                $("#hasil").html(response);
            }
        });
    });
});
</script>

</body>
</html>
