<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Voter extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public $table = 'voters';

    protected $dates = [
        'register_date',
        'birth_day',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'circuit_no',
        'parlmaint_no',
        'parlmaint_name',
        'parlmaint_type',
        'gender_id',
        'letter_id',
        'register_number',
        'register_date',
        'moi_reference',
        'full_name',
        'name_1',
        'name_2',
        'name_3',
        'name_4',
        'birth_day',
        'job',
        'address',
        'register_status',
        'phone',
        'attended',
        'targeted',
        'area_id',
        'committee_id',
        'admin_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function gender()
    {
        return $this->belongsTo(Gender::class, 'gender_id');
    }

    public function letter()
    {
        return $this->belongsTo(Letter::class, 'letter_id');
    }

    public function getRegisterDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setRegisterDateAttribute($value)
    {
        $this->attributes['register_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getBirthDayAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setBirthDayAttribute($value)
    {
        $this->attributes['birth_day'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function area()
    {
        return $this->belongsTo(Area::class, 'area_id');
    }

    public function committee()
    {
        return $this->belongsTo(Committee::class, 'committee_id');
    }

    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
