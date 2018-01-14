    <html>
    <head>
    <script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script> 
    </head>
    <body>
    <div id="sample">
      </h4><br />
      <h4>
        Assignment
      </h4>
      <input id="myFile" name="myFile" type="file"/>
      <textarea name="area2" id="area2" style="width: 100%; height: 70%;">
      lorumipsum
      </textarea>
 
      <br/>
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
    </div>
    </body>
    </html>