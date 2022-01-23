<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Like;
use App\Models\Recipe;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $category1 = Category::factory()->create([
            'is_parent' => true,
            'parent_id' => null,
            'name' => 'Protein',
            'slug' => 'protein',
        ]);
        $category2 = Category::factory()->create([
            'is_parent' => true,
            'parent_id' => null,
            'name' => 'Vegetables',
            'slug' => 'vegetables',
        ]);
        $category3 = Category::factory()->create([
            'is_parent' => true,
            'parent_id' => null,
            'name' => 'Cuisine',
            'slug' => 'cuisine',
        ]);
        $category4 = Category::factory()->create([
            'is_parent' => true,
            'parent_id' => null,
            'name' => 'Course',
            'slug' => 'course',
        ]);
        Category::factory(2)->create(['parent_id' => $category1->id]);
        Category::factory(2)->create(['parent_id' => $category2->id]);
        Category::factory(2)->create(['parent_id' => $category3->id]);
        Category::factory(2)->create(['parent_id' => $category4->id]);

        $user1 = User::factory()->create([
            'role' => 2,
            'username' => 'BarryvanderH',
            'email' => 'barry@example.com',
            'password' => bcrypt('test'),

        ]);
        $user2 = User::factory()->create([
            'role' => 3,
            'username' => 'Tarekt',
            'email' => 'tarik@example.com',
            'password' => bcrypt('test'),
        ]);

        $user3 = User::factory()->create([
            'role' => 1,
            'username' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('test'),
        ]);

        $recipe1 = Recipe::factory()->hasCategories(4)->create(['user_id' => $user1->id]);
        $recipe2 = Recipe::factory()->hasCategories(4)->create(['user_id' => $user1->id]);
        $recipe3 = Recipe::factory()->hasCategories(4)->create(['user_id' => $user1->id]);
        $recipe4 = Recipe::factory()->hasCategories(4)->create(['user_id' => $user1->id]);

        Recipe::factory(16)->hasCategories(4)->create();

        Like::factory(10)->create(['recipe_id' => $recipe1->id]);
        Like::factory(10)->create(['recipe_id' => $recipe2->id]);
        Like::factory(10)->create(['recipe_id' => $recipe3->id]);
        Like::factory(10)->create(['recipe_id' => $recipe4->id]);

        $comment1 = Comment::factory()->create(['recipe_id' => $recipe1->id]);
        $comment2 = Comment::factory()->create(['recipe_id' => $recipe2->id]);
        $comment3 = Comment::factory()->create(['recipe_id' => $recipe3->id]);
        $comment4 = Comment::factory()->create(['recipe_id' => $recipe4->id]);

        Like::factory(3)->create(['recipe_id' => $recipe1->id, 'comment_id' => $comment1->id]);
        Like::factory(4)->create(['recipe_id' => $recipe2->id, 'comment_id' => $comment2->id]);
        Like::factory(5)->create(['recipe_id' => $recipe3->id, 'comment_id' => $comment3->id]);
        Like::factory(6)->create(['recipe_id' => $recipe4->id, 'comment_id' => $comment4->id]);

        Comment::factory()->create(['recipe_id' => $recipe1->id, 'comment_id' => $comment1->id]);
        Comment::factory()->create(['recipe_id' => $recipe2->id, 'comment_id' => $comment2->id]);
        Comment::factory()->create(['recipe_id' => $recipe3->id, 'comment_id' => $comment3->id]);
        Comment::factory()->create(['recipe_id' => $recipe4->id, 'comment_id' => $comment4->id]);

        Comment::factory(2)->create(['recipe_id' => $recipe1->id]);
        Comment::factory(2)->create(['recipe_id' => $recipe2->id]);
        Comment::factory(2)->create(['recipe_id' => $recipe3->id]);
        Comment::factory(2)->create(['recipe_id' => $recipe4->id]);
    }
}
