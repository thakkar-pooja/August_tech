<?php

global $wpdb;

// SQL query to get the highest purchase amount for each customer
$query = "
    SELECT 
        c.cust_name AS CustomerName,
        MAX(o.purch_amt) AS HighestPurchaseAmount
    FROM 
        {$wpdb->prefix}customer c
    JOIN 
        {$wpdb->prefix}ord o ON c.customer_id = o.customer_id
    GROUP BY 
        c.cust_name
    ORDER BY 
        HighestPurchaseAmount DESC
";

// Execute the query
$results = $wpdb->get_results($query);

// Display the results
if ($results) {
    echo '<table>';
    echo '<tr><th>Customer Name</th><th>Highest Purchase Amount</th></tr>';
    foreach ($results as $row) {
        echo '<tr>';
        echo '<td>' . esc_html($row->CustomerName) . '</td>';
        echo '<td>' . esc_html($row->HighestPurchaseAmount) . '</td>';
        echo '</tr>';
    }
    echo '</table>';
} else {
    echo 'No results found.';
}


