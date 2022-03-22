<?php

namespace App\Http\Requests\AdditionalRules\Metadata;

class MetaDataValidation
{
    /**
     * Function to set seo data
     *
     * @return string[]
     */
    public static function rules(bool $isRequired = false): array
    {
        $requiredRule = $isRequired ? 'required' : 'nullable';

        return [
            "ml" => "$requiredRule|array",
            "ml.*.meta_title" => "$requiredRule|string_with_max",
            "ml.*.meta_description" => "$requiredRule|text_with_max",
            "ml.*.meta_keywords" => "$requiredRule|string_with_max",
        ];
    }
}
