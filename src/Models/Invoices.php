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

class Invoices extends Resources {
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
        'project_id',
        'base_currency',
        'exchange_currency',
        'exchange_value',
        'code_number',
        'contact_id',
        'invoice_date',
        'due_date',
        'description',
        'data',
        'status',
        'is_template',
    ];

    protected $rules = array(
        'project_id' => 'required|string',
        'base_currency' => 'nullable|string',
        'exchange_currency' => 'nullable|string',
        'exchange_value' => 'required|float',
        'code_number' => 'required|string',
        'contact_id' => 'required|string',
        'invoice_date' => 'required|date',
        'due_date' => 'required|date',
        'description' => 'required|string',
        'data' => 'nullable|json',
        'status' => 'required|in:draft,active',
        'is_template' => 'required|boolean',
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
        'project_id',
        'base_currency',
        'exchange_currency',
        'exchange_value',
        'code_number',
        'contact_id',
        'invoice_date',
        'due_date',
        'description',
        'data',
        'status',
        'is_template',
    );

    protected $fillable = array(
        'project_id',
        'base_currency',
        'exchange_currency',
        'exchange_value',
        'code_number',
        'contact_id',
        'invoice_date',
        'due_date',
        'description',
        'data',
        'status',
        'is_template',
    );
}
