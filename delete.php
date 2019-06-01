<!DOCTYPE html>
<html>
  <head>
    <style>
      input[type=submit]
      {
      background-color: #DC143C;
      border: none;
      color: white;
      padding: 16px 32px;
      text-decoration: none;
      margin: 4px 2px;
      cursor: pointer;
      width: 100%;
      }
        body
        {
          background-image: url("book.jpg");
          background-color: #cccccc;
        }
        input[type=text] {
          width: 100%;
          padding: 12px;
          border: 1px solid #ccc;
          border-radius: 4px;
          resize: vertical;
        }
        b{
          color:red;
          font-style: italic;
        }
            </style>
          <title>DELETE</title>
        </head>
<body>

<?php // connect.php allows connection to the database
  require 'connect.php'; //using require will include the connect.php file each time it is called.


function validation_check()
	 {
            $check = 0;
            $array = array();
            if(empty($_POST['id']))
            {
              $check ++;
              $array[$check] =  "Please enter id<br>";
            }
              if(strlen((string)$_POST['id']) > 3) {
              $check ++;
              $array[$check] =  "Id is too long!<br>";
            }
              if(!(is_numeric($_POST['id'])))
            {
              $check ++;
              $array[$check] =  "id not numeric.<</b>";
            }
            if($check == 0)
            {
              return true;
            }
            else
            {
              for($x = 1; $x <= $check; $x++)
              {
              echo $array[$x];
              }
                return false;
            }

      }

  if(isset($_POST['id']) )
{
    $id = assign_data($conn, 'id');
    $validation_passed = validation_check();

 	    if($validation_passed)
 	    {
        $sql  = "DELETE FROM books WHERE id=$id";
        $result = $conn->query($sql);
        if (!$result) echo "<br><br>DELETE failed: $query<br>" .

          $conn->error . "<br><br>";

 	    }
 }
  ?>
 <form action="  " method="post">
   Delete row from your library<input type="text" name="id" placeholder="Enter id.."><br><br><br><br>
   <input type="submit" value="DELETE RECORD">
  </form>
  <form action="add_and_list.php" method="post">
    <input type="submit" value="VIEW">
  </form>
  <form action="index.php" method="post">
    <input type="submit" value="HOME">
  </form>

<?php
function assign_data($conn, $var)
{
  return $conn->real_escape_string($_POST[$var]);
}
$conn->close()
 ?>

        </body>
    </html>
