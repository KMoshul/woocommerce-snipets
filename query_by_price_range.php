function generate_price_meta_query($min_price, $max_price){
    return array(
        'relation' => 'OR',
        array(
            array(
                'key' => '_sale_price',
                'value' => array($min_price, $max_price),
                'compare' => 'BETWEEN',
                'type' => 'DECIMAL'
                )
            ),
        array(
            'relation' => 'AND',
                array(
                    'key' => '_sale_price',
                    'value' => 0,
                    'compare' => '=',
                    'type' => 'DECIMAL'
                ),
                array(
                    'key' => '_price',
                    'value' => array($min_price, $max_price),
                    'compare' => 'BETWEEN',
                    'type' => 'DECIMAL'
                )
            )
    );
}