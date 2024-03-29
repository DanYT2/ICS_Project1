<?php

  namespace App\Models;

  use Illuminate\Database\Eloquent\Factories\HasFactory;
  use Illuminate\Database\Eloquent\Model;
  use Illuminate\Database\Eloquent\Relations\BelongsTo;

  class Prescription extends Model
  {
    use HasFactory;
    protected $guarded = [];

    public function doctor (): BelongsTo
    {
      return $this->belongsTo(User::class);
    }

    public function user (): BelongsTo
    {
      return $this->belongsTo(User::class);
    }
  }
