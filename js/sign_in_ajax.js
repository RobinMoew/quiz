$('.logbtn').click(() => {
  let username = $('#login').val();
  let password = $('#password').val();
  let c_password = $('#c_password').val();

  if (password != c_password) {
    alert("Passwords aren't matching");
  }

  $.ajax({
    url: 'php/sign_in.php',
    type: 'POST',
    data: {
      username: username,
      password: password,
      c_password: c_password
    },
    success: function(result) {
      if (result == 'index.html') {
        window.location = result;
      } else {
        console.log(result);
      }
    },
    error: function(result) {
      console.log(result);
    }
  });
});
