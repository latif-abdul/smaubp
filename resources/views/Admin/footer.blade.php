<!-- </div> -->
<!-- <footer class="footer" style="position:absolute; relative: 0;width:100%">
  <div class="container-fluid">
    <p class="copyright pull-right">
      &copy;
      <script>document.write(new Date().getFullYear())</script> <a href="/admin">ICT Amanatul Ummah</a>
    </p>
  </div>
</footer> -->
<script src="{{url('js/demo.js')}}"></script>
<script>
  getPagination('#table-id', '#pagination', '#maxRows', '#rows_count');
  getPagination('#table-id-2', '#pagination-2', '#maxRows-2', '#rows_count-2');
  getPagination('#table-id-3', '#pagination-3', '#maxRows-3', '#rows_count-3');
  $('#maxRows').trigger('change');
  $('#maxRows-2').trigger('change');
  $('#maxRows-3').trigger('change');
  function getPagination(table, pagination, maxRow, rowsCount) {

    $(maxRow).on('change', function () {
      $(pagination).html('');						// reset pagination div
      var trnum = 0;									// reset tr counter 
      var maxRows = parseInt($(this).val());			// get Max Rows from select option

      var totalRows = $(table + ' tbody tr').length;		// numbers of rows 
      $(table + ' tr:gt(0)').each(function () {			// each TR in  table and not the header
        trnum++;									// Start Counter 
        if (trnum > maxRows) {						// if tr number gt maxRows

          $(this).hide();							// fade it out 
        } if (trnum <= maxRows) { $(this).show(); }// else fade in Important in case if it ..
      });											//  was fade out to fade it in 
      if (totalRows > maxRows) {						// if tr total rows gt max rows option
        var pagenum = Math.ceil(totalRows / maxRows);	// ceil total(rows/maxrows) to get ..  
        //	numbers of pages 
        for (var i = 1; i <= pagenum;) {			// for each page append pagination li 
          $(pagination).append('<li data-page="' + i + '">\
								      <span>'+ i++ + '<span class="sr-only">(current)</span></span>\
								    </li>').show();
        }											// end for i 


      } 												// end if row count > max rows
      $(pagination + ' li:first-child').addClass('active'); // add active class to the first li 


      //SHOWING ROWS NUMBER OUT OF TOTAL DEFAULT
      showig_rows_count(maxRows, 1, totalRows, rowsCount);
      //SHOWING ROWS NUMBER OUT OF TOTAL DEFAULT

      $(pagination + ' li').on('click', function (e) {		// on click each page
        e.preventDefault();
        var pageNum = $(this).attr('data-page');	// get it's number
        var trIndex = 0;							// reset tr counter
        $(pagination + ' li').removeClass('active');	// remove active class from all li 
        $(this).addClass('active');					// add active class to the clicked 


        //SHOWING ROWS NUMBER OUT OF TOTAL
        showig_rows_count(maxRows, pageNum, totalRows);
        //SHOWING ROWS NUMBER OUT OF TOTAL



        $(table + ' tr:gt(0)').each(function () {		// each tr in table not the header
          trIndex++;								// tr index counter 
          // if tr index gt maxRows*pageNum or lt maxRows*pageNum-maxRows fade if out
          if (trIndex > (maxRows * pageNum) || trIndex <= ((maxRows * pageNum) - maxRows)) {
            $(this).hide();
          } else { $(this).show(); } 				//else fade in 
        }); 										// end of for each tr in table
      });										// end of on click pagination list
    });
    // end of on select change 

    // END OF PAGINATION 

  }




  // SI SETTING
  // $(function () {
  //   // Just to append id number for each row  
  //   default_index();

  // });

  //ROWS SHOWING FUNCTION
  function showig_rows_count(maxRows, pageNum, totalRows, rowsCount) {
    //Default rows showing
    var end_index = maxRows * pageNum;
    var start_index = ((maxRows * pageNum) - maxRows) + parseFloat(1);
    var string = 'Showing ' + start_index + ' to ' + end_index + ' of ' + totalRows + ' entries';
    $(rowsCount).html(string);
  }

  // CREATING INDEX
  function default_index() {
    $('table tr:eq(0)').prepend('<th> ID </th>')

    var id = 0;

    $('table tr:gt(0)').each(function () {
      id++
      $(this).prepend('<td>' + id + '</td>');
    });
  }

  function clear(maxRows){
    $('#'+maxRows).trigger('change');
  }

  function FilterBatch(tableId, filterBatch, maxRows) {
    // Count td if you want to search on all table instead of specific column

    var count = $('#'+tableId).children('tbody').children('tr:first-child').children('td').length;
    console.log(tableId)
    // Declare variables
    var input, filter, table, tr, td, i;
    input = document.getElementById(filterBatch);
    var input_value = document.getElementById(filterBatch).value;
    filter = input.value.toLowerCase();
    if (input_value != 'all') {
      table = document.getElementById(tableId);
      tr = table.getElementsByTagName("tr");

      // Loop through all table rows, and hide those who don't match the search query
      for (i = 1; i < tr.length; i++) {

        var flag = 0;

        for (j = 0; j < count; j++) {
          td = tr[i].getElementsByTagName("td")[j];
          if (td) {

            var td_text = td.innerHTML;
            if (td.innerHTML.toLowerCase().indexOf(filter) > -1) {
              //var td_text = td.innerHTML;  
              //td.innerHTML = 'shaban';
              flag = 1;
            } else {
              //DO NOTHING
            }
          }
        }
        if (flag == 1) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }
    } else {
      //RESET TABLE
      $('#'+maxRows).trigger('change');
    }
  }

  // All Table search script
  function FilterkeyWord_all_table(tableId, searchInput, maxRows) {

    // Count td if you want to search on all table instead of specific column

    var count = $('#'+tableId).children('tbody').children('tr:first-child').children('td').length;

    // Declare variables
    var input, filter, table, tr, td, i;
    input = document.getElementById(searchInput);
    var input_value = document.getElementById(searchInput).value;
    filter = input.value.toLowerCase();
    if (input_value != '') {
      table = document.getElementById(tableId);
      tr = table.getElementsByTagName("tr");

      // Loop through all table rows, and hide those who don't match the search query
      for (i = 1; i < tr.length; i++) {

        var flag = 0;

        for (j = 0; j < count; j++) {
          td = tr[i].getElementsByTagName("td")[j];
          if (td) {

            var td_text = td.innerHTML;
            if (td.innerHTML.toLowerCase().indexOf(filter) > -1) {
              //var td_text = td.innerHTML;  
              //td.innerHTML = 'shaban';
              flag = 1;
            } else {
              //DO NOTHING
            }
          }
        }
        if (flag == 1) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }
    } else {
      //RESET TABLE
      $('#'+maxRows).trigger('change');
    }
  }
