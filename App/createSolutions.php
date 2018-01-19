<!DOCTYPE html>
<html>
<head>
	<title>Assignments</title>
</head>
<body>
	<form action="./create_assignment_file/create_assgn.php" method ="POST">
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
          <td><input type="file" name="myFile" id="myFile"></td>
        </tr>
        <tr>
          <td><textarea name="area2" id="area2" style="width: 100%; height: 70%; visibility: hidden;">
          </textarea></td>
        </tr>
        <tr>
         <td colspan="2"><input type="submit" value="Submit" name="submit"></td>
        </tr>
      </table>
    </fieldset>
  </form>
  <script>
      function loadEditor () { 
        console.log("I  am here");
        nicEditors.allTextAreas(); 
      }
        var control = document.getElementById("myFile");
        
        control.addEventListener("change", function(event){    
         var reader = new FileReader();        
         reader.onload = function(event){
              var contents = event.target.result;   
              console.log(contents);     
              document.getElementById("area2").value = contents;
              nicEditors.findEditor('area2').setContent(contents.toString());  
              //console.log(contents)    
              // loadEditor();   
         };

         reader.onerror = function(event){
             console.error("File could not be read! Code " + event.target.error.code);
         };  
         reader.onloadend = function() {
      console.log(reader.error.message);
      // loadEditor();
    };      
         // console.log("Filename: " + control.files[0].name);
         // loadEditor();
           
        reader.readAsText(control.files[0]);        
     }, false);
      bkLib.onDomLoaded(loadEditor());
      // document.getElementById("nicEdit-main").innerHTML = contents;
      </script>
</body>
</html>