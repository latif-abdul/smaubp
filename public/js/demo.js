$(document).ready(function () {
  $("#successAlert").fadeTo(2000, 500).slideUp(500, function () {
    $("#successAlert").hide();
  });
});

$(document).ready(function () {

  // $("#upload-sertifikat").hide();
  if ($('#prestasi').is(':checked')) { $("#upload-sertifikat").show(); } 
  
        else { $("#upload-sertifikat").hide(); }
  
  $("input[name='jalur_masuk']").click(function () {
  
      if ($('#prestasi').is(':checked')) { $("#upload-sertifikat").show(); } 
  
        else { $("#upload-sertifikat").hide(); }
  });
  });