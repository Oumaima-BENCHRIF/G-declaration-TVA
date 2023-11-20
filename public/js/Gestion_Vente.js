$('.select2').select2();
$(window).on("load", function () {
    Liste_Mpyement();
    get_info();
    Liste_Racine();
    document.getElementById('update').style.display='none';
  $("#rowracine3").css("display", "none");
  $("#rowracine1").css("display", "none");
  $("#rowracine2").css("display", "none");
  $("#add-btn").css("display", "inline");
  $("#add-btn4").css("display", "none");
  $("#add-btn3").css("display", "none");

});
$(document).ready(function () {
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