$(document).ready(function() {

  var marque = "pouet";
  var formatDatas = {};
  console.log(formatDatas);
  $('#append').on('submit', function(e){
    e.preventDefault();
    //code pour améliorer la syntaxe des donnée que l'on envoie en php
    var datas = $(this).serializeArray();

        for (var i = 0; i < datas.length; i++) {
            formatDatas[datas[i]['name']] = datas[i]['value'];
        }

        append(formatDatas);
  });
  var append = function (credentials){
    $.ajax({
      method: "POST",
      url : "../Back/add.php",
      data : credentials,
      dataType : "json",
      success: function(response) {
        console.log(response);
        //si le php nous renvoi success en json alors le vehicule a bien ete ajouter en bdd
        if (response.success){
          console.log('success');
          $('#append').append('<p>Vehicule ajouter</p>');
        }else{
          console.log('echec');
          $('#append').append('<p>Vehicule déjà présent</p>');
        }
      }
    });
  }


});
