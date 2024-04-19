<?php
$menu = [
    [
        "nama" => "Beranda"
    ],
    [
        "nama" => "Berita",
        "subMenu" => [
            [
                "nama" => "Wisata",
                "subMenu" => [
                    [
                        "nama" => "Pantai"
                    ],
                    [
                        "nama" => "Gunung"
                    ]
                ]
            ],
            [
                "nama" => "Kuliner"
            ],
            [
                "nama" => "Hiburan"
            ]
        ]
    ],
    [
        "nama" => "Tentang"
    ],
    [
        "nama" => "Kontak"
    ],
];


// function tampilkanMenuBertingkat(array $menu){
//     echo "<ul>";
//     foreach ($menu as $key => $item){
//         echo "<li>{$item['nama']}</li>";
//     }
//     echo "</ul>";
// }
// tampilkanMenuBertingkat($menu);

function tampilkanMenuBertingkat(array $menu){
    echo "<ul>";
    foreach ($menu as $key => $item){
        echo "<li>{$item['nama']}";
        
        // Periksa apakah ada submenu dan apakah submenu tersebut adalah array
        if (isset($item['subMenu']) && is_array($item['subMenu'])) {
            // Panggil fungsi rekursif untuk menampilkan submenu
            tampilkanMenuBertingkat($item['subMenu']);
        }
        
        echo "</li>";
    }
    echo "</ul>";
}

tampilkanMenuBertingkat($menu);
?>