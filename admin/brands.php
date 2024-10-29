<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sneaker Store - Categories</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="../admin/categories_page.css" />
  </head>
  <body>
    <header class="header">
      <h1>Sole Mate Store</h1>
      <nav class="nav">
        <ul>
          <li><a href="AdminPanel.html">Dashboard</a></li>
          <li><a href="#">Shop</a></li>
          <li><a href="product_info.html">Products</a></li>
          <li><a href="customer_info.html">Customers</a></li>
        </ul>
      </nav>
    </header>

    <main class="categories-container">
      <h2>Brands</h2>
      <div class="categories-grid">
        <div class="category-card" onclick="filterCategory('Nike')">
          <img src="<!--NIKE LOGO HERE-->" alt="NIKE" />
          <h3>Nike</h3>
          <div class="btn-group" role="group">
            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
              Sub-Categories
            </button>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Men</a></li>
              <li><a class="dropdown-item" href="#">Women</a></li>
              <li><a class="dropdown-item" href="#">Sports</a></li>
              <li><a class="dropdown-item" href="#">Slides</a></li>
            </ul>
          </div>
        </div>

    
        <div class="category-card" onclick="filterCategory('Puma')">
          <img src="<!--PUMA LOGO HERE-->" alt="PUMA" />
          <h3>Puma</h3>
          <div class="btn-group" role="group">
            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
              Sub-Categories
            </button>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Men</a></li>
              <li><a class="dropdown-item" href="#">Women</a></li>
              <li><a class="dropdown-item" href="#">Sports</a></li>
              <li><a class="dropdown-item" href="#">Slides</a></li>
            </ul>
          </div>
        </div>
        <div class="category-card" onclick="filterCategory('Adidas')">
          <img src="<!--ADIDAS LOGO HERE-->" alt="ADIDAS" />
          <h3>Adidas</h3>
          <div class="btn-group" role="group">
            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
              Sub-Categories
            </button>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Men</a></li>
              <li><a class="dropdown-item" href="#">Women</a></li>
              <li><a class="dropdown-item" href="#">Sports</a></li>
              <li><a class="dropdown-item" href="#">Slides</a></li>

            </ul>
          </div>
        </div>
        <div class="category-card" onclick="filterCategory('New Balance')">
          <img src="<!--NEW BALANCE LOGO HERE-->" alt="NEW BALANCE" />
          <h3>New Balance</h3>
          <div class="btn-group" role="group">
            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
              Sub-Categories
            </button>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Men</a></li>
              <li><a class="dropdown-item" href="#">Women</a></li>
              <li><a class="dropdown-item" href="#">Sports</a></li>
            </ul>
          </div>
        </div>
        <div class="category-card" onclick="filterCategory('Converse')">
          <img src="<!--CONVERSE LOGO HERE-->" alt="CONVERSE" />
          <h3>Converse</h3>
          <div class="btn-group" role="group">
            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
              Sub-Categories
            </button>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Men</a></li>
              <li><a class="dropdown-item" href="#">Women</a></li>
            </ul>
          </div>
        </div>
        <div class="category-card" onclick="filterCategory('Crocs')">
          <img src="<!--CROCS LOGO HERE-->" alt="CROCS" />
          <h3>Crocs</h3>
          <div class="btn-group" role="group">
            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
              Sub-Categories
            </button>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Clogs</a></li>
              <li><a class="dropdown-item" href="#">Slides</a></li>
            </ul>
          </div>
        </div>
        <div class="category-card" onclick="filterCategory('Reebok')">
          <img src="<!--REEBOK LOGO HERE-->" alt="REEBOK" />
          <h3>Reebok</h3>
          <div class="btn-group" role="group">
            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
              Sub-Categories
            </button>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Men</a></li>
              <li><a class="dropdown-item" href="#">Women</a></li>
              <li><a class="dropdown-item" href="#">Sports</a></li>
              <li><a class="dropdown-item" href="#">Slides</a></li>
            </ul>
          </div>
        </div>
        <div class="category-card" onclick="filterCategory('Add New Category')">
          <img src="<!--PLUS SIGN HERE-->" alt="ADD NEW CATEGORY" />
          <h3>Add New Category</h3>
        </div>
      </div>
    </main>

    <footer class="footer">
      <p>© 2024 Sole Mate. All Rights Reserved.</p>
    </footer>
    <script src="categories_page.js"></script>
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
      integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
      integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
