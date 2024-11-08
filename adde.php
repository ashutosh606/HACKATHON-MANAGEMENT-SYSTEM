<?php

include("admin_header.php");
?>
<html><head><style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: center;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
input[type=text], select {
  width: 70%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 30%;
  background-color: #4CAF50;
  color: white;
  padding: 10px 50px;
  margin: 8px 10;
  border: none;
  border-radius: 4px ;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

div {
  border-radius: 100px 100px;
  background-color: #f2f2f2;
  padding: 0px 400px;
}

</style></head>

<br>
<body>
       <center><h1>ADD BROAD AREA</h1>
   <form action="adde.php" method="post">
   
     
	  <select name="event_type">
	  
    <option>HACKATHON</option>
	
	
	</select><br /><br />
	
	   
	   <input type="text" name="events" placeholder="BROAD AREA (in capital letters)" required ><br /><br />
	   <input type="text" name="code" placeholder="EVENT CODE(in capital letters)" required><br /><br />
       
       
	   <input type="submit" name="submit" value="ADD" ><br><br></form>
 
						
					
                        <table>
						
						<thead>
							<tr>
							    <th>EVENT </th>
								<th>BROAD AREA</th>
								<th>CODE</th>
								
								</tr>
						</thead>
						
<?php
        include("db_conection.php");
        $view_data="select * from event_master";//select query for viewing users.
        $run=mysqli_query($link,$view_data);//here run the sql query.

        while($row=mysqli_fetch_array($run))//while look to fetch the result and store in a array $row.
        {
			$event_type=$row[0];
            $events=$row[1];	
            $code=$row[2];
			
            
        ?>
							<tr>
							<!--here showing results in the table -->
								<td><?php echo $event_type;  ?></t>
								<td><?php echo $events;  ?></td>
								<td><?php echo $code;  ?></td>
								
							</tr>

        <?php } ?>


					</table><br>
<form action='deletee.php' method='post'>	
<input type='submit' name='submit1'	value='REMOVE EVENT'>	</form>		
						<body> <br></html>
<?php
include("db_conection.php");
if(isset($_POST['submit']))
{
$event_type = mysqli_real_escape_string($link, $_POST['event_type']);
$events = mysqli_real_escape_string($link, $_POST['events']);
$code = mysqli_real_escape_string($link, $_POST['code']);

	
$sql = "INSERT INTO event_master (event_type,events,code) VALUES ('$event_type','$events','$code')";
   mysqli_query($link,$sql) ;
   echo "$events"; 
  print ' is added';

}

     ?>
<?php
include("user_footer.php");
?>
<br><br>

   