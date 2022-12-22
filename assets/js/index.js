// const websiteEl = document.getElementById("website")
// const mobileEl = document.getElementById("Mobile")
// const btnEl = document.getElementById("step-onebtn")
// function toggleOne(){
//   websiteEl.style.borderColor = "green"
//   mobileEl.style.borderColor = "white"
//   btnEl.setAttribute("href", "./websites/stage-two1.html") 
//   console.log(btnEl)
// }
// function toggleTwo(){
//   websiteEl.style.borderColor = "white"
//   mobileEl.style.borderColor = "green"
//   btnEl.setAttribute("href", "./mobile-app/stage-two1.html")
//   console.log(btnEl)
// }
function toggle() {
  document.getElementById("aside").style.display = "flex"
}
function toggleOff() {
  document.getElementById("aside").style.display = "none"
}