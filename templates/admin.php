<div class="wrap">
    <h1>Test Plugin</h1>
    <?php settings_errors(); ?>

    <ul class="nav nav-tabs">
        <li class="active"><a href="#tab-1" id="tab-1">Manage Settings</a></li>
        <li><a href="#tab-2" id="tab-2">Updates</a></li>
        <li><a href="#tab-3" id="tab-3">About</a></li>
    </ul>

    <div class="tab-content">
        <div class="tab-pane active" id="tab-1">
            <form action="options.php" method="post">
                <?php
                settings_fields('test_option_group');
                do_settings_sections('test_plugin');
                submit_button();
                ?>
            </form>
        </div>
        <div class="tab-pane" id="tab-2">
            <h3>Updates</h3>
        </div>
        <div class="tab-pane" id="tab-3">
            <h4>About</h4>
        </div>
    </div>
</div>