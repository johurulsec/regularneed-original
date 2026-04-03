<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CoinTransaction extends Model
{
    protected $fillable = [
        'user_id',
        'type',
        'amount',
        'description',
        'reference_type',
        'reference_id',
        'balance_after',
    ];

    protected $casts = [
        'amount' => 'integer',
        'balance_after' => 'integer',
    ];

    const TYPE_CREDIT = 'credit';
    const TYPE_DEBIT = 'debit';

    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }

    /**
     * Create a credit transaction
     */
    public static function credit($userId, $amount, $description, $referenceType = null, $referenceId = null)
    {
        $user = \App\User::find($userId);
        $user->addCoins($amount);

        return self::create([
            'user_id' => $userId,
            'type' => self::TYPE_CREDIT,
            'amount' => $amount,
            'description' => $description,
            'reference_type' => $referenceType,
            'reference_id' => $referenceId,
            'balance_after' => $user->getCoinsBalance(),
        ]);
    }

    /**
     * Create a debit transaction
     */
    public static function debit($userId, $amount, $description, $referenceType = null, $referenceId = null)
    {
        $user = \App\User::find($userId);
        if ($user->deductCoins($amount)) {
            return self::create([
                'user_id' => $userId,
                'type' => self::TYPE_DEBIT,
                'amount' => $amount,
                'description' => $description,
                'reference_type' => $referenceType,
                'reference_id' => $referenceId,
                'balance_after' => $user->getCoinsBalance(),
            ]);
        }
        return false;
    }
}
