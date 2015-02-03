<?php

$families = array(
    array($site->fontStackOne()),
    array($site->fontStackTwo()),
    array($site->fontStackThree())
);

$family = array_rand($families); //here yoy get random first of array(green or red or yellow)

$fonts = explode(",", $families[$family][0]);

?>


<script src="//ajax.googleapis.com/ajax/libs/webfont/1.5.6/webfont.js"></script>

<script>

console.log(<?php echo '"' . $fonts[0]   . $fonts[1]   . '"' ?>);
WebFont.load({
    google: {
        families: [<?php echo $fonts[0] . ','. $fonts[1]  ?>]
    }
});
</script>

<style>
    .font--base,
    body {
        font-family:<?php echo $fonts[0] ?>;
    }

    .font--meta,
    .meta {
        font-family:<?php echo $fonts[1] ?>;
    }
</style>
