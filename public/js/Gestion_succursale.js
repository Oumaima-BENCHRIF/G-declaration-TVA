$(window).on("load", function () {});
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
                toastr.success(response.message);
            },
            error: function (response) {
                toastr.error(response.errors);
            },
        });
    });
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