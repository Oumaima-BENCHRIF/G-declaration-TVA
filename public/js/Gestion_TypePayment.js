$(window).on("load", function () {
    document.getElementById("Update").style.display = "none";
  
    table_TypePayment();
  });
  $(document).ready(function () {
    // ******Ajouter RACINE******
    $("#Add_TypePayment").on("submit", function (e) {
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
          table_TypePayment();
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
    $("#Delet_TypePayment").on("submit", function (e) {
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
          jQuery("#delet_TypePayment").trigger("click");
          table_TypePayment();
        },
        error: function (response) {
          toastr.error(response.danger);
        },
      });
    });
  });
  
  function update_TypePayment() {
    var formData = [];
    var Nom_payment = $("#Nom_payment").val();
    var Num_payment = $("#Num_payment").val();
    var update_id_TypePayment = $("#update_id_TypePayment").val();
    formData.push(
      { name: "Num_payment", value: Num_payment },
      { name: "Nom_payment", value: Nom_payment },
      { name: "update_id_TypePayment", value: update_id_TypePayment }
    );
  
    jQuery.ajax({
      headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
      },
      url: "./update_TypePayment/" + update_id_TypePayment,
      type: "get", // Le nom du fichier indiqué dans le formulaire
      data: formData, // Je sérialise les données (j'envoie toutes les valeurs présentes dans le formulaire)
  
      success: function (response) {
        // Je récupère la réponse du fichier PHP
        toastr.success(response.messages);
        table_TypePayment();
        viderchamp();
      },
      error: function (response) {
        toastr.error(response.Error);
      },
    });
  }
  
  function viderchamp() {
    document.getElementById("Nom_payment").value = "";
    document.getElementById("Num_payment").value = "";
    document.getElementById("update_id_TypePayment").value = "";
  }
  
  function table_TypePayment() {
    jQuery.ajax({
      url: "table_TypePayment",
      type: "GET", // Le nom du fichier indiqué dans le formulaire
      dataType: "json", // Je sérialise les données (j'envoie toutes les valeurs présentes dans le formulaire)
      // dataFilter: 'json', //forme data
      success: function (responce) {
        $tabledata = "";
        console.log(responce.liste_TypePayment);
        // Je récupère la réponse du fichier PHP
        jQuery.each(responce.liste_TypePayment, function (key, item) {
          if (responce.liste_TypePayment.length == 0) {
          }
          $tabledata = responce.liste_TypePayment;
        });
  
        var table = new Tabulator("#Liste-TypePayment", {
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
              title: "Nom payment",
              width: 95,
              field: "Nom_payment",
              vertAlign: "middle",
              // print: false,
              editor: true,
            },
            {
              title: "Num payment",
              field: "Num_payment",
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
                                            <a  class="mb-2 mr-2 delete" data-toggle="modal" data-target="#delet_TypePayment">
                                            <i class="lar la-trash-alt text-danger font-20 mr-2"></i>
                                            </a>
        
                                           
                                </div>`);
  
                $(a)
                  .find(".delete")
                  .on("click", function () {
                    jQuery.ajax({
                      url: "./TypePayment/" + cell.getData().id,
                      type: "GET", // Le nom du fichier indiqué dans le formulaire
                      dataType: "json", // Je sérialise les données (j'envoie toutes les valeurs présentes dans le formulaire)
                      // dataFilter: 'json', //forme data
                      success: function (responce) {
                        jQuery.each(
                          responce.info_TypePayment,
                          function (key, item) {
                            document.getElementById("delete_id_TypePayment").value = item.id;
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
                    document.getElementById("Nouveau").style.display = "initial";
  
                    jQuery.ajax({
                      url: "./TypePayment/" + cell.getData().id,
                      type: "GET", // Le nom du fichier indiqué dans le formulaire
                      dataType: "json", // Je sérialise les données (j'envoie toutes les valeurs présentes dans le formulaire)
                      success: function (responce) {
                        // affichage select
  
                        jQuery.each(responce.info_TypePayment, function (key, item) {
                          document.getElementById("Nom_payment").value = item.Nom_payment;
                          document.getElementById("Num_payment").value = item.Num_payment;
                        });
                      },
                    });
                  });
                $(a)
                  .find(".edit")
                  .on("click", function () {
                    viderchamp();
                    document.getElementById("Update").style.display = "initial";
                    document.getElementById("Enregistrer").style.display = "none";
                    document.getElementById("Nouveau").style.display = "none";
                    jQuery.ajax({
                      url: "./TypePayment/" + cell.getData().id,
                      type: "GET", // Le nom du fichier indiqué dans le formulaire
                      dataType: "json", // Je sérialise les données (j'envoie toutes les valeurs présentes dans le formulaire)
                      success: function (responce) {
                        // affichage select
  
                        jQuery.each(responce.info_TypePayment, function (key, item) {
                          document.getElementById("update_id_TypePayment").value = item.id;
                          document.getElementById("Nom_payment").value = item.Nom_payment;
                          document.getElementById("Num_payment").value = item.Num_payment;
                        });
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
  