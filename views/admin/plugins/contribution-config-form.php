<?php $isOmekaBefore26 = version_compare(OMEKA_VERSION, '2.6', '<'); ?>
<?php if ($isOmekaBefore26): ?>

<?php echo js_tag('vendor/tiny_mce/tiny_mce'); ?>
<script type="text/javascript">
jQuery(window).load(function () {
    Omeka.wysiwyg({
        mode: 'specific_textareas',
        editor_selector: 'html-editor'
    });
});
</script>

<?php else: ?>

<?php echo js_tag('vendor/tinymce/tinymce.min'); ?>
<script type="text/javascript">
jQuery(document).ready(function () {
    Omeka.wysiwyg({
        selector: '.html-editor'
    });
});
</script>

<?php endif; ?>

<?php
// In config, the submit form is set apart.
$elements = $form->getElements();
foreach( $elements as $element) {
    echo $element;
}
?>
