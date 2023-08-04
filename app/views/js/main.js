const body = document.body;
  var darkButton = document.querySelector('#dark-mode');

darkButton.addEventListener('click', () => {
  console.log("aaaaaaa");
  body.classList.toggle('modo-escuro');
  if(darkButton.getAttribute('class') == 'btn btn-darkmode-light'){
    darkButton.removeAttribute('class');
    darkButton.setAttribute('class', 'btn btn-light');
    darkButton.style.color = 'black';
    localStorage.setItem('modo-escuro', 'true');
  }
  else{
    darkButton.removeAttribute('class');
    darkButton.setAttribute('class', 'btn btn-darkmode-light');
    darkButton.style.color = 'white';
    localStorage.setItem('modo-escuro', 'false');
  }
});
function carregar_modo(){
  if(localStorage.getItem('modo-escuro') == 'true'){
    body.classList.toggle('modo-escuro');
    darkButton.removeAttribute('class');
    darkButton.setAttribute('class', 'btn btn-light');
    darkButton.style.color = 'black';
  }
  else{
    darkButton.removeAttribute('class');
    darkButton.setAttribute('class', 'btn btn-darkmode-light');
    darkButton.style.color = 'white';
  }
}