<?php

namespace App\Models;

use App\PList;
use App\Traits\CustomAttributesTrait;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use CustomAttributesTrait;

    protected $table = 'employees';
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'title_id',
        'name',
        'last_name',
        'habeas_data',
        'identification_card',
        'expedition_date',
        'date_birth',
        'gender_id',
        'telephone',
        'address',
        'municipality_id',
        'neighborhood',
        'type_housing_id',
        'stratum_id',
        'email',
        'rh_id',
        'marital_status_id',
        'number_children',
        'function_manual',
        'certificate_degrees',
        'title_verification',
        'resolution_rethus',
        'professional_card',
        'advan_life_support',
        'certificate_degrees',
        'certific_victims_sexual_violence',
        'court_ethics_certific',
        'card_protect_validity',
        'civil_liability_policy',
        'occupational_exam',
        'health_id',
        'pension_id',
        'arl_id',
        'account_type_id',
        'account_number',
        'bank_id',
        'date_admission',
        'concept_type_id',
        'date_end',
        'observation',
        'status',
    ];

    /**
     * @param Builder $builder
     */
    public function scopeStatus(Builder $builder)
    {
        $builder->where('status', 1)->orderBy('name', 'ASC');
    }

    /**
     * @param Builder $builder
     * @param array $search
     * @return mixed
     */
    public function scopeSearch(Builder $builder, array $search)
    {
        foreach ($search as $column => $value) {
            switch ($column) {
                case 'name':
                    if ($value) {
                        $builder->where('name', "like", "%{$value}%");
                    }
                    break;
                case 'date_birth':
                    if ($value) {
                        $builder->where('date_birth', "$value");
                    }
                    break;
                case 'status':
                    if ($value !== null) {
                        $builder->where('status', $value);
                    }
                    break;
            }
        }

        return $builder->orderBy('name', 'ASC');
    }

    public static function getArrayList()
    {
        $lists = [
            'titles' => PList::status()->Options('titles')->get(),
            'genders' => PList::status()->Options('genders')->get(),
            'municipalities' => PList::status()->Options('municipalities')->get(),
            'types_of_housing' => PList::status()->Options('types_of_housing')->get(),
            'stratums' => PList::status()->Options('stratums')->get(),
            'maritals_status' => PList::status()->Options('maritals_status')->get(),
            'health' => PList::status()->Options('health')->get(),
            'pension' => PList::status()->Options('pension')->get(),
            'arl' => PList::status()->Options('arl')->get(),
            'account_types' => PList::status()->Options('account_types')->get(),
            'banks' => PList::status()->Options('banks')->get(),
            'concept_types' => PList::status()->Options('concept_types')->get(),
            'rh' => PList::status()->Options('rh')->get(),
        ];

        return $lists;
    }

    public function title()
    {
        return $this->belongsTo(Plist::class, 'title_id');
    }

    public function gender()
    {
        return $this->belongsTo(Plist::class, 'gender_id');
    }

    public function municipality()
    {
        return $this->belongsTo(Plist::class, 'municipality_id');
    }
    
    public function type_housing()
    {
        return $this->belongsTo(Plist::class, 'type_housing_id');
    }

    public function stratum()
    {
        return $this->belongsTo(Plist::class, 'stratum_id');
    }

    public function marital_status()
    {
        return $this->belongsTo(Plist::class, 'marital_status_id');
    }

    public function health()
    {
        return $this->belongsTo(Plist::class, 'health_id');
    }

    public function pension()
    {
        return $this->belongsTo(Plist::class, 'pension_id');
    }

    public function arl()
    {
        return $this->belongsTo(Plist::class, 'arl_id');
    }

    public function account_type()
    {
        return $this->belongsTo(Plist::class, 'account_type_id');
    }

    public function bank()
    {
        return $this->belongsTo(Plist::class, 'bank_id');
    }

    public function concept_type()
    {
        return $this->belongsTo(Plist::class, 'concept_type_id');
    }

    public function rh()
    {
        return $this->belongsTo(Plist::class, 'rh_id');
    }
}