$(window).on("load", function () {
 // liste regime
 Liste_Regime();
 Liste_fait_generateurs() ;
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
                toastr.success(response.success);
            },
            error: function (response) {
                toastr.error(response.danger);
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
            $lignes = "";
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
        success: function (responce) {
            $lignes = "";
            jQuery.each(responce.Liste_fait_generateurs, function (key, item) {
              
                $lignes =
                    $lignes +
                    '<option value="' +
                    item.id +
                    '">' +
                    item.libelle +
                    "</option>";
            });
            $("#FK_fait_generateurs").html($lignes);
        },
    });
}

function viderchamp() {
    document.getElementById("nom_succorsale").value = "";
    document.getElementById("ICE").value = "";
    document.getElementById("Email").value = "";
    document.getElementById("Activite").value = "";
    document.getElementById("ID_Fiscale").value = "";
    document.getElementById("Ville").value = "";
    document.getElementById("Tele").value = "";
    document.getElementById("Adresse").value = "";
    document.getElementById("Fax").value = "";
    document.getElementById("FK_Regime").value = "";
    document.getElementById("fait_generateurs").value = "";
}