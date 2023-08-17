$(window).on("load", function () {
    Liste_FRS();
    Liste_Mpyement();
    Liste_Racine();
  });
$('.select2').select2();
$(document).ready(function() {
    $('#frs').on('select2:select', function (e) {
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
                $("#taux1").val($tabledata.Taux + '%');
          
               
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



});

function myFunction() {
 
    let frs = document.getElementById("frs");
    let desc = document.getElementById("desc");
    

    // Convert input values to lowercase for case-insensitive comparison
   
    let descValue = desc.value.toLowerCase();
    let selectedOption = frs.options[frs.selectedIndex];
let selectedText = selectedOption.text.toLowerCase();
    console.log(selectedText);
    if (descValue.startsWith("elect") && selectedText === "lydec") {
      
        $("#rowracine1").css("display", "flex");
        $("#rowracine2").css("display", "flex");
        $("#colracine").css("display", "none");
        $("#colracine1").css("display", "block");
        $("#taux1").prop("disabled", true);
    }else
   {
     
    $("#rowracine1").css("display", "none");
    $("#rowracine2").css("display", "none");
    $("#colracine").css("display", "block");
    $("#colracine1").css("display", "none");
    $("#taux1").prop("disabled", false);
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

  