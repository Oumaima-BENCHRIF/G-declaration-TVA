$(window).on("load", function () {
  document.getElementById("Update").style.display = "none";
  
  // liste regime
  Liste_Regime();
  Liste_fait_generateurs();
  table_succursale();
});
$(document).ready(function () {
  // table_Agents();
  // ******Ajouter Succursale******
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
        table_succursale();
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
  $("#Delet_succursale").on("submit", function (e) {
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
        jQuery("#delet_succursale").trigger("click");
        table_succursale();
      },
      error: function (response) {
        toastr.error(response.danger);
      },
    });
  });
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
  jQuery.ajax({
    url: "table_succursale",
    type: "GET", // Le nom du fichier indiqué dans le formulaire
    dataType: "json", // Je sérialise les données (j'envoie toutes les valeurs présentes dans le formulaire)
    // dataFilter: 'json', //forme data
    success: function (responce) {
      $tabledata = "";
      // Je récupère la réponse du fichier PHP
      jQuery.each(responce.liste_succursale, function (key, item) {
        if (responce.liste_succursale.length == 0) {
        }
        $tabledata = responce.liste_succursale;
      });
      var table = new Tabulator("#Liste-succursale", {
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
            title: "Nom",
            width: 95,
            field: "nom_succorsale",
            vertAlign: "middle",
            // print: false,
            editor: true,
          },
          {
            title: "ICE",
            minWidth: 100,
            width: 43,
            field: "ICE",
            hozAlign: "center",
            vertAlign: "middle",
            // print: false,
            // download: false,
            editor: true,
          },
          {
            title: "ID Fiscale",
            minWidth: 100,
            width: 43,
            field: "ID_Fiscale",
            hozAlign: "center",
            vertAlign: "middle",
            // print: false,
            // download: false,
          },
          {
            title: "Ville",
            field: "Ville",
            minWidth: 100,
            vertAlign: "middle",
            // print: false,
            // download: false,
          },
          {
            title: "Adresse",
            field: "Adresse",
            minWidth: 100,
            vertAlign: "middle",
            // print: false,
            // download: false,
          },
          {
            title: "Fax",
            field: "Fax",
            minWidth: 100,
            vertAlign: "middle",
            // print: false,
            // download: false,
          },
          {
            title: "Tele",
            field: "Tele",
            minWidth: 100,
            vertAlign: "middle",
            // print: false,
            // download: false,
          },
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
                                    <a class="view  mr-3" title="Consulter">
                                        <svg xmlns="http://www.w3.org/2000/svg " width="20 " height="20 " viewBox="0 0 24 24 " fill="none " stroke="currentColor " stroke-width="2 " stroke-linecap="round " stroke-linejoin="round " icon-name="eye " data-lucide="eye " class="lucide lucide-eye w-4 h-4 mr-1 "><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z "></path><circle cx="12 " cy="12 " r="3 "></circle></svg>
                                    </a>
                                        <a  class="edit lex items-center text-success   mr-3" title="Modifier" href="javascript:;" data-tw-toggle="modal" data-tw-target="#update-confirmation-modal">
                                        <svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' icon-name='check-square' data-lucide='check-square' class='lucide lucide-check-square w-4 h-4 mr-2'><polyline points='9 11 12 14 22 4'></polyline><path d='M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11'></path></svg>\n
                                    </a>
                                    <a  class="mb-2 mr-2 delete" data-toggle="modal" data-target="#delet_succursale">
                                    <i class="lar la-trash-alt text-danger font-20 mr-2"></i>
                                    </a>

                                   
                        </div>`);

              $(a)
                .find(".delete")
                .on("click", function () {
                  jQuery.ajax({
                    url: "./succursalses/" + cell.getData().id,
                    type: "GET", // Le nom du fichier indiqué dans le formulaire
                    dataType: "json", // Je sérialise les données (j'envoie toutes les valeurs présentes dans le formulaire)
                    // dataFilter: 'json', //forme data
                    success: function (responce) {
                      jQuery.each(
                        responce.info_succursale,
                        function (key, item) {
                          document.getElementById(
                            "delete_id_succursale"
                          ).value = item.id;
                        }
                      );
                    },
                  });
                });

              $(a)
                .find(".view")
                .on("click", function () {
                  jQuery.ajax({
                    url: "./succursalses/" + cell.getData().id,
                    type: "GET", // Le nom du fichier indiqué dans le formulaire
                    dataType: "json", // Je sérialise les données (j'envoie toutes les valeurs présentes dans le formulaire)
                    success: function (responce) {
                      // affichage select

                      jQuery.each(
                        responce.info_succursale,
                        function (key, item) {
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
                          document.getElementById("Adresse").value =
                            item.Adresse;
                          document.getElementById("Fax").value = item.Fax;
                          document.getElementById("FK_Regime").value =
                            item.FK_Regime;
                          document.getElementById("FK_fait_generateurs").value =
                            item.FK_fait_generateurs;
                          document.getElementById("Update").style.display =
                            "none";
                          document.getElementById("Enregistrer").style.display =
                            "initial";
                        }
                      );
                    },
                  });
                });
              $(a)
                .find(".edit")
                .on("click", function () {
                  document.getElementById("Update").style.display =
                  "initial";
                document.getElementById("Enregistrer").style.display =
                  "none";
                  jQuery.ajax({
                    url: "./succursalses/" + cell.getData().id,
                    type: "GET", // Le nom du fichier indiqué dans le formulaire
                    dataType: "json", // Je sérialise les données (j'envoie toutes les valeurs présentes dans le formulaire)
                    success: function (responce) {
                      // affichage select

                      jQuery.each(
                        responce.info_succursale,
                        function (key, item) {
                          document.getElementById("update_id_succorsale").value =item.id;
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
                          document.getElementById("Adresse").value =
                            item.Adresse;
                          document.getElementById("Fax").value = item.Fax;
                          document.getElementById("FK_Regime").value =
                            item.FK_Regime;
                          document.getElementById("FK_fait_generateurs").value =
                            item.FK_fait_generateurs;
                        
                        }
                      );
                    },
                  });
                });
              return a[0];
            },
          },
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
