<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ListModel extends Model{
    use HasFactory;

    // GET SPECIALTIES OF DOCTOR
    public function getSpecialties(){
      $specialties = DB::table('especialidades')
                    ->select('*')
                    ->where('estado', 'Disponible')
                    ->get();

      return $specialties;
    }

    public function getDoctor() {
      $doctor = DB::table('doctores')
                ->select('codigo_doctor','nombre')
                ->where('estado', 'Activo')
                ->get();

      return $doctor;
    }

    public function getDepartaments() {
      $departament = DB::table('departamentos')
                     ->select('*')
                     ->get();

      return $departament;
    }
    
    public function getProvince($departament) {
      $province = DB::table('provincia')
                  ->select('*')
                  ->where("departmento_id", $departament)
                  ->get();

      return $province;
    }

    public function getDistrict($province, $departament) {
      $district = DB::table('distritos')
                  ->select('*')
                  ->where("provincia_id", $province)
                  ->where("departmento_id", $departament)
                  ->get();

      return $district;
    }

    public function getCategories() {
      $category = DB::table('categorias')
                 ->select('*')
                 ->get();

      return $category;
    }

    public function getProducts() {
      $product = DB::table('productos')
                 ->select('productos.*', 'categorias.nombre as categoria')
                 ->join('categorias', 'productos.categoria', '=', 'categorias.id')
                 ->get();

      return $product;
      
    }

    public function getDocumentosPdfPacientes($paciente) {
      $product = DB::table('documentos_pacientes')
                   ->select('*')
                   ->where('paciente', $paciente)
                   ->get();

      return $product;
    }
    
}
