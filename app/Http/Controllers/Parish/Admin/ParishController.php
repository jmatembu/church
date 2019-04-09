<?php

namespace App\Http\Controllers\Parish\Admin;

use App\Parish;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ParishController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param  \App\Parish  $parish
     * @return \Illuminate\Http\Response
     */
    public function show(Parish $parish)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Parish  $parish
     * @return \Illuminate\Http\Response
     */
    public function edit(Parish $parish)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Parish  $parish
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Parish $parish)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Parish  $parish
     * @return \Illuminate\Http\Response
     */
    public function destroy(Parish $parish)
    {
        //
    }
}
