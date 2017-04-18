<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->get('/', function () use ($app) {
    return $app->version();
});
// CHORD CONTROLLER
$app->get('chord', [
    'as' => 'chord', 'uses' => 'ChordController@getChord'
]);
$app->get('chord_guitar', [
    'as' => 'chord_guitar', 'uses' => 'ChordController@getChordGuitar'
]);
$app->get('chords_by_scale', [
    'as' => 'chords_by_scale', 'uses' => 'ChordController@getChordsByScale'
]);
$app->get('chord_types', [
    'as' => 'chord_types', 'uses' => 'ChordController@getChordTypes'
]);
// SCALE CONTROLLER
$app->get('scale', [
    'as' => 'scale', 'uses' => 'ScaleController@getScale'
]);
$app->get('scale_names', [
    'as' => 'scale_names', 'uses' => 'ScaleController@getScaleNames'
]);
