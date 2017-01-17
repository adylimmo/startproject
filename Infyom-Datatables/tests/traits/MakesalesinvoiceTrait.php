<?php

use Faker\Factory as Faker;
use App\Models\salesinvoice;
use App\Repositories\salesinvoiceRepository;

trait MakesalesinvoiceTrait
{
    /**
     * Create fake instance of salesinvoice and save it in database
     *
     * @param array $salesinvoiceFields
     * @return salesinvoice
     */
    public function makesalesinvoice($salesinvoiceFields = [])
    {
        /** @var salesinvoiceRepository $salesinvoiceRepo */
        $salesinvoiceRepo = App::make(salesinvoiceRepository::class);
        $theme = $this->fakesalesinvoiceData($salesinvoiceFields);
        return $salesinvoiceRepo->create($theme);
    }

    /**
     * Get fake instance of salesinvoice
     *
     * @param array $salesinvoiceFields
     * @return salesinvoice
     */
    public function fakesalesinvoice($salesinvoiceFields = [])
    {
        return new salesinvoice($this->fakesalesinvoiceData($salesinvoiceFields));
    }

    /**
     * Get fake data of salesinvoice
     *
     * @param array $postFields
     * @return array
     */
    public function fakesalesinvoiceData($salesinvoiceFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'invoiceNo' => $fake->word,
            'invoiceDate' => $fake->word,
            'soID' => $fake->randomDigitNotNull,
            'status' => $fake->randomDigitNotNull,
            'paymentType' => $fake->randomDigitNotNull,
            'expiredPayment' => $fake->word,
            'ppn' => $fake->randomDigitNotNull,
            'total' => $fake->word,
            'discount' => $fake->word,
            'grandtotal' => $fake->word,
            'customerID' => $fake->randomDigitNotNull,
            'customerName' => $fake->word,
            'customerAddress' => $fake->text,
            'staffID' => $fake->randomDigitNotNull,
            'createdDate' => $fake->word,
            'createdUserID' => $fake->randomDigitNotNull,
            'modifiedDate' => $fake->word,
            'modifiedUserID' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $salesinvoiceFields);
    }
}
