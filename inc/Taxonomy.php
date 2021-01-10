<?php

namespace Snail;

/**
 * Class Taxonomy
 * @package Snail
 */
class Taxonomy
{
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
     * Initial the taxonomy hook
     */
    public function register()
    {
        if (empty($this->arguments['rewrite']['slug'])) {
            $this->arguments['rewrite']['slug'] = $this->name;
        }

        add_action('init', function () {
            register_taxonomy($this->name, $this->postTypes, $this->arguments);
        });
    }
}