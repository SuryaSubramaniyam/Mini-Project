<?php
    session_start();
    include("../project9/db.php");

    if($_SERVER["REQUEST_METHOD"] == "POST")
        {
        $name = $_POST['name'];
       $number = $_POST['number']; 
        $email = $_POST['email'];
        $eventdate = $_POST['eventdate'];
        $eventtime = $_POST['eventtime'];
        $bdaypersonname = $_POST['bdaypersonname'];
        $venue = $_POST['venue'];
        $venuetype = $_POST['venuetype'];
        $guestcount = $_POST['guestcount'];
        $menu = $_POST['menu'];
        $menu = implode(",", $menu);

    if(!empty($email) && ($number))
       {
     $query = "INSERT INTO order_request (name,number,email,event_date,event_time,type) VALUES
                 ('$name','$number',' $email','$eventdate','$eventtime','birthday')"; 

        mysqli_query($conn,$query); 
        $last_insert_id = mysqli_insert_id($conn);
            
        $query2 = "INSERT INTO birthday (parent_id,bdayperson_name,venue_place,venue_type,guest_count,menu) VALUES
                  ('$last_insert_id','$bdaypersonname','$venue','$venuetype',' $guestcount','$menu')";
        mysqli_query($conn,$query2);

        echo "Successfully registered";
        }
    else{
        echo "<script type='text/javascript'> alter('please enter valid information')</script>";
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Birthdayorderform</title>
    <link rel="stylesheet" href="style13.css">
</head>
<body>
    <div class="container">
        <h1>Birthday Catering Order Form</h1><br><br>
        <form action="" method="POST">
            <div class="form-group">
                <label for="name">Your Name:</label>
                <input type="text" id="name" name="name" placeholder="Enter Your Name" required><br>
            </div>
            <div class="form-group">
                <label for="name">Contact Number:</label>
                <input type="text" id="number" name="number" placeholder="Enter Your Number" required><br>
            </div>
            <div class="form-group">
                <label for="email">Your Email:</label>
                <input type="email" id="email" name="email"  placeholder="Enter Your Email" required>
            </div>
            <div class="form-group">
                <label for="bname">Birthday person Name:</label>
                <input type="text" id="bname" name="bdaypersonname"  placeholder="Enter bday person name " required><br>
            </div>
            <div class="form-group">
                <label for="eventDate">Event Date:</label>
                <input type="date" id="eventDate" name="eventdate" placeholder="Enter The Event Date" required>
            </div>
            <div class="form-group">
                <label for="eventDate">Event Time:</label>
                <input type="time" id="eventtime" name="eventtime" placeholder="Enter The Event Time" required>
            </div>
            <div class="form-group">
                <label for="eventDate">Venue place:</label>
                <input type="text" id="Venue" name="venue"  placeholder="Enter Venue place" required>
            </div>
            <div class="form-group">
                <label for="Venuetype">Venue Type:</label>
                <select id="Venuetype" name="venuetype" required>
                    <option value="Ballrooms">Ballrooms</option>
                    <option value="Hotels and Resorts">Hotels/Resorts</option>
                    <option value="Banquet Halls">Banquet Halls</option>
                </select>
            </div>
            <div class="form-group">
                <label for="guestCount">Number of Guests:</label>
                <input type="number" id="guestcount" name="guestcount" placeholder="Enter guestcount ex.500" required>
            </div><br><br>

           <div class="form-group">
                    <label for="Customize menu">Customize Menu:</label><br><br><br>
                    <label for="Appetizers">Appetizers</label><br>
                    <label>
                    <input type="checkbox" id="checkbox2" name="menu[]" value="Deep-fried potato" >Deep-fried potato</label><br>
                    <label>
                    <input type="checkbox" id="checkbox3" name="menu[]" value="chaats" >chaats</label><br>

                    <label for="Maincourse">Maincourse</label><br><br>
                    <label>Non-veg Menu:</label><br><br>
                    <label>
                        <input type="checkbox" id="checkbox4" name="menu[]" value="chiken Biriyani" >chiken Biriyani</label><br>
                        <label>
                        <input type="checkbox" id="checkbox5" name="menu[]"  value="mutton biryani" >mutton biryani</label><br>
                        <label>
                        <input type="checkbox" id="checkbox6" name="menu[]" value="chiken/mutton gravery" >chiken/mutton gravery</label><br>
                        <label>veg Menu:</label><br><br><br>
                        <label>
                        <input type="checkbox" id="checkbox7" name="menu[]"   value="Meals combo" >Meals combo</label><br>
                        <label>
                        <input type="checkbox" id="checkbox8" name="menu[]"  value="panner butter masala"  >panner butter masala</label><br>
                        <label>
                        <input type="checkbox" id="checkbox9" name="menu[]"   value="vegitable biriyani" >vegitable biriyani</label><br>
                        <label>
                        <input type="checkbox" id="checkbox10" name="menu[]"  value="channa masala"  >channa masala</label><br>

                        <label>sides:</label><br><br><br>
                        <label>
                        <input type="checkbox" id="checkbox11" name="menu[]" value="raita" >raita</label><br>
                        <label>
                        <input type="checkbox" id="checkbox12" name="menu[]" value="mixed pickles"  >mixed pickles</label><br>
                        <label>
                        <input type="checkbox" id="checkbox13" name="menu[]"  value="green chutney"   >green chutney</label><br>

                        <label>desserts</label><br><br>
                        <label>
                        <input type="checkbox" id="checkbox14" name="menu[]"  value="gulab jamun" >gulab jamun</label><br>
                        <label>
                        <input type="checkbox" id="checkbox15" name="menu[]"  value="rasgulla" >rasgulla</label><br>
                        <label>
                        <input type="checkbox" id="checkbox16" name="menu[]"  value="kheer/jalebi" >kheer/jalebi</label><br>

                        <button type="submit" >Submit</button>

                </div>
</body>
</html>