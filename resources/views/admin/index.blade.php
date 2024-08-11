<!DOCTYPE html>
<html>

<head>
  @include('admin.css')
</head>

<body>

  <header class="header">
    @include('admin.header')
  </header>

  <div class="d-flex align-items-stretch">
    <!-- Sidebar Navigation-->
    @include('admin.sidebar')
    <!-- Sidebar Navigation end-->
    <div class="page-content">
      <div class="page-header">
        <div class="container-fluid">

          @include('admin.body')

        </div>
      </div>
    </div>

    <!-- javascript -->
    <script>
      // Dapatkan URL saat ini
      const currentURL = window.location.href;

      // Dapatkan semua elemen <li>
      const navItems = document.querySelectorAll('ul li');

      // Loop melalui semua elemen <li>
      navItems.forEach(item => {
        const link = item.querySelector('a');
        if (link && currentURL.includes(link.getAttribute('href'))) {
          item.classList.add('active');
        } else {
          item.classList.remove('active');
        }
      });
    </script>

    <!-- JavaScript files-->
    <script src="{{ asset('admincss/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/popper.js/umd/popper.min.js') }}"> </script>
    <script src="{{ asset('admincss/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/jquery.cookie/jquery.cookie.js') }}"> </script>
    <script src="{{ asset('admincss/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('admincss/js/charts-home.js') }}"></script>
    <script src="{{ asset('admincss/js/front.js') }}"></script>
</body>

</html>