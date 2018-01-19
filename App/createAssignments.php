<!DOCTYPE html>
<html>
<head>
	<title>Assignments</title>
</head>
<body>
	<form action="fillAssignments.php" method ="POST">
    <fieldset>
      <legend>Assignments</legend>
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
          <td>Upload</td>
          <td><input type="file" name="Assignment" ></td>
        </tr>
        <tr>
         <td colspan="2"><input type="submit" value="SubmiT" name="submit"></td>
        </tr>
      </table>
    </fieldset>
  </form>
  <div>
  To create an assignment click below:
  <a href="/Editor/NicEdit.html" >Create Assignemnt</a>
  </div>
</body>
</html>