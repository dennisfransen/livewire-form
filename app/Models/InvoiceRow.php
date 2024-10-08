<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InvoiceRow extends Model
{
    use HasFactory;

	public function invoice(): BelongsTo
	{
		return $this->belongsTo(Invoice::class);
	}
}
