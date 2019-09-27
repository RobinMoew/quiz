let question_type = $('#question_type');
$(document).ready(() => {
  $('#add_question').click(() => {
    $('.question').html(`
      <form action="" method="post">
        <label for="question">Question: </label>
        <input type="text" name="question" id="question">
      </form>
      <button id="add_answer">Add answer</button>
    `);

    /* if (question_type.val() == 'MCQ') {
      $('#add_question').hide();
      $('.question').append(`
        
      `);
    } else if (question_type.val() == 'Radio') {
    } else if (question_type.val() == 'Response') {
    } else if (question_type.val() == 'Numeric') {
    } */
  });

  let nb_answer = 0;

  $('#add_answer').click(() => {
    nb_answer++;
    $('form').append(`
      <label>Answer ${nb_answer}</label>
      <input type='text' name='answer${}'>
    `);
  });
});
