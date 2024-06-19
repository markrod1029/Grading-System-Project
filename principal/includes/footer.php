<footer class="site-footer" style=" ">
  <div class="footer-inner bg-white">
    <div class="row">
      <div class="col-sm-6">
        &copy; <?php echo date('Y') ?> Student Grading System - Gospel of Christ School 
      </div>
      <div class="col-sm-6 text-right">
        <!-- Designed by <a href="https://colorlib.com">Colorlib</a> -->
      </div>
    </div>
  </div>
</footer>


<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
<script src="../assets/js/main.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartist-plugin-legend@0.6.2/chartist-plugin-legend.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery.flot@0.8.3/jquery.flot.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flot-pie@1.0.0/src/jquery.flot.pie.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flot-spline@0.0.1/js/jquery.flot.spline.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/moment@2.22.2/moment.min.js"></script>

<script>
  $(document).ready(function () {
    $('#bootstrap-data-table').DataTable({
      lengthChange: false
    });
  });
</script>



<script>
  $('#menuToggle').on('click', function (event) {
    var windowWidth = $(window).width();
    if (windowWidth < 1010) {
      $('body').removeClass('open');
      if (windowWidth < 760) {
        $('#left-panel').slideToggle();
        $('.navbar-nav').style(['width', '80px'])
      } else {
        $('#left-panel').toggleClass('open-menu');
      }
    } else {
      $('body').toggleClass('open');
      $('#left-panel').removeClass('open-menu');
    }

  });


  $(".menu-item-has-children.dropdown").each(function () {
    $(this).on('click', function () {
      var $temp_text = $(this).children('.dropdown-toggle').html();
      $(this).children('.sub-menu').prepend('<li class="subtitle">' + $temp_text + '</li>');
    });
  });

</script>