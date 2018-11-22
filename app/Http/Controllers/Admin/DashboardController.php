<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Charts;
use Carbon\Carbon;
use App\Repositories\ProductRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\UserRepository;
use App\Repositories\OrderRepository;

class DashboardController extends Controller
{
    public function __construct(ProductRepository $productRepository, CategoryRepository $categoryRepository,
        UserRepository $userRepository, OrderRepository $orderRepository)
    {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
        $this->userRepository = $userRepository;
        $this->orderRepository = $orderRepository;
    }

    public function index()
    {
        $countProduct = $this->productRepository->count();
        $countCategory = $this->categoryRepository->count();
        $countUser = $this->userRepository->count();
        $countOrder = $this->orderRepository->count();

        for ($i = config('custom.eleven'); $i >= config('custom.zero'); $i--) {
            $month[] = Carbon::now()->subMonth($i)->format('m-Y');
            $data[] = $this->orderRepository->getTotalPriceMonth($i);
        }
        $chart = Charts::create('bar', 'highcharts')
                ->title(trans('message.chart.revenue_shop'))
                ->elementLabel(trans('message.chart.around_12mons'))
                ->labels($month)
                ->values($data)
                ->dimensions(config('custom.thousand'), config('custom.five_hundred'))
                ->responsive(true);

        $countAdmin = $this->userRepository->countAdmin();
        $countCustomer = $this->userRepository->countCustomer();
        $pie_chart = Charts::create('pie', 'highcharts')
                ->title(trans('message.chart.number_user'))
                ->labels([config('custom.admin'), config('custom.customer')])
                ->values([$countAdmin, $countCustomer])
                ->dimensions(config('custom.thousand'), config('custom.five_hundred'))
                ->responsive(true);

        return view('admin.dashboard.index', compact('chart', 'pie_chart', 'countUser', 'countOrder', 'countCategory', 'countProduct'));
    }
}
