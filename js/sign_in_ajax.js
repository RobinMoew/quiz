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
      window.location = result;
    },
    error: function(result) {
      console.log(result);
    }
  });
});
