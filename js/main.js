var fileInput = document.getElementById("file");
var fileStatus = document.querySelector(".file-status");

fileInput.addEventListener('change',function (){
    fileStatus.textContent = this.files[0].name;
})