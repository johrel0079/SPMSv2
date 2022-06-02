<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterData extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $fillable = [
        'warehouse_class',
        'delivery_form',
        'item_no',
        'item_rev',
        'delivery_qty',
        'stock_address',
        'manufacturing_no',
        'delivery_inst_date',
        'destination_code',
        'item_name',
        'product_no',
        'ticket_no',
        'ticket_issue_date',
        'ticket_issue_time',
        'storage_location',
        'delivery_due_date',
        'order_download_no',
        'process_masterlist_id',
    ];

    protected $dates= ['delivery_inst_date','ticket_issue_date','delivery_due_date'];
}
