$('.select2').select2();
$(window).on("load", function () {
    Liste_Mpyement();
    get_info();
    Liste_Racine();
    Liste_Client();
    setTimeout(function () {
      table_Vente();
    }, 1500); 
    document.getElementById('update').style.display='none';
  $("#rowracine3").css("display", "none");
  $("#rowracine1").css("display", "none");
  $("#rowracine2").css("display", "none");
  $("#add-btn").css("display", "inline");
  $("#add-btn4").css("display", "none");
  $("#add-btn3").css("display", "none");

});
$(document).ready(function () {
  $("#Add_Vente").on("submit", function (e) {
    e.preventDefault();
    var formData = [];
    var $this = jQuery(this);
    var formData = jQuery($this).serializeArray();
    let Exercice =$("#Exercice").val();
    let periode =$("#periode").val(); 
    formData.push(
      { name: "Exercice", value: Exercice },
      { name: "periode", value: periode },
    );
   
    jQuery.ajax({
      url: $this.attr("action"),
      type: $this.attr("method"), // Le nom du fichier indiqué dans le formulaire
      data: formData, // Je sérialise les données (j'envoie toutes les valeurs présentes dans le formulaire)
      // dataFilter: 'json', //forme data
      success: function (response) {
        // Je récupère la réponse du fichier PHP
        toastr.options = {
          progressBar: true,
          closeButton: true,
        };
        toastr.success(response.message, { timeOut: 12000 });
        table_Vente();
    
       viderChamps();
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
    $("#add-btn").on("click", function (e) {
        if($("#rowracine1").css("display")==="none")
        {
         $("#rowracine1").css("display", "inherit");
         $("#add-btn").css("display", "none");
        }
        const container = document.getElementById("container");
        const rows = container.getElementsByClassName("row");
      
        // Initialize a count for elements with display: none
        let hiddenElementsCount = 0;
      
        // Loop through the elements and check their display property
        for (const row of rows) {
          const style = getComputedStyle(row);
          if (style.display === "none") {
            hiddenElementsCount++;
          }
        }
        if(hiddenElementsCount==1)
        {
          $("#add-btn").css("display", "none");
          $("#add-btn2").css("display", "none");
          $("#add-btn3").css("display", "none");
          $("#add-btn4").css("display", "none");
        }
      });
    $("#add-btn2").on("click", function (e) {
        if($("#rowracine2").css("display")==="none")
        {
        $("#rowracine2").css("display", "inherit");
        $("#add-btn2").css("display", "none");
       
        }
    
        const container = document.getElementById("container");
        const rows = container.getElementsByClassName("row");
      
        // Initialize a count for elements with display: none
        let hiddenElementsCount = 0;
      
        // Loop through the elements and check their display property
        for (const row of rows) {
          const style = getComputedStyle(row);
          if (style.display === "none") {
            hiddenElementsCount++; 
          }
        }
      
        if(hiddenElementsCount==1)
    {
      $("#add-btn").css("display", "none");
      $("#add-btn2").css("display", "none");
      $("#add-btn3").css("display", "none");
      $("#add-btn4").css("display", "none");
    }
    
    
     });
    $("#add-btn4").on("click", function (e) {
      if($("#rowracine1").css("display")==="none")
      {
        $("#rowracine").css("display", "inherit");
        $("#add-btn").css("display", "inline");
        $("#add-btn4").css("display", "none");
      }
      const container = document.getElementById("container");
      const rows = container.getElementsByClassName("row");
    
      // Initialize a count for elements with display: none
      let hiddenElementsCount = 0;
    
      // Loop through the elements and check their display property
      for (const row of rows) {
        const style = getComputedStyle(row);
        if (style.display === "none") {
          hiddenElementsCount++;
        }
      }
      if(hiddenElementsCount==1)
      {
        $("#add-btn").css("display", "none");
        $("#add-btn2").css("display", "none");
        $("#add-btn3").css("display", "none");
        $("#add-btn4").css("display", "none");
      }
    });
    $("#add-btn3").on("click", function (e) {
      if($("#rowracine").css("display")==="none")
      {
        $("#rowracine").css("display", "inherit");
        $("#add-btn3").css("display", "none");
      }else
      {if($("#rowracine1").css("display")==="none")
      {
        $("#rowracine1").css("display", "inherit");
        $("#add-btn3").css("display", "none");
      }}
      const container = document.getElementById("container");
      const rows = container.getElementsByClassName("row");
    
      // Initialize a count for elements with display: none
      let hiddenElementsCount = 0;
    
      // Loop through the elements and check their display property
      for (const row of rows) {
        const style = getComputedStyle(row);
        if (style.display === "none") {
          hiddenElementsCount++;console.log('rrrrrrr');
        }
      }
      if(hiddenElementsCount==1)
       {
       $("#add-btn").css("display", "none");
       $("#add-btn2").css("display", "none");
       $("#add-btn3").css("display", "none");
       $("#add-btn4").css("display", "none");
         }
         $("#rowracine1").css("display", "inherit");
         $("#add-btn").css("display", "none");
     });
   $('#racine').on('select2:select', function (e) {
        tauxRacine1();
    });
    $('#racine2').on('select2:select', function (e) {
        tauxRacine2();
     });
    $('#racine3').on('select2:select', function (e) {
        tauxRacine3();
      });
      $('#racine4').on('select2:select', function (e) {
        tauxRacine4();
      });
      $("#Client")
      .select2({
        tags: true,
        createTag: function (params) {
          var term = $.trim(params.term);
  
          if (term === "") {
            return null;
          }
  
          return {
            id: term,
            text: term,
            newTag: true,
            // Add this to indicate it's a new tag
          };
        },
      })
      .on("select2:select", function (e) {
        var selectedOption = e.params.data;
  
        // Check if the selected option is a new tag
        if (selectedOption.newTag) {
          // Remove the "readonly" attribute from an element with the ID "id_fiscal"
          // $("#id_fiscal").removeAttr("readonly");
          // $("#N_ICE").removeAttr("readonly");
          // $("#n_compt").removeAttr("readonly");
          // $("#id_fiscal").prop("required", true);
          // $("#N_ICE").prop("required", true);
          // // $("#n_compt").prop("required", true);
          // $("#n_compt").val("4411");
        }
      });  
      $("#update").on("click", function (e) {
        var id = $('#id_Vente').val();
        var formData = [];
        var Client = $('#Client').val();
        var desc = $("#desc").val();
        var n_fact = $("#n_fact").val();
        var date_fact = $("#date_fact").val();
        var date_p = $("#date_p").val();
        var Mpayement = $("#Mpayement").val();
        var MTttc = $("#MTttc").val();
        // var mtd = $("#mtd").val();
        var racine = $("#racine").val();
        var MHT_1 = $("#MHT_1").val();
        var tva_1 = $("#tva_1").val();
        var ttc1 = $("#ttc1").val();
        var racine2 = $("#racine2").val();
        var MHT_2 = $("#MHT_2").val();
        var tva_2 = $("#tva_2").val();
        var ttc2 = $("#ttc2").val();
        var racine3 = $("#racine3").val();
        var racine4 = $("#racine4").val();
        var MHT_3 = $("#MHT_3").val();
        var tva_3 = $("#tva_3").val();
        var ttc3 = $("#ttc3").val();    
        var MHT_4 = $("#MHT_4").val();
        var tva_4 = $("#tva_4").val();
        var ttc4 = $("#ttc4").val();  
        var Exercice = $("#Exercice").val();
        var periode = $("#periode").val();
        var Taux1 = $("#taux1").val();
        var Taux2 = $("#taux2").val(); 
        var Taux3 = $("#taux3").val();
        var Taux4 = $("#taux4").val();
        formData.push(
          { name: "id", value: id },
          { name: "Client", value: Client },
          { name: "desc", value: desc },
          { name: "n_fact", value: n_fact },
          { name: "date_fact", value: date_fact },
          { name: "date_p", value: date_p },
          { name: "Mpayement", value: Mpayement },
          { name: "MTttc", value: MTttc },
          // { name: "mtd", value: mtd },
          { name: "racine", value: racine },
          { name: "MHT_1", value: MHT_1 },
          { name: "tva_1", value: tva_1 },
          { name: "ttc1", value: ttc1 },
          { name: "racine2", value: racine2 },
          { name: "MHT_2", value: MHT_2 },
          { name: "tva_2", value: tva_2 },
          { name: "ttc2", value: ttc2 },
          { name: "racine3", value: racine3 },
          { name: "MHT_3", value: MHT_3 },
          { name: "tva_3", value: tva_3 },
          { name: "ttc3", value: ttc3 },
          { name: "MHT_4", value: MHT_4 },
          { name: "tva_4", value: tva_4 },
          { name: "ttc4", value: ttc4 }, 
          { name: "Exercice", value: Exercice },
          { name: "periode", value: periode },
          { name: "Taux1", value: Taux1 }, 
          { name: "Taux2", value: Taux2 },
          { name: "Taux3", value: Taux3 },
          { name: "Taux4", value: Taux4 },
          { name: "racine4", value: racine4 }
        );
      
        jQuery.ajax({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
    
          url: "./update_vente",
          type: "get", // Le nom du fichier indiqué dans le formulaire
          data:formData, // Je sérialise les données (j'envoie toutes les valeurs présentes dans le formulaire)
      
          success: function (response) {
              // Je récupère la réponse du fichier PHP
              toastr.success(response.messages);
              viderChamps();
          },
          error: function (response) {
              toastr.error(response.Error);
          },
      });
    
      }); 
      $("#Delet_Vente").on("submit", function (e) {
        e.preventDefault();
        var $this = jQuery(this);
        var formData = jQuery($this).serializeArray();
        jQuery.ajax({
          url: $this.attr("action"),
          type: $this.attr("method"), // Le nom du fichier indiqué dans le formulaire
          data: formData, // Je sérialise les données (j'envoie toutes les valeurs présentes dans le formulaire)
          // dataFilter: 'json', //forme data
          success: function (response) {
            // Je récupère la réponse du fichier PHP
            toastr.options = {
              progressBar: true,
              closeButton: true,
            };
            toastr.success(response.message, { timeOut: 12000 });
            jQuery("#Delet_Vente").trigger("click");
            table_Vente();
            
          },
          error: function (response) {
            toastr.error(response.danger);
          },
        });
      });
      $("#ajou").on("click", function (e) {
        $("#rowracine").css("display", "inherit");
        $("#add-btn").css("display", "inline");
        $("#rowracine3").css("display", "none");
        $("#rowracine1").css("display", "none");
        $("#rowracine2").css("display", "none");
        $("#ttc1").prop("required", true);
        $("#tva_1").prop("required", true);
        $("#MHT_1").prop("required", true);
      });
      $("#renitialiser").on("click", function (e) {
        viderChamps();
       });
       $("#vider").on("click", function (e) {
        var Exercice = $("#Exercice").val();
        var periode = $("#periode").val();
        $("#delete_periode").val(periode);
        $("#delete_exercice").val(Exercice);
      });
      $("#Delet_periode").on("submit", function (e) {
        e.preventDefault();
        var $this = jQuery(this);
        var formData = jQuery($this).serializeArray();
        jQuery.ajax({
          url: $this.attr("action"),
          type: $this.attr("method"), // Le nom du fichier indiqué dans le formulaire
          data: formData, // Je sérialise les données (j'envoie toutes les valeurs présentes dans le formulaire)
          // dataFilter: 'json', //forme data
          success: function (response) {
            // Je récupère la réponse du fichier PHP
            toastr.options = {
              progressBar: true,
              closeButton: true,
            };
            toastr.success(response.message, { timeOut: 12000 });
            jQuery("#Delet_Achat").trigger("click");
            table_Achat();
            $("#totalTTC").text(0);
      $("#totalTVA").text(0);
        $("#totalHT").text(0);
          },
          error: function (response) {
            toastr.error(response.danger);
          },
        });
      });
      $('#Client').on('select2:select', function (e) {
 
        let value = $('#Client').val();
    
        jQuery.ajax({
          url: "./Client/" + value,
          type: "GET",
          dataType: "json",
          success: function (responce) {
            $tabledata = responce.info_Client;
            jQuery.each(responce.info_Client, function (key, item) {
              $("#desc").val($tabledata.Designation);
            });
    
          },
        });
    
      });
      $('#periode').on('select2:select', function (e) {
        table_Vente(); 
      });
      $('#Exercice').on('select2:select', function (e) {
    
        let Exercice = $('#Exercice').val();
        jQuery.ajax({
          url: "./get_regime/" +Exercice,
          type: "GET",
          dataType: "json",
          success: function (responce) {
        
               let selectElement=("#Exercice");
               var $lignes;
               $tabledata = responce.Liste_regimes;
               let regime=responce.regime.libelle;
             
              jQuery.each($tabledata, function (key, item) {
            
                if(regime==item.libelle){
                 
                  $lignes =
                  $lignes +
                  '<option value="' +
                  item.id +
                  '">' +
                  item.	periode +
                "</option>";
                }
                $("#periode").html($lignes);
              });
            
            },
        });
        table_Vente();
      });
      $("#close").on("click", function (e) {
        viderChamps();
      });
      $("#Client")
    .select2({
      tags: true,
      createTag: function (params) {
        var term = $.trim(params.term);

        if (term === "") {
          return null;
        }

        return {
          id: term,
          text: term,
          newTag: true,
          // Add this to indicate it's a new tag
        };
      },
    })
    .on("select2:select", function (e) {
      var selectedOption = e.params.data;

      // Check if the selected option is a new tag
      if (selectedOption.newTag) {
        // Remove the "readonly" attribute from an element with the ID "id_fiscal"
        $("#des").removeAttr("readonly");
        $("#des").prop("required", true);
      }
    });
});
document.addEventListener("DOMContentLoaded", function () {
    var radioButtons = document.querySelectorAll("input[name='radios5']");
  
    radioButtons.forEach(function (radio) {
      radio.addEventListener("change", function () {
        if (radio.id === "HT") {
          $("#MHT_1").prop("readonly", false);
          $("#tva_1").prop("readonly", true);
          
          $("#MHT_2").prop("readonly", false);
          $("#tva_2").prop("readonly", true);
          $("#MHT_3").prop("readonly", false);
          $("#tva_3").prop("readonly", true);
          $("#MHT_4").prop("readonly", false);
          $("#tva_4").prop("readonly", true);
  
          $("#ttc1").prop("readonly", true);
          $("#ttc2").prop("readonly", true);
          $("#ttc3").prop("readonly", true);
          $("#ttc4").prop("readonly", true);
          $("#MHT_1").focus();
        } else if (radio.id === "TVA") {
          $("#MHT_1").prop("readonly", true);
          $("#tva_1").prop("readonly", false);
         
          $("#MHT_2").prop("readonly", true);
          $("#tva_2").prop("readonly", false);
          $("#MHT_3").prop("readonly", true);
          $("#tva_3").prop("readonly", false);
          $("#MHT_4").prop("readonly", true);
          $("#tva_4").prop("readonly", false);
  
          $("#ttc1").prop("readonly", true);
          $("#ttc2").prop("readonly", true);
          $("#ttc3").prop("readonly", true);
          $("#ttc4").prop("readonly", true);
         
          $("#tva_1").focus();
        } else if (radio.id === "TTC") {
          $("#MHT_1").prop("readonly", true);
          $("#tva_1").prop("readonly", true);
        
          $("#MHT_2").prop("readonly", true);
          $("#tva_2").prop("readonly", true);
          $("#MHT_3").prop("readonly", true);
          $("#tva_3").prop("readonly", true);
          $("#MHT_4").prop("readonly", true);
          $("#tva_4").prop("readonly", true);
  
          $("#ttc1").prop("readonly", false);
          $("#ttc2").prop("readonly", false);
          $("#ttc3").prop("readonly", false);
          $("#ttc4").prop("readonly", false);
          $("#ttc1").focus();
        } else if (radio.id === "LIBRE") {
          $("#MHT_1").prop("readonly", false);
          $("#tva_1").prop("readonly", false);
         
          $("#MHT_2").prop("readonly", false);
          $("#tva_2").prop("readonly", false);
          $("#MHT_3").prop("readonly", false);
          $("#tva_3").prop("readonly", false);
          $("#MHT_4").prop("readonly", false);
          $("#tva_4").prop("readonly", false);
  
          $("#ttc1").prop("readonly", false);
          $("#ttc2").prop("readonly", false);
          $("#ttc3").prop("readonly", false);
          $("#ttc4").prop("readonly", false);
        }
      });
    });
  }); document.addEventListener("DOMContentLoaded", function () {
    var radioButtons = document.querySelectorAll("input[name='radios5']");
  
    radioButtons.forEach(function (radio) {
      radio.addEventListener("change", function () {
        if (radio.id === "HT") {
          $("#MHT_1").prop("readonly", false);
          $("#tva_1").prop("readonly", true);
          
          $("#MHT_2").prop("readonly", false);
          $("#tva_2").prop("readonly", true);
          $("#MHT_3").prop("readonly", false);
          $("#tva_3").prop("readonly", true);
          $("#MHT_4").prop("readonly", false);
          $("#tva_4").prop("readonly", true);
  
          $("#ttc1").prop("readonly", true);
          $("#ttc2").prop("readonly", true);
          $("#ttc3").prop("readonly", true);
          $("#ttc4").prop("readonly", true);
          $("#MHT_1").focus();
        } else if (radio.id === "TVA") {
          $("#MHT_1").prop("readonly", true);
          $("#tva_1").prop("readonly", false);
         
          $("#MHT_2").prop("readonly", true);
          $("#tva_2").prop("readonly", false);
          $("#MHT_3").prop("readonly", true);
          $("#tva_3").prop("readonly", false);
          $("#MHT_4").prop("readonly", true);
          $("#tva_4").prop("readonly", false);
  
          $("#ttc1").prop("readonly", true);
          $("#ttc2").prop("readonly", true);
          $("#ttc3").prop("readonly", true);
          $("#ttc4").prop("readonly", true);
         
          $("#tva_1").focus();
        } else if (radio.id === "TTC") {
          $("#MHT_1").prop("readonly", true);
          $("#tva_1").prop("readonly", true);
        
          $("#MHT_2").prop("readonly", true);
          $("#tva_2").prop("readonly", true);
          $("#MHT_3").prop("readonly", true);
          $("#tva_3").prop("readonly", true);
          $("#MHT_4").prop("readonly", true);
          $("#tva_4").prop("readonly", true);
  
          $("#ttc1").prop("readonly", false);
          $("#ttc2").prop("readonly", false);
          $("#ttc3").prop("readonly", false);
          $("#ttc4").prop("readonly", false);
          $("#ttc1").focus();
        } else if (radio.id === "LIBRE") {
          $("#MHT_1").prop("readonly", false);
          $("#tva_1").prop("readonly", false);
         
          $("#MHT_2").prop("readonly", false);
          $("#tva_2").prop("readonly", false);
          $("#MHT_3").prop("readonly", false);
          $("#tva_3").prop("readonly", false);
          $("#MHT_4").prop("readonly", false);
          $("#tva_4").prop("readonly", false);
  
          $("#ttc1").prop("readonly", false);
          $("#ttc2").prop("readonly", false);
          $("#ttc3").prop("readonly", false);
          $("#ttc4").prop("readonly", false);
        }
      });
    });
  });
function Liste_Mpyement() {
    jQuery.ajax({
      url: "./FK_Mp",
      type: "GET",
      dataType: "json",
      success: function (responce) {
        var $lignes = '<option value="null">Sélectionner</option>';
        jQuery.each(responce.Liste_payment, function (key, item) {
          $lignes =
            $lignes +
            '<option value="' +
            item.id +
            '">' +
            item.Num_payment + '  | ' + item.Nom_payment
          "</option>";
        });
        $("#Mpayement").html($lignes);
      },
    });
  }
  function get_info() {
    jQuery.ajax({
      url: "./get_infsociete",
      type: "GET",
      dataType: "json",
      success: function (responce) {
        
        var $lignes;
        let $i = 0;
        $tabledata = responce.Liste_regimes;
  console.log($tabledata);
        jQuery.each($tabledata, function (key, item) {
          console.log(responce.regime[0].libelle);
          if (item.libelle == responce.regime[0].libelle) {
            $lignes =
              $lignes +
              '<option value="' +
              item.id +
              '">' +
              item.periode +
              "</option>";
            $i++;
          }
          $("#periode").html($lignes); 
          $("#prorata").val(responce.get_info.Prorata);
        });
        console.log(responce.periode);
        $("#periode").val(responce.periode);
        var $newOption = $("<option selected='selected'></option>")
          .text(responce.get_info.Exercice)
          .val(responce.get_info.Exercice);
        $("#Exercice").append($newOption).trigger("change");
        $("#faitG").val(responce.get_info.FK_fait_generateurs);
      },
    });
  }
  function tauxRacine1()
{ 
  let value = $('#racine').val();

    jQuery.ajax({
      url: "./get_racine/" + value,
      type: "GET",
      dataType: "json",
      success: function (responce) {
        $tabledata = responce.get_racine;
   
        $("#taux1").val($tabledata.Taux);
      },
    });
}
function tauxRacine2()
{ 
  
  let value = $('#racine2').val();

  jQuery.ajax({
    url: "./get_racine/" + value,
    type: "GET",
    dataType: "json",
    success: function (responce) {
      $tabledata = responce.get_racine;

      $("#taux2").val($tabledata.Taux);
    },
  });
}
function tauxRacine3()
{ 
  let value = $('#racine3').val();

    jQuery.ajax({
      url: "./get_racine/" + value,
      type: "GET",
      dataType: "json",
      success: function (responce) {
        $tabledata = responce.get_racine;

        $("#taux3").val($tabledata.Taux);
      },
    });
  }
function tauxRacine4()
  { 
    let value = $('#racine4').val();
  
      jQuery.ajax({
        url: "./get_racine/" + value,
        type: "GET",
        dataType: "json",
        success: function (responce) {
          $tabledata = responce.get_racine;
  
          $("#taux4").val($tabledata.Taux);
        },
      });
}
function Liste_Racine() {
        jQuery.ajax({
          url: "./FK_racine",
          type: "GET",
          dataType: "json",
          success: function (responce) {
            var $lignes = '<option value="null">Sélectionner</option>';
            jQuery.each(responce.Liste_Racine, function (key, item) {
              $lignes =
                $lignes +
                '<option value="' +
                item.id +
                '">' +
                item.Num_racines + '  | ' + item.Nom_racines + '  | ' + item.Taux
              "</option>";
            });
            $("#racine").html($lignes);
            // $("#racine4").html($lignes);
            $("#racine2").html($lignes);
             $("#racine3").html($lignes);
             $("#racine4").html($lignes);
          },
        });
}
function gestYears(){
        const Exercice = document.getElementById('Exercice');
        const currentYear = new Date().getFullYear();
      
        // Create options for a range of years, for example: from current year to 10 years ago
        for (let year = currentYear; year >= currentYear - 10; year--) {
            const option = document.createElement('option');
            option.id = year;
            option.textContent = year;
            Exercice.appendChild(option);
        }
}
function checkDate() {
    var inputDate = $("#date_p").val();
  
    if (!inputDate == null || !inputDate.trim() == "") {
      // var currentDate = new Date();
      finPeriode = "";
  
      // // Calculate the date exactly one year ago from the current date
      // var oneYearAgo = new Date();
      // oneYearAgo.setFullYear(currentDate.getFullYear() - 1);
      let id = $("#periode").val();
      let annee = $("#Exercice").val();
      jQuery.ajax({
        url: "./get_regimeByid/" + id,
        type: "GET",
        dataType: "json",
        success: function (responce) {
          finPeriode = responce.regime.AU;
          finPeriode = finPeriode.trim();
          var parts = finPeriode.split("-");
          var year = parseInt(parts[0]);
          var month = parseInt(parts[1]);
          var day = parseInt(parts[2]);
          year = annee - 1;
          month = month;
          finPeriode = year + "-" + (month < 10 ? "0" : "") + month + "-" + day;
          peride = annee + "-" + parseInt(parts[1]) + "-" + day;
  
          if (inputDate < finPeriode) {
            alert(
              "Attention la date de paiement dépasse 1 an par rapport à la date de déclaration "
            );
            document.getElementById("date_p").value = "";
            $("#date_p").focus();
          }
          if (inputDate > peride) {
            alert(
              "Attention la date de paiement dépasse la période de déclaration "
            );
            document.getElementById("date_p").value = "";
            $("#date_p").focus();
          }
        },
      });
    }
  }
  function calcul_ttc1() { 
    let ttc1 = $("#ttc1").val();
  
    let taux1 = $("#taux1").val();
    var radioButtons = document.querySelectorAll("input[name='radios5']");
  
    radioButtons.forEach(function (radio) {
      if (radio.id === "TTC" && radio.checked) {
        if (ttc1 != "") {
          if (taux1 == "") {
            alert("merci de choiser la rubrique de tva");
          } else {
            if (ttc1 != "") {
              // console.log(ttc1);
              taux1 = taux1 / 100;
              let mht = parseFloat(ttc1) / (1 + parseFloat(taux1));
              mht = mht.toFixed(2);
              let tva = parseFloat(ttc1) - parseFloat(mht);
              tva = tva.toFixed(2);
              $("#MHT_1").val(mht);
              $("#tva_1").val(tva);
            }
          }
        }
      }
  
      let ttc2 = $("#ttc2").val();
      let ttc3 = $("#ttc3").val();
      let ttc4 = $("#ttc4").val();
      if (ttc1 == "") {
        ttc1 = 0;
      }
      if (ttc2 == "") {
        ttc2 = 0;
      }
      if (ttc3 == "") {
        ttc3 = 0;
      }
      if (ttc4 == "") {
        ttc4 = 0;
      }
  
      $("#MTttc").val(
        (
          parseFloat(ttc1) +
          parseFloat(ttc2) +
          parseFloat(ttc3) +
          parseFloat(ttc4)
        ).toFixed(2)
      );
    });
   
  }
  function calcul_ttc2() {
    let ttc2 = $("#ttc2").val();
    let taux2 = $("#taux2").val();
    var radioButtons = document.querySelectorAll("input[name='radios5']");
  
    radioButtons.forEach(function (radio) {
      if (radio.id === "TTC" && radio.checked) {
        if (ttc2 != "") {
          if (taux2 == "") {
            alert("merci de choiser la rubrique de tva");
          } else {
            if (ttc2 != "") {
              taux2 = taux2 / 100;
              let mht = parseFloat(ttc2) / (1 + parseFloat(taux2));
              mht = parseFloat(mht).toFixed(2);
              let tva = parseFloat(ttc2) - parseFloat(mht);
              tva = parseFloat(tva).toFixed(2);
              $("#MHT_2").val(mht);
              $("#tva_2").val(tva);
            }
          }
        }
      }
      let ttc1 = $("#ttc1").val();
      let ttc3 = $("#ttc3").val();
      let ttc4 = $("#ttc4").val();
      if (ttc1 == "") {
        ttc1 = 0;
      }
      if (ttc2 == "") {
        ttc2 = 0;
      }
      if (ttc3 == "") {
        ttc3 = 0;
      }
      if (ttc4 == "") {
        ttc4 = 0;
      }
  
      $("#MTttc").val(
        (
          parseFloat(ttc1) +
          parseFloat(ttc2) +
          parseFloat(ttc3) +
          parseFloat(ttc4)
        ).toFixed(2)
      );
    });
   
  }
  function calcul_ttc3() {
    let ttc = $("#MTttc").val();
    let ttc3 = $("#ttc3").val();
    let taux3 = $("#taux3").val();
  
    var radioButtons = document.querySelectorAll("input[name='radios5']");
  
    radioButtons.forEach(function (radio) {
      if (radio.id === "TTC" && radio.checked) {
        if (ttc3 != "") {
          if (taux3 == "") {
            alert("merci de choiser la rubrique de tva");
          } else {
            if (ttc3 != "") {
              taux3 = taux3 / 100;
              $("#MTttc").val(parseFloat(ttc) + parseFloat(ttc3));
              let mht = parseFloat(ttc3) / (1 + parseFloat(taux3));
              mht = mht.toFixed(2);
              let tva = parseFloat(ttc3) - parseFloat(mht);
              tva = tva.toFixed(2);
              $("#MHT_3").val(mht);
              $("#tva_3").val(tva);
            }
          }
        }
      } else {
        let ttc2 = $("#ttc2").val();
        let ttc1 = $("#ttc1").val();
        let ttc4 = $("#ttc4").val();
        if (ttc1 == "") {
          ttc1 = 0;
        }
        if (ttc2 == "") {
          ttc2 = 0;
        }
        if (ttc3 == "") {
          ttc3 = 0;
        }
        if (ttc4 == "") {
          ttc4 = 0;
        }
  
        $("#MTttc").val(
          (
            parseFloat(ttc1) +
            parseFloat(ttc2) +
            parseFloat(ttc3) +
            parseFloat(ttc4)
          ).toFixed(2)
        );
      }
    });
   
  }
  function calcul_ttc4() {
    let ttc = $("#MTttc").val();
    let ttc4 = $("#ttc4").val();
    let taux4 = $("#taux4").val();
  
    var radioButtons = document.querySelectorAll("input[name='radios5']");
  
    radioButtons.forEach(function (radio) {
      if (radio.id === "TTC" && radio.checked) {
        if (ttc4 != "") {
          if (taux4 == "") {
            alert("merci de choiser la rubrique de tva");
          } else {
            if (ttc4 != "") {
              taux4 = taux4 / 100;
              $("#MTttc").val(parseFloat(ttc) + parseFloat(ttc4));
              let mht = parseFloat(ttc4) / (1 + parseFloat(taux4));
              mht = mht.toFixed(2);
              let tva = parseFloat(ttc4) - parseFloat(mht);
              tva = tva.toFixed(2);
              $("#MHT_4").val(mht);
              $("#tva_4").val(tva);
            }
          }
        }
      } else {
        let ttc2 = $("#ttc2").val();
        let ttc1 = $("#ttc1").val();
        let ttc3 = $("#ttc3").val();
        if (ttc1 == "") {
          ttc1 = 0;
        }
        if (ttc2 == "") {
          ttc2 = 0;
        }
        if (ttc4 == "") {
          ttc4 = 0;
        }
        if (ttc3 == "") {
          ttc3 = 0;
        }
  
        $("#MTttc").val(
          (
            parseFloat(ttc1) +
            parseFloat(ttc2) +
            parseFloat(ttc3) +
            parseFloat(ttc4)
          ).toFixed(2)
        );
      }
    });
    
  }
  function calcul_tva() {
    let tva_1 = $("#tva_1").val();
    let taux1 = $("#taux1").val();
  
    var radioButtons = document.querySelectorAll("input[name='radios5']");
  
    radioButtons.forEach(function (radio) {
      if (radio.id === "TVA" && radio.checked) {
        if (tva_1 != "") {
          // console.log(taux1);
          if (taux1 == "") {
            alert("merci de choiser la rubrique de tva");
          } else {
            if (tva_1 != "") {
              // console.log(tva_1);
              taux1 = taux1 / 100;
              let mht = parseFloat(tva_1) / parseFloat(taux1);
  
              let ttc = parseFloat(mht) + parseFloat(tva_1);
              mht = mht.toFixed(2);
              ttc = parseFloat(ttc).toFixed(2);
              $("#MHT_1").val(mht);
              $("#ttc1").val(ttc);
              let ttc1 = $("#ttc1").val();
              let ttc2 = $("#ttc2").val();
              let ttc3 = $("#ttc3").val();
              let ttc4 = $("#ttc4").val();
  
              if (ttc1 == "") {
                ttc1 = 0;
              }
              if (ttc2 == "") {
                ttc2 = 0;
              }
              if (ttc3 == "") {
                ttc3 = 0;
              }
              if (ttc4 == "") {
                ttc4 = 0;
              }
  
              $("#MTttc").val(
                (
                  parseFloat(ttc1) +
                  parseFloat(ttc2) +
                  parseFloat(ttc3) +
                  parseFloat(ttc4)
                ).toFixed(2)
              );
            }
          }
        }
      }
    
    });
  }
  function calcul_tva2() {
    let tva_2 = $("#tva_2").val();
    let taux2 = $("#taux2").val();
  
    var radioButtons = document.querySelectorAll("input[name='radios5']");
  
    radioButtons.forEach(function (radio) {
      if (radio.id === "TVA" && radio.checked) {
        if (tva_2 != "") {
          if (taux2 == "") {
            alert("merci de choiser la rubrique de tva");
          } else {
            if (tva_2 != "") {
              taux2 = taux2 / 100;
              let mht = parseFloat(tva_2) / parseFloat(taux2);
  
              let ttc = parseFloat(mht) + parseFloat(tva_2);
              mht = parseFloat(mht).toFixed(2);
              ttc = parseFloat(ttc).toFixed(2);
              $("#MHT_2").val(mht);
              $("#ttc2").val(ttc);
              let ttc1 = $("#ttc1").val();
              let ttc2 = $("#ttc2").val();
              let ttc3 = $("#ttc3").val();
              let ttc4 = $("#ttc4").val();
              if (ttc1 == "") {
                ttc1 = 0;
              }
              if (ttc2 == "") {
                ttc2 = 0;
              }
              if (ttc3 == "") {
                ttc3 = 0;
              }
              if (ttc4 == "") {
                ttc4 = 0;
              }
  
              $("#MTttc").val(
                (
                  parseFloat(ttc1) +
                  parseFloat(ttc2) +
                  parseFloat(ttc3) +
                  parseFloat(ttc4)
                ).toFixed(2)
              );
            }
          }
        }
      }
    
    });
  }
  function calcul_tva3() {
    let tva_3 = $("#tva_3").val();
    let taux3 = $("#taux3").val();
    let mttc = $("#MTttc").val();
    var radioButtons = document.querySelectorAll("input[name='radios5']");
  
    radioButtons.forEach(function (radio) {
      if (radio.id === "TVA" && radio.checked) {
        if (tva_3 != "") {
          if (taux3 == "") {
            alert("merci de choiser la rubrique de tva");
          } else {
            if (tva_3 != "") {
              taux3 = taux3 / 100;
              let mht = parseFloat(tva_3) / parseFloat(taux3);
              let ttc = parseFloat(mht) + parseFloat(tva_3);
              mht = parseFloat(mht).toFixed(2);
              ttc = parseFloat(ttc).toFixed(2);
              $("#MHT_3").val(mht);
              $("#ttc3").val(ttc);
              let ttc1 = $("#ttc1").val();
              let ttc2 = $("#ttc2").val();
              let ttc3 = $("#ttc3").val();
              let ttc4 = $("#ttc4").val();
              if (ttc1 == "") {
                ttc1 = 0;
              }
              if (ttc2 == "") {
                ttc2 = 0;
              }
              if (ttc3 == "") {
                ttc3 = 0;
              }
              if (ttc4 == "") {
                ttc4 = 0;
              }
  
              $("#MTttc").val(
                (
                  parseFloat(ttc1) +
                  parseFloat(ttc2) +
                  parseFloat(ttc3) +
                  parseFloat(ttc4)
                ).toFixed(2)
              );
            }
          }
        }
      }
     
    });
  }
  function calcul_tva4() {
    let tva_4 = $("#tva_4").val();
    let taux4 = $("#taux4").val();
  
    if (tva_4 != "") {
      if (taux4 == "") {
        alert("merci de choiser la rubrique de tvaaaaa");
      } else {
        if (tva_4 != "") {
          taux4 = taux4 / 100;
          let mht = parseFloat(tva_4) / parseFloat(taux4);
          let ttc = parseFloat(mht) + parseFloat(tva_4);
          mht = parseFloat(mht).toFixed(2);
          ttc = parseFloat(ttc).toFixed(2);
          $("#MHT_4").val(mht);
          $("#ttc4").val(ttc);
          let ttc1 = $("#ttc1").val();
          let ttc2 = $("#ttc2").val();
          let ttc3 = $("#ttc3").val();
          let ttc4 = $("#ttc4").val();
  
          if (ttc1 == "") {
            ttc1 = 0;
          }
          if (ttc2 == "") {
            ttc2 = 0;
          }
          if (ttc3 == "") {
            ttc3 = 0;
          }
          if (ttc4 == "") {
            ttc4 = 0;
          }
  
          $("#MTttc").val(
            (
              parseFloat(ttc1) +
              parseFloat(ttc2) +
              parseFloat(ttc3) +
              parseFloat(ttc4)
            ).toFixed(2)
          );
        }
      }
     
    }
  }
  function calcul_HT() {
    let MHT_1 = $("#MHT_1").val();
    let taux1 = $("#taux1").val();
  
    var radioButtons = document.querySelectorAll("input[name='radios5']");
  
    radioButtons.forEach(function (radio) {
      if (radio.id === "HT" && radio.checked) {
        if (MHT_1 != "") {
          if (taux1 == "") {
            alert("merci de choiser la rubrique de tva");
          } else {
            if (MHT_1 != "") {
              taux1 = taux1 / 100;
              let TVA = parseFloat(MHT_1) * parseFloat(taux1);
              let ttc = parseFloat(MHT_1) + parseFloat(TVA);
              MHT_1 = parseFloat(MHT_1).toFixed(2);
              ttc = parseFloat(ttc).toFixed(2);
              $("#tva_1").val(TVA);
              $("#ttc1").val(ttc);
              let ttc1 = $("#ttc1").val();
              let ttc2 = $("#ttc2").val();
              let ttc3 = $("#ttc3").val();
              let ttc4 = $("#ttc4").val();
              if (ttc1 == "") {
                ttc1 = 0;
              }
              if (ttc2 == "") {
                ttc2 = 0;
              }
              if (ttc3 == "") {
                ttc3 = 0;
              }
              if (ttc4 == "") {
                ttc4 = 0;
              }
  
              $("#MTttc").val(
                (
                  parseFloat(ttc1) +
                  parseFloat(ttc2) +
                  parseFloat(ttc3) +
                  parseFloat(ttc4)
                ).toFixed(2)
              );
            }
          }
        }
       
      }
    });
  }
  function calcul_HT2() {
    let MHT_2 = $("#MHT_2").val();
    let taux2 = $("#taux2").val();
    var radioButtons = document.querySelectorAll("input[name='radios5']");
  
    radioButtons.forEach(function (radio) {
      if (radio.id === "HT" && radio.checked) {
        if (MHT_2 != "") {
          if (taux2 == "") {
            alert("merci de choiser la rubrique de tva");
          } else {
            if (MHT_2 != "") {
              taux2 = taux2 / 100;
              let TVA = parseFloat(MHT_2) * parseFloat(taux2);
              let ttc = parseFloat(MHT_2) + parseFloat(TVA);
              MHT_2 = parseFloat(MHT_2).toFixed(2);
              ttc = parseFloat(ttc).toFixed(2);
              $("#tva_2").val(parseFloat(TVA).toFixed(2));
              $("#ttc2").val(parseFloat(ttc).toFixed(2));
              let ttc1 = $("#ttc1").val();
              let ttc2 = $("#ttc2").val();
              let ttc3 = $("#ttc3").val();
              let ttc4 = $("#ttc4").val();
              if (ttc1 == "") {
                ttc1 = 0;
              }
              if (ttc2 == "") {
                ttc2 = 0;
              }
              if (ttc3 == "") {
                ttc3 = 0;
              }
              if (ttc4 == "") {
                ttc4 = 0;
              }
  
              $("#MTttc").val(
                (
                  parseFloat(ttc1) +
                  parseFloat(ttc2) +
                  parseFloat(ttc3) +
                  parseFloat(ttc4)
                ).toFixed(2)
              );
            }
          }
        }
      
      }
    });
  }
  function calcul_HT3() {
    let MHT_3 = $("#MHT_3").val();
    let taux3 = $("#taux3").val();
    var radioButtons = document.querySelectorAll("input[name='radios5']");
  
    radioButtons.forEach(function (radio) {
      if (radio.id === "HT" && radio.checked) {
        if (MHT_3 != "") {
          if (taux3 == "") {
            alert("merci de choiser la rubrique de tva");
          } else {
            if (MHT_3 != "") {
              taux3 = taux3 / 100;
              let TVA = parseFloat(MHT_3) * parseFloat(taux3);
              let ttc = parseFloat(MHT_3) + parseFloat(TVA);
              MHT_3 = parseFloat(MHT_3).toFixed(2);
              ttc = parseFloat(ttc).toFixed(2);
              $("#tva_3").val(parseFloat(TVA).toFixed(2));
              $("#ttc3").val(parseFloat(ttc).toFixed(2));
              let ttc1 = $("#ttc1").val();
              let ttc2 = $("#ttc2").val();
              let ttc3 = $("#ttc3").val();
              let ttc4 = $("#ttc4").val();
              if (ttc1 == "") {
                ttc1 = 0;
              }
              if (ttc2 == "") {
                ttc2 = 0;
              }
              if (ttc3 == "") {
                ttc3 = 0;
              }
              if (ttc4 == "") {
                ttc4 = 0;
              }
  
              $("#MTttc").val(
                (
                  parseFloat(ttc1) +
                  parseFloat(ttc2) +
                  parseFloat(ttc3) +
                  parseFloat(ttc4)
                ).toFixed(2)
              );
            }
          }
        }
       
      }
    });
  }
  function calcul_HT4() {
    let MHT_4 = $("#MHT_4").val();
    let taux4 = $("#taux4").val();
    var radioButtons = document.querySelectorAll("input[name='radios5']");
  
    radioButtons.forEach(function (radio) {
      if (radio.id === "TVA" && radio.checked) {
        if (MHT_4 != "") {
          if (taux4 == "") {
            alert("merci de choiser la rubrique de tva");
          } else {
            if (MHT_4 != "") {
              taux4 = taux4 / 100;
              let TVA = parseFloat(MHT_4) * parseFloat(taux4);
              let ttc = parseFloat(MHT_4) + parseFloat(TVA);
              MHT_4 = parseFloat(MHT_4).toFixed(2);
              ttc = parseFloat(ttc).toFixed(2);
              $("#tva_4").val(TVA);
              $("#ttc4").val(ttc);
              let ttc1 = $("#ttc1").val();
              let ttc2 = $("#ttc2").val();
              let ttc3 = $("#ttc3").val();
              let ttc4 = $("#ttc4").val();
              if (ttc1 == "") {
                ttc1 = 0;
              }
              if (ttc2 == "") {
                ttc2 = 0;
              }
              if (ttc3 == "") {
                ttc3 = 0;
              }
              if (ttc4 == "") {
                ttc4 = 0;
              }
  
              $("#MTttc").val(
                (
                  parseFloat(ttc1) +
                  parseFloat(ttc2) +
                  parseFloat(ttc3) +
                  parseFloat(ttc4)
                ).toFixed(2)
              );
            }
          }
        }
       
      }
    });
  }
  function Liste_Racine() {
    jQuery.ajax({
      url: "./Liste_RacineV",
      type: "GET",
      dataType: "json",
      success: function (responce) {
        var $lignes = '<option value="null">Sélectionner</option>';
        jQuery.each(responce.Liste_Racine, function (key, item) {
          $lignes =
            $lignes +
            '<option value="' +
            item.id +
            '">' +
            item.Num_racines + '  | ' + item.Nom_racines + '  | ' + item.Taux
          "</option>";
        });
        $("#racine").html($lignes);
        // $("#racine4").html($lignes);
        $("#racine2").html($lignes);
         $("#racine3").html($lignes);
         $("#racine4").html($lignes);
      },
    });
  }
  function Liste_Client() {
    jQuery.ajax({
      url: "./FK_Client",
      type: "GET",
      dataType: "json",
      success: function (responce) {
        var $lignes = '<option value="null">Sélectionner</option>';
        jQuery.each(responce.Liste_client, function (key, item) {
          $lignes =
            $lignes +
            '<option value="' +
            item.id +
            '">' +
            item.nom +
            "</option>";
        });
        $("#Client").html($lignes);
      },
    });
  }
  function table_Vente() {
    let periode = $('#periode').val();
    let Exercice = $('#Exercice').val();
    // console.log(periode);
    jQuery.ajax({
      url: "get_TBLvente/"+periode+"/"+Exercice,
      type: "GET", // Le nom du fichier indiqué dans le formulaire
      dataType: "json", // Je sérialise les données (j'envoie toutes les valeurs présentes dans le formulaire)
      // dataFilter: 'json', //forme data
      success: function (responce) {
        $tabledata = "";
        // Je récupère la réponse du fichier PHP
        jQuery.each(responce.table_vente, function (key, item) {
          if (responce.table_vente.length == 0) {
          }
          $tabledata = responce.table_vente;
          $("#totalTTC").text(responce.totalTTC);
          $("#totalTVA").text(responce.totalTVA);
          $("#totalHT").text(responce.totalHT);
        });
        
        dataTable($tabledata);
        //trigger download of data.xlsx file
        document
          .getElementById("download-xlsx")
          .addEventListener("click", function () {
            table.download("xlsx", "data.xlsx", { sheetName: "My Data" });
          });
  
        //trigger download of data.pdf file
        document
          .getElementById("download-pdf")
          .addEventListener("click", function () {
            table.download("pdf", "data.pdf", {
              orientation: "portrait", //set page orientation to portrait
              title: "Succursale", //add title to report
            });
          });
      },
    });
  }
  function dataTable($tabledata)
{
   var table = new Tabulator("#Liste-Vente", {
    printAsHtml: true,
    printStyled: true,
    // height: 220,
    data: $tabledata,
    layout: "fitColumns",
    pagination: "local",
    printHeader: "",
    printFooter: "",
    height:"580px",
    paginationSize: 20,
    paginationSizeSelector: [40, 45, 50, 55],
    placeholder: "No matching records found",
    tooltips: true,
    //custom formatter definition
    // responsiveLayout:"hide",  //hide columns that don't fit on the table
    // addRowPos:"top",          //when adding a new row, add it to the top of the table
    // history:true,             //allow undo and redo actions on the table
    // paginationCounter:"rows", //display count of paginated rows in footer
    // movableColumns:true,      //allow column order to be changed
    initialSort: [{ column: "id", dir: "desc" }],
    columnDefaults: {
      tooltip: true, //show tool tips on cells
    },

    columns: [
      {
        title: "Action",
        minWidth: 110,
        field: "actions",
        responsive: 1,
        hozAlign: "center",
        vertAlign: "middle",
        print: false,
        download: false,
        formatter(cell, formatterParams) {
          let a = $(`<div class="flex lg:justify-center items-center">
                              
                                        <a  class="edit lex items-center text-success"  data-toggle="modal" style="font-size: large;" data-target=".bd-example-modal-lg"  mr-3" title="Modifier" href="javascript:;"  >
                                        <i class="las la-edit"></i>
                                        </a>
                                        <a  class="mb-2 mr-2 delete" data-toggle="modal" data-target="#delet_Vente">
                                        <i class="lar la-trash-alt text-danger font-20 mr-2"></i>
                                        </a>
                                   
                        </div>`);

          $(a)
            .find(".delete")
            .on("click", function ()
             { 
              jQuery.ajax({
                url: "./get_ventebyID/" + cell.getData().id,
                type: "GET", // Le nom du fichier indiqué dans le formulaire
                dataType: "json", // Je sérialise les données (j'envoie toutes les valeurs présentes dans le formulaire)
                // dataFilter: 'json', //forme data
                success: function (responce) {
                  jQuery.each(responce.get_vent, function (key, item) {
                    document.getElementById("delete_id_Vente").value =responce.get_vent.id;
                  });
                },
              });
            });

          $(a)
            .find(".edit")
            .on("click", function () 
            {
              document.getElementById('header-text').innerHTML='modifier Vente';
              document.getElementById('add_vtn').style.display='none';
              document.getElementById('update').style.display='initial';
              document.getElementById("id_Vente").value =cell.getData().id;
             
              jQuery.ajax({
                url: "./get_ventebyID/" + cell.getData().id,
                type: "GET", // Le nom du fichier indiqué dans le formulaire
                dataType: "json", // Je sérialise les données (j'envoie toutes les valeurs présentes dans le formulaire)
                success: function (responce) {
                  // affichage select
                  jQuery.each(responce.get_vent, function (key, item) {
                    
                    
                   
                    document.getElementById("desc").value = responce.get_vent.Designation;
                    document.getElementById("n_fact").value =responce.get_vent.N_facture;
                    document.getElementById("date_fact").value = responce.get_vent.Date_facture;
                    document.getElementById("date_p").value = responce.get_vent.Date_payment;
                    document.getElementById("MTttc").value =responce.get_vent.M_TTC;
           
                    if(responce.get_vent.Taux7==7)
                   {     $("#rowracine").css("display", "inherit");  
                      document.getElementById("MHT_1").value = responce.get_vent.M_HT_7;
                      document.getElementById("tva_1").value = responce.get_vent.TVA_7;
                      document.getElementById("ttc1").value = responce.get_vent.TTC_7;
                      var idToSelect = responce.get_vent.FK_racines_7;
                     
                      var selectElement = document.getElementById("racine");
                     for (var i = 0; i < selectElement.options.length; i++) {
                     var option = selectElement.options[i]; if (option.value == idToSelect) {
                      option.selected = true;
                      break; 
                       }
                     }
                     var event = new Event('change');
                     selectElement.dispatchEvent(event);
                    }
                    if(responce.get_vent.Taux10==10)
                    {       $("#rowracine1").css("display", "inherit");
                       document.getElementById("MHT_2").value = responce.get_vent.M_HT_10;
                       document.getElementById("tva_2").value = responce.get_vent.TVA_10;
                       document.getElementById("ttc2").value = responce.get_vent.TTC_10;
                       var idToSelect = responce.get_vent.FK_racines_10;
                       var selectElement = document.getElementById("racine2");
                      for (var i = 0; i < selectElement.options.length; i++) {
                      var option = selectElement.options[i];
                      if (option.value == idToSelect) {
                        option.selected = true;
                        break; 
                         }
                       }
                       var event = new Event('change');
                       selectElement.dispatchEvent(event);
                     }
                     if(responce.get_vent.Taux14==14)
                     {   
                      $("#rowracine2").css("display", "inherit"); 
                      document.getElementById("taux3").value = responce.get_vent.Taux14;
                        document.getElementById("MHT_3").value = responce.get_vent.M_HT_14;
                        document.getElementById("tva_3").value = responce.get_vent.TVA_14;
                        document.getElementById("ttc3").value = responce.get_vent.TTC_14;
                        var idToSelect = responce.get_vent.FK_racines_14;
                        var selectElement = document.getElementById("racine3");
                       for (var i = 0; i < selectElement.options.length; i++) {
                       var option = selectElement.options[i];
                       if (option.value == idToSelect) {
                        option.selected = true;
                        break; 
                         }
                       }
                       var event = new Event('change');
                       selectElement.dispatchEvent(event);
                       }
                       if(responce.get_vent.Taux20==20)
                       {    
                            $("#rowracine3").css("display", "inherit");
                          document.getElementById("MHT_4").value = responce.get_vent.M_HT_20;
                          document.getElementById("tva_4").value = responce.get_vent.TVA_20;
                          document.getElementById("ttc4").value = responce.get_vent.TTC_20;
                          document.getElementById("taux4").value = responce.get_vent.Taux20;


                          var idToSelect = responce.get_vent.FK_racines_20;
                          var selectElement = document.getElementById("racine4");
                         for (var i = 0; i < selectElement.options.length; i++) {
                         var option = selectElement.options[i];
                         if (option.value == idToSelect) {
                          console.log(option.value);
                          option.selected = true;
                          break; 
                           }
                         }
                         var event = new Event('change');
                         selectElement.dispatchEvent(event);
                         $("#add-btn4").css("display", "inline");
      }
                 if(document.getElementById("tva_3").value==''){
                
                  $("#rowracine2").css("display", "none");
                 }
                 if(document.getElementById("tva_1").value==''){
                
                  $("#rowracine").css("display", "none");
                 }
                 if(document.getElementById("tva_2").value==''){
                
                  $("#rowracine1").css("display", "none");
                 }
                  
                    var idToSelect = responce.get_vent.idC;
                    var selectElement = document.getElementById("Client");
                   for (var i = 0; i < selectElement.options.length; i++) {
                   var option = selectElement.options[i];
                   if (option.value == idToSelect) {
                    option.selected = true;
                    break; 
                     }
                   }
                   var event = new Event('change');
                   selectElement.dispatchEvent(event);
                    var idToSelect = responce.get_vent.idp;
                    var selectElement = document.getElementById("Mpayement");
                   for (var i = 0; i < selectElement.options.length; i++) {
                   var option = selectElement.options[i];
                   if (option.value == idToSelect) {
                    option.selected = true;
                    break; 
                     }
                   }
                   var event = new Event('change');
                   selectElement.dispatchEvent(event);
            
                  
                  });
                },
              });
            });
          return a[0];
        },
      },
      {
        title: "Mode_p",
        field: "M_HT_20",
        minWidth: 100,
        vertAlign: "middle",
        print: true,
        download: true,
        headerFilter:"input"
      },
      {
        title: "Racine",
        field: "num_racine_7",
        minWidth: 100,
        vertAlign: "middle",
        print: true,
        download: true,
        headerFilter:"input"
      },
      {
        title: "Date_fact",
        field: "Date_facture",
        minWidth: 100,
        vertAlign: "middle",
        print: true,
        download: true,
        headerFilter: "input",
      },
      {
        title: "Date_payement",
        field: "Date_payment",
        minWidth: 100,
        vertAlign: "middle",
        print: true,
        download: true,
        headerFilter: "input",
      },
      {
        title: "Client",
        field: "TVA_10",
        minWidth: 100,
        vertAlign: "middle",
        print: true,
        download: true,
        headerFilter: "input",
      },
      {
        title: "TTC",
        field: "M_TTC",
        minWidth: 100,
        vertAlign: "middle",
        print: true,
            download: true,
      },
      {
        title: "TVA",
        field: "TVA_7",
        minWidth: 100,
        vertAlign: "middle",
        print: true,
        download: true,
      },
      {
        title: "taux",
        field: "Taux7",
        minWidth: 100,
        vertAlign: "middle",
        print: true,
        download: true,
        headerFilter:"input"
      },
      {
        title: "Mht",
        minWidth: 100,
        width: 43,
        field: "M_HT_7",
        hozAlign: "center",
        vertAlign: "middle",
        print: true,
        download: true,
      },
      {
        title: "des",
        minWidth: 100,
        width: 43,
        field: "Designation",
        hozAlign: "center",
        vertAlign: "middle",
        print: true,
            download: true,
        headerFilter:"input",
        editor: true,
      },
      {
        title: "Nfact",
        width: 95,
        field: "N_facture",
        vertAlign: "middle",
        print: true,
            download: true,
        editor: true,
        headerFilter:"input"
      },

      // For print format
    ],

    rowDblClick: function (e, row) { },
  });

  document
  .getElementById("download-xlsx")
  .addEventListener("click", function () {
    table.download("xlsx", "data.xlsx", { sheetName: "My Data" });
  });
}
function viderChamps() {
  document.getElementById("desc").value = "";
  document.getElementById("n_fact").value = "";
  document.getElementById("date_fact").value = "";
  document.getElementById("date_p").value = "";
  document.getElementById("MTttc").value = "";
  document.getElementById("MHT_1").value = "";
  document.getElementById("taux1").value = "";
  document.getElementById("tva_1").value = "";
  document.getElementById("ttc1").value = "";
  var selectElement = document.getElementById("racine");
  for (var i = 0; i < selectElement.options.length; i++) {
    var option = selectElement.options[i];
    if (option.value == "null") {
      option.selected = true;
      break;
    }
  }
  var event = new Event("change");
  selectElement.dispatchEvent(event);

  document.getElementById("MHT_2").value = "";
  document.getElementById("tva_2").value = "";
  document.getElementById("ttc2").value = "";
  document.getElementById("taux2").value = "";
  var selectElement = document.getElementById("racine2");
  for (var i = 0; i < selectElement.options.length; i++) {
    var option = selectElement.options[i];
    if (option.value == "null") {
      option.selected = true;
      break;
    }
  }
  var event = new Event("change");
  selectElement.dispatchEvent(event);

  document.getElementById("MHT_3").value = "";
  document.getElementById("tva_3").value = "";
  document.getElementById("ttc3").value = "";
  document.getElementById("taux3").value = "";
  var selectElement = document.getElementById("racine3");
  for (var i = 0; i < selectElement.options.length; i++) {
    var option = selectElement.options[i];
    if (option.value == "null") {
      option.selected = true;
      break;
    }
  }
  var event = new Event("change");
  selectElement.dispatchEvent(event);
  document.getElementById("MHT_4").value = "";
  document.getElementById("tva_4").value = "";
  document.getElementById("ttc4").value = "";
  document.getElementById("taux4").value = "";

  var selectElement = document.getElementById("racine4");
  for (var i = 0; i < selectElement.options.length; i++) {
    var option = selectElement.options[i];
    if (option.value == "null") {
      option.selected = true;
      break;
    }
  }
  var event = new Event("change");
  selectElement.dispatchEvent(event);
  var selectElement = document.getElementById("Client");
  for (var i = 0; i < selectElement.options.length; i++) {
    var option = selectElement.options[i];
    if (option.value == "null") {
      option.selected = true;
      break;
    }
  }
  var event = new Event("change");
  selectElement.dispatchEvent(event);
  var selectElement = document.getElementById("Mpayement");
  for (var i = 0; i < selectElement.options.length; i++) {
    var option = selectElement.options[i];
    if (option.value == "null") {
      option.selected = true;
      break;
    }
  }
  var event = new Event("change");
  selectElement.dispatchEvent(event);

  document.getElementById('add_vtn').innerHTML='Ajouter ';
  document.getElementById('header-text').innerHTML="Ajouter Vente";
  $("#rowracine").css("display", "flex");
  $("#rowracine3").css("display", "none");
  $("#rowracine1").css("display", "none");
  $("#rowracine2").css("display", "none");
  $("#add-btn").css("display", "inline");
  $("#add-btn4").css("display", "none");
}