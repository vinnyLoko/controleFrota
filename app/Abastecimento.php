<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Abastecimento extends Model
{
    //
    protected $fillable = ['dataAbastecimento','numeroCupom','kilometragem','veiculo_id','valor','litros'];

    public static function pegaKM(){

        $km = Abastecimento::orderBy('dataAbastecimento','desc')->pluck('dataAbastecimento');
        $km2 = Abastecimento::all()->where(Abastecimento::raw('dataAbastecimento < curent_date and dataAbastecimento > curent_date -30'));
        //$km3 = Abastecimento::select(Abastecimento::raw('dataAbastecimento < current_date and dataAbastecimento > current_date -30'))->pluck('dataAbastecimento');
        $hoje = date('Y-m-d', strtotime('-30 days'));
        $datas = [];
        foreach ($km as $key => $data) {
            
           $teste = date('Y/m/d', strtotime($data));
           
            if ($teste >= $hoje){
                dd($teste,$km,$hoje);
              $datas []= $data;  
            }
            
        }
        


        



    }
}

