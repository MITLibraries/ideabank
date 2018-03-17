<div class="<?php print $classes; ?>"<?php print $attributes; ?>>
  <?php if (!$label_hidden): ?>
    <div class="field-label"<?php print $title_attributes; ?>><?php print $label ?>:&nbsp;</div>
<?php endif; ?>
  <div class="field-items"<?php print $content_attributes; ?>>
      <?php foreach ($items as $delta => $item): ?>
        <div class="field-item <?php print $delta % 2 ? 'odd' : 'even'; ?>"<?php print $item_attributes[$delta]; ?>><?php print render($item); ?>
        </div>
        <div class="published-at">
        <?php
        if (arg(0) == 'node' && is_numeric(arg(1))) {
            $nid = arg(1);
            $node = node_load($nid);
            echo date('F j, Y', $node->published_at);
        }
        ?>
        </div>
      <?php endforeach; ?>
  </div>
 </div>
