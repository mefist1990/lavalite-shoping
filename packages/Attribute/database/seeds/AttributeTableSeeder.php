<?php

use Illuminate\Database\Seeder;

class AttributeTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('attributes')->insert([
            
        ]);

        DB::table('permissions')->insert([
            [
                'slug'      => 'attribute.attribute.view',
                'name'      => 'View Attribute',
            ],
            [
                'slug'      => 'attribute.attribute.create',
                'name'      => 'Create Attribute',
            ],
            [
                'slug'      => 'attribute.attribute.edit',
                'name'      => 'Update Attribute',
            ],
            [
                'slug'      => 'attribute.attribute.delete',
                'name'      => 'Delete Attribute',
            ],
            /*
            [
                'slug'      => 'attribute.attribute.verify',
                'name'      => 'Verify Attribute',
            ],
            [
                'slug'      => 'attribute.attribute.approve',
                'name'      => 'Approve Attribute',
            ],
            [
                'slug'      => 'attribute.attribute.publish',
                'name'      => 'Publish Attribute',
            ],
            [
                'slug'      => 'attribute.attribute.unpublish',
                'name'      => 'Unpublish Attribute',
            ],
            [
                'slug'      => 'attribute.attribute.cancel',
                'name'      => 'Cancel Attribute',
            ],
            [
                'slug'      => 'attribute.attribute.archive',
                'name'      => 'Archive Attribute',
            ],
            */
        ]);

        DB::table('menus')->insert([

            [
                'parent_id'   => 1,
                'key'         => null,
                'url'         => 'admin/attribute/attribute',
                'name'        => 'Attribute',
                'description' => null,
                'icon'        => 'fa fa-newspaper-o',
                'target'      => null,
                'order'       => 190,
                'status'      => 1,
            ],

            [
                'parent_id'   => 2,
                'key'         => null,
                'url'         => 'user/attribute/attribute',
                'name'        => 'Attribute',
                'description' => null,
                'icon'        => 'icon-book-open',
                'target'      => null,
                'order'       => 190,
                'status'      => 1,
            ],

            [
                'parent_id'   => 3,
                'key'         => null,
                'url'         => 'attribute',
                'name'        => 'Attribute',
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
                'key'      => 'attribute.attribute.key',
                'name'     => 'Some name',
                'value'    => 'Some value',
                'type'     => 'Default',
            ],
            */
        ]);
    }
}
