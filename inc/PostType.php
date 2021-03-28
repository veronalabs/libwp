<?php

namespace LibWp;

/**
 * Class PostType
 * @package LibWp
 */
class PostType
{
    /**
     * Post Type ID
     *
     * @var string
     */
    private $id;

    /**
     * Post Type name
     *
     * @var string
     */
    private $name;

    /**
     * Post type arguments
     *
     * @var array $arguments
     */
    private $arguments;

    /**
     * @var bool $public
     */
    private $public = true;

    /**
     * @var bool $publiclyQueryable
     */
    private $publiclyQueryable = true;

    /**
     * @var bool $showUi
     */
    private $showUi = true;

    /**
     * @var bool $showInMenu
     */
    private $showInMenu = true;

    /**
     * @var bool $queryVar
     */
    private $queryVar = true;

    /**
     * @var string $capabilityType
     */
    private $capabilityType = 'post';

    /**
     * @var bool $hasArchive
     */
    private $hasArchive = true;

    /**
     * @var bool $hierarchical
     */
    private $hierarchical = false;

    /**
     * @var null $menuPosition
     */
    private $menuPosition = null;

    /**
     * PostType constructor.
     */
    public function __construct()
    {
        $this->arguments = array(
            'public'             => $this->public,
            'publicly_queryable' => $this->publiclyQueryable,
            'show_ui'            => $this->showUi,
            'show_in_menu'       => $this->showInMenu,
            'query_var'          => $this->queryVar,
            'capability_type'    => $this->capabilityType,
            'has_archive'        => $this->hasArchive,
            'hierarchical'       => $this->hierarchical,
            'menu_position'      => $this->menuPosition,
        );
    }

    /**
     * Set unique id
     *
     * @param $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Set post type name
     *
     * @param $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Set post type rewrite
     *
     * @param $rewrite
     * @return $this
     */
    public function setRewrite($rewrite)
    {
        $this->arguments['rewrite'] = $rewrite;
        return $this;
    }

    /**
     * Set post type labels
     *
     * @param $labels
     * @return $this
     */
    public function setLabels($labels)
    {
        $this->arguments['labels'] = $labels;
        return $this;
    }

    /**
     * Set post type features
     *
     * @param $features
     * @return $this
     */
    public function setFeatures($features)
    {
        $this->arguments['supports'] = $features;
        return $this;
    }

    /**
     * Set arguments
     *
     * @param $argument
     * @param $value
     * @return $this
     */
    public function setArgument($argument, $value)
    {
        $this->arguments[$argument] = $value;
        return $this;
    }

    /**
     * Initial the post type hook
     */
    public function register()
    {
        if (empty($this->arguments['rewrite']['slug'])) {
            $this->arguments['rewrite']['slug'] = $this->name;
        }

        /**
         * Filter post type name
         */
        $this->name = apply_filters("libwp_post_type_{$this->id}_name", $this->name);

        /**
         * Filter post type argument
         */
        $this->arguments = apply_filters("libwp_post_type_{$this->id}_arguments", $this->arguments);

        add_action('init', function () {
            register_post_type($this->name, $this->arguments);
        });
    }
}