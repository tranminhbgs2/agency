<?php

namespace App\Models;

use App\Helpers\Constants;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Output extends Model
{
    use SoftDeletes; // Thêm dòng này để sử dụng Soft Deletes
    protected $table = Constants::TABLE_OUTPUT;
    public $timestamps = true;

    protected $fillable = [
        'name',
        'url',
        'created_by',
        'status',
    ];

    /**
     * Tính xem vị trí này thuộc phòng/ban nào
     */
    public function managerBy()
    {
        return $this->belongsTo(User::class, 'manager_id', 'id');
    }

    /**
     * Danh sách các tài khoản ngân hàng của agent
     */
    public function bankAccounts()
    {
        return $this->hasMany(BankAccounts::class, 'agent_id', 'id');
    }
}
