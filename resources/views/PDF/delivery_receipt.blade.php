<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Delivery Receipt</title>
    <style>
        @page {
            margin: 22;
        }
        @font-face {
        font-family: 'sbarc39A';
            src: url({{storage_path('fonts/sbarc39A.ttf')}})  format('truetype');
        }
        @font-face {
        font-family: ' sbarc39v';
            src: url({{storage_path('fonts/sbarc39v.ttf')}})  format('truetype');
        }
        header {
            position: fixed;
        }
        .header-style {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 17;
            font-weight: bold;
        }
        .header2-style {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 8;
            font-weight: bold;
        }
        .header-barcode-style {
            font-family: 'sbarc39A';
            font-size: 20;
            font-weight: normal;
        }

        .barcode-style {
            font-family: 'sbarc39v';
            font-size: 30;
            text-align: center;
            horizontal-align:middle;
            vertical-align:middle;
            margin-bottom:10px;
        }
        .subheader-style {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 12;
            font-weight: bold;
        }
        .line-style {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 13;
        }
        .thead-style {
            font-family: Arial, Helvetica, sans-serif;
            font-weight: bold;
            font-size: 6; 
            text-align:center;
            horizontal-align:middle;
            vertical-align:middle;
            background-color: #e6e6e6;
            border: 1px solid black;
        }
        .tbody-style {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 6; 
            text-align:center;
            horizontal-align:middle;
            vertical-align:middle;
            border: 1px solid black;
        }
        table {
            border-collapse: collapse;
        }
        footer {
            position: fixed;
        }
        .footer-style {
            font-family: Arial, Helvetica, sans-serif;
            font-style: italic;
            font-size: 8;
        }
        .page-break {
            page-break-after: always;
        }
        .page-break:last-child {
        page-break-after: auto;
        }
        .total-style {
            font-family: Arial, Helvetica, sans-serif;
            font-weight: bold;
            font-size: 7;
            text-align: center;
            horizontal-align: middle;
            vertical-align: middle;
            background-color: #e6e6e6;
            border: 1px solid black;
        }
        .total-style-sakura {
            font-family: 'sbarc39A';
            font-weight: bold;
            font-size: 7;
            text-align: center;
            horizontal-align: middle;
            vertical-align: middle;
            background-color: #e6e6e6;
            border: 1px solid black;
        }
        .checker-style {
            font-family: Arial, Helvetica, sans-serif;
            font-weight: bold;
            font-size: 7;
            text-align: center;
            horizontal-align: middle;
            vertical-align: middle;
            border: 1px solid black;
        }
        .signatories-style {
            font-family: Arial, Helvetica, sans-serif;
            font-weight: bold;
            font-size: 7.5;
            text-align: center;
            horizontal-align: middle;
            vertical-align: middle;
        }
        .prepared-style {
            font-family: Arial, Helvetica, sans-serif;
            font-weight: bold;
            font-size: 7.5;
            text-align: left;
            horizontal-align: middle;
            vertical-align: middle;
        }
        .approved-style {
            font-family: Arial, Helvetica, sans-serif;
            font-weight: bold;
            font-size: 7.5;
            text-align: right;
            horizontal-align: middle;
            vertical-align: middle;
            padding-right: 5px;
        }
        .received-style {
            font-family: Arial, Helvetica, sans-serif;
            font-weight: bold;
            font-size: 7.5;
            text-align: right;
            horizontal-align: middle;
            vertical-align: middle;
            padding-right: 5px;
        }
        .tbg {
            background-color: #e6e6e6;
        }
        .total-style {
            font-family: Arial, Helvetica, sans-serif;
            font-weight: bold;
            font-size: 7; 
            text-align:center;
            horizontal-align: middle;
            vertical-align:middle;
            background-color: #e6e6e6;
            border: 1px solid black;
        }
      
       

    </style>

</head>

