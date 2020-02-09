<?php

namespace Boke0\Mechanism\Plugins\Conveyor;
use \Boke0\Mechanism\Api\Endpoint;
use \Boke0\Mechanism\Plugins\VacuumTube\Session;

/**
 * @path /admin/images
 */
class ImagesEndpoint extends Endpoint{
    public function handle($req,$args){
        if(Session::get("vt_uid")==NULL){
            return $this->createResponse()->withHeader("Location","/admin/login");
        }
        $images=scandir(__DIR__."/../../uploads");
        $images=array_filter($images,function($image){
            if(substr($image,0,1)==".") return false;
            return  true;
        });
        return $this->twig("images.tpl.html",[
            "images"=>$images
        ]);
    }
}
