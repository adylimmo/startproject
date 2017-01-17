<?php

use Faker\Factory as Faker;
use App\Models\Confirm;
use App\Repositories\ConfirmRepository;

trait MakeConfirmTrait
{
    /**
     * Create fake instance of Confirm and save it in database
     *
     * @param array $confirmFields
     * @return Confirm
     */
    public function makeConfirm($confirmFields = [])
    {
        /** @var ConfirmRepository $confirmRepo */
        $confirmRepo = App::make(ConfirmRepository::class);
        $theme = $this->fakeConfirmData($confirmFields);
        return $confirmRepo->create($theme);
    }

    /**
     * Get fake instance of Confirm
     *
     * @param array $confirmFields
     * @return Confirm
     */
    public function fakeConfirm($confirmFields = [])
    {
        return new Confirm($this->fakeConfirmData($confirmFields));
    }

    /**
     * Get fake data of Confirm
     *
     * @param array $postFields
     * @return array
     */
    public function fakeConfirmData($confirmFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'customer_id' => $fake->randomDigitNotNull,
            'assignment_id' => $fake->randomDigitNotNull,
            'confirmation' => $fake->text,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $confirmFields);
    }
}
