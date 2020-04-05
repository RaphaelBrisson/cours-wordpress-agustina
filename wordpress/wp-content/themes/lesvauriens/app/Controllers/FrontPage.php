<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class FrontPage extends Controller
{
	public function articles()
    {
        $args = array(
            'numberposts' => 8,
            'post_type' => 'post',
            // 'orderby' => 'meta_value',
            // 'meta_key' => 'date_evenement',
            // 'order' => 'ASC',
        );

        $articles_results = get_posts($args);

        global $articles;
        $articles = $articles_results;

        return $articles_results;
    }


    public function evenements()
    {
        $args = array(
            'numberposts' => -1,
            'post_type' => 'evenement',
            'orderby' => 'meta_value',
            'meta_key' => 'date_evenement',
            'order' => 'ASC',
        );

        $evenements_results = get_posts($args);

        global $evenements;
        $evenements = $evenements_results;

        return $evenements_results;
    }
}
