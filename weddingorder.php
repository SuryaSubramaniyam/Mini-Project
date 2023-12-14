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
        $Venue = $_POST['venue'];
        $Venuetype = $_POST['venuetype'];
        $guestcount = $_POST['guestcount'];
        $menuchoice = $_POST['menuchoice'];
        $servicetype = $_POST['servicetype'];
        $additional = $_POST['additional'];
        $additional = implode(",", $additional);
      
    if(!empty($email) && ($number))
        {
            $query = " INSERT INTO  order_request (name,number,email,event_date,event_time,type,status) VALUES
                     ('$name','$number',' $email','$eventdate','$eventtime','wedding','Pending')";

                  mysqli_query($conn,$query); 
                  $last_insert_id = mysqli_insert_id($conn);

            $query1 = "INSERT INTO wedding (parent_id,venue_place,venue_type,guest_count,menu_type,service_type,additional_service) VALUES
                      ('$last_insert_id','$Venue','$Venuetype',' $guestcount','$menuchoice','$servicetype','$additional')";
        mysqli_query($conn,$query1);
            echo "Successfully registered";
        }
    else{
   
        }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wedding Catering Order Form</title>
    <link rel="stylesheet" href="style10.css">
</head>
<body>
    <div class="container">
    <h1>Wedding Catering Order Form</h1><br><br>
        <form action="weddingorder.php" method="POST">
            <div class="form-group">
                <label for="name">Your Name:</label>
                <input type="text" id="name" name="name" placeholder="Enter Your Name" required><br>
            </div>
            <div class="form-group">
                <label for="name">Contact Number:</label>
                <input type="number" id="number" name="number" placeholder="Enter Your Number" required><br>
            </div>
            <div class="form-group">
                <label for="email">Your Email:</label>
                <input type="email" id="email" name="email"  placeholder="Enter Your Email" required>
            </div>
            <div class="form-group">
                <label for="eventDate">Event Date:</label>
                <input type="date" id="eventdate" name="eventdate" placeholder="Enter The Event Date" required>
            </div>
            <div class="form-group">
                <label for="eventTime">Event Time:</label>
                <input type="time" id="eventtime" name="eventtime" placeholder="Enter The Event Time" required>
            </div>
            <div class="form-group">
                <label for="Venueplace">Venue place:</label>
                <input type="text" id="Venue" name="venue" placeholder="Enter Venue place" required>
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
            </div>
            <div class="form-group">
                <label for="menuChoice">Menu Choice:</label>
                <select id="menuChoice" name="menuchoice" required>
                    <option value="standard">Standard Menu</option>
                    <option value="deluxe">Deluxe Menu</option>
                    <option value="premium">Premium Menu</option>
                </select>
            </div>
            <div class="form-groups">
                <label>Service Type:</label><br>
                <input type="radio"  id="Buffet" name="servicetype" value="Buffet service">
                <label for="servicetype">Buffet service</label>
                <input type="radio"  id="Plated" name="servicetype" value="Plated service">
                <label for="servicetype">Plated service</label>
                <input type="radio"  id="Familystyle " name="servicetype" value="Family service service">
                <label for="servicetype">Family Style Service</label>
            </div>
           <div class="form-group">
            <label for="additionalservice">Additionalservice:</label><br>
                <label>
                <input type="checkbox" id="popocorn" name="additional[]" value="popcorn">Popcorn<label><br>
                <label>
                <input type="checkbox" id="icecream" name="additional[]" value="icecream">Ice Cream Stall<label><br>  
                <label>
                <input type="checkbox" id="fruitsalad" name="additional[]" value="fruitsalad">Fruit salad<label><br> 
                <label>
                <input type="checkbox" id="djmusic" name="additional[]" value="djmusic">Dj&Musics<label><br>                 
            </div>
                <button type="submit">Submit Order</button>
        </form>
    </div>
</body>
</html>
