$('.select2').select2();
$(window).on("load", function () {
  get_info();
  Liste_FRS();
  Liste_Mpyement();
  Liste_Racine();
  table_Achat();
  gestYears();

  
  // $("#taux1").prop("readonly", true);
});

$(document).ready(function () {
  // $(".edit").on("click", function (e) {
   
  
   
  // });
  $("#Add_Achat").on("submit", function (e) {

 let= button= document.getElementById('add_ach').innerHTML;


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
    console.log(periode);
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

  $('#frs').on('select2:select', function (e) {
    // myFunction();
    let value = $('#frs').val();

    jQuery.ajax({
      url: "./get_FRS/" + value,
      type: "GET",
      dataType: "json",
      success: function (responce) {
        $tabledata = responce.get_FRS;
        jQuery.each(responce.get_FRS, function (key, item) {
          $("#N_ICE").val($tabledata.NICE);
          $("#id_fiscal").val($tabledata.ID_fiscale);
          $("#desc").val($tabledata.Designation);
          // myFunction();
        });

      },
    });

  });
  $('#racine').on('select2:select', function (e) {
    let value = $('#racine').val();

    jQuery.ajax({
      url: "./get_racine/" + value,
      type: "GET",
      dataType: "json",
      success: function (responce) {
        $tabledata = responce.get_racine;

        jQuery.each(responce.get_racine, function (key, item) {
          $("#taux1").val($tabledata.Taux);
        });

      },
    });

  });
  $('#racine2').on('select2:select', function (e) {
 
    let value = $('#racine2').val();

    jQuery.ajax({
      url: "./get_racine/" + value,
      type: "GET",
      dataType: "json",
      success: function (responce) {
        $tabledata = responce.get_racine;

        jQuery.each(responce.get_racine, function (key, item) {
          $("#taux2").val($tabledata.Taux);
        });

      },
    });

  });
  $('#racine3').on('select2:select', function (e) {
    let value = $('#racine3').val();

    jQuery.ajax({
      url: "./get_racine/" + value,
      type: "GET",
      dataType: "json",
      success: function (responce) {
        $tabledata = responce.get_racine;

        jQuery.each(responce.get_racine, function (key, item) {
          $("#taux3").val($tabledata.Taux);
        });

      },
    });

  });

  $('#periode').on('select2:select', function (e) {
    // myFunction();
    let periode = $('#periode').val();
    let Exercice = $('#Exercice').text();
    jQuery.ajax({
      url: "./get_TBLachat/" + periode+"/"+Exercice,
      type: "GET",
      dataType: "json",
      success: function (responce) {
        $tabledata = "";
        // Je récupère la réponse du fichier PHP
        jQuery.each(responce.get_TBLachat, function (key, item) {
          if (responce.get_TBLachat.length == 0) {
          }
          $tabledata = responce.get_TBLachat;
          console.log( $tabledata);
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

  });
  $('#basic-dt').DataTable({
    "language": {
      "paginate": {
        "previous": "<i class='las la-angle-left'></i>",
        "next": "<i class='las la-angle-right'></i>"
      }
    },
    "lengthMenu": [5, 10, 15, 20],
    "pageLength": 5
  });
  $('#dropdown-dt').DataTable({
    "language": {
      "paginate": {
        "previous": "<i class='las la-angle-left'></i>",
        "next": "<i class='las la-angle-right'></i>"
      }
    },
    "lengthMenu": [5, 10, 15, 20],
    "pageLength": 5
  });
  $('#last-page-dt').DataTable({
    "pagingType": "full_numbers",
    "language": {
      "paginate": {
        "first": "<i class='las la-angle-double-left'></i>",
        "previous": "<i class='las la-angle-left'></i>",
        "next": "<i class='las la-angle-right'></i>",
        "last": "<i class='las la-angle-double-right'></i>"
      }
    },
    "lengthMenu": [3, 6, 9, 12],
    "pageLength": 3
  });
  $.fn.dataTable.ext.search.push(
    function (settings, data, dataIndex) {
      var min = parseInt($('#min').val(), 10);
      var max = parseInt($('#max').val(), 10);
      var age = parseFloat(data[3]) || 0; // use data for the age column
      if ((isNaN(min) && isNaN(max)) ||
        (isNaN(min) && age <= max) ||
        (min <= age && isNaN(max)) ||
        (min <= age && age <= max)) {
        return true;
      }
      return false;
    }
  );
  var table = $('#range-dt').DataTable({
    "language": {
      "paginate": {
        "previous": "<i class='las la-angle-left'></i>",
        "next": "<i class='las la-angle-right'></i>"
      }
    },
    "lengthMenu": [5, 10, 15, 20],
    "pageLength": 5
  });
  $('#min, #max').keyup(function () {
    table.draw();
  });
  $('#export-dt').DataTable({
    dom: '<"row"<"col-md-6"B><"col-md-6"f> ><""rt> <"col-md-12"<"row"<"col-md-5"i><"col-md-7"p>>>',
    buttons: {
      buttons: [{
        extend: 'excel',
        className: 'btn btn-soft-secondary'
      },
      {
        extend: 'pdf',
        className: 'btn btn-secondary'
      },
      {
        extend: 'print',
        className: 'btn btn-soft-info'
      }
      ]
    },
    "language": {
      "paginate": {
        "previous": "<i class='las la-angle-left'></i>",
        "next": "<i class='las la-angle-right'></i>"
      }
    },
    "lengthMenu": [7, 10, 20, 50],
    "pageLength": 7
  });
  // Add text input to the footer
  $('#single-column-search tfoot th').each(function () {
    var title = $(this).text();
    $(this).html('<input type="text" class="form-control" placeholder="Search ' + title +
      '" />');
  });
  // Generate Datatable
  var table = $('#single-column-search').DataTable({
    "language": {
      "paginate": {
        "previous": "<i class='las la-angle-left'></i>",
        "next": "<i class='las la-angle-right'></i>"
      }
    },
    "lengthMenu": [5, 10, 15, 20],
    "pageLength": 5
  });
  // Search
  table.columns().every(function () {
    var that = this;
    $('input', this.footer()).on('keyup change', function () {
      if (that.search() !== this.value) {
        that
          .search(this.value)
          .draw();
      }
    });
  });
  var table = $('#toggle-column').DataTable({
    "language": {
      "paginate": {
        "previous": "<i class='las la-angle-left'></i>",
        "next": "<i class='las la-angle-right'></i>"
      }
    },
    "lengthMenu": [5, 10, 15, 20],
    "pageLength": 5
  });
  $('a.toggle-btn').on('click', function (e) {
    e.preventDefault();
    // Get the column API object
    var column = table.column($(this).attr('data-column'));
    // Toggle the visibility
    column.visible(!column.visible());
    $(this).toggleClass("toggle-clicked");
  });
  // $('#racine').change(function () {
  //   setTimeout(function () {
  //     let ttc = $("#ttc").val();
  //     let tva_1 = $("#tva_1").val();
  //     let MHT_1 = $("#MHT_1").val();

  //     if (ttc != '') {

  //       let taux1 = parseFloat($("#taux1").val());
  //       let mht = ttc / (1 + taux1);
  //       mht = mht.toFixed(2);
  //       let tva = ttc - mht;
  //       tva = tva.toFixed(2);
  //       $("#MHT_1").val(mht);
  //       $("#tva_1").val(tva);


  //     } else {
  //       if (tva_1 != '') {
  //         let taux1 = $("#taux1").val();
  //         console.log(taux1);
  //         let mht = tva_1 / taux1;
  //         let ttc = mht + parseFloat(tva_1);
  //         mht = mht.toFixed(2);
  //         ttc = parseFloat(ttc).toFixed(2);
  //         $("#MHT_1").val(mht);
  //         $("#ttc").val(ttc);
  //       } else {
  //         if (MHT_1 = '') {
  //           let taux1 = parseFloat($("#taux1").val());
  //           let TVA = MHT_1 * taux1;
  //           let ttc = MHT_1 + TVA;
  //           MHT_1 = MHT_1.toFixed(2);
  //           ttc = ttc.toFixed(2);
  //           $("#tva_1").val(TVA);
  //           $("#ttc").val(ttc);
  //         }
  //       }
  //     }
  //   }, 500);
  // });


});

// function myFunction() {

//   let frs = document.getElementById("frs");
//   let desc = document.getElementById("desc");


//   // Convert input values to lowercase for case-insensitive comparison

//   let descValue = desc.value.toLowerCase();
//   let selectedOption = frs.options[frs.selectedIndex];
//   let selectedText = selectedOption.text.toLowerCase();

//   if (descValue.startsWith("elect") && selectedText === "lydec") {

  
//     $("#colracine").css("display", "none");
//     $("#select").css("display", "none");
//     $("#colracine1").css("display", "block");
//     // $("#racine").val(1);ID OF RACINE 7 IN LEDYC ELECT
//     $("#taux1").val(7);
//     $("#taux2").val(14);
//     $("#taux3").val(20);
//     $("#MHT_1").prop("readonly", true);
//     $("#ttc").prop("readonly", true);
//     $("#tva_1").prop("readonly", false);
//   } else {

//     $("#colracine").css("display", "block");
//     $("#select").css("display", "inline-block");
//     $("#colracine1").css("display", "none");
//     $("#taux1").prop("readonly", true);
//   }
// }

function Liste_FRS() {
  jQuery.ajax({
    url: "./FK_FRS",
    type: "GET",
    dataType: "json",
    success: function (responce) {
      var $lignes = '<option value="null">Sélectionner</option>';
      jQuery.each(responce.Liste_FRS, function (key, item) {
        $lignes =
          $lignes +
          '<option value="' +
          item.id +
          '">' +
          item.name +
          "</option>";
      });
      $("#frs").html($lignes);
    },
  });
}
function Liste_Mpyement() {
  jQuery.ajax({
    url: "./FK_Mpayement",
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
    url: "./get_info",
    type: "GET",
    dataType: "json",
    success: function (responce) {
    
    let selectElement=("#Exercice");
    var $lignes;
    $tabledata = responce.Liste_regimes;
  
      jQuery.each( $tabledata, function (key, item) {
       
        
        if(item.libelle==responce.regime[0].libelle){
         
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
      var $newOption = $("<option selected='selected'></option>").text(responce.get_info.Exercice);
      $("#Exercice").append($newOption).trigger('change');
      $("#faitG").val(responce.get_info.FK_fait_generateurs);
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
    },
  });
}
function checkDate() {

  var inputDate = new Date(document.getElementById("date_p").value);
  var currentDate = new Date();

  // Calculate the date exactly one year ago from the current date
  var oneYearAgo = new Date();
  oneYearAgo.setFullYear(currentDate.getFullYear() - 1);

  if (inputDate < oneYearAgo) {
    alert("la date est supérieur plus un an que la date de systeme");
    document.getElementById("date_p").value = '';
  }
}
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
        // $("#MHT_4").prop("readonly", false);
        // $("#tva_4").prop("readonly", true);

        $("#ttc1").prop("readonly", true);
        $("#ttc2").prop("readonly", true);
        $("#ttc3").prop("readonly", true);
        // $("#ttc4").prop("readonly", true);
        $("#MHT_1").focus();
      } else if (radio.id === "TVA") {
        $("#MHT_1").prop("readonly", true);
        $("#tva_1").prop("readonly", false);
       
        $("#MHT_2").prop("readonly", true);
        $("#tva_2").prop("readonly", false);
        $("#MHT_3").prop("readonly", true);
        $("#tva_3").prop("readonly", false);
        // $("#MHT_4").prop("readonly", true);
        // $("#tva_4").prop("readonly", false);

        $("#ttc1").prop("readonly", true);
        $("#ttc2").prop("readonly", true);
        $("#ttc3").prop("readonly", true);
        // $("#ttc4").prop("readonly", true);
       
        $("#tva_1").focus();
      } else if (radio.id === "TTC") {
        $("#MHT_1").prop("readonly", true);
        $("#tva_1").prop("readonly", true);
      
        $("#MHT_2").prop("readonly", true);
        $("#tva_2").prop("readonly", true);
        $("#MHT_3").prop("readonly", true);
        $("#tva_3").prop("readonly", true);
        // $("#MHT_4").prop("readonly", true);
        // $("#tva_4").prop("readonly", true);

        $("#ttc1").prop("readonly", false);
        $("#ttc2").prop("readonly", false);
        $("#ttc3").prop("readonly", false);
        // $("#ttc4").prop("readonly", false);
        $("#ttc1").focus();
      } else if (radio.id === "LIBRE") {
        $("#MHT_1").prop("readonly", false);
        $("#tva_1").prop("readonly", false);
       
        $("#MHT_2").prop("readonly", false);
        $("#tva_2").prop("readonly", false);
        $("#MHT_3").prop("readonly", false);
        $("#tva_3").prop("readonly", false);
        // $("#MHT_4").prop("readonly", false);
        // $("#tva_4").prop("readonly", false);

        $("#ttc1").prop("readonly", false);
        $("#ttc2").prop("readonly", false);
        $("#ttc3").prop("readonly", false);
        // $("#ttc4").prop("readonly", false);
      }
    });
  });
});
function calcul_ttc1() {
  let ttc = $("#MTttc").val();
  let ttc1 = $("#ttc1").val();

  let taux1 = $("#taux1").val(); 
  var radioButtons = document.querySelectorAll("input[name='radios5']");

  radioButtons.forEach(function (radio) {
  if (radio.id === "TTC" && radio.checked){

  if (ttc1 != '') {
    if (taux1 == '') {
      alert('merci de choiser la rubrique de tva');
    } else {
      if (ttc1 != '') {
        console.log(ttc1);
        
        let mht = parseFloat(ttc1) / (1 + parseFloat(taux1));
        mht = mht.toFixed(2);
        let tva = parseFloat(ttc1) - parseFloat(mht);
        tva = tva.toFixed(2);
        $("#MHT_1").val(mht);
        $("#tva_1").val(tva);
      }
    }
  }
  }else
  {
    if(ttc=='')
    {
      ttc=0;
    }
    if(ttc1!='')
    {
      $("#MTttc").val(parseFloat(ttc)+parseFloat(ttc1));
    }
  
  }});
}
function calcul_ttc2() {
  let ttc = $("#MTttc").val();
  let ttc2 = $("#ttc2").val();
  let taux2 = $("#taux2").val();
  var radioButtons = document.querySelectorAll("input[name='radios5']");

  radioButtons.forEach(function (radio) {
  if (radio.id === "TTC" && radio.checked){
  if (ttc2 != '') {
    if (taux2 == '') {
      alert('merci de choiser la rubrique de tva');
    } else {
      if (ttc2 != '') {
        $("#MTttc").val(parseFloat(ttc)+parseFloat(ttc2));
        let mht = parseFloat(ttc2) / (1 + parseFloat(taux2));
        mht = parseFloat(mht).toFixed(2);
        let tva = parseFloat(ttc2) - parseFloat(mht);
        tva =parseFloat(tva).toFixed(2);
        $("#MHT_2").val(mht);
        $("#tva_2").val(tva);
      }
    }
  }
  }else{
    if(ttc=='')
    {
      ttc=0;
    }
    if(ttc2!='')
    {
    $("#MTttc").val(parseFloat(ttc)+parseFloat(ttc2));}
  }
});
}
function calcul_ttc3() {
  let ttc = $("#MTttc").val();
  let ttc3 = $("#ttc3").val();
  let taux3 = $("#taux3").val();
 
  var radioButtons = document.querySelectorAll("input[name='radios5']");

  radioButtons.forEach(function (radio) {
  if (radio.id === "TTC" && radio.checked){
  if (ttc3 != '') {
    if (taux3 == '') {
      alert('merci de choiser la rubrique de tva');
    } else {
      if (ttc3 != '') {
        $("#MTttc").val(parseFloat(ttc)+parseFloat(ttc3));
        let mht = parseFloat(ttc3) / (1 + parseFloat(taux3));
        mht = mht.toFixed(2);
        let tva = parseFloat(ttc3) - parseFloat(mht);
        tva = tva.toFixed(2);
        $("#MHT_3").val(mht);
        $("#tva_3").val(tva);
      }
    }
  }
  }else{
    if(ttc=='')
    {
      ttc=0;
    }
    if(ttc3!='')
    {
    $("#MTttc").val(parseFloat(ttc)+parseFloat(ttc3));
  }}
});
}
function calcul_tva() {
  let tva_1 = $("#tva_1").val();
  let taux1 = $("#taux1").val();
  let mttc = $("#MTttc").val();
  var radioButtons = document.querySelectorAll("input[name='radios5']");

  radioButtons.forEach(function (radio) {
  if (radio.id === "TVA" && radio.checked){
  if (tva_1 != '') {
    console.log(taux1);
    if (taux1 == '') {
      alert('merci de choiser la rubrique de tva');
    } else {
      if (tva_1 != '') {
        console.log(tva_1);
        let mht = parseFloat(tva_1) / parseFloat(taux1);

        let ttc = parseFloat(mht) + parseFloat(tva_1);
        mht = mht.toFixed(2);
        ttc = parseFloat(ttc).toFixed(2);
        $("#MHT_1").val(mht);
        $("#ttc1").val(ttc);
        if(mttc=='')
        {
          mttc=0;
        }
        if(ttc!='')
        {
        $("#MTttc").val(parseFloat(mttc)+parseFloat(ttc));}
      }}}
    }

  });
}
function calcul_tva2() {
  let tva_2 = $("#tva_2").val();
  let taux2 = $("#taux2").val();
  let mttc = $("#MTttc").val();
  var radioButtons = document.querySelectorAll("input[name='radios5']");

  radioButtons.forEach(function (radio) {
  if (radio.id === "TVA" && radio.checked){
  if (tva_2 != '') {

    if (taux2 == '') {
      alert('merci de choiser la rubrique de tva');
    } else {
      if (tva_2 != '') {
        let mht = parseFloat(tva_2) / parseFloat(taux2);

           let ttc=parseFloat(mht)+parseFloat(tva_2);
        mht = parseFloat(mht).toFixed(2);
           ttc=parseFloat(ttc).toFixed(2);
        $("#MHT_2").val(mht);
         $("#ttc2").val(ttc);
         if(mttc=='')
         {
           mttc=0;
         }
         if(ttc!='')
         {
          console.log(mttc);
          console.log(ttc);
         $("#MTttc").val(parseFloat(mttc)+parseFloat(ttc));}
      }
    }
  }}});

}
function calcul_tva3() {
  let tva_3 = $("#tva_3").val();
  let taux3 = $("#taux3").val();
  let mttc = $("#MTttc").val();
  if (tva_3 != '') {

    if (taux3 == '') {
      alert('merci de choiser la rubrique de tva');
    } else {
      if (tva_3 != '') {
        let mht = parseFloat(tva_3) / parseFloat(taux3);

           let ttc=parseFloat(mht)+parseFloat(tva_3);
           mht = parseFloat(mht).toFixed(2);
           ttc=parseFloat(ttc).toFixed(2);
          $("#MHT_3").val(mht);
          $("#ttc3").val(ttc);
          if(mttc=='')
          {
            mttc=0;
          }
          if(ttc!='')
          {
           console.log(mttc);
           console.log(ttc);
          $("#MTttc").val(parseFloat(mttc)+parseFloat(ttc));}
      }
    }
  }

}
function calcul_HT() {
  let MHT_1 = $("#MHT_1").val();
  let taux1 = $("#taux1").val();
  let mttc = $("#MTttc").val();
  if (MHT_1 != '') {
    if (taux1 == '') {
      alert('merci de choiser la rubrique de tva');
    } else {
      if (MHT_1 != '') {
        let TVA = parseFloat(MHT_1) * parseFloat(taux1);
        let ttc = parseFloat(MHT_1) + parseFloat(TVA);
        MHT_1 = parseFloat(MHT_1).toFixed(2);
        ttc = parseFloat(ttc).toFixed(2);
        $("#tva_1").val(TVA);
        $("#ttc1").val(ttc);
        if(mttc=='')
        {
          mttc=0;
        }
        if(ttc!='')
        {
         console.log(mttc);
         console.log(ttc);
        $("#MTttc").val(parseFloat(mttc)+parseFloat(ttc));}
      }
    }
  }

}
function calcul_HT2() {
  let MHT_2 = $("#MHT_2").val();
  let taux2 = $("#taux2").val();
  let mttc = $("#MTttc").val();
  if (MHT_2 != '') {
    if (taux2 == '') {
      alert('merci de choiser la rubrique de tva');
    } else {
      if (MHT_2 != '') {
        let TVA = parseFloat(MHT_2) * parseFloat(taux2);
        let ttc = parseFloat(MHT_2) + parseFloat(TVA);
        MHT_2 = parseFloat(MHT_2).toFixed(2);
        ttc = parseFloat(ttc).toFixed(2);
        $("#tva_2").val(TVA);
        $("#ttc2").val(ttc);
        if(mttc=='')
        {
          mttc=0;
        }
        if(ttc!='')
        {
         console.log(mttc);
         console.log(ttc);
        $("#MTttc").val(parseFloat(mttc)+parseFloat(ttc));}
      }
    }
  }

}
function calcul_HT3() {
  let MHT_3 = $("#MHT_3").val();
  let taux3 = $("#taux3").val();
  let mttc = $("#MTttc").val();
  if (MHT_3 != '') {
    if (taux3 == '') {
      alert('merci de choiser la rubrique de tva');
    } else {
      if (MHT_3 != '') {
        let TVA = parseFloat(MHT_3) * parseFloat(taux3);
        let ttc = parseFloat(MHT_3) + parseFloat(TVA);
        MHT_3 = parseFloat(MHT_3).toFixed(2);
        ttc = parseFloat(ttc).toFixed(2);
        $("#tva_3").val(TVA);
        $("#ttc3").val(ttc);
        if(mttc=='')
        {
          mttc=0;
        }
        if(ttc!='')
        {
         console.log(mttc);
         console.log(ttc);
        $("#MTttc").val(parseFloat(mttc)+parseFloat(ttc));}
      }
    }
  }

}
function tva_didu() {
  let tva_1 = $("#tva_1").val();
  let tva_2 = $("#tva_2").val();
  let tva_3 = $("#tva_3").val();
  let prorata = $("#prorata").val();
  if (tva_1 != '') {
    let tva_did = tva_1 * prorata / 100;
    $("#tva_d1").val(tva_did);
  }
  if (tva_2 != '') {
    let tva_did = tva_2 * prorata / 100;
    $("#tva_d2").val(tva_did);
  }
  if (tva_3 != '') {
    let tva_did = tva_3 * prorata / 100;
    $("#tva_d3").val(tva_did);
  }
}
function checkNfact() {
  let value = $('#n_fact').val();

  jQuery.ajax({
    url: "./get_achat/" + value,
    type: "GET",
    dataType: "json",
    success: function (responce) {
      if (!jQuery.isEmptyObject(responce.get_achat)) {
        let duplicateFound = false;
        $tabledata = responce.get_achat;
        var ligne='';
        let mtd=0;
        let mttc=0;
        jQuery.each($tabledata, function (key, item) {
          if (!duplicateFound) {
            mttc=item.M_TTC;
            let nfact=item.N_facture;
         
            duplicateFound = true;
            ligne=ligne+'	N_facture :   '+nfact+ '         TTC :   '+mttc+'      \n';
          }
           mtd=item.MT_déduit;
            ligne=ligne+' '+'                    MT deduit :     '+item.MT_déduit+'        date   :   '+item.dateSaisie+   ' \n';
        });
        ligne=ligne+'Total déduit  :   '+mtd;
        $("#MTttc").val(mttc);
       alert(ligne);
      }
    },
  });

}
function table_Achat() {
  jQuery.ajax({
    url: "table_Achat",
    type: "GET", // Le nom du fichier indiqué dans le formulaire
    dataType: "json", // Je sérialise les données (j'envoie toutes les valeurs présentes dans le formulaire)
    // dataFilter: 'json', //forme data
    success: function (responce) {
      $tabledata = "";
      // Je récupère la réponse du fichier PHP
      jQuery.each(responce.table_achat, function (key, item) {
        if (responce.table_achat.length == 0) {
        }
        $tabledata = responce.table_achat;
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
  var table = new Tabulator("#Liste-Achat", {
    printAsHtml: true,
    printStyled: true,
    // height: 220,
    data: $tabledata,
    layout: "fitColumns",
    pagination: "local",
    printHeader: "",
    printFooter: "",
    paginationSize: 40,
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

        formatter(cell, formatterParams) {
          let a = $(`<div class="flex lg:justify-center items-center">
                              
                                        <a  class="edit lex items-center text-success"  data-toggle="modal"  data-target=".bd-example-modal-lg"  mr-3" title="Modifier" href="javascript:;"  >
                                        <i class="las la-edit"></i>
                                        </a>
                                    <a  class="mb-2 mr-2 delete" data-toggle="modal" >
                                    <i class="lar la-trash-alt text-danger font-20 mr-2"></i>
                                    </a>

                                   
                        </div>`);

          // $(a)
          //   .find(".delete")
          //   .on("click", function ()
          //    {
          //     jQuery.ajax({
          //       url: "./Agence/" + cell.getData().id,
          //       type: "GET", // Le nom du fichier indiqué dans le formulaire
          //       dataType: "json", // Je sérialise les données (j'envoie toutes les valeurs présentes dans le formulaire)
          //       // dataFilter: 'json', //forme data
          //       success: function (responce) {
          //         jQuery.each(responce.info_agence, function (key, item) {
          //           document.getElementById("delete_id_agence").value =
          //             item.id;
          //         });
          //       },
          //     });
          //   });

          $(a)
            .find(".edit")
            .on("click", function () 
            {
              document.getElementById('header-text').innerHTML='modifier Achat';
              document.getElementById('add_ach').innerHTML='modifier';
              document.getElementById("id_achat").value =cell.getData().id;
        
              jQuery.ajax({
                url: "./get_achatbyID/" + cell.getData().id,
                type: "GET", // Le nom du fichier indiqué dans le formulaire
                dataType: "json", // Je sérialise les données (j'envoie toutes les valeurs présentes dans le formulaire)
                success: function (responce) {
                  // affichage select

                  jQuery.each(responce.get_achatb, function (key, item) {
        console.log(responce.get_achatb);  
                     document.getElementById("N_ICE").value = responce.get_achatb.NICE;
                    document.getElementById("id_fiscal").value = responce.get_achatb.ID_fiscale;
                    document.getElementById("desc").value = responce.get_achatb.Designation;
                    document.getElementById("n_fact").value =responce.get_achatb.N_facture;
                    document.getElementById("date_fact").value = responce.get_achatb.Date_facture;
                    document.getElementById("date_p").value = responce.get_achatb.Date_payment;
                    document.getElementById("MTttc").value =responce.get_achatb.M_TTC;
                    document.getElementById("mtd").value =responce.get_achatb.MT_déduit;
                    document.getElementById("prorata").value = responce.get_achatb.Prorata;
                    document.getElementById("MHT_1").value = responce.get_achatb.M_HT_1;
                    document.getElementById("tva_1").value = responce.get_achatb.TVA_1;
                    document.getElementById("ttc1").value = responce.get_achatb.TTC_1;
                    document.getElementById("MHT_2").value = responce.get_achatb.M_HT_2;
                    document.getElementById("tva_2").value =responce.get_achatb.TVA_2;
                    document.getElementById("ttc2").value = responce.get_achatb.TTC_2;
                    document.getElementById("MHT_3").value = responce.get_achatb.M_HT_3;
                    document.getElementById("tva_3").value = responce.get_achatb.TVA_3;
                    document.getElementById("ttc3").value = responce.get_achatb.TTC_3;

                    // var $newOption = $("<option selected='selected'></option>").text(responce.get_achatb.name).val(responce.get_achatb.idfrs);
                    // $("#frs").append($newOption).trigger('change');


                    var idToSelect = responce.get_achatb.idfrs;
                    var selectElement = document.getElementById("frs");
                   for (var i = 0; i < selectElement.options.length; i++) {
                   var option = selectElement.options[i];
                   if (option.value == idToSelect) {
                    option.selected = true;
                    break; 
                     }
                   }
                   var event = new Event('change');
                   selectElement.dispatchEvent(event);

                    // var $newOption = $("<option selected='selected'></option>").text(responce.get_achatb.Nom_payment).val(responce.get_achatb.idp);
                    // $("#Mpayement").append($newOption).trigger('change');
                    
                    var idToSelect = responce.get_achatb.idp;
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




                   var idToSelect = responce.get_achatb.FK_racines_1;
                   var selectElement = document.getElementById("racine");
                  for (var i = 0; i < selectElement.options.length; i++) {
                  var option = selectElement.options[i];
                  if (option.value == idToSelect) {
                   option.selected = true;
                   break; 
                    }
                  }
                  var event = new Event('change');
                  selectElement.dispatchEvent(event);
                    // document.getElementById("FK_Regime").value =
                    //   item.FK_Regime;
                    // document.getElementById("FK_fait_generateurs").value =
                    //   item.FK_fait_generateurs;
                    //   document.getElementById("id_achat").value =
                    //   item.id;
             
                  });
                },
              });
            });
          return a[0];
        },
      },
      {
        title: "TVA_deductible",
        field: "TVA_deductible",
        minWidth: 100,
        vertAlign: "middle",
        // print: false,
        // download: false,
      },
      {
        title: "prorata",
        field: "Prorata",
        minWidth: 100,
        vertAlign: "middle",
        // print: false,
        // download: false,
      },
      {
        title: "Mode",
        field: "Nom_payment",
        minWidth: 100,
        vertAlign: "middle",
        // print: false,
        // download: false,
      },
      {
        title: "Racine",
        field: "Num_racines",
        minWidth: 100,
        vertAlign: "middle",
        // print: false,
        // download: false,
      },
      {
        title: "Date fact",
        field: "Date_facture",
        minWidth: 100,
        vertAlign: "middle",
        // print: false,
        // download: false,
      },
      {
        title: "Date payement",
        field: "Date_payment",
        minWidth: 100,
        vertAlign: "middle",
        // print: false,
        // download: false,
      },
      {
        title: "ID FIscal",
        field: "ID_fiscale",
        minWidth: 100,
        vertAlign: "middle",
        // print: false,
        // download: false,
      },
      {
        title: "ICE",
        field: "NICE",
        minWidth: 100,
        vertAlign: "middle",
        // print: false,
        // download: false,
      },
      {
        title: "FRS",
        field: "name",
        minWidth: 100,
        vertAlign: "middle",
        // print: false,
        // download: false,
      },
      {
        title: "TTC",
        field: "M_TTC",
        minWidth: 100,
        vertAlign: "middle",
        // print: false,
        // download: false,
      },
      {
        title: "TVA",
        field: "TVA_1",
        minWidth: 100,
        vertAlign: "middle",
        // print: false,
        // download: false,
      },
      {
        title: "taux",
        field: "Taux",
        minWidth: 100,
        vertAlign: "middle",
        // print: false,
        // download: false,
      },
      {
        title: "Mht",
        minWidth: 100,
        width: 43,
        field: "M_HT_1",
        hozAlign: "center",
        vertAlign: "middle",
        // print: false,
        // download: false,
      },
      {
        title: "des",
        minWidth: 100,
        width: 43,
        field: "Designation",
        hozAlign: "center",
        vertAlign: "middle",
        // print: false,
        // download: false,
        editor: true,
      },
      {
        title: "Nfact",
        width: 95,
        field: "N_facture",
        vertAlign: "middle",
        // print: false,
        editor: true,
      },

      // For print format
    ],

    rowDblClick: function (e, row) { },
  });
}
