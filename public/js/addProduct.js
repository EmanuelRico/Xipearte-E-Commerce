const actualBtn = document.getElementById('formFileMultiple');

const fileChosen = document.getElementById('file-chosen');

actualBtn.addEventListener('change', function(){
  for(i=0; i <= this.files.length ; i++){
    if(i==0){
        fileChosen.textContent = "";
    }
    fileChosen.textContent += this.files[i].name;
    if(i < this.files.length-1){
        fileChosen.textContent += ", ";
    }
  }
})