<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\medicamentosModel;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;

class medicamentosController extends Controller
{
    public function get($id){
    	$edit = medicamentosModel::find($id);
        return $edit;
    }

    public function AgregarMedicamentos(Request $request){

        $users = $request->all();
        $add = new medicamentosModel();
        $add->nombre = $users["nombre"];
        $add->formula = $users["formula"];
        $add->subtotal = $users["subtotal"];
        $subtotal1 = $users["subtotal"]*.16;
        $subtotal2 = $subtotal1 + $users["subtotal"];
        $add->total = $subtotal2;
        $add->save();
        
        return $add;
    }

    public function EditarMedicamento($id, Request $request){
        $edit = $this->get($id);
        
        $edit->nombre = $request["nombre"];
        $edit->formula = $request["formula"];
        $edit->subtotal = $request["subtotal"];
        $subtotal1 = $request["subtotal"]*.16;
        $subtotal2 = $subtotal1 + $request["subtotal"];
        $edit->total = $subtotal2;
        
        $edit->save();
    	
    	return $edit;
    }

    public function TodosMedicamentos()
    {
        $usr = medicamentosModel::all();
        $data=count($usr);
       
        $i=0;
        foreach($usr as $row){
       
            $renglon = array();
       
            $renglon["id"] = $row->id;
            $renglon["nombre"] = $row->nombre;
            $renglon["formula"] = $row->formula;
            $renglon["subtotal"] = $row->subtotal;
            $renglon["total"] = $row->total;
            $response[] = $renglon;
            $i++;
        }

      
       $output[] = $response;

        return ($response);
       
        //return $usr;
        
    }

    public function BorrarMedicamento($id){
    	$delete = $this->get($id);
    	$delete->delete();
    }

    public function exportar(){
        return Excel::download(new UsersExport, 'medicamentos.xlsx');
    }

    public function archivos(){
        echo sys_get_temp_dir() . PHP_EOL;
    }

}
