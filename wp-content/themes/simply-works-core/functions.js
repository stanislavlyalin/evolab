function search_click()
{
  var input = document.getElementById("tag");
  if ( input.value != '' ) {
    if ( input.value == 'тег для поиска...' ) {
      input.value = '';
    }
  }
  input.style.color = 'black';
}
//------------------------------------------------------------------------------

function search_blur()
{
  var input = document.getElementById("tag");
  if ( input.value == '' ) {
    input.value = 'тег для поиска...'
  }
  input.style.color = ( input.value == 'тег для поиска...' ) ? 'gray' : 'black';
}
//------------------------------------------------------------------------------