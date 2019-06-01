<!DOCTYPE html>
<html>
<head>
<style>
  img{
    width: 100%;

  }
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #2F4F4F;
}

li {
  float: left;
}
body
{
  background-image: url("books.jpg");
  background-color: #cccccc;
}

li form {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li form:hover:not(.active) {
  background-color: #2F4F4F;
}
li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover:not(.active) {
  background-color: #111;
}
.active {
  background-color: #DC143C;
}
input[type=submit]
{
  background-color: #2F4F4F;
  color: white;
  border: none;
  text-decoration: none;
  cursor: pointer;
}
</style>
<title>HOME</title>
</head>
<body>

<ul>
  <li><a class="active" href="#home">Home</a></li>
  <li><form action="add_and_list.php" method="post"><input type="submit" value="VIEW"></form></li>
  <li><form action="add_row.php" method="post"><input type="submit" value="ADD"></form></li>
  <li><form action="update.php" method="post"><input type="submit" value="UPDATE"></form></li>
  <li><form action="delete.php" method="post"><input type="submit" value="DELETE"></form></li>
</ul>


</body>
</html>
