<?php
    
    $query = "SELECT o.*, w.venue_place as wvenue_place,w.venue_type as wvenue_type,w.guest_count as wguest_count,w.menu_type as
      wmenu_type,w.service_type as wservice_type,w.additional_service as wadd, e.venue_place as evenue_place, e.venue_type as
      evenue_type,e.guest_count as eguest_count,e.menu_type as emenu_type,e.service_type as eservice_type,e.additional_service as 
      eadd FROM order_request o left join wedding w on w.parent_id=o.id left join engagement e on e.parent_id=o.id";
    $result = $conn->query($query);

    $numrow = mysqli_num_rows($result);
    // Fetch all
    // $resultArray = mysqli_fetch_all($result, MYSQLI_ASSOC);
    // echo '<pre>'; print_r($resultArray); exit;
    // Free result set
    //   mysqli_free_result($result);
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
    padding: 5px;
}
.customers tr:nth-child(odd){background-color: #ddd;}
.customers tr:nth-child(even){background-color: grey;}
.customers tr:hover {background-color: maroon;}
.customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: green;
    color: black;
}
 /* SCROLL BAR */
.scroll-container {
    width: 80%;
    height: 800px;
    border: 1px solid #ccc;
}
.scroll-content {
    width: 100%;
    height: 100%;
    overflow-y: scroll;
    padding: 10spx;
}
.scroll-content::-webkit-scrollbar {
    width: 12px;
}
.scroll-content::-webkit-scrollbar-thumb {
    background: #888;
}
.scroll-content::-webkit-scrollbar-thumb:hover {
    background: #555;
}
</style>
<div class="scroll-container">
    <div class="scroll-content">
    <table class="customers">
        <?php if($numrow > 0) { ?>
        <tr>
            <th>id</th>
            <th>name</th>
            <th>number</th>
            <th>email</th>
            <th>event_date</th>
            <th>event_time</th>
            <th>event_type</th>
            <th>Event Statuse</th>
            <th>Venue Place</th>
            <th>Venue Type</th>
            <th>Guest Count</th>
            <th>Menu Type</th>
            <th>Service Type</th>
            <th>Additional Services</th>
            <th>Action</th>
        </tr>
        <?php while ($res = mysqli_fetch_assoc($result)) { ?>
        <tr> 
            <td><?php echo $res['id'] ?></td>
            <td><?php echo $res['name'] ?></td>
            <td><?php echo $res['number'] ?></td>
            <td><?php echo $res['email'] ?></td>
            <td><?php echo $res['event_date'] ?></td>
            <td><?php echo $res['event_time'] ?></td>
            <td><?php echo $res['type'] ?></td>
            <td><?php echo $res['status'] ?></td>
        <?php if($res['type'] == 'wedding') { ?>
            <td><?php echo $res['wvenue_place'] ?></td>
            <td><?php echo $res['wvenue_type'] ?></td>
            <td><?php echo $res['wguest_count'] ?></td>
            <td><?php echo $res['wmenu_type'] ?></td>
            <td><?php echo $res['wservice_type'] ?></td>
            <td><?php echo $res['wadd'] ?></td>
        <?php } else if($res['type'] == 'engagement') { ?>
            <td><?php echo $res['evenue_place'] ?></td>
            <td><?php echo $res['evenue_type'] ?></td>
            <td><?php echo $res['eguest_count'] ?></td>
            <td><?php echo $res['emenu_type'] ?></td>
            <td><?php echo $res['eservice_type'] ?></td>
            <td><?php echo $res['eadd'] ?></td>
            <?php } ?>
        <td>
            <a href="update.php?id=<?php echo $res['id'] ?>&action=Completed">Complete</a>
            <a href="update.php?id=<?php echo $res['id'] ?>&action=Cancelled">Cancel</a>
        </td>
        </tr>
        <?php } ?>
   <?php } else { ?>
      <tr>Records not found!</tr>
   <?php } ?>
</table>
</div>
</div>
    
