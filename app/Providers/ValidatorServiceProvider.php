<?php

namespace App\Providers;

use App\Models\Base\BaseModel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

/**
 * Class ValidatorServiceProvider
 * @package App\Providers
 */
class ValidatorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $maxStringLength = 250;
        $minIntegerLength = 0;
        $maxIntegerLength = 2000000000;
        $maxTextLength = 5000;

        // Max String
        Validator::extend('string_with_max', function ($attribute, $value, $parameters) use ($maxStringLength) {
            $data = [];

            if (str_contains($attribute, '.')) {
                $data = $this->dataArray(explode('.', $attribute), $value);
            } else {
                $data[$attribute] = $value;
            }

            $rules = [$attribute => "string|max:" . $maxStringLength];

            return $this->validator($data, $rules);

        }, trans('validation.custom.max.string', ['max' => $maxStringLength]));

        // Max Text
        Validator::extend('text_with_max', function ($attribute, $value, $parameters) use ($maxTextLength) {
            $data = [];

            if (str_contains($attribute, '.')) {
                $data = $this->dataArray(explode('.', $attribute), $value);
            } else {
                $data[$attribute] = $value;
            }

            $rules = [$attribute => "string|max:" . $maxTextLength];

            return $this->validator($data, $rules);

        }, trans('validation.custom.max.string', ['max' => $maxStringLength]));

        // Max Integer
        Validator::extend('integer_with_max', function ($attribute, $value, $parameters) use ($minIntegerLength, $maxIntegerLength) {
            $data = [];

            if (str_contains($attribute, '.')) {
                $data = $this->dataArray(explode('.', $attribute), $value);
            } else {
                $data[$attribute] = $value;
            }

            $rules = [$attribute => "integer|between:$minIntegerLength,$maxIntegerLength"];

            return $this->validator($data, $rules);

        }, trans('validation.custom.between.numeric', ['min' => $minIntegerLength, 'max' => $maxIntegerLength]));

        // Show status validator
        Validator::extend('show_status_validator', function ($attribute, $value, $parameters) {
            $data = [];

            if (str_contains($attribute, '.')) {
                $data = $this->dataArray(explode('.', $attribute), $value);
            } else {
                $data[$attribute] = $value;
            }

            $rules = [$attribute => "in:" . implode(',', BaseModel::SHOW_STATUSES_FOR_SELECT)];

            return $this->validator($data, $rules);

        }, trans('validation.invalid'));

        // Datetime validator
        Validator::extend('datetime', function ($attribute, $value, $parameters) {
            $data = [];

            if (str_contains($attribute, '.')) {
                $data = $this->dataArray(explode('.', $attribute), $value);
            } else {
                $data[$attribute] = $value;
            }

            $rules = [$attribute => "date_format:".getDateTimeFormat()];

            return $this->validator($data, $rules);

        }, trans('validation.invalid'));
    }

    /**
     * @param $data
     * @param $rules
     * @return bool
     */
    private function validator($data, $rules): bool
    {
        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            return false;
        }

        return true;
    }

    /**
     * @param $array
     * @param $value
     * @return array
     */
    private function dataArray($array, $value): array
    {
        $resultArray = $value;
        for ($i = count($array) - 1; $i >= 0; $i--) {
            $resultArray = array($array[$i] => $resultArray);
        }

        return $resultArray;
    }
}


