//Blog headers animation//
let listItems = document.querySelectorAll('.test_animate');

let options = {
  rootMargin: '-10%',
  threshold: 0.0
}

let observer = new IntersectionObserver(showH3, options);

function showH3(entries){
  entries.forEach(entry => {
    if(entry.isIntersecting){
      let letters = [...entry.target.querySelectorAll('span')];
      letters.forEach((letter, idx) => {
        setTimeout(() =>{
          letter.classList.add('active_h3');
        }, idx * 10)
      })
      entry.target.children[0].classList.add('active_h3');
    }
  })
}

listItems.forEach(h3 => {

  let newString = '';
  let H3Text = h3.innerText.split('');
  H3Text.map(letter => (newString += letter == ' ' ? `<span class='gap'></span>` : `<span>${letter}</span>`))
  h3.innerHTML = newString;
  observer.observe(h3);
})

let headingItems = document.querySelectorAll('.fancy');

let options_h1 = {
  rootMargin: '0%',
  threshold: 0.0
}

let observer_h1 = new IntersectionObserver(showH1, options_h1);

function showH1(entries){
  entries.forEach(entry => {
    if(entry.isIntersecting){
      let letters_h1 = [...entry.target.querySelectorAll('span')];
      letters_h1.forEach((letter, idx) => {
        setTimeout(() =>{
          letter.classList.add('active_h1');

        }, idx * 10)
      })
      entry.target.children[0].classList.add('active_h1');

    }
  })
}

headingItems.forEach(h1 => {

  let newString = '';
  let H1Text = h1.innerText.split('');
  H1Text.map(letter => (newString += letter == ' ' ? `<span class='gap'></span>` : `<span>${letter}</span>`))
  h1.innerHTML = newString;
  observer_h1.observe(h1);
})

//Spin loader Checkout button //
$(document).ready(function(){
  $('.button_checkout').click(function(){
    $(this).addClass("loader");

    
    })
  })
  

//Dynamic Blog Loader //
let check = document.querySelectorAll("#check");
let elem_img = document.querySelectorAll(".dyn_flex_container_blog img");

for(var i=0; i < elem_img.length; i++){
    if(check[i].attributes[1].nodeValue.length != 12){
      elem_img[i].parentNode.style.display = "";
  } else { 
      elem_img[i].parentNode.style.display = "none";
  }
}


var elem_h3_p = document.querySelectorAll(".dyn_flex_container_blog .blog_h3_p");

for(var i=0; i < elem_h3_p.length; i++){
  if(elem_h3_p[i].firstElementChild.innerText.length + elem_h3_p[i].lastElementChild.innerText.length > 0){
    elem_h3_p[i].style.display = "";
  } else {
    elem_h3_p[i].style.display = "none";
  }
}
