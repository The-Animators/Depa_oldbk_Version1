<?php
defined('BASEPATH') OR exit('No direct script access allowed');


require 'vendor/autoload.php';
use Zend\Config\Config;
use Zend\Barcode\Barcode;
class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{

		$this->load->view('welcome_message');
	}
	public function barcode()
	{
		
		$barcodeOptions = ['text' => 'ZEND-FRAMEWORK'];

		// No required options.
		$rendererOptions = [];

		// Draw the barcode, capturing the resource:
		$imageResource = Barcode::draw(
		    'code39',
		    'image',
		    $barcodeOptions,
		    $rendererOptions
		);
		
	}

	public function crbarcode()
	{
		
		// Only the text to draw is required
		$barcodeOptions = ['text' => '132'];

		// No required options
		$rendererOptions = [];

		// Draw the barcode, // send the headers, and emit the image:
		Barcode::factory(
		    'code39',
		    'image',
		    $barcodeOptions,
		    $rendererOptions
		)->render();		
	}

	function set_barcode($code=1235){
	   $file = Barcode::draw('code128', 'image', array('text' => $code), array());
	   $code = time();
	   $store_image = imagepng($file,"../barcode/{$code}.png");
	   echo $code.'.png';
	}


	function config(){
		// Using a single Zend\Config\Config object:
		/*$config = new Config([
		    'barcode'        => 'code39',
		    'barcodeParams'  => ['text' => 'ZEND-FRAMEWORK'],
		    'renderer'       => 'image',
		    'rendererParams' => ['imageType' => 'png'],
		]);

		$renderer = Barcode::factory($config);
		print_r($renderer);*/

		$barcodeOptions = ['text' => 'ZEND-FRAMEWORK'];

		// No required options.
		$rendererOptions = [];

		// Draw the barcode, capturing the resource:
		$renderer = Barcode::factory(
		    'code39',
		    'image',
		    $barcodeOptions,
		    $rendererOptions
		);
		$imageResource = $renderer->draw();
		print_r($imageResource);
	}
}
