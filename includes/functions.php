<?php 

function insert_data_inside_table( $args = [] ){
    global $wpdb;

    $defaults = [
        'name' => '',
        'email' => ''
    ];
    $data = wp_parse_args($args, $defaults);

    $wpdb->insert(
        "{$wpdb->prefix}we_crud_db",
        $data,
        [
            '%s',
            '%s'
        ]
    );
    return $wpdb->insert_id;
}

function we_get_infos( $args = [] ){
    global $wpdb;

    $defaults = [
        'number' => 15,
        'offset' => 0,
        'orderby' => 'id',
        'order' => 'ASC',
    ];

    $args = wp_parse_args($args, $defaults);

    $sql = $wpdb->prepare(
        "SELECT * FROM {$wpdb->prefix}we_crud_db
        ORDER BY {$args['orderby']} {$args['order']}
        LIMIT %d, %d",
        $args['offset'], $args['number']
    );
    $resutl = $wpdb->get_results($sql);

    return $resutl;
}
function we_info_count() {
    global $wpdb;

    return (int) $wpdb->get_var( "SELECT count(id) FROM {$wpdb->prefix}we_crud_db" );
}