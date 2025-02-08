
  

  function validasiLogin() {
    const errors = [];
    const username = document.getElementById('username');
    const password = document.getElementById('password');
  
    if (username.value.trim() === '') {
      errors.push('Username is required.');
    }
  
    if (password.value.trim() === '') {
      errors.push('Password is required.');
    }
  
    if (errors.length > 0) {
      showPopup(errors);
    } else {
      alert('Login sukses!');
    }
  }


  function validasiRegister() {
    const errors = [];
    const username = document.getElementById('reg-username').value.trim();
    const password = document.getElementById('reg-password').value.trim();
  

    if (username === '') {
      errors.push('Username is required.');
    } else if (username.length < 5) {
      errors.push('Username must be at least 5 characters.');
    }
  

    if (password === '') {
      errors.push('Password is required.');
    } else if (password.length < 8) {
      errors.push('Password must be at least 8 characters.');
    }
  
    if (errors.length > 0) {
      showPopup(errors); 
    } else {
      alert('Registrasi sukses!');
    }
  }


  function showPopup(errors) {
    const errorList = document.getElementById('errorList');
    errorList.innerHTML = '';
  
    if (errors.length > 0) {
      errors.forEach(error => {
        const listItem = document.createElement('li');
        listItem.textContent = error;
        errorList.appendChild(listItem);
      });
  
      const popup = document.getElementById('errorPopup');
      popup.style.visibility = 'visible';
      popup.style.opacity = '1';
    }
  }
  
  function tutupPopup() {
    const popup = document.getElementById('errorPopup');
    popup.style.visibility = 'hidden';
    popup.style.opacity = '0';
  }