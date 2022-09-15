<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    public function run()
    {
        // Not published Articles
        Article::factory(5)
            ->create();

        // Published Articles
        Article::factory(50)
            ->publish()
            ->create();

        // Archived articles
        Article::factory(2)
            ->archive()
            ->create();

        // Typical article
        $h2 = '<h2>Heading 2 - Introduction</h2>';
        $h3 = '<h3>Heading 3 - Introduction</h3>';
        $h4 = '<h4>Heading 4 - Introduction</h4>';
        $image = '<div class="img">
        <img src="/storage/assets/asset-1.jpg" alt="Article Image"/>
        <span>Lorem ipsum dolor sit amet,
          consectetur
          adipiscing elit.</span>
      </div>';
      $code = '
      <pre data-src="/storage/code/test.css"></pre>
            <pre data-src="/storage/code/test.php"></pre>
            <pre data-src="/storage/code/test.java"></pre>
            <pre data-src="/storage/code/test.html"></pre>
            <pre data-src="/storage/code/test.py"></pre>
            <pre data-src="/storage/code/test.js"></pre>
            <pre data-src="/storage/code/test.sql"></pre>';

        $paragraph = '
        <p>
        On sait depuis longtemps que travailler avec du
        texte lisible et contenant du sens est source de
        distractions, et empêche de se concentrer sur la
        mise en page elle-même. L\'avantage du Lorem Ipsum
        sur un texte générique comme \'Du texte. Du texte. Du
        texte.\' est qu\'il possède une distribution de
        lettres plus ou moins normale, et en tout cas
        comparable avec celle du français standard. De
        nombreuses suites logicielles de mise en page ou
        éditeurs de sites <mark>Web2</mark> ont fait du Lorem Ipsum leur
        faux texte par défaut, et une recherche pour \'Lorem
        Ipsum\' vous conduira vers de nombreux sites qui n\'en
        sont encore qu\'à leur phase de construction.
        Plusieurs versions sont apparues avec le temps,
        parfois par accident, souvent intentionnellement
        (histoire d\'
      </p>';

      $paragraph2 = '
      <p>Du
      texte.\' est qu\'il possède une distribution de
      lettres plus ou moins normale, et en tout cas
      comparable avec celle du français standard. De
      nombreuses suites logicielles de mise en page ou
      éditeurs de sites Web ont fait du Lorem Ipsum leur
      faux texte par défaut, et une recherche pour \'Lorem
      Ipsum\' vous conduira vers de nombreux sites qui n\'en
      sont encore qu\'à leur phase de construction.
      Plusieurs versions sont apparues avec le temps,
      parfois par accident,
      <a href="http://www.google.com" target="_blank">This is a link to
        google</a>
      (histoire d\'y rajouter de petits clins d\'oeil, voire
      des phrases embarassantes).</p>';

        Article::factory()
            ->content($h2 . $code . $h2 . $image . $h3 . $paragraph . $h4 . $paragraph2 . $h2 . $paragraph)
            ->title('What is ERC-20 in Blockchain technology?')
            ->publish()
            ->create();
    }
}





