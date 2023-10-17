$(window).on("load", function () {
  document.getElementById("Update").style.display = "none";
  $("#ID_fiscale").focus();
  table_fournisseur();
});
$(document).ready(function () {
  // ******Ajouter fournisseur******
  $("#Add_fournisseur").on("submit", function (e) {
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
        table_fournisseur();
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

  // ******Delete Fournisseur******
  $("#Delet_fournisseur").on("submit", function (e) {
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
        jQuery("#delet_fournisseur").trigger("click");
        table_fournisseur();
      },
      error: function (response) {
        toastr.error(response.danger);
      },
    });
  });
});
function validateMin(){
  var invalid = $('.min-checking .invalid-feedback');
  var valid = $('.min-checking .valid-feedback');
  var minID = document.getElementById("NICE");
  var z = minID.value;
  if(z.length==15 ){
    invalid.css('display', 'none');
    valid.css('display', 'block');
  } else {
    
    invalid.css('display', 'block');
    valid.css('display', 'none');
  }
}

function validateMin8(){
  var invalid = $('.min-checking .invalid-feedback');
  var valid = $('.min-checking .valid-feedback');
  var minID = document.getElementById("ID_fiscale");
  var z = minID.value;
  if(z.length==8 || z.length==7){
    invalid.css('display', 'none');
    valid.css('display', 'block');
  } else {
    invalid.css('display', 'block');
    valid.css('display', 'none');
  }
}

