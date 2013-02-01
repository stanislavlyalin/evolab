function search_click()
{
  var input = document.getElementById("tag");
  if (input.value != '') {
    if (input.value == 'тег для поиска...') {
      input.value = '';
    }
  }
  input.style.color = 'black';
}
//------------------------------------------------------------------------------

function search_blur()
{
  var input = document.getElementById("tag");
  if (input.value == '') {
    input.value = 'тег для поиска...'
  }
  input.style.color = (input.value == 'тег для поиска...') ? 'gray' : 'black';
}
//------------------------------------------------------------------------------

// функция для Ajax-получения формулировки вопроса
function get_question_text(url, post_id, container) {
  jQuery.ajax({
    url: url,
    data: { post_id: post_id, question: 1 },
    success: function( data, text_status, jqXHR) {
      container.html( data );
    },
    error: function( jqXHR, textStatus, errorThrown ) {
      alert( textStatus );
    }
  });
}
//------------------------------------------------------------------------------

// функция для Ajax-получения ключевых тезисов
function get_key_thesis(url, post_id, container) {
  jQuery.ajax({
    url: url,
    data: { post_id: post_id, thesis: 1 },
    success: function( data, text_status, jqXHR) {
      container.html( data );
    },
    error: function( jqXHR, textStatus, errorThrown ) {
      alert( textStatus );
    }
  });
}
//------------------------------------------------------------------------------