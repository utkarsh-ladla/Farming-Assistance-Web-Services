<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

?>
  <!DOCTYPE html>
  <html>

  <head>
    <title>HOME</title>
    <!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
    <link rel="stylesheet" href="farmer_home_style.css">
  </head>

  <body>

    <!-- <h1>Hello, <?php echo $_SESSION['name']; ?></h1> -->


    <title>Farming Assistant Web Service</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="adnmin.css" />
    </head>


    <body>


      <header class="header">
        <!-- <img src="lo.jpg" alt="Logo" class="logo" /> -->
        <h1>Next farm<span>.</span></h1>
        <h1>Farmer PORTAL </h1><?php echo $_SESSION['name']; ?>
      </header>

      <ul class="nav nav-pills nav-fill gap-2 p-1 small rounded-5 shadow-sm" id="pillNav2" role="tablist" style="
        --bs-nav-link-color: var(--bs-white);
        --bs-nav-pills-link-active-color: var(--bs-primary);
        --bs-nav-pills-link-active-bg: var(--bs-white);
      ">
        <li class="nav-item" role="presentation">
          <button class="nav-link active rounded-5" id="home-tab1" data-bs-toggle="tab" data-bs-target="#Complaints" type="button" role="tab" aria-selected="true">
            Complaint Page
          </button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link rounded-5" id="home-tab2" data-bs-toggle="tab" data-bs-target="#Complaint-status" type="button" role="tab" aria-selected="true">
            View Complaint Status
          </button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link rounded-5" id="profile-tab4" data-bs-toggle="tab" data-bs-target="#Farming-Tips" type="button" role="tab" aria-selected="false">
            Farming Tips
          </button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link rounded-5" id="profile-tab4" data-bs-toggle="tab" data-bs-target="#upload-form" type="button" role="tab" aria-selected="false">
            Crop Advertisement Details
          </button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link rounded-5" id="contact-tab2" data-bs-toggle="tab" data-bs-target="#Sell_crop" type="button" role="tab" aria-selected="false">
            Sell Crop
          </button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link rounded-5" id="contact-tab2" data-bs-toggle="tab" data-bs-target="#Logout" type="button" role="tab" aria-selected="false" onclick="logout()">
            Logout
          </button>
        </li>
      </ul>

      <div class="container">
        <div class="tab-content">
          <div class="tab-pane fade show active" id="Complaints" role="tabpanel">
            <!-- Content for the Home tab goes here -->
            <div class="complaint-form">
              <h1>Submit Complaint</h1>
              <form action="submit_complaints/submit_complaints.php" method="post">
                <div>
                  <label for="complaint">Complaint:</label><br>
                  <textarea id="complaint" name="complaint" rows="5" cols="50" required></textarea>
                </div>
                <br>
                <div>
                  <input type="submit" value="Submit Complaint">
                </div>
              </form>
            </div>

          </div>

          <div class="tab-pane fade" id="Complaint-status" role="tabpane2">
            <!-- Content for the Home tab goes here -->
            <h1>view Complaint Status</h1>
            <?php
            include('view_complaint/view_Complaint_status.php');
            ?>
          </div>


          <div class="tab-pane fade" id="Farming-Tips" role="tabpanel">
            <!-- Content for the tips tab goes here -->
            <h1>Farming Tips</h1>
            <?php
            // Include view_messages.php to fetch farming tips
            include('farming_tips/view_messages.php');
            ?>
            <!-- Tips will be displayed here -->
          </div>


          <div class="tab-pane fade" id="upload-form" role="tabpane2">
            <!-- Content for the Home tab goes here -->

            <h2>Advertisements</h2>
            <?php include('../supplier/post_advertisements/accept_advertisement.php'); ?>

          </div>

          <!-- sell crop  -->
          <div class="tab-pane fade" id="Sell_crop" role="tabpane2">
            
           <div class="sell-crop-container">
              <div class="sell-crop-container">
                <h1>sell crop</h1>
                <form action="sell_crop/sell_crop.php" method="POST">
                  <label for="supplier_id">Supplier ID:</label>
                  <input type="text" id="supplier_id" name="supplier_id" required><br><br>
<!-- 
                  <label for="supplier_name">Supplier Name:</label>
                  <input type="text" id="supplier_name" name="supplier_name" ><br><br> -->

                  <label for="crop_id">Crop ID:</label>
                  <input type="number" id="crop_id" name="crop_id" required><br><br>

                  <label for="crop_names">Crop Name:</label>
                  <input type="text" id="crop_names" name="crop_name" required><br><br>

                  <label for="quantity">Quantity:</label>
                  <input type="number" id="quantity" name="quantity" required><br><br>

                  <label for="price">Price (in Rupees):</label>
                  <input type="number" id="price" name="price" required><br><br>

                  <button type="submit">Submit</button>
                </form>
              </div>



          <!-- <form action="sell_crop.php" method="POST">
                <label for="supplier_id">Supplier ID:</label>
                <input type="text" id="supplier_id" name="supplier_id" required><br><br>

                <label for="supplier_name">Supplier Name:</label>
                <input type="text" id="supplier_name" name="supplier_name" readonly><br><br>

                <label for="crop_id">Crop ID:</label>
                <input type="text" id="crop_id" name="crop_id" required><br><br>

                <label for="crop_names">Crop Name:</label>
                <input type="text" id="crop_names" name="crop_name" required><br><br>

                <label for="quantity">Quantity:</label>
                <input type="number" id="quantity" name="quantity" required><br><br>

                <label for="price">Price (in Rupees):</label>
                <input type="number" id="price" name="price" required><br><br>

                <button type="submit">Submit</button>
            </form>
        </div> -->
        </div>

        <div class="tab-pane fade" id="Logout" role="tabpanel">
          <!-- Content for the Contact tab goes here -->
        </div>
      </div>
      </div>
    

      <script>
        function logout() {
          // Perform logout action
          window.location.href = "../../index.php"; // Redirect to logout script
        }
      </script>
    </body>

  </html>

<?php
} else {
  header("Location: index.php");
  exit();
}

?>