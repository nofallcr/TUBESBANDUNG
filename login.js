document.getElementById('signupBtn').addEventListener('click', function() {
    this.classList.add('active');
    document.getElementById('loginBtn').classList.remove('active');
    document.getElementById('formTitle').textContent = 'Sign Up';
    document.getElementById('nameField').style.display = 'flex';
    document.querySelector('.submit-btn').textContent = 'Register';
  });
  
  document.getElementById('loginBtn').addEventListener('click', function() {
    this.classList.add('active');
    document.getElementById('signupBtn').classList.remove('active');
    document.getElementById('formTitle').textContent = 'Login';
    document.getElementById('nameField').style.display = 'none';
    document.querySelector('.submit-btn').textContent = 'Login';
  });
  
document.querySelector('.toggle-pass').addEventListener('click', function () {

  const passwordInput = this.previousElementSibling; 

  if (passwordInput.type === "password") {
    passwordInput.type = "text";   
    this.textContent = "🙈";       
  } else {
    passwordInput.type = "password"; 
    this.textContent = "👁️";        
  }
});
