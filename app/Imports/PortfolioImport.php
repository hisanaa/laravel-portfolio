<?php

namespace App\Imports;

use App\Models\Portfolio;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PortfolioImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Portfolio([
            'project_on' => $row['project_on'],
            'tools' => $row['tools'],
            'url' => $row['url'],
            'status' => $row['status'],
            'featured' => $row['featured'],
            'thumbnail' => $row['thumbnail'],
        ]);
    }
}
