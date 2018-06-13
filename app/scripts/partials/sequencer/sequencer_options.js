// Sequencer - Options
// Keyboard options
const azerty = document.querySelector('.azerty')
const qwerty = document.querySelector('.qwerty')
let li = document.querySelectorAll("ul.sequencer_keyboard li")
//console.log(li)

azerty.addEventListener('click', ()=>
{                            
  azerty.classList.add('active')
  qwerty.classList.remove('active')
  li[0].innerHTML="a"
  li[0].dataset.letter = 'a'
  li[1].innerHTML="z"
  li[1].dataset.letter = 'z'
  li[10].innerHTML="q"
  li[10].dataset.letter = 'q'
  li[20].innerHTML="w"
  li[20].dataset.letter = 'w'
})

qwerty.addEventListener('click', ()=>
{                            
  qwerty.classList.add('active')
  azerty.classList.remove('active')
  li[0].innerHTML="q"
  li[0].dataset.letter = 'q'
  li[1].innerHTML="w"
  li[1].dataset.letter = 'w'
  li[10].innerHTML="a"
  li[10].dataset.letter = 'a'
  li[20].innerHTML="z";
  li[20].dataset.letter = 'z'
})