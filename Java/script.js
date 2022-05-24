$(window).scroll(function(){
  $('.scroll').toggleClass('scrolled', $(this).scrollTop() > 600);
});
$(window).scroll(function(){
  $('.scrollMB').toggleClass('scrolledMB', $(this).scrollTop() > 10);
});

$(window).scroll(function(){
  $('.scrollEngage').toggleClass('scrolledEngage', $(this).scrollTop() > 400);
});

$(window).scroll(function(){
  $('.scrollLoose').toggleClass('scrolledLoose', $(this).scrollTop() > 300);
});



function cart() {
        location.href = "cart.php";
    };

/* btn to coming soon */

const alt_text = document.getElementById('coming-soon');
alt_text.addEventListener("mouseover", function() {
    this.innerHTML = "Coming Soon"
});
alt_text.addEventListener("mouseout", function() {
    this.innerHTML = "Log In"
});
const alt_text2 = document.getElementById('coming-soon2');
alt_text2.addEventListener("mouseover", function() {
    this.innerHTML = "Coming Soon";
});
alt_text2.addEventListener("mouseout", function() {
    this.innerHTML = "Sign Up";
});


/* Toggle mobile menu */

const menu = document.querySelector('.menu');
const toggle = document.querySelector('.toggle');
const cart_icon = document.getElementById('mybutton');


function toggleMenu() {
    if (menu.classList.contains("active")) {
        menu.classList.remove("active");

        // adds the menu (hamburger) icon
        toggle.querySelector("a").innerHTML = "<i class='fas fa-bars'></i>"
        toggle.querySelector("i").style.color = ""
        cart_icon.querySelector("i").style.color = ""
        document.querySelector(".scrollMB").style.backgroundColor = "";
        var x = document.querySelectorAll(".menu a");
        var i;
        for (i = 0; i < x.length; i++) {
          x[i].style.color = "";
        }
        document.querySelector(".menu").style.height = "";
        document.body.style.overflow = "";
        document.body.style.height = "";

    } else {
        menu.classList.add("active");

        // adds the close (x) icon
        toggle.querySelector("a").innerHTML = "<i class='fas fa-times'></i>";
        toggle.querySelector("i").style.color = "white"
        cart_icon.querySelector("i").style.color = "white"
        document.querySelector(".scrollMB").style.backgroundColor = "rgb(225, 147, 132)";
        var x = document.querySelectorAll(".menu a");
        var i;
        for (i = 0; i < x.length; i++) {
          x[i].style.color = "white";
        }
        document.querySelector(".menu").style.height = "100vh";
        document.body.style.overflow = "hidden";
        document.body.style.height = "100vh";
    }
}

/* Event Listener */

toggle.addEventListener("click", toggleMenu, false);

const items = document.querySelectorAll(".item");

function toggleItem() {
  if (this.classList.contains("submenu-active")) {
    this.classList.remove("submenu-active");
  } else if (menu.querySelector(".submenu-active")) {
    menu.querySelector(".submenu-active").classList.remove("submenu-active");
    this.classList.add("submenu-active");
  } else {
    this.classList.add("submenu-active");
  }
}


for (let item of items) {
    if (item.querySelector(".submenu")) {
      item.addEventListener("click", toggleItem, false);
      item.addEventListener("keypress", toggleItem, false);
    }
}

function closeSubmenu(e) {
  let isClickInside = menu.contains(e.target);

  if (!isClickInside && menu.querySelector(".submenu-active")) {
    menu.querySelector(".submenu-active").classList.remove("submenu-active");
  }
}

document.addEventListener("click", closeSubmenu, false);

var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length} ;
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
}


const COLOR_BTNS = document.querySelectorAll('.color');
COLOR_BTNS.forEach(color => {
    color.addEventListener('click', () => {
        let colorNameClass = color.className;
        if(!color.classList.contains('active-color')){
            let colorName = colorNameClass.slice(colorNameClass.indexOf('-') + 1, colorNameClass.length);
            resetActiveBtns();
            color.classList.add('active-color');
            setNewColor(colorName)
            document.getElementById("ring_colour").textContent = colorName;
        }
    });
})

