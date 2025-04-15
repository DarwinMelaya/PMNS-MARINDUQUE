 <footer class="main-footer">
   <div class="float-right d-none d-sm-block">
     <b>Version</b> 1.0
   </div>
   <strong>Copyright &copy; <?= date("Y") ?> <a href="#">DOST-MIMAROPA PMNS</a>.</strong> All rights reserved.
 </footer>

 <!-- Control Sidebar -->
 <aside class="control-sidebar control-sidebar-dark">
   <!-- Control sidebar content goes here -->
 </aside>
 <!-- /.control-sidebar -->
 </div>
 <!-- ./wrapper -->

 <!-- jQuery -->
 <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
 <script src="../../plugins/jquery/jquery.min.js"></script>
 <!-- Toastr -->
<script src="../../plugins/toastr/toastr.min.js"></script>
 <!-- Bootstrap 4 -->
 <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
 <!-- Select2 -->
 <script src="../../plugins/select2/js/select2.full.min.js"></script>
 <!-- Bootstrap4 Duallistbox -->
 <script src="../../plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
 <!-- InputMask -->
 <script src="../../plugins/moment/moment.min.js"></script>
 <script src="../../plugins/inputmask/jquery.inputmask.min.js"></script>
 <!-- date-range-picker -->
 <script src="../../plugins/daterangepicker/daterangepicker.js"></script>
 <!-- bootstrap color picker -->
 <script src="../../plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
 <!-- Tempusdominus Bootstrap 4 -->
 <script src="../../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
 <!-- Bootstrap Switch -->
 <script src="../../plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
 <!-- BS-Stepper -->
 <script src="../../plugins/bs-stepper/js/bs-stepper.min.js"></script>
 <!-- dropzonejs -->
 <script src="../../plugins/dropzone/min/dropzone.min.js"></script>
 <!-- DataTables  & Plugins -->
 <script src="https://cdn.datatables.net/fixedcolumns/5.0.0/js/dataTables.fixedColumns.js"></script>
 <script src="https://cdn.datatables.net/fixedcolumns/5.0.0/js/fixedColumns.dataTables.js"></script>
 <script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
 <script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
 <script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
 <script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
 <script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
 <script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
 <script src="../../plugins/jszip/jszip.min.js"></script>
 <script src="../../plugins/pdfmake/pdfmake.min.js"></script>
 <script src="../../plugins/pdfmake/vfs_fonts.js"></script>
 <script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
 <script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
 <script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

 <!-- AdminLTE App -->
 <script src="../../dist/js/adminlte.min.js"></script>
 <!-- Page specific script -->
 <script type="text/javascript">
   $(document).ready(function() {
     $('#province').on('change', function() {
       var provinceID = $(this).val();
       if (provinceID) {
         $.ajax({
           type: 'POST',
           url: 'functionality/fetch_city.php',
           data: 'id=' + provinceID,
           success: function(html) {
             $('#city_mun').html(html);
           }
         });
       } else {
         $('#city_mun').html('<option value="">Select province first</option>');

       }
     });


   });
 </script>
 <script type="text/javascript">
   $(document).ready(function() {
     $('#city_mun').on('change', function() {
       var municipalityID = $(this).val();
       if (municipalityID) {
         $.ajax({
           type: 'POST',
           url: 'functionality/fetch_brgy.php',
           data: 'id=' + municipalityID,
           success: function(html) {
             $('#barangay').html(html);

           }
         });
       } else {
         $('#barangay').html('<option value="">Select municipality first</option>');

       }
     });


   });
 </script>
 <script>
   $(function() {
    $("#example1").DataTable({
    "responsive": false,
    "leftsplit": 2,
    "scrollX": true,
    "scrollY": "300px",
    "scrollCollapse": true,
    "paging": false,
    "autoWidth": false,
    "order": [],
    "buttons": ["excel", "colvis"],
    "columnDefs": [
        { "visible": true, "targets": [2, 4, 5, 6, 10, 11, 20] },  // Show only columns 1 and 3
        { "visible": false, "targets": "_all" }  // Hide all other columns by default
    ]
}).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');


     $("#example3").DataTable({
       "responsive": true,
       "lengthChange": false,
       "autoWidth": false
     }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
   });

   $(function() {
    $("#example5").DataTable({
    "responsive": false,
    "leftsplit": 2,
    "scrollX": true,
    "scrollY": "300px",
    "scrollCollapse": true,
    "paging": false,
    "autoWidth": false,
    "order": [],
    "buttons": ["excel", "colvis"],
    "columnDefs": [
        { "visible": true, "targets": [0, 1, 2, 3,  8, 14, 15] },  // Show only columns 1 and 3
        { "visible": false, "targets": "_all" }  // Hide all other columns by default
    ]
}).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

   });

   $(function() {
    $("#example6").DataTable({
    "responsive": false,
    "leftsplit": 2,
    "scrollX": true,
    "scrollY": "300px",
    "scrollCollapse": true,
    "paging": false,
    "autoWidth": false,
    "order": [],
    "buttons": ["excel", "colvis"],
    "columnDefs": [
        { "visible": true, "targets": [2, 6, 13, 15, 20] },  // Show only columns 1 and 3
        { "visible": false, "targets": "_all" }  // Hide all other columns by default
    ]
}).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

   });

   $(function() {
    $("#example2").DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,  // Enable search
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        "columnDefs": [
            { "targets": [0], "visible": false },
            { "visible": true, "targets": [2, 3, 4, 6, 10, 11, 20] }, // Show specified columns
            { "visible": false, "targets": "_all" } // Hide all other columns by default
        ],
        "order": [],
        "buttons": ["excel", "colvis"]
    }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
});

