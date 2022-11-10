<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Order extends Model
{
    use HasFactory;

    const STATUS_APPROVED  = 'Completed';
    const STATUS_PENDING   = 'Pending';
    const STATUS_REJECTED  = 'Rejected';
    
    protected $fillable = [
        'table_id',
        'status',
        'total'
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = Str::uuid()->toString();
            }
        });
    }

    public function getIncrementing()
    {
        return false;
    }

    public function getKeyType()
    {
        return 'string';
    }

    public function table()
    {
        return $this->belongsTo(Table::class);
    }

    public function getTotalWithToman()
    {
        return (string) number_format($this->total) . " تومان";
    }

    public function isCompleted(): bool
    {
        return (bool)($this->status == self::STATUS_APPROVED);
    }

    public function isPending(): bool
    {
        return (bool)($this->status == self::STATUS_PENDING);
    }

    public function isRejected(): bool
    {
        return (bool)($this->status == self::STATUS_REJECTED);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
