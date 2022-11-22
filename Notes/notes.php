<?php
/*
 ************************* functions
 ********** Do command for all tenants => runForEach()
 *  Tenant::all()->runForEach($tenant){
 *  User::create([
 *   'name'=>'username'.$tenant->name,
 *   'email'=>'email@app.com',
 * ]);
 *
 *
 *  ********** Do command for one tenant => run()
 *
 *  * $tenant = Tenant::find('ali');
 * $tenant->run(function(){
 *
 *    User::create([
 *   'name'=>'username'.$tenant->name,
 *   'email'=>'email@app.com',
 * ]);
 *
 * });

 * ************************* central domain  ********************************
 * show image
    <img src="{{tenant_asset('images/me.png')}}">

  ************************** tenant domain **********************************
 * show image
 <img src="{{asset('images/me.png')}}">







*/
