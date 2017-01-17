<?php

use Faker\Factory as Faker;
use App\Models\products;
use App\Repositories\productsRepository;

trait MakeproductsTrait
{
    /**
     * Create fake instance of products and save it in database
     *
     * @param array $productsFields
     * @return products
     */
    public function makeproducts($productsFields = [])
    {
        /** @var productsRepository $productsRepo */
        $productsRepo = App::make(productsRepository::class);
        $theme = $this->fakeproductsData($productsFields);
        return $productsRepo->create($theme);
    }

    /**
     * Get fake instance of products
     *
     * @param array $productsFields
     * @return products
     */
    public function fakeproducts($productsFields = [])
    {
        return new products($this->fakeproductsData($productsFields));
    }

    /**
     * Get fake data of products
     *
     * @param array $postFields
     * @return array
     */
    public function fakeproductsData($productsFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'productCode' => $fake->word,
            'productName' => $fake->word,
            'unit' => $fake->randomDigitNotNull,
            'note' => $fake->text,
            'stock' => $fake->randomDigitNotNull,
            'image' => $fake->text,
            'status' => $fake->randomDigitNotNull,
            'createdDate' => $fake->word,
            'createdUserID' => $fake->randomDigitNotNull,
            'modifiedDate' => $fake->word,
            'modifiedUserID' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $productsFields);
    }
}
