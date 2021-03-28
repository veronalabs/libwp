<?php

namespace LibWp;

/**
 * Class Taxonomy
 * @package LibWp
 */
class Taxonomy
{
    /**
     * Taxonomy ID
     *
     * @var string
     */
    private $id;

    /**
     * Taxonomy name
     *
     * @var string
     */
    private $name;

    /**
     * Taxonomy arguments
     *
     * @var array $arguments
     */
    private $arguments;

    /**
     * Post Types
     *
     * @var $postTypes array
     */
    private $postTypes;

    /**
     * @var bool $hierarchical
     */
    public $hierarchical = true;

    /**
     * @var bool $showUi
     */
    public $showUi = true;

    /**
     * @var bool $showAdminColumn
     */
    public $showAdminColumn = true;

    /**
     * @var bool $queryVar
     */
    public $queryVar = true;

    /**
     * Taxonomy constructor.
     */
    public function __construct()
    {
        $this->arguments = array(
            'hierarchical'      => $this->hierarchical,
            'show_ui'           => $this->showUi,
            'show_admin_column' => $this->showAdminColumn,
            'query_var'         => $this->queryVar,
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
     * Set taxonomy name
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
     * Set taxonomy rewrite
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
     * Set taxonomy labels
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
     * Set Post types
     *
     * @param $postTypes
     * @return $this
     */
    public function setPostTypes($postTypes)
    {
        $this->postTypes = $postTypes;
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
     * Initial the taxonomy hook
     */
    public function register()
    {
        if (empty($this->arguments['rewrite']['slug'])) {
            $this->arguments['rewrite']['slug'] = $this->name;
        }

        /**
         * Filter taxonomy name
         */
        $this->name = apply_filters("libwp_taxonomy_{$this->id}_name", $this->name);

        /**
         * Filter taxonomy post type names
         */
        $this->postTypes = apply_filters("libwp_taxonomy_{$this->id}_post_type", $this->postTypes);

        /**
         * Filter taxonomy argument
         */
        $this->arguments = apply_filters("libwp_taxonomy_{$this->id}_arguments", $this->arguments);

        add_action('init', function () {
            register_taxonomy($this->name, $this->postTypes, $this->arguments);
        });
    }
}