function update_fournisseur() {
  var formData = [];
  var nomFournisseurs = $("#nomFournisseurs").val();
  var Designation = $("#Designation").val();
  var Adresse = $("#Adresse").val();
  var telephone = $("#telephone").val();
  var ville = $("#ville").val();
  var NICE = $("#NICE").val();
  var Fax = $("#Fax").val();
  var Num_compte_comptable = $("#Num_compte_comptable").val();
  var ID_fiscale = $("#ID_fiscale").val();
  var update_id_fournisseur = $("#update_id_fournisseur").val();

  formData.push(
    { name: "nomFournisseurs", value: nomFournisseurs },
    { name: "Designation", value: Designation },
    { name: "Adresse", value: Adresse },
    { name: "telephone", value: telephone },
    { name: "NICE", value: NICE },
    { name: "ville", value: ville },
    { name: "Num_compte_comptable", value: Num_compte_comptable },
    { name: "ID_fiscale", value: ID_fiscale },
    { name: "Fax", value: Fax },
    { name: "update_id_fournisseur", value: update_id_fournisseur }
  );

  jQuery.ajax({
    headers: {
      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
    url: "./update_fournisseur/" + update_id_fournisseur,
    type: "get", // Le nom du fichier indiqué dans le formulaire
    data: formData, // Je sérialise les données (j'envoie toutes les valeurs présentes dans le formulaire)

    success: function (response) {
      // Je récupère la réponse du fichier PHP
      toastr.success(response.messages);
      table_fournisseur();
    },
    error: function (response) {
      toastr.error(response.Error);
    },
  });
}
function viderchamp() {
  document.getElementById("nomFournisseurs").value = "";
  document.getElementById("Designation").value = "";
  document.getElementById("Adresse").value = "";
  document.getElementById("telephone").value = "";
  document.getElementById("ville").value = "";
  document.getElementById("NICE").value = "";
  document.getElementById("Fax").value = "";
  document.getElementById("Num_compte_comptable").value = "";
  document.getElementById("ID_fiscale").value = "";
}

function table_fournisseur() {

  jQuery.ajax({
    url: "table_fournisseur",
    type: "GET", // Le nom du fichier indiqué dans le formulaire
    dataType: "json", // Je sérialise les données (j'envoie toutes les valeurs présentes dans le formulaire)
    // dataFilter: 'json', //forme data
    success: function (responce) {
      $tabledata = "";
      // console.log(responce.liste_Fournisseur);
      // Je récupère la réponse du fichier PHP
      jQuery.each(responce.liste_Fournisseur, function (key, item) {
        if (responce.liste_Fournisseur.length == 0) {
        }
        $tabledata = responce.liste_Fournisseur;
      });

      var table = new Tabulator("#Liste-fournisseur", {
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
            width:90,
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
                                        <a  class="mb-2 mr-2 delete" data-toggle="modal" data-target="#delet_fournisseur">
                                        <i class="lar la-trash-alt text-danger font-20 mr-2"></i>
                                        </a>
    
                                       
                            </div>`);

              $(a)
                .find(".delete")
                .on("click", function () {
                  jQuery.ajax({
                    url: "./Fournisseur/" + cell.getData().id,
                    type: "GET", // Le nom du fichier indiqué dans le formulaire
                    dataType: "json", // Je sérialise les données (j'envoie toutes les valeurs présentes dans le formulaire)
                    // dataFilter: 'json', //forme data
                    success: function (responce) {
                      jQuery.each(
                        responce.info_fournisseur,
                        function (key, item) {
                          document.getElementById(
                            "delete_id_fournisseur"
                          ).value = item.id;
                        }
                      );
                    },
                  });
                });

              $(a)
                .find(".view")
                .on("click", function () {
                  document.getElementById("Update").style.display = "none";
                  document.getElementById("Enregistrer").style.display =
                    "initial";
                  // document.getElementById("Nouveau").style.display = "initial";

                  jQuery.ajax({
                    url: "./Fournisseur/" + cell.getData().id,
                    type: "GET", // Le nom du fichier indiqué dans le formulaire
                    dataType: "json", // Je sérialise les données (j'envoie toutes les valeurs présentes dans le formulaire)
                    success: function (responce) {
                      // affichage select

                      jQuery.each(
                        responce.info_fournisseur,
                        function (key, item) {
                          document.getElementById("nomFournisseurs").value =
                            item.nomFournisseurs;
                          document.getElementById("Designation").value =
                            item.Designation;
                          document.getElementById("telephone").value =
                            item.telephone;
                          document.getElementById("ville").value = item.ville;
                          document.getElementById("NICE").value = item.NICE;
                          document.getElementById("Adresse").value =
                            item.Adresse;
                          document.getElementById("Fax").value = item.Fax;
                          document.getElementById(
                            "Num_compte_comptable"
                          ).value = item.Num_compte_comptable;
                          document.getElementById("ID_fiscale").value =
                            item.ID_fiscale;
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
                  // document.getElementById("Nouveau").style.display = "none";
                  jQuery.ajax({
                    url: "./Fournisseur/" + cell.getData().id,
                    type: "GET", // Le nom du fichier indiqué dans le formulaire
                    dataType: "json", // Je sérialise les données (j'envoie toutes les valeurs présentes dans le formulaire)
                    success: function (responce) {
                      // affichage select

                      jQuery.each(
                        responce.info_fournisseur,
                        function (key, item) {
                          document.getElementById(
                            "update_id_fournisseur"
                          ).value = item.id;
                          document.getElementById("nomFournisseurs").value =
                            item.nomFournisseurs;
                          document.getElementById("Designation").value =
                            item.Designation;
                          document.getElementById("telephone").value =
                            item.telephone;
                          document.getElementById("ville").value = item.ville;
                          document.getElementById("NICE").value = item.NICE;
                          document.getElementById("Adresse").value =
                            item.Adresse;
                          document.getElementById("Fax").value = item.Fax;
                          document.getElementById(
                            "Num_compte_comptable"
                          ).value = item.Num_compte_comptable;
                          document.getElementById("ID_fiscale").value =
                            item.ID_fiscale;
                        }
                      );
                    },
                  });
                });
              return a[0];
            },
          },
          {
            title: "nomFournisseurs",
            width: 150,
            field: "nomFournisseurs",
            vertAlign: "middle",
            //print: false,
            headerFilter:"input"
          },
          {
            title: "Designation",
            field: "Designation",
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
            visible: false, 
            print: true,
            download: true,
          },
          {
            title: "Telephone",
            field: "telephone",
            minWidth: 100,
            vertAlign: "middle",
            // print: false,
            // download: false,
          },
          {
            title: "Ville",
            field: "ville",
            minWidth: 100,
            vertAlign: "middle",
            visible: false, 
            print: true,
            download: true,
          },
          {
            title: "NICE",
            field: "NICE",
            minWidth: 100,
            vertAlign: "middle",
            headerFilter:"input"
            // print: false,
            // download: false,
          },
          {
            title: "ID_fiscale",
            field: "ID_fiscale",
            headerFilter:"input",
            // minWidth: 100,
            width:100,
            vertAlign: "middle",
            // print: false,
            // download: false,
          },
          {
            title: "Num_compte_comptable",
            field: "Num_compte_comptable",
            minWidth: 100,
            vertAlign: "middle",
            // print: false,
            // download: false,
          },
          {
            title: "Fax",
            field: "Fax",
            minWidth: 100,
            visible: false, 
            print: true,
            download: true,
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

// function createTabulatorTable(data) {
//   const table = new Tabulator("#table", {
//     data: data.map((row) =>
//       Object.fromEntries(row.map((cell, index) => [data[0][index], cell]))
//     ),
//     layout: "fitColumns",
//     columns: getTableColumns(data[0]),
//   });
//   const d=data.map((row) =>
//   Object.fromEntries(row.map((cell, index) => [data[0][index], cell]))
// );
//   console.log(d);
//   d.forEach(row => {
//     var arry=[];
//     var Designation= row.Designation;
//     var Adresse= row.Adresse;
//     var nomFournisseurs= row.nomFournisseurs;
//     var telephone= row.telephone;
//     var NICE= row.NICE;
//     var ville= row.ville;
//     var Num_compte_comptable= row.Num_compte_comptable;
//     var ID_fiscale= row.ID_fiscale;
//     var Fax= row.Fax;
//     console.log(ville);
//     arry.push(
//       { name: "nomFournisseurs", value: nomFournisseurs },
//       { name: "Designation", value: Designation },
//       { name: "Adresse", value: Adresse },
//       { name: "telephone", value: telephone },
//       { name: "NICE", value: NICE },
//       { name: "ville", value: ville },
//       { name: "Num_compte_comptable", value: Num_compte_comptable },
//       { name: "ID_fiscale", value: ID_fiscale },
//       { name: "Fax", value: Fax },
//     );
 
//     jQuery.ajax({
//       headers: {
//         "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
//       },
//       url: "./AddFournisseur",
//       type: "POST", // Le nom du fichier indiqué dans le formulaire
//       data: d, // Je sérialise les données (j'envoie toutes les valeurs présentes dans le formulaire)
  
//       success: function (response) {
//         // Je récupère la réponse du fichier PHP
//         toastr.success(response.messages);
//         table_fournisseur();
//       },
//       error: function (response) {
//         toastr.error(response.Error);
//       },
//     });

//   });
// }
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
      nomFournisseurs: row.nomFournisseurs, // Assuming index 0 corresponds to 'nomFournisseurs'
      Designation: row.Designation, // Assuming index 1 corresponds to 'Designation'
      Adresse: row.Adresse, // Assuming index 2 corresponds to 'Adresse'
       telephone: row.Telephone,
       NICE: row.NICE,
       ville: row.Ville,
       Num_compte_comptable: row.Num_compte_comptable,
       ID_fiscale:row.ID_fiscale,
       Fax: row.Fax,
       
    };
    console.log(postData);
    jQuery.ajax({
      headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
      },
      url: "./AddFournisseurjson",
      type: "get",
      data: postData,

      success: function (response) {
        toastr.success(response.message);
        table_fournisseur();
      },
      error: function (response) {
        toastr.error(response.Error);
      },
    });
  });
}

// **************************************
