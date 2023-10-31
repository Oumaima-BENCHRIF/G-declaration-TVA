$(window).on("load", function () {
  document.getElementById("Update").style.display = "none";

  table_racine();
});
$(document).ready(function () {
  // ******Ajouter RACINE******
  $("#Add_racin").on("submit", function (e) {
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
        table_racine();
        viderchamp();
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
  // ******Delete RACINE******
  $("#Delet_racine").on("submit", function (e) {
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
        jQuery("#delet_racine").trigger("click");
        table_racine();
      },
      error: function (response) {
        toastr.error(response.danger);
      },
    });
  });
});

function update_Racine() {
  var formData = [];
  var Taux = $("#Taux").val();
  var Nom_racines = $("#Nom_racines").val();
  var Num_racines = $("#Num_racines").val();
  var update_id_racine = $("#update_id_racine").val();
  formData.push(
    { name: "Taux", value: Taux },
    { name: "Nom_racines", value: Nom_racines },
    { name: "Num_racines", value: Num_racines },
    { name: "update_id_racine", value: update_id_racine }
  );

  jQuery.ajax({
    headers: {
      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
    url: "./update_Racine/" + update_id_racine,
    type: "get", // Le nom du fichier indiqué dans le formulaire
    data: formData, // Je sérialise les données (j'envoie toutes les valeurs présentes dans le formulaire)

    success: function (response) {
      // Je récupère la réponse du fichier PHP
      toastr.success(response.messages);
      table_racine();
      viderchamp();
    },
    error: function (response) {
      toastr.error(response.Error);
    },
  });
}

function viderchamp() {
  document.getElementById("Taux").value = "";
  document.getElementById("Nom_racines").value = "";
  document.getElementById("Num_racines").value = "";
  document.getElementById("update_id_racine").value = "";
}

function table_racine() {
  jQuery.ajax({
    url: "table_racine",
    type: "GET", // Le nom du fichier indiqué dans le formulaire
    dataType: "json", // Je sérialise les données (j'envoie toutes les valeurs présentes dans le formulaire)
    // dataFilter: 'json', //forme data
    success: function (responce) {
      $tabledata = "";
      console.log(responce.liste_racine);
      // Je récupère la réponse du fichier PHP
      jQuery.each(responce.liste_racine, function (key, item) {
        if (responce.liste_racine.length == 0) {
        }
        $tabledata = responce.liste_racine;
      });

      var table = new Tabulator("#Liste-racine", {
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
        initialSort: [{ column: "id", dir: "desc" }],
        columnDefaults: {
          tooltip: true, //show tool tips on cells
        },
        columns: [
          {
            title: "Action",
            minWidth: 90,
            field: "actions",
            responsive: 1,
            hozAlign: "center",
            vertAlign: "middle",
            print: false,
            download: false,
            formatter(cell, formatterParams) {
              let a = $(`<div class="flex lg:justify-center items-center">
                                              <a  class="edit lex items-center text-success   mr-3" title="Modifier" href="javascript:;" data-tw-toggle="modal" data-tw-target="#update-confirmation-modal">
                                              <svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' icon-name='check-square' data-lucide='check-square' class='lucide lucide-check-square w-4 h-4 mr-2'><polyline points='9 11 12 14 22 4'></polyline><path d='M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11'></path></svg>\n
                                          </a>
                                          <a  class="mb-2 mr-2 delete" data-toggle="modal" data-target="#delet_racine">
                                          <i class="lar la-trash-alt text-danger font-20 mr-2"></i>
                                          </a>
      
                                         
                              </div>`);

              $(a)
                .find(".delete")
                .on("click", function () {
                  jQuery.ajax({
                    url: "./Racine/" + cell.getData().id,
                    type: "GET", // Le nom du fichier indiqué dans le formulaire
                    dataType: "json", // Je sérialise les données (j'envoie toutes les valeurs présentes dans le formulaire)
                    // dataFilter: 'json', //forme data
                    success: function (responce) {
                      jQuery.each(
                        responce.info_racines,
                        function (key, item) {
                          document.getElementById("delete_id_racine").value = item.id;
                        }
                      );
                    },
                  });
                });
              $(a)
                .find(".edit")
                .on("click", function () {
                  document.getElementById("Update").style.display = "block";
                  document.getElementById("Enregistrer").style.display = "none";
                  // document.getElementById("Nouveau").style.display = "none";
                  jQuery.ajax({
                    url: "./Racine/" + cell.getData().id,
                    type: "GET", // Le nom du fichier indiqué dans le formulaire
                    dataType: "json", // Je sérialise les données (j'envoie toutes les valeurs présentes dans le formulaire)
                    success: function (responce) {
                      // affichage select

                      jQuery.each(responce.info_racines, function (key, item) {
                        document.getElementById("update_id_racine").value =
                          item.id;
                        document.getElementById("Taux").value = item.Taux;
                        document.getElementById(
                          "Nom_racines"
                        ).value = item.Nom_racines;
                        document.getElementById("Num_racines").value =
                          item.Num_racines;
                      });
                    },
                  });
                });
              return a[0];
            },
          },
          {
            title: "Taux",
            field: "Taux",
            minWidth: 100,
            vertAlign: "middle",
            // print: false,
            // download: false,
          },
          {
            title: "Entilation deducations",
            field: "Nom_racines",
            minWidth: 100,
            vertAlign: "middle",
            // print: false,
            // download: false,
          },
          {
            title: "Code racines",
            width: 110,
            field: "Num_racines",
            vertAlign: "middle",
            // print: false,
            editor: true,
          }
         
          // For print format
        ],

        rowDblClick: function (e, row) {},
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
