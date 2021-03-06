
$(function () {   
      var fileUpload = document.getElementById("mediaDirectory");
      if(fileUpload){
      fileUpload.onchange = function () {
          if (typeof (FileReader) != "undefined") {
              var dvPreview = document.getElementById("dvPreview");
              dvPreview.innerHTML = "";
              var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.gif|.png|.bmp)$/;
              for (var i = 0; i < fileUpload.files.length; i++) {
                  var file = fileUpload.files[i];
                  if (regex.test(file.name.toLowerCase())) {
                      var reader = new FileReader();
                      reader.onload = function (e) {
                          var img = document.createElement("IMG");
                          img.height = "255";
                          img.width = "255";
                          img.style.borderRadius = "8px";
                          img.style.margin = "30px";
                          img.src = e.target.result;
                          dvPreview.appendChild(img);
                      }
                      reader.readAsDataURL(file);
                  } else {
                      alert(file.name + " is not a valid image file.");
                      dvPreview.innerHTML = "";
                      return false;
                  }
              }
          } else {
              alert("This browser does not support HTML5 FileReader.");
          }
      }
     }
  });
