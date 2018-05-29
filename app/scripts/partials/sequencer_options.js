// Sequencer - Options

// menu
const menu = document.querySelector('.menu2');
const menuToggle = document.querySelector('.menu-toggle');
//console.log(menu)
//console.log(menuToggle)
// => 
menuToggle.addEventListener('click', ()=>
{                            
  menu.classList.toggle('active')
})