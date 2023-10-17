$(window).on("load", function () {
  document.getElementById("Update").style.display = "none";
  $("#N_compte_charges_immob").focus();
  table_CompteCharge();
});
$(document).ready(function () {
  table_CompteCharge();
  // ******Ajouter Compte Charges******
  $("#AddCompteCharges").on("submit", function (e) {
    e.preventDefault();
    var $this = jQuery(this);
    var formData = jQuery($this).serializeArray();
    jQuery.ajax({
      url: $this.attr("action"),
      type: $this.attr("method"), // Le nom du fichier indiqué dans le formulaire
      data: formData, // Je sérialise les données (j'envoie toutes les valeurs présentes dans le formulaire)
      // dataFilter: 'json', //forme data
      success: function (response) {
        toastr.options = {
          progressBar: true,
          closeButton: true,
        };
        toastr.success(response.message, { timeOut: 12000 });
        viderchamp();
        table_CompteCharge();
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
    // ******Delete Compte Charges******
    $("#Delet_CompteCharges").on("submit", function (e) {
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
            jQuery("#delet_CompteCharges").trigger("click");
            table_CompteCharge();
          },
          error: function (response) {
            toastr.error(response.danger);
          },
        });
      });
});
function viderchamp() {
  document.getElementById("Intitule").value = "";
  document.getElementById("N_compte_charges_immob").value = "";
}
function update_CompteCharge() {
    var formData = [];
    var N_compte_charges_immob = $("#N_compte_charges_immob").val();
    var Intitule = $("#Intitule").val();
    var update_id_CompteCharges = $("#update_id_CompteCharges").val();
    formData.push(
      { name: "N_compte_charges_immob", value: N_compte_charges_immob },
      { name: "Intitule", value: Intitule },
      { name: "update_id_CompteCharges", value: update_id_CompteCharges },
    );
    jQuery.ajax({
      headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
      },
      url: "./update_CompteCharges/" + update_id_CompteCharges,
      type: "get", // Le nom du fichier indiqué dans le formulaire
      data: formData, // Je sérialise les données (j'envoie toutes les valeurs présentes dans le formulaire)
  
      success: function (response) {
        toastr.success(response.messages);
        document.getElementById("Update").style.display = "none";
        document.getElementById("Enregistrer").style.display = "initial";
        viderchamp();
        table_CompteCharge();
      },
      error: function (response) {
        toastr.error(response.Error);
      },
    });
  }
function table_CompteCharge() {
  jQuery.ajax({
    url: "table_CompteCharges",
    type: "GET", // Le nom du fichier indiqué dans le formulaire
    dataType: "json", // Je sérialise les données (j'envoie toutes les valeurs présentes dans le formulaire)
    // dataFilter: 'json', //forme data
    success: function (responce) {
      $tabledata = "";
    //   console.log(responce.liste_CompteCharges);
      jQuery.each(responce.liste_CompteCharges, function (key, item) {
        if (responce.liste_CompteCharges.length == 0) {
        }
        $tabledata = responce.liste_CompteCharges;
      });

      var table = new Tabulator("#Liste-CompteCharges", {
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
            width: 90,
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
                                          <a  class="mb-2 mr-2 delete" data-toggle="modal" data-target="#delet_CompteCharges">
                                          <i class="lar la-trash-alt text-danger font-20 mr-2"></i>
                                          </a>
      
                                         
                              </div>`);

              $(a)
                .find(".delete")
                .on("click", function () {
                  jQuery.ajax({
                    url: "./CompteCharges/" + cell.getData().id,
                    type: "GET", // Le nom du fichier indiqué dans le formulaire
                    dataType: "json", // Je sérialise les données (j'envoie toutes les valeurs présentes dans le formulaire)
                    // dataFilter: 'json', //forme data
                    success: function (responce) {
                      jQuery.each(
                        responce.info_CompteCharges,
                        function (key, item) {
                          document.getElementById( "delete_id_CompteCharges" ).value = item.id;
                        }
                      );
                    },
                  });
                });

              $(a)
                .find(".view")
                .on("click", function () {
                  document.getElementById("Update").style.display = "none";
                  document.getElementById("Enregistrer").style.display ="initial";

                  jQuery.ajax({
                    url: "./CompteCharges/" + cell.getData().id,
                    type: "GET", // Le nom du fichier indiqué dans le formulaire
                    dataType: "json", // Je sérialise les données (j'envoie toutes les valeurs présentes dans le formulaire)
                    success: function (responce) {
                        // console.log(responce.info_CompteCharges)
                      jQuery.each(
                        responce.info_CompteCharges,
                        function (key, item) {
                          document.getElementById("Intitule").value =item.Intitule;
                          document.getElementById("N_compte_charges_immob").value =item.N_compte_charges_immob;
                        }
                      );
                    },
                  });
                });
              $(a)
                .find(".edit")
                .on("click", function () {
                  document.getElementById("Update").style.display = "initial";
                  document.getElementById("Enregistrer").style.display = "none";
                  jQuery.ajax({
                    url: "./CompteCharges/" + cell.getData().id,
                    type: "GET", // Le nom du fichier indiqué dans le formulaire
                    dataType: "json", // Je sérialise les données (j'envoie toutes les valeurs présentes dans le formulaire)
                    success: function (responce) {
                      jQuery.each(
                        responce.info_CompteCharges,
                        function (key, item) {
                          document.getElementById("update_id_CompteCharges").value = item.id;
                          document.getElementById("N_compte_charges_immob").value = item.N_compte_charges_immob;
                          document.getElementById("Intitule").value =item.Intitule;
                        }
                      );
                    },
                  });
                });
              return a[0];
            },
          },
          {
            title: "Nº de compte charges ou immobilisations",
            field: "N_compte_charges_immob",
            vertAlign: "middle",
            print: true,
            download: true,
          },
          {
            title: "Intitulé",
            field: "Intitule",
            vertAlign: "middle",
            print: true,
            download: true,
          },
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
            title: "Fournisseur", //add title to report
          });
        });
    },
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
function createTabulatorTable(data) {
    // Define the getTableColumns function
    function getTableColumns(rowData) {
      // Implement the logic to generate column definitions based on rowData
      // For example:
      const columns = [];
      for (let i = 0; i < rowData.length; i++) {
        columns.push({ title: rowData[i], field: rowData[i] });
      }
      return columns;
    }
    const table = new Tabulator("#table", {
      data: data,
      layout: "fitColumns",
      columns: getTableColumns(data[0]),
    });
  
    const dataArray = data.map((row) =>
      Object.fromEntries(row.map((cell, index) => [data[0][index], cell]))
    );
  console.log(dataArray);
  
    dataArray.forEach(row => {
        
      var postData = {
        N_compte_charges_immob: row["Nº de compte charges ou immobilisations"],
        Intitule: row["Intitulé"], 
      };
      
      jQuery.ajax({
        headers: {
          "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        url: "./Add_CompteChargesjson",
        type: "get",
        data: postData,
  
        success: function (response) {
          toastr.success(response.message);
          table_CompteCharge();
        },
        error: function (response) {
          toastr.error(response.Error);
        },
      });
    });
  }
  