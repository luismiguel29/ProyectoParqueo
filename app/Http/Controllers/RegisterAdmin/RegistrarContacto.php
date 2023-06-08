<?php

namespace App\Http\Controllers\RegisterAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contacto;

class RegistrarContacto extends Controller
{

    /**
     * Muestra el formulario para editar un contacto existente.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $contacto = Contacto::first();
        return view('registro.registerContacto', compact('contacto'));
    }

    /**
     * Actualiza un contacto existente en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $contacto = Contacto::first();
        $contacto->update($request->all());

        return redirect()->route('contacto.edit')->with('success', 'Contacto actualizado correctamente');
    }


}
