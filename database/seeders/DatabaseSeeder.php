<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Product;
use App\Models\Resource;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            "name"      => "Muhammad Amirul",
            "email"     => "amirul@gmail.com",
            "password"  => Hash::make(1234567),
        ]);

        Resource::create([
            "name"  => "banToni",
            "type"  => "image",
            "group" => "partner",
            "uri"   => "resources/images/partner/logo-1.png"
        ]);

        Resource::create([
            "name"  => "vCorp",
            "type"  => "image",
            "group" => "partner",
            "uri"   => "resources/images/partner/logo-2.png"
        ]);

        Resource::create([
            "name"  => "alitume",
            "type"  => "image",
            "group" => "partner",
            "uri"   => "resources/images/partner/logo-3.png"
        ]);

        Resource::create([
            "name"  => "zukata",
            "type"  => "image",
            "group" => "partner",
            "uri"   => "resources/images/partner/logo-4.png"
        ]);

        Resource::create([
            "name"  => "vicink",
            "type"  => "image",
            "group" => "partner",
            "uri"   => "resources/images/partner/logo-5.png"
        ]);

        Product::create([
            "name"          => "Yellow Bag",
            "price"         => "75",
            "description"   => "A yellow bag is a type of bag that is primarily characterized by its bright and vibrant yellow color. It can come in various sizes and shapes, from small clutch purses to large tote bags. The material of the bag can also vary, from leather and suede to canvas and nylon.",
            "category"      => "Bag, Man, Hiking",
            "image"         => "resources\images\products\product-7"
        ]);

        Product::create([
            "name"          => "Grey Shirt",
            "price"         => "30",
            "description"   => "A grey Shirt is a simple yet versatile piece of clothing that is perfect for casual and comfortable everyday wear. It is typically made of a soft and breathable fabric such as cotton, polyester, or a blend of both.Grey is a neutral and understated color that can easily complement other colors and patterns. It is a great alternative to classic black or white Shirts, as it adds a subtle touch of sophistication and elegance to any outfit.A grey Shirt can come in various styles and fits, from a loose and relaxed fit for a laid-back look to a fitted and structured silhouette for a more polished appearance. It can also have different necklines, such as crew neck, v-neck, or scoop neck, depending on personal preference. A grey Shirt can be easily styled in different ways. It can be worn with jeans and sneakers for a casual look, or dressed up with a blazer and dress shoes for a more formal occasion. It can also be layered under a denim jacket or a cardigan for added warmth and style. Overall, a grey Shirt is a wardrobe staple that can be worn year-round and paired with various accessories and garments. Its simplicity and versatility make it a must-have item in any closet.",
            "category"      => "Shirt, Man, Casual",
            "image"         => "resources\images\products\man-4"
        ]);

        Product::create([
            "name"          => "Green Jacket",
            "price"         => "45",
            "description"   => "A green jacket is a stylish and versatile outerwear piece that can be worn in various settings and occasions. It is typically made of a durable and weather-resistant material such as cotton, polyester, or nylon, and comes in different shades of green, from olive to emerald. Green is a color that symbolizes growth, harmony, and nature. It can add a touch of freshness and vitality to any outfit, and can be paired with different colors, such as neutrals, pastels, or bold hues, depending on personal style and preference. A green jacket can come in various styles and designs, such as bomber jackets, parkas, utility jackets, or denim jackets. It can also have different features, such as pockets, zippers, hoods, or detachable linings, depending on the intended use and functionality.",
            "category"      => "Jacket, Stylish",
            "image"         => "resources\images\products\product-3"
        ]);

        Product::create([
            "name"          => "Grey Shawl",
            "price"         => "20",
            "description"   => "A grey shawl is a stylish and versatile accessory that can add warmth and elegance to any outfit. It is typically made of a soft and lightweight fabric such as cashmere, wool, or silk, and comes in different shades of grey, from light silver to dark charcoal. Grey is a neutral and understated color that can complement various colors and patterns. It can add a touch of sophistication and subtlety to any outfit, and can be worn in different settings, from casual to formal. A grey shawl can come in different sizes and shapes, from a large wrap to a smaller scarf. It can also have different textures, such as smooth, fluffy, or patterned, depending on personal style and preference.",
            "category"      => "Shawl, Stylish, Accesories",
            "image"         => "resources\images\products\product-4"
        ]);

        Product::create([
            "name"          => "Yellow Hat",
            "price"         => "10",
            "description"   => "A yellow hat is a fun and bold accessory that can add a pop of color and personality to any outfit. It is typically made of a lightweight and breathable material such as cotton, straw, or polyester, and comes in various shades of yellow, from bright lemon to muted mustard. Yellow is a color that symbolizes optimism, energy, and creativity. It can be a great complement to neutral or monochrome outfits, and can add a touch of cheerfulness and playfulness to any look.",
            "category"      => "Hat, Stylish, Accesories",
            "image"         => "resources\images\products\product-5"
        ]);

        Product::create([
            "name"          => "Bronze Sweater",
            "price"         => "35",
            "description"   => "A Bronze Sweater is a stylish and versatile outerwear piece that can be worn in various settings and occasions. It is typically made of a durable and weather-resistant material such as cotton, polyester, or nylon, and comes in different shades of green, from olive to emerald. Green is a color that symbolizes growth, harmony, and nature. It can add a touch of freshness and vitality to any outfit, and can be paired with different colors, such as neutrals, pastels, or bold hues, depending on personal style and preference. A Bronze Sweater can come in various styles and designs, such as bomber jackets, parkas, utility jackets, or denim jackets. It can also have different features, such as pockets, zippers, hoods, or detachable linings, depending on the intended use and functionality.",
            "category"      => "Sweater, Stylish",
            "image"         => "resources\images\products\product-6"
        ]);

        Product::create([
            "name"          => "Grey Hoodie",
            "price"         => "60",
            "description"   => "A grey hoodie is a comfortable and versatile garment that is perfect for casual and laid-back occasions. It is typically made of a soft and cozy fabric such as cotton, fleece, or a blend of both, and comes in different shades of grey, from light heather to dark charcoal. Grey is a neutral and understated color that can easily complement other colors and patterns. It is a great alternative to classic black or white hoodies, as it adds a subtle touch of sophistication and elegance to any outfit.",
            "category"      => "Hoodie, Man, Jacket, Stylish",
            "image"         => "resources\images\products\product-8"
        ]);

        Product::create([
            "name"          => "Yellow Shoes",
            "price"         => "25",
            "description"   => "Yellow shoes are a fun and bold accessory that can add a pop of color and personality to any outfit. They come in various shades of yellow, from bright lemon to mustard, and are available in different styles and designs, such as sneakers, sandals, pumps, flats, or boots. Yellow is a color that symbolizes happiness, optimism, and energy. It can add a cheerful and playful vibe to any outfit, and can be a great complement to neutral or monochrome looks.",
            "category"      => "Shoes, Stylish",
            "image"         => "resources\images\products\product-9"
        ]);

        Product::create([
            "name"          => "Yellow Woman Cloth",
            "price"         => "30",
            "description"   => "Yellow women's clothing is a stylish and bold choice that can add a pop of color and personality to any outfit. It is available in different shades of yellow, from bright and vibrant hues to more muted and subdued tones, and comes in various styles and designs, such as dresses, tops, skirts, pants, or jackets. Yellow is a color that represents happiness, optimism, and creativity. It can add a cheerful and playful vibe to any outfit, and can be a great complement to neutral or monochrome looks.",
            "category"      => "Cloth, Woman, Top-Cloth",
            "image"         => "resources\images\products\women-1"
        ]);

        Product::create([
            "name"          => "Bronze Woman Cloth",
            "price"         => "30",
            "description"   => "Bronze women's clothing is a stylish and bold choice that can add a pop of color and personality to any outfit. It is available in different shades of Bronze, from bright and vibrant hues to more muted and subdued tones, and comes in various styles and designs, such as dresses, tops, skirts, pants, or jackets. Bronze is a color that represents happiness, optimism, and creativity. It can add a cheerful and playful vibe to any outfit, and can be a great complement to neutral or monochrome looks.",
            "category"      => "Cloth, Woman, Top-Cloth",
            "image"         => "resources\images\products\women-2"
        ]);

        Product::create([
            "name"          => "Grey Woman Cloth",
            "price"         => "30",
            "description"   => "Grey women's clothing is a stylish and bold choice that can add a pop of color and personality to any outfit. It is available in different shades of Grey, from bright and vibrant hues to more muted and subdued tones, and comes in various styles and designs, such as dresses, tops, skirts, pants, or jackets. Grey is a color that represents happiness, optimism, and creativity. It can add a cheerful and playful vibe to any outfit, and can be a great complement to neutral or monochrome looks.",
            "category"      => "Cloth, Woman, Top-Cloth",
            "image"         => "resources\images\products\women-3"
        ]);

        Product::create([
            "name"          => "White Woman Bag",
            "price"         => "40",
            "description"   => "A White Woman Bag is a type of bag that is primarily characterized by its bright and vibrant yellow color. It can come in various sizes and shapes, from small clutch purses to large tote bags. The material of the bag can also vary, from leather and suede to canvas and nylon.",
            "category"      => "Bag, Woman, Accessories",
            "image"         => "resources\images\products\women-4"
        ]);
    }
}
