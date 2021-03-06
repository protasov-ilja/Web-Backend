<?php
header("Content-Type: text/plain; charset=UTF-8");

const PRIME_ARRAY = [2, 3, 5, 7, 11, 13, 17, 19, 23, 29];
const ARRAY_FUNC = [
    'count' => "Подсчитывает количество элементов массива или что-то в объекте",
    'is_array' => "Определяет, является ли переменная массивом",
    'array_merge' => "Сливает один или большее количество массивов",
    'empty' => "Проверяет, пуста ли переменная",
    'print_r' => "Выводит информацию о переменной в удобочитаемом виде"
];
const UNIT_MATRIX4x4 = [
    [1, 0, 0, 0],
    [0, 1, 0, 0],
    [0, 0, 1, 0],
    [0, 0, 0, 1]
];

echo "Массив первых 10-ти простых чисел\n";
print_r(PRIME_ARRAY);
echo "Ассоциативный массив PHP функций\n";
print_r(ARRAY_FUNC);
echo "Многомерный массив, описывающий единичную матрицу 4х4\n";
print_r(UNIT_MATRIX4x4);
