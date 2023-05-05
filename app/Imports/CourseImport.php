<?php

namespace App\Imports;

use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToArray;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CourseImport implements ToArray, WithHeadingRow
{
    /**
     * @param Collection $collection
     */
    public function array($rows)
    {
        foreach ($rows as $row) {
            $data = [
                'name' => $row['ten_khoa_hoc'],
                'image' => $row['anh'],
                'description' => $row['mo_ta'],
            ];
            Course::query()->create($data);
        }
    }

    public function headingRow(): int
    {
        return 2;
    }
}
