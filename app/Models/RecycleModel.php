<?php

namespace App\Models;

use CodeIgniter\Model;

class RecycleModel extends Model
{
    protected $DBGroup = 'default';
    protected $table = 'recycle_bin';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = [
        'REGION',
        'PROVINCE',
        'MUNICIPALITY',
        'BRGY',
        'HH_ID',
        'ENTRY_ID',
        'FIRST_NAME',
        'MIDDLE_NAME',
        'LAST_NAME',
        'EXT_NAME',
        'BIRTHDAY',
        'AGE',
        'SEX',
        'CLIENT_STATUS',
        'MEMBER_STATUS',
        'RELATION_TO_HH_HEAD',
        'GRANTEE',
        'REGISTRATION_STATUS',
        'HH_SET',
        'SOLO_PARENT',
        'IP_AFFILIATION',
        'phil_id',
        'PREGNANCY_STATUS',
        'HEALTH_FACILITY',
        'CHILD_BENE',
        'GRADE_LEVEL',
        'ATTEND_SCHOOL',
        'SCHOOL_NAME',
        'MONITORED_EDUC',
        'REASON_FOR_NOT_ATTENDING_EDUC',
        'DATE_REASON_EDUC',
        'MONITORED_HEALTH',
        'REASON_FOR_NOT_ATTENDING_HEALTH',
        'DATE_REASON_HEALTH',
        'DISABILITY_ID',
        'DISABILITY_STATUS',
        'LRN',
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    // Validation
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert = [];
    protected $afterInsert = [];
    protected $beforeUpdate = [];
    protected $afterUpdate = [];
    protected $beforeFind = [];
    protected $afterFind = [];
    protected $beforeDelete = [];
    protected $afterDelete = [];
}
