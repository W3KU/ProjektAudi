const TIME_OUT = 600 
const body = document.querySelector('body')
const sectionsQty = document.querySelectorAll('.section').length

const sectionStick = document.querySelector('.section-stick')
let startFlag = true
let initialScroll = window.scrollY;

let qty = 1, main = null, next = null
Array(sectionsQty)
  .fill()
  .forEach(() => {
   sectionStick.innerHTML = sectionStick.innerHTML + '<div class="stick"></div>'
  })

window.onscroll = () => {
  if (startFlag) {
    const scrollDown = this.scrollY > initialScroll
    const scrollLimit = qty >= 1 && qty <= sectionsQty
    
    if (scrollLimit) {
      body.style.overflowY = 'hidden' 
      if (scrollDown && qty < sectionsQty) {
        main = document.querySelector(`div.s${qty}`)
        next = document.querySelector(`div.s${qty + 1}`)
        main.style.transform = 'translateY(calc(-100vh + 100px))'
        next.style.transform = 'translateY(0)'
        qty++
      } else if (!scrollDown && qty > 1) {
        main = document.querySelector(`div.s${qty - 1}`)
        next = document.querySelector(`div.s${qty}`)
        main.style.transform = 'translateY(0)'
        next.style.transform = 'translateY(calc(100vh - 100px))'
        qty--
      }
       
      const active = document.querySelector('.section-stick .stick.active')
      active.style.top = (15 + 13) * (qty - 1) + 'px'
    }
    
    setTimeout(() => {
      initialScroll = this.scrollY
      startFlag = true
      body.style.overflowY = 'scroll' 
    }, TIME_OUT)
    startFlag = false
  }
  
  window.scroll(0, window.screen.height)
}