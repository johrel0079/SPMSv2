<html>
    <head>
        <style>
            @page 
            {
                /* margin: 28; */
            } 
            @font-face {
            font-family: 'sbarc39A';
                src: url({{storage_path('fonts/sbarc39A.ttf')}})  format('truetype');
            }
            @font-face {
            font-family: ' sbarc39v';
                src: url({{storage_path('fonts/sbarc39v.ttf')}})  format('truetype');
            }
            /* .header-style {
                font-family: Arial, Helvetica, sans-serif;
                font-size: 8
            }
            .control-style {
                font-family: 'Times New Roman', Times, serif;
                font-size: 11;
                font-weight: bold;
            }
            .title-style {
                font-family: Arial, Helvetica, sans-serif;
                font-size: 15;
            }
            .warehouse-style {
                font-family: Arial, Helvetica, sans-serif;
                font-size: 10;
                font-weight: bold;
            }
            .date-style {
                font-family: 'Times New Roman', Times, serif;
                font-weight: bold;
                font-size: 10; 
            }
            .checker-title-style {
                font-family: Arial, Helvetica, sans-serif;
                font-weight: bold;
                font-size: 8; 
            }
            .checker-style {
                font-family:'Times New Roman', Times, serif;
                font-size: 9; 
            }
            .line-style {
                font-family: Arial, Helvetica, sans-serif;
                font-size: 10; 
            }
            .signature-style {
                font-family: Arial, Helvetica, sans-serif;
                font-size: 5; 
                font-weight: bold;
            }
            .footer-style {
                font-family: Arial, Helvetica, sans-serif;
                font-size: 8; 
                font-style: italic;
            }
            .thead-style {
                font-family: Arial, Helvetica, sans-serif;
                font-weight: bold;
                font-size: 6; 
                text-align:center;
                horizontal-align:middle;
                vertical-align:middle;
            }
            .tbody-style {
                font-family: Arial, Helvetica, sans-serif;
                font-weight: bold;
                font-size: 5; 
                text-align:center;
                horizontal-align:middle;
                vertical-align:middle;
            }
            */
            table {
                border-collapse: collapse;
                border: 2px solid black;
            }
            td {
                border: 1px solid black;
                padding-top: 10px;
                padding-bottom: 10px;
                text-align: center;
                vertical-align: middle;
            } 
            th{
                font-size: 25; 
                padding-top: 15px;
                padding-bottom: 15px;
            }
            .breakdown{
                padding-bottom: 250px;
            }
            .barcode {
                font-family: 'sbarc39v';
                font-size: 50; 
                font-weight: normal;
                vertical-align: middle;
            }
            /* .page-break {
                page-break-after: always;
            }
            .page-break:last-child {
            page-break-after: auto;
            } */
        </style>
    </head>  
    <body>
        <table style="width:100%">
            <tr>
              <th colspan="4">PICKING TICKET</th>
            </tr>
            <tr>
              <td> PART NUMBER </td>
              <td> - </td>
              <td> REV: </td>
              <td> - </td>
            </tr>
            <tr>
              <td> PART ITEM NAME: </td>
              <td> - </td>
              <td> PAYEE CODE: </td>
              <td> - </td>
            </tr>
            <tr>
                <td> DELIVERY QTY: </td>
                <td> - </td>
                <td> MANUF NO: </td>
                <td> - </td>
            </tr>
            <tr>
                <td> ADDRESS: </td>
                <td> - </td>
                <td> ORDER DOWNLOAD NO: </td>
                <td> - </td>
            </tr>
            <tr>
                <td> PAYEECD NAME: </td>
                <td> - </td>
                <td> SUPPLIER: </td>
                <td> - </td>
            </tr>
            <tr>
                <td> WAREHOUSE DATE: </td>
                <td> - </td>
                <td> PRODUCT NO: </td>
                <td> - </td>
            </tr>
            <tr>
                <td> BIN: </td>
                <td> - </td>
                <td> ISSUE DATE: </td>
                <td> - </td>
            </tr>
            <tr>
                <td> NAME: </td>
                <td> DATE: </td>
                <td> STORE LOC: </td>
                <td> - </td>
            </tr>
            <tr>
                <td colspan="2" class="breakdown">BREAKDOWN:</td>
                <td colspan="2" class="breakdown"></td>
            </tr>
            <tr>
               <td colspan="4" class="barcode">BARCODE</td> 
            </tr>
            <tr>
                <td colspan="4" class="padding-top:50px;">
                    <span><b>Collected Orders List</b></span>
                    
                    <table style="width:80%; margin-left:60px;">
                        <tr>
                          <td rowspan="3">No:</td>
                          <td colspan="2">Production Item:</td>
                          <td>Production Name:</td>
                          <td>Proc No:</td>
                        </tr>
                        <tr>
                            <td> Production No: </td>
                            <td> RequestQty: </td>
                            <td> AssignedQTY: </td>
                            <td> SKItem: </td>
                        </tr>
                        <tr>
                            <td colspan="4">COMMENT</td>
                        </tr>
                        <tr>
                            <td rowspan="3"></td>
                            <td colspan="2"></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="4"></td>
                        </tr>
                    </table>
                </td>
            </tr>
          </table>
    </body> 
</html>