<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class AdmissionController extends Controller{

  public function __construct(request $request) {
    $this->Patient = new Patient();
  }

  //MODULO DE PACIENTES
  public function getPatient(Request $request) {

    $documento = $request->input("documento");
    return $this->Patient->getPatient($documento);

  }

  public function createPatient(Request $request) {
  
  try{
    $patients = [
      "hc" => $request->input("hc"),
      "url_imagen" => "",
      "nombre" => $request->input("nombre"),
      "apellido" => $request->input("apellido"),
      "documento" => $request->input("documento"),
      "email" => $request->input("email"),
      "direccion" => $request->input("direccion"),
      "telefono" => $request->input("telefono"),
      "sexo" => $request->input("sexo"),
      "fecha_nacimiento" => $request->input("fecha_nacimiento"),
      "edad" => $request->input("edad"),
      "menor_edad" => $request->input("menor_edad"),
      "familiar_documento" => $request->input("familiar_documento"),
      "gruposangunieo" => $request->input("gruposangunieo"),
      "ocupacion" => $request->input("ocupacion"),
      "grado_academico" => $request->input("grado_academico"),
      "estado_civil" => $request->input("estado_civil"),
      "departamento" => $request->input("departamento"),
      "provincia" => $request->input("provincia"),
      "distrito" => $request->input("distrito"),
      "usuario" => $request->input("usuario"),
      "estado" => "Activo",
      "password" => ""
    ];
    $this->Patient->createPatient($patients);

    return response()->json([
      'message' => 'El paciente se ha creado en la base de datos',
      'status' => 200
    ]);
  }
  catch(\exception $e){
    return response()->json([
      'status' => 400,
      'message' => $e->getMessage()
    ]);
  }

  }

  public function updatePatient(Request $request){

  }

  public function getClinicHistory() {

  }

  // MODULO DE ADMISIONES
  public function getAdmission() {

  }

  public function createAdmission() {

  }

  // MODULO DE TRIAGE
  public function getTriage() {
    
  }
  public function createTriage() {
    
  }

  // MODULO DE LABORATORIO
  public function getLaboratoryTable(){

  }

  public function CreateExamenLaboratory() {

  }
}