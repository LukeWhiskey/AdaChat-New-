document.getElementById("AdaH").innerHTML = "AdaChat";
document.getElementById("AdaS").innerHTML = "C h a t F r e e l y ! ! !";
document.onscroll = function () {
    document.getElementById("body").style.backgroundPositionY = document.scrollingElement.scrollTop * 0.2 + "px";
    document.getElementById("body2").style.backgroundPositionY = document.scrollingElement.scrollTop * 0.5 + "px";
}