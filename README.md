# Repository-design-pattern-in-Laravel
The repository design pattern allows you to use objects without having to know how these objects are persisted. Essentially it is an abstraction of the data layer.

A misconception that I see a lot regarding to this pattern is that repositories are being implemented in such a way to create or update records. This is not what a repository should do. Repositories shouldn’t create or update data, but should only be used to retrieve data.

Enough of the theory, let’s start coding

Since we will be doing this from scratch, let’s start by creating a new Laravel project:
-  composer create-project --prefer-dist laravel/laravel repository

For this tutorial I will be creating a small blog application. Now that we have created a project we need to create a Controller and Model for the blog.
-  php artisan make:controller BlogController

This will create the BlogController in the app/Http/Controllers folder.
-  php artisan make:model Models/Blog -m


After you have changed the .env file we have to clear the configuration cache:
-  php artisan config:clear

Run the migration
Now that we have setup the database we can run the migration:
-  php artisan migrate


Your Repositories folder should look like this:
app/
└── Repositories/
    ├── BlogRepository.php
    └── Interfaces/
        └── BlogRepositoryInterface.php
        
        
The RepositoryServiceProvider
Instead of injecting the BlogRepository in the BlogController we will be injecting the BlogRepositoryInterface and then let the Service Container decide which repository will be used. This could be done in the boot method of the AppServiceProvider, but I prefer to create a new provider for this to keep things clean.

-  php artisan make:provider RepositoryServiceProvider
