<?php

return [
    'users' => array('user', 'seller', 'vendor', 'admin'), // Never change the order,
    'categories' => array(
        'Computers' => array(
            'Dell'
        ),
        'Electronic Devices' => array(
            'Smart Phones',
            'Feature Phones',
            'Tablets',
            'Landline Phones',
            'Laptops',
            'Desktops',
            'Smart Watches',
            'Gaming Consoles',
            'Cameras & Drones',
            'Security Cameras',
            'Insurance & Protection',
            'Renewed'
        ),
        'Electronic Accessories' => array(
            'Mobile Accessories',
            'Headphones & Headsets',
            'Wearable',
            'Camera Accessories',
            'Computer Accessories',
            'Storage',
            'Printers',
            'Computer Components',
            'Network Components',
            'Portable Speakers'
        ),
        'TV & Home Appliances' => array(
            'LED Televisions',
            'Smart Televisions',
            'Home Audio',
            'TV Accessories',
            'Home Audio & Theater',
            'Kitchen Appliances',
            'Small Kitchen Appliances',
            'Cooling & Heating',
            'Irons & Garment Care',
            'Vacuums & Floor Care',
            'Generator & Portable Power',
            'Washers & Dryers'
        ),
        'Health & Beauty' => array(
            'Bath & Body',
            'Beauty Tools',
            'Fragrances',
            'Hair Care',
            'Makeup',
            'Personal Care',
            'Skin Care',
            'Medical Supplies'
        ),
    ),
    'brands' => array(
        'Apple',
        'Google',
        'Microsoft',
        'Toyota',
        'IBM',
        'Samsung',
        'Amazon',
        'Mercedes-Benz',
        'BMW',
        'Intel',
        'Nike',
        'Honda'
    ),
    'seller_tiers' => array(
        'tier_free'     => 10,
        'tier_two'      => 20,
        'tier_three'    => 50
    )
];
