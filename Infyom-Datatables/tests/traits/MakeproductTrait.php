<?php

use Faker\Factory as Faker;
use App\Models\product;
use App\Repositories\productRepository;

trait MakeproductTrait
{
    /**
     * Create fake instance of product and save it in database
     *
     * @param array $productFields
     * @return product
     */
    public function makeproduct($productFields = [])
    {
        /** @var productRepository $productRepo */
        $productRepo = App::make(productRepository::class);
        $theme = $this->fakeproductData($productFields);
        return $productRepo->create($theme);
    }

    /**
     * Get fake instance of product
     *
     * @param array $productFields
     * @return product
     */
    public function fakeproduct($productFields = [])
    {
        return new product($this->fakeproductData($productFields));
    }

    /**
     * Get fake data of product
     *
     * @param array $postFields
     * @return array
     */
    public function fakeproductData($productFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'title' => $fake->word,
            'body' => $fake->text,
            'email' => $fake->word,
            'writer_id' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $productFields);
    }
}
