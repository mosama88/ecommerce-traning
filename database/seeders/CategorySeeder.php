<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            ['name' => json_encode(['en' => 'Economy', 'ar' => 'الاقتصاد']), 'created_at' => Carbon::now()],
            ['name' => json_encode(['en' => 'Science', 'ar' => 'العلوم']), 'created_at' => Carbon::now()],
            ['name' => json_encode(['en' => 'Technology', 'ar' => 'التكنولوجيا']), 'created_at' => Carbon::now()],
            ['name' => json_encode(['en' => 'History', 'ar' => 'التاريخ']), 'created_at' => Carbon::now()],
            ['name' => json_encode(['en' => 'Philosophy', 'ar' => 'الفلسفة']), 'created_at' => Carbon::now()],
            ['name' => json_encode(['en' => 'Fiction', 'ar' => 'الأدب الخيالي']), 'created_at' => Carbon::now()],
            ['name' => json_encode(['en' => 'Biographies', 'ar' => 'السير الذاتية']), 'created_at' => Carbon::now()],
            ['name' => json_encode(['en' => 'Art', 'ar' => 'الفنون']), 'created_at' => Carbon::now()],
            ['name' => json_encode(['en' => 'Music', 'ar' => 'الموسيقى']), 'created_at' => Carbon::now()],
            ['name' => json_encode(['en' => 'Religion', 'ar' => 'الدين']), 'created_at' => Carbon::now()],
            ['name' => json_encode(['en' => 'Travel', 'ar' => 'السفر']), 'created_at' => Carbon::now()],
            ['name' => json_encode(['en' => 'Health', 'ar' => 'الصحة']), 'created_at' => Carbon::now()],
            ['name' => json_encode(['en' => 'Cooking', 'ar' => 'الطبخ']), 'created_at' => Carbon::now()],
            ['name' => json_encode(['en' => 'Sports', 'ar' => 'الرياضة']), 'created_at' => Carbon::now()],
            ['name' => json_encode(['en' => 'Psychology', 'ar' => 'علم النفس']), 'created_at' => Carbon::now()],
            ['name' => json_encode(['en' => 'Parenting', 'ar' => 'التربية']), 'created_at' => Carbon::now()],
            ['name' => json_encode(['en' => 'Education', 'ar' => 'التعليم']), 'created_at' => Carbon::now()],
            ['name' => json_encode(['en' => 'Poetry', 'ar' => 'الشعر']), 'created_at' => Carbon::now()],
            ['name' => json_encode(['en' => 'Mystery', 'ar' => 'الغموض']), 'created_at' => Carbon::now()],
            ['name' => json_encode(['en' => 'Romance', 'ar' => 'الرومانسية']), 'created_at' => Carbon::now()],
            ['name' => json_encode(['en' => 'Adventure', 'ar' => 'المغامرة']), 'created_at' => Carbon::now()],
            ['name' => json_encode(['en' => 'Fantasy', 'ar' => 'الفانتازيا']), 'created_at' => Carbon::now()],
            ['name' => json_encode(['en' => 'Horror', 'ar' => 'الرعب']), 'created_at' => Carbon::now()],
            ['name' => json_encode(['en' => 'Children\'s Books', 'ar' => 'كتب الأطفال']), 'created_at' => Carbon::now()],
            ['name' => json_encode(['en' => 'Comics', 'ar' => 'القصص المصورة']), 'created_at' => Carbon::now()],
            ['name' => json_encode(['en' => 'Self-Help', 'ar' => 'التطوير الذاتي']), 'created_at' => Carbon::now()],
            ['name' => json_encode(['en' => 'Business', 'ar' => 'الأعمال']), 'created_at' => Carbon::now()],
            ['name' => json_encode(['en' => 'Environment', 'ar' => 'البيئة']), 'created_at' => Carbon::now()],
            ['name' => json_encode(['en' => 'Politics', 'ar' => 'السياسة']), 'created_at' => Carbon::now()],
            ['name' => json_encode(['en' => 'Medicine', 'ar' => 'الطب']), 'created_at' => Carbon::now()],
        ]);
    }
}