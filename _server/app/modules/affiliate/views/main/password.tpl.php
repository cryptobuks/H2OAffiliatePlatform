<?php defined('H2O') or exit('Access denied') ?>

<?php include 'navigation.inc.tpl.php' ?>

<div class="form_container">
    <?php H2O\PasswordForm::display(PasswordForm::Affiliate) ?>
</div>