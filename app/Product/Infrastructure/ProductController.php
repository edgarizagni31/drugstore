<?php 
namespace App\Product\Infraestructure;
use App\Http\Controllers\Controller;
use App\Product\Application\CreateProductHandler;
use Illuminate\Http\Request;

class ProductController extends Controller {
  
  private $createProductHandler;
  
  public function __construct(CreateProductHandler $createProductHandler)
  {
    $this->createProductHandler = $createProductHandler;
  }

  public function create(Request $request) {
    $data = $request->all();

    $this->createProductHandler->handle($data);

    return redirect()->route("");
  }
}