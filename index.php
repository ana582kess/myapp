
<html>
    <body>  
        <div id ="main" style="border: 1px dashed black;">
        <h1 style ="background: blue; color: white; text-indent:12px;">Distance Calculator</h1>
        <h4 style="position: relative; left: 12px;">Please fill in the longitude and latitude of the location that you wish to calculate</h4>
        
        <form action="calculate.php" method="post" style=" position: relative; left: 12px;">
            Longitude: <input type="text" name="longitude" />
            Latitude: <input type="text" name="latitude" />
            
            <input type="submit" name ="Calculate" value="Calculate" />
        </form>
        </div>
    </body>
</html>
    
