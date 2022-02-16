    <!-- base:js -->
    <script src="../assets/vendors/base/vendor.bundle.base.js"></script>
    <!-- endinject -->
    
    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="../assets/js/template.js"></script>
    <!-- endinject -->
    
    <!-- plugin js for this page -->
    <!-- End plugin js for this page -->
    <script src="../assets/vendors/chart.js/Chart.min.js"></script>
    <script src="../assets/vendors/progressbar.js/progressbar.min.js"></script>
		<script src="../assets/vendors/chartjs-plugin-datalabels/chartjs-plugin-datalabels.js"></script>
		<script src="../assets/vendors/justgage/raphael-2.1.4.min.js"></script>
		<script src="../assets/vendors/justgage/justgage.js"></script>
    <!-- Custom js for this page-->
    <script src="../assets/js/dashboard.js"></script>
    <!-- End custom js for this page-->

    <!-- sweetaalert plugin --> 
    <script src="../assets/js/sweetalert.min.js"></script>
    
    <script type="text/javascript">
      
      /*this function is triggered after 
      page is fully loaded and ready */
      $(document).ready(function(){
        
       
        }); 
    </script>

    <script type="text/javascript">
      
      //start preloader on window function
        window.start_load = function(){
	      $('body').prepend('<div id="preloader"></div>')
        }
        
        //end preloader function
	     window.end_load = function(){
	      $('#preloader').fadeOut('slow', function() {
	        $(this).remove();
          })}
          
          // jquery window.unload method
        // window.onload = function(){
        //   $('.theme-loader').show();
        //   setTimeout(function(){
        //     $('.theme-loader').fadeToggle();
        //   }, 1500);
        // }

        //page loading function
        function loading(){
          $('.theme-loader').show();
          setTimeout(function(){
            $('.theme-loader').fadeToggle();
          }, 1000);
        }
</script>

