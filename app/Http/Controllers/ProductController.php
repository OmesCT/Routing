<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia; //ใช้ของ inertia
use Inertia\Response;


class ProductController extends Controller
{

    private $products = [['id' => 1, 'name' => 'NVMSI-001 INTEL I5-12400F 2.5GHz 6C/12T / B760M / RTX 4070 SUPER 12GB / 32GB DDR4 3200MHz / M.2 1TB / 750W (80+BRONZE)',
            'description' => 'NVMSI-001 INTEL I5-12400F 2.5GHz 6C/12T / B760M / RTX 4070 SUPER 12GB / 32GB DDR4 3200MHz / M.2 1TB / 750W (80+BRONZE)',
            'price' => 37490,
            'imageSRC'=> 'https://ihcupload.s3.ap-southeast-1.amazonaws.com/img/product/products72439_800.jpg'],
        ['id' => 2, 'name' => 'NVMSI-003 INTEL I5-12400F 2.5GHz 6C/12T / B760M / RTX 4070 SUPER 12GB / 32GB DDR5 5600MHz / M.2 1TB / 750W (80+BRONZE) / CS240',
            'description' => 'NVMSI-003 INTEL I5-12400F 2.5GHz 6C/12T / B760M / RTX 4070 SUPER 12GB / 32GB DDR5 5600MHz / M.2 1TB / 750W (80+BRONZE) / CS240',
            'price' => 42990,
            'imageSRC' => 'https://ihcupload.s3.ap-southeast-1.amazonaws.com/img/product/products72445_800.jpg'],
        ['id' => 3, 'name' => 'NVMSI-004 INTEL I5-12400F 2.5GHz 6C/12T / B760 / RTX 4070 SUPER 12GB / 32GB DDR5 5600MHz / M.2 1TB / 750W (80+BRONZE) / CS240',
            'description' => 'NVMSI-004 INTEL I5-12400F 2.5GHz 6C/12T / B760 / RTX 4070 SUPER 12GB / 32GB DDR5 5600MHz / M.2 1TB / 750W (80+BRONZE) / CS240',
            'price' => 45990,
            'imageSRC' => 'https://ihcupload.s3.ap-southeast-1.amazonaws.com/img/product/products72448_800.jpg'],
        ['id' => 4, 'name' => 'NVMSI-005 INTEL I5-13400F 2.5GHz 10C/16T / B760M / RTX 4070 SUPER 12GB / 32GB DDR4 3200MHz / M.2 1TB / 750W (80+BRONZE) / HS',
            'description' => 'NVMSI-005 INTEL I5-13400F 2.5GHz 10C/16T / B760M / RTX 4070 SUPER 12GB / 32GB DDR4 3200MHz / M.2 1TB / 750W (80+BRONZE) / HS',
            'price' => 40490,
            'imageSRC' => 'https://ihcupload.s3.ap-southeast-1.amazonaws.com/img/product/products72451_800.jpg'],
        ['id' => 5, 'name' => 'DECD5-001 INTEL I3-12100 3.3GHz 4C/8T / H610M / ONBOARD / 16GB DDR5 5200MHz / M.2 500GB / 550W (80+SILVER)',
            'description' => 'DECD5-001 INTEL I3-12100 3.3GHz 4C/8T / H610M / ONBOARD / 16GB DDR5 5200MHz / M.2 500GB / 550W (80+SILVER)',
            'price' => 12690,
            'imageSRC' => 'https://ihcupload.s3.ap-southeast-1.amazonaws.com/img/product/products69802_800.jpg'],
        ['id' => 6, 'name' => 'DECD5-002 INTEL I5-12400 2.5GHz 6C/12T / H610M / ONBOARD / 16GB DDR5 5200MHz / M.2 500GB / 550W (80+SILVER)',
            'description' => 'DECD5-002 INTEL I5-12400 2.5GHz 6C/12T / H610M / ONBOARD / 16GB DDR5 5200MHz / M.2 500GB / 550W (80+SILVER)',
            'price' => 13890,
            'imageSRC' => 'https://ihcupload.s3.ap-southeast-1.amazonaws.com/img/product/products69805_800.jpg'],
        ['id' => 7, 'name' => 'DECD5-003 INTEL I5-13500 2.5GHz 14C/20T / B760M / ONBOARD / 16GB DDR5 5200MHz / M.2 500GB / 650W (80+SILVER) / HS',
            'description' => 'DECD5-003 INTEL I5-13500 2.5GHz 14C/20T / B760M / ONBOARD / 16GB DDR5 5200MHz / M.2 500GB / 650W (80+SILVER) / HS',
            'price' => 18890,
            'imageSRC' => 'https://ihcupload.s3.ap-southeast-1.amazonaws.com/img/product/products69808_800.jpg'],
        ['id' => 8, 'name' => 'DECD5-004 INTEL I5-14500 5.0GHz 14C/20T / B760M / ONBOARD / 16GB DDR5 5200MHz / M.2 500GB / 650W (80+SILVER) / HS',
            'description' => 'DECD5-004 INTEL I5-14500 5.0GHz 14C/20T / B760M / ONBOARD / 16GB DDR5 5200MHz / M.2 500GB / 650W (80+SILVER) / HS',
            'price' => 19690,
            'imageSRC' => 'https://ihcupload.s3.ap-southeast-1.amazonaws.com/img/product/products69811_800.jpg'],
        ['id' => 9, 'name' => 'NOTEBOOK (โน้ตบุ๊ค) MSI STEALTH 16 MERCEDES-AMG MOTORSPORT A1V - AMG A1VGG-261TH (SELENITE GRAY)',
            'description' => 'NOTEBOOK (โน้ตบุ๊ค) MSI STEALTH 16 MERCEDES-AMG MOTORSPORT A1V - AMG A1VGG-261TH (SELENITE GRAY)',
            'price' => 84990,
            'imageSRC' => 'https://ihcupload.s3.ap-southeast-1.amazonaws.com/img/product/products73246_800.jpg'],
        ['id' => 10, 'name' => 'NOTEBOOK (โน้ตบุ๊ค) MSI PRESTIGE 14 AI STUDIO C1VEG-052TH (STELLAR GRAY)',
            'description' => 'NOTEBOOK (โน้ตบุ๊ค) MSI PRESTIGE 14 AI STUDIO C1VEG-052TH (STELLAR GRAY)',
            'price' => 47990,
            'imageSRC' => 'https://ihcupload.s3.ap-southeast-1.amazonaws.com/img/product/products73281_800.jpg'],
        ];


    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        return Inertia::render('Products/Index', ['products' => $this->products]);
        //ส่งข้อมูลรายการสินค้า $this->products ไปในรูปแบบ key-value pair
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $product = collect($this->products)->firstWhere('id', $id);

        if (!$product) {
            abort(404, 'Product not found');
        }
        return Inertia::render('Products/Show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
