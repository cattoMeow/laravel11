# laravel11
 

Run Factory \
``php artisan tinker`` \
``App\Models\Post::factory(100)->recycle([Category::factory(3)->create(), User::factory(5)->create()])->create();``


if category not found \
``composer dumpautoload``\
``php artisan optimize:clear``

