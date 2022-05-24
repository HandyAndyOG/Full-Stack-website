// country dropdown
document.addEventListener('DOMContentLoaded' , () => {

  const selectDrop = document.querySelector('.countries');
  fetch('https://restcountries.com/v3.1/all').then(res => {
    return res.json();
  }).then(data => {
    let output = "<option value='South Africa'>South Africa</option>";
   
    data.forEach(country => {
      data.sort( function( a, b ) {
        return a.name.common < b.name.common ? -1 : a.name.common > b.name.common ? 1 : 0;
    });
      output += `<option value="${country.name.common}">${country.name.common}</option>`;
      selectDrop.innerHTML = output;
    }).catch(err => {
      console.log(err);
    })
  });
});
document.getElementById("countries").selectedIndex = -1;

// Enable/Disable Checkout button //

let input = document.querySelectorAll(".input");
let button = document.querySelector(".button_checkout");

button.setAttribute("disabled", "true"); //setting button state to disabled


for(var i=0; i < input.length; i++){
  input[i].addEventListener("change", stateHandle);
}

function stateHandle() {
  let count = 0;
  for(var i=0; i < input.length; i++)
    if (input[i].value === "") {
      button.setAttribute("disabled", "true"); // button remains disabled
    } else {
        count++;
        if(count === input.length - 1){
          button.removeAttribute("disabled"); // button is re-enabled
          button.style.color = "rgb(221, 131, 110)";
          button.style.background = "white";
          button.style.border = "2px solid rgb(221, 131, 110)";
          console.log("All Fields Filled");
          break;
    }
  }
}
var select = document.getElementById('countries');
const value = select.options[select.selectedIndex].value;
console.log(value);

