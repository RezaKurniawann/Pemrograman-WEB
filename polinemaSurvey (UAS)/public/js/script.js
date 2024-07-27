$(function () {
    $('#example2').DataTable({
      "paging": false,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": false,
      "autoWidth": false,
      "responsive": false,
    });
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false, "paging" : false, "info" :false,   "ordering": false,
      "buttons": ["csv", "excel", "pdf", "print"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
});
  
  function fillEditFormAlumni(alumni) {
      document.getElementById('edit_id').value = alumni.user_id;
      document.getElementById('edit_nama').value = alumni.nama;
      document.getElementById('edit_username').value = alumni.username;
      document.getElementById('edit_password').value = alumni.password;
      document.getElementById('edit_nim').value = alumni.responden_nim;
      document.getElementById('edit_prodi').value = alumni.responden_prodi;
      document.getElementById('edit_no_hp').value = alumni.responden_hp;
      document.getElementById('edit_tahun_lulus').value = alumni.tahun_lulus;
  }

  function fillEditBobot (bobot) {

  }

  function fillEditFormDosen(dosen) {
    document.getElementById('edit_id').value = dosen.user_id;
    document.getElementById('edit_nama').value = dosen.nama;
    document.getElementById('edit_username').value = dosen.username;
    document.getElementById('edit_password').value = dosen.password;
    document.getElementById('edit_nip').value = dosen.responden_nip;
    document.getElementById('edit_unit').value = dosen.responden_unit;
  }

  function fillEditFormIndustri(industri) {
    document.getElementById('edit_id').value = industri.user_id;
    document.getElementById('edit_nama').value = industri.nama;
    document.getElementById('edit_username').value = industri.username;
    document.getElementById('edit_password').value = industri.password;
    document.getElementById('edit_jabatan').value = industri.responden_jabatan;
    document.getElementById('edit_perusahaan').value = industri.responden_perusahaan;
    document.getElementById('edit_no_hp').value = industri.responden_hp;
    document.getElementById('edit_kota').value = industri.responden_kota;
  }


  function fillEditFormMahasiswa(mahasiswa) {
    document.getElementById('edit_id').value = mahasiswa.user_id;
    document.getElementById('edit_nama').value = mahasiswa.nama;
    document.getElementById('edit_username').value = mahasiswa.username;
    document.getElementById('edit_password').value = mahasiswa.password;
    document.getElementById('edit_nim').value = mahasiswa.responden_nim;
    document.getElementById('edit_prodi').value = mahasiswa.responden_prodi;
    document.getElementById('edit_no_hp').value = mahasiswa.responden_hp;
    document.getElementById('edit_tahun_masuk').value = mahasiswa.tahun_masuk;
  }

  function fillEditFormOrangtua(orangtua) {
    document.getElementById('edit_id').value = orangtua.user_id;
    document.getElementById('edit_nama').value = orangtua.nama;
    document.getElementById('edit_username').value = orangtua.username;
    document.getElementById('edit_password').value = orangtua.password;
    document.getElementById('edit_jk').value = orangtua.responden_jk;
    document.getElementById('edit_umur').value = orangtua.responden_umur;
    document.getElementById('edit_pekerjaan').value = orangtua.responden_pekerjaan;
    document.getElementById('edit_no_hp').value = orangtua.responden_hp;
  }

  function fillEditFormTendik(tendik) {
    document.getElementById('edit_id').value = tendik.user_id;
    document.getElementById('edit_nama').value = tendik.nama;
    document.getElementById('edit_username').value = tendik.username;
    document.getElementById('edit_password').value = tendik.password;
    document.getElementById('edit_nopeg').value = tendik.responden_nopeg;
    document.getElementById('edit_unit').value = tendik.responden_unit;
  }

  function fillEditSoal(survey) {
    document.getElementById('edit_soal_id').value = survey.soal_id;
    document.getElementById('edit_soal').value = survey.soal_nama;
  }

  function fillSaran(history) {
    document.getElementById('saran').value = history.saran;
}

const table = document.getElementById("example2");
const rows = table.querySelectorAll("tbody tr");
const filterKategori = document.getElementById("filterKategori");
const filterSurvey = document.getElementById("filterSurvey");
const filterDimensi = document.getElementById("filterDimensi");
const searchSoal = document.getElementById("searchSoal");

filterKategori.addEventListener("change", filterTable);
filterSurvey.addEventListener("change", filterTable);
filterDimensi.addEventListener("change", filterTable);
searchSoal.addEventListener("input", filterTable);

function filterTable() {
  const kategoriValue = filterKategori.value.toLowerCase();
  const surveyValue = filterSurvey.value.toLowerCase();
  const dimensiValue = filterDimensi.value.toLowerCase();
  const searchValue = searchSoal.value.toLowerCase();

  rows.forEach(row => {
    const kategoriText = row.querySelector(".kategori").textContent.toLowerCase();
    const surveyText = row.querySelector(".survey").textContent.toLowerCase();
    const dimensiText = row.querySelector(".dimensi").textContent.toLowerCase();
    const soalText = row.querySelector(".soal").textContent.toLowerCase();

    const showRow = (kategoriValue === "" || kategoriText.includes(kategoriValue)) &&
                    (surveyValue === "" || surveyText.includes(surveyValue)) &&
                    (dimensiValue === "" || dimensiText.includes(dimensiValue)) &&
                    (searchValue === "" || soalText.includes(searchValue));

    row.style.display = showRow ? "" : "none";
  });
}


  

  

  


