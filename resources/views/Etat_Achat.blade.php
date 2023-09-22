

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
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
   .logo_impo{
    width: 200px;
    text-align: center;
    text-transform: uppercase;
    display: block; 
    margin: 0 80%;
   }
   .logo_impo img{
    height:15%;
    width:90%;
   }
   .text-center{
    text-align: center;
   }
</style> 
<body>

 
 <div class="logo_impo">

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

    <div style=" margin-left: 45%;" > 
      
    </div>

<div class="add-detail " >

    <table class=" table w-10 float-left info">
                <tr>
                    <td style="font-weight: 600;text-align: center; " >Relevé de déduction</td>
                </tr>
                <tr>
                    <td style="font-weight: 600;text-align: center;" >Article 112 du Code Géneral des Impots</td>
                </tr>
    </table>
   
    <div style="clear: both;"></div>
</div>
<div class="add-detail ">
</div>




    <table class="table w-100 mt-10">
    <tr class>
            <td style="font-weight: 600;text-align: center;" colspan="13">RELEVE DES FACTURES D'ACHAT PRESTATION ET FOURNISSEURS PAYEES</td>
        </tr>
        <tr>
        <td style="width: 6px; height: 20px;font-weight: 600;text-align: center">N°</td>
        <td style="width: 20px; height: 20px; font-weight: 600;text-align: center">DATE</td>
        <td  style="width: 10px; height: 20px; font-weight: 600;text-align: center">N°fact</td>
        <td style="width: 20px; height: 20px; font-weight: 600;text-align: center">Furnissuers</td>
        <td style="width: 20px; height: 20px; font-weight: 600;text-align: center">IF</td>
        <td style="width: 20px; height: 20px; font-weight: 600;text-align: center">ICE</td>
        <td style="width: 20px; height: 20px; font-weight: 600;text-align: center">NATURE PDT</td>
        <td style="width: 20px; height: 20px;font-weight: 600;text-align: center">MHT</td>
        <td style="width: 20px; height: 20px; font-weight: 600;text-align: center">Taux</td>
        <td style="width: 20px; height: 20px; font-weight: 600;text-align: center">TVA</td>
        <td style="width: 20px; height: 20px; font-weight: 600;text-align: center">TTC</td>
        <td style="width: 20px; height: 20px; font-weight: 600;text-align: center">Date Reglts</td>
        
        <td style="width: 20px; height: 20px; font-weight: 600;text-align: center">Id_Pai</td>
      
        </tr>
      
        {{$TOT_MHT=0}}
        {{$TOT_TVA=0}}
        {{$TOT_TTC=0}}
        @php
        $currentGroup = null ;
        $totalTVA = 0;
        $totalHT = 0;
        $totalTTC = 0;
        @endphp
        @foreach($table_achat as $achat)    
        
            @if (  $currentGroup !== $achat->num_racine_7 ) 
                @if( $currentGroup !== null)
                echo "<tr>
            <td> </td>
            <td colspan="6" class="text-center">groupe {{  $achat->num_racine_7 }}</td>
            <td>{{ $totalHT }}  </td>
            <td>  </td>
            <td> {{ $totalTVA }}</td>
            <td> {{ $totalTTC }}</td>
            <td></td>
            <td></td>
            </tr>";   @endif
                @php
                $totalTVA=0;
                $totalHT = 0;
                $totalTTC = 0;
                 $currentGroup = $achat->num_racine_7;
                 @endphp
                 @endif
        <tr>
                    <td  style="height: 30px;">{{ $achat->id }}</td>
                    <td  style="height: 30px;">{{ $achat->Date_facture }}</td>
                    <td  style="height: 30px;">{{ $achat->N_facture }}</td>
                    <td  style="height: 30px;">{{ $achat->TVA_10 }}</td>
                    <td  style="height: 30px;">{{ $achat->TVA_20 }}</td>
                    <td  style="height: 30px;">{{ $achat->TVA_14 }}</td>
                    <td  style="height: 30px;">{{ $achat->Designation }}</td>
                    <td  style="height: 30px;">{{ $achat->M_HT_7 }}</td>
                                      <td  style="height: 30px;">{{ $achat->Taux7 }}</td>
                    <td  style="height: 30px;">{{ $achat->TVA_7 }}</td>
                  
                    <td  style="height: 30px;">{{ $achat->M_TTC }}</td>
                  
                    <td  style="height: 30px;">{{ $achat->Date_payment }}</td>
      
                    <td  style="height: 30px;">{{$achat->M_HT_20}}</td>
              
                </tr>
                @php
                $totalTVA += $achat->TVA_7;
                $totalHT += $achat->M_HT_7 ;
                $totalTTC += $achat->M_TTC ;
                @endphp
               
        @endforeach
        echo "<tr>
            <td></td>
            <td colspan="6" class="text-center"> {{  $achat->num_racine_7 }}</td>
            <td>{{ $totalHT }}  </td>
            <td>  </td>
            <td> {{ $totalTVA }}</td>
            <td> {{ $totalTTC }}</td>
            <td></td>
            <td></td>
            </tr>"; 
         
    </table>
 <table class="table w-100 mt-10">
 <tr class>
                <td  style="height: 30px;font-weight: 600;text-align: center;" colspan="7">TOTALE GENERAL</td>
                <td>{{number_format($TOT_MHT, 2)}}</td>
                <td>{{number_format($TOT_TVA, 2)}}</td>
                <td>{{number_format($TOT_TTC, 2)}}</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
 </table>

</html> 
