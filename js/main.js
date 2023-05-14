var fileInput = document.getElementById("file");
var fileStatus = document.querySelector(".file-status");

fileInput.addEventListener('change',function (){

    for (var i = 0; i < 10; i++) {
        fileStatus.textContent = this.files[i].name;
    }

})