</script>
<script>
  /* Bootstrap 5 JS included */

  // console.clear();
  ('use strict');


  // Drag and drop - single or multiple image files
  // https://www.smashingmagazine.com/2018/01/drag-drop-file-uploader-vanilla-js/
  // https://codepen.io/joezimjs/pen/yPWQbd?editors=1000
  // (function  () {

  'use strict';

  // Four objects of interest: drop zones, input elements, gallery elements, and the files.
  // dataRefs = {files: [image files], input: element ref, gallery: element ref}

  const preventDefaults = event => {
    event.preventDefault();
    event.stopPropagation();
  };

  const highlight = event =>
    event.target.classList.add('highlight');

  const unhighlight = event =>
    event.target.classList.remove('highlight');

  const getInputAndGalleryRefs = element => {
    const zone = element.closest('.upload_dropZone') || false;
    const gallery = zone.querySelector('.upload_gallery') || false;
    const input = zone.querySelector('input[type="file"]') || false;
    return { input: input, gallery: gallery };
  }

  const handleDrop = event => {
    const dataRefs = getInputAndGalleryRefs(event.target);
    dataRefs.files = event.dataTransfer.files;
    handleFiles(dataRefs);
  }



  const eventHandlers = zone => {

    const dataRefs = getInputAndGalleryRefs(zone);
    if (!dataRefs.input) return;

    // Prevent default drag behaviors
    ;['dragenter', 'dragover', 'dragleave', 'drop'].forEach(event => {
      zone.addEventListener(event, preventDefaults, false);
      document.body.addEventListener(event, preventDefaults, false);
    });

    // Highlighting drop area when item is dragged over it
    ;['dragenter', 'dragover'].forEach(event => {
      zone.addEventListener(event, highlight, false);
    });
    ;['dragleave', 'drop'].forEach(event => {
      zone.addEventListener(event, unhighlight, false);
    });

    // Handle dropped files
    zone.addEventListener('drop', handleDrop, false);

    // Handle browse selected files
    dataRefs.input.addEventListener('change', event => {
      dataRefs.files = event.target.files;
      console.log(dataRefs);
      handleFiles(dataRefs);

    }, false);

    // $(document).ready(function () {
    //   for (const file of dataRefs.files) {
    //     document.getElementById('remove_' + file.name).addEventListener('click', event => {
    //       removeFile(dataRefs, event.target.parentElement.closest('.upload_img').getAttribute('alt'));
    //       console.log('success');
    //     }, false);
    //   }
    // });
    // document.getElementById('remove').addEventListener('click', event => {
    //   removeFile(dataRefs,event.target.parentElement.closest('.upload_img').getAttribute('alt'));
    //   console.log('success');
    // }, false);

  }


  // Initialise ALL dropzones
  const dropZones = document.querySelectorAll('.upload_dropZone');
  for (const zone of dropZones) {
    eventHandlers(zone);
  }


  // No 'image/gif' or PDF or webp allowed here, but it's up to your use case.
  // Double checks the input "accept" attribute
  const isImageFile = file =>
    ['image/jpeg', 'image/png', 'image/svg+xml'].includes(file.type);


  function previewFiles(dataRefs) {
    if (!dataRefs.gallery) return;
    for (const file of dataRefs.files) {
      console.log(dataRefs);
      let reader = new FileReader();
      reader.readAsDataURL(file);
      reader.onloadend = function () {
        let preview = document.createElement('div');
        preview.className = 'preview';
        preview.style = 'position: relative;';
        let img = document.createElement('img');
        img.className = 'upload_img mt-2';
        img.style = 'width=100%';
        img.setAttribute('alt', file.name);
        img.src = reader.result;
        let close = document.createElement('span');
        close.className = 'file-delete';
        close.id = 'remove_' + file.name
        close.addEventListener('click', event => {
          removeFile(dataRefs, img.getAttribute('alt'));
          console.log('success');
        }, false);
        // close.onclick = removeFile(dataRefs, img.getAttribute('alt'))
        // close.addEventListener('click', event => {

        //   let files = [...dataRefs.files];

        //   files = files.filter(item => {
        //     return item.name != img.getAttribute('alt') ? item : null;
        //   });

        //   // if (!files.length) return;

        //   dataRefs.files = files;

        //   previewFiles(dataRefs);
        //   imageUpload(dataRefs);

        // }, false);
        let span = document.createElement('span');
        span.innerHTML = '+';
        close.appendChild(span);
        preview.appendChild(img);
        preview.appendChild(close);
        // dataRefs.gallery.append(close);
        dataRefs.gallery.appendChild(preview);
      }
    }
  }

  const formData = new FormData();
  // Based on: https://flaviocopes.com/how-to-upload-files-fetch/
  const imageUpload = dataRefs => {

    // Multiple source routes, so double check validity
    if (!dataRefs.files || !dataRefs.input) return;

    const url = dataRefs.input.getAttribute('data-post-url');
    if (!url) return;

    const name = dataRefs.input.getAttribute('data-post-name');
    if (!name) return;


    formData.append(name, dataRefs.files);
    console.log(formData.getAll('image_background'));

    fetch(url, {
      method: 'POST',
      body: formData,
      beforeSend: function (xhr) {
        xhr.setRequestHeader('X-CSRF-TOKEN', "{{ csrf_token() }}");
      },
    })
      .then(response => response.json())
      .then(data => {
        console.log('posted: ', data);
        if (data.success === true) {
          previewFiles(dataRefs);
        } else {
          console.log('URL: ', url, '  name: ', name)
        }
      })
      .catch(error => {
        console.error('errored: ', error);
      });
  }

  // Handle both selected and dropped files
  const handleFiles = dataRefs => {

    let files = [...dataRefs.files];
    console.log(files)

    // Remove unaccepted file types
    files = files.filter(item => {
      if (!isImageFile(item)) {
        console.log('Not an image, ', item.type);
      }
      return isImageFile(item) ? item : null;
    });

    if (!files.length) return;
    dataRefs.files = files;
    // console.log(files);
    previewFiles(dataRefs);
    imageUpload(dataRefs);
  }

  const removeFile = (dataRefs, filename) => {
    let files = [...dataRefs.files];
    files = files.filter(item => {
      return item.name != filename ? item : null;
    });

    // if (!files.length) return;

    dataRefs.files = files;
    console.log(dataRefs);
    previewFiles(dataRefs);
    imageUpload(dataRefs);
  }

  // })();

  var testPass = 0
</script>