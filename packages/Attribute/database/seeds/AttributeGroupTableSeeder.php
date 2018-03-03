<?php

use Illuminate\Database\Seeder;

class AttributeGroupTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('attribute_groups')->insert([
            
        ]);

        DB::table('permissions')->insert([
            [
                'slug'      => 'attribute.attribute_group.view',
                'name'      => 'View AttributeGroup',
            ],
            [
                'slug'      => 'attribute.attribute_group.create',
                'name'      => 'Create AttributeGroup',
            ],
            [
                'slug'      => 'attribute.attribute_group.edit',
                'name'      => 'Update AttributeGroup',
            ],
            [
                'slug'      => 'attribute.attribute_group.delete',
                'name'      => 'Delete AttributeGroup',
            ],
            /*
            [
                'slug'      => 'attribute.attribute_group.verify',
                'name'      => 'Verify AttributeGroup',
            ],
            [
                'slug'      => 'attribute.attribute_group.approve',
                'name'      => 'Approve AttributeGroup',
            ],
            [
                'slug'      => 'attribute.attribute_group.publish',
                'name'      => 'Publish AttributeGroup',
            ],
            [
                'slug'      => 'attribute.attribute_group.unpublish',
                'name'      => 'Unpublish AttributeGroup',
            ],
            [
                'slug'      => 'attribute.attribute_group.cancel',
                'name'      => 'Cancel AttributeGroup',
            ],
            [
                'slug'      => 'attribute.attribute_group.archive',
                'name'      => 'Archive AttributeGroup',
            ],
            */
        ]);

        DB::table('menus')->insert([

            [
                'parent_id'   => 1,
                'key'         => null,
                'url'         => 'admin/attribute/attribute_group',
                'name'        => 'AttributeGroup',
                'description' => null,
                'icon'        => 'fa fa-newspaper-o',
                'target'      => null,
                'order'       => 190,
                'status'      => 1,
            ],

            [
                'parent_id'   => 2,
                'key'         => null,
                'url'         => 'user/attribute/attribute_group',
                'name'        => 'AttributeGroup',
                'description' => null,
                'icon'        => 'icon-book-open',
                'target'      => null,
                'order'       => 190,
                'status'      => 1,
            ],

            [
                'parent_id'   => 3,
                'key'         => null,
                'url'         => 'attribute_group',
                'name'        => 'AttributeGroup',
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
                'key'      => 'attribute.attribute_group.key',
                'name'     => 'Some name',
                'value'    => 'Some value',
                'type'     => 'Default',
            ],
            */
        ]);
    }
}
