<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="fillDetailsTeacher.php" method="POST" >
		<table>
			<tr>
				<td><input type="text" name="fname" placeholder="First Name"></td>
				<td><input type="text" name="lname" placeholder="Last Name"></td>
			</tr>
			<tr>
				<td>
					<input  type="text" name="email" placeholder="Email" length="10">
				</td>
			</tr>
			<tr>
				<td>
					<input  type="text" name="mobile_no" placeholder="Contact Number" length="10">
				</td>
			</tr>
			<tr>
				<td><input  type="text" name="username" placeholder="Username" length="10"></td>
			</tr>
			<tr>
				<td><input  type="password" name="password" placeholder="Password"></td>
			</tr>
			<tr>
				<td>
					<input  type="hidden" name="accType" value="Teacher">
				</td>
			</tr>
			<tr><td>Teacher Assignement</td></tr>
			<tr>
				<td>Class Assigned</td>
				<td>
					<input  type="text" name="C_Id" >
				</td>
			</tr>
			<tr>
				<td>Subject Assigned</td>
				<td>
					<input  type="text" name="S_Id" >
				</td>
			</tr>
			<tr>
				<td>
					<input type="submit" value="Register" name="register" >
				</td>
			</tr>
		</table>

	</form>
</body>
</html>
