<?php


namespace the42coders\Workflows\DataBuses;


use Illuminate\Database\Eloquent\Model;

class ValueResource implements Resource
{
    public function getData(string $name, string $value, Model $model, DataBus $dataBus)
    {
        return $value;
    }

    public static function loadResourceIntelligence(Model $element, $value, $field)
    {

        if(isset($element->inputFields()[$field])){
            return $element->inputFields()[$field]->render($element, $value, $field);
        }

        return view('workflows::fields.text_field', [
            'value' => $value,
            'field' => $field,
        ])->render();
    }
}