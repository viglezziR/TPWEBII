<!doctype html>
<html lang="en">

<head>
  <base href="{BASE_URL}">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tienda de Mascotas</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"><img src="images/header.png" height="50"> PET SHOP</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown"
        aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
        <ul class="navbar-nav">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Menu
            </a>
            <ul class="dropdown-menu dropdown-menu-dark">
              <li><a class="dropdown-item" href="productList">Productos</a></li>
              <li><a class="dropdown-item" href="brandList">Marcas</a></li>
            </ul>

          </li>
        </ul>
      </div>
      <div class="flex-row-reverse">
        <ul class="navbar-nav flex-row-reverse">
          {if !isset($smarty.session.USER_ID)}
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="login">Login</a>
            </li>
          {else if isset($smarty.session.USER_ID)}
            <li class="nav-item ml-auto">
              <a class="nav-link" aria-current="page" href="logout">Logout ({$smarty.session.USER_EMAIL})</a>
            </li>
          {/if}
        </ul>
      </div>
    </div>
  </nav>

<main class="container">