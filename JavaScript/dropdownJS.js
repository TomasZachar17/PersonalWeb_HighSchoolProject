function dropdown(){
    document.getElementById("dropdown_content").classList.toggle("show")
    document.getElementById("prihlaseny_uzivatel").classList.toggle("show1")
}

window.onclick = function(event) {
    if (!event.target.matches('.dropdown_btn') && 
        !event.target.matches('.dropdown_btn img')) {
      var dropdowns = document.getElementsByClassName("dropdown_content");
      var i;
      for (i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (openDropdown.classList.contains('show')) {
          openDropdown.classList.remove('show');
        }
      }
    }
  }