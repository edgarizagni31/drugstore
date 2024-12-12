<?php 
namespace App\Product\Infrastructure;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Supplier;
use App\Product\Application\CreateProductHandler;
use App\Product\Application\DeleteProductHandler;
use App\Product\Application\FindProductHandler;
use App\Product\Application\ListProductsHandler;
use App\Product\Application\UpdateProductHandler;
use Illuminate\Http\Request;

class ProductController extends Controller {
  private $listProductsHandler;
  private $findProductHandler;
  private $createProductHandler;
  private $updateProductHandler;
  private $deleteProductHandler;
  
  public function __construct(ListProductsHandler $listProductsHandler, CreateProductHandler $createProductHandler, FindProductHandler $findProductHandler, UpdateProductHandler $updateProductHandler, DeleteProductHandler $deleteProductHandler)
  {
    $this->listProductsHandler = $listProductsHandler;
    $this->createProductHandler = $createProductHandler;
    $this->findProductHandler = $findProductHandler;
    $this->updateProductHandler = $updateProductHandler;
    $this->deleteProductHandler = $deleteProductHandler;
  }

  public function index() 
  {
    $products = $this->listProductsHandler->handle();
    return view("Products::index", compact("products"));
  }

  public function show(Request $request) {
    $product = $this->findProductHandler->handle($request->route("product"));

    return view("Products::show", compact("product"));
  }

  public function create() 
  {
    $categories = Category::all();
    $suppliers = Supplier::all();

    return view("Products::create", compact("categories","suppliers"));
  }

  public function store(Request $request) 
  {
    $data = $request->all();

    $this->createProductHandler->handle($data);

    return redirect()->route("products.index")->with("success", "Producto creado con exito.");
  }

  public function edit(Request $request) 
  {
    $product = $this->findProductHandler->handle($request->route("product"));
    $categories = Category::all();
    $suppliers = Supplier::all();

    return view("Products::edit", compact("product", "categories", "suppliers"));
  }

  public function update(Request $request) 
  {
    $product = $this->findProductHandler->handle($request->route("product"));
    $oldQuantity = $product->quantity;
    $data = $request->all();  
  
    $this->updateProductHandler->handle($request->route("product"), $data, $oldQuantity);

    return redirect()->route("products.index")->with("success", "Producto actualizado con exito");
  }

  public function destroy(Request $request)
  {
    $this->deleteProductHandler->handle($request->route("product"));

    return redirect()->route("products.index")->with("success", "Producto eliminado exitosamente.");
  }
}