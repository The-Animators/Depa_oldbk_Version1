<?php

/**
 * dynamically generate the activity logs for projects
 *
 * @param string $log_type
 * @param string $field
 * @param string $value
 * @return html
 */
if (!function_exists('get_change_logs')) {

    function get_change_logs($log_type, $field, $value) {
        $log_type = $log_type;
        $from_value = $value['from'];
        $to_value = $value['to'];
        $changes = "";

        $ci = get_instance();
        $ci->load->model('users_model');
        $model_schema = array();
        if ($log_type === "task") {
            $model_schema = $ci->Tasks_model->schema();
        } else if ($log_type === "milestone") {
            $model_schema = $ci->Milestones_model->schema();
        } else if ($log_type === "project_comment") {
            $model_schema = $ci->Project_comments_model->schema();
        } else if ($log_type === "project_file") {
            $model_schema = $ci->Project_files_model->schema();
        } else if ($log_type === "file_comment") {
            $model_schema = $ci->Project_comments_model->schema();
        } else if ($log_type === "task_comment") {
            $model_schema = $ci->Project_comments_model->schema();
        }else if ($log_type === "users") {
            $model_schema = $ci->users_model->schema();
        }
        $schema_info = get_array_value($model_schema, $field);
        if ($schema_info) {
            //prepare change value
            if (get_array_value($schema_info, "type") === "int") {
                $changes = "<del>" . $from_value . "</del> <ins>" . $to_value . "</ins>";
            } else if (get_array_value($schema_info, "type") === "text") {
                $from_value = mb_convert_encoding($from_value, 'HTML-ENTITIES', 'UTF-8');
                $to_value = mb_convert_encoding($to_value, 'HTML-ENTITIES', 'UTF-8');
                $opcodes = $ci->finediff->getDiffOpcodes($from_value, $to_value, FineDiff::$wordGranularity);
                $changes = nl2br($ci->finediff->renderDiffToHTMLFromOpcodes($from_value, $opcodes));
            } else if (get_array_value($schema_info, "type") === "foreign_key") {
                $linked_model = get_array_value($schema_info, "linked_model");
                if ($from_value && $linked_model) {
                    $info = $linked_model->get_one($from_value);
                    $label_fields = get_array_value($schema_info, "label_fields");
                    $from_value = "";
                    foreach ($label_fields as $field) {
                        if (isset($info->$field)) {
                            $from_value.= $info->$field . " ";
                        }
                    }
                }

                if ($to_value && $linked_model) {
                    $info = $linked_model->get_one($to_value);
                    $label_fields = get_array_value($schema_info, "label_fields");
                    $to_value = "";
                    foreach ($label_fields as $field) {
                        if (isset($info->$field)) {
                            $to_value.= $info->$field . " ";
                        }
                    }
                }

                $changes = "<del>" . $from_value . "</del> <ins>" . $to_value . "</ins>";
            } else if (get_array_value($schema_info, "type") === "language_key") {
                $changes = "<del>" . lang($from_value) . "</del> <ins>" . lang($to_value) . "</ins>";
            } else if (get_array_value($schema_info, "type") === "date") {
                $changes = "<del>" . $from_value . "</del> <ins>" . $to_value . "</ins>";
            } else if (get_array_value($schema_info, "type") === "time") {
                $changes = "<del>" . $from_value . "</del> <ins>" . $to_value . "</ins>";
            } else if (get_array_value($schema_info, "type") === "date_time") {
                $changes = "<del>" . $from_value . "</del> <ins>" . $to_value . "</ins>";
            } else {
                $changes = "<del>" . $from_value . "</del> <ins>" . $to_value . "</ins>";
            }

            return get_array_value($schema_info, "label") . ": " . $changes;
        }
    }

}

if (!function_exists('activity_logs_widget')) {

    function activity_logs_widget($params = array(), $return_as_data = false) {
        $ci = get_instance();

        $limit = get_array_value($params, "limit");
        $limit = $limit ? $limit : "20";
        $offset = get_array_value($params, "offset");
        $offset = $offset ? $offset : "0";

        // $params["user_id"] = $ci->login_user->id;
        // $params["is_admin"] = $ci->login_user->is_admin;

        $logs = $ci->Activity_logs_model->get_details($params);

        // print_r($logs);exit;
        $view_data["activity_logs"] = $logs->result;
        $view_data["result_remaining"] = $logs->found_rows - $limit - $offset;
        $view_data["next_page_offset"] = $offset + $limit;
        $ci->load->view("activity_logs/activity_logs_widget", $view_data, $return_as_data);
    }

}