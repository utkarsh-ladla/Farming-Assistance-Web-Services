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
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="adnmin.css" />
  </head>


  <body>


    <header class="header">
      <!-- <img src="lo.jpg" alt="Logo" class="logo" /> -->
      <h1>Next farm<span>.</span></h1>
      <h1>Farmer PORTAL </h1><?php echo $_SESSION['name']; ?>
    </header>

    <ul
      class="nav nav-pills nav-fill gap-2 p-1 small rounded-5 shadow-sm"
      id="pillNav2"
      role="tablist"
      style="
        --bs-nav-link-color: var(--bs-white);
        --bs-nav-pills-link-active-color: var(--bs-primary);
        --bs-nav-pills-link-active-bg: var(--bs-white);
      "
    >
    <li class="nav-item" role="presentation">
        <button class="nav-link active rounded-5" id="home-tab1" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-selected="true">
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
        <button class="nav-link rounded-5" id="profile-tab4" data-bs-toggle="tab" data-bs-target="#advertisement" type="button" role="tab" aria-selected="false">
            Crop Advertisement Details
        </button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link rounded-5" id="contact-tab2" data-bs-toggle="tab" data-bs-target="#Logout" type="button" role="tab" aria-selected="false" onclick="logout()">
            Logout
        </button>
    </li>
      <!-- <li class="nav-item" role="presentation">
    <button class="nav-link rounded-5" id="contact-tab2" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-selected="false"></button>
  </li> -->
    </ul>

    <div class="container">
      <div class="tab-content">
        <div class="tab-pane fade show active" id="home" role="tabpanel">
          <!-- Content for the Home tab goes here -->
          <h1>Complaint Page</h1>

        </div>

        <div class="tab-pane fade" id="Complaint-status" role="tabpane2">
          <!-- Content for the Home tab goes here -->
          <h1>view Complaint Status</h1>

        </div>


        <div class="tab-pane fade" id="Farming-Tips" role="tabpanel">
          <!-- Content for the tips tab goes here -->

          <h1>Farming Tips</h1>
          
          <div id="farming-tips-container"></div>


            <!-- Tips will be displayed here -->
          
          </div>

        <div class="tab-pane fade" id="advertisement" role="tabpane2">
          <!-- Content for the Home tab goes here -->
          <h1>view Complaint Status</h1>

        </div>

        <div class="tab-pane fade" id="Logout" role="tabpanel"  >
          <!-- Content for the Contact tab goes here -->
        </div>
      </div>
    </div>


    <script>
  function logout() {
    // Perform logout action
    window.location.href = "../../index.php"; // Redirect to logout script
  }
    fetch('farmer_tips/view_messages.php') // Change to the correct URL of your PHP file
    .then(response => response.json())
    .then(tips => {
        const farmingTipsContainer = document.getElementById('farming-tips-container');
        farmingTipsContainer.innerHTML = ''; // Clear existing content

        tips.forEach(tip => {
            const tipElement = document.createElement('div');
            tipElement.textContent = tip;
            farmingTipsContainer.appendChild(tipElement);
        });
    })
    .catch(error => console.error('Error fetching farming tips:', error));

</script>
</body>
</html>

<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>