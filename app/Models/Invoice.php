<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $table = "invoices";
    protected $primaryKey = "id";
    protected $keyType = "integer";
    public $incrementing = true;
    public $timestamps = true;
    protected $fillable = [
        "id","user_id","domain_name","total","domain_contract","payment_status","created_at","updated_at"
    ];

    public function user(){return $this->belongsTo(User::class,"user_id","id");}
}
