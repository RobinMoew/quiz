$('#deco').click(() => {
  $.ajax({
    url: 'php/sign_out.php',
    type: 'GET',
    success: (result) => {
      window.location.replace(result);
    }
  });
});

$.ajax({
  url: 'php/quiz_menu.php',
  type: 'GET',
  success: (result) => {
    result = JSON.parse(result);
    console.log(result);
    if (result.length == 0) {
      window.location.replace('index.html');
    } else {
      $('body').show();
    }

    for (let i = 0; i < result.length; i++) {
      console.log(result[i]);
    }
  }
});