$(function() {
    $("#example4").DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,  // Enable search
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        "columnDefs": [
            { "targets": [0], "visible": false },
            { "visible": true, "targets": [0, 1, 2, 3, 6, 24, 25, 26, 27] }, // Show specified columns
            { "visible": false, "targets": "_all" } // Hide all other columns by default
        ],
        "order": [],
        "buttons": ["excel", "colvis"]
    }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
});

$(function() {
    $("#example8").DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,  // Enable search
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        "columnDefs": [
            { "targets": [0], "visible": false },
            { "visible": true, "targets": [2, 3, 6, 10, 13, 21] }, // Show specified columns
            { "visible": false, "targets": "_all" } // Hide all other columns by default
        ],
        "order": [],
        "buttons": ["excel", "colvis"]
    }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
});




   $(function() {
     //Initialize Select2 Elements
     $('.select2').select2()

     //Initialize Select2 Elements
     $('.select2bs4').select2({
       theme: 'bootstrap4'
     })

     //Datemask dd/mm/yyyy
     $('#datemask').inputmask('dd/mm/yyyy', {
       'placeholder': 'dd/mm/yyyy'
     })
     //Datemask2 mm/dd/yyyy
     $('#datemask2').inputmask('mm/dd/yyyy', {
       'placeholder': 'mm/dd/yyyy'
     })
     //Money Euro
     $('[data-mask]').inputmask()

     //Date picker
     $('#reservationdate').datetimepicker({
       format: 'L'
     });

     //Date and time picker
     $('#reservationdatetime').datetimepicker({
       icons: {
         time: 'far fa-clock'
       }
     });

     //Date range picker
     $('#reservation').daterangepicker()
     //Date range picker with time picker
     $('#reservationtime').daterangepicker({
       timePicker: true,
       timePickerIncrement: 30,
       locale: {
         format: 'MM/DD/YYYY hh:mm A'
       }
     })
     //Date range as a button
     $('#daterange-btn').daterangepicker({
         ranges: {
           'Today': [moment(), moment()],
           'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
           'Last 7 Days': [moment().subtract(6, 'days'), moment()],
           'Last 30 Days': [moment().subtract(29, 'days'), moment()],
           'This Month': [moment().startOf('month'), moment().endOf('month')],
           'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
         },
         startDate: moment().subtract(29, 'days'),
         endDate: moment()
       },
       function(start, end) {
         $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
       }
     )

     //Timepicker
     $('#timepicker').datetimepicker({
       format: 'LT'
     })

     //Bootstrap Duallistbox
     $('.duallistbox').bootstrapDualListbox()

     //Colorpicker
     $('.my-colorpicker1').colorpicker()
     //color picker with addon
     $('.my-colorpicker2').colorpicker()

     $('.my-colorpicker2').on('colorpickerChange', function(event) {
       $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
     })

     $("input[data-bootstrap-switch]").each(function() {
       $(this).bootstrapSwitch('state', $(this).prop('checked'));
     })

   })
   // BS-Stepper Init
   document.addEventListener('DOMContentLoaded', function() {
     window.stepper = new Stepper(document.querySelector('.bs-stepper'))
   })

   // DropzoneJS Demo Code Start
   Dropzone.autoDiscover = false

   // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
   var previewNode = document.querySelector("#template")
   previewNode.id = ""
   var previewTemplate = previewNode.parentNode.innerHTML
   previewNode.parentNode.removeChild(previewNode)

   var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
     url: "/target-url", // Set the url
     thumbnailWidth: 80,
     thumbnailHeight: 80,
     parallelUploads: 20,
     previewTemplate: previewTemplate,
     autoQueue: false, // Make sure the files aren't queued until manually added
     previewsContainer: "#previews", // Define the container to display the previews
     clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
   })

   myDropzone.on("addedfile", function(file) {
     // Hookup the start button
     file.previewElement.querySelector(".start").onclick = function() {
       myDropzone.enqueueFile(file)
     }
   })

   // Update the total progress bar
   myDropzone.on("totaluploadprogress", function(progress) {
     document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
   })

   myDropzone.on("sending", function(file) {
     // Show the total progress bar when upload starts
     document.querySelector("#total-progress").style.opacity = "1"
     // And disable the start button
     file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
   })

   // Hide the total progress bar when nothing's uploading anymore
   myDropzone.on("queuecomplete", function(progress) {
     document.querySelector("#total-progress").style.opacity = "0"
   })

   // Setup the buttons for all transfers
   // The "add files" button doesn't need to be setup because the config
   // `clickable` has already been specified.
   document.querySelector("#actions .start").onclick = function() {
     myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
   }
   document.querySelector("#actions .cancel").onclick = function() {
     myDropzone.removeAllFiles(true)
   }

   // DropzoneJS Demo Code End
 </script>



 </body>

 </html>