

<!DOCTYPE html>
<html>
<head>
    <title>Larave Generate Invoice PDF - Nicesnippest.com</title>
</head>
<style type="text/css">
    body{
        font-family: 'Roboto Condensed', sans-serif;
    }
    .m-0{
        margin: 0px;
    }
    .p-0{
        padding: 0px;
    }
    .pt-5{
        padding-top:5px;
    }
    .mt-10{
        margin-top:10px;
    }
    .text-center{
        text-align:center !important;
    }
    .w-100{
        width: 100%;
    }
    .w-50{
        width:50%;   
    }
    .w-85{
        width:85%;  
       
    }
    .h-5
    {
        height: 5px;
    }
    .w-15{
        width:15%;   
    }
    .logo img{
        width:200px;
        height:45px;
        padding-top:30px;
    }
    .logo span{
        margin-left:8px;
        top:19px;
        position: absolute;
        font-weight: bold;
        font-size:25px;
    }
    .gray-color{
        color:#5D5D5D;
    }
    .text-bold{
        font-weight: bold;
    }
    .border{
        border:1px solid black;
    }
    table tr,td{
        border-right: 1px solid black;
        border-left: 1px solid black;
        border-collapse:collapse;
      
    }
    table tr th{
   
        font-size:12px;
        border: 1px solid black;
        
       
    }
    table tr td{
        font-size:10px;
        border: 1px solid black;
    }
    table{
        /* margin-top: 20px !important; */
       
        border-collapse:collapse;
        border:1px solid black;
       
        
    }
    .box-text p{
        line-height:10px;
    }
    .float-left{
        float:left;
    }
    .total-part{
        font-size:16px;
        line-height:12px;
    }
    .total-right p{
        padding-right:20px;
    }
    .display-f
    {
        display: inline;
    }
.info{
    border: 1px solid black;

}
.center{
    text-align: center;
}
.footer
{
    position: fixed;
     bottom: 0; 
     height: 30px;
}
.text
{
    font-size:10px;
}
.d-block
{
    display: block;
}

.h-100
{
    height: 100%;
}
.mt20{
    margin-top: 18px;
}
.tbl{
        border: 1px solid #d2d2d2;
      
        border-collapse:collapse;
    }
    .w-40
    {
     width: 40%;
    }
    .w-20
    {
     width: 20%;
    }
    .logo{
        padding: 30px !important;
    }
   .mt-10{
    margin-top:10px !important;
   }
</style> 
<body>




<!-- <img alt="Midone - HTML Admin Template" class="w-6" src="{{ asset('build/assets/images/logo.svg') }}"> -->
     </div>  
<div class="w-40 float-left">

         
        <table class=" w-85">
        <tr>
                    <td>Raison Sociale</td>
                    <td>{{ $get_info->nom_succorsale }}</td>
                </tr>
                <tr>
                    <td>ID_Fiscal</td>
                    <td>{{ $get_info->ID_Fiscale }}</td>
                </tr>
                <tr>
                    <td>Année</td>
                    <td>{{ $get_info->Exercice}}</td>
                </tr>
                <tr>
                    <td>période</td>
                    <td>Du 01/01/2023 AU 31/01/2023</td>

                </tr>
                <tr class="tr1">
                    <td>regime</td>
                    <!-- <td class="td1">
                        <table>
                            <tr class="tr1">
                                <td class="td1">{{ $get_info->idf}}</td>
                                <td class="td2">{{ $get_info->libelle}}</td>
                            </tr>
                        </table>
                    </td> -->
                    <td>{{ $get_info->idf}} | {{ $get_info->libelle}}</td>
                </tr>
  </table> 
    </div>
<div class="add-detail ">

  <table class=" table w-40 float-left info">
  <label class="logo" > logo</label>
  <tr>
                    <td>Relevé de déduction</td>
                </tr>
                <tr>
                    <td>Article 112 du Code Géneral des Impots</td>
                </tr>
  
</table>
    <div class="float-left w-20">
    <label>logo minister</label>

</div>
    <div style="clear: both;"></div>
</div>
<div class="add-detail ">
</div>



    <table class="table w-100 mt-10">
    <tr class>
            <td  colspan="8">RELEVE DES FACTURES D'ACHAT PRESTATION ET FOURNISSEURS PAYEES</td>
        </tr>
        <tr>
        <td>DATE</td>
        <td>N°fact</td>
        <td>Furnissuers</td>
        <td>IF</td>
        <td>ICE</td>
        <td>TVA</td>
        <td>MHT</td>
        <td>TTC</td>
        </tr>
        @foreach($table_achat as $achat)
        <tr>
        <td>{{ $achat->Date_facture }}</td>
        <td>{{ $achat->N_facture }}</td>
        <td>{{ $achat->name }}</td>
        <td>{{ $achat->ID_fiscale }}</td>
        <td>{{ $achat->NICE }}</td>
        <td>{{ $achat->TVA_1 }}</td>
        <td>{{ $achat->M_HT_1 }}</td>
        <td>{{ $achat->M_TTC }}</td>
        </tr>
        @if($achat->TVA_2!=null)
        <tr>
        <td>{{ $achat->Date_facture }}</td>
        <td>{{ $achat->N_facture }}</td>
        <td>{{ $achat->name }}</td>
        <td>{{ $achat->ID_fiscale }}</td>
        <td>{{ $achat->NICE }}</td>
        <td>{{ $achat->TVA_2 }}</td>
        <td>{{ $achat->M_HT_2 }}</td>
        <td>{{ $achat->M_TTC }}</td>
        </tr>
        <tr>
        <td>{{ $achat->Date_facture }}</td>
        <td>{{ $achat->N_facture }}</td>
        <td>{{ $achat->name }}</td>
        <td>{{ $achat->ID_fiscale }}</td>
        <td>{{ $achat->NICE }}</td>
        <td>{{ $achat->TVA_3 }}</td>
        <td>{{ $achat->M_HT_3 }}</td>
        <td>{{ $achat->M_TTC }}</td>
        </tr>
        @endif
        @endforeach
        
    </table>


</html> 
