$(function() {

  /**
   * выбрать все посты для удаление
  **/

  $('#deleteAll').on('click', function() {
      $('input:checkbox[name="delete[]"]').prop('checked', $(this).is(':checked'));
  });
});