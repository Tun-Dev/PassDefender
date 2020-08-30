
// Get the modal
var modal = document.getElementById("myModal");

//Getting the button that opens then the modal
var openButton = document.getElementById("openButton");

//Getting the button that opens then the modal
var closeBtn = document.getElementById("closeBtn");

// When the user clicks the button, open the modal 
openButton.onclick = function () {
}
openButton.addEventListener("click", () => {
  setTimeout(() => {
    modal.style.display = "flex";
    modal.style.animation = "slide-down .5s ease-in-out 0s 1"
  }, 100);
})


// Function that removes the modal i.e makes the display none

closeBtn.addEventListener("click", () => {
  modal.style.animation = "slide-up .5s ease-in-out 0s 1"
  setTimeout(() => {
    modal.style.display = "none";
  }, 300);
})

// When the user clicks anywhere outside of the modal, close it
