<?php

namespace Spatie\LaravelData\Tests\Fakes\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\Tests\Fakes\HiddenData;

class DummyModelWithCastsWithHidden extends Model
{
    protected $casts = [
        'data' => HiddenData::class,
        'data_collection' => DataCollection::class.':'.HiddenData::class,
    ];

    public $timestamps = false;

    public static function migrate()
    {
        Schema::create('dummy_model_with_casts_with_hiddens', function (Blueprint $blueprint) {
            $blueprint->increments('id');

            $blueprint->text('data')->nullable();
            $blueprint->text('data_collection')->nullable();
        });
    }
}
