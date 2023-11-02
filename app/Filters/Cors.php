<?php
 
namespace App\Filters;
 
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
 
class Cors implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Set the headers to allow cross-origin requests
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: *');
        header("Access-Control-Allow-Headers: X-API-KEY, Origin,X-Requested-With, Content-Type, Accept, Access-Control-Requested-Method, Authorization");
        // header("access-control-allow-credentials", "true");

        return $request;
    }
     
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        //
    }
}