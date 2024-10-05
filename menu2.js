window.addEventListener('scroll', function(){
    var Header = this.document.querySelector('#header')
    Header.classList.toggle('rolar', window.scrollY > 0)
})