document.querySelector('.has_child').addEventListener('click', function(e) {
  if(document.querySelector('.sub_menu').style.display == 'block'){
    document.querySelector('.sub_menu').style.display = 'none';
  }else{
    document.querySelector('.sub_menu').style.display = 'block';
  }
});

document.querySelector('.cancelbtn').addEventListener('click', function(e) {
    document.querySelector('.model-login-regis').style.display = 'none';
});
document.querySelector('.toggle_login').addEventListener('click', function(e) {
    document.querySelector('.model-login-regis').style.display = 'block';
    document.querySelector('.model-login-regis .form-login').style.display = 'block';
    document.querySelector('.model-login-regis .form-reg').style.display = 'none';
});
document.querySelector('.toggle_regis').addEventListener('click', function(e) {
  document.querySelector('.model-login-regis').style.display = 'block';
  document.querySelector('.model-login-regis .form-login').style.display = 'none';
  document.querySelector('.model-login-regis .form-reg').style.display = 'block';
});


document.addEventListener('scroll', function(e) {
  document.querySelector('.sub_menu').style.display = 'none';
});
