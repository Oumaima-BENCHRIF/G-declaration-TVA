$('.select2').select2();
$(window).on("load", function () {
  Liste_FRS();
  Liste_Mpyement();
  Liste_Racine();
  table_Achat();
  // $("#taux1").prop("readonly", true);
});

$(document).ready(function () {
  $("#update").on("click", function (e) {
   
    document.getElementById('header-text').innerHTML='modifier Achat';
    document.getElementById('add_ach').innerHTML='modifier';
   
  });
  $("#Add_Achat").on("submit", function (e) {

 let= button= document.getElementById('add_ach').innerHTML;


if(button=="ajouter")
{

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
      },
      error: function (response) {
        toastr.options = {
          progressBar: true,
          closeButton: true,
        };
        toastr.error("Merci de vérifier les champs");
      },
    });}else
    {
      
    }
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
  // $('#racine4').on('select2:select', function (e) {
  //   let value = $('#racine4').val();

  //   jQuery.ajax({
  //     url: "./get_racine/" + value,
  //     type: "GET",
  //     dataType: "json",
  //     success: function (responce) {
  //       $tabledata = responce.get_racine;

  //       jQuery.each(responce.get_racine, function (key, item) {
  //         $("#taux4").val($tabledata.Taux);
  //       });

  //     },
  //   });

  // });
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
  $('#racine').change(function () {
    setTimeout(function () {
      let ttc = $("#ttc").val();
      let tva_1 = $("#tva_1").val();
      let MHT_1 = $("#MHT_1").val();

      if (ttc != '') {

        let taux1 = parseFloat($("#taux1").val());
        let mht = ttc / (1 + taux1);
        mht = mht.toFixed(2);
        let tva = ttc - mht;
        tva = tva.toFixed(2);
        $("#MHT_1").val(mht);
        $("#tva_1").val(tva);


      } else {
        if (tva_1 != '') {
          let taux1 = $("#taux1").val();
          console.log(taux1);
          let mht = tva_1 / taux1;
          let ttc = mht + parseFloat(tva_1);
          mht = mht.toFixed(2);
          ttc = parseFloat(ttc).toFixed(2);
          $("#MHT_1").val(mht);
          $("#ttc").val(ttc);
        } else {
          if (MHT_1 = '') {
            let taux1 = parseFloat($("#taux1").val());
            let TVA = MHT_1 * taux1;
            let ttc = MHT_1 + TVA;
            MHT_1 = MHT_1.toFixed(2);
            ttc = ttc.toFixed(2);
            $("#tva_1").val(TVA);
            $("#ttc").val(ttc);
          }
        }
      }
    }, 500);
  });


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
      var $lignes = '<option value="R-18">Sélectionner</option>';
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
      var $lignes = '<option value="R-18">Sélectionner</option>';
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
function Liste_Racine() {
  jQuery.ajax({
    url: "./FK_racine",
    type: "GET",
    dataType: "json",
    success: function (responce) {
      var $lignes = '<option value="R-18">Sélectionner</option>';
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
      $("#racine4").html($lignes);
      $("#racine2").html($lignes);
      // $("#racine3").html($lignes);
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
  $("#MTttc").val(ttc+parseFloat(ttc1));
  let taux1 = $("#taux1").val();
  if (ttc1 != '') {
    if (taux1 == '') {
      alert('merci de choiser la rubrique de tva');
    } else {
      if (ttc1 != '') {
        console.log(ttc1);
        let mht = ttc1 / (1 + taux1);
        mht = mht.toFixed(2);
        let tva = ttc1 - mht;
        tva = tva.toFixed(2);
        $("#MHT_1").val(mht);
        $("#tva_1").val(tva);
      }
    }
  }

}
function calcul_ttc2() {
  let ttc = $("#MTttc").val();
  let ttc2 = $("#ttc2").val();
  let taux2 = $("#taux2").val();
  $("#MTttc").val(parseFloat(ttc)+parseFloat(ttc2));
  if (ttc2 != '') {
    if (taux2 == '') {
      alert('merci de choiser la rubrique de tva');
    } else {
      if (ttc2 != '') {
       
        let mht = ttc2 / (1 + taux2);
        mht = mht.toFixed(2);
        let tva = ttc2 - mht;
        tva = tva.toFixed(2);
        $("#MHT_2").val(mht);
        $("#tva_2").val(tva);
      }
    }
  }

}
function calcul_tva() {
  let tva_1 = $("#tva_1").val();
  let taux1 = $("#taux1").val();
  if (tva_1 != '') {
    console.log(taux1);
    if (taux1 == '') {
      alert('merci de choiser la rubrique de tva');
    } else {
      if (tva_1 != '') {
        console.log(tva_1);
        let mht = tva_1 / taux1;

        let ttc = mht + tva_1;
        mht = mht.toFixed(2);
        ttc = ttc.toFixed(2);
        $("#MHT_1").val(mht);
        $("#MTttc").val(ttc);

      }
    }

  }
}
function calcul_tva2() {
  let tva_1 = $("#tva_2").val();
  let taux1 = $("#taux2").val();
  if (tva_1 != '') {

    if (taux1 == '') {
      alert('merci de choiser la rubrique de tva');
    } else {
      if (tva_1 != '') {
        let mht = tva_1 / taux1;

        //    let ttc=mht+tva_1;
        mht = mht.toFixed(2);
        //    ttc=ttc.toFixed(2);
        $("#MHT_2").val(mht);
        //   $("#ttc").val(ttc);
      }
    }
  }

}
function calcul_tva3() {
  let tva_1 = $("#tva_3").val();
  let taux1 = $("#taux3").val();
  if (tva_1 != '') {

    if (taux1 == '') {
      alert('merci de choiser la rubrique de tva');
    } else {
      if (tva_1 != '') {
        let mht = tva_1 / taux1;

        //    let ttc=mht+tva_1;
        mht = mht.toFixed(2);
        //    ttc=ttc.toFixed(2);
        $("#MHT_3").val(mht);
        //   $("#ttc").val(ttc);
      }
    }
  }

}
function calcul_HT() {
  let MHT_1 = $("#MHT_1").val();
  let taux1 = $("#taux1").val();
  if (MHT_1 != '') {
    if (taux1 == '') {
      alert('merci de choiser la rubrique de tva');
    } else {
      if (tva_1 != '') {
        let TVA = MHT_1 * taux1;
        let ttc = MHT_1 + TVA;
        MHT_1 = MHT_1.toFixed(2);
        ttc = ttc.toFixed(2);
        $("#tva_1").val(TVA);
        $("#ttc").val(ttc);
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
        jQuery.each(responce.get_achat, function (key, item) {
          if (!duplicateFound) {
            alert('le numero de facture est deja exist');
         
            duplicateFound = true;
          }

        });
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
      var table = new Tabulator("#Liste-Achat", {
        printAsHtml: true,
        printStyled: true,
        // height: 220,
        data: $tabledata,
        layout: "fitColumns",
        pagination: "local",
        printHeader: "",
        printFooter: "",
        paginationSize: 5,
        paginationSizeSelector: [10, 20, 30, 40],
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
                                  
                                            <a  class="edit lex items-center text-success" data-toggle="modal"  data-target=".bd-example-modal-lg"  mr-3" title="Modifier" href="javascript:;"  >
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
                  document.getElementById("id_achat").value =cell.getData().id;
                  jQuery.ajax({
                    url: "./get_achatbyID/" + cell.getData().id,
                    type: "GET", // Le nom du fichier indiqué dans le formulaire
                    dataType: "json", // Je sérialise les données (j'envoie toutes les valeurs présentes dans le formulaire)
                    success: function (responce) {
                      // affichage select

                      jQuery.each(responce.get_achatb, function (key, item) {

                        document.getElementById("id_achat").value =
                          item.id;
                        document.getElementById("nom_succorsale").value =
                          item.nom_succorsale;
                        document.getElementById("ICE").value = item.ICE;
                        document.getElementById("Email").value = item.Email;
                        document.getElementById("Activite").value =
                          item.Activite;
                        document.getElementById("ID_Fiscale").value =
                          item.ID_Fiscale;
                        document.getElementById("Ville").value = item.Ville;
                        document.getElementById("Tele").value = item.Tele;
                        document.getElementById("Adresse").value = item.Adresse;
                        document.getElementById("Fax").value = item.Fax;
                        document.getElementById("FK_Regime").value =
                          item.FK_Regime;
                        document.getElementById("FK_fait_generateurs").value =
                          item.FK_fait_generateurs;
                          document.getElementById("id_achat").value =
                          item.id;
                        document.getElementById("nom_succorsale").value =
                          item.nom_succorsale;
                        document.getElementById("ICE").value = item.ICE;
                        document.getElementById("Email").value = item.Email;
                        document.getElementById("Activite").value =
                          item.Activite;
                        document.getElementById("ID_Fiscale").value =
                          item.ID_Fiscale;
                        document.getElementById("Ville").value = item.Ville;
                        document.getElementById("Tele").value = item.Tele;
                        document.getElementById("Adresse").value = item.Adresse;
                        document.getElementById("Fax").value = item.Fax;
                        document.getElementById("FK_Regime").value =
                          item.FK_Regime;
                        document.getElementById("FK_fait_generateurs").value =
                          item.FK_fait_generateurs;

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
