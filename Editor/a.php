<html>
<body>
<div>
<textarea id="recipients" name="recipients" class="form-control"></textarea>
<input name="file" type="file" id="files" class="form-control" value=""> 
<a id="fetch_number" class="btn btn-primary btn-sm" href="">pull text file</a>
</div>
<script type="text/javascript">
$(document).ready(function() {
   $('#fetch_number').on('click', function() {
      var files = document.getElementById('files').files;
      if (!files.length) {
         alert('Please select a file!');
         return;
      }   

         var text_file = document.getElementById('files');
         var files = text_file.files;

         var file = files[0];
         var extension = file.name.split('.').pop();
         var start = 0;
         var stop = file.size - 1;

         var reader = new FileReader();
         reader.onload = function(e){
                var output = e.target.result;
                output = output.split("/\r\n|\n/");
                var string = '';
                for (var i=0; i < output.length; i++) {
                   var data = allTextLines[i].split(',');
                   string = data[1] + ',';
                }   

               return string;

              $("#recipients").text(string);
         };
 });
});      	
</script>
</body>
</html>
