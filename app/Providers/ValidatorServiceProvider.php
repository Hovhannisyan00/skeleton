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
        $this->globalValidators();

        $this->existsValidators();
    }

    /**
     * Function to set global validators
     *
     * @return void
     */
    private function globalValidators(): void
    {
        $maxStringLength = 250;

        $minIntegerLength = 0;
        $maxIntegerLength = 2000000000;

        $maxTextLength = 5000;

        $minDoubleLength = 0;
        $maxDoubleLength = 999999.99;

        $minPhoneNumberLength = 8;
        $maxPhoneNumberLength = 12;

        // Max String
        Validator::extend('string_with_max', function ($attribute, $value) use ($maxStringLength) {
            $rules = [$attribute => "string|max:" . $maxStringLength];

            return $this->validator($this->getAttributeValue($attribute, $value), $rules);
        }, trans('validation.max.string', ['max' => $maxStringLength]));

        // Max Text
        Validator::extend('text_with_max', function ($attribute, $value) use ($maxTextLength) {
            $rules = [$attribute => "string|max:" . $maxTextLength];

            return $this->validator($this->getAttributeValue($attribute, $value), $rules);
        }, trans('validation.max.string', ['max' => $maxTextLength]));

        // Max Integer
        Validator::extend(
            'integer_with_max',
            function ($attribute, $value) use ($minIntegerLength, $maxIntegerLength) {
                $rules = [$attribute => "integer|between:$minIntegerLength,$maxIntegerLength"];

                return $this->validator($this->getAttributeValue($attribute, $value), $rules);
            },
            trans('validation.between.numeric', ['min' => $minIntegerLength, 'max' => $maxIntegerLength])
        );

        // Max Double
        Validator::extend(
            'double_with_max',
            function ($attribute, $value) use ($minDoubleLength, $maxDoubleLength) {
                $rules = [$attribute => "numeric|between:$minDoubleLength,$maxDoubleLength"];

                return $this->validator($this->getAttributeValue($attribute, $value), $rules);
            },
            trans('validation.between.numeric', ['min' => $minDoubleLength, 'max' => $maxDoubleLength])
        );

        // Phone number
        Validator::extend(
            'phone_number_validator',
            function ($attribute, $value) use ($minPhoneNumberLength, $maxPhoneNumberLength) {
                $rules = [$attribute => "between:$minPhoneNumberLength,$maxPhoneNumberLength|regex:/^([0-9\s\-\+\(\)]*)$/"];

                return $this->validator($this->getAttributeValue($attribute, $value), $rules);
            },
            trans('validation.invalid', ['min' => $minPhoneNumberLength, 'max' => $maxPhoneNumberLength])
        );

        // Show status
        Validator::extend('show_status_validator', function ($attribute, $value) {
            $rules = [$attribute => "in:" . implode(',', BaseModel::SHOW_STATUSES_FOR_SELECT)];

            return $this->validator($this->getAttributeValue($attribute, $value), $rules);
        }, trans('validation.invalid'));

        // Datetime
        Validator::extend('datetime', function ($attribute, $value) {
            $rules = [$attribute => "date_format:" . getDateTimeFormat()];

            return $this->validator($this->getAttributeValue($attribute, $value), $rules);
        }, trans('validation.invalid'));

        // Date
        Validator::extend('date_validator', function ($attribute, $value) {
            $rules = [$attribute => "date_format:" . getDateFormat()];

            return $this->validator($this->getAttributeValue($attribute, $value), $rules);
        }, trans('validation.invalid'));

        // After or equal today
        Validator::extend('after_or_equal_today', function ($attribute, $value) {
            $rules = [$attribute => "date_validator|after_or_equal:" . today()];

            return $this->validator($this->getAttributeValue($attribute, $value), $rules);
        }, trans('validation.custom.after_or_equal', ['date' => now()->format(getDateFormatFront())]));
    }

    /**
     * Function to set exists validators
     *
     * @return void
     */
    private function existsValidators(): void
    {
        Validator::extend('exist_validator', function ($attribute, $value, $parameters) {
            $tableName = $parameters[0];
            $checkField = $parameters[1] ?? 'id';

            $rules = ["integer_with_max|exists:" . $tableName . "," . $checkField];

            return $this->validator($this->getAttributeValue($attribute, $value), $rules);
        }, trans('validation.invalid'));
    }

    /**
     * Function to get attribute value
     *
     * @param $attribute
     * @param $value
     * @return array
     */
    private function getAttributeValue($attribute, $value): array
    {
        $data = [];

        if (str_contains($attribute, '.')) {
            $data = $this->dataArray(explode('.', $attribute), $value);
        } else {
            $data[$attribute] = $value;
        }


        return $data;
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


