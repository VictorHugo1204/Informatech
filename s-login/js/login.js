let login = document.querySelector('.login');
let cadastro = document.querySelector('.cadastro');
let container = document.querySelector('.container');

login.onclick = function(){
    container.classList.remove('loginForm');
}

cadastro.onclick = function(){
    container.classList.add('loginForm');
}

const mostrarSenhaCheckbox = document.getElementById('mostrar-senha');
  const senhaInput = document.getElementById('senha');
  
  mostrarSenhaCheckbox.addEventListener('change', function() {
    if (mostrarSenhaCheckbox.checked) {
      senhaInput.type = 'text';
    } else {
      senhaInput.type = 'password';
    }
  });