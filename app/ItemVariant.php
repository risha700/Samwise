<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Elasticquent\ElasticquentTrait;

class ItemVariant extends Model
{
  /*
  |--------------------------------------------------------------------------
  | Eloquent Configuration
  |--------------------------------------------------------------------------
  */

	/**
   * The accessors to append to the model's array form.
   *
   * @var array
   */
  protected $appends = [];
  /**
   * The attributes that should be casted to native types.
   *
   * @var array
   */
  protected $casts = [];

  /**
   * The attributes that aren't mass assignable.
   *
   * @var array
   */
  protected $guarded = ['id', 'created_at', 'updated_at', 'prev', 'next'];

  /*
  |--------------------------------------------------------------------------
  | Eloquent Relations
  |--------------------------------------------------------------------------
  */

  /**
   * An variant belongs to one item
   */
  public function item()
  {
      return $this->belongsTo('App\Item');
  }

  /*
  |--------------------------------------------------------------------------
  | Computed Properties
  |--------------------------------------------------------------------------
  */

  /**
   * Retrieve the prev item
   */
  public function getPrevAttribute()
  {
    $prev_id = ItemVariant::where('id', '<', $this->id)->max('id');
    if ($prev_id == null) {
      $prev_id = ItemVariant::all()->max('id');
    }
    return "/item-variant/$prev_id";
  }

  /**
   * Retrieve the next item
   */
  public function getNextAttribute()
  {
    $next_id = ItemVariant::where('id', '>', $this->id)->min('id');
    if ($next_id == null) {
      $next_id = ItemVariant::all()->min('id');
    }
    return "/item-variant/$next_id";
  }

  /*
  |--------------------------------------------------------------------------
  | Elastiquent Configuration
  |--------------------------------------------------------------------------
  */
  use ElasticquentTrait;

  /**
   * Set mapping properties
   */
  protected $mappingProperties = array();

  /**
   * Modify index model as it goes into ES
   */
  function getIndexDocumentData()
  {

  }
}