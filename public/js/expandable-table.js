var originalLength = 4; // orginal length = 4

$('table tr:lt(' + originalLength + ')').addClass('active');
var rowCount = $('table tr').length;

var hidden = true;
var $table = $('table').find('tbody');
$table.find('tr:lt(' + (originalLength) + ')').show();
$('a.load_more').on('click', function(e) {
  e.preventDefault();
  if (hidden) {
    // first on click, it is hidden, so expand
    $table.find('tr:lt(' + rowCount + ')').hide();
    $table.find('tr:lt(' + rowCount + ')').show();
    $(this).html('View less') //change html
  } else {
    $table.find('tr:lt(' + rowCount + ')').hide();
    $table.find('tr:lt(' + (originalLength) + ')').show();
    $(this).html('View More') //change html
  }
  hidden = !hidden;
});