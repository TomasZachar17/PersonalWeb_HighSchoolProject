var scrollToOMNEbtn = document.getElementById("button_O_MNE")
var scrollToVYBAVENIEbtn = document.getElementById("button_VYBAVENIE")
var scrollToKONTAKTbtn = document.getElementById("button_KONTAKT")
var scrollToINTRObtn = document.getElementById("INTRObutton")

var scrollToOMNEbtn_dropdown = document.getElementById("button_O_MNE_dropdown")
var scrollToVYBAVENIEbtn_dropdown = document.getElementById("button_VYBAVENIE_dropdown")
var scrollToKONTAKTbtn_dropdown = document.getElementById("button_KONTAKT_dropdown")
var scrollToINTRObtn_dropdown = document.getElementById("INTRObutton_dropdown")

var rootElement = document.documentElement

function scrollToOMNE() {
  var offset = 0;
  if($(document).width() >= 950){
    offset = -120;
  }
  rootElement.scrollTo({
    top: $("#O_MNE_container").offset().top + offset,
    behavior: "smooth"
  })
}

scrollToOMNEbtn.addEventListener("click", scrollToOMNE)
scrollToOMNEbtn_dropdown.addEventListener("click", scrollToOMNE)

function scrollToVYBAVENIE() {
  var offset = 0;
  if($(document).width() >= 950){
    offset = -120;
  }
  rootElement.scrollTo({
    top: $("#VYBAVENIE_container").offset().top + offset,
    behavior: "smooth"
  })
}
scrollToVYBAVENIEbtn.addEventListener("click", scrollToVYBAVENIE)
scrollToVYBAVENIEbtn_dropdown.addEventListener("click", scrollToVYBAVENIE)

function scrollToKONTAKT() {
  var offset = 0;
  if($(document).width() >= 950){
    offset = -120;
  }
  rootElement.scrollTo({
    top: $("#KONTAKT_container").offset().top + offset,
    behavior: "smooth"
  })
}
scrollToKONTAKTbtn.addEventListener("click", scrollToKONTAKT)
scrollToKONTAKTbtn_dropdown.addEventListener("click", scrollToKONTAKT)

function scrollToINTRO() {
  rootElement.scrollTo({
    top: 0,
    behavior: "smooth"
  })
}
scrollToINTRObtn.addEventListener("click", scrollToINTRO)
scrollToINTRObtn_dropdown.addEventListener("click", scrollToINTRO)

//----------------------------------------------------------------

$(document).ready(function() {
  if (window.location.hash != null && window.location.hash != '') 
    rootElement.scrollTo({
      top: 0,
    })
    var offset = 0;
    if($(document).width() >= 950){
    offset = -120;
    }
    rootElement.scrollTo({
      top: $(window.location.hash).offset().top + offset,
      behavior: "smooth"
    })
});