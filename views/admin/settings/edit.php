<?php
/**
 * @version $Id$
 * @license http://www.gnu.org/licenses/gpl-3.0.txt
 * @copyright Center for History and New Media, 2010
 * @package Contribution
 */

queue_js_file('contribution');
$isOmekaBefore26 = version_compare(OMEKA_VERSION, '2.6', '<');
if ($isOmekaBefore26):
    queue_js_file('tiny_mce', 'javascripts/vendor/tiny_mce');
else:
    queue_js_file('tinymce.min', 'javascripts/vendor/tinymce/');
endif;
queue_js_string('setUpSettingsWysiwyg();');
contribution_admin_header(array(__('Submission Settings')));
?>

<?php
echo $this->partial('contribution-navigation.php');
?>

<div id="primary">
    <?php echo flash(); ?>
    <form method="post">
        <section class="seven columns alpha">
            <?php
                // In config, the submit form is set apart.
                $elements = $form->getElements();
                foreach( $elements as $element) {
                    echo $element;
                }
            ?>
        </section>
        <section class="three columns omega">
            <div id="save" class="panel">
                <?php
                echo $this->formSubmit(
                    'submit', __('Save Changes'),
                    array('class' => 'submit big green button'));
                ?>
            </div>
        </section>
    </form>
</div>

<?php echo foot(); ?>
