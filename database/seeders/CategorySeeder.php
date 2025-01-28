<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Category;
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
            ['name' => json_encode(['en' => 'Fiction', 'ar' => 'روايات'])],
            ['name' => json_encode(['en' => 'Non-Fiction', 'ar' => 'غير روائية'])],
            ['name' => json_encode(['en' => 'Science Fiction', 'ar' => 'خيال علمي'])],
            ['name' => json_encode(['en' => 'Fantasy', 'ar' => 'خيال'])],
            ['name' => json_encode(['en' => 'Mystery & Thriller', 'ar' => 'غموض وإثارة'])],
            ['name' => json_encode(['en' => 'Biography & Memoir', 'ar' => 'سير ذاتية ومذكرات'])],
            ['name' => json_encode(['en' => 'Self-Help', 'ar' => 'تنمية ذاتية'])],
            ['name' => json_encode(['en' => 'Children\'s Books', 'ar' => 'كتب الأطفال'])],
            ['name' => json_encode(['en' => 'History', 'ar' => 'تاريخ'])],
            ['name' => json_encode(['en' => 'Cookbooks', 'ar' => 'كتب الطبخ'])],
            ['name' => json_encode(['en' => 'Poetry', 'ar' => 'شعر'])],
            ['name' => json_encode(['en' => 'Romance', 'ar' => 'رومانسية'])],
            ['name' => json_encode(['en' => 'Horror', 'ar' => 'رعب'])],
            ['name' => json_encode(['en' => 'Graphic Novels & Comics', 'ar' => 'روايات مصورة وكوميك'])],
            ['name' => json_encode(['en' => 'Religion & Spirituality', 'ar' => 'دين وروحانيات'])],
            ['name' => json_encode(['en' => 'Art & Photography', 'ar' => 'فن وتصوير'])],
            ['name' => json_encode(['en' => 'Travel', 'ar' => 'سفر'])],
            ['name' => json_encode(['en' => 'Health & Fitness', 'ar' => 'صحة ولياقة'])],
            ['name' => json_encode(['en' => 'Science & Technology', 'ar' => 'علوم وتقنية'])],
            ['name' => json_encode(['en' => 'Business & Economics', 'ar' => 'أعمال واقتصاد'])],
            ['name' => json_encode(['en' => 'Philosophy', 'ar' => 'فلسفة'])],
            ['name' => json_encode(['en' => 'Music', 'ar' => 'موسيقى'])],
            ['name' => json_encode(['en' => 'Politics', 'ar' => 'سياسة'])],
            ['name' => json_encode(['en' => 'Law', 'ar' => 'قانون'])],
            ['name' => json_encode(['en' => 'Psychology', 'ar' => 'علم النفس'])],
            ['name' => json_encode(['en' => 'Education', 'ar' => 'تعليم'])],
            ['name' => json_encode(['en' => 'Computing', 'ar' => 'حوسبة'])],
            ['name' => json_encode(['en' => 'Environment', 'ar' => 'بيئة'])],
            ['name' => json_encode(['en' => 'Nature', 'ar' => 'طبيعة'])],
            ['name' => json_encode(['en' => 'Sports', 'ar' => 'رياضة'])],
            ['name' => json_encode(['en' => 'Fashion', 'ar' => 'موضة'])],
            ['name' => json_encode(['en' => 'Art History', 'ar' => 'تاريخ الفن'])],
            ['name' => json_encode(['en' => 'Cultural Studies', 'ar' => 'دراسات ثقافية'])],
            ['name' => json_encode(['en' => 'Architecture', 'ar' => 'هندسة معمارية'])],
            ['name' => json_encode(['en' => 'Graphic Design', 'ar' => 'تصميم جرافيكي'])],
            ['name' => json_encode(['en' => 'Social Sciences', 'ar' => 'علوم اجتماعية'])],
            ['name' => json_encode(['en' => 'Technology', 'ar' => 'تقنية'])],
            ['name' => json_encode(['en' => 'Marketing', 'ar' => 'تسويق'])],
            ['name' => json_encode(['en' => 'Journalism', 'ar' => 'صحافة'])],
            ['name' => json_encode(['en' => 'Photography', 'ar' => 'تصوير'])],
            ['name' => json_encode(['en' => 'Theater', 'ar' => 'مسرح'])],
            ['name' => json_encode(['en' => 'Poetry', 'ar' => 'شعر'])],
            ['name' => json_encode(['en' => 'Short Stories', 'ar' => 'قصص قصيرة'])],
            ['name' => json_encode(['en' => 'Mythology', 'ar' => 'أساطير'])],
            ['name' => json_encode(['en' => 'Classics', 'ar' => 'كلاسيكيات'])],
            ['name' => json_encode(['en' => 'Anthropology', 'ar' => 'أنثروبولوجيا'])],
            ['name' => json_encode(['en' => 'Sociology', 'ar' => 'سوسيولوجيا'])],
            ['name' => json_encode(['en' => 'Geography', 'ar' => 'جغرافيا'])],
            ['name' => json_encode(['en' => 'Astrology', 'ar' => 'فلك'])],
            ['name' => json_encode(['en' => 'Linguistics', 'ar' => 'لسانيات'])],
            ['name' => json_encode(['en' => 'Travel Guides', 'ar' => 'دليل السفر'])],
            ['name' => json_encode(['en' => 'Adventure', 'ar' => 'مغامرة'])],
            ['name' => json_encode(['en' => 'Fantasy Literature', 'ar' => 'أدب الخيال'])],
            ['name' => json_encode(['en' => 'Dystopian Fiction', 'ar' => 'خيال ديستوبي'])],
            ['name' => json_encode(['en' => 'Satire', 'ar' => 'سخرية'])],
            ['name' => json_encode(['en' => 'Humor', 'ar' => 'فكاهة'])],
            ['name' => json_encode(['en' => 'True Crime', 'ar' => 'جريمة حقيقية'])],
            ['name' => json_encode(['en' => 'Urban Fiction', 'ar' => 'أدب حضري'])],
            ['name' => json_encode(['en' => 'Young Adult', 'ar' => 'شبابي'])],
            ['name' => json_encode(['en' => 'Children\'s Literature', 'ar' => 'أدب الأطفال'])],
            ['name' => json_encode(['en' => 'Historical Fiction', 'ar' => 'رواية تاريخية'])],
            ['name' => json_encode(['en' => 'Graphic Novels', 'ar' => 'روايات مصورة'])],
            ['name' => json_encode(['en' => 'Romantic Fiction', 'ar' => 'أدب رومانسي'])],
            ['name' => json_encode(['en' => 'Literary Fiction', 'ar' => 'أدب أدبي'])],
        ]);
    }
}
