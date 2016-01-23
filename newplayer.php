<?php
session_start();
?>
<!DOCTYPE html >
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="initial-scale = 1.0, maximum-scale = 1.0, user-scalable = no, width = device-width">
<title>GPL 2015</title>
<link type="text/css" rel="stylesheet" href="stil.css" />
</head>

<body>
<div id="sidan">
<header>
<h1>League system</h1>
</header>
<nav>
<a href="https://cgi.arcada.fi/~tranhung/teams.php">team</a>
<a href="https://cgi.arcada.fi/~tranhung/main.php">main</a>

<a href="https://cgi.arcada.fi/~tranhung/players.php">player</a>

<a href="https://cgi.arcada.fi/~tranhung/games.php">game</a>
<ul>
</ul>
</nav>
<div id="innehall">
<article>
<h2> New Player </h2>
<form method="post" action="saveplayer.php">
<p>Player ID</p><input type="text" name="playerid">
<p>Name</p><input type="text" name="name">
<p>Role</p><select size='1' name='role'><option></option>
<?include('dbaccess.php');
    $mysqli = new mysqli($dbhost,$dbusername,$dbpassword,$dbname);
    $mysqli->set_charset('utf8');
    if ($mysqli->connect_error) {print("<p>Fail: ".$mysqli->connect_error."</p>");} 
    $result = $mysqli->query("SELECT *From Role;"); 
if ($mysqli->error) {print("<p>Fail: ".$mysqli->error."</p>");}
if ($result->num_rows == 0) 
    {
    print("<p>Ingen data.</p>");
    }
else
    {
    while($row = $result->fetch_array())
      {
      print("<option value=$row[role]>".$row['role']."</option>");
      }
    }
$mysqli->close();
?>
<br/></select>
<p>Team</p><select size='1' name='team'><option></option>
<?include('dbaccess.php');
    $mysqli = new mysqli($dbhost,$dbusername,$dbpassword,$dbname);
    $mysqli->set_charset('utf8');
    if ($mysqli->connect_error) {print("<p>Fail: ".$mysqli->connect_error."</p>");} 
    $result = $mysqli->query("SELECT *From Teams;"); 
if ($mysqli->error) {print("<p>Fail: ".$mysqli->error."</p>");}
if ($result->num_rows == 0) 
    {
    print("<p>Ingen data.</p>");
    }
else
    {
    while($row = $result->fetch_array())
      {
      print("<option value=$row[name]>".$row['name']."</option>");
      }
    }
$mysqli->close();
?>

<br/></select>
<input type = "submit" value = "Save" name="save">
</form>
<section>
</section>
</article>
<aside>
</aside>
</div>


</body>

</html>