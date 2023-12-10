<?php

namespace App\Models;

use CodeIgniter\Model;

class EncoderModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'encoder';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['ENTRY_ID','GRANTEE_NAME','MUNICIPALITY','HH_ID','BRGY','HH_STATUS', 'VALIDATED', 'WITH_VALIDATION_TOOL', 'WITH_UPDATE_REQUEST', 'DATE_VALIDATED',
     'NAME_OF_VALIDATOR', 'SUBMITTED', 'DATE_SUBMITTED', 'ENCODED_IN_PPIS_MCCTIS', 'TYPES_OF_UPDATES_FIELD', 'ENCODER', 'DATE_ENCODED', 'REMARKS'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}
