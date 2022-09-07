<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    public function run()
    {
        // Not published Articles
        Article::factory(5)
            ->create();

        // Published Articles
        Article::factory(2)
            ->publish()
            ->create();

        // Archived articles
        Article::factory(2)
            ->archive()
            ->create();

        // Typical article
        $code = '
            <pre>
                <code data-theme="olaolu-palenight" data-lang="php" class="torchlight" style="background-color: #292D3E; --theme-selection-background: #7580B850;" id="clipText-28">
                <!-- Syntax highlighted by torchlight.dev -->
                <div class="line">
                    <span style="color: #BEC5D4;">$user</span>
                    <span style="color: #BFC7D5;"> </span>
                    <span style="color: #C792EA;">=</span>
                    <span style="color: #BFC7D5;"> </span>
                    <span style="color: #FFCB8B;">User</span>
                    <span style="color: #89DDFF;">::</span>
                    <span style="color: #82AAFF;">factory</span>
                    <span style="color: #BFC7D5;">()</span>
                </div>
                <div class="line">
                    <span style="color: #BFC7D5;">            </span>
                    <span style="color: #89DDFF;">-&gt;</span>
                    <span style="color: #82AAFF;">hasAttached</span>
                    <span style="color: #BFC7D5;">(</span></div>
                    <div class="line">
                        <span style="color: #BFC7D5;">                </span>
                        <span style="color: #FFCB8B;">Role</span>
                        <span style="color: #89DDFF;">::</span>
                        <span style="color: #82AAFF;">factory</span>
                        <span style="color: #BFC7D5;">()</span>
                    </div><div class="line"><span style="color: #BFC7D5;">  </span>
                    <span style="color: #89DDFF;">-&gt;</span>
                    <span style="color: #82AAFF;">count</span>
                    <span style="color: #BFC7D5;">(</span>
                    <span style="color: #F78C6C;">3</span>
                    <span style="color: #BFC7D5;">)</span>
                    </div><div class="line"><span style="color: #BFC7D5;"></span>
                    <span style="color: #89DDFF;">-&gt;</span>
                    <span style="color: #82AAFF;">state</span>
                    <span style="color: #BFC7D5;">(</span>
                    <span style="color: #C792EA;">function</span>
                    <span style="color: #BFC7D5;"> </span>
                    <span style="color: #D9F5DD;">(</span>
                    <span style="color: #C792EA;">array</span>
                    <span style="color: #BFC7D5;"> </span>
                    <span style="color: #BEC5D4;">$attributes</span>
                    <span style="color: #BFC7D5;">, </span>
                    <span style="color: #FFCB8B;">User</span>
                    <span style="color: #BFC7D5;"> </span>
                    <span style="color: #BEC5D4;">$user</span>
                    <span style="color: #D9F5DD;">)</span>
                    <span style="color: #BFC7D5;"> {</span>
                </div>
                <div class="line">
                    <span style="color: #BFC7D5;"></span>
                    <span style="color: #C792EA;">return</span>
                    <span style="color: #BFC7D5;"> [</span>
                    <span style="color: #D9F5DD;">\'</span>
                    <span style="color: #C3E88D;">name</span>
                    <span style="color: #D9F5DD;">\'</span>
                    <span style="color: #BFC7D5;"> </span>
                    <span style="color: #89DDFF;">=&gt;</span>
                    <span style="color: #BFC7D5;"> </span>
                    <span style="color: #BEC5D4;">$user</span>
                    <span style="color: #89DDFF;">-&gt;name</span>
                    <span style="color: #89DDFF;">.</span>
                    <span style="color: #D9F5DD;">\'</span>
                    <span style="color: #C3E88D;"> Role</span>
                    <span style="color: #D9F5DD;">\'</span>
                    <span style="color: #BFC7D5;">];</span>
                </div>
                <div class="line">
                    <span style="color: #BFC7D5;">}),</span>
                </div>
                <div class="line">
                    <span style="color: #BFC7D5;">[</span>
                    <span style="color: #D9F5DD;">\'</span>
                    <span style="color: #C3E88D;">active</span>
                    <span style="color: #D9F5DD;">\'</span>
                    <span style="color: #BFC7D5;"> </span>
                    <span style="color: #89DDFF;">=&gt;</span>
                    <span style="color: #BFC7D5;"> </span>
                    <span style="color: #82AAFF;">true</span>
                    <span style="color: #BFC7D5;">]</span>
                </div>
                <div class="line">
                    <span style="color: #BFC7D5;">)</span>
                </div>
                <div class="line">
                    <span style="color: #BFC7D5;">            </span>
                    <span style="color: #89DDFF;">-&gt;</span>
                    <span style="color: #82AAFF;">create</span>
                    <span style="color: #BFC7D5;">();</span>
                </div>
            </code>
        </pre>
        ';
        $h2 = '<h2>Heading 2 - Introduction</h2>';
        $h3 = '<h3>Heading 3 - Introduction</h3>';
        $h4 = '<h4>Heading 4 - Introduction</h4>';
        $image = '<img src="/img/callouts/lightbulb.min.svg" class="opacity-75">';
        $paragraph = '
            <p>
                Sometimes you may wish to alternate the value of a given model attribute for each created model. You may accomplish this by defining a state transformation as a sequence. For example, you may wish to alternate the value of an <code>admin</code> column between <code>Y</code> and <code>N</code> for each created user:
            </p>';

        Article::factory()
            ->content($h2 . $code . $h2 . $image . $h3 . $paragraph . $h4 . $paragraph . $h2 . $paragraph)
            ->publish()
            ->create();
    }
}
