<!-- MY SQL ERROR COMMAND FOR RUN services.msc -->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Farm</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <div id="main">
      <div id="nav">
        <h1>Next farm<span>.</span></h1>
        <div id="part2">
          <a href="#">Home</a>
          <a href="#AboutUs">About Us </a>
          <a href="#contactUs">Contact Us</a>
          <a href="#Login"
            ><h5>Login</h5>
            <div id="green"></div
          ></a>
        </div>
      </div>

      <h1>Farm Smarter with Us!</h1>
      <img src="images/main.jpg" alt="" id="img1" />
    </div>

    <div id="AboutUs">
      <h2><span>.</span>"Empowering Farmers Through Digital Agriculture"</h2>
      <p>
        Welcome to our Agricultural Assistant Web Server, your trusted partner
        in revolutionizing the way you manage your farm. We understand that
        modern farming demands innovation, efficiency, and precision. That's why
        we've created a powerful online platform tailored to meet the unique
        needs of farmers like you
      </p>

      <button id="Aboutbutton">About us</button>
    </div>
    <div id="contactUs">
    <div class="container">
        <h1>Contact Us</h1>
        <form action="#" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="message">Message:</label>
            <textarea id="message" name="message" rows="4" required></textarea>

            <input type="submit" value="Submit">
        </form>
    </div>
</div>

    <div id="Login">
    <!-- <div class="container2"> -->
    <div class="child">
        <img src="images/farmer.png" alt=""><br>
        <a href="farmer/Login-registration/login.php">Farmer</a></img>
  
    </div>
    <div class="child">
        <img src="images/admin.png" alt=""><br>
        <a href="admin/Login-registration/login.php">Admin</a></img>
    </div>    
    <div class="child">   
        <img src="images/supplier.png" alt=""><br>
        <a href="supplier/Login-registration/login.php">Supplier</a></img>
    <!-- </div>  -->
    </div>    
    </div>
  </body>
</html>
