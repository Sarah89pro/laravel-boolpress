<?php

use App\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags= ['pasta all\'uovo', 'frutta', 'pesce', 'carne', 'verdura'];

        foreach ($tags as $tag) {
            //instance
            $new_tag = new Tag();

            //populate Db
            $new_tag->name = $tag;
            $new_tag->slug = Str::slug($tag, '-');

            //Save
            $new_tag->save();

        }
    }
}
