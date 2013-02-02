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

// получение заданной информации из поста обсуждения
// type == 0 - формулировка вопроса
// type == 1 - ключевые тезисы
function get_disscus_post_info(post_id, me, type) {
  
  var url = 'http://evo-lab.org/ajax.php';
  var container = jQuery(me).parent().next();
  var data = ( type == 0 ) ? { post_id: post_id, question: 1 } : { post_id: post_id, thesis: 1 };
  
  jQuery('<img src=\'http://evo-lab.org/wp-content/themes/simply-works-core/loader.gif\'/>').insertAfter(me);
  
  jQuery.ajax({
    url: url,
    data: data,
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

// функция для Ajax-получения формулировки вопроса
function get_question_text(post_id, me) {
  get_disscus_post_info( post_id, me, 0 );
}
//------------------------------------------------------------------------------

// функция для Ajax-получения ключевых тезисов
function get_key_thesis(post_id, me) {
  get_disscus_post_info( post_id, me, 1 );
}
//------------------------------------------------------------------------------