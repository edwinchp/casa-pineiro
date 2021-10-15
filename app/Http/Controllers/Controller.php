<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getPicturePaths($obj, $type){
        $paths = array();
        $pics = $obj->pictures->where('type', $type);

        foreach ($pics as $pic) {
            if ($pic->path != null) {
                array_push($paths, '/images/products/' . $pic->path);
            }
        }

        return $paths;
    }
}
