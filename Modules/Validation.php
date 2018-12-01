<?php

class Validation
{
    public function validateValues(array $data): array
    {
        $errors = [];
        foreach ($data as $key => $value) {
            if (!isset($value) || $value === '') {
                $errors[] = 'Поле ' . $key . ' должно быть заполнено';
            }
        }
        return $errors;
    }
}