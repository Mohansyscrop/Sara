<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Anarkali Ensembles',
                'slug' => 'anarkali-ensembles',
                'description' => 'Opulent royal flared silhouettes adorned with handcrafted zari, gota patti, and fine heritage embroidery.',
                'image' => 'assets/img/card_pink.jpg',
                'status' => true,
                'sort_order' => 1,
                'meta_title' => 'Anarkali Ensembles | Sara\'s Boutique',
                'meta_description' => 'Shop luxury Silk & Georgette Anarkali suits with heirloom embroidery.',
            ],
            [
                'name' => 'Pure Silk Festive Sets',
                'slug' => 'silk-festive-sets',
                'description' => 'Pure Mulberry & Banarasi Katan silk festive churidar ensembles woven with pure gold zari borders.',
                'image' => 'assets/img/card_teal.jpg',
                'status' => true,
                'sort_order' => 2,
                'meta_title' => 'Pure Silk Festive Sets | Sara\'s Boutique',
                'meta_description' => 'Explore authentic Silk Mark certified festive churidar and kurta sets.',
            ],
            [
                'name' => 'Straight-Cut Suits',
                'slug' => 'straight-cut-suits',
                'description' => 'Regal tailored straight-fit silhouettes featuring intricate needlework and structured elegance.',
                'image' => 'assets/img/card_mustard.jpg',
                'status' => true,
                'sort_order' => 3,
                'meta_title' => 'Straight-Cut Suits | Sara\'s Boutique',
                'meta_description' => 'Discover tailored straight-cut silk suits for royal day wear and festivities.',
            ],
            [
                'name' => 'Velvet Winter Suits',
                'slug' => 'velvet-winter-suits',
                'description' => 'Plush micro-velvet kurtas and churidars with tilla embroidery and rich jewel-toned hues.',
                'image' => 'assets/img/card_purple.jpg',
                'status' => true,
                'sort_order' => 4,
                'meta_title' => 'Velvet Winter Suits | Sara\'s Boutique',
                'meta_description' => 'Shop warm, luxurious velvet suits handcrafted for evening soirées.',
            ],
            [
                'name' => 'Bridal Churidar Sets',
                'slug' => 'bridal-churidar-sets',
                'description' => 'Bespoke bridal trousseau masterpieces featuring heavy zardozi, kundan work, and pure silk fabrics.',
                'image' => 'assets/img/bn1.png',
                'status' => true,
                'sort_order' => 5,
                'meta_title' => 'Bridal Churidar Sets | Sara\'s Boutique',
                'meta_description' => 'Handcrafted bridal churidar sets with authentic handloom craftsmanship.',
            ],
            [
                'name' => 'Handloom Chanderi',
                'slug' => 'handloom-chanderi',
                'description' => 'Feather-light Chanderi silk and cotton weaves with delicate meenakari motifs and sheer drape.',
                'image' => 'assets/img/card_green.jpg',
                'status' => true,
                'sort_order' => 6,
                'meta_title' => 'Handloom Chanderi Sets | Sara\'s Boutique',
                'meta_description' => 'Shop pure Handloom Chanderi suits crafted by master weavers.',
            ],
            [
                'name' => 'Palazzo Sets',
                'slug' => 'palazzo-sets',
                'description' => 'Contemporary flared palazzos paired with richly embroidered silk kurtas and organza dupattas.',
                'image' => 'assets/img/card_teal.jpg',
                'status' => true,
                'sort_order' => 7,
                'meta_title' => 'Palazzo Sets | Sara\'s Boutique',
                'meta_description' => 'Elegant Silk Palazzo Sets for festive occasions and celebrations.',
            ],
            [
                'name' => 'Angrakha Sets',
                'slug' => 'angrakha-sets',
                'description' => 'Classic Mughal cross-over angrakha cuts with handmade tassel ties and delicate gota borders.',
                'image' => 'assets/img/card_pink.jpg',
                'status' => true,
                'sort_order' => 8,
                'meta_title' => 'Angrakha Sets | Sara\'s Boutique',
                'meta_description' => 'Timeless Angrakha silhouette suits with authentic artisan hand-embroidery.',
            ],
        ];

        foreach ($categories as $cat) {
            Category::updateOrCreate(['slug' => $cat['slug']], $cat);
        }
    }
}
