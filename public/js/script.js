$(document).ready(function () {
  $("#autoWidth").lightSlider({
    adaptiveHeight: true,
    auto: true,
    item: 1,
    slideMargin: 0,
    loop: true,
    pause: 10000,
  });
});

const navbarHome = document.querySelector(".navbarHome");

window.addEventListener("scroll", () => {
  const post = window.scrollY > 100;

  navbarHome.classList.toggle("scroll", post);
});

document.addEventListener("DOMContentLoaded", function() {
  let perBoxes = document.querySelectorAll(".perBox");

  function fadeInBoxes() {
      perBoxes.forEach(function(box, index) {
          setTimeout(function() {
              box.classList.add("active");
          }, index * 200); // Sesuaikan dengan kecepatan fade-in yang diinginkan
      });
  }

  // Panggil fungsi fadeInBoxes ketika halaman selesai dimuat
  fadeInBoxes();
});

$(document).ready(function () {
  $("#successAlert").fadeTo(2000, 500).slideUp(500, function () {
    $("#successAlert").slideUp(500);
  });
});

window.addEventListener('load', () => {
  var $grid = $('.portfolio-container').isotope({
      itemSelector: '.portfolio-item',
      // layoutMode: 'fitColumns',
      // percentPosition: true,
      // masonry: {
      //     columnWidth: 100
      // }
  });
  // layout Isotope after each image loads
  $grid.imagesLoaded().progress(function () {
      $grid.isotope('layout');
  });
})

$(document).ready(function () {

  $("#upload-sertifikat").hide();

  $("input[name='jalur_masuk']").click(function () {

      if ($('#prestasi').is(':checked')) { $("#upload-sertifikat").show(); } 

      else { $("#upload-sertifikat").hide(); }
  });
});

