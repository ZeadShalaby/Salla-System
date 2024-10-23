<?php
namespace App\Traits;

use App\Models\Limits;
use App\Traits\ResponseTrait;

trait MethodTrait
{
    use ResponseTrait;

    // todo check users expired | ^ //
    protected function isExpired($userid)
    {
        try {
            $limit = Limits::where('limitable_id', $userid)->value('expire');
            if (isset($limit) && $limit != 0) {
                return false;
            }
            return true;
        } catch (\Exception $e) {

            return $this->returnError('', $e->getMessage());
        }

    }

}