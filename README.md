# Snail
Provide some simple functionality to register some hooks that could not register inside the WordPress themes

## Quick Start
Get instance of main class.
```php
Snail();
```

## Factories
**Post type**
```php
Snail()->postType();
```

**Taxonomy**
```php
Snail()->taxonomy();
```

## Examples

### Register a new taxonomy
```php
Snail()->postType()
    ->setName('book')
    ->setLabels([
        'name'          => _x('Books', 'Post type general name', 'textdomain'),
        'singular_name' => _x('Book', 'Post type singular name', 'textdomain'),
        'menu_name'     => _x('Books', 'Admin Menu text', 'textdomain'),
        'add_new'       => __('Add New', 'textdomain'),
        'edit_item'     => __('Edit Book', 'textdomain'),
        'view_item'     => __('View Book', 'textdomain'),
        'all_items'     => __('All Books', 'textdomain'),
    ])
    ->setFeatures([
        'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments'
    ])
    ->register();
```

### Register a new taxonomy belongs to previous post type

```php
Snail()->taxonomy()
    ->setName('types')
    ->setPostTypes('book')
    ->setLabels([
        'name'          => _x('Types', 'taxonomy general name', 'textdomain'),
        'singular_name' => _x('Type', 'taxonomy singular name', 'textdomain'),
        'search_items'  => __('Search Types', 'textdomain'),
        'all_items'     => __('All Types', 'textdomain'),
        'edit_item'     => __('Edit Type', 'textdomain'),
        'add_new_item'  => __('Add New Type', 'textdomain'),
        'new_item_name' => __('New Type Name', 'textdomain'),
        'menu_name'     => __('Types', 'textdomain'),
    ])
    ->register();
```

## License

The MIT License (MIT). Please see [License File](https://github.com/thephpleague/container/blob/master/LICENSE.md) for more information.
