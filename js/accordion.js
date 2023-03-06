var accordion = document.getElementsByClassName('accordion');
//mám viacero akordeonov, potrebujem nimi prejsť
for(a of accordion){
  a.addEventListener("click",function(){
    //this hovorí doslova tomuto, po ktorom práve klikáš daj class active
    this.classList.toggle('active');
  })
}