<?php

namespace App\Observers;

use App\Katalog;
use App\Log;
use Auth;

class KatalogObserver
{   
    public function saved($katalog)
    {
        if($katalog->wasRecentlyCreated == true){
            $action = 'CREATED';
        }else{
            $action = 'UPDATED';
        }
        if(Auth::check()){
            Log::create([
                'id_user'       => Auth::user()->id,
                'log_change'    => $action,
                'id_katalog'    => $katalog->id_katalog
                ]);
        }
    }

    public function deleting($katalog)
    {
        if(Auth::check()){
            Log::create([
                'id_user'       => Auth::user()->id,
                'log_change'    => 'DELETED',
                'id_katalog'    => $katalog->id_katalog
                ]);
        }
    }
}
