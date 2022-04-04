<?php

namespace App\Models;

use CodeIgniter\Model;

class Article extends Model
{
    protected $table            = 'articles';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['title', 'full_text', 'tag'];

}
