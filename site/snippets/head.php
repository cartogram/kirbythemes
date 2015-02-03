<?php

echo '<!DOCTYPE html>';

echo '<html lang="en">';

echo '<head>';

echo '<meta charset="utf-8" />';

echo '<meta name="viewport" content="width=device-width,initial-scale=1.0">';


echo '<link rel="apple-touch-icon" sizes="57x57" href="/apple-touch-icon-57x57.png" />';
echo '<link rel="apple-touch-icon" sizes="114x114" href="/apple-touch-icon-114x114.png" />';
echo '<link rel="apple-touch-icon" sizes="72x72" href="/apple-touch-icon-72x72.png" />';
echo '<link rel="apple-touch-icon" sizes="144x144" href="/apple-touch-icon-144x144.png" />';
echo '<link rel="apple-touch-icon" sizes="60x60" href="/apple-touch-icon-60x60.png" />';
echo '<link rel="apple-touch-icon" sizes="120x120" href="/apple-touch-icon-120x120.png" />';
echo '<link rel="apple-touch-icon" sizes="76x76" href="/apple-touch-icon-76x76.png" />';
echo '<link rel="apple-touch-icon" sizes="152x152" href="/apple-touch-icon-152x152.png" />';
echo '<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon-180x180.png" />';
echo '<link rel="icon" type="image/png" href="/favicon-192x192.png" sizes="192x192" />';
echo '<link rel="icon" type="image/png" href="/favicon-160x160.png" sizes="160x160" />';
echo '<link rel="icon" type="image/png" href="/favicon-96x96.png" sizes="96x96" />';
echo '<link rel="icon" type="image/png" href="/favicon-16x16.png" sizes="16x16" />';
echo '<link rel="icon" type="image/png" href="/favicon-32x32.png" sizes="32x32" />';
echo '<meta name="msapplication-TileColor" content="#000000" />';
echo '<meta name="msapplication-TileImage" content="/mstile-144x144.png" />';

echo '<title>' . $site->title()->html() . '</title>';

echo '<meta name="description" content="' . $site->description()->html() . '">';

echo '<meta name="keywords" content="' . $site->keywords()->html() . '">';

echo css('assets/styles/style.css');

echo js('assets/scripts/modernizr.custom.js');

snippet('fonts');

echo '</head>';

echo '<body ng-app="lw" class="template--{{pagename}} state--{{state}}" ng-class="{
    \'is-ready\' : isReady ,
    \'is-loading\' : isLoading,
    \'is-loaded\' : isLoaded
    }">';

?>
