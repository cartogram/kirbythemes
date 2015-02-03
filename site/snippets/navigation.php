<?php
echo '<nav role="navigation">';

    echo '<ul>';

    foreach($pages->visible() as $p):

        echo '<li>';

        echo '<a href="/' . $p->slug() . '">' . $p->title()->html() . '</a>';

        if($p->hasVisibleChildren()):

            echo '<ul>';

            foreach($p->children()->visible() as $p):

                echo '<li>';

                    echo '<a href="' . $p->url() . '">' . $p->title()->html() . '</a>';

                echo '</li>';

            endforeach;

            echo '</ul>';

        endif;

        echo '</li>';

    endforeach;

    echo '</ul>';

echo '</nav>';

?>
