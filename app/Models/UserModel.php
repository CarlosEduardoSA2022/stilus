<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'usuario';
    protected $primaryKey       = 'usr_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'usr_nome', 'usr_email','usr_cpf','usr_senha','usr_usuario_tipo_id','usr_ativo'
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'usr_email'         => 'required|max_length[150]|valid_email|is_unique[usuario.usr_email,usr_id,{usr_id}]',
        'usr_senha'         => 'required|max_length[60]',
    ];

    protected $validationMessages   = [
        'usr_email' => [
            'is_unique'     => 'Atenção! Este e-mail já existe em nosso sistema.',
            'max_length'    => 'O campo e-mail deve ter 150 caracteres',
            'valid_email'   => 'Por favor, digitar e-mail correto'
        ],
    ];
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
