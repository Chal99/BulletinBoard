<?php

namespace App\Imports;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Hash;

class PostsImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Post([
            'title'     => $row['title'],
            'description'    => $row['description'],
            'create_user_id' => 1,
            'updated_user_id' => 1,
        ]);
    }
}
