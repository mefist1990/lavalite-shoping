<?php

use Illuminate\Database\Seeder;

class NewsletterTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('newsletters')->insert([
            
        ]);

        DB::table('permissions')->insert([
            [
                'slug'      => 'newsletter.newsletter.view',
                'name'      => 'View Newsletter',
            ],
            [
                'slug'      => 'newsletter.newsletter.create',
                'name'      => 'Create Newsletter',
            ],
            [
                'slug'      => 'newsletter.newsletter.edit',
                'name'      => 'Update Newsletter',
            ],
            [
                'slug'      => 'newsletter.newsletter.delete',
                'name'      => 'Delete Newsletter',
            ],
            /*
            [
                'slug'      => 'newsletter.newsletter.verify',
                'name'      => 'Verify Newsletter',
            ],
            [
                'slug'      => 'newsletter.newsletter.approve',
                'name'      => 'Approve Newsletter',
            ],
            [
                'slug'      => 'newsletter.newsletter.publish',
                'name'      => 'Publish Newsletter',
            ],
            [
                'slug'      => 'newsletter.newsletter.unpublish',
                'name'      => 'Unpublish Newsletter',
            ],
            [
                'slug'      => 'newsletter.newsletter.cancel',
                'name'      => 'Cancel Newsletter',
            ],
            [
                'slug'      => 'newsletter.newsletter.archive',
                'name'      => 'Archive Newsletter',
            ],
            */
        ]);

        DB::table('menus')->insert([

            [
                'parent_id'   => 1,
                'key'         => null,
                'url'         => 'admin/newsletter/newsletter',
                'name'        => 'Newsletter',
                'description' => null,
                'icon'        => 'fa fa-newspaper-o',
                'target'      => null,
                'order'       => 190,
                'status'      => 1,
            ],

            [
                'parent_id'   => 2,
                'key'         => null,
                'url'         => 'user/newsletter/newsletter',
                'name'        => 'Newsletter',
                'description' => null,
                'icon'        => 'icon-book-open',
                'target'      => null,
                'order'       => 190,
                'status'      => 1,
            ],

            [
                'parent_id'   => 3,
                'key'         => null,
                'url'         => 'newsletter',
                'name'        => 'Newsletter',
                'description' => null,
                'icon'        => null,
                'target'      => null,
                'order'       => 190,
                'status'      => 1,
            ],

        ]);

        DB::table('settings')->insert([
            // Uncomment  and edit this section for entering value to settings table.
            /*
            [
                'key'      => 'newsletter.newsletter.key',
                'name'     => 'Some name',
                'value'    => 'Some value',
                'type'     => 'Default',
            ],
            */
        ]);
    }
}
