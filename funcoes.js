$(document).ready(function(){
    $("#btnSalvar").click(function(){
        var atividade = $("#atividade").val();
        $.post("salvarAtividade.php",{"atividade":atividade} ,function(data, status){
            alert("Data: " + data + "\nStatus: " + status);
          }).then(()=>{
            window.location.reload();
          });
    });
});
  