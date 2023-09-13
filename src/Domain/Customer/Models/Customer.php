<?php

declare(strict_types=1);

namespace Domain\Customer\Models;

use Domain\Shared\Model\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

final class Customer extends Authenticatable implements JWTSubject
{
    use HasFactory;
    use HasUuid;

    protected string $guard = 'customer';

    protected $guarded = ['id'];

    protected $casts = [
    ];

    protected $fillable = [
        'resource_id',
        'first_name',
        'middle_name',
        'last_name',
        'phone_number',
        'pin',
        'email',
        'password',
        'status',
    ];

    public function getRouteKeyName(): string
    {
        return 'resource_id';
    }

    public function token(): HasOne
    {
        return $this->hasOne(
            related: Token::class,
            foreignKey: 'customer_id'
        );
    }

    public function pin(): HasOne
    {
        return $this->hasOne(
            related: Pin::class,
            foreignKey: 'customer_id'
        );
    }

    public function kyc(): HasOne
    {
        return $this->hasOne(
            related: Kyc::class,
            foreignKey: 'kyc_id'
        );
    }

    public function linkedAccounts(): HasMany
    {
        return $this->hasMany(
            related: LinkedAccount::class,
            foreignKey: 'customer_id'
        );
    }

    public function getJWTIdentifier(): mixed
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims(): array
    {
        return [];
    }
}
