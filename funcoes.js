$(document).ready(function(){
    $("#btnSalvar").click(function(){
        var atividade = $("#atividade").val();
        var user_id = $("#user_id").val();
        $.post("funcoes/salvarAtividade.php",{"descricao":atividade,"user_id":user_id} ,function(data, status){
            alert(data);
            console.log("status",status)
          }).then(()=>{
            window.location.reload();
          });
    });     
});

function deletar(id) {
  $.post("funcoes/deletarAtividade.php",{"id":id} ,function(data, status){
    alert(data);
    console.log("status",status)
  }).then(()=>{
    window.location.reload();
  });
}
