<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
class TicketController extends Controller
{
    public function printTicket($data)
    {
      $pdf = PDF::loadView('PDF.ticket_issuance',$data)->setPaper('A4', 'portrait');
      $fileName = 'TicketIssuance';
      return $pdf->stream();
    }

    public function printDR()
    {
      $pdf = PDF::loadView('PDF.delivery_receipt')->setPaper('A4', 'portrait');
      $fileName = 'DeliveryTicket';
      return $pdf->stream();
    }
}
