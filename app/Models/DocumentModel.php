<?php

namespace App\Models;

use App\Models\BaseModel;

class DocumentModel extends BaseModel
{
    // protected $DBGroup          = 'default';
    protected $table            = 'doc';
    protected $table2           = 'division';
    protected $jointable1table2 = '';
    protected $primaryKey       = 'nodoc';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'nodiv',
        'doc_name',
        'description',
        'xdoc1_name',
        'xdoc1',
        'created_at',
        'updated_at',
    ];

    // Dates
    protected $useTimestamps = true;
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
    protected $beforeInsert   = ['beforeInsert'];
    protected $afterInsert    = [];
    protected $beforeUpdate   = ['beforeUpdate'];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = ['beforeDelete'];
    protected $afterDelete    = [];

    public $logName = false;
    public $logId = true;

    public function getDivision()
    {
        return $this->db->table('division')->get()->getResultArray();
    }
}
