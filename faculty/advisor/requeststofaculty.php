<?php
	session_start();
	require_once('../../dbconfig/config.php');
		if(!isset($_SESSION['username'])){
    echo "<script>window.location.href='../../index.php';</script>";
	}
	$username=$_SESSION['username'];
			    $query="select * from faculty where username='$username'";
			    $query_run = mysqli_query($con,$query);
			    if($query_run)
			    {
			        $row=$query_run->fetch_assoc();
                }
                $dept=$row['dept'];
                $batch=$row['batch'];
	//phpinfo();
?>
<!DOCTYPE html>
<html>
<head>

    <title>Advisor</title>
    <link rel="stylesheet" href="../../css/style.css">
    <link href="../../css/tailwind.min.css" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body class=" bg-blue-400 ">
<nav class=" flex items-center justify-between flex-wrap bg-white p-6">
		<div class="flex items-center flex-shrink-0 text-blue-600 mr-6 ">
				<span class="font-semibold text-xl tracking-tight"><?php echo $_SESSION['username']; ?>(<?php echo $row['name'];?>)</span>
		</div>
		<div class=" w-full block flex-grow lg:flex lg:items-center lg:w-auto">
				<div class="text-sm lg:flex-grow">
				<a href="advisor.php" class="block mt-4 lg:inline-block lg:mt-0 text-blue-600 hover:text-blue-200 mr-4">
					Profile
				</a>
				<a href="sadd.php" class="block mt-4 lg:inline-block lg:mt-0 text-blue-600 hover:text-blue-200 mr-4">
					Add Student
				</a>
				<a href="../slist_dept.php" class="block mt-4 lg:inline-block lg:mt-0 text-blue-600 hover:text-blue-200 mr-4">
					Student List(Dept)
				</a>
				<a href="slist_class.php" class="block mt-4 lg:inline-block lg:mt-0 text-blue-600 hover:text-blue-200 mr-4">
					Class List
				</a>
				<a href="requeststofaculty.php" class="block mt-4 lg:inline-block lg:mt-0 text-blue-600 hover:text-blue-200 mr-4">
					Requests
				</a>
				<a href="changepassword.php" class="block mt-4 lg:inline-block lg:mt-0 text-blue-600 hover:text-blue-200 mr-4">
					Change Password
				</a>
				</div>
                <div>
				<a href="../../logout.php" class="inline-block text-sm px-4 py-2 leading-none border rounded text-blue-600 border-blue-600 hover:border-transparent hover:text-blue-600 hover:bg-blue-200 mt-4 lg:mt-0">Logout</a>
				</div>
            </div>
			
		</nav>
        <div class="h-screen pb-14 bg-right bg-cover" ">
			
			<div class="container pt-24 md:pt-48 px-6 mx-auto flex flex-wrap flex-col md:flex-row items-center">
				

        <!--Left Col-->
				<div class="flex flex-col w-full xl:w-2/5 justify-center lg:items-start overflow-y-hidden">
                
		           
                   <div class=" px-3 py-10 pt-20 bg-blue-400 flex justify-center">
				<div class="lg:flex bg-white shadow-md rounded px-8 pt-8 pb-10 mb-8 " >
                Edit Request
		<?php
		    $flag=0;
		    $query="select * from student where dept='$dept' and start_yr='$batch'";
	        $query_run = mysqli_query($con,$query);
		    while($row=$query_run->fetch_assoc() )
		    {
		        if($flag==0)
		        {
		        @$username= $row["username"];
		        
		        if($row["edit"]==1 )
		        {
		            @$username= $row["username"];
		            $flag=1;
		            echo"<br>";
		            echo"<br>";
		            echo"<br>";
		            echo "Username: $username";
		            echo"<br>";
		            $query1="select * from temp_student where username='$username'";
		            $query_run1 = mysqli_query($con,$query1);
		            while($row1=$query_run1->fetch_assoc())
		            {
		                  if( $row["name"] != $row1["name"])
		                  {
		                      @$name=$row1["name"];
		                      echo "Edited name: $name";
		                      echo "<br>";
		                      echo "<br>";
		                  }
		                  if( $row["dateofbirth"]!=$row1["dateofbirth"])
		                  {
		                      @$dob=$row1["dateofbirth"];
		                      echo "Edited dob: $dateofbirth";
		                      echo "<br>";
		                      echo "<br>";
		                  }
		                  if( $row["address"]!=$row1["address"])
		                  {
		                      @$address=$row1["address"];
		                      echo "Edited address: $address";
		                      echo "<br>";
		                      echo "<br>";
		                  }
		                  if( $row["email"]!=$row1["email"])
		                  {
		                      @$email=$row1["email"];
		                      echo "Edited email: $email";
		                      echo "<br>";
		                      echo "<br>";
						  }
						  if( $row["phone_no"]!=$row1["phone_no"])
		                  {
		                      @$phone_no=$row1["phone_no"];
		                      echo "Edited Contact: $phone_no";
		                      echo "<br>";
		                      echo "<br>";
						  }
						  if( $row["father"]!=$row1["father"])
		                  {
		                      @$father=$row1["father"];
		                      echo "Edited Father's Name: $father";
		                      echo "<br>";
		                      echo "<br>";
						  }
						  if( $row["focc"]!=$row1["focc"])
		                  {
		                      @$focc=$row1["focc"];
		                      echo "Edited Father's Occupation: $focc";
		                      echo "<br>";
		                      echo "<br>";
						  }
						  if( $row["mother"]!=$row1["mother"])
		                  {
		                      @$mother=$row1["mother"];
		                      echo "Edited Mother's Name: $mother";
		                      echo "<br>";
		                      echo "<br>";
						  }
						  if( $row["mocc"]!=$row1["mocc"])
		                  {
		                      @$mocc=$row1["mocc"];
		                      echo "Edited Mother's Occupation: $mocc";
		                      echo "<br>";
		                      echo "<br>";
						  }
				
		                  @$name=$row1['name'];
		                  @$dateofbirth=$row1['dateofbirth'];
			           	  @$address=$row1['address'];
						  @$email=$row1['email'];
						  @$phone_no=$row1['phone_no'];
						  @$father=$row1['father'];
						  @$focc=$row1['focc'];
						  @$mother=$row1['mother'];
						  @$mocc=$row1['mocc'];
		            }
		        }
		        }
		    }
		  ?>
		      <form action="requeststofaculty.php" method="post">
			  <button name="confirm" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline float-left" type="submit">Confirm</button></a>
			    </form>

		  
		  <?php
			if(isset($_POST['confirm']))
			{
				
				echo "$username";
	            $query = "update student set $name='$name',$dateofbirth='$dateofbirth',$address='$address',$email='$email',$phone_no='$phone_no',$father='$father',$focc='$focc',$mother='$mother',$mocc='$mocc',edit='0' where username='$username'";
				$query_run= mysqli_query($con,$query);
				if($query_run)
				{
				    $query = "delete from temp_student where username='$username'";
				    $query_run= mysqli_query($con,$query);
					echo '< type="text/javascript">alert("Update success for user")<script>';
				    echo "<script>window.location.href='advisor.php';</script>";
				}
				else
				{
					echo '<p class="bg-danger msg-block">Sorry, request could not be granted!</p>';
				}
			}
			else
			{
			}
		?>
		  </div>
	</div>

				</div>
				
				<!--Right Col-->
				<div class="w-full xl:w-3/5 py-6 overflow-y-hidden">
                                        
                                        <div class=" px-3 py-10 pt-20 bg-blue-400 flex justify-center">
				<div class="lg:flex bg-white shadow-md rounded px-8 pt-8 pb-10 mb-8 " >
                Counselor Request
		<?php
		    $flag=0;
		    $query="select * from request where dept='$dept' and start_yr='$batch'";
	        $query_run = mysqli_query($con,$query);
		    while($row=$query_run->fetch_assoc() )
		    {
		        if($flag==0)
		        {
		        @$username= $row["username"];
		        
		        if($row["approve"]==0 )
		        {
		            @$username= $row["username"];
		            $reason=$row["reason"];
		            $flag=1;
		            echo"<br>";
		            echo"<br>";
		            echo"<br>";
		            echo "Username: $username";
		            echo"<br>";
		            echo "REASON: $reason";
		            echo"<br>";
		            echo"<br>";

		        }
		        }
		    }
		  ?>
		      <form method="post" action="requeststofaculty.php">
		      <input type="hidden" name="user" value="<?php echo $username ?>">
			  <button name="forward" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline float-left" type="submit">Forward</button></a>
			    </form>

		  
		  <?php
			if(isset($_POST['forward']))
			{
				
				$username=$_POST['user'];
	            $query = "update request set approve='1' where username='$username'";
				$query_run= mysqli_query($con,$query);
				if($query_run)
				{
					echo '<script type="text/javascript"> alert(" Successfully Forwarded to HOD")</script>';
				    echo "<script>window.location.href='advisor.php';</script>";
				}
				else
				{
					echo '<p class="bg-danger msg-block">Sorry, request could not be granted!</p>';
				}
			}

		?>
		  
	</div>
		  </div>
	</div>
				</div>
        
        </div>
        </div>
</body>
<html>