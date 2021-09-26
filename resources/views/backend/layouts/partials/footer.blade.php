@include('backend.layouts.partials.logout_modal')
</div>
</div> 
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
      <div class="copyright text-center my-auto">
        <span>copyright &copy; <script> document.write(new Date().getFullYear()); </script> - developed by
          <b><a href="https://github.com/alamgirweb11" target="_blank">Alamgir Hosen</a></b>
        </span>
      </div>
    </div>
  </footer>
  <!-- Footer -->
</div>
</div>

<!-- Scroll to top -->
<a class="scroll-to-top submenu" href="#page-top">
<i class="fas fa-angle-up"></i>
</a>

<script src="{{ asset('backend/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('backend/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('backend/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
<script src="{{ asset('backend/js/ruang-admin.min.js') }}"></script>
<!-- Datatable Scripts -->
<script src="{{ asset('backend/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('backend/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
{{--menu active class--}}
{{-- <script type="text/javascript">
  $(document).ready(function(){
      var url = window.location.href.substr(window.location.href.lastIndexOf("/") + 1);
      $('.nav-link').removeClass('active');
      $('[href$="'+url+'"]').parent().addClass("active");
      $('.nav-item').removeClass('menu-open active');
      $('[href$="'+url+'"]').closest('li.nav-item').addClass("menu-open active");
      var full_url_path = window.location.href;
      var url_path = new URL(full_url_path);
      var child_url = url_path.pathname.split('/')[1];
      $('.nav-link').removeClass('active');
      $('[href$="'+child_url+'"]').parent().addClass("active");
      $('.nav-item').removeClass('menu-open active');
      $('[href$="'+child_url+'"]').closest('li.nav-item').addClass("menu-open active");
  });
</script> --}}
{{-- <script type="text/javascript">
  $(document).ready(function(){
      var url = window.location.href.substr(window.location.href.lastIndexOf("/") + 1);
      $('.submenu a').removeClass('active');
      $('[href$="'+url+'"]').parent().addClass("active");
      $('.nav-item').removeClass('menu-open active');
      $('[href$="'+url+'"]').closest('li.nav-item').addClass("menu-open active");
      var full_url_path = window.location.href;
      var url_path = new URL(full_url_path);
      var child_url = url_path.pathname.split('/')[1];
      $('.submenu a').removeClass('active');
      $('[href$="'+child_url+'"]').parent().addClass("active");
      $('.nav-item').removeClass('menu-open active');
      $('[href$="'+child_url+'"]').closest('li.nav-item').addClass("menu-open active");
  });
</script> --}}
@yield('custom-js')
</body>

</html>