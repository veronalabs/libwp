# LibWp
Provide some simple functionality to register some hooks that could not register inside the WordPress themes

## Quick Start
Get instance of main class.
```php
LibWp();
```

## Factories
**Post type**
```php
LibWp()->postType();
```

**Taxonomy**
```php
LibWp()->taxonomy();
```

## Examples

### Register a new taxonomy
```php
LibWp()->postType()
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
    ->setArgument('show_ui', true)
    ->register();
```

### Register a new taxonomy belongs to previous post type

```php
LibWp()->taxonomy()
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

## Filters

### Modify registered post type

```php
/**
 * Modify LibWP post type name
 */
add_filter('libwp_post_type_1_name', function ($postTypeName) {
    $postTypeName = 'project';
    return $postTypeName;
});

/**
 * Modify LibWP post type arguments
 */
add_filter('libwp_post_type_1_arguments', function ($postTypeArguments) {

    $postTypeArguments['labels'] = [
        'name'          => _x('Projects', 'Post type general name', 'cavatina'),
        'singular_name' => _x('Project', 'Post type singular name', 'cavatina'),
        'menu_name'     => _x('Projects', 'Admin Menu text', 'cavatina'),
        'add_new'       => __('Add New', 'cavatina'),
        'edit_item'     => __('Edit Project', 'cavatina'),
        'view_item'     => __('View Project', 'cavatina'),
        'all_items'     => __('All Projects', 'cavatina'),
    ];
    $postTypeArguments['rewrite']['slug'] = 'project';

    return $postTypeArguments;
});
```

### Modify registered taxonomy

```php
/**
 * Modify LibWP taxonomy name
 */
add_filter('libwp_taxonomy_1_name', function ($taxonomyName) {
    $taxonomyName = 'projects';
    return $taxonomyName;
});

/**
 * Modify LibWP post type
 */
add_filter('libwp_taxonomy_1_post_type', function ($taxonomyPostTypeName) {
    $taxonomyPostTypeName = 'project';
    return $taxonomyPostTypeName;
});

/**
 * Modify LibWP taxonomy name
 */
add_filter('libwp_taxonomy_1_arguments', function ($taxonomyArguments) {

    $taxonomyArguments['labels'] = [
        'name'          => _x('Project Categories', 'taxonomy general name', 'cavatina'),
        'singular_name' => _x('Project Category', 'taxonomy singular name', 'cavatina'),
        'search_items'  => __('Search Project Categories', 'cavatina'),
        'all_items'     => __('All Project Categories', 'cavatina'),
        'edit_item'     => __('Edit Project Category', 'cavatina'),
        'add_new_item'  => __('Add New Project Category', 'cavatina'),
        'new_item_name' => __('New Project Category Name', 'cavatina'),
        'menu_name'     => __('Project Categories', 'cavatina'),
    ];
    $taxonomyArguments['rewrite']['slug'] = 'projects';

    return $taxonomyArguments;
});
```

## License

The MIT License (MIT). Please see [License File](https://github.com/thephpleague/container/blob/master/LICENSE.md) for more information.
