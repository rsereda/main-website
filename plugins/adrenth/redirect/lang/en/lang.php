<?php

return [
    'plugin' => [
        'name' => 'Redirect',
        'description' => 'Easily manage redirects',
    ],
    'permission' => [
        'access_redirects' => [
            'label' => 'Redirects',
            'tab' => 'Redirects',
        ],
    ],
    'navigation' => [
        'menu_label' => 'Redirects',
        'menu_description' => 'Manage redirects',
    ],
    'redirect' => [
        'redirect' => 'Redirect',
        'from_url' => 'Source Path',
        'from_url_placeholder' => '/source/path',
        'from_url_comment' => 'The source path to match.',
        'to_url' => 'Target Path or URL',
        'to_url_placeholder' => '/absolute/path, relative/path or http://target.url', // changed since 2.0.6
        'to_url_comment' => 'The target path or URL to redirect to.',
        'to_url_required_if' => 'The target path or URL is required',
        'cms_page_required_if' => 'Please provide a CMS Page to redirect to',
        'static_page_required_if' => 'Please provide a Static Page to redirect to',
        'match_type' => 'Match Type',
        'exact' => 'Exact',
        'placeholders' => 'Placeholders',
        'target_type' => 'Target Type',
        'target_type_path_or_url' => 'Path or URL',
        'target_type_cms_page' => 'CMS Page',
        'target_type_static_page' => 'Static Page',
        'status_code' => 'HTTP Status Code',
        'sort_order' => 'Sort Order',
        'requirements' => 'Requirements',
        'requirements_comment' => 'Provide requirements for each placeholder.',
        'placeholder' => 'Placeholder',
        'placeholder_comment' => 'The placeholder name (including curly braces) provided in the \'Source path\' field. '
            . 'E.g. {category} or {id}',
        'requirement' => 'Requirement',
        'requirement_comment' => 'Provide the requirement in regular expression syntax. E.g. [0-9]+ or [a-zA-Z]+.',
        'requirements_prompt' => 'Add new requirement',
        'replacement' => 'Replacement',
        'replacement_comment' => 'Provide an optional replacement value for this placeholder. '
            . 'The matched placeholder will be replaced with this value in the target URL.',
        'permanent' => '301 - Permanent',
        'temporary' => '302 - Temporary',
        'not_found' => '404 - Not Found',
        'enabled' => 'Enabled',
        'enabled_comment' => 'Flick this switch to enable this redirect.',
        'priority' => 'Priority',
        'hits' => 'Hits',
        'return_to_redirects' => 'Return to redirects list',
        'delete_confirm' => 'Are you sure?',
        'created_at' => 'Created at',
        'modified_at' => 'Modified at',
        'system_tip' => 'System generated redirect',
        'user_tip' => 'User generated redirect',
        'type' => 'Type',
        'last_used_at' => 'Last Used At',
        'and_delete_log_item' => 'And delete selected log items', // since 2.0.3
    ],
    'list' => [
        'no_records' => 'There are no redirects in this view.',
        'switch_is_enabled' => 'Enabled',
        'switch_system' => 'System Redirects',
    ],
    'scheduling' => [
        'from_date' => 'Available From',
        'from_date_comment' => 'The date on which this redirect will become active. Can be omitted.',
        'to_date' => 'Available Until',
        'to_date_comment' => 'The date until this redirect is active. Can be omitted.',
        'scheduling_comment' => 'Here you can provide a period on which this redirect will be available. '
            . 'All sorts of date combinations are possible.',
    ],
    'test' => [
        'test_comment' => 'Please test your redirect before saving the redirect.',
        'input_path' => 'Input Path',
        'input_path_comment' => 'The input path to test. E.g. /old-blog/category/123',
        'input_path_placeholder' => '/input/path',
        'test_date' => 'Test Date',
        'test_date_comment' => 'If you scheduled this redirect, you can test this redirect on a certain date.',
        'testing' => 'Testing...',
        'run_test' => 'Run Test',
        'no_match_label' => 'Sorry, no match!',
        'no_match' => 'No match found!',
        'match_success_label' => 'We have a match!',
    ],
    'title' => [
        'import' => 'Import',
        'export' => 'Export',
        'redirects' => 'Manage redirects',
        'create_redirect' => 'Create redirect',
        'edit_redirect' => 'Edit redirect',
    ],
    'buttons' => [
        'add' => 'Add', // since 2.0.3
        'from_request_log' => 'From Request log', // since 2.0.3
        'new_redirect' => 'New redirect', // changed since 2.0.3
        'create_redirects' => 'Create redirects', // since 2.0.3
        'delete' => 'Delete',
        'enable' => 'Enable',
        'disable' => 'Disable',
        'reorder_redirects' => 'Reorder',
        'export' => 'Export',
        'import' => 'Import',
    ],
    'tab' => [
        'tab_general' => 'General',
        'tab_requirements' => 'Requirements',
        'tab_test' => 'Test',
        'tab_scheduling' => 'Scheduling',
    ],
    'flash' => [
        'success_created_redirects' => 'Successfully created :count redirects', // since 2.0.3
    ],
];