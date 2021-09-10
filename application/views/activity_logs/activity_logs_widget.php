<style type="text/css">
    
.label-light{
    background-color: #dde6e9;
    color: #4E5E6A;
}
.label {
    display: inline;
    padding: .3em .6em;
    font-size: 75%;
    font-weight: 700;
    line-height: 1;
    color: #fff;
    text-align: center;
    white-space: nowrap;
    vertical-align: baseline;
    border-radius: .25em;
}


.label-default {
    background-color: #777
}

.label-default[href]:focus,
.label-default[href]:hover {
    background-color: #5e5e5e
}

.label-primary {
    background-color: #337ab7
}

.label-primary[href]:focus,
.label-primary[href]:hover {
    background-color: #286090
}

.label-success {
    background-color: #04BE5B
}

.label-success[href]:focus,
.label-success[href]:hover {
    background-color: #449d44
}

.label-info {
    background-color: #5bc0de
}

.label-info[href]:focus,
.label-info[href]:hover {
    background-color: #31b0d5
}

.label-warning {
    background-color: #f0ad4e
}

.label-warning[href]:focus,
.label-warning[href]:hover {
    background-color: #ec971f
}

.label-danger {
    background-color: #d9534f
}

.label-danger[href]:focus,
.label-danger[href]:hover {
    background-color: #c9302c
}
</style>
<?php foreach ($activity_logs as $log) { ?>
    <div class="media b-b mb15">
        <div class="media-body">
            <div class="media-heading">
                <?php
                    echo $log->created_by_user
                ?>
                <small><span class="text-off"><?php echo format_to_relative_time($log->created_at); ?></span></small>
            </div>
            <p>
                <?php
                $label_class = 'default';
                if ($log->action === "created") {
                    $label_class = "success";
                    $log->action = "added";
                } else if ($log->action === "updated") {
                    $label_class = "warning";
                } else if ($log->action === "deleted") {
                    $label_class = "danger";
                }
                ?>
                <span class="label label-<?php echo $label_class; ?>"><?php echo $this->lang->line($log->action); ?></span>
                <span><?php
                    $type_id = "";
                    if ($log->log_type === "task") {
                        $type_id = " #" . $log->log_type_id . " - ";
                    }
                    echo $log->log_type . " : " . $type_id . nl2br($log->log_type_title);
                    ?></span>
                <?php
                if ($log->action === "updated" && $log->changes !== "") {
                    $changes = unserialize($log->changes);
                    echo "<ul>";
                    foreach ($changes as $field => $value) {
                        if($field != 'password'){
                        ?>
                    <li><?php echo get_change_logs($log->log_type, $field, $value); ?></li>
                    <?php
                    }
                } echo "</ul>";
            }
            ?>
            </p>
            <?php if ($log->log_for2 && $log->log_for2 != "customer_feedback") { ?>
                <p> <?php echo $log->log_for2 . ": #" . $log->log_for_id2; ?></p>
            <?php } ?>

            <?php if (isset($log->log_for_title)) { ?>
                <p> <?php echo $log->log_for . ": " . anchor("projects/view/" . $log->log_for_id, $log->log_for_title, array("class" => "dark")); ?></p>
            <?php } ?>
        </div>
    </div>
    <?php
}
$next_container_id = "loadproject" . $next_page_offset;
