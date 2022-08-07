<?php
// src/Controller/Triangle.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class Triangle extends AbstractController
{
    public function calculate (int $a,int $b,int $c){		 
		$p=3.14;
		$surface=0.5*$a*$b*cos($c); //surface
		$circumference=	$a + $b + $c;
		 $path = explode('\\', __CLASS__);
	 return [
		'type' =>array_pop($path),
		'a' => $a,
		'b' => $b,
		'c' => $c,
		'radius' => '',
		'diameter' => '',
		'surface' => $surface,
		'circumference' => $circumference
		];
    }
	
	public function index(Request $request,int $a,int $b,int $c): Response
    {
		return $this->render('base.html.twig', $this->calculate($a,$b,$c));
	}
	
	
	public function api(Request $request,int $a,int $b,int $c): Response
    {	
	$response = new Response(json_encode($this->calculate($a,$b,$c)));
	$response->headers->set('Content-Type', 'application/json');
	return $response;	
    }  
	
	public function sumAreas($a1,$a2,$b1,$b2,$c1,$c2){
		$aobject=$this->calculate($a1,$b1,$c1); 
		$bobject=$this->calculate($a2,$b2,$c2); 
		return $aobject['surface']+$bobject['surface'];
	}
	public function sumDiameters($a1,$a2,$b1,$b2,$c1,$c2){
		$aobject=$this->calculate($a1,$b1,$c1); 
		$bobject=$this->calculate($a2,$b2,$c2); 
		return $aobject['diameter']+$bobject['diameter'];
	}
}