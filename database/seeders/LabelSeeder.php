<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Label;

class LabelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {  
        Label::create([   
            'label_name' => 'Famiglia',
            'label_color' => '#ffcccb',
        ]);
        Label::create([   
            'label_name' => 'Lavoro',
            'label_color' => '#6699cc',
        ]);
        Label::create([   
            'label_name' => 'Personale',
            'label_color' => '#ffcc99',  
        ]);
        Label::create([   
            'label_name' => 'Salute',
            'label_color' => '#66cdaa',   
        ]);
        Label::create([   
            'label_name' => 'Viaggio',
            'label_color' => '#ffd700',   
        ]);
        Label::create([   
            'label_name' => 'Sport',
            'label_color' => '#ff6347',  
        ]);
        Label::create([   
            'label_name' => 'Compleanno',
            'label_color' => '#ff69b4',  
        ]);
        Label::create([   
            'label_name' => 'Email',
            'label_color' => '#87ceeb',  
        ]);
        Label::create([   
            'label_name' => 'Libro',
            'label_color' => '#9370db',  
        ]);
        Label::create([   
            'label_name' => 'Film',
            'label_color' => '#ff4500',  
        ]);
        Label::create([   
            'label_name' => 'Cane',
            'label_color' => '#f0e68c',  
        ]);
        Label::create([   
            'label_name' => 'Gatto',
            'label_color' => '#a9a9a9',  
        ]);
    }
}
