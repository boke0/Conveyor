<?php

namespace Boke0\Mechanism\Plugins\Conveyor;
use \Boke0\Mechanism\Api\Endpoint;

/**
 * @path /asset/delete
 * @method POST
 */
class DeleteEndpoint extends Endpoint{
    public function handle($req,$args){
        if(Session::get("vt_uid")==NULL){
            return $this->createResponse(401,"Unauthorized");
        }
        $post=$req->getParsedBody();
        unlink(__DIR__."/../../uploads/{$post["filename"]}");
        return $this->createResponse(200,"OK");
    }
}
