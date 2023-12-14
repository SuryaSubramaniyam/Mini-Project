<?php
      $sql = "SELECT id,firstname,lastname,email,message FROM contact";
      $result = $conn->query($sql);
 
      $numrow = mysqli_num_rows($result);
?>
<style>
   .customers {
      font-family: Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      width: 70%;
      color: black;
      font-weight: bolder;
   }

   .customers td, #customers th {
      border: 1px solid #ddd;
      padding: 8px;
      }

   .customers tr:nth-child(odd){background-color: #ddd;}
   .customers tr:nth-child(even){background-color: grey;}
   .customers tr:nth-child(odd):hover{background-color: green;}
   .customers tr:nth-child(even):hover{background-color: maroon;}

  .customers th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: left;
      background-color: green;
      color: black;
      }
</style>

   <table>
      <?php if($numrow > 0) { ?>
         <table class="customers">
         <tr>
            <th>ID</th>
            <th>FIRST NAME</th>
            <th>LASNT NAME</th>
            <th>EMAIL</th>
            <th>MESSAGE</th>

         </tr>
         <?php while ($row = mysqli_fetch_assoc($result)) { ?>
         <tr>
            <td><?php echo $row['id'] ?></td>
            <td><?php echo $row['firstname'] ?></td>
            <td><?php echo $row['lastname'] ?></td>
            <td><?php echo $row['email'] ?></td>
            <td><?php echo $row['message'] ?></td>

         </tr>
         <?php } ?>
      <?php } else { ?>
         <tr>Records not found!</tr>
      <?php } ?>
   </table>