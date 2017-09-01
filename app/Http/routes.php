<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/', function()
{
    return View::make('pages.home');
});
Route::get('/complaint', function()
{
    return View::make('pages.complaintsForm');
});

Route::get('/faq', function()
{
    return View::make('pages.faq');
});

Route::get('/findTicket', function()
{
    return View::make('pages.searchTicket');
});

Route::get('/ViewAllComplaints', 'Controller@showTickets');

Route::post('/addTicket', 'Controller@addTicket');

Route::post('/addComment', 'Controller@addComment');

Route::post('/searchTicket', 'Controller@searchTicket');