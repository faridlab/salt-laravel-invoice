<?php

namespace SaltInvoice\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Support\Facades\Schema;

use SaltLaravel\Models\Resources;

use SaltLaravel\Traits\ObservableModel;
use SaltLaravel\Traits\Uuids;

class Items extends Resources {

    protected $table = 'invoice_items';

    use Uuids;
    use ObservableModel;

    protected $filters = [
        'default',
        'search',
        'fields',
        'relationship',
        'withtrashed',
        'orderby',
        // Fields table provinces
        'id',
        'invoice_id',
        'title',
        'description',
        'data',
    ];

    protected $rules = array(
        'invoice_id' => 'required|string',
        'title' => 'required|string',
        'description' => 'nullable|string',
        'data' => 'nullable|json',
    );

    protected $auths = array (
        'index',
        'store',
        'show',
        'update',
        'patch',
        'destroy',
        'trash',
        'trashed',
        'restore',
        'delete',
        'import',
        'export',
        'report'
    );

    protected $forms = array();
    protected $structures = array();
    protected $searchable = array(
        'invoice_id',
        'title',
        'description',
        'data',
    );

    protected $fillable = array(
        'invoice_id',
        'title',
        'description',
        'data',
    );
}
