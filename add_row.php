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
              width: 30%;
              padding: 12px;
              border: 1px solid #ccc;
              border-radius: 4px;
              resize: vertical;
            }
              label {
                padding: 12px 12px 12px 0;
                display: inline-block;
                font-style: italic;
              }
              p {
                font-style: italic;

              }
              b{
                font-style: italic;
                color:red;
              }
                      </style>
              <title>ADD</title>
        </head>
<body>
<?php // connect.php allows connection to the database

  require 'connect.php'; //using require will include the connect.php file each time it is called.

  /*
	Server side validation function.
	*/
	       function validation_check()
	{

            $check = 0;
            $array = array();

            if(empty($_POST['id']))
            {
              $check ++;
              $array[$check] =  "Please enter id<br>";


            }

            if(empty($_POST['author']))
            {
            $check ++;
            $array[$check] ="No author submitted!<br>";


            }

           if(empty($_POST['title']))
           {
          $check ++;
          $array[$check] =  "No title submitted!<br>";
           }
           if(empty($_POST['genre']))
           {
            $check ++;
            $array[$check] ="No genre submitted!<br>";
           }
           if(empty($_POST['year'])) {
           $check ++;
           $array[$check] = "No year submitted!<br>";
          }
           if(strlen($_POST['author']) > 20 )
          {
            $check ++;
            $array[$check] = "Author name too long!<br>";
          }
          if(strlen($_POST['title']) > 30 )
          {
          $check ++;
          $array[$check] = "Book title too long!<br>";
          }
          if(strlen($_POST['genre']) > 10) {
          $check ++;
          $array[$check] =  "No genre submitted!<br>";
          }
          if(strlen($_POST['year']) > 4)
          {
          $check ++;
          $array[$check] =  "Year is too long!<br>";
          }
          if(strlen((string)$_POST['id']) > 3)
          {
          $check ++;
          $array[$check] =  "id is too long!<br>";
          }
          if(!(is_numeric($_POST['year'])))
          {
          $check ++;
          $array[$check] =  "Year not numeric.
          Please enter in format YYYY<br>";
          }
          if(!(is_numeric($_POST['id'])))
          {
          $check ++;
          $array[$check] =  "id not numeric.<br>";
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

    if (isset($_POST['id'])   &&
        isset($_POST['title']) &&
        isset($_POST['author']) &&
        isset($_POST['genre']) &&
        isset($_POST['year'])
		)


  {
    $id     = assign_data($conn, 'id');
    $title  = assign_data($conn, 'title');
    $author = assign_data($conn, 'author');
    $genre = assign_data($conn, 'genre');
    $year = assign_data($conn, 'year');

    // validation process

     $validation_passed = validation_check();

        if($validation_passed)
        {
          $query    = "INSERT INTO books VALUES ('$id', '$title', '$author','$genre','$year')";

            $result   = $conn->query($query);
            if (!$result) echo "<br><br>Record with this id already exists<br><br><br>";
        }

  }
?>

  <form action="  " method="post">

    <label for="fname">Book id: </label><input type="text" name="id" placeholder="3 digits"> <br>
    <label for="fname">Book title: </label><input type="text" name="title" placeholder="up to 30 characters"> <br>
    <label for="fname">Author name:</label><input type="text" name="author" placeholder="up to 20 characters"> <br>
    <label for="fname">Genre:</label><input type="text" name="genre" placeholder="up to 10 characters"> <br>
    <label for="fname">Year:</label><input type="text" name="year" placeholder="up to 4 digits"> <br></br>
    <input type="submit" value="ADD RECORD">
   </form>
   <form action="add_and_list.php" method="post">
    <input type="submit" value="VIEW"><br>
    </form>
    </form>
    <form action="index.php" method="post">
     <input type="submit" value="HOME">
     </form>
     <br>





<?php
  function assign_data($conn, $var)
  {
    return $conn->real_escape_string($_POST[$var]);
  }
$conn->close();
  ?>
      </body>
        </html>
