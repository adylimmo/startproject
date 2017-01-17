<?php

use Faker\Factory as Faker;
use App\Models\Assigment;
use App\Repositories\AssigmentRepository;

trait MakeAssigmentTrait
{
    /**
     * Create fake instance of Assigment and save it in database
     *
     * @param array $assigmentFields
     * @return Assigment
     */
    public function makeAssigment($assigmentFields = [])
    {
        /** @var AssigmentRepository $assigmentRepo */
        $assigmentRepo = App::make(AssigmentRepository::class);
        $theme = $this->fakeAssigmentData($assigmentFields);
        return $assigmentRepo->create($theme);
    }

    /**
     * Get fake instance of Assigment
     *
     * @param array $assigmentFields
     * @return Assigment
     */
    public function fakeAssigment($assigmentFields = [])
    {
        return new Assigment($this->fakeAssigmentData($assigmentFields));
    }

    /**
     * Get fake data of Assigment
     *
     * @param array $postFields
     * @return array
     */
    public function fakeAssigmentData($assigmentFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'assigment_date' => $fake->word,
            'task_id' => $fake->randomDigitNotNull,
            'sales_id' => $fake->randomDigitNotNull,
            'customer_id' => $fake->randomDigitNotNull,
            'status' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $assigmentFields);
    }
}
