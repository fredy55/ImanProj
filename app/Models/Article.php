<?php

namespace App\Models;

use CodeIgniter\Model;

class Article extends Model
{
    protected $table            = 'articles';
    protected $primaryKey       = 'article_id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['title', 'body'];

}
