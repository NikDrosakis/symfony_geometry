<?php
// src/Controller/Circle.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class Circle  extends AbstractController{
	
    public function calculate(int $radius){
		$p=3.14;
		$surface=$p * pow($radius,2); //surface
		$diameter=2 * $radius; //diameter		
		$circumference=	2 * $p * $radius;
		 $path = explode('\\', __CLASS__);
	 return [
            'type' =>array_pop($path),
            'radius' => $radius,
            'diameter' => $diameter,
            'surface' => $surface,
            'circumference' => $circumference
        ];
    }   
	
	public function index(Request $request,int $radius): Response
    {
		return $this->render('base.html.twig', $this->calculate($radius));
	}
	
	public function api(Request $request,int $radius): Response
    {
	$response = new Response(json_encode($this->calculate($radius)));
	$response->headers->set('Content-Type', 'application/json');
	return $response;
    }   	
	public function sumAreas($radius1,$radius2){
		$aobject=$this->calculate($radius1,$radius2); 
		$bobject=$this->calculate($radius1,$radius2); 
		return $aobject['surface']+$bobject['surface'];
	}
	public function sumDiameters($radius1,$radius2){
		$aobject=$this->calculate($radius1,$radius2); 
		$bobject=$this->calculate($radius1,$radius2); 
		return $aobject['diameter']+$bobject['diameter'];
	}
}