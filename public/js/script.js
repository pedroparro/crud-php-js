//select form
$("#operacoes_emitente").change(function() {
    if ($(this).data('options') == undefined) {
      /*pegando options-operacoes_cidades e adicionando select-operacoes_emitente*/
      $(this).data('options', $('#operacoes_cidades option').clone());
    }
    var id = $(this).val();
    if (id == "all") {
      var options = $(this).data('options');
      $('#operacoes_cidades').html(options);
  }
  else {
      var options = $(this).data('options').filter('[data-name=' + id + ']');
      $('#operacoes_cidades').html(options);
  }
});

