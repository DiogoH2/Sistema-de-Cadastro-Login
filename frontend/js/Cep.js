$("#cep").focusout(function(){
    $.ajax({
        url: 'https://viacep.com.br/ws/'+$(this).val()+'/json/',
        dataType: 'json',
        success: function(resposta){
            $("#rua").val(resposta.logradouro);
            $("#cidade").val(resposta.localidade);
            $("#estado").val(resposta.uf)
        }
    })
})