<style>
    .side_active span {
        font-weight: 600;
    }
</style>
<?php $user_id = $_SESSION['user_id']; ?>

<aside class="sidebar sidebar-left">
    <div class="sidebar-content">
        <div class="aside-toolbar">
            <ul class="site-logo">
                <li>
                    <!-- START LOGO -->
                    <a href="#">
                        <div class="logo">
                            <svg id="logo" width="25" height="25" viewBox="0 0 54.03 56.55">
                                <defs>
                                    <linearGradient id="logo_background_color">
                                        <stop class="stop1" offset="0%"/>
                                        <stop class="stop2" offset="50%"/>
                                        <stop class="stop3" offset="100%"/>
                                    </linearGradient>
                                </defs>
                                <path id="logo_path" class="cls-2"
                                      d="M90.32,0c14.2-.28,22.78,7.91,26.56,18.24a39.17,39.17,0,0,1,1,4.17l.13,1.5A15.25,15.25,0,0,1,118.1,29v.72l-.51,3.13a30.47,30.47,0,0,1-3.33,8,15.29,15.29,0,0,1-2.5,3.52l.06.07c.57.88,1.43,1.58,2,2.41,1.1,1.49,2.36,2.81,3.46,4.3.41.55,1,1,1.41,1.56.68.92,1.16,1.89.32,3.06-.08.12-.08.24-.19.33a2.39,2.39,0,0,1-2.62.07,4.09,4.09,0,0,1-.7-.91c-.63-.85-1.41-1.61-2-2.48-1-1.42-2.33-2.67-3.39-4.1a16.77,16.77,0,0,1-1.15-1.37c-.11,0-.06,0-.13.07-.41.14-.65.55-1,.78-.72.54-1.49,1.08-2.24,1.56A29.5,29.5,0,0,1,97.81,53c-.83.24-1.6.18-2.5.39a16.68,16.68,0,0,1-3.65.26H90.58L88,53.36A36.87,36.87,0,0,1,82.71,52a27.15,27.15,0,0,1-15.1-14.66c-.47-1.1-.7-2.17-1.09-3.39-1-3-1.45-8.86-.51-12.38a29,29,0,0,1,2.56-7.36c3.56-6,7.41-9.77,14.08-12.57a34.92,34.92,0,0,1,4.8-1.3Zm.13,4.1c-.45.27-1.66.11-2.24.26a32.65,32.65,0,0,0-4.74,1.37A23,23,0,0,0,71,18.7,24,24,0,0,0,71.13,35c2.78,6.66,7.2,11.06,14.21,13.42,1.16.39,2.52.59,3.84.91l1.47.07a7.08,7.08,0,0,0,2.43,0H94c.89-.21,1.9-.28,2.75-.46V48.8A7.6,7.6,0,0,1,95.19,47c-.78-1-1.83-1.92-2.62-3s-1.86-1.84-2.62-2.87c-2-2.7-4.45-5.1-6.66-7.62-.57-.66-1.14-1.32-1.66-2-.22-.29-.59-.51-.77-.85a2.26,2.26,0,0,1,.58-2.61,2.39,2.39,0,0,1,2.24-.2,4.7,4.7,0,0,1,1.22,1.3l.51.46c.5.68,1,1.32,1.6,2,2.07,2.37,4.38,4.62,6.27,7.17.94,1.26,2.19,2.3,3.14,3.58l1,1c.82,1.1,1.8,2,2.62,3.13.26.35.65.6.9,1A23.06,23.06,0,0,0,105,45c.37-.27,1-.51,1.15-1h-.06c-.18-.51-.73-.83-1-1.24-.74-1-1.64-1.88-2.37-2.87-1.8-2.44-3.89-4.6-5.7-7-.61-.82-1.44-1.52-2-2.34-.85-1.16-3.82-3.73-1.54-5.41a2.27,2.27,0,0,1,1.86-.26c.9.37,2.33,2.43,2.94,3.26s1.27,1.31,1.79,2c1.44,1.95,3.11,3.66,4.54,5.6.41.55,1,1,1.41,1.56.66.89,1.46,1.66,2.11,2.54.29.39.61,1.06,1.09,1.24.54-1,1.34-1.84,1.92-2.8a25.69,25.69,0,0,0,2.5-6.32c1.27-4.51.32-10.37-1.15-13.81A22.48,22.48,0,0,0,100.75,5.94a35.12,35.12,0,0,0-6.08-1.69A20.59,20.59,0,0,0,90.45,4.11Z"
                                      transform="translate(-65.5)" fill="url(#logo_background_color)"/>
                            </svg>
                        </div>
                        <span class="brand-text">AHPC</span>
                    </a>
                    <!-- END LOGO -->
                </li>
            </ul>
            <ul class="header-controls">
                <li class="nav-item">
                    <button type="button" class="btn btn-link btn-menu" data-toggle-state="mini-sidebar">
                        <i class="zmdi zmdi-album zmdi-hc-fw"></i>
                    </button>
                </li>
            </ul>
        </div>
        <nav class="main-menu">
            <ul class="nav metismenu">
                <li class="sidebar-header"><span>MAIN</span></li>
                <li class="<?php echo(
                $_SERVER['PHP_SELF'] == "/index.php"
                    ? "side_active" : ""); ?>">
                    <a href="index.php" aria-expanded="false">
                        <i class="icon dripicons-meter"></i><span>Home</span></a>
                </li>
                <?php
                //CONFIGURATION
                $query = $mysqli->query("select * from permission where user_id = '$user_id' 
                              AND (permission = 'Configuration' OR permission = 'All Permissions')");
                $count = mysqli_num_rows($query);
                if ($count == '1') { ?>
                    <li class="nav-dropdown <?php echo(
                    $_SERVER['PHP_SELF'] == "/date_config.php" ||
                    $_SERVER['PHP_SELF'] == "/pin_config.php"
                        ? "active" : ""); ?>">
                        <a class="has-arrow" href="#" aria-expanded="false"><i
                                    class="icon dripicons-gear"></i><span>Configuration</span></a>
                        <ul class="collapse nav-sub" aria-expanded="false">
                            <li class="<?php echo(
                            $_SERVER['PHP_SELF'] == "/date_config.php"
                                ? "side_active" : ""); ?>"><a
                                        href="date_config.php"><span>Date Configuration</span></a>
                            </li>
                            <li class="<?php echo(
                            $_SERVER['PHP_SELF'] == "/pin_config.php"
                                ? "side_active" : ""); ?>"><a
                                        href="pin_config.php"><span>Pin Configuration</span></a>
                            </li>
                        </ul>
                    </li>
                <?php }
                //PROVISIONAL REGISTRATION
                $query = $mysqli->query("select * from permission where user_id = '$user_id' 
                              AND (permission = 'Provisional Registration' OR permission = 'All Permissions')");
                $count = mysqli_num_rows($query);
                if ($count == '1') {
                    ?>
                    <li class="nav-dropdown <?php echo(
                    $_SERVER['PHP_SELF'] == "/provisional_registration.php" ||
                    $_SERVER['PHP_SELF'] == "/provisional_details.php" ||
                    $_SERVER['PHP_SELF'] == "/pending_provisional_mis.php" ||
                    $_SERVER['PHP_SELF'] == "/approved_provisional_mis.php" ||
                    $_SERVER['PHP_SELF'] == "/rejected_provisional_mis.php" ||
                    $_SERVER['PHP_SELF'] == "/pending_provisional_super.php" ||
                    $_SERVER['PHP_SELF'] == "/approved_provisional_super.php" ||
                    $_SERVER['PHP_SELF'] == "/rejected_provisional_super.php" ||
                    $_SERVER['PHP_SELF'] == "/approved_provisional_registration.php" ||
                    $_SERVER['PHP_SELF'] == "/rejected_provisional_regis--tration.php" ||
                    $_SERVER['PHP_SELF'] == "/provisional_approval_status.php" ||
                    $_SERVER['PHP_SELF'] == "/provisional_upgrade.php" ||
                    $_SERVER['PHP_SELF'] == "/provisional_pin_update.php" ||
                    $_SERVER['PHP_SELF'] == "/provisional_search.php" ||
                    $_SERVER['PHP_SELF'] == "/provisional_export.php" ||
                    $_SERVER['PHP_SELF'] == "/provisional_exception.php"
                        ? "active" : ""); ?>">
                        <a class="has-arrow" href="#" aria-expanded="false"><i
                                    class="icon dripicons-user-group"></i><span>Provisional Reg.</span></a>
                        <ul class="collapse nav-sub" aria-expanded="false">
                            <li class="<?php echo(
                            $_SERVER['PHP_SELF'] == "/provisional_registration.php"
                                ? "side_active" : ""); ?>"><a
                                        href="provisional_registration.php"><span>All Registrations</span></a>
                            </li>
                            <li class="<?php echo(
                            $_SERVER['PHP_SELF'] == "/provisional_export.php"
                                ? "side_active" : ""); ?>"><a
                                        href="provisional_export.php"><span>Export Data</span></a>
                            </li>
                            <li class="<?php echo(
                            $_SERVER['PHP_SELF'] == "/provisional_pin_update.php"
                                ? "side_active" : ""); ?>"><a
                                        href="provisional_pin_update.php"><span>Regenerate Pin</span></a>
                            </li>
                            <li class="<?php echo(
                            $_SERVER['PHP_SELF'] == "/provisional_exception.php"
                                ? "side_active" : ""); ?>"><a href="provisional_exception.php"><span>Special Cases</span></a>
                            </li>
                            <li class="nav-dropdown <?php echo(
                            $_SERVER['PHP_SELF'] == "/pending_provisional_mis.php" ||
                            $_SERVER['PHP_SELF'] == "/pending_provisional_super.php"
                                ? "active" : ""); ?>">
                                <a class="has-arrow" href="#" aria-expanded="false">
                                    Pending Applications
                                </a>
                                <ul class="collapse nav-sub" aria-expanded="false">
                                    <li class="<?php echo(
                                    $_SERVER['PHP_SELF'] == "/pending_provisional_mis.php"
                                        ? "side_active" : ""); ?>"><a
                                                href="pending_provisional_mis.php">
                                            <span>MIS Admin</span></a>
                                    </li>
                                    <li class="<?php echo(
                                    $_SERVER['PHP_SELF'] == "/pending_provisional_super.php"
                                        ? "side_active" : ""); ?>"><a
                                                href="pending_provisional_super.php">
                                            <span>Super Admin</span></a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-dropdown <?php echo(
                            $_SERVER['PHP_SELF'] == "/approved_provisional_mis.php" ||
                            $_SERVER['PHP_SELF'] == "/approved_provisional_super.php"
                                ? "active" : ""); ?>">
                                <a class="has-arrow" href="#" aria-expanded="false">
                                    Approved Applications
                                </a>
                                <ul class="collapse nav-sub" aria-expanded="false">
                                    <li class="<?php echo(
                                    $_SERVER['PHP_SELF'] == "/approved_provisional_mis.php"
                                        ? "side_active" : ""); ?>"><a
                                                href="approved_provisional_mis.php">
                                            <span>MIS Admin</span></a>
                                    </li>
                                    <li class="<?php echo(
                                    $_SERVER['PHP_SELF'] == "/approved_provisional_super.php"
                                        ? "side_active" : ""); ?>"><a
                                                href="approved_provisional_super.php">
                                            <span>Super Admin</span></a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-dropdown <?php echo(
                            $_SERVER['PHP_SELF'] == "/rejected_provisional_mis.php" ||
                            $_SERVER['PHP_SELF'] == "/rejected_provisional_super.php"
                                ? "active" : ""); ?>">
                                <a class="has-arrow" href="#" aria-expanded="false">
                                    Rejected Applications
                                </a>
                                <ul class="collapse nav-sub" aria-expanded="false">
                                    <li class="<?php echo(
                                    $_SERVER['PHP_SELF'] == "/rejected_provisional_mis.php"
                                        ? "side_active" : ""); ?>"><a
                                                href="rejected_provisional_mis.php">
                                            <span>MIS Admin</span></a>
                                    </li>
                                    <li class="<?php echo(
                                    $_SERVER['PHP_SELF'] == "/rejected_provisional_super.php"
                                        ? "side_active" : ""); ?>"><a
                                                href="rejected_provisional_super.php">
                                            <span>Super Admin</span></a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-dropdown <?php echo(
                            $_SERVER['PHP_SELF'] == "/provisional_upgrade.php" ||
                            $_SERVER['PHP_SELF'] == "/pending_provisional_upgrade.php" ||
                            $_SERVER['PHP_SELF'] == "/approved_provisional_upgrade.php" ||
                            $_SERVER['PHP_SELF'] == "/rejected_provisional_upgrade.php"
                                ? "active" : ""); ?>">
                                <a class="has-arrow" href="#" aria-expanded="false">
                                    Updates/Upgrades
                                </a>
                                <ul class="collapse nav-sub" aria-expanded="false">
                                    <li class="<?php echo(
                                    $_SERVER['PHP_SELF'] == "/provisional_upgrade.php"
                                        ? "side_active" : ""); ?>"><a
                                                href="provisional_upgrade.php">
                                            <span>All Applications</span></a>
                                    </li>
                                    <li class="<?php echo(
                                    $_SERVER['PHP_SELF'] == "/pending_provisional_upgrade.php"
                                        ? "side_active" : ""); ?>"><a
                                                href="pending_provisional_upgrade.php">
                                            <span>Pending</span></a>
                                    </li>
                                    <li class="<?php echo(
                                    $_SERVER['PHP_SELF'] == "/approved_provisional_upgrade.php"
                                        ? "side_active" : ""); ?>"><a
                                                href="pending_provisional_upgrade.php">
                                            <span>Approved</span></a>
                                    </li>
                                    <li class="<?php echo(
                                    $_SERVER['PHP_SELF'] == "/rejected_provisional_upgrade.php"
                                        ? "side_active" : ""); ?>"><a
                                                href="rejected_provisional_upgrade.php">
                                            <span>Rejected</span></a>
                                    </li>
                                </ul>
                            </li>
                            <li class="<?php echo(
                            $_SERVER['PHP_SELF'] == "/provisional_search.php"
                                ? "side_active" : ""); ?>"><a
                                        href="provisional_search.php"><span>Provisional Search</span></a>
                            </li>

                        </ul>
                    </li>
                <?php }

                //PERMANENT REGISTRATION
                $query = $mysqli->query("select * from permission where user_id = '$user_id' 
                              AND (permission = 'Permanent Registration' OR permission = 'All Permissions')");
                $count = mysqli_num_rows($query);
                if ($count == '1') {
                    ?>
                    <li class="nav-dropdown <?php echo(
                    $_SERVER['PHP_SELF'] == "/permanent_registration.php" ||
                    $_SERVER['PHP_SELF'] == "/permanent_exception.php" ||
                    $_SERVER['PHP_SELF'] == "/permanent_export.php" ||
                    $_SERVER['PHP_SELF'] == "/permanent_details.php" ||
                    $_SERVER['PHP_SELF'] == "/pending_permanent_mis.php" ||
                    $_SERVER['PHP_SELF'] == "/approved_permanent_mis.php" ||
                    $_SERVER['PHP_SELF'] == "/rejected_permanent_mis.php" ||
                    $_SERVER['PHP_SELF'] == "/pending_permanent_super.php" ||
                    $_SERVER['PHP_SELF'] == "/approved_permanent_super.php" ||
                    $_SERVER['PHP_SELF'] == "/rejected_permanent_super.php" ||
                    $_SERVER['PHP_SELF'] == "/permanent_search.php" ||
                    $_SERVER['PHP_SELF'] == "/permanent_approval_details.php" ||
                    $_SERVER['PHP_SELF'] == "/permanent_approval_status.php"||
                    $_SERVER['PHP_SELF'] == "/pin_update.php"
                        ? "active" : ""); ?>">
                        <a class="has-arrow" href="#" aria-expanded="false"><i
                                    class="icon dripicons-user-group"></i><span>Permanent Reg.</span></a>
                        <ul class="collapse nav-sub" aria-expanded="false">
                            <li class="<?php echo(
                            $_SERVER['PHP_SELF'] == "/permanent_registration.php"
                                ? "side_active" : ""); ?>"><a
                                        href="permanent_registration.php"><span>All Registrations</span></a>
                            </li>
                            <li class="<?php echo(
                            $_SERVER['PHP_SELF'] == "/permanent_export.php"
                                ? "side_active" : ""); ?>"><a
                                        href="permanent_export.php"><span>Export Data</span></a>
                            </li>
                            <li class="<?php echo(
                            $_SERVER['PHP_SELF'] == "/permanent_exception.php"
                                ? "side_active" : ""); ?>"><a
                                        href="permanent_exception.php"><span>Special Cases</span></a>
                            </li>
                            <li class="nav-dropdown <?php echo(
                            $_SERVER['PHP_SELF'] == "/pending_permanent_mis.php" ||
                            $_SERVER['PHP_SELF'] == "/pending_permanent_super.php"
                                ? "active" : ""); ?>">
                                <a class="has-arrow" href="#" aria-expanded="false">
                                    Pending Applications
                                </a>
                                <ul class="collapse nav-sub" aria-expanded="false">
                                    <li class="<?php echo(
                                    $_SERVER['PHP_SELF'] == "/pending_permanent_mis.php"
                                        ? "side_active" : ""); ?>"><a
                                                href="pending_permanent_mis.php">
                                            <span>MIS Admin</span></a>
                                    </li>
                                    <li class="<?php echo(
                                    $_SERVER['PHP_SELF'] == "/pending_permanent_super.php"
                                        ? "side_active" : ""); ?>"><a
                                                href="pending_permanent_super.php">
                                            <span>Super Admin</span></a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-dropdown <?php echo(
                            $_SERVER['PHP_SELF'] == "/approved_permanent_mis.php" ||
                            $_SERVER['PHP_SELF'] == "/approved_permanent_super.php"
                                ? "active" : ""); ?>">
                                <a class="has-arrow" href="#" aria-expanded="false">
                                    Approved Applications
                                </a>
                                <ul class="collapse nav-sub" aria-expanded="false">
                                    <li class="<?php echo(
                                    $_SERVER['PHP_SELF'] == "/approved_permanent_mis.php"
                                        ? "side_active" : ""); ?>"><a
                                                href="approved_permanent_mis.php">
                                            <span>MIS Admin</span></a>
                                    </li>
                                    <li class="<?php echo(
                                    $_SERVER['PHP_SELF'] == "/approved_permanent_super.php"
                                        ? "side_active" : ""); ?>"><a
                                                href="approved_permanent_super.php">
                                            <span>Super Admin</span></a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-dropdown <?php echo(
                            $_SERVER['PHP_SELF'] == "/rejected_permanent_mis.php" ||
                            $_SERVER['PHP_SELF'] == "/rejected_permanent_super.php"
                                ? "active" : ""); ?>">
                                <a class="has-arrow" href="#" aria-expanded="false">
                                    Rejected Applications
                                </a>
                                <ul class="collapse nav-sub" aria-expanded="false">
                                    <li class="<?php echo(
                                    $_SERVER['PHP_SELF'] == "/rejected_permanent_mis.php"
                                        ? "side_active" : ""); ?>"><a
                                                href="rejected_permanent_mis.php">
                                            <span>MIS Admin</span></a>
                                    </li>
                                    <li class="<?php echo(
                                    $_SERVER['PHP_SELF'] == "/rejected_permanent_super.php"
                                        ? "side_active" : ""); ?>"><a
                                                href="rejected_permanent_super.php">
                                            <span>Super Admin</span></a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-dropdown <?php echo(
                            $_SERVER['PHP_SELF'] == "/provisional_upgrade.php" ||
                            $_SERVER['PHP_SELF'] == "/pending_provisional_upgrade.php" ||
                            $_SERVER['PHP_SELF'] == "/approved_provisional_upgrade.php" ||
                            $_SERVER['PHP_SELF'] == "/rejected_provisional_upgrade.php"
                                ? "active" : ""); ?>">
                                <a class="has-arrow" href="#" aria-expanded="false">
                                    Updates/Upgrades
                                </a>
                                <ul class="collapse nav-sub" aria-expanded="false">
                                    <li class="<?php echo(
                                    $_SERVER['PHP_SELF'] == "/provisional_upgrade.php"
                                        ? "side_active" : ""); ?>"><a
                                                href="provisional_upgrade.php">
                                            <span>All Applications</span></a>
                                    </li>
                                    <li class="<?php echo(
                                    $_SERVER['PHP_SELF'] == "/pending_provisional_upgrade.php"
                                        ? "side_active" : ""); ?>"><a
                                                href="pending_provisional_upgrade.php">
                                            <span>Pending</span></a>
                                    </li>
                                    <li class="<?php echo(
                                    $_SERVER['PHP_SELF'] == "/approved_provisional_upgrade.php"
                                        ? "side_active" : ""); ?>"><a
                                                href="pending_provisional_upgrade.php">
                                            <span>Approved</span></a>
                                    </li>
                                    <li class="<?php echo(
                                    $_SERVER['PHP_SELF'] == "/rejected_provisional_upgrade.php"
                                        ? "side_active" : ""); ?>"><a
                                                href="rejected_provisional_upgrade.php">
                                            <span>Rejected</span></a>
                                    </li>
                                </ul>
                            </li>
                            <li class="<?php echo(
                            $_SERVER['PHP_SELF'] == "/permanent_search.php"
                                ? "side_active" : ""); ?>"><a href="permanent_search.php"><span>Permanent Search</span></a>
                            </li>
                            <li class="<?php echo(
                            $_SERVER['PHP_SELF'] == "/pin_update.php"
                                ? "side_active" : ""); ?>"><a href="pin_update.php"><span>Pin Update</span></a>
                            </li>
                        </ul>
                    </li>
                <?php }

                //PERMANENT RENEWAL (CPD)
                $query = $mysqli->query("select * from permission where user_id = '$user_id' 
                              AND (permission = 'Permanent Renewal (CPD)' OR permission = 'All Permissions')");
                $count = mysqli_num_rows($query);
                if ($count == '1') {
                    ?>
                    <li class="nav-dropdown <?php echo(
                    $_SERVER['PHP_SELF'] == "/cpd_registration.php" ||
                    $_SERVER['PHP_SELF'] == "/cpd_details.php" ||
                    $_SERVER['PHP_SELF'] == "/pending_cpd_registration.php" ||
                    $_SERVER['PHP_SELF'] == "/approved_cpd_registration.php" ||
                    $_SERVER['PHP_SELF'] == "/rejected_cpd_registration.php" ||
                    $_SERVER['PHP_SELF'] == "/cpd_search.php" ||
                    $_SERVER['PHP_SELF'] == "/cpd_approval_details.php" ||
                    $_SERVER['PHP_SELF'] == "/cpd_approval_status.php"
                        ? "active" : ""); ?>">
                        <a class="has-arrow" href="#" aria-expanded="false"><i
                                    class="icon dripicons-user-group"></i><span>CPD Reg.</span></a>
                        <ul class="collapse nav-sub" aria-expanded="false">
                            <li class="<?php echo(
                            $_SERVER['PHP_SELF'] == "/cpd_registration.php"
                                ? "side_active" : ""); ?>"><a
                                        href="cpd_registration.php"><span>All Registrations</span></a>
                            </li>
                            <li class="<?php echo(
                            $_SERVER['PHP_SELF'] == "/pending_cpd_registration.php"
                                ? "side_active" : ""); ?>"><a
                                        href="pending_cpd_registration.php"><span>Pending Applications</span></a>
                            </li>
                            <li class="<?php echo(
                            $_SERVER['PHP_SELF'] == "/approved_cpd_registration.php"
                                ? "side_active" : ""); ?>"><a href="approved_cpd_registration.php"><span>Approved Applications</span></a>
                            </li>
                            <li class="<?php echo(
                            $_SERVER['PHP_SELF'] == "/rejected_cpd_registration.php"
                                ? "side_active" : ""); ?>"><a href="rejected_cpd_registration.php"><span>Rejected Applications</span></a>
                            </li>
                            <li class="<?php echo(
                            $_SERVER['PHP_SELF'] == "/cpd_search.php"
                                ? "side_active" : ""); ?>"><a href="cpd_search.php"><span>CPD Search</span></a>
                            </li>
                        </ul>
                    </li>
                <?php }

                //TEMPORAL REGISTRATION
                $query = $mysqli->query("select * from permission where user_id = '$user_id' 
                              AND (permission = 'Temporal Registration' OR permission = 'All Permissions')");
                $count = mysqli_num_rows($query);
                if ($count == '1') {
                    ?>
                    <li class="nav-dropdown <?php echo(
                    $_SERVER['PHP_SELF'] == "/temporal_registration.php" ||
                    $_SERVER['PHP_SELF'] == "/temporal_details.php" ||
                    $_SERVER['PHP_SELF'] == "/pending_temporal_registration.php" ||
                    $_SERVER['PHP_SELF'] == "/approved_temporal_registration.php" ||
                    $_SERVER['PHP_SELF'] == "/rejected_temporal_registration.php" ||
                    $_SERVER['PHP_SELF'] == "/temporal_search.php" ||
                    $_SERVER['PHP_SELF'] == "/temporal_approval_details.php" ||
                    $_SERVER['PHP_SELF'] == "/temporal_approval_status.php"
                        ? "active" : ""); ?>">
                        <a class="has-arrow" href="#" aria-expanded="false"><i
                                    class="icon dripicons-user-group"></i><span>Temporal Reg.</span></a>
                        <ul class="collapse nav-sub" aria-expanded="false">
                            <li class="<?php echo(
                            $_SERVER['PHP_SELF'] == "/temporal_registration.php"
                                ? "side_active" : ""); ?>"><a
                                        href="temporal_registration.php"><span>All Registrations</span></a>
                            </li>
                            <li class="<?php echo(
                            $_SERVER['PHP_SELF'] == "/pending_temporal_registration.php"
                                ? "side_active" : ""); ?>"><a
                                        href="pending_temporal_registration.php"><span>Pending Applications</span></a>
                            </li>
                            <li class="<?php echo(
                            $_SERVER['PHP_SELF'] == "/approved_temporal_registration.php"
                                ? "side_active" : ""); ?>"><a href="approved_temporal_registration.php"><span>Approved Applications</span></a>
                            </li>
                            <li class="<?php echo(
                            $_SERVER['PHP_SELF'] == "/rejected_temporal_registration.php"
                                ? "side_active" : ""); ?>"><a href="rejected_temporal_registration.php"><span>Rejected Applications</span></a>
                            </li>
                            <li class="<?php echo(
                            $_SERVER['PHP_SELF'] == "/temporal_search.php"
                                ? "side_active" : ""); ?>"><a
                                        href="temporal_search.php"><span>Temporal Search</span></a>
                            </li>
                        </ul>
                    </li>
                <?php }

                //EXAMINATION REGISTRATION
                $query = $mysqli->query("select * from permission where user_id = '$user_id' 
                              AND (permission = 'Examination Registration' OR permission = 'All Permissions')");
                $count = mysqli_num_rows($query);
                if ($count == '1') {
                    ?>
                    <li class="nav-dropdown <?php echo(
                    $_SERVER['PHP_SELF'] == "/examination_registration.php" ||
                    $_SERVER['PHP_SELF'] == "/approved_examination_super.php" ||
                    $_SERVER['PHP_SELF'] == "/pending_examination_super.php" ||
                    $_SERVER['PHP_SELF'] == "/rejected_examination_super.php" ||
                    $_SERVER['PHP_SELF'] == "/examination_details.php" ||
                    $_SERVER['PHP_SELF'] == "/examination_exception.php" ||
                    $_SERVER['PHP_SELF'] == "/examreg_search.php" ||
                    $_SERVER['PHP_SELF'] == "/passed_examination_app.php" ||
                    $_SERVER['PHP_SELF'] == "/failed_examination_app.php" ||
                    $_SERVER['PHP_SELF'] == "/examination_results.php" ||
                    $_SERVER['PHP_SELF'] == "/examination_summary_data.php" ||
                    $_SERVER['PHP_SELF'] == "/examination_export.php" ||
                    $_SERVER['PHP_SELF'] == "/examination_search.php"
                        ? "active" : ""); ?>">
                        <a class="has-arrow" href="#" aria-expanded="false">
                            <i class="zmdi zmdi-assignment-o zmdi-hc-fw"></i><span>Examination Reg.</span></a>
                        <ul class="collapse nav-sub" aria-expanded="false">
                            <li class="<?php echo(
                            $_SERVER['PHP_SELF'] == "/examination_registration.php"
                                ? "side_active" : ""); ?>"><a
                                        href="examination_registration.php"><span>All Registrations</span></a>
                            </li>
                            <li class="<?php echo(
                            $_SERVER['PHP_SELF'] == "/examination_exception.php"
                                ? "side_active" : ""); ?>"><a href="examination_exception.php"><span>Special Cases</span></a>
                            </li>
                            <li class="<?php echo(
                            $_SERVER['PHP_SELF'] == "/examination_export.php"
                                ? "side_active" : ""); ?>"><a href="examination_export.php"><span>Examination Export</span></a>
                            </li>
                            <li class="<?php echo(
                            $_SERVER['PHP_SELF'] == "/examination_summary_data.php"
                                ? "side_active" : ""); ?>"><a href="examination_summary_data.php"><span>Exam Summary Data</span></a>
                            </li>
                            <li class="nav-dropdown <?php echo(
                            $_SERVER['PHP_SELF'] == "/pending_examination_super.php" ||
                            $_SERVER['PHP_SELF'] == "/approved_examination_super.php" ||
                            $_SERVER['PHP_SELF'] == "/rejected_examination_super.php"
                                ? "active" : ""); ?>">
                                <a class="has-arrow" href="#" aria-expanded="false">
                                    Applications
                                </a>
                                <ul class="collapse nav-sub" aria-expanded="false">
                                    <li class="<?php echo(
                                    $_SERVER['PHP_SELF'] == "/pending_examination_super.php"
                                        ? "side_active" : ""); ?>"><a
                                                href="pending_examination_super.php">
                                            <span>Pending Applications</span></a>
                                    </li>
                                    <li class="<?php echo(
                                    $_SERVER['PHP_SELF'] == "/approved_examination_super.php"
                                        ? "side_active" : ""); ?>"><a
                                                href="approved_examination_super.php">
                                            <span>Approved Applications</span></a>
                                    </li>
                                    <li class="<?php echo(
                                    $_SERVER['PHP_SELF'] == "/rejected_examination_super.php"
                                        ? "side_active" : ""); ?>"><a
                                                href="rejected_examination_super.php">
                                            <span>Rejected Applications</span></a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-dropdown <?php echo(
                            $_SERVER['PHP_SELF'] == "/passed_examination_app.php" ||
                            $_SERVER['PHP_SELF'] == "/failed_examination_app.php" ||
                            $_SERVER['PHP_SELF'] == "/examination_results.php"
                                ? "active" : ""); ?>">
                                <a class="has-arrow" href="#" aria-expanded="false">
                                    Examination Status
                                </a>
                                <ul class="collapse nav-sub" aria-expanded="false">
                                    <li class="<?php echo(
                                    $_SERVER['PHP_SELF'] == "/passed_examination_app.php"
                                        ? "side_active" : ""); ?>"><a
                                                href="passed_examination_app.php"><span>Passed Applicants</span></a>
                                    </li>
                                    <li class="<?php echo(
                                    $_SERVER['PHP_SELF'] == "/failed_examination_app.php"
                                        ? "side_active" : ""); ?>"><a href="failed_examination_app.php"><span>
                                    Failed Applicants</span></a>
                                    </li>
                                    <li class="<?php echo(
                                    $_SERVER['PHP_SELF'] == "/examination_results.php"
                                        ? "side_active" : ""); ?>"><a
                                                href="examination_results.php"><span>Results</span></a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-dropdown <?php echo(
                            $_SERVER['PHP_SELF'] == "/examination_search.php" ||
                            $_SERVER['PHP_SELF'] == "/examreg_search.php"
                                ? "active" : ""); ?>">
                                <a class="has-arrow" href="#" aria-expanded="false">
                                    Search
                                </a>
                                <ul class="collapse nav-sub" aria-expanded="false">
                                    <li class="<?php echo(
                                    $_SERVER['PHP_SELF'] == "/examination_search.php"
                                        ? "side_active" : ""); ?>"><a
                                                href="examination_search.php"><span>Results Search</span></a>
                                    </li>
                                    <li class="<?php echo(
                                    $_SERVER['PHP_SELF'] == "/examreg_search.php"
                                        ? "side_active" : ""); ?>"><a
                                                href="examreg_search.php"><span>Registration Search</span></a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                <?php } ?>
                <li class="nav-dropdown">
                    <a class="has-arrow" href="#" aria-expanded="false">
                        <i class="zmdi zmdi-search zmdi-hc-fw"></i><span>Search</span></a>
                    <ul class="collapse nav-sub" aria-expanded="false">
                        <li class="<?php echo(
                        $_SERVER['PHP_SELF'] == "/provisional_registration.php"
                            ? "side_active" : ""); ?>"><a href="#"><span>Applicant</span></a>
                        </li>
                        <li class="<?php echo(
                        $_SERVER['PHP_SELF'] == "/print_provisional_reg.php"
                            ? "side_active" : ""); ?>"><a href="#"><span>Applications</span></a>
                        </li>
                        <li class="<?php echo(
                        $_SERVER['PHP_SELF'] == "/provisional_approval_status.php"
                            ? "side_active" : ""); ?>"><a
                                    href="#"><span>Approval Status</span></a></li>
                    </ul>
                </li>
                <li class="nav-dropdown <?php echo(
                $_SERVER['PHP_SELF'] == "/add_user.php" ||
                $_SERVER['PHP_SELF'] == "/change_password.php"
                    ? "active" : ""); ?>">
                    <a class="has-arrow" href="#" aria-expanded="false"><i class="zmdi zmdi-male-female
                    zmdi-hc-fw"></i><span>Users</span></a>
                    <ul class="collapse nav-sub" aria-expanded="false">
                      <?php  $query = $mysqli->query("select * from permission where user_id = '$user_id'
                        AND (permission = 'Add User' OR permission = 'All Permissions')");
                        $count = mysqli_num_rows($query);
                        if ($count == '1') {
                        ?>
                        <li class="<?php echo(
                        $_SERVER['PHP_SELF'] == "/add_user.php"
                            ? "side_active" : ""); ?>"><a href="add_user.php"><span>Add User</span></a>
                        </li>
                        <?php
                        }
                        ?>
                        <li class="<?php echo(
                        $_SERVER['PHP_SELF'] == "/change_password.php"
                            ? "side_active" : ""); ?>"><a href="change_password.php"><span>Change Password</span></a>
                        </li>
                    </ul>
                </li>
                <li><a href="login.php?state=logout"><i class="icon icon-logout"></i><span>Log Out</span></a>
                </li>
            </ul>
        </nav>
    </div>
</aside>