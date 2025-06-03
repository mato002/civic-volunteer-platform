<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = ['key', 'value'];

    public $timestamps = false;

    /**
     * Retrieve a setting by key with optional default.
     */
    public static function getValue($key, $default = null)
    {
        return static::where('key', $key)->value('value') ?? $default;
    }

    /**
     * Set or update a setting value.
     */
    public static function setValue($key, $value)
    {
        return static::updateOrCreate(['key' => $key], ['value' => $value]);
    }
}
