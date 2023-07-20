<?php

use App\Model\Product;
use App\Model\Rating;
use App\Model\Resource;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // user
            User::create([
                "name"      => "Muhammad Amirul",
                "email"     => "amirul@gmail.com",
                "password"  => Hash::make(1111111),
            ]);
        // end user

        // Resources
            Resource::create([
                "name"  => "insta-1",
                "type"  => "image",
                "group" => "instagram",
                "uri"   => "Assets/images/instagram/insta-1.jpg"
            ]);
            Resource::create([
                "name"  => "insta-2",
                "type"  => "image",
                "group" => "instagram",
                "uri"   => "Assets/images/instagram/insta-2.jpg"
            ]);
            Resource::create([
                "name"  => "insta-3",
                "type"  => "image",
                "group" => "instagram",
                "uri"   => "Assets/images/instagram/insta-3.jpg"
            ]);
            Resource::create([
                "name"  => "insta-4",
                "type"  => "image",
                "group" => "instagram",
                "uri"   => "Assets/images/instagram/insta-4.jpg"
            ]);
            Resource::create([
                "name"  => "insta-5",
                "type"  => "image",
                "group" => "instagram",
                "uri"   => "Assets/images/instagram/insta-5.jpg"
            ]);
            Resource::create([
                "name"  => "insta-6",
                "type"  => "image",
                "group" => "instagram",
                "uri"   => "Assets/images/instagram/insta-6.jpg"
            ]);
        // 

        // product
            Product::create([
                "name"          => "Yellow Bag",
                "price"         => "150000",
                "description"   => "A yellow bag is a type of bag that is primarily characterized by its bright and vibrant yellow color. It can come in various sizes and shapes, from small clutch purses to large tote bags. The material of the bag can also vary, from leather and suede to canvas and nylon.",
                "category"      => "Bag, Man, Hiking",
                "image"         => "Assets/images/products/product-7.jpg"
            ]);

            Product::create([
                "name"          => "Grey Shirt",
                "price"         => "30000",
                "description"   => "A grey Shirt is a simple yet versatile piece of clothing that is perfect for casual and comfortable everyday wear. It is typically made of a soft and breathable fabric such as cotton, polyester, or a blend of both.Grey is a neutral and understated color that can easily complement other colors and patterns. It is a great alternative to classic black or white Shirts, as it adds a subtle touch of sophistication and elegance to any outfit.A grey Shirt can come in various styles and fits, from a loose and relaxed fit for a laid-back look to a fitted and structured silhouette for a more polished appearance. It can also have different necklines, such as crew neck, v-neck, or scoop neck, depending on personal preference. A grey Shirt can be easily styled in different ways. It can be worn with jeans and sneakers for a casual look, or dressed up with a blazer and dress shoes for a more formal occasion. It can also be layered under a denim jacket or a cardigan for added warmth and style. Overall, a grey Shirt is a wardrobe staple that can be worn year-round and paired with various accessories and garments. Its simplicity and versatility make it a must-have item in any closet.",
                "category"      => "Shirt, Man, Casual",
                "image"         => "Assets/images/products/man-4.jpg"
            ]);

            Product::create([
                "name"          => "Green Jacket",
                "price"         => "90000",
                "description"   => "A green jacket is a stylish and versatile outerwear piece that can be worn in various settings and occasions. It is typically made of a durable and weather-resistant material such as cotton, polyester, or nylon, and comes in different shades of green, from olive to emerald. Green is a color that symbolizes growth, harmony, and nature. It can add a touch of freshness and vitality to any outfit, and can be paired with different colors, such as neutrals, pastels, or bold hues, depending on personal style and preference. A green jacket can come in various styles and designs, such as bomber jackets, parkas, utility jackets, or denim jackets. It can also have different features, such as pockets, zippers, hoods, or detachable linings, depending on the intended use and functionality.",
                "category"      => "Jacket, Stylish",
                "image"         => "Assets/images/products/product-3.jpg"
            ]);

            Product::create([
                "name"          => "Grey Shawl",
                "price"         => "40000",
                "description"   => "A grey shawl is a stylish and versatile accessory that can add warmth and elegance to any outfit. It is typically made of a soft and lightweight fabric such as cashmere, wool, or silk, and comes in different shades of grey, from light silver to dark charcoal. Grey is a neutral and understated color that can complement various colors and patterns. It can add a touch of sophistication and subtlety to any outfit, and can be worn in different settings, from casual to formal. A grey shawl can come in different sizes and shapes, from a large wrap to a smaller scarf. It can also have different textures, such as smooth, fluffy, or patterned, depending on personal style and preference.",
                "category"      => "Shawl, Stylish, Accesories",
                "image"         => "Assets/images/products/product-4.jpg"
            ]);

            Product::create([
                "name"          => "Yellow Hat",
                "price"         => "20000",
                "description"   => "A yellow hat is a fun and bold accessory that can add a pop of color and personality to any outfit. It is typically made of a lightweight and breathable material such as cotton, straw, or polyester, and comes in various shades of yellow, from bright lemon to muted mustard. Yellow is a color that symbolizes optimism, energy, and creativity. It can be a great complement to neutral or monochrome outfits, and can add a touch of cheerfulness and playfulness to any look.",
                "category"      => "Hat, Stylish, Accesories",
                "image"         => "Assets/images/products/product-5.jpg"
            ]);

            Product::create([
                "name"          => "Bronze Sweater",
                "price"         => "60000",
                "description"   => "A Bronze Sweater is a stylish and versatile outerwear piece that can be worn in various settings and occasions. It is typically made of a durable and weather-resistant material such as cotton, polyester, or nylon, and comes in different shades of green, from olive to emerald. Green is a color that symbolizes growth, harmony, and nature. It can add a touch of freshness and vitality to any outfit, and can be paired with different colors, such as neutrals, pastels, or bold hues, depending on personal style and preference. A Bronze Sweater can come in various styles and designs, such as bomber jackets, parkas, utility jackets, or denim jackets. It can also have different features, such as pockets, zippers, hoods, or detachable linings, depending on the intended use and functionality.",
                "category"      => "Sweater, Stylish",
                "image"         => "Assets/images/products/product-6.jpg"
            ]);

            Product::create([
                "name"          => "Grey Hoodie",
                "price"         => "120000",
                "description"   => "A grey hoodie is a comfortable and versatile garment that is perfect for casual and laid-back occasions. It is typically made of a soft and cozy fabric such as cotton, fleece, or a blend of both, and comes in different shades of grey, from light heather to dark charcoal. Grey is a neutral and understated color that can easily complement other colors and patterns. It is a great alternative to classic black or white hoodies, as it adds a subtle touch of sophistication and elegance to any outfit.",
                "category"      => "Hoodie, Man, Jacket, Stylish",
                "image"         => "Assets/images/products/product-8.jpg"
            ]);

            Product::create([
                "name"          => "Yellow Shoes",
                "price"         => "50000",
                "description"   => "Yellow shoes are a fun and bold accessory that can add a pop of color and personality to any outfit. They come in various shades of yellow, from bright lemon to mustard, and are available in different styles and designs, such as sneakers, sandals, pumps, flats, or boots. Yellow is a color that symbolizes happiness, optimism, and energy. It can add a cheerful and playful vibe to any outfit, and can be a great complement to neutral or monochrome looks.",
                "category"      => "Shoes, Stylish",
                "image"         => "Assets/images/products/product-9.jpg"
            ]);

            Product::create([
                "name"          => "Yellow Woman Cloth",
                "price"         => "30000",
                "description"   => "Yellow women's clothing is a stylish and bold choice that can add a pop of color and personality to any outfit. It is available in different shades of yellow, from bright and vibrant hues to more muted and subdued tones, and comes in various styles and designs, such as dresses, tops, skirts, pants, or jackets. Yellow is a color that represents happiness, optimism, and creativity. It can add a cheerful and playful vibe to any outfit, and can be a great complement to neutral or monochrome looks.",
                "category"      => "Cloth, Woman, Top-Cloth",
                "image"         => "Assets/images/products/women-1.jpg"
            ]);

            Product::create([
                "name"          => "Bronze Woman Cloth",
                "price"         => "30000",
                "description"   => "Bronze women's clothing is a stylish and bold choice that can add a pop of color and personality to any outfit. It is available in different shades of Bronze, from bright and vibrant hues to more muted and subdued tones, and comes in various styles and designs, such as dresses, tops, skirts, pants, or jackets. Bronze is a color that represents happiness, optimism, and creativity. It can add a cheerful and playful vibe to any outfit, and can be a great complement to neutral or monochrome looks.",
                "category"      => "Cloth, Woman, Top-Cloth",
                "image"         => "Assets/images/products/women-2.jpg"
            ]);

            Product::create([
                "name"          => "Grey Woman Cloth",
                "price"         => "30000",
                "description"   => "Grey women's clothing is a stylish and bold choice that can add a pop of color and personality to any outfit. It is available in different shades of Grey, from bright and vibrant hues to more muted and subdued tones, and comes in various styles and designs, such as dresses, tops, skirts, pants, or jackets. Grey is a color that represents happiness, optimism, and creativity. It can add a cheerful and playful vibe to any outfit, and can be a great complement to neutral or monochrome looks.",
                "category"      => "Cloth, Woman, Top-Cloth",
                "image"         => "Assets/images/products/women-3.jpg"
            ]);

            Product::create([
                "name"          => "White Woman Bag",
                "price"         => "90000",
                "description"   => "A White Woman Bag is a type of bag that is primarily characterized by its bright and vibrant yellow color. It can come in various sizes and shapes, from small clutch purses to large tote bags. The material of the bag can also vary, from leather and suede to canvas and nylon.",
                "category"      => "Bag, Woman, Accessories",
                "image"         => "Assets/images/products/women-4.jpg"
            ]);

            Product::create([
                "name"          => "Blue Sweater",
                "price"         => "60000",
                "description"   => "A Blue Sweater is a stylish and versatile outerwear piece that can be worn in various settings and occasions. It is typically made of a durable and weather-resistant material such as cotton, polyester, or nylon, and comes in different shades of green, from olive to emerald. Green is a color that symbolizes growth, harmony, and nature. It can add a touch of freshness and vitality to any outfit, and can be paired with different colors, such as neutrals, pastels, or bold hues, depending on personal style and preference. A Blue Sweater can come in various styles and designs, such as bomber jackets, parkas, utility jackets, or denim jackets. It can also have different features, such as pockets, zippers, hoods, or detachable linings, depending on the intended use and functionality.",
                "category"      => "Sweater, Stylish",
                "image"         => "Assets/images/products/hero-1.jpg",
                "discount"      => 50
            ]);

            Product::create([
                "name"          => "Bronze Skirt",
                "price"         => "30000",
                "description"   => "Bronze women's clothing is a stylish and bold choice that can add a pop of color and personality to any outfit. It is available in different shades of Bronze, from bright and vibrant hues to more muted and subdued tones, and comes in various styles and designs, such as dresses, tops, skirts, pants, or jackets. Bronze is a color that represents happiness, optimism, and creativity. It can add a cheerful and playful vibe to any outfit, and can be a great complement to neutral or monochrome looks.",
                "category"      => "Skirt, Woman, Stylish",
                "image"         => "Assets/images/products/hero-3.jpg",
                "discount"      => 50
            ]);

            Product::create([
                "name"          => "Kid Cloth",
                "price"         => "40000",
                "description"   => "A grey Shirt is a simple yet versatile piece of clothing that is perfect for casual and comfortable everyday wear. It is typically made of a soft and breathable fabric such as cotton, polyester, or a blend of both.Grey is a neutral and understated color that can easily complement other colors and patterns. It is a great alternative to classic black or white Shirts, as it adds a subtle touch of sophistication and elegance to any outfit.A grey Shirt can come in various styles and fits, from a loose and relaxed fit for a laid-back look to a fitted and structured silhouette for a more polished appearance. It can also have different necklines, such as crew neck, v-neck, or scoop neck, depending on personal preference. A grey Shirt can be easily styled in different ways. It can be worn with jeans and sneakers for a casual look, or dressed up with a blazer and dress shoes for a more formal occasion. It can also be layered under a denim jacket or a cardigan for added warmth and style. Overall, a grey Shirt is a wardrobe staple that can be worn year-round and paired with various accessories and garments. Its simplicity and versatility make it a must-have item in any closet.",
                "category"      => "Cloth, Man, Kid, Stylish",
                "image"         => "Assets/images/products/hero-2.jpg",
                "discount"      => 50
            ]);
        // end product

        // rating
            Rating::create([
                "user_id" => 1,
                "product_id" => 1,
                "rating" => 1,
                "komentar" => "mntp"
            ]);
        // end rating
    }
}
