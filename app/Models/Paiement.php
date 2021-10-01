<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paiement extends Model
{
    use HasFactory;
    protected $fillable = [
        'montant',
        'email',
        'nom_client',
        'pay_method',
        'transaction_id',
        'note',
        'status',
    ];
}