// resetting all color btns
function resetActiveBtns(){
    COLOR_BTNS.forEach(color => {
        color.classList.remove('active-color');
    });
}
const SHAPE_BTNS = document.querySelectorAll('.shape');
SHAPE_BTNS.forEach(shape => {
    shape.addEventListener('click', () => {
        let shapeNameClass = shape.className;
        if(!shape.classList.contains('active-shape')){
            let shapeName = shapeNameClass.slice(shapeNameClass.indexOf('-') + 1, shapeNameClass.length);
            resetActiveBtnsShape();
            shape.classList.add('active-shape');
            setNewShape(shapeName)
            document.getElementById("ring_shape").textContent = shapeName;
        }
    });
})

// resetting all shape btns
function resetActiveBtnsShape(){
  SHAPE_BTNS.forEach(shape => {
      shape.classList.remove('active-shape');
  });
}

// resetting all band btns
function resetActiveBtnsBand(){
    BAND_BTNS.forEach(band => {
        band.classList.remove('active-band');
    });
}
const BAND_BTNS = document.querySelectorAll('.band');
BAND_BTNS.forEach(band => {
    band.addEventListener('click', () => {
        let bandNameClass = band.className;
        if(!band.classList.contains('active-band')){
            let bandName = bandNameClass.slice(bandNameClass.indexOf('-') + 1, bandNameClass.length);
            resetActiveBtnsBand();
            band.classList.add('active-band');
            setNewBand(bandName)
            console.log(setNewBand);
            document.getElementById("ring_band").textContent = bandName;
        }
    });
})





// set new color on the banner right 
function setNewColor(color){
    var diamond_shape = document.getElementById("ring_shape").innerHTML;
    var ring_band = document.getElementById("ring_band").innerHTML;
    document.querySelector('.front img').src = `images/ring_product/${ring_type}${color}FRNT${diamond_shape}${ring_band}.webp`;
    document.querySelector('.side img').src = `images/ring_product/${ring_type}${color}SIDE${diamond_shape}${ring_band}.webp`;
    document.querySelector('.persp img').src = `images/ring_product/${ring_type}${color}ISO${diamond_shape}${ring_band}.webp`;
    document.querySelector('.gold_color td').innerHTML = `${color}`;
}

function setNewShape(shape){
  var colour = document.getElementById("ring_colour").innerHTML;
  var ring_band2 = document.getElementById("ring_band").innerHTML;
  document.querySelector('.front img').src = `images/ring_product/${ring_type}${colour}FRNT${shape}${ring_band2}.webp`;
  document.querySelector('.side img').src = `images/ring_product/${ring_type}${colour}SIDE${shape}${ring_band2}.webp`;
  document.querySelector('.persp img').src = `images/ring_product/${ring_type}${colour}ISO${shape}${ring_band2}.webp`;
}

function setNewBand(band){
  var colour2= document.getElementById("ring_colour").innerHTML;
  var diamond_shape2 = document.getElementById("ring_shape").innerHTML;
  document.querySelector('.front img').src = `images/ring_product/${ring_type}${colour2}FRNT${diamond_shape2}${band}.webp`;
  document.querySelector('.side img').src = `images/ring_product/${ring_type}${colour2}SIDE${diamond_shape2}${band}.webp`;
  document.querySelector('.persp img').src = `images/ring_product/${ring_type}${colour2}ISO${diamond_shape2}${band}.webp`;
}

var ring_type = document.getElementById("ring").innerText;


document.addEventListener('DOMContentLoaded' , () => {
    let ring_lily = "Lily";
    let ring_olivia = "Olivia";
    let ring_ramon = "Ramon";
    const shape_group = document.querySelector('.shape-groups');
    const dyn_container = document.querySelector('.dyn_flex_container');
    const cus_to_prin = document.querySelector('.shape-CUS');
    const change = document.querySelector('.change');
    if (ring_type.includes(ring_lily)) {
      shape_group.querySelector('.shape-OVL').style.display = "none";
      shape_group.querySelector('.shape-CUS').style.display = "none";
    } else {
      console.log("all shapes needed");
    } 
    if (ring_type.includes(ring_olivia)){
      cus_to_prin.querySelector('img').src = "/images/shape/Princess -01.png";
      if (change.classList.contains('shape-CUS')) {
        change.classList.remove('shape-CUS');
        change.classList.add('shape-PRIN');
      } else {
        console.log("it is not seeing PRIN");
      }
    }
    else {
      console.log("replace png not working");
    }
    if (ring_type.includes(ring_ramon)) {
      dyn_container.querySelector('.band-content').style.display = "inline";
    } else {
      dyn_container.querySelector('.band-content').style.display = "none";
      console.log("single bands");
    } 
});



