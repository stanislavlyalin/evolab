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
function get_question_text(post_id, me) {
  
  // загружаем формулировку вопроса из скрытого элемента (только если не пусто)
  var container = jQuery(me).parent().find('~ div.entry');
  var question_content = jQuery(me).parent().find('div#question_content');
  
  // загружаем только в том случае, если формулировка вопроса была сохранена
  if ( question_content.html() != "" ) {
    container.html( question_content.html() );
  }
}
//------------------------------------------------------------------------------

// функция для Ajax-получения ключевых тезисов
function get_key_thesis(post_id, me) {
  
  // сохраняем формулировку вопроса
  var container = jQuery(me).parent().find('~ div.entry');
  var question_content = jQuery(me).parent().find('div#question_content');
  question_content.html( container.html() );
  
  // получаем ключевые тезисы с сервера
  var url = 'http://evo-lab.org/ajax.php';
  jQuery('<img src=\'http://evo-lab.org/wp-content/themes/simply-works-core/loader.gif\'/>').insertAfter(me);
  
  jQuery.ajax({
    url: url,
    data: {'post_id': post_id},
    success: function( data, text_status, jqXHR) {
      jQuery(me).next().remove();
      container.html( data );
    },
    error: function( jqXHR, textStatus, errorThrown ) {
      alert( textStatus );
    }
  });
}
//------------------------------------------------------------------------------