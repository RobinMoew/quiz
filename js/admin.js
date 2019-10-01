$(document).ready(() => {
  let nb_quiz = 0;
  let quiz_name = null;
  $('#add_quiz_name').click(() => {
    nb_quiz++;
    $('#add_quiz_name').hide();
    $('#quizs').append(`
      <label for="quiz${nb_quiz}">Quiz name: </label>
      <input type="text" name="quiz${nb_quiz}" id="quiz${nb_quiz}" class="quiz">
      <input type="button" value="Add quiz" id="add_quiz">
    `);

    $('#add_quiz').click(() => {
      quiz_name = $('#quiz' + nb_quiz).val();
      $.ajax({
        url: '../php/add_quiz.php',
        type: 'POST',
        data: {
          quiz_name: quiz_name
        },
        success: (result) => {
          if (result) {
            console.log(result);
          } else {
            $('#quizs').html(`
            <div>Quiz name added !</div>
          `);
          }
        },
        error: (error) => {
          console.log(error);
        }
      });

      $('.question').append(`
      <div>
        <label>Type: </label>
        <select name="question_type" id="question_type">
          <option selected>MCQ</option>
          <option>Radio</option>
          <option>Response</option>
          <option>Numeric</option>
        </select>
      </div>

      <div id="question_form">
        <label for="question">Question: </label>
        <input type="text" name="question" id="question"><br>
      </div>

      <button id="add_answer">Add an answer</button>
    `);

      let question_type_value = $('#question_type').val();

      $('#question_type').change(() => {
        question_type_value = $('#question_type').val();
      });

      let nb_answer = 0;

      $('#add_answer').click(() => {
        nb_answer++;

        if (question_type_value == 'MCQ') {
          $('#question_form').append(`
            <label>Answer ${nb_answer}</label>
            <input type='text' name='answer${nb_answer}' id='answer${nb_answer}' class='a'><br>
          `);

          if (nb_answer == 4) {
            $('#add_answer').hide();
            $('#question_form').append(`
            <button id="valid">Add question</button>
          `);
          }
        } else if (question_type_value == 'Radio') {
          $('#question_form').append(`
          <label>Answer ${nb_answer}</label>
          <input type='text' name='answer${nb_answer}' id='answer${nb_answer}' class='a'><br>
        `);

          if (nb_answer == 4) {
            $('#add_answer').hide();
            $('#question_form').append(`
            <button id="valid">Add question</button>
          `);
          }
        } else if (question_type_value == 'Response') {
          $('#question_form').append(`
          <label>Answer ${nb_answer}</label>
          <textarea name='answer${nb_answer}' id='answer${nb_answer}' class='a'></textarea><br>
          <button id="valid">Add question</button>
        `);

          $('#add_answer').hide();
        } else if (question_type_value == 'Numeric') {
          $('#question_form').append(`
          <label>Answer ${nb_answer}</label>
          <input type="number" name='answer${nb_answer}' id='answer${nb_answer}' class='a'><br>
          <button id="valid">Add question</button>
        `);

          $('#add_answer').hide();
        }

        $('#valid').click(() => {
          let question = $('#question').val();
          if (question == '') {
            $('#message').html(`
                  <div>Insert a question!</div>
                `);
          } else {
            $.ajax({
              url: '../php/add_question.php',
              type: 'POST',
              data: {
                question: question,
                type: question_type_value,
                quiz_name: quiz_name
              },
              success: (result) => {
                result = JSON.parse(result);
                console.log(result);
              },
              error: (error) => {
                console.log(error);
              }
            });
          }
        });
      });
    });
  });

  /* $('#valid').click(() => {
          let inputs = $('.a');
          let answers = [];

          for (let i = 0; i < inputs.length; i++) {
            if (inputs[i].value == '') {
              $('#message').append(`
                <div>Answer ${i + 1} is empty!</div>
              `);
            } else if (answers.length < inputs.length || answers.length == undefined) {
              answers.push(inputs[i].value);
            } else {
              $.ajax({
                url: 'http://localhost/quiz/php/add_answers.php',
                type: 'POST',
                data: {
                  answers: answers
                },
                success: () => {
                  //window.location.replace('admin.php');
                },
                error: (result) => {
                  console.log(result);
                }
              });
            }
          }
        }); */
});
