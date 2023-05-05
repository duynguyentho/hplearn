<?php

namespace App\Imports;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\Program;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToArray;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProgramImport implements ToArray, WithHeadingRow
{
    protected $lessonId;

    public function __construct($lessonId)
    {
        $this->lessonId = $lessonId;
    }

    /**
     * @param Collection $collection
     */
    public function array($rows)
    {
        $data = [];
        foreach ($rows as $row) {
            $data[] = [
                'name' => $row['ten_bai_hoc'],
                'source_code' => $row['source_code'],
                'type' => $row['the_loai'],
            ];
        }

        Lesson::query()->find($this->lessonId)->programs()->createMany($data);
    }

    public function headingRow(): int
    {
        return 2;
    }
}
