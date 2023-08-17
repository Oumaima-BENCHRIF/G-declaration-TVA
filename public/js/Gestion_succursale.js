$(window).on("load", function () {
  PDF_Print_Excel();
  // liste regime
  Liste_Regime();
  Liste_fait_generateurs();
  table_succursale();
});
$(document).ready(function () {
  // table_Agents();
  // ******Ajouter Tos******
  $("#Add_succursales").on("submit", function (e) {
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
    });
  });
  // ***********

  // ******update To******
  // $("#update_Agents").on("submit", function (e) {
  //     e.preventDefault();
  //     var $this = jQuery(this);
  //     var formData = jQuery($this).serializeArray();
  //     jQuery.ajax({
  //         url: $this.attr("action"),
  //         type: $this.attr("method"), // Le nom du fichier indiqué dans le formulaire
  //         data: formData, // Je sérialise les données (j'envoie toutes les valeurs présentes dans le formulaire)
  //         // dataFilter: 'json', //forme data
  //         success: function (response) {
  //             // Je récupère la réponse du fichier PHP
  //             toastr.success(response.message);
  //             jQuery("#header-footer-modal-preview").trigger("click");
  //             table_Agents();
  //         },
  //         error: function (response) {
  //             toastr.error(response.errors);
  //         },
  //     });
  // });
  // ******Delete tos******
  // $("#delete_Agents").on("submit", function (e) {
  //     e.preventDefault();
  //     var $this = jQuery(this);
  //     var formData = jQuery($this).serializeArray();
  //     jQuery.ajax({
  //         url: $this.attr("action"),
  //         type: $this.attr("method"), // Le nom du fichier indiqué dans le formulaire
  //         data: formData, // Je sérialise les données (j'envoie toutes les valeurs présentes dans le formulaire)
  //         // dataFilter: 'json', //forme data
  //         success: function (response) {
  //             // Je récupère la réponse du fichier PHP
  //             toastr.success(response.message);
  //             jQuery("#delete-confirmation-modal").trigger("click");
  //             table_Agents();
  //         },
  //         error: function (response) {
  //             toastr.error(response.errors);
  //         },
  //     });
  // });
});

function Liste_Regime() {
  jQuery.ajax({
    url: "./FK_Regime",
    type: "GET",
    dataType: "json",
    success: function (responce) {
      var $lignes = '<option value="R-18">Sélectionner</option>';
      jQuery.each(responce.Liste_regimes, function (key, item) {
        $lignes =
          $lignes +
          '<option value="' +
          item.id +
          '">' +
          item.libelle +
          "</option>";
      });
      $("#FK_Regime").html($lignes);
    },
  });
}

function Liste_fait_generateurs() {
  jQuery.ajax({
    url: "./FK_fait_generateurs",
    type: "GET",
    dataType: "json",
    success: function (response) {
      var $lignes = '<option value="FG-17">Sélectionner</option>';
      jQuery.each(response.Liste_fait_generateurs, function (key, item) {
        $lignes +=
          '<option value="' + item.id + '">' + item.libelle + "</option>";
      });
      $("#FK_fait_generateurs").html($lignes);
    },
  });
}

