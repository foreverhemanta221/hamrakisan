<?php

namespace App\Models\Forms;

use Illuminate\Database\Eloquent\Model;

class FarmListForm extends Model
{
    protected $fillable = ['farmName','farmerName','farmEmail','farmPhone','farmLocation','farmDescription'];
}
