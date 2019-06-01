<html>
<head>
  <meta charset="utf-8">
  <style type="text/css">
    table {
      border-collapse: collapse;
      width: 100%;
    }
    th, td {
    text-align: left;
    padding: 8px;
  }
  input[type=submit]{
    background-color: #DC143C;
    border: none;
    color: white;
    padding: 16px 32px;
    text-decoration: none;
    margin: 4px 2px;
    cursor: pointer;
  }
  body
  {
    background-image: url("books.jpg");
    background-color: #cccccc;
  }
  tr:nth-child(even){background-color: #f2f2f2}
  th
  {
    background-color: #DC143C;
    color: white;
  }
  td
  {
    background-color: white;
  }
  </style>
  <title>VIEW</title>
</head>
<body>
<?php // connect.php allows connection to the database

  require 'connect.php'; //using require will include the connect.php file each time it is called.

  $query  = "SELECT * FROM books";
  $result = $conn->query($query);
  if (!$result) die ("Database access failed: " . $conn->error);

  $rows = $result->num_rows;
 ?>
      <table>
        <tr>
          <th>Book id</th>
          <th>Title</th>
          <th>Author</th>
          <th>Genre</th>
          <th>Year</th>
        </tr>
    <?php
      if($result->num_rows>0)
      {
        while($row = $result->fetch_assoc())
        {
          echo "<tr>";
          echo "<td>".$row["id"]."</td>";
          echo "<td>".$row["title"]."</td>";
          echo "<td>".$row["author"]."</td>";
          echo "<td>".$row["genre"]."</td>";
          echo "<td>".$row["year"]."</td>";
          echo "</tr>";
        }
      }
      else
      {
        echo "0 results";
      }
      echo <<<_END
     <form action="index.php" method="post">
       <input type="submit" value="HOME"><br><br>
      </form>
_END;
  function assign_data($conn, $var)
    {
      return $conn->real_escape_string($_POST[$var]);
    }
?>
    </table>
      </body>
          </html>
