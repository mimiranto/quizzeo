<input type="file" name="image" id="image" accept="image/*" onchange="previewImage('image', 'preview')">
  <br>
  <img src="" id="preview" style="max-width: 300px; max-height: 300px;">

  <input type="file" name="image" id="image1" accept="image/*" onchange="previewImage('image1', 'preview1')">
  <br>
  <img src="" id="preview1" style="max-width: 300px; max-height: 300px;">
  
  <script>
    function previewImage(inputId, previewId) {
      var preview = document.getElementById(previewId);
      var fileInput = document.getElementById(inputId);
      var file = fileInput.files[0];
      var reader = new FileReader();

      reader.onload = function(e) {
        preview.src = e.target.result;
      };

      if(file) {
        reader.readAsDataURL(file);
      } else {
        preview.src = "";
      }
    }
  </script>
</body>
</html>