<body>
 
    <div style="position:absolute;top:0.05in;left:2.73in;width:8in;line-height:0.10in;">
        <span class="header-style" style="font-family:barcode">WAREHOUSE AREA</span>
    </div>
    <div style="position:absolute;top:0.18in;left:3.30in;width:8in;line-height:0.15in;">
        <span class="header2-style">DELIVERY RECEIPT</span>
    </div>
    <div style="position:absolute;top:0.30in;left:5.69in;width:8in;line-height:0.10in;">
        <span class="header-barcode-style"></span>
    </div>
    <div style="position:absolute;top:0.80in;left:0.16in;width:8in;line-height:0.10in;">
        <span class="subheader-style">DESTINATION :</span>
    </div>
    <div style="position:absolute;top:0.80in;left:1.50in;width:8in;line-height:0.10in;">
        <span class="subheader-data-style"></span>
    </div>
    <div style="position:absolute;top:0.80in;left:1.44in;width:8in;line-height:0.10in;">
        <span class="line-style">_______________</span>
    </div>
    <div style="position:absolute;top:0.80in;left:4.80in;width:8in;line-height:0.10in;">
        <span class="subheader-style">CONTROL :</span>
    </div>
    <div style="position:absolute;top:0.80in;left:5.85in;width:8in;line-height:0.10in;">
        <span class="subheader-data-style"></span>
    </div>
    <div style="position:absolute;top:0.80in;left:5.77in;width:8in;line-height:0.10in;">
        <span class="line-style">_________________</span>
    </div>
    <div style="position:absolute;top:1.13in;left:0.16in;width:8in;line-height:0.10in;">
        <span class="subheader-style">ATTENTION TO :</span>
    </div>
    <div style="position:absolute;top:1.13in;left:1.58in;width:8in;line-height:0.10in;">
        <span class="subheader-data-style" style="font-size:11px;"></span>
    </div>
    <div style="position:absolute;top:1.13in;left:1.54in;width:8in;line-height:0.10in;">
        <span class="line-style">______________</span>
    </div>
    <div style="position:absolute;top:1.13in;left:4.80in;width:8in;line-height:0.10in;">
        <span class="subheader-style">DATE :</span>
    </div>
    <div style="position:absolute;top:1.13in;left:5.45in;width:8in;line-height:0.10in;">
        <span class="subheader-data-style"></span>
    </div>
    <div style="position:absolute;top:1.13in;left:5.39in;width:8in;line-height:0.10in;">
        <span class="line-style">_____________________</span>
    </div>
    @php
        $per_page_unit     = 0; //reset the value per new page
 @endphp
