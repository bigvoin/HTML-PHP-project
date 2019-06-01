<!DOCTYPE html>
<html>
  <head>
    <style>
      input[type=submit]{
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
          b{
            font-style: italic;
            color: red;
          }
              </style>
          <title>UPDATE</title>
      </head>
<body>
<?php // connect.php allows connection to the database
  require 'connect.php'; //using require will include the connect.php file each time it is called.
  function validation()
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
             if(empty($_POST['genre'])) {
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
             if(strlen($_POST['title']) > 30 ) {
              $check ++;
            $array[$check] = "Book title too long!<br>";
            }
             if(strlen($_POST['genre']) > 10) {
              $check ++;
            $array[$check] =  "No genre submitted!<br>";
            }
             if(strlen($_POST['year']) > 4) {
              $check ++;
            $array[$check] =  "Year is too long!<br>";
            }
             if(strlen((string)$_POST['id']) > 3) {
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
            echo $arrray[$x];
            }
              return false;
          }
}
  if(isset($_POST['id']) &&
    isset($_POST['title']) &&
    isset($_POST['author']) &&
    isset($_POST['genre']) &&
    isset($_POST['year'])
  )
{
    $id = assign_data($conn, 'id');
    $title = assign_data($conn, 'title');
    $author = assign_data($conn, 'author');
    $genre = assign_data($conn, 'genre');
    $year = assign_data($conn, 'year');

    $validation_passed = validation();

       if($validation_passed)
       {
  $sql  = "UPDATE books SET title='$title',author='$author',genre='$genre',year=$year WHERE id=$id";
  $result1 = $conn->query($sql);
  if (!$result1) echo "<br><br>UPDATE failed: $query<br>" .

    $conn->error . "<br><br>";
          }
 }
  echo <<<_END
 <form action="  " method="post">
   <input type="text" name="id" placeholder="Enter id.."><br>
   <label for="fname">Enter new title:</label> <input type="text" name="title"><br>
   <label for="fname">Enter new author:</label><input type="text" name="author"><br>
   <label for="fname">Enter new genre:</label><input type="text" name="genre"><br>
   <label for="fname">Enter new year:</label><input type="text" name="year"><br><br>
   <input type="submit" value="Update book"><br>
  </form>
  <form action="add_and_list.php" method="post">
    <input type="submit" value="VIEW">
  </form>
  <form action="index.php" method="post">
    <input type="submit" value="HOME">
  </form>
_END;
function assign_data($conn, $var)
{
  return $conn->real_escape_string($_POST[$var]);
}
$conn->close()
 ?>
</body>
</html>
