$('.logbtn').click(() => {
  let username = $('#login').val();
  let password = $('#password').val();

  $.ajax({
    url: 'php/login.php',
    type: 'POST',
    data: {
      username: username,
      password: password
    },
    success: function(result) {
      if (result == 'quiz_menu.html') {
        window.location = result;
      } else {
        alert('Bad username or password !');
      }
    },
    error: function(result) {
      console.log(result);
    }
  });
});
