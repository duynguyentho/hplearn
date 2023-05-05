<?php

namespace App\Imports;

use App\Models\Lesson;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToArray;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class LessonImport implements ToArray, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function array($rows)
    {
        foreach ($rows as $row) {
            $data = [
                'course_id' => $row['id_khoa_hoc'],
                'name' => $row['ten_bai_hoc'],
                'image' => $row['image'],
                'description' => $row['mo_ta'],
                'requirements' => data_get($row, 'yeu_cau', 'Không'),
                'time' => $row['thoi_luong']
            ];
            Lesson::query()->create($data);
        }
    }

    public function headingRow(): int
    {
        return 2;
    }
}
