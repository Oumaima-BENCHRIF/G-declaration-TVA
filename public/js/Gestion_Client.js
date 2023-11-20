$(window).on("load", function () {
    table_Client();
});
$("#Add_Client").on("submit", function (e) {
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
        table_Client();
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
  function table_Client() {

    jQuery.ajax({
      url: "table_Client",
      type: "GET", // Le nom du fichier indiqué dans le formulaire
      dataType: "json", // Je sérialise les données (j'envoie toutes les valeurs présentes dans le formulaire)
      // dataFilter: 'json', //forme data
      success: function (responce) {
        $tabledata = "";
        // console.log(responce.liste_Fournisseur);
        // Je récupère la réponse du fichier PHP
        jQuery.each(responce.liste_client, function (key, item) {
          if (responce.liste_client.length == 0) {
          }
          $tabledata = responce.liste_client;
        });
  
        var table = new Tabulator("#Liste-Client", {
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
                      url: "./Client/" + cell.getData().id,
                      type: "GET", // Le nom du fichier indiqué dans le formulaire
                      dataType: "json", // Je sérialise les données (j'envoie toutes les valeurs présentes dans le formulaire)
                      // dataFilter: 'json', //forme data
                      success: function (responce) {
                        jQuery.each(
                          responce.info_fournisseur,
                          function (key, item) {
                            document.getElementById(
                              "delete_id_Client"
                            ).value = item.id;
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
                      url: "./Client/" + cell.getData().id,
                      type: "GET", // Le nom du fichier indiqué dans le formulaire
                      dataType: "json", // Je sérialise les données (j'envoie toutes les valeurs présentes dans le formulaire)
                      success: function (responce) {
                        // affichage select
  
                        jQuery.each(
                          responce.info_Client,
                          function (key, item) {
                            console.log(responce.info_Client)
                            document.getElementById(
                              "update_id_Client"
                            ).value = item.id;
                            document.getElementById("nomClient").value =
                            responce.info_Client.nom;
                            document.getElementById("Designation").value =
                            responce.info_Client.Designation;
                            document.getElementById("telephone").value =
                            responce.info_Client.telephone;
                            document.getElementById("ville").value = responce.info_Client.ville;
                            document.getElementById("Adresse").value =
                            responce.info_Client.Adresse;
                        
                          }
                        );
                      },
                    });
                  });
                return a[0];
              },
            },
            {
              title: "Designation",
              field: "Designation",
              minWidth: 80,
              vertAlign: "middle",
              // print: false,
              // download: false,
              
            },
            {
              title: "Adresse",
              field: "Adresse",
              minWidth: 100,
              vertAlign: "middle",
            
              print: true,
              download: true,
            },
            {
              title: "Telephone",
              field: "telephone",
              minWidth: 70,
              vertAlign: "middle",
              // print: false,
              // download: false,
            },
            {
              title: "Ville",
              field: "ville",
              minWidth: 50,
              vertAlign: "middle",
              visible: false, 
              print: true,
              download: true,
            },
            
            {
              title: "nom Client",
              minWidth: 250,
              field: "nom",
              vertAlign: "middle",
              //print: false,
              headerFilter:"input"
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
  function update_Client() {
    var formData = [];
    var nomClient = $("#nomClient").val();
    var Designation = $("#Designation").val();
    var Adresse = $("#Adresse").val();
    var telephone = $("#telephone").val();
    var ville = $("#ville").val();
    var update_id_Client = $("#update_id_Client").val();
    formData.push(
      { name: "nomClient", value: nomClient },
      { name: "Designation", value: Designation },
      { name: "Adresse", value: Adresse },
      { name: "telephone", value: telephone },
      { name: "ville", value: ville },
      { name: "update_id_Client", value: update_id_Client }
    );
  
    jQuery.ajax({
      headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
      },
      url: "./update_Client/" + update_id_Client,
      type: "get", // Le nom du fichier indiqué dans le formulaire
      data: formData, // Je sérialise les données (j'envoie toutes les valeurs présentes dans le formulaire)
      success: function (response) {
        // Je récupère la réponse du fichier PHP
        toastr.success(response.messages);
        // table_fournisseur();
      },
      error: function (response) {
        toastr.error(response.Error);
      },
    });
  }