<!DOCTYPE html>  
 <html>  
      <head>  
           <title>Webslesson Tutorial | Convert Data from Mysql to JSON Format using PHP</title>  
      </head>  
      <body>  
           <?php   
           $connect = mysqli_connect("localhost", "root", "", "blackcoffer");  
           $sql = "SELECT * FROM blackcoffer_tbl";  
           $result = mysqli_query($connect, $sql);  
           
           while($row = mysqli_fetch_assoc($result))  
           { $json_array = array( );
                $json_array[] = $row;  
                echo '<pre>'; 
                
                echo json_encode($json_array); 
                
                echo '</pre>';
           }  
           /*echo '<pre>';  
           print_r(json_encode($json_array));  
           echo '</pre>';*/  
            
           ?>  
      </body>  
 </html>  