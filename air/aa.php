<?php
include "../conn.php";
/*$q=("SELECT ticket_details.date_of_reservation, ticket_details.flight_no, ticket_details.journey_date, ticket_details.class, ticket_details.no_of_passengers, ticket_details.lounge_access, ticket_details.priority_checkin, ticket_details.insurance, ticket_details.payment_id, ticket_details.customer_id, ticket_details.ref, payment_details.payment_amount FROM ticket_details LEFT JOIN payment_details ON payment_details.pnr = ticket_details.pnr WHERE ticket_details.pnr = 1727898 AND payment_details.pnr=1727898");
$sql=mysqli_query($conn,$q);
while ($row = mysqli_fetch_assoc($sql)) {
    echo $row['date_of_reservation'];
    echo $row['flight_no'];
    echo $row['journey_date'];
    echo $row['class'];
    echo $row['no_of_passengers'];
    echo $row['lounge_access'];
    echo $row['priority_checkin'];
    echo $row['insurance'];
    echo $row['payment_id'];
    echo $row['ref'];
    
    echo $row['payment_amount'];
    
    
}
$q1=("SELECT name,age,gender,meal_choice FROM PASSENGERS  WHERE pnr = 7830251");
$sql1=mysqli_query($conn,$q1);
while ($row = mysqli_fetch_assoc($sql1)) {

echo $row['name'];
echo $row['age'];
echo $row['gender'];
echo $row['meal_choice'];




}*/


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table width="100%" border="1">
<tr>
    <th>DATE OF RESERVATION</th>
    <th>FLIGHT NO</th>
    <th>JOURNEY DATE</th>
    <th>CLASS</th>
    <th>NO OF PASSENGERS</th>
    <th>LOUNGE ACCESS</th>
    <th>PRIORITY CHECKIN</th>
    <th>INSURANCE</th>
    <th>PAYMENT ID</th>
    
    <th>REF</th>
    <th>NAME</th>
    <th>AGE</th>
    <th>GENDER</th>
    <th>PASSENGER ID</th>
    <th>MEAL CHOICE</th>
    <th>PAYMENT AMOUNT</th>
    <th>CUSTOMER ID</th>
</tr>
<tbody>
    <tr>
        <?php
    $q=("SELECT ticket_details.date_of_reservation, ticket_details.flight_no, ticket_details.journey_date, ticket_details.class, ticket_details.no_of_passengers, ticket_details.lounge_access, ticket_details.priority_checkin, ticket_details.insurance, ticket_details.payment_id, ticket_details.customer_id, ticket_details.ref,passengers.name,passengers.age,passengers.passenger_id,passengers.gender, passengers.meal_choice, payment_details.payment_amount FROM ticket_details LEFT JOIN passengers ON passengers.pnr = ticket_details.pnr  LEFT JOIN payment_details ON payment_details.pnr = ticket_details.pnr WHERE ticket_details.pnr = 7830251 AND payment_details.pnr=7830251 AND passengers.pnr= 7830251");
$sql=mysqli_query($conn,$q);
while ($row = mysqli_fetch_assoc($sql)) {
    $date_of_reservation= $row['date_of_reservation'];
    $flight_no= $row['flight_no'];
    $journey_date= $row['journey_date'];
    $class= $row['class'];
    $no_of_passengers= $row['no_of_passengers'];
    $lounge_access= $row['lounge_access'];
    $priority_checkin= $row['priority_checkin'];
    $insurance= $row['insurance'];
    $payment_id= $row['payment_id'];
    $ref= $row['ref'];
    $name= $row['name'];
    $age= $row['age'];
    $gender= $row['gender'];
    $pid=$row['passenger_id'];
    $meal_choice= $row['meal_choice'];
    $payment_amount= $row['payment_amount'];
    $cid=$row['customer_id'];

?>
        <td><?php  echo $date_of_reservation ?> </td>
        <td><?php  echo $flight_no ?> </td>
        <td><?php  echo  $journey_date ?> </td>
        <td><?php  echo $class ?> </td>
        <td><?php  echo $no_of_passengers ?></td>
        <td><?php  echo $lounge_access?> </td>
        <td><?php  echo $priority_checkin ?> </td>
        <td><?php  echo $insurance ?> </td>
        <td><?php  echo $payment_id ?> </td>
        
        <td><?php  echo $ref ?> </td>
        <td><?php  echo $name ?> </td>
        <td><?php  echo $age ?> </td>
        <td><?php  echo $gender ?> </td>
        <td><?php  echo $pid ?> </td>
        <td><?php  echo $meal_choice ?> </td>
        <td><?php  echo $payment_amount ?> </td>
        <td><?php  echo $cid ?> </td>
        </tr>
        </tbody>
<?php
}
?>
</table>
</body>
</html>
