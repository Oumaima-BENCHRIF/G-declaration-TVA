$('.select2').select2();
$(window).on("load", function () {
    Liste_FRS();
    Liste_Mpyement();
    Liste_Racine();
    $("#taux1").prop("readonly", true);
  });

$(document).ready(function() {
    $("#Add_Achat").on("submit", function (e) {
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
    $('#frs').on('select2:select', function (e) {
        myFunction();
     let value= $('#frs').val();
  
     jQuery.ajax({
        url: "./get_FRS/"+value,
        type: "GET",
        dataType: "json",
        success: function (responce) {
            $tabledata = responce.get_FRS;  
          jQuery.each(responce.get_FRS, function (key, item) {
            $("#N_ICE").val($tabledata.NICE);
            $("#id_fiscal").val($tabledata.ID_fiscale);
            $("#desc").val($tabledata.Designation);
            myFunction();
          });
        
        },
      });
   
    });
    $('#racine').on('select2:select', function (e) {
        let value= $('#racine').val();
    
        jQuery.ajax({
           url: "./get_racine/"+value,
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
        function(settings, data, dataIndex) {
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
    $('#min, #max').keyup(function() {
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
    $('#single-column-search tfoot th').each(function() {
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
    table.columns().every(function() {
        var that = this;
        $('input', this.footer()).on('keyup change', function() {
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
    $('a.toggle-btn').on('click', function(e) {
        e.preventDefault();
        // Get the column API object
        var column = table.column($(this).attr('data-column'));
        // Toggle the visibility
        column.visible(!column.visible());
        $(this).toggleClass("toggle-clicked");
    });
    $('#racine').change(function() {
        setTimeout(function() {
            let ttc=$("#ttc").val();
            let tva_1=$("#tva_1").val();
            let MHT_1=$("#MHT_1").val();
          
            if(ttc!='')
            {
               
                let taux1=parseFloat($("#taux1").val());    
            let mht=ttc/(1+taux1);
            mht=mht.toFixed(2);
            let tva=ttc-mht;
            tva=tva.toFixed(2);
            $("#MHT_1").val(mht);
            $("#tva_1").val(tva);
        
              
            }else
            {
                if(tva_1!=''){
                    let taux1=$("#taux1").val();
                    console.log(taux1);
                    let mht=tva_1/taux1;
                    let ttc=mht+parseFloat(tva_1);
                    mht=mht.toFixed(2);
                    ttc=parseFloat(ttc).toFixed(2);
                    $("#MHT_1").val(mht);
                   $("#ttc").val(ttc);
                }else{
                    if(MHT_1=''){
                        let taux1=parseFloat($("#taux1").val());
                        let TVA=MHT_1*taux1;
               let ttc=MHT_1+TVA;
               MHT_1=MHT_1.toFixed(2);
               ttc=ttc.toFixed(2);
               $("#tva_1").val(TVA);
              $("#ttc").val(ttc);
                    }
                }
            }
        }, 500);
    });


});

function myFunction() {
 
    let frs = document.getElementById("frs");
    let desc = document.getElementById("desc");
    

    // Convert input values to lowercase for case-insensitive comparison
   
    let descValue = desc.value.toLowerCase();
    let selectedOption = frs.options[frs.selectedIndex];
let selectedText = selectedOption.text.toLowerCase();
 
    if (descValue.startsWith("elect") && selectedText === "lydec") {
      
        $("#rowracine1").css("display", "flex");
        $("#rowracine2").css("display", "flex");
        $("#colracine").css("display", "none");
        $("#select").css("display", "none");
        $("#colracine1").css("display", "block");
       // $("#racine").val(1);ID OF RACINE 7 IN LEDYC ELECT
        $("#taux1").val(7);
        $("#taux2").val(14);
        $("#taux3").val(20);
        $("#MHT_1").prop("readonly", true);
        $("#ttc").prop("readonly", true);
        $("#tva_1").prop("readonly", false);
    }else
   {
     
    $("#rowracine1").css("display", "none");
    $("#rowracine2").css("display", "none");
    $("#colracine").css("display", "block");
    $("#select").css("display", "inline-block");
    $("#colracine1").css("display", "none");
    $("#taux1").prop("readonly", true);
   }
}

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
            item.Num_payment+'  | ' +item.Nom_payment
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
            item.Num_racines+'  | ' +item.Nom_racines
            "</option>";
        });
        $("#racine").html($lignes);
      },
    });
  }
  function checkDate() {
    var inputDate = new Date(document.getElementById("date_fact").value);
    var currentDate = new Date();

    // Calculate the date exactly one year ago from the current date
    var oneYearAgo = new Date();
    oneYearAgo.setFullYear(currentDate.getFullYear() - 1);

    if (inputDate < oneYearAgo) {
        alert("la date est supérieur plus un an que la date de systeme");
        document.getElementById("date_fact").value = '';
    } 
}
document.addEventListener("DOMContentLoaded", function () {
    var radioButtons = document.querySelectorAll("input[name='radios5']");

    radioButtons.forEach(function (radio) {
        radio.addEventListener("change", function () {
            if (radio.id === "HT") {
                $("#tva_1").prop("readonly", true);
                $("#ttc").prop("readonly", true);
                $("#MHT_1").prop("readonly", false);
                $("#MHT_1").focus();
            } else if (radio.id === "TVA") {
                $("#MHT_1").prop("readonly", true);
                $("#ttc").prop("readonly", true);
                $("#tva_1").prop("readonly", false);
                $("#tva_1").focus();
            } else if (radio.id === "TTC") {
                $("#ttc").prop("readonly", false);
                $("#MHT_1").prop("readonly", true);
                $("#tva_1").prop("readonly", true);
                $("#ttc").prop("readonly", false);
                $("#ttc").focus();
            } else if (radio.id === "LIBRE") {
                $("#MHT_1").prop("readonly", false);
                $("#tva_1").prop("readonly", false);
                $("#ttc").prop("readonly", false);
               
                
            }
        });
    });
});
function calcul_ttc(){
 let ttc=$("#ttc").val();
 let taux1=$("#taux1").val();
 if(ttc!='')
{ 
    if(taux1==''){
        alert('merci de choiser la rubrique de tva');
    }else{
        if(ttc!=''){
            console.log(ttc);
        let mht=ttc/(1+taux1);
        mht=mht.toFixed(2);
        let tva=ttc-mht;
        tva=tva.toFixed(2);
        $("#MHT_1").val(mht);
        $("#tva_1").val(tva);
    }
 }}
    
}
  
function calcul_tva(){
    let tva_1=$("#tva_1").val();
    let taux1=$("#taux1").val();
    if(tva_1!='')
   {
        console.log(taux1);
       if(taux1==''){
           alert('merci de choiser la rubrique de tva');
       }else{
        if(tva_1!=''){
            console.log(tva_1);
           let mht=tva_1/taux1;
          
           let ttc=mht+tva_1;
           mht=mht.toFixed(2);
           ttc=ttc.toFixed(2);
           $("#MHT_1").val(mht);
          $("#ttc").val(ttc);
       }
    }
       
   }}
   function calcul_tva2(){
    let tva_1=$("#tva_2").val();
    let taux1=$("#taux2").val();
    if(tva_1!='')
 {
        
       if(taux1==''){
           alert('merci de choiser la rubrique de tva');
       }else{
        if(tva_1!=''){
           let mht=tva_1/taux1;
          
        //    let ttc=mht+tva_1;
           mht=mht.toFixed(2);
        //    ttc=ttc.toFixed(2);
           $("#MHT_2").val(mht);
        //   $("#ttc").val(ttc);
       }}
    }
       
   }
   function calcul_tva3(){
    let tva_1=$("#tva_3").val();
    let taux1=$("#taux3").val();
    if(tva_1!='')
 {
      
       if(taux1==''){
           alert('merci de choiser la rubrique de tva');
       }else{
        if(tva_1!=''){
           let mht=tva_1/taux1;
          
        //    let ttc=mht+tva_1;
           mht=mht.toFixed(2);
        //    ttc=ttc.toFixed(2);
           $("#MHT_3").val(mht);
        //   $("#ttc").val(ttc);
       }}
    }
       
   }
   function calcul_HT(){
    let MHT_1=$("#MHT_1").val();
    let taux1=$("#taux1").val();
    if(MHT_1!='')
   {
       if(taux1==''){
           alert('merci de choiser la rubrique de tva');
       }else{
        if(tva_1!=''){
           let TVA=MHT_1*taux1;
           let ttc=MHT_1+TVA;
           MHT_1=MHT_1.toFixed(2);
           ttc=ttc.toFixed(2);
           $("#tva_1").val(TVA);
          $("#ttc").val(ttc);
       }}
    }
       
   }
   function tva_didu(){
    let tva_1=$("#tva_1").val();
    let tva_2=$("#tva_2").val();
    let tva_3=$("#tva_3").val();
    let prorata=$("#prorata").val();
    if(tva_1!='')
    {
        let tva_did=tva_1*prorata/100;
        $("#tva_d1").val(tva_did);
    }
    if(tva_2!='')
    {   
        let tva_did=tva_2*prorata/100;
        $("#tva_d2").val(tva_did);
    }
    if(tva_3!='')
    {
        let tva_did=tva_3*prorata/100;
        $("#tva_d3").val(tva_did);
    }
   }
   function checkNfact(){
    let value= $('#n_fact').val();
  
    jQuery.ajax({
       url: "./get_achat/"+value,
       type: "GET",
       dataType: "json",
       success: function (responce) {
        if (!jQuery.isEmptyObject(responce.get_achat)) {
            let duplicateFound = false;     
         jQuery.each(responce.get_achat, function (key, item) {
            if (!duplicateFound) {
                alert('le numero de facture est deja exist');
                $('#n_fact').val('');
                $('#n_fact').focus();
                duplicateFound = true;
            }
          
         });}
       },
     });
  
   }