<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class colposcopia extends Model
{
    use HasFactory;

    public function getColposcopias() {
      $colposcopias = DB::table("colposcopias")
                      ->select("*")
                      ->get();

      return $colposcopias;
    }

    public function createColposcopia () {
      $colposcopias = [
       "paciente" => $data["documento"],
       "fecha" => $data["fecha"],
       "medico" => $data["medico"],
       "escamo_columnar	" => $data["escamo_columnar	"],
       "endo_cervix" => $data["endo_cervix"],
       "perineo" => $data["perineo"],
       "region_parianal" => $data["region_parianal"],
       "biopsia" => $data["biopsia"],
       "papanicolaou" => $data["papanicolaou"],
       "conclusiones" => $data["conclusiones"],
       "imagen1" => $data["imagen1"],
       "imagen2" => $data["imagen2"],
       "usuario" => $data["usuario"],
       "cmp" => $data["cmp"],
      ];

      DB::table("colposcopias")
          ->insert($colposcopias);
    }
}
