<?php  
 $message = '';  
 $error = '';  
 if(isset($_POST["submit"]))  
 {  
      if(empty($_POST["catimgurl1"]))  
      {  
           $error = "<label class='text-danger'>cat url1</label>";  
      }  
      else if(empty($_POST["catlink1"]))  
      {  
           $error = "<label class='text-danger'>Category link1</label>";  
      }  
      else if(empty($_POST["catname1"]))  
      {  
           $error = "<label class='text-danger'>cat name1</label>";  
      }
      else if(empty($_POST["catup1"]))  
      {  
           $error = "<label class='text-danger'>Category up1</label>";  
      }
      else  
      {  
           if(file_exists('football.json'))  
           {  
                $current_data = file_get_contents('football.json');  
                $array_data = json_decode($current_data, true);  
                $extra = array(  
                     'catimgurl1'               =>     $_POST['catimgurl1'],  
                     'catlink1'          =>     $_POST["catlink1"],
                     'catname1'               =>     $_POST['catname1'],  
                     'catup1'          =>     $_POST["catup1"]
                );  
                $array_data[] = $extra;  
                $final_data = json_encode($array_data);  
                if(file_put_contents('football.json', $final_data))  
                {  
                     $message = "<label class='text-success'>Added Successfully</p>";  
                }  
           }  
           else  
           {  
                $error = 'JSON File not exits';  
           }  
      }  
 }  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Add Data to JSON File using PHP</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head>  
      <body>  
           <br />  
           <div class="container" style="width:500px;">  
                <h3 align="center" style="background:green;border-radius:4px;padding:4px;color:white;">api.commondp.com - football</h3><br />                 
                <form method="post">  
                     <?php   
                     if(isset($error))  
                     {  
                          echo $error;  
                     }  
                     ?>  
<br />

<?php
echo "Today is " . date("Y-m-d") . "<br>";
?>


                       

                     <label>football Image</label>  
                     <input type="text" name="catimgurl1" class="form-control" /><br />  
                     <label>football Link</label>  
                     <input type="text" name="catlink1" class="form-control" /><br />  
                     <label>football Name</label>  
                     <input type="text" name="catname1" class="form-control" /><br />
                     <label>Update New.png or Old.png</label>  
                     <input type="text" name="catup1" class="form-control" /><br />
                     <input type="submit" name="submit" value="Submit" class="btn btn-info" /><br />                      
                     <?php  
                     if(isset($message))  
                     {  
                          echo $message;  
                     }  
                     ?>  
                </form>  
           </div>  
           <br />  
      </body>  
 </html>  