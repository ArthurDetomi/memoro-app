<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $reviews = [
            [
                'name' => 'harmonização',
                'is_default' => true,
                'product_type' => null
            ],
            [
                'name' => 'avaliação geral',
                'is_default' => true,
                'product_type' => null
            ],
            [
                'name' => 'finalização',
                'is_default' => true,
                'product_type' => null
            ],
            [
                'name' => 'aroma',
                'is_default' => true,
                'product_type' => null
            ],
            [
                'name' => 'sabor',
                'is_default' => true,
                'product_type' => null
            ],
            [
                'name' => 'visual',
                'is_default' => true,
                'product_type' => null
            ],

            ['name' => 'formato', 'is_default' => true, 'product_type' => 'Queijo'],
            ['name' => 'acidez', 'is_default' => true, 'product_type' => 'Vinho'],
            ['name' => 'acidez', 'is_default' => true, 'product_type' => 'Café'],
            ['name' => 'construção', 'is_default' => true, 'product_type' => 'Charuto'],

            ['name' => 'cor', 'is_default' => true, 'product_type' => 'Queijo'],
            ['name' => 'doçura', 'is_default' => true, 'product_type' => 'Vinho'],
            ['name' => 'corpo', 'is_default' => true, 'product_type' => 'Café'],
            ['name' => 'firmeza', 'is_default' => true, 'product_type' => 'Charuto'],

            ['name' => 'textura', 'is_default' => true, 'product_type' => 'Queijo'],
            ['name' => 'aroma', 'is_default' => true, 'product_type' => 'Vinho'],
            ['name' => 'fragrância', 'is_default' => true, 'product_type' => 'Café'],
            ['name' => 'queima', 'is_default' => true, 'product_type' => 'Charuto'],

            ['name' => 'acidez', 'is_default' => true, 'product_type' => 'Vinho'],
            ['name' => 'sabor', 'is_default' => true, 'product_type' => 'Café'],

            ['name' => 'cinza', 'is_default' => true, 'product_type' => 'Charuto'],

            ['name' => 'tempo de fumada', 'is_default' => true, 'product_type' => 'Charuto'],
        ];

        $productTypeMap = DB::table('products_types')->pluck('id', 'name');

        $insertData = [];

        foreach ($reviews as $review) {
            $insertData[] = [
                'name' => $review['name'],
                'is_default' => $review['is_default'],
                'product_type_id' => $productTypeMap[$review['product_type']] ?? null
            ];
        }

        DB::table('reviews')->insert($insertData);
    }
}
