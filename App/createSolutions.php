<!DOCTYPE html>
<html>
<head>
	<title>Assignments</title>
</head>
<body>
	<form action="fillSolutions.php" method ="POST">
    <fieldset>
      <legend>Solutions</legend>
      <table>
        <tr>
          <td>Class</td>
          <td><input type="text" name ="Class"></td>
        </tr>
        <tr>
          <td>Subject</td>
          <td><input type="text" name="Subject" ></td>
        </tr>
        <tr>
        <tr>
          <td>Assignment-Id</td>
          <td><input type="text" name="AssId" ></td>
        </tr>
        <tr>          
          <td>Upload</td>
          <td><input type="file" name="Solution" ></td>
        </tr>
        <tr>
         <td colspan="2"><input type="submit" value="Submit" name="submit"></td>
        </tr>
      </table>
    </fieldset>
  </form>
</body>
</html>