<?php
/**
 * Created by PhpStorm.
 * User: Rhadoo
 * Date: 8/21/15
 * Time: 1:00 AM
 */

namespace App\Extended;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Carbon\Carbon;

class CustomModel extends Model
{
    public static $snakeAttributes = false;

    public static function cacheMutatedAttributes($class)
    {
        $mutatedAttributes = [];

        // Here we will extract all of the mutated attributes so that we can quickly
        // spin through them after we export models to their array form, which we
        // need to be fast. This'll let us know the attributes that can mutate.
        foreach (get_class_methods($class) as $method) {
            if (strpos($method, 'Attribute') !== false &&
                preg_match('/^get(.+)Attribute$/', $method, $matches)) {
                if (static::$snakeAttributes || (in_array($matches[1], ['CreatedAt', 'UpdatedAt', 'DeletedAt']))) {
                    $matches[1] = Str::snake($matches[1]);
                }

                $mutatedAttributes[] = lcfirst($matches[1]);
            }
        }

        static::$mutatorCache[$class] = $mutatedAttributes;
    }

    public function getCreatedAtAttribute($value) {
        if (!is_null($value)) {
            try {
                $value = Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('d-m-Y H:i');
            } catch (\Exception $e) {
                return $value;
            }
        }

        return $value;
    }

    public function getUpdatedAtAttribute($value) {
        if (!is_null($value)) {
            try {
                $value = Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('d-m-Y H:i');
            } catch (\Exception $e) {
                return $value;
            }
        }
    }
}