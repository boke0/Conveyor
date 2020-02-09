<?php

namespace Boke0\Mechanism\Plugins\Conveyor;
use \Boke0\Mechanism\Api\Endpoint;
use \Boke0\Mechanism\Plugins\VacuumTube\Session;

/**
 * @path /admin/image/post
 * @method POST
 */
class UploadEndpoint extends Endpoint{
    public function handle($req,$args){
        if(Session::get("vt_uid")==NULL){
            return $this->createResponse()->withHeader("Location","/admin/login");
        }
        if(!is_dir(__DIR__."/../../uploads")) mkdir(__DIR__."/../../uploads");
        $mime_types = array(
            'image/png'=>'png', 
            'image/jpeg'=>'jpe', 
            'image/jpeg'=>'jpeg',
            'image/jpeg'=>'jpg', 
            'image/gif'=>'gif', 
            'image/bmp'=>'bmp', 
            'image/vnd.microsoft.icon'=>'ico', 
            'image/tiff'=>'tiff',
            'image/tiff'=>'tif', 
            'image/svg+xml'=>'svg', 
            'image/svg+xml'=>'svgz'
        );
        $files=$req->getUploadedFiles();
        $ext=$mime_types[$files["image"]->getClientMediaType()];
        $id=hash("sha256",uniqid().mt_rand());
        $files["image"]->moveTo(__DIR__."/../../uploads/{$id}.{$ext}");
        $res=$this->createResponse();
        $body=$res->getBody();
        $body->write($id.".".$ext);
        return $res->withBody($body);
    }
}
