<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function transactionType()
    {
        return $this->belongsTo( TransactionType::class );
    }

    public function agent()
    {
        return $this->belongsTo( User::class, 'agent_id' );
    }

    public function customer()
    {
        return $this->belongsTo( User::class, 'user_id' );
    }

}
