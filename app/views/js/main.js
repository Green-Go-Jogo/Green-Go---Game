const body = document.body;
  var darkButton = document.querySelector('#dark-mode');
  var logoButton = document.querySelector('#logoDarkMode');
  var logoImage = document.querySelector('#logo');

darkButton.addEventListener('click', () => {
  body.classList.toggle('modo-escuro');
  if(darkButton.getAttribute('class') == 'btn btn-darkmode'){
    darkButton.removeAttribute('class');
    darkButton.setAttribute('class', 'btn btn-lightmode');
    logoButton.removeAttribute('class');
    logoButton.setAttribute('class', 'fa-solid fa-sun');
    logoImage.removeAttribute('src');
    logoImage.setAttribute('src', '../../public/logo-rosa.png');
    localStorage.setItem('modo-escuro', 'true');
  }
  else{
    darkButton.removeAttribute('class');
    darkButton.setAttribute('class', 'btn btn-darkmode');
    logoButton.removeAttribute('class');
    logoButton.setAttribute('class', 'fa-solid fa-moon')
    logoImage.removeAttribute('src');
    logoImage.setAttribute('src', '../../public/logo-green.svg');
    localStorage.setItem('modo-escuro', 'false');
  }
});
function carregar_modo(){
  if(localStorage.getItem('modo-escuro') == 'true'){
    body.classList.toggle('modo-escuro');
    darkButton.removeAttribute('class');
    darkButton.setAttribute('class', 'btn btn-lightmode');
    logoButton.removeAttribute('class');
    logoButton.setAttribute('class', 'fa-solid fa-sun')
    logoImage.removeAttribute('src');
    logoImage.setAttribute('src', '../../public/logo-rosa.png');
  }
  else{
    darkButton.removeAttribute('class');
    darkButton.setAttribute('class', 'btn btn-darkmode');
    logoButton.removeAttribute('class');
    logoButton.setAttribute('class', 'fa-solid fa-moon')
    logoImage.removeAttribute('src');
    logoImage.setAttribute('src', '../../public/logo-green.svg');
  }
}