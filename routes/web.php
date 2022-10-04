<?php

use Illuminate\Support\Facades\Route;


Route::get('', "MainController@landing")->name('landing');

Route::middleware(['guest'])->group(function() {
    Route::get('/iniciar-sesion', 'AuthController@loginPage')->name('login.page');
    Route::post('/iniciar-sesion', 'AuthController@authenticate')->name('login.auth');
    Route::get('/registro', 'UserController@create')->name('register.page');
    Route::post('/registro', 'UserController@store')->name('register.new');
});

Route::middleware(['auth'])->prefix('panel')->group(function() {

    Route::get('/admin', 'Admin\AdminController@index')->name('admin-index');
    
    Route::get('/edit-perfil', 'MainController@index')->name('edit-perfil');
    Route::post('/edit-perfil', 'MainController@index')->name('edit-perfil');   
    Route::post('/dell', 'MainController@duser')->name('dell-users');     
    Route::get('/', 'PerfilController@index')->name('panel');     
    Route::post('/{connection}/aceptar-conexion', 'ConnectionController@accept')->name('connection.accept');
    Route::post('/{connection}/declinar-conexion', 'ConnectionController@decline')->name('connection.decline');
    
    Route::prefix('usuarios/')->name('user.')->group(function() {
        Route::put('/cambiar-informacion', 'UserController@information')->name('information');
        Route::get('/config-count', 'UserController@profile')->name('config');
        Route::get('/mi-perfil', 'PerfilController@index')->name('profile');        
        Route::get('/usuarios', 'UserController@index')->name('index');
        Route::prefix('{user}')->group(function() {
            Route::get('/perfil', 'UserController@shperfil')->name('show');
            Route::post('/password', 'UserController@password')->name('password');
            Route::post('/actualizar', 'UserController@update')->name('update');
            Route::post('/mandar-conexion', 'ConnectionController@send')->name('connection.send');
            Route::get('/chat', 'ChatController@index')->name('chat');
            Route::get('/ofertas-recibidas', 'UserController@offersreceived')->name('offers');
            Route::get('/proyectos-en-marcha', 'UserController@proyectos')->name('march');
            Route::get('/proyectos-propuestos', 'UserController@proposedprojects')->name('proposed');
            Route::get('/chat', 'Ofertacontroller@index')->name('chat');
            Route::post('/guardar', 'Ofertacontroller@store')->name('store');    
            Route::get('/mensajes', 'ChatController@all')->name('chat.messages');
            Route::get('/conexiones', 'ConnectionController@index')->name('connections');
            Route::post('/mensajes', 'ChatController@store')->name('chat.send');
            Route::get('buscar', 'UserController@conexiones')->name('search');
            Route::get('', 'UserController@misConexiones')->name('own');
            Route::get('mis-cursos', 'UserController@cursos')->name('mine');
            
        });
    });

    Route::resource('industrias', IndustriaController::class);

    Route::prefix('conexiones/')->name('conexiones.')->group(function() {
        Route::get('buscar', 'UserController@conexiones')->name('search');
        Route::post('todas', 'UserController@getConexiones')->name('get');
        Route::get('obtener-chats', 'UserController@getMyChats')->name('chats');
        Route::get('mias', 'UserController@getMyConexiones')->name('mine');
        Route::get('', 'UserController@misConexiones')->name('own');
        //Route::get('chats', 'UserController@misConexionesChat')->name('chat');
    });
    Route::prefix('cursos/')->name('cursos.')->group(function() {
        Route::get('buscar', 'UserController@buscarCursos')->name('search');
        Route::get('mis-cursos', 'UserController@cursos')->name('mine');
    });
    Route::prefix('alianzas/')->name('alianzas.')->group(function() {
        Route::get('/buscar', 'UserController@alianzas')->name('search');
    
    });
    Route::get('/salir', 'AuthController@logout')->name('logout');
});