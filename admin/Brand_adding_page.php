<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>New Brand Info- Sole Mate</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="Brand_adding_page.css" />
  </head>
  <body>
    <header>
      <h1>Sole Mate-New Brand Info Page</h1>
    </header>

    <main>
      <form id="contactForm" method="post" action="brandadded.php">
          <div class="row mb-3">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Brand id</label
          >
          <div class="col-sm-10">
            <input type="text" class="form-control" name="brand_id" id="inputEmail3" />
          </div>
       
        </div>
        <div class="row mb-3">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Brand Name</label
          >
          <div class="col-sm-10">
            <input type="text" class="form-control" name="brand" id="inputEmail3" />
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </main>

    <footer>
      <p>&copy; 2024 Sole Mate Store. All rights reserved.</p>
    </footer>
    <script src="Brand_adding_Page.js"></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
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