<div style="position:absolute;top:1.52in;left:0.16in;width:8in;line-height:0.10in;">

   {{-- delivery type--}}
        <table style="width:92%;">
            <thead>
                <tr>
                    <th class="thead-style" width="3%">NO.</th>
                    <th class="thead-style" width="8%">TYPE</th>
                    <th class="thead-style" width="5%">PML_NO</th>
                    <th class="thead-style" width="3%">REV</th>
                    <th class="thead-style" width="9%">PART NO.</th>
                    <th class="thead-style" width="9%">PART NAME</th>
                    <th class="thead-style" width="3%">QTY</th>
                    <th class="thead-style" width="6%">STOCK ADDRESS</th>
                    <th class="thead-style" width="7%">MANUF. NO.</th>
                    <th class="thead-style" width="6%">PAYEE CODE</th>
                    <th class="thead-style" width="6%">TICKET NO.</th>
                    <th class="thead-style" width="9%">PRODUCT NO.</th>
                </tr>
            </thead>
        </table>
        
        {{-- start-first-condition-new-line --}}
            <footer>
                <div style="position:absolute;top:10.80in;left:5.98in;width:8in;line-height:0.10in;">
                    <img src="../node_modules/template/app/media/img/bg/logo_pdf.png" style="height:1%; width:20%;">
                    {{-- Generated by: PDLS-Ver. 2  --}}
                </div>
            </footer>
            <div class="page-break"></div>
            <div style="position:absolute;top:-1.52in;left:2.73in;width:8in;line-height:0.10in;">
                <span class="header-style" style="font-family:barcode">WAREHOUSE AREA</span>
            </div>
            <div style="position:absolute;top:-1.34in;left:3.30in;width:8in;line-height:0.15in;">
                <span class="header2-style">DELIVERY RECEIPT</span>
            </div>
            <div style="position:absolute;top:-1.22in;left:5.40in;width:8in;line-height:0.10in;">
                <span class="header-barcode-style"></span>
            </div>
            <div style="position:absolute;top:-0.72in;left:0.16in;width:8in;line-height:0.10in;">
                <span class="subheader-style">DESTINATION :</span>
            </div>
            <div style="position:absolute;top:-0.72in;left:1.50in;width:8in;line-height:0.10in;">
                <span class="subheader-data-style"></span>
            </div>
            <div style="position:absolute;top:-0.72in;left:1.44in;width:8in;line-height:0.10in;">
                <span class="line-style">_______________</span>
            </div>
            <div style="position:absolute;top:-0.72in;left:4.80in;width:8in;line-height:0.10in;">
                <span class="subheader-style">CONTROL :</span>
            </div>
            <div style="position:absolute;top:-0.72in;left:5.85in;width:8in;line-height:0.10in;">
                <span class="subheader-data-style"></span>
            </div>
            <div style="position:absolute;top:-0.72in;left:5.77in;width:8in;line-height:0.10in;">
                <span class="line-style">_________________</span>
            </div>
            <div style="position:absolute;top:-0.39in;left:0.16in;width:8in;line-height:0.10in;">
                <span class="subheader-style">ATTENTION TO :</span>
            </div>
            <div style="position:absolute;top:-0.39in;left:1.58in;width:8in;line-height:0.10in;">
                <span class="subheader-data-style" style="font-size:11px;"></span>
            </div>
            <div style="position:absolute;top:-0.39in;left:1.54in;width:8in;line-height:0.10in;">
                <span class="line-style">______________</span>
            </div>
            <div style="position:absolute;top:-0.39in;left:4.80in;width:8in;line-height:0.10in;">
                <span class="subheader-style">DATE :</span>
            </div>
            <div style="position:absolute;top:-0.39in;left:5.45in;width:8in;line-height:0.10in;">
                <span class="subheader-data-style"></span>
            </div>
            <div style="position:absolute;top:-0.39in;left:5.39in;width:8in;line-height:0.10in;">
                <span class="line-style">_____________________</span>
            </div>
            @php
                $per_page_unit     = 0; //reset the value per new page
            @endphp
            <table style="width:92%;">
                <thead>
                    <tr>
                        <th class="thead-style" width="3%">NO.</th>
                        <th class="thead-style" width="8%">TYPE</th>
                        <th class="thead-style" width="5%">PML_NO</th>
                        <th class="thead-style" width="3%">REV</th>
                        <th class="thead-style" width="9%">PART NO.</th>
                        <th class="thead-style" width="9%">PART NAME</th>
                        <th class="thead-style" width="3%">QTY</th>
                        <th class="thead-style" width="6%">STOCK ADDRESS</th>
                        <th class="thead-style" width="7%">MANUF. NO.</th>
                        <th class="thead-style" width="6%">PAYEE CODE</th>
                        <th class="thead-style" width="6%">TICKET NO.</th>
                        <th class="thead-style" width="9%">PRODUCT NO.</th>
                    </tr>
                </thead>
            </table>
            @php
                $unit_count_all = 0;  
            @endphp

        
                <footer>
                    <div style="position:absolute;top:10.80in;left:5.98in;width:8in;line-height:0.10in;">
                        <img src="../node_modules/template/app/media/img/bg/logo_pdf.png" style="height:1%; width:20%;">
                        {{-- Generated by: PDLS-Ver. 2  --}}
                    </div>
                </footer>
                <div class="page-break"></div>
                <div style="position:absolute;top:-1.52in;left:2.73in;width:8in;line-height:0.10in;">
                    <span class="header-style" style="font-family:barcode">WAREHOUSE AREA</span>
                </div>
                <div style="position:absolute;top:-1.34in;left:3.30in;width:8in;line-height:0.15in;">
                    <span class="header2-style">DELIVERY RECEIPT</span>
                </div>
                <div style="position:absolute;top:-1.22in;left:5.40in;width:8in;line-height:0.10in;">
                    <span class="header-barcode-style"></span>
                </div>
                <div style="position:absolute;top:-0.72in;left:0.16in;width:8in;line-height:0.10in;">
                    <span class="subheader-style">DESTINATION :</span>
                </div>
                <div style="position:absolute;top:-0.72in;left:1.50in;width:8in;line-height:0.10in;">
                    <span class="subheader-data-style"></span>
                </div>
                <div style="position:absolute;top:-0.72in;left:1.44in;width:8in;line-height:0.10in;">
                    <span class="line-style">_______________</span>
                </div>
                <div style="position:absolute;top:-0.72in;left:4.80in;width:8in;line-height:0.10in;">
                    <span class="subheader-style">CONTROL :</span>
                </div>
                <div style="position:absolute;top:-0.72in;left:5.85in;width:8in;line-height:0.10in;">
                    <span class="subheader-data-style"></span>
                </div>
                <div style="position:absolute;top:-0.72in;left:5.77in;width:8in;line-height:0.10in;">
                    <span class="line-style">_________________</span>
                </div>
                <div style="position:absolute;top:-0.39in;left:0.16in;width:8in;line-height:0.10in;">
                    <span class="subheader-style">ATTENTION TO :</span>
                </div>
                <div style="position:absolute;top:-0.39in;left:1.58in;width:8in;line-height:0.10in;">
                    <span class="subheader-data-style" style="font-size:11px;"></span>
                </div>
                <div style="position:absolute;top:-0.39in;left:1.54in;width:8in;line-height:0.10in;">
                    <span class="line-style">______________</span>
                </div>
                <div style="position:absolute;top:-0.39in;left:4.80in;width:8in;line-height:0.10in;">
                    <span class="subheader-style">DATE :</span>
                </div>
                <div style="position:absolute;top:-0.39in;left:5.45in;width:8in;line-height:0.10in;">
                    <span class="subheader-data-style"></span>
                </div>
                <div style="position:absolute;top:-0.39in;left:5.39in;width:8in;line-height:0.10in;">
                    <span class="line-style">_____________________</span>
                </div>
                @php
                    $per_page_unit     = 0; //reset the value per new page
                @endphp
                <table style="width:92%;">
                    <thead>
                        <tr>
                            <th class="thead-style" width="3%">NO.</th>
                            <th class="thead-style" width="8%">TYPE</th>
                            <th class="thead-style" width="5%">PML_NO</th>
                            <th class="thead-style" width="3%">REV</th>
                            <th class="thead-style" width="9%">PART NO.</th>
                            <th class="thead-style" width="9%">PART NAME</th>
                            <th class="thead-style" width="3%">QTY</th>
                            <th class="thead-style" width="6%">STOCK ADDRESS</th>
                            <th class="thead-style" width="7%">MANUF. NO.</th>
                            <th class="thead-style" width="6%">PAYEE CODE</th>
                            <th class="thead-style" width="6%">TICKET NO.</th>
                            <th class="thead-style" width="9%">PRODUCT NO.</th>
                        </tr>
                    </thead>
                </table>
              
            {{-- end-first-condition-new-line --}}
          
        <table style="width:92%;">
         
            <tr>
                
                <td class="tbody-style" width="3%" height="2%"></td>
                <td class="tbody-style" width="8%"></td>
                <td class="tbody-style" width="5%"></td>
                <td class="tbody-style" width="3%"></td>
                <td class="tbody-style" width="9%"></td>
                <td class="tbody-style" width="9%"></td>
                <td class="tbody-style" width="3%"></td>
                <td class="tbody-style" width="6%"></td>
                <td class="tbody-style" width="7%"></td>
                <td class="tbody-style" width="6%"></td>
                <td class="tbody-style" width="6%"></td>
                <td class="tbody-style" width="9%"></td>
            </tr>
            @php
            $unit_count_all   +=1;  
          @endphp
        </table>

        {{-- end data --}}
         <table style="width:56.82%;" class="">
            <tr>
                <td class="total-style" height="2%" width="42.61%">SUB COUNT</td>
                <td class="total-style" width="20.42%"></td>
                <td class="total-style" width="20.42%">SUBTOTAL</td>
                <td class="total-style"></td>
            </tr>
        </table>
        <br>
        @php
            $unit_count        = 0;            //reset the values of row values
            $total_unit_count  = 0;            //reset the values of row values
            // $per_page_unit     = 0;
        @endphp
   
     {{-- end delivery type --}}

            {{-- start-sec-condition-new-line --}}
           
            <footer>
                <div style="position:absolute;top:10.80in;left:5.98in;width:8in;line-height:0.10in;">
                    <img src="../node_modules/template/app/media/img/bg/logo_pdf.png" style="height:1%; width:20%;">
                    {{-- Generated by: PDLS-Ver. 2  --}}
                </div>
            </footer>
            <div class="page-break"></div>
                <div style="position:absolute;top:-1.52in;left:2.73in;width:8in;line-height:0.10in;">
                    <span class="header-style" style="font-family:barcode">WAREHOUSE AREA</span>
                </div>
                <div style="position:absolute;top:-1.34in;left:3.30in;width:8in;line-height:0.15in;">
                    <span class="header2-style">DELIVERY RECEIPT</span>
                </div>
                <div style="position:absolute;top:-1.22in;left:5.40in;width:8in;line-height:0.10in;">
                    <span class="header-barcode-style"></span>
                </div>
                <div style="position:absolute;top:-0.72in;left:0.16in;width:8in;line-height:0.10in;">
                    <span class="subheader-style">DESTINATION :</span>
                </div>
                <div style="position:absolute;top:-0.72in;left:1.50in;width:8in;line-height:0.10in;">
                    <span class="subheader-data-style"></span>
                </div>
                <div style="position:absolute;top:-0.72in;left:1.44in;width:8in;line-height:0.10in;">
                    <span class="line-style">_______________</span>
                </div>
                <div style="position:absolute;top:-0.72in;left:4.80in;width:8in;line-height:0.10in;">
                    <span class="subheader-style">CONTROL :</span>
                </div>
                <div style="position:absolute;top:-0.72in;left:5.85in;width:8in;line-height:0.10in;">
                    <span class="subheader-data-style"></span>
                </div>
                <div style="position:absolute;top:-0.72in;left:5.77in;width:8in;line-height:0.10in;">
                    <span class="line-style">_________________</span>
                </div>
                <div style="position:absolute;top:-0.39in;left:0.16in;width:8in;line-height:0.10in;">
                    <span class="subheader-style">ATTENTION TO :</span>
                </div>
                <div style="position:absolute;top:-0.39in;left:1.58in;width:8in;line-height:0.10in;">
                    <span class="subheader-data-style" style="font-size:11px;"></span>
                </div>
                <div style="position:absolute;top:-0.39in;left:1.54in;width:8in;line-height:0.10in;">
                    <span class="line-style">______________</span>
                </div>
                <div style="position:absolute;top:-0.39in;left:4.80in;width:8in;line-height:0.10in;">
                    <span class="subheader-style">DATE :</span>
                </div>
                <div style="position:absolute;top:-0.39in;left:5.45in;width:8in;line-height:0.10in;">
                    <span class="subheader-data-style"></span>
                </div>
                <div style="position:absolute;top:-0.39in;left:5.39in;width:8in;line-height:0.10in;">
                    <span class="line-style">_____________________</span>
                </div>
       
            {{-- end-sec-condition-new-line --}}

        <table style="margin-top:3%;width:66.82%;">
            <tr>
                <td class="total-style" height="2%" width="42.61%">TOTAL</td>
                <td class="total-style" width="20.42%"></td>
                <td class="total-style" width="20.42%">GRAND TOTAL</td>
                <td class="total-style" width="18.42%"></td>
                <td><span class="barcode-style" style="margin-left:10px; margin-bottom:10px;" ></span></td>

            </tr>
        </table>
        @php
        $per_page_unit     = 0; //reset the value per new page
        @endphp
        <table style="width:60%;margin-top:4%;padding-left: 30%;">
            <tr>
                <td class="checker-style" width="38%" height="2%"></td>
            </tr>
        </table>
        <table style="width:60%;margin-top:0.01%;padding-left: 30%;">
            <tr>
                <td class="checker-style" width="38%" height="2%">CHECKER NAME</td>
                <td class="checker-style"></td>
            </tr>
        </table>
        <table style="width:60%;margin-top:1%;padding-left: 30%;">
            <tr>
                <td class="checker-style" width="38%" height="2%">PALLET</td>
                <td class="checker-style"></td>
            </tr>
        </table>

        <table style="width:60%;margin-top:1%;padding-left: 30%;">
            <tr>
                <td class="checker-style" colspan="2" width="38%" height="2%">BREAKDOWN</td>
            </tr>
        </table>
        <table style="width:60%;padding-left: 30%;">
            <tr>
                <td class="checker-style" height="2%" width="38%">PCASE</td>
                <td class="checker-style" height="2%"><</td>
            </tr>
            <tr>
                <td class="checker-style" height="2%" width="38%">BOX</td>
                <td class="checker-style" height="2%"></td>
            </tr>
            <tr>
                <td class="checker-style" height="2%" width="38%">BAG</td>
                <td class="checker-style" height="2%"></td>
            </tr>
        </table>

        <table style="width:92%;margin-top:3%;">
            <tr>
                <td class="prepared-style" width="3.5%" height="2%">PREPARED BY:</td>
                <td class="checker-style" width="10%"></td>
                <td class="approved-style" width="6%">APPROVED BY:</td>
                <td class="checker-style" width="10%"></td>
            </tr>
            <tr>
                <td class="" ></td>
                <td class="signatories-style" height="1.75%"></td>
                <td class="" ></td>
                <td class="signatories-style"></td>
            </tr>
        </table>
        <table style="width:66%;margin-top:4%;">
            <tr>
                <td class="received-style" width="10%" height="2%">RECEIVED BY:</td>
                <td class="checker-style" width="10%"></td>
            </tr>
            <tr>
                <td class="" ></td>
                <td class="signatories-style" height="1.75%">DATE AND TIME</td>
            </tr>
        </table>
        @php
            $total       = 0;  //reset the unit total
            $grand_total = 0;  //reset the delivery qty
        @endphp
<footer>
    <div style="position:absolute;top:10.80in;left:5.98in;width:8in;line-height:0.10in;">
        <img src="../node_modules/template/app/media/img/bg/logo_pdf.png" style="height:1%; width:20%;">
        {{-- Generated by: PDLS-Ver. 2  --}}
    </div>
</footer>
</div>
{{--close div contents  --}}

<div class="page-break"></div> {{-- div new page  --}}

{{-- end dr control --}}

</body>
</html>
