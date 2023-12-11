<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Rannaghor - Just Cook It</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css"
      integrity="sha384-QYIZto+st3yW+o8+5OHfT6S482Zsvz2WfOzpFSXMF9zqeLcFV0/wlZpMtyFcZALm"
      crossorigin="anonymous"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.maateen.me/charukola-ultra-light/font.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="style.css" />
  </head>

  <body>
    <!-- Navbar Section Starts -->

    <div id="header"></div>

    <!-- Main Section Starts -->

    <div class="container">
      <img
        src="./assets/homepic.jpg"
        class="img-fluid rounded w-100 mt-5"
        alt="..."
      />

      <h2 class="text-center my-5" id="category">Popular Items</h2>
      <div class="row mt-3">


      <?php

      // database connection settings
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "rannaghor";

      // create connection
      $conn = new mysqli($servername, $username, $password, $dbname);

      // check connection
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }

      // prepare and bind SQL statement
      $stmt = $conn->prepare("SELECT id, name, genre, body, image FROM recipes WHERE approved = 1 ORDER BY views DESC LIMIT 6");
      // $sql = "SELECT * FROM your_table ORDER BY your_column_name DESC LIMIT 6";

      // Execute the statement
      mysqli_stmt_execute($stmt);

      // Get the result set
      $result = mysqli_stmt_get_result($stmt);

      if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
          // // Render the data in HTML
          // echo "<div>";
          // echo "<h2>" . $row["name"] . "</h2>";
          // echo "<p>" . $row["body"] . "</p>";
          // echo "</div>";

          echo '<div class="col-lg-4 col-md-6 col-12 d-flex align-items-stretch mb-4">
            <div class="card w-100">
              <img
                src="uploads/' . $row["image"] . '"
                style="height: 276px"
                class="card-img-top"
                alt="..."
              />
              <div class="card-body">
                <h5 class="card-title">' . $row["name"] . '</h5>
                <p class="card-text">' . $row["genre"] . '</p>
                <a href="/details.php?id=' . $row["id"] . '" class="float-left submit-button btn icn2"
                  >Details</a
                >
              </div>
            </div>
          </div>';
        }
      }
      

      // close statement and connection
      $stmt->close();
      $conn->close();
      ?>

        <!-- <div class="col-lg-4 col-md-6 col-12 d-flex align-items-stretch mb-4">
          <div class="card w-100">
            <img
              src="assets/curry.png"
              style="height: 276px"
              class="card-img-top"
              alt="..."
            />
            <div class="card-body">
              <h5 class="card-title">Chicken Curry</h5>
              <p class="card-text">Indian Cuisine</p>
              <a href="/details.php" class="float-left submit-button btn icn2"
                >Details</a
              >
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 col-12 d-flex align-items-stretch mb-4">
          <div class="card w-100">
            <img
              src="assets/biryani.png"
              style="height: 276px"
              class="card-img-top"
              alt="..."
            />
            <div class="card-body">
              <h5 class="card-title">Biryani</h5>
              <p class="card-text">Indian Cuisine</p>
              <a href="/details.php" class="float-left submit-button btn icn2"
                >Details</a
              >
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 col-12 d-flex align-items-stretch mb-4">
          <div class="card w-100">
            <img
              src="assets/pudding.png"
              style="height: 276px"
              class="card-img-top"
              alt="..."
            />
            <div class="card-body">
              <h5 class="card-title">Pudding</h5>
              <p class="card-text">Dessert</p>
              <a href="/details.php" class="float-left submit-button btn icn2"
                >Details</a
              >
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-12 d-flex align-items-stretch mb-5">
          <div class="card w-100">
            <img
              src="assets/cake.jpg"
              style="height: 276px"
              class="card-img-top"
              alt="..."
            />
            <div class="card-body">
              <h5 class="card-title">Chocolate Cake</h5>
              <p class="card-text">Dessert</p>
              <a href="/details.php" class="float-left submit-button btn icn2"
                >Details</a
              >
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-12 d-flex align-items-stretch mb-5">
          <div class="card w-100">
            <img
              src="assets/pizza.jpg"
              style="height: 276px"
              class="card-img-top"
              alt="..."
            />
            <div class="card-body">
              <h5 class="card-title">Pepperoni Pizza</h5>
              <p class="card-text">American Dish</p>
              <a href="/details.php" class="float-left submit-button btn icn2"
                >Details</a
              >
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-12 d-flex align-items-stretch mb-5">
          <div class="card w-100">
            <img
              src="assets/alfredo.jpg"
              style="height: 276px"
              class="card-img-top"
              alt="..."
            />
            <div class="card-body">
              <h5 class="card-title">Chicken Alfredo Pasta</h5>
              <p class="card-text">Italian Dish</p>
              <a href="/details.php" class="float-left submit-button btn icn2"
                >Details</a
              >
            </div>
          </div>
        </div> -->
      </div>
    </div>

    <!-- <a href="#" class="float">
      <span class="my-float">Add New Recipe</span>
    </a> -->

    <!-- Footer Section Starts -->

    <div id="footer"></div>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://code.jquery.com/jquery-3.6.4.min.js"
      integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8="
      crossorigin="anonymous"
    ></script>

    <script src="js/load_essential.js"></script>
  </body>
</html>
