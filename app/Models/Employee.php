<?php

namespace App\Models;

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
        'title',
        'habeas_data',
        'expedition_date',
        'gender',
        'telephone',
        'address',
        'municipality',
        'neighborhood',
        'type_housing',
        'stratum',
        'email',
        'rh',
        'marital_status',
        'number_children',
        'function_manual',
        'certificate_degrees',
        'title_verification',
        'resolution_rethus',
        'professional_card',
        'advan _life_support',
        'certific_victims_sexual_violence',
        'court_ ethics_certific',
        'card_ protect_validity',
        'civil liability policy',
        'health',
        'pension',
        'arl',
        'account_number',
        'date _admission',
        'concept_contract',
        'date_ end',
        'observations',
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
                case 'status':
                    if ($value !== null) {
                        $builder->where('status', $value);
                    }
                    break;
            }
        }

        return $builder->orderBy('name', 'ASC');