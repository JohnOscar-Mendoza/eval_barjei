        <!-- jQuery -->
        <script src="<?php echo base_url('assets/js/jquery.js'); ?>"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>

        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

        <!-- data tables -->
        <script src="<?php echo base_url('assets/data-tables/js/jquery.dataTables.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/data-tables/js/dataTables.bootstrap.min.js'); ?>"></script>

        <!-- WYSIWIG -->
        <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
        <script>
            tinymce.init({ 
                selector: "#notes",
                setup: function (editor) {
                    editor.on('change', function () {
                        editor.save();
                    });
                }
            });
        </script>

        <script>
         $(function() {

          $("#datepicker").datepicker(
          {
            changeMonth: true,
            changeYear: true,
            yearRange: "-40:+0"
        }
        );  

          $("#dataTable").dataTable({
            responsive: true,
            paging: false
        });

      });
     </script>

 </body>

 </html>
