<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BaseController extends Controller
{
        /**
         * success response method.
         *
         * @return \Illuminate\Http\Response
         */
        public function sendResponse($result, $message)
        {
            $response = [
                'success' => true,
                'data'    => $result,
                'message' => $message,
            ];


            return response()->json($response, 200);
        }


        /**
         * return error response.
         *
         * @return \Illuminate\Http\Response
         */
        public function sendError($errorMessages = [], $code = 404)
        {
            $response = [
                'success' => false,
                'message' => $errorMessages,
            ];


            if(!empty($errorMessages)){
                $response['data'] = null;
            }


            return response()->json($response, $code);
        }
}
