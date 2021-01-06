document.querySelector('.has_child').addEventListener('click', function(e) {
    if(document.querySelector('.sub_menu').style.display == 'block'){
      document.querySelector('.sub_menu').style.display = 'none';
    }else{
      document.querySelector('.sub_menu').style.display = 'block';
    }
  });

document.addEventListener('scroll', function(e) {
  document.querySelector('.sub_menu').style.display = 'none';
});