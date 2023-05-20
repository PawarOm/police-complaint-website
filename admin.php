<?php
include 'conn.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="css/admin.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<?php
if($_SESSION["username"]) {
?>
    <nav class="navbar navbar-expand-lg navbar-light"  style="background-color: #e3f2fd;">
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		  <span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNav">
		  <ul class="navbar-nav">
			<li class="nav-item">
			  <a class="nav-link" href="index.html">Home</a>
			</li>
			<li class="nav-item">
			  <a class="nav-link" href="admin_index.php">Login</a>
			</li>
			<li class="nav-item active">
			  <a class="nav-link" href="admin.php">Admin</a>
			</li>
            <li class="nav-item" id="logoutBtn">
			  <a class="nav-link" href="logout.php">Logout</a>
			</li>
		  </ul>
		</div>
	  </nav>
      <!-- Navbar -->   


<div class="container">
    <div class="col-lg-12">
      <br><br>
      <h1 class="text-warning text-center"> Complaints </h1> 
      <br>
      <table id="tabledata" class=" table table-striped table-hover table-bordered">

        <tr class="bg-dark text-white text-center">
          <th> Id </th>
          <th> Name </th>
          <th> Phone No </th>
          <th> Complaint </th>
        </tr>

        <?php
        $q = "select * from ordertable order by CustomerId DESC";
        
        $query = mysqli_query($con, $q);
        
        while ($res = mysqli_fetch_array($query)) {
            ?>
        <tr class="text-center">
          <td>
            <?php echo $res['CustomerId'];  ?>
          </td>
          <td>
            <?php echo $res['custName'];  ?>
          </td>
          <td>
            <?php echo $res['custPhone'];  ?>
          </td>
          <td>
            <?php echo $res['custItems'];  ?>
          </td>
        </tr>

        <?php
        }
        ?>

      </table>

    </div>
  </div>
        <?php
        }else echo "<h1>Please login first .</h1>";
        ?>

<style>
#logoutBtn{
    border: 2px solid grey;
    border-radius: 5px;  
    position: relative;
    left: 1200px;   
}
</style>

</body>
</html>