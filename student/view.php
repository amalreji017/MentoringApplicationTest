<?php
	session_start();
	require_once('../dbconfig/config.php');
	if(!isset($_SESSION['username'])){
    echo "<script>window.location.href='../index.php';</script>";
	}
			    $username=$_SESSION['username'];
			    $query="select * from student where username='$username'";
			    $query_run = mysqli_query($con,$query);
			    if($query_run)
			    {
			        $row=$query_run->fetch_assoc();
				}
				

?>
<!DOCTYPE html>
<html>
<head>
<title>Student</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../css/style.css">
<link rel="stylesheet" href="../css/tailwind.min.css">
</head>
<body class=" bg-blue-400 ">
	<nav class=" flex items-center justify-between flex-wrap bg-white p-6">
		<div class="flex items-center flex-shrink-0 text-blue-600 mr-6 ">
				<span class="font-semibold text-xl tracking-tight"><?php echo $_SESSION['username']; ?>(<?php echo $row['name'];?>)</span>
			</div>
			<div class=" w-full block flex-grow lg:flex lg:items-center lg:w-auto">
				<div class="text-sm lg:flex-grow">
				<a href="view.php" class="block mt-4 lg:inline-block lg:mt-0 text-blue-600 hover:text-blue-200 mr-4">
					Profile
				</a>
				<a href="request_counselor.php" class="block mt-4 lg:inline-block lg:mt-0 text-blue-600 hover:text-blue-200 mr-4">
					Request Counselor
				</a>
				<a href="changepass.php" class="block mt-4 lg:inline-block lg:mt-0 text-blue-600 hover:text-blue-200">
					Change Password
				</a>
				 </div> 
				<div>
				<a href="../logout.php" class="inline-block text-sm px-4 py-2 leading-none border rounded text-blue-600 border-blue-600 hover:border-transparent hover:text-blue-600 hover:bg-blue-200 mt-4 lg:mt-0">Logout</a>
				</div>
			</div>
			</nav>

		<div class=" px-3 py-10 pt-20 bg-blue-400 flex justify-center">
				<div class="lg:flex bg-white shadow-md rounded px-8 pt-8 pb-10 mb-8 " >
                 <div class="flex flex-col w-full xl:w-2/5 justify-center lg:items-start overflow-y-hidden">
					<img src="../imgs/avatar.png" /> 
				</div>
				<div class="w-full xl:w-3/5 py-6 overflow-y-hidden">
					<div class="mb-4">
						<label class="block text-gray-700 text-sm font-bold mb-2" >
							Professional Details:
						</label>
						<p class="text-gray-700 text-base">Admission No: <?php echo $row['username'];?></p>
						<p class="text-gray-700 text-base">Batch: <?php echo $row['start_yr'];?> - <?php echo $row['end_yr'];?></p>
						<p class="text-gray-700 text-base">Department: <?php echo $row['dept'];?></p>
					</div>
					<div class="mb-6">
						<label class="block text-gray-700 text-sm font-bold mb-2" >
							Personal Details:
						</label>
						<p class="text-gray-700 text-base">Name    : <?php echo $row['name'];?></p>
						<p class="text-gray-700 text-base">Email ID: <?php echo $row['email'];?></p>
						<p class="text-gray-700 text-base">DOB     : <?php echo $row['dateofbirth'];?></p>
						<p class="text-gray-700 text-base">AGE     : 
						<?php 
						//age calculations
						 $dob=new DateTime($row['dateofbirth']);
						 $today=date('Y-m-d');
						 $age=$dob -> diff(new DateTime);
						 echo $age->y;
						 ?></p>
                        <p class="text-gray-700 text-base">Gender  : <?php echo $row['gender'];?></p>
						<p class="text-gray-700 text-base">Address : <?php echo $row['address'];?></p>
                        <p class="text-gray-700 text-base">Contact : <?php echo $row['phone_no'];?></p>
						<p class="text-gray-700 text-base">Father  : <?php echo $row['father'];?></p>
						<p class="text-gray-700 text-base">Occupation: <?php echo $row['focc'];?></p>
						<p class="text-gray-700 text-base">Mother  : <?php echo $row['mother'];?></p>
                        <p class="text-gray-700 text-base">Occupation: <?php echo $row['mocc'];?></p>
					</div>
                    <div class="container">
            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" >
			   Academic details
			</label>
			<div class="shadow overflow-hidden rounded border-b border-gray-200">
             <table class="min-w-full bg-white">
              <thead class="bg-gray-800 text-white">
            <tr>
                <th class="w-1/20 text-left py-3 px-4 ">QUALIFICATION</th>
                <th class="w-1/20 text-left py-3 px-4 ">NAME OF SCHOOL & SYLLABUS</th>
                <th class="w-1/20 text-left py-3 px-4 ">TOTAL MARKS</th>
                <th class="w-1/20 text-left py-3 px-4 ">PERCENTAGE</td>
            </tr>
            </thead>
            <tbody class="text-gray-700">
            <tr>
                <td class="w-1/20 text-left py-3 px-4">GRADE X</td>
       			<td class="w-1/20 text-left py-3 px-4"><?php echo $row["school10"];?></td>
        		<td class="w-1/20 text-left py-3 px-4"><?php echo $row["mark10"];?></td>
        		<td class="w-1/20 text-left py-3 px-4"><?php echo $row["perc10"];?></td>
      		</tr>
      		<tr class="bg-gray-100">
        		<td class="w-1/20 text-left py-3 px-4">GRADE XII</td>
        		<td class="w-1/20 text-left py-3 px-4"><?php echo $row["school12"];?></td>
        		<td class="w-1/20 text-left py-3 px-4"><?php echo $row["mark12"];?></td>
        		<td class="w-1/20 text-left py-3 px-4"><?php echo $row["perc12"];?></td>
      		</tr>
      		<tr>
        		<td class="w-1/20 text-left py-3 px-4">Any Other</td>
       		 	<td class="w-1/20 text-left py-3 px-4"><?php echo $row["othername"];?></td>
        		<td class="w-1/20 text-left py-3 px-4"><?php echo $row["othermark"];?></td>
        		<td class="w-1/20 text-left py-3 px-4"><?php echo $row["otherperc"];?></td>
      		</tr>
    		</tbody>
    		</table>
  	  </div>
	</div>
    <div class="md:px-32 py w-full">
            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" >
				Semester wise performance
			</label>
            <div class="shadow overflow-hidden rounded border-b border-gray-200">
            <table class="min-w-full bg-white">
            <thead class="bg-gray-800 text-white">
            <tr>
                <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">SEMESTER</th>
                <th class="text-left py-3 px-4 uppercase font-semibold text-sm">CGPA</th>
                <th class="text-left py-3 px-4 uppercase font-semibold text-sm">NO: OF ARREARS</th>
            </tr>
            </thead>
            <tbody class="text-gray-700">
            <tr>
                <td class="w-1/3 text-left py-3 px-4">SEMESTER 1</td>
       			<td class="text-left py-3 px-4"> <?php echo $row["C1"];?></td>
        		<td class="text-left py-3 px-4"><?php echo $row["A1"];?></td>
      		</tr>
      		<tr class="bg-gray-100">
        		<td class="w-1/3 text-left py-3 px-4">SEMESTER 2</td>
        		<td class="text-left py-3 px-4"><?php echo $row["C2"];?></td>
        		<td class="text-left py-3 px-4"><?php echo $row["A2"];?></td>
      		</tr>
			<tr>
                <td class="w-1/3 text-left py-3 px-4">SEMESTER 3</td>
       			<td class="text-left py-3 px-4"><?php echo $row["C3"];?></td>
        		<td class="text-left py-3 px-4"><?php echo $row["A3"];?></td>
      		</tr>
			<tr class="bg-gray-100">
        		<td class="w-1/3 text-left py-3 px-4">SEMESTER 4</td>
        		<td class="text-left py-3 px-4" ><?php echo $row["C4"];?></td>
        		<td class="text-left py-3 px-4" ><?php echo $row["A4"];?></td>
      		</tr>
			<tr>
                <td class="w-1/3 text-left py-3 px-4">SEMESTER 5</td>
       			<td class="text-left py-3 px-4" ><?php echo $row["C5"];?></td>
        		<td class="text-left py-3 px-4" ><?php echo $row["A5"];?></td>
      		</tr>
			<tr class="bg-gray-100">
        		<td class="w-1/3 text-left py-3 px-4">SEMESTER 6</td>
        		<td class="text-left py-3 px-4" ><?php echo $row["C6"];?></td>
        		<td class="text-left py-3 px-4" ><?php echo $row["A6"];?></td>
      		</tr>
			<tr>
                <td class="w-1/3 text-left py-3 px-4">SEMESTER 7</td>
       			<td class="text-left py-3 px-4"><?php echo $row["C7"];?></td>
        		<td class="text-left py-3 px-4" ><?php echo $row["A7"];?></td>
      		</tr>
			<tr class="bg-gray-100">
        		<td class="w-1/3 text-left py-3 px-4">SEMESTER 8</td>
        		<td class="text-left py-3 px-4"><?php echo $row["C8"];?></td>
        		<td class="text-left py-3 px-4"><?php echo $row["A8"];?></td>
      		</tr>
      		</tbody>
    		</table>
  		</div>
	</div>
                    
					<br>
					<br>
					<div class="flex items-center justify-between">
						<a href="personal_view.php"><button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-2 rounded focus:outline-none focus:shadow-outline" >
							More Details
						</button></a>
						<br>
                    <br>
					<div class="flex items-center justify-between">
						<a href="edit.php"><button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-2 rounded focus:outline-none focus:shadow-outline" >
							Edit Profile
						</button></a>
					</div>
					</div>
				</div>
					
			</div>
		</div>
</body>
</html>