function viderchamp() {
  console.log($("#FK_Regime").val());
  document.getElementById("nom_succorsale").value = "";
  document.getElementById("ICE").value = "";
  document.getElementById("Email").value = "";
  document.getElementById("Activite").value = "";
  document.getElementById("ID_Fiscale").value = "";
  document.getElementById("Ville").value = "";
  document.getElementById("Tele").value = "";
  document.getElementById("Adresse").value = "";
  document.getElementById("Fax").value = "";
  $lignes = "";
  Liste_Regime();
  if ($("#FK_Regime").val() !== "R-18") {
    $("#FK_Regime").html($lignes);
  }
  $lignes = "";
  Liste_fait_generateurs();
  if ($("#FK_fait_generateurs").val() !== "FG-17") {
    $("#FK_fait_generateurs").html($lignes);
  }
}
function table_succursale() {
    

    
    var table = $('.data-table').DataTable({

        processing: true,

        serverSide: true,

        ajax: "{{ route('ajaxproducts.index') }}",

        columns: [

            {data: 'DT_RowIndex', name: 'DT_RowIndex'},

            {data: 'name', name: 'name'},

            {data: 'detail', name: 'detail'},

            {data: 'action', name: 'action', orderable: false, searchable: false},

        ]

    });


  jQuery.ajax({
    url: "./table_succursale",
    type: "GET",
    dataType: "json",
    success: function (responce) {
      // Je récupère la réponse du fichier PHP
      jQuery.each(responce.listes_Agents, function (key, item) {
        $tabledata = responce.listes_Agents;
        console.log(item.value);
      });
    },
  });
}
function PDF_Print_Excel() {
  $(".select2").select2();

  $(document).ready(function () {
    $("#basic-dt").DataTable({
      language: {
        paginate: {
          previous: "<i class='las la-angle-left'></i>",
          next: "<i class='las la-angle-right'></i>",
        },
      },
      lengthMenu: [5, 10, 15, 20],
      pageLength: 5,
    });
    $("#dropdown-dt").DataTable({
      language: {
        paginate: {
          previous: "<i class='las la-angle-left'></i>",
          next: "<i class='las la-angle-right'></i>",
        },
      },
      lengthMenu: [5, 10, 15, 20],
      pageLength: 5,
    });
    $("#last-page-dt").DataTable({
      pagingType: "full_numbers",
      language: {
        paginate: {
          first: "<i class='las la-angle-double-left'></i>",
          previous: "<i class='las la-angle-left'></i>",
          next: "<i class='las la-angle-right'></i>",
          last: "<i class='las la-angle-double-right'></i>",
        },
      },
      lengthMenu: [3, 6, 9, 12],
      pageLength: 3,
    });
    $.fn.dataTable.ext.search.push(function (settings, data, dataIndex) {
      var min = parseInt($("#min").val(), 10);
      var max = parseInt($("#max").val(), 10);
      var age = parseFloat(data[3]) || 0; // use data for the age column
      if (
        (isNaN(min) && isNaN(max)) ||
        (isNaN(min) && age <= max) ||
        (min <= age && isNaN(max)) ||
        (min <= age && age <= max)
      ) {
        return true;
      }
      return false;
    });
    var table = $("#range-dt").DataTable({
      language: {
        paginate: {
          previous: "<i class='las la-angle-left'></i>",
          next: "<i class='las la-angle-right'></i>",
        },
      },
      lengthMenu: [5, 10, 15, 20],
      pageLength: 5,
    });
    $("#min, #max").keyup(function () {
      table.draw();
    });
    $("#export-dt").DataTable({
      dom: '<"row"<"col-md-6"B><"col-md-6"f> ><""rt> <"col-md-12"<"row"<"col-md-5"i><"col-md-7"p>>>',
      buttons: {
        buttons: [
          {
            extend: "excel",
            className: "btn btn-soft-secondary",
          },
          {
            extend: "pdf",
            className: "btn btn-secondary",
          },
          {
            extend: "print",
            className: "btn btn-soft-info",
          },
        ],
      },
      language: {
        paginate: {
          previous: "<i class='las la-angle-left'></i>",
          next: "<i class='las la-angle-right'></i>",
        },
      },
      lengthMenu: [7, 10, 20, 50],
      pageLength: 7,
    });
    // Add text input to the footer
    $("#single-column-search tfoot th").each(function () {
      var title = $(this).text();
      $(this).html(
        '<input type="text" class="form-control" placeholder="Search ' +
          title +
          '" />'
      );
    });
    // Generate Datatable
    var table = $("#single-column-search").DataTable({
      language: {
        paginate: {
          previous: "<i class='las la-angle-left'></i>",
          next: "<i class='las la-angle-right'></i>",
        },
      },
      lengthMenu: [5, 10, 15, 20],
      pageLength: 5,
    });
    // Search
    table.columns().every(function () {
      var that = this;
      $("input", this.footer()).on("keyup change", function () {
        if (that.search() !== this.value) {
          that.search(this.value).draw();
        }
      });
    });
    var table = $("#toggle-column").DataTable({
      language: {
        paginate: {
          previous: "<i class='las la-angle-left'></i>",
          next: "<i class='las la-angle-right'></i>",
        },
      },
      lengthMenu: [5, 10, 15, 20],
      pageLength: 5,
    });
    $("a.toggle-btn").on("click", function (e) {
      e.preventDefault();
      // Get the column API object
      var column = table.column($(this).attr("data-column"));
      // Toggle the visibility
      column.visible(!column.visible());
      $(this).toggleClass("toggle-clicked");
    });
  });
}
