<?php

namespace LibWp;

/**
 * Class LibWpFactory
 * @package LibWp
 */
class LibWpFactory
{
    /**
     * The single instance of the class.
     *
     * @var LibWpFactory
     */
    protected static $_instance = null;

    /**
     * Instance of the class.
     *
     * @return LibWpFactory|null
     */
    public static function instance()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /**
     * LibWpFactory constructor.
     */
    public function __construct()
    {
        $this->includes();
    }

    /**
     * Includes the classes.
     */
    private function includes()
    {
        require __DIR__ . '/inc/PostType.php';
        require __DIR__ . '/inc/Taxonomy.php';
    }

    /**
     * Get instance of PostType class.
     *
     * @return PostType
     */
    public function postType(): PostType
    {
        return new PostType();
    }

    /**
     * Get instance of Taxonomy class.
     *
     * @return Taxonomy
     */
    public function taxonomy(): Taxonomy
    {
        return new Taxonomy();
    }
}