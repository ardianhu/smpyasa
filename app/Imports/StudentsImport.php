<?php

namespace App\Imports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StudentsImport implements ToModel, WithHeadingRow
{
    private ?int $studentClassId;
    private ?int $graduationYear;

    public function __construct(?int $studentClassId, ?int $graduationYear)
    {
        $this->studentClassId = $studentClassId;
        $this->graduationYear = $graduationYear;
    }

    public function model(array $row)
    {
        return new Student([
            'name' => $row['name'] ?? null, // Maps the 'name' column
            'dob' => $row['dob'] ?? null,
            'nisn' => $row['nisn'] ?? null,
            'nis' => $row['nis'] ?? null,
            'address' => $row['address'] ?? null,
            'father' => $row['father'] ?? null,
            'mother' => $row['mother'] ?? null,
            'graduation_year' => $this->graduationYear ?? null,
            'student_class_id' => $this->studentClassId ?? null,
        ]);
    }
}
