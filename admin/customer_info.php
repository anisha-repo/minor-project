<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Customer Info - Admin Panel</title>
    <link rel="stylesheet" href="../admin/customer_info.css" />
  <
  
</head>
<body>

  <div class="main-content">
    <h1>Sole Mate</h1>
    <br>
    <header>
    
      <h1>Customer Information</h1>
      <div class="admin-info">
        <input type="text" id="searchBar" placeholder="Search by Name" class="search-bar" />
      </div>
    </header>

    <div class="customer-table-container">
      <table class="customer-table">
        <thead>
          <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Order Number</th>
          </tr>
        </thead>
        <tbody id="customerTableBody">
          <tr>
            <td data-name=""><!--Customer name here--></td>
            <td ><!--Customer email here--></td>
            <td><!--customer phone no here--></td>
            <td><!--cutomer Adress here--></td>
            <td><!--Order Number here--></td>
            
          </tr>
         
        </tbody>
      </table>
    </div>
  </div>
  <script src="customer_info.js" defer></script>
</body>
</html>
