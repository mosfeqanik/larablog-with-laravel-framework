<?php
use App\category;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $html=new category();
        $html->name = 'HTML';
        $html->slug = 'html';
        $html->save();

        $css=new category();
        $css->name  = 'CSS';
        $css->slug  = 'css';
        $css->save();

        $php=new category();
        $php->name  = 'PHP';
        $php->slug  = 'php';
        $php->save();
    }
}
