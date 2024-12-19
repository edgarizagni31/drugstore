<?php
namespace App\Src\Sales\Infrastructure;

use App\Http\Controllers\Controller;

use App\Src\Products\Infrastructure\EloquentProductRepository;
use App\Src\Sales\Application\CreateSaleHandler;
use App\Src\Sales\Application\ListSaleHandler;
use App\Src\Sales\Application\UpdateSaleHandler;
use App\Src\Sales\Domain\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    private $listSalesHandler;
    private $createSaleHandler;
    private $updateSaleHandler;
    private $productRepository;
    

    public function __construct(ListSaleHandler $listSalesHandler, EloquentProductRepository $productRepository, CreateSaleHandler $createSaleHandler, UpdateSaleHandler $updateSaleHandler)
    {
        $this->listSalesHandler = $listSalesHandler;
        $this->productRepository = $productRepository;
        $this->createSaleHandler = $createSaleHandler;
        $this->updateSaleHandler = $updateSaleHandler;
    }

    public function index()
    {
        $sales = $this->listSalesHandler->handle();
        return view('Sales::index', compact('sales'));
    }

    public function create()
    {
        $products = $this->productRepository->list();

        return view('Sales::create', ['products' => $products]);
    }

    public function store(Request $request)
    {

        $this->createSaleHandler->handle($request->all());

        return redirect()->route('sales.create')
            ->with('success', 'Venta registrada con éxito.');
    }

    public function updateStatus(Request $request, $status)
    {
        $this->updateSaleHandler->handle($request->route('sale'), $status);

        return redirect()->route('sales.index')
            ->with('success', 'Estado de venta actualizado.');
    }
}
