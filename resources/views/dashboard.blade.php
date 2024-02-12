<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">
            <img src="https://www.w3schools.com/bootstrap5/img_avatar1.png" alt="Avatar Logo" style="width:40px;" class="rounded-pill"> 
          </a>
          <span class="navbar-text"><a href="{{ url('/logout') }}">Logout</a></span>
        </div>
      </nav>

      <a href="{{ url("/sample_link") }}" class="m-4 btn btn-primary">Sample Link</a>

      <h1 class="m-4">This is my dashboard.</h1>
      <h4 class="m-4">You are logged in as {{ $info->employee_name }}</h4>
</body>

</html>