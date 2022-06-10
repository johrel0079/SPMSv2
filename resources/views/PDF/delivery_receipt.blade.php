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
 

 <div style="position:absolute;top:1.52in;left:0.16in;width:8in;line-height:0.10in;">
 
            <div style="position:absolute;top:-1.52in;left:2.73in;width:8in;line-height:0.10in;">
                <span class="header-style" style="font-family:barcode">WAREHOUSE AREA</span>
            </div>
            <div style="position:absolute;top:-1.34in;left:3.30in;width:8in;line-height:0.15in;">
                <span class="header2-style">DELIVERY RECEIPT</span>
            </div>
            <div style="position:absolute;top:-1.22in;left:5.40in;width:8in;line-height:0.10in;">
                <span class="header-barcode-style">{{$data[0]->control_number}}</span>
            </div>
            <div style="position:absolute;top:-0.72in;left:0.16in;width:8in;line-height:0.10in;">
                <span class="subheader-style">DESTINATION : {{$data[0]->destination_code}}</span>
            </div>
            <div style="position:absolute;top:-0.72in;left:1.50in;width:8in;line-height:0.10in;">
                <span class="subheader-data-style"></span>
            </div>
            <div style="position:absolute;top:-0.72in;left:1.44in;width:8in;line-height:0.10in;">
                <span class="line-style">_______________</span>
            </div>
            <div style="position:absolute;top:-0.72in;left:4.80in;width:8in;line-height:0.10in;">
                <span class="subheader-style">CONTROL : {{$data[0]->control_number}}</span>
            </div>
            <div style="position:absolute;top:-0.72in;left:5.85in;width:8in;line-height:0.10in;">
                <span class="subheader-data-style"></span>
            </div>
            <div style="position:absolute;top:-0.72in;left:5.77in;width:8in;line-height:0.10in;">
                <span class="line-style">_________________</span>
            </div>
            <div style="position:absolute;top:-0.39in;left:0.16in;width:8in;line-height:0.10in;">
                <span class="subheader-style">ATTENTION TO : Assembly OIC</span>
            </div>
            <div style="position:absolute;top:-0.39in;left:1.58in;width:8in;line-height:0.10in;">
                <span class="subheader-data-style" style="font-size:11px;"></span>
            </div>
            <div style="position:absolute;top:-0.39in;left:1.54in;width:8in;line-height:0.10in;">
                <span class="line-style">______________</span>
            </div>
            <div style="position:absolute;top:-0.39in;left:4.80in;width:8in;line-height:0.10in;">
                <span class="subheader-style">DATE : {{$data[0]->checking_date}}</span>
            </div>
            <div style="position:absolute;top:-0.39in;left:5.45in;width:8in;line-height:0.10in;">
                <span class="subheader-data-style"></span>
            </div>
            <div style="position:absolute;top:-0.39in;left:5.39in;width:8in;line-height:0.10in;">
                <span class="line-style">_____________________</span>
            </div>
         
            <table style="width:92%;">
                <thead>
                    <tr>
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
         
            <table style="width:92%;">
        @foreach($data as $row)  
            <tr>
                <td class="tbody-style" width="5%">{{$row->control_number}}</td>
                <td class="tbody-style" width="3%">{{$row->item_rev}}</td>
                <td class="tbody-style" width="9%">{{$row->item_no}}</td>
                <td class="tbody-style" width="9%">{{$row->item_name}}</td>
                <td class="tbody-style" width="3%">{{$row->delivery_qty}}</td>
                <td class="tbody-style" width="6%">{{$row->warehouse_class}}</td>
                <td class="tbody-style" width="7%">{{$row->manufacturing_no}}</td>
                <td class="tbody-style" width="6%">{{$row->destination_code}}</td>
                <td class="tbody-style" width="6%">{{$row->ticket_no}}</td>
                <td class="tbody-style" width="9%">{{$row->product_no}}</td>
            </tr>
            @endforeach
            
        </table>
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


        <table style="width:92%;margin-top:3%;">
            <tr>
                <td class="prepared-style" width="3.5%" height="2%">PREPARED BY:</td>
                <td class="checker-style" width="10%"></td>
                <td class="approved-style" width="6%">APPROVED BY:</td>
                <td class="checker-style" width="10%"></td>
            </tr>
            <tr>
                <td class="" ></td>
                <td class="signatories-style" height="1.75%"></td>=</td>
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
        
                <footer>
                    <div style="position:absolute;top:10.80in;left:5.98in;width:8in;line-height:0.10in;">
                        <img src="../node_modules/template/app/media/img/bg/logo_pdf.png" style="height:1%; width:20%;">
                       
                    </div>
                </footer>
              
</div>

</body>
</html>
