<div class="wrap">
    <h1>Test Plugin</h1>
    <?php settings_errors(); ?>
    <form action="options.php" method="post">
        <?php
        settings_fields('test_option_group');
        do_settings_sections('test_plugin');
        submit_button();
        ?>
    </form>
</div>