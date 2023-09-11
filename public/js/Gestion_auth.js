$(document).ready(function () {
    // table_Agents();
    // ******Ajouter Succursale******
    $("#AddAuth").on("submit", function (e) {
      e.preventDefault();
      var $this = jQuery(this);
      var formData = jQuery($this).serializeArray();
      jQuery.ajax({
        url: $this.attr("action"),
        type: $this.attr("method"), // Le nom du fichier indiqué dans le formulaire
        data: formData, // Je sérialise les données (j'envoie toutes les valeurs présentes dans le formulaire)
        // dataFilter: 'json', //forme data
        success: function (response) {
            console.log(response);
          // Je récupère la réponse du fichier PHP
          toastr.options = {
            progressBar: true,
            closeButton: true,
          };
          toastr.success(response.message, { timeOut: 12000 });
        },
        error: function (response) {
          toastr.options = {
            progressBar: true,
            closeButton: true,
          };
          toastr.error("Merci de vérifier les champs");
        },
      });
    }); 
   
     
  });