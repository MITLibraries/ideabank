<div class="head-shot-holder clearfix">
<?php

    if (!empty($content['field_member_photo'][0])) {
        $img = array(
                    'path'      => $content['field_member_photo'][0]['#item']['uri'],
                    'alt'       => render($content['field_display_name']),
                    'attributes'=> array('class' => 'head-shot'),
                    );
        $img_output = theme('image', $img);

        echo $img_output;
    } else {
        echo '<img src="/sites/default/themes/ideabank/images/head-shot.png" alt="Placeholder head shot" class="head-shot">';
    }

    if (!empty($content['field_display_name'][0]) && !empty($content['field_url'][0])) {
        $attributes = array('target'=>'_blank');
        echo '<h2>' .
             l($content['field_display_name'][0]['#markup'],
               $content['field_url'][0]['#markup'],
               array('attributes' => $attributes, 'html' => TRUE))
              . '</h2>';

    } else if (!empty($content['field_display_name'][0])) {
        print '<h2>' . render($content['field_display_name']) . '</h2>';
    }

    print render($content['field_member_description']);

?>
</div>
