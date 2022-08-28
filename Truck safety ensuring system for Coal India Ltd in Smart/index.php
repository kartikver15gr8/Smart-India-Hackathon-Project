<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <title>My website</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">SaTurck</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                
                    <ul class="navbar-nav  me-auto mb-2 mb-lg-0 ml-auto">

                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">Logout</a>
                        </li>
                        <li class="nav-item">

                            <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                                    class="bi bi-truck" viewBox="0 0 16 16">
                                    <path
                                        d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                                </svg></button>
                        </li>
                


            </div>
        </div>
    </nav>


    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New Truck Registration</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="Truck number" class="form-label">Truck Number</label>
                            <input type="text" class="form-control" id="Truck Number" name="truck_no"
                                aria-describedby="emailHelp">
                            <div id="emailHelp" class="form-text"></div>
                        </div>
                        <div class="mb-3">
                            <label for="driver name" class="form-label">Driver Name</label>
                            <input type="text" class="form-control" name="driver_name" id="exampleInputPassword1">
                        </div>
                        <div class="mb-3">
                            <label for="Driver phoneno." class="form-label">Driver Contact No.</label>
                            <input type="text" class="form-control" name="d_phoneno." id="exampleInputPassword1">
                        </div>
                        <div class="mb-3">
                            <label for="maximum payload" class="form-label">Maximum payload</label>
                            <input type="text" class="form-control" name="payload" id="exampleInputPassword1">
                        </div>

                        <button type="submit" class="btn btn-primary">Register</button>
                    </form>
                </div>

            </div>
        </div>
    </div>


    <!-- <a href="logout.php">Logout</a> -->
    

    <br>
    Hello, <?php echo $user_data['user_name']; ?>

    <div class="container mt-5 my-4">

        <table class="table " id="myTable">
            <thead>
                <tr>
                    <th scope="col">S.No</th>
                    <th scope="col">Truck No.</th>
                    <th scope="col">Driver Name</th>
                    <th scope="col">Driver phone no.</th>
                    <th scope="col">Maximum Payload</th>
					<th scope="col">Live Payload</th>

                </tr>
            </thead>
            <tbody>

                <!--    showing data -->
                <?php
   
   
  $sql ="SELECT * FROM `truckdetails`";

  $result =mysqli_query($con,$sql);
  $serialno =0;
	while($row = mysqli_fetch_assoc($result))
	{
	  $serialno++;
	  echo " <tr>
	  <th scope='row'>". $serialno. "</th>
	  <td>" . $row['truck_no'] ."</td>
	  <td>" .$row['driver_name']. "</td>
	  <td>" .$row['d_phoneno.']. "</td>
	  <td>" .$row['maximu payload']. "</td>
	  <td>" .$row['live payload']. "</td>
	   <td><a href='#del'>Delete</a>
		<a href='#Edit'>Edit</a></td> 
	</tr>";

	}
	

   ?>



            </tbody>

        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script>
    $(document).ready(function() {
        $('#myTable').DataTable();

    });
    </script>

</body>

</html>