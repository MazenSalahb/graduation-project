<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Chat extends Model
{
    use HasFactory;
    protected $fillable = ['seller_id', 'buyer_id', 'book_id'];

    public function messages()
    {
        return $this->hasMany(Message::class);
    }
    public function buyer()
    {
        return $this->belongsTo(User::class);
    }
    public function seller()
    {
        return $this->belongsTo(User::class);
    }
    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    // Accessor
    protected function CreatedAt(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => \Carbon\Carbon::parse($value)->diffForHumans(),
        );
    }
    protected function UpdatedAt(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => \Carbon\Carbon::parse($value)->diffForHumans(),
        );
    }
}
