<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../admin/login.php");
    exit();
}
include("../includes/db.php");

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Admin Dashboard</title>

    <!-- Montserrat Font -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../admin/dashboard.css">
  </head>
    
  <body>
    <div class="grid-container">
      <!-- Header -->
      <header class="header">
        <div class="menu-icon" onclick="openSidebar()">
          <span class="material-icons-outlined">menu</span>
        </div>
        <div class="header-left">
          <h1>SOLE MATE</h1>
        </div>
        <div class="profile-info">
         <div class="profile">
          <p><b><!--Name here-->Soumya Sharma</b></p>
          <p>Admin</p>
         </div>
         <div class="profile-photo">
          <span class="material-icons-outlined">account_circle</span> 
         </div>
        </div>
      </header>
      <!-- End Header -->

      <!-- Sidebar -->
      <aside id="sidebar">
        <div class="sidebar-title">
          <div class="sidebar-brand">
          <a href="#"<!--MAIN STORE LINK HERE--></a> <span class="material-icons-outlined">shopping_cart</span> STORE</a>
          </div>
          <span class="material-icons-outlined" onclick="closeSidebar()">close</span>
        </div>

        <ul class="sidebar-list">
          
          <li class="sidebar-list-item">
            <a href="../admin/product_info.php">
              <span class="material-icons-outlined">inventory_2</span> Products
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="../admin/categories_page.php" target="_blank">
              <span class="material-icons-outlined">category</span> Categories
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="../admin/customer_info.php">
              <span class="material-icons-outlined">groups</span> Customers
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="#" target="_blank">
              <span class="material-icons-outlined">settings</span> Settings
            </a>
          </li>
        </ul>
      </aside>
      <!-- End Sidebar -->

      <!-- Main -->
      <main class="main-container">
        <div class="main-title">
          <h2>DASHBOARD</h2>
        </div>

        <div class="main-cards">

          <div class="card">
            <a href="../admin/product_info.php">
            <div class="card-inner">
              <h3>PRODUCTS</h3>
              <span class="material-icons-outlined">inventory_2</span>
            </div>
            <h1>213</h1>
            </a>
          </div>

          <div class="card">
            <a href="../admin/categories_page.php">
            <div class="card-inner">
              <h3>CATEGORIES</h3>
              <span class="material-icons-outlined">category</span>
            </div>
            <h1>7</h1>
            </a>
          </div>

          <div class="card">
            <a href="../admin/customer_info.php">
            <div class="card-inner">
              <h3>CUSTOMERS</h3>
              <span class="material-icons-outlined">groups</span>
            </div>
            <h1>1500</h1>
            </a>
          </div>
          <div class="card">
            <a href="order_info.html">
            <div class="card-inner">
              <h3>ORDERS</h3>
              <span class="material-icons-outlined">shopping_bag</span>
            </div>
            <h1>15</h1>
            </a>
          </div>

          

        </div>

        <div class="charts">

          <div class="charts-card">
            <h2 class="chart-title">Top 5 Products</h2>
            <div id="bar-chart"></div>
          </div>

          <div class="charts-card">
            <h2 class="chart-title">Purchase and Sales Orders</h2>
            <div id="area-chart"></div>
          </div>

        </div>
      </main>
      <!-- End Main -->

    </div>

    <!-- Scripts -->
    <!-- ApexCharts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.5/apexcharts.min.js"></script>
    <!-- Custom JS -->
    <script src="AdminPanel.js"></script>
  </body>
</html>
