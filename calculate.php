<html>
    <head></head>
    <body>
        <div id="cal_main" style="position:relative;top:15%;left:10%;right:30%;">
<?php
        date_default_timezone_set('UTC');
        $longSwin= 145.0388;
        $latSwin = -37.8227;
        $long = $_POST["longitude"];
        $lat = $_POST["latitude"];
       if(is_numeric($long)&& is_numeric($lat)){
            $timeStamp =  date('Y-m-d');
            $theta = $longSwin - $long; 
            $dist = sin(deg2rad($latSwin)) * sin(deg2rad($lat)) +  cos(deg2rad($latSwin)) * cos(deg2rad($lat)) * cos(deg2rad($theta)); 
            $dist = acos($dist); 
            $dist = rad2deg($dist); 
            $kilos = $dist * 60 * 1.1515* 1.609344;
            
            echo"The location between the longitude ";
            echo $long;
            echo" and latitude ";
            echo $lat;
            echo "is";
            echo $kilos;
            echo " KM away from Swinburne University";
            echo "<br />calculated at(";
            echo $timeStamp;
            echo")";
            
            //My sql connection
            $con = mysql_connect('localhost', 'root', '');
            if (!$con)
            {
                die('Could not connect: ' . mysql_error());
            }
            else{
            //echo 'Connected successfully<br />';
            $database ="MyDB";
                if(!mysql_select_db($database)){
                    if (mysql_query("CREATE DATABASE MyDB",$con))
                    {// Create database
                        mysql_select_db($database, $con);
                        echo "Database created";
                        $sql = "CREATE TABLE Calculation(
                            Longitude FLOAT NOT NULL,
                            Latitude FLOAT NOT NULL,
                            Distance FLOAT NOT NULL,
                            TimeStamp DATE NOT NULL)";

                        $retval = mysql_query( $sql, $con );
                        if(! $retval )
                        {
                            die('Could not create table: ' . mysql_error());
                        }
                        else{
                        //echo "Table created successfully\n";
                         mysql_query("INSERT INTO Calculation (Longitude, Latitude,Distance, TimeStamp)VALUES ('$long', '$lat','$kilos','$timeStamp')");
                        
                        echo "<br />";
                        //echo "sucessfully insert value to table!!!";
                        }
                    }
                    else
                    {
                        echo"Database not created!";
                    }
              }
              else{
                  $sql_insertData ="INSERT INTO Calculation (Longitude, Latitude,Distance, TimeStamp)VALUES ('$long', '$lat','$kilos','$timeStamp')";
                  mysql_select_db($database, $con);
                  mysql_query("INSERT INTO Calculation (Longitude, Latitude,Distance, TimeStamp)VALUES ('$long', '$lat','$kilos','$timeStamp')");
                  echo "<br />";
                  //echo "sucessfully insert value to table!";
                  
                    if (!mysql_query($sql_insertData,$con))
                    {
                    die('Error: ' . mysql_error());
                    }
                    //echo "1 record added";
              }
              
            }

                }
      else{
           echo"Please make sure all values are in numerical form!Go back and re-enter value!";
      }   
 
?>
       <br />
       <br />
       <br />
       <a href="previous.php">View Previous History</a>
    </div>
</body>
</html>