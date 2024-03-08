<!DOCTYPE html>
<html lang="en">

<head>
    <title>Главная страница</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/resources/css/app.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    @yield('header')
    <main role='main'>
        @yield('content')
    </main>
    <footer class="text-muted">
        <div class="container">
          <p class="float-right">
            <a href="#">Back to top</a>
          </p>
          <p>Album example is © Bootstrap, but please download and customize it for yourself!</p>
          <p>New to Bootstrap? <a href="../../">Visit the homepage</a> or read our <a href="../../getting-started/">getting started guide</a>.</p>
        </div>
      </footer>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="/resources/js/app.js"></script>
</body>

</html>
