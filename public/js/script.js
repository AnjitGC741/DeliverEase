function topic()
{
  const elements = ["Feeling Hungry?", "Cooking Went Wrong", "Lazy To Cook!","Food at your fingertips"];
  var value = Math.random() * 3;
  var index= Math.floor(value);
  document.getElementById("topic").innerHTML=elements[index];
 }
 function toggleMenu(){
  let subMenu = document.getElementById("subMenu");
  subMenu.classList.toggle("open-menu");
 }