$('.select2').select2();
$(window).on("load", function () {
  get_info();
  Liste_FRS();
  Liste_Mpyement();
  Liste_Racine();

  setTimeout(function () {
    // table_Achat();
    get_table();
  }, 1500); 
 
  gestYears();
  document.getElementById('update').style.display='none';
  $("#rowracine3").css("display", "none");
  // $("#taux1").prop("readonly", true);
});

$(document).ready(function () {
 
  $("#Add_Achat").on("submit", function (e) {
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
        // table_Achat();
        get_table();
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
  $("#update").on("click", function (e) {
    var id = $('#id_achat').val();
    var formData = [];
    var frs = $('#frs').val();
    var desc = $("#desc").val();
    var n_fact = $("#n_fact").val();
    var date_fact = $("#date_fact").val();
    var date_p = $("#date_p").val();
    var Mpayement = $("#Mpayement").val();
    var MTttc = $("#MTttc").val();
    var mtd = $("#mtd").val();
    var prorata = $("#prorata").val();
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
    var tva_d1 = $("#tva_d1").val();
    var tva_d2 = $("#tva_d2").val();
    var tva_d3 = $("#tva_d3").val();
    var tva_d4 = $("#tva_d4").val();
    var Exercice = $("#Exercice").val();
    var periode = $("#periode").val();
    var Taux1 = $("#taux1").val();
    var Taux2 = $("#taux2").val(); 
    var Taux3 = $("#taux3").val();
    var Taux4 = $("#taux4").val();
    formData.push(
      { name: "id", value: id },
      { name: "frs", value: frs },
      { name: "desc", value: desc },
      { name: "n_fact", value: n_fact },
      { name: "date_fact", value: date_fact },
      { name: "date_p", value: date_p },
      { name: "Mpayement", value: Mpayement },
      { name: "MTttc", value: MTttc },
      { name: "mtd", value: mtd },
      { name: "prorata", value: prorata },
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
      { name: "tva_d1", value: tva_d1 },
      { name: "tva_d2", value: tva_d2 },
      { name: "tva_d3", value: tva_d3 },
      { name: "tva_d4", value: tva_d4 },  
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

      url: "./update_achat",
      type: "get", // Le nom du fichier indiqué dans le formulaire
      data:formData, // Je sérialise les données (j'envoie toutes les valeurs présentes dans le formulaire)
  
      success: function (response) {
          // Je récupère la réponse du fichier PHP
          toastr.success(response.messages);
      },
      error: function (response) {
          toastr.error(response.Error);
      },
  });

  });
  $("#Delet_Achat").on("submit", function (e) {
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
      },
      error: function (response) {
        toastr.error(response.danger);
      },
    });
  });
  $("#achat_pdf").on("click", function (e) {
    let periode = $('#periode').val();
    let Exercice = $('#Exercice').val();
    window.open("./Etat_Achat/" + periode + "/" + Exercice);

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

  $('#periode').on('select2:select', function (e) {
    get_table();
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
    get_table();
  });
  $("#close").on("click", function (e) {
    viderChamps();
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
          item.nomFournisseurs +
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
    let $i=0;
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
        $i++;
        }
        $("#periode").html($lignes);
       
      });
      console.log(responce.periode)
      $("#periode").val(responce.periode);
      var $newOption = $("<option selected='selected'></option>").text(responce.get_info.Exercice).val(responce.get_info.Exercice);
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
       $("#racine4").html($lignes);
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
function calcul_ttc1() {

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
        // console.log(ttc1);
        
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
    if(ttc1=='')
    {
      ttc1=0;
    } if(ttc2=='')
    {
      ttc2=0;
    } if(ttc3=='')
    {
      ttc3=0;
    }
    if(ttc4=='')
    {
      ttc4=0;
    }
    
      $("#MTttc").val(parseFloat(ttc1)+parseFloat(ttc2)+parseFloat(ttc3));
    
  
  });tva_didu();
}
function calcul_ttc2() {

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
        
        let mht = parseFloat(ttc2) / (1 + parseFloat(taux2));
        mht = parseFloat(mht).toFixed(2);
        let tva = parseFloat(ttc2) - parseFloat(mht);
        tva =parseFloat(tva).toFixed(2);
        $("#MHT_2").val(mht);
        $("#tva_2").val(tva);
      }
    }
  }
  }
  let ttc1 = $("#ttc1").val();
  let ttc3 = $("#ttc3").val();
  let ttc4 = $("#ttc4").val();
  if(ttc1=='')
  {
    ttc1=0;
  } if(ttc2=='')
  {
    ttc2=0;
  } if(ttc3=='')
  {
    ttc3=0;
  }
  if(ttc4=='')
  {
    ttc4=0;
  }
  
    $("#MTttc").val(parseFloat(ttc1)+parseFloat(ttc2)+parseFloat(ttc3));
});tva_didu();
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
   
    let ttc2 = $("#ttc2").val();
    let ttc1 = $("#ttc1").val();
    let ttc4 = $("#ttc4").val();
    if(ttc1=='')
    {
      ttc1=0;
    } if(ttc2=='')
    {
      ttc2=0;
    } if(ttc3=='')
    {
      ttc3=0;
    }if(ttc4=='')
    {
      ttc4=0;
    }
    
    $("#MTttc").val(parseFloat(ttc1)+parseFloat(ttc2)+parseFloat(ttc3)+parseFloat(ttc4));}
});tva_didu();
}
function calcul_ttc4() {
  let ttc = $("#MTttc").val();
  let ttc4 = $("#ttc4").val();
  let taux4 = $("#taux4").val();
 
  var radioButtons = document.querySelectorAll("input[name='radios5']");

  radioButtons.forEach(function (radio) {
  if (radio.id === "TTC" && radio.checked){
  if (ttc4 != '') {
    if (taux4 == '') {
      alert('merci de choiser la rubrique de tva');
    } else {
      if (ttc4 != '') {
        $("#MTttc").val(parseFloat(ttc)+parseFloat(ttc4));
        let mht = parseFloat(ttc4) / (1 + parseFloat(taux4));
        mht = mht.toFixed(2);
        let tva = parseFloat(ttc4) - parseFloat(mht);
        tva = tva.toFixed(2);
        $("#MHT_4").val(mht);
        $("#tva_4").val(tva);
      }
    }
  }
  }else{
   
    let ttc2 = $("#ttc2").val();
    let ttc1 = $("#ttc1").val();
    let ttc3 = $("#ttc3").val();
    if(ttc1=='')
    {
      ttc1=0;
    } if(ttc2=='')
    {
      ttc2=0;
    } if(ttc4=='')
    {
      ttc4=0;
    } if(ttc3=='')
    {
      ttc3=0;
    }
    
      $("#MTttc").val(parseFloat(ttc1)+parseFloat(ttc2)+parseFloat(ttc3)+parseFloat(ttc4));}
});tva_didu();
}
function calcul_tva() {
  let tva_1 = $("#tva_1").val();
  let taux1 = $("#taux1").val();
  let mttc = $("#MTttc").val();
  var radioButtons = document.querySelectorAll("input[name='radios5']");

  radioButtons.forEach(function (radio) {
  if (radio.id === "TVA" && radio.checked){
  if (tva_1 != '') {
    // console.log(taux1);
    if (taux1 == '') {
      alert('merci de choiser la rubrique de tva');
    } else {
      if (tva_1 != '') {
        // console.log(tva_1);
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
        ttc4=parseFloat(ttc4).toFixed(2);
        if(ttc1=='')
        {
          ttc1=0;
        } if(ttc2=='')
        {
          ttc2=0;
        } if(ttc3=='')
        {
          ttc3=0;
        }
        if(ttc4=='')
        {
          ttc4=0;
        }
        
        $("#MTttc").val(parseFloat(ttc1)+parseFloat(ttc2)+parseFloat(ttc3)+parseFloat(ttc4));
      }}}
    }tva_didu();

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
         let ttc1 = $("#ttc1").val();
         let ttc2 = $("#ttc2").val();
         let ttc3 = $("#ttc3").val();
         let ttc4 = $("#ttc4").val();
         if(ttc1=='')
         {
           ttc1=0;
         } if(ttc2=='')
         {
           ttc2=0;
         } if(ttc3=='')
         {
           ttc3=0;
         }
         if(ttc4=='')
         {
           ttc4=0;
         }
         
         $("#MTttc").val(parseFloat(ttc1)+parseFloat(ttc2)+parseFloat(ttc3)+parseFloat(ttc4));
      }
    }
  }}tva_didu();
});

}
function calcul_tva3() {
  let tva_3 = $("#tva_3").val();
  let taux3 = $("#taux3").val();
  let mttc = $("#MTttc").val();
  var radioButtons = document.querySelectorAll("input[name='radios5']");

  radioButtons.forEach(function (radio) {
  if (radio.id === "TVA" && radio.checked){
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
          let ttc1 = $("#ttc1").val();
          let ttc2 = $("#ttc2").val();
          let ttc3 = $("#ttc3").val();
          let ttc4 = $("#ttc4").val();
          if(ttc1=='')
          {
            ttc1=0;
          } if(ttc2=='')
          {
            ttc2=0;
          } if(ttc3=='')
          {
            ttc3=0;
          }
          if(ttc4=='')
          {
            ttc4=0;
          }
          
          $("#MTttc").val(parseFloat(ttc1)+parseFloat(ttc2)+parseFloat(ttc3)+parseFloat(ttc4));
      }
    }}}tva_didu();
  });

}
function calcul_tva4() {
  let tva_4 = $("#tva_4").val();
  let taux4 = $("#taux4").val();

  if (tva_4 != '') {

    if (taux4 == '') {
      alert('merci de choiser la rubrique de tvaaaaa');
    } else {
      if (tva_4 != '') {
           let mht = parseFloat(tva_4) / parseFloat(taux4);
           let ttc=parseFloat(mht)+parseFloat(tva_4);
           mht = parseFloat(mht).toFixed(2);
           ttc=parseFloat(ttc).toFixed(2);
          $("#MHT_4").val(mht);
          $("#ttc4").val(ttc);
          let ttc1 = $("#ttc1").val();
          let ttc2 = $("#ttc2").val();
          let ttc3 = $("#ttc3").val();
          let ttc4 = $("#ttc4").val();

          if(ttc1=='')
          {
            ttc1=0;
          } if(ttc2=='')
          {
            ttc2=0;
          } if(ttc3=='')
          {
            ttc3=0;
          }
          if(ttc4=='')
          {
            ttc4=0;
          }
          
          $("#MTttc").val(parseFloat(ttc1)+parseFloat(ttc2)+parseFloat(ttc3)+parseFloat(ttc4));
      }
    }tva_didu();
  }

}
function calcul_HT() {
  let MHT_1 = $("#MHT_1").val();
  let taux1 = $("#taux1").val();

  var radioButtons = document.querySelectorAll("input[name='radios5']");

  radioButtons.forEach(function (radio) {
  if (radio.id === "TVA" && radio.checked){
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
        let ttc1 = $("#ttc1").val();
        let ttc2 = $("#ttc2").val();
        let ttc3 = $("#ttc3").val();
        let ttc4 = $("#ttc4").val();
        if(ttc1=='')
        {
          ttc1=0;
        } if(ttc2=='')
        {
          ttc2=0;
        } if(ttc3=='')
        {
          ttc3=0;
        }
        if(ttc4=='')
        {
          ttc4=0;
        }
        
        $("#MTttc").val(parseFloat(ttc1)+parseFloat(ttc2)+parseFloat(ttc3)+parseFloat(ttc4));
      }
    }
  }tva_didu();}});

}
function calcul_HT2() {
  let MHT_2 = $("#MHT_2").val();
  let taux2 = $("#taux2").val();
  var radioButtons = document.querySelectorAll("input[name='radios5']");

  radioButtons.forEach(function (radio) {
  if (radio.id === "TVA" && radio.checked){
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
        let ttc1 = $("#ttc1").val();
        let ttc2 = $("#ttc2").val();
        let ttc3 = $("#ttc3").val();
        let ttc4 = $("#ttc4").val();
        if(ttc1=='')
        {
          ttc1=0;
        } if(ttc2=='')
        {
          ttc2=0;
        } if(ttc3=='')
        {
          ttc3=0;
        }
        if(ttc4=='')
        {
          ttc4=0;
        }
        
        $("#MTttc").val(parseFloat(ttc1)+parseFloat(ttc2)+parseFloat(ttc3)+parseFloat(ttc4));
      }
    }
  }tva_didu();}});

}
function calcul_HT3() {
  let MHT_3 = $("#MHT_3").val();
  let taux3 = $("#taux3").val();
  var radioButtons = document.querySelectorAll("input[name='radios5']");

  radioButtons.forEach(function (radio) {
  if (radio.id === "TVA" && radio.checked){
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
        let ttc1 = $("#ttc1").val();
        let ttc2 = $("#ttc2").val();
        let ttc3 = $("#ttc3").val();
        let ttc4 = $("#ttc4").val();
        if(ttc1=='')
        {
          ttc1=0;
        } if(ttc2=='')
        {
          ttc2=0;
        } if(ttc3=='')
        {
          ttc3=0;
        }
        if(ttc4=='')
        {
          ttc4=0;
        }
        
        $("#MTttc").val(parseFloat(ttc1)+parseFloat(ttc2)+parseFloat(ttc3)+parseFloat(ttc4));
      }
    }
  }tva_didu();}});

}
function calcul_HT4() {
  let MHT_4 = $("#MHT_4").val();
  let taux4 = $("#taux4").val();
  var radioButtons = document.querySelectorAll("input[name='radios5']");

  radioButtons.forEach(function (radio) {
  if (radio.id === "TVA" && radio.checked){
  if (MHT_4 != '') {
    if (taux4 == '') {
      alert('merci de choiser la rubrique de tva');
    } else {
      if (MHT_4 != '') {
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
        if(ttc1=='')
        {
          ttc1=0;
        } if(ttc2=='')
        {
          ttc2=0;
        } if(ttc3=='')
        {
          ttc3=0;
        }
        if(ttc4=='')
        {
          ttc4=0;
        }
        
        $("#MTttc").val(parseFloat(ttc1)+parseFloat(ttc2)+parseFloat(ttc3)+parseFloat(ttc4));
      }
    }
  }tva_didu();}});

}
function tva_didu() {
  let tva_1 = $("#tva_1").val();
  let tva_2 = $("#tva_2").val();
  let tva_3 = $("#tva_3").val();
  let prorata = $("#prorata").val();
  if(prorata!=''){
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
  }}else{
    if (tva_1 != '') {
    $("#tva_d1").val(tva_1);}
    if (tva_2 != '') {
    $("#tva_d2").val(tva_2);}
    if (tva_3 != '') {
    $("#tva_d3").val(tva_3);}
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
      //  alert(ligne);
      }
    },
  });

}
function table_Achat() {
  let periode = $('#periode').val();
  let Exercice = $('#Exercice').val();
  // console.log(periode);
  jQuery.ajax({
    url: "table_Achat/"+periode+"/"+Exercice,
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
        print: false,
        download: false,
        formatter(cell, formatterParams) {
          let a = $(`<div class="flex lg:justify-center items-center">
                              
                                        <a  class="edit lex items-center text-success"  data-toggle="modal"  data-target=".bd-example-modal-lg"  mr-3" title="Modifier" href="javascript:;"  >
                                        <i class="las la-edit"></i>
                                        </a>
                                        <a  class="mb-2 mr-2 delete" data-toggle="modal" data-target="#delet_achat">
                                        <i class="lar la-trash-alt text-danger font-20 mr-2"></i>
                                        </a>
                                   
                        </div>`);

          $(a)
            .find(".delete")
            .on("click", function ()
             { 
              jQuery.ajax({
                url: "./get_achatbyID/" + cell.getData().id,
                type: "GET", // Le nom du fichier indiqué dans le formulaire
                dataType: "json", // Je sérialise les données (j'envoie toutes les valeurs présentes dans le formulaire)
                // dataFilter: 'json', //forme data
                success: function (responce) {
                  jQuery.each(responce.get_achatb, function (key, item) {
                    document.getElementById("delete_id_achat").value =responce.get_achatb.id;
                  });
                },
              });
            });

          $(a)
            .find(".edit")
            .on("click", function () 
            {
              document.getElementById('header-text').innerHTML='modifier Achat';
              document.getElementById('add_ach').style.display='none';
              document.getElementById('update').style.display='initial';
              document.getElementById("id_achat").value =cell.getData().id;
              console.log(cell.getData().id);
              jQuery.ajax({
                url: "./get_achatbyID/" + cell.getData().id,
                type: "GET", // Le nom du fichier indiqué dans le formulaire
                dataType: "json", // Je sérialise les données (j'envoie toutes les valeurs présentes dans le formulaire)
                success: function (responce) {
                  // affichage select
                  jQuery.each(responce.get_achatb, function (key, item) {
                    // console.log(responce.get_achatb.NICE);  
                     document.getElementById("N_ICE").value = responce.get_achatb.NICE;
                    document.getElementById("id_fiscal").value = responce.get_achatb.ID_fiscale;
                    document.getElementById("desc").value = responce.get_achatb.Designation;
                    document.getElementById("n_fact").value =responce.get_achatb.N_facture;
                    document.getElementById("date_fact").value = responce.get_achatb.Date_facture;
                    document.getElementById("date_p").value = responce.get_achatb.Date_payment;
                    document.getElementById("MTttc").value =responce.get_achatb.M_TTC;
                    // document.getElementById("mtd").value =responce.get_achatb.MT_déduit;
                    document.getElementById("prorata").value = responce.get_achatb.Prorata;
                
                    if(responce.get_achatb.Taux7==7)
                   {    
                      document.getElementById("MHT_1").value = responce.get_achatb.M_HT_7;
                      document.getElementById("tva_1").value = responce.get_achatb.TVA_7;
                      document.getElementById("ttc1").value = responce.get_achatb.TTC_7;
                      document.getElementById("tva_d1").value = responce.get_achatb.TVA_d7;
                      var idToSelect = responce.get_achatb.FK_racines_7;
                     
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
                    if(responce.get_achatb.Taux10==10)
                    {    
                       document.getElementById("MHT_2").value = responce.get_achatb.M_HT_10;
                       document.getElementById("tva_2").value = responce.get_achatb.TVA_10;
                       document.getElementById("ttc2").value = responce.get_achatb.TTC_10;
                      document.getElementById("tva_d2").value = responce.get_achatb.TVA_d10;

                       var idToSelect = responce.get_achatb.FK_racines_10;
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
                     if(responce.get_achatb.Taux14==14)
                     {    
                  
                        document.getElementById("MHT_3").value = responce.get_achatb.M_HT_14;
                        document.getElementById("tva_3").value = responce.get_achatb.TVA_14;
                        document.getElementById("ttc3").value = responce.get_achatb.TTC_14;
                      document.getElementById("tva_d3").value = responce.get_achatb.TVA_d14;

                        var idToSelect = responce.get_achatb.FK_racines_14;
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
                       if(responce.get_achatb.Taux20==20)
                       {    
                            $("#rowracine3").css("display", "inherit");
                          document.getElementById("MHT_4").value = responce.get_achatb.M_HT_20;
                          document.getElementById("tva_4").value = responce.get_achatb.TVA_20;
                          document.getElementById("ttc4").value = responce.get_achatb.TTC_20;
                          document.getElementById("taux4").value = responce.get_achatb.Taux20;
                      document.getElementById("tva_d4").value = responce.get_achatb.TVA_d20;

                          var idToSelect = responce.get_achatb.FK_racines_20;
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
                  });
                },
              });
            });
          return a[0];
        },
      },
      {
        title: "TVA_deductible",
        field: "TVA_d7",
        minWidth: 100,
        vertAlign: "middle",
        print: true,
        download: true,
      },
      {
        title: "prorata",
        field: "Prorata",
        minWidth: 100,
        vertAlign: "middle",
        print: true,
        download: true,
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
      },
      {
        title: "Date_payement",
        field: "Date_payment",
        minWidth: 100,
        vertAlign: "middle",
        print: true,
        download: true,
      },
      {
        title: "ID_FIscal",
        field: "TVA_20",
        minWidth: 100,
        vertAlign: "middle",
        print: true,
            download: true,
        headerFilter:"input"
      },
      {
        title: "ICE",
        field: "TVA_14",
        minWidth: 100,
        vertAlign: "middle",
        print: true,
        download: true,
        headerFilter:"input"
      },
      {
        title: "FRS",
        field: "TVA_10",
        minWidth: 100,
        vertAlign: "middle",
        print: true,
        download: true,
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

document
  .getElementById("file-upload")
  .addEventListener("change", handleFile);

function handleFile(event) {
  const file = event.target.files[0];
  const reader = new FileReader();

  reader.onload = function (e) {
    const data = new Uint8Array(e.target.result);
    const workbook = XLSX.read(data, { type: "array" });

    const sheetName = workbook.SheetNames[0];
    const worksheet = workbook.Sheets[sheetName];

    const tableData = XLSX.utils.sheet_to_json(worksheet, { header: 1 });
    createTabulatorTable(tableData);
  };

  reader.readAsArrayBuffer(file);
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
function generation_XML(){
       var formData = [];
       
       let Exercice =$("#Exercice").val();
       let periode =$("#periode").val(); 
       formData.push(
         { name: "Exercice", value: Exercice },
         { name: "periode", value: periode },
       );
        // Display a loading message
    toastr.options = {
      progressBar: true,
      closeButton: true,
  };
  // toastr.info("Generating XML file. Please wait...");

       jQuery.ajax({
         url: "./xml",
         type: "get", // Le nom du fichier indiqué dans le formulaire
         data: formData, // Je sérialise les données (j'envoie toutes les valeurs présentes dans le formulaire)
         // dataFilter: 'json', //forme data
         success: function (response) {
          // Access the 'responsexml' field from the JSON response
          var xmlData = response.responsexml;
        //  console.log(response);
          var blob = new Blob([response.responsexml], { type: "text/plain" });
          // console.log(blob);
          // Create a Blob from the XML data
          // Create a download link and trigger the download
          var link = document.createElement('a');
          link.href = window.URL.createObjectURL(blob);
          link.download = 'exported_data.xml';
          link.click();
      },
         error: function () {
             // Display an error message if something goes wrong
             toastr.error("Error generating XML file.");
         },
         
       });
    
   
}
function get_table()
{
  let periode = $('#periode').val();
  let Exercice = $('#Exercice').val();

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
        // console.log( $tabledata);
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

function createTabulatorTable(data) {

  // Define the getTableColumns function
  function getTableColumns(rowData) {
    // Implement the logic to generate column definitions based on rowData
    // For example:
    const columns = [];
    for (let i = 0; i < rowData.length; i++) {
      columns.push({ title: rowData[i], field: rowData[i] });
    }   
    console.log(columns);
    return columns; 
  
  }


  const table = new Tabulator("#Liste-Achat", {
    data: data,
    layout: "fitColumns",
    columns: getTableColumns(data[0]),
  });

  const dataArray = data.map((row) =>
    Object.fromEntries(row.map((cell, index) => [data[0][index], cell]))
  );
console.log(dataArray);
let Exercice =$("#Exercice").val();
let periode = $('#periode').val();
  dataArray.forEach(row => {
    var postData = {
      TVA_deductible: row.TVA_deductible, // Assuming index 0 corresponds to 'nomFournisseurs'
      prorata: row.prorata, // Assuming index 1 corresponds to 'Designation'
      Mode_p: row.Mode_p, // Assuming index 2 corresponds to 'Adresse'
      Date_fact: row.Date_fact,
      Date_payement: row.Date_payement,
      ID_FIscal: row.ID_FIscal,
      ICE: row.ICE,
      FRS:row.FRS,
      TTC: row.TTC,
      TVA: row.TVA,
      taux: row.taux,
      Mht: row.Mht,
      des: row.des,
      Nfact: row.Nfact,
      Racine: row.Racine,
      Exercice: Exercice,
      periode: periode,
       
    };
    console.log(postData);
    jQuery.ajax({
      headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
      },
      url: "./AddAchatjson",
      type: "get",
      data: postData,

      success: function (response) {
        toastr.success(response.message);
        get_table();
      },
      error: function (response) {
        toastr.error(response.Error);
      },
    });
  });
}
