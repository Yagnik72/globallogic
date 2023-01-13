<?php

if (!is_admin()) {
    add_filter('wp_nav_menu_items', 'add_last_nav_item', 10, 2);
}

//nav country menu
function add_last_nav_item($items, $args) {

    $site_url = get_site_url();

    if ($site_url == "https://www.globallogic.com/latam") {
        $langname = "ESP";
    } elseif ($site_url == "https://www.globallogic.com/ua") {
        $langname = "UA";
    } elseif ($site_url == "https://www.globallogic.com/il") {
        $langname = "ENG";
    } elseif ($site_url == "https://www.globallogic.com/sk") {
        $langname = "SVK";
    } elseif ($site_url == "https://www.globallogic.com/pl") {
        $langname = "PL";
    } elseif ($site_url == "https://www.globallogic.com/hr") {
        $langname = "CRO";
    } elseif ($site_url == "https://www.globallogic.com/de") {
        $langname = "DE";
    } else {
        $langname = "ENG";
    }

    if ($args->theme_location == 'primary' || $args->menu == 'Latest-menu') {
        $items .= '<li class="nav-item dropdown loactionmenu"> 
        <a class="nav-item nav-link country-selector" href="#">
        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="523.7 350.7 100 100" style="enable-background:new 523.7 350.7 100 100;" xml:space="preserve">
        <g>
        <g>
        <path class="st0" d="M573.7,350.7c-27.6,0-50,22.4-50,50c0,27.6,22.4,50,50,50s50-22.4,50-50C623.7,373.1,601.3,350.7,573.7,350.7
        z M573.7,446.5c-25.3,0-45.8-20.5-45.8-45.8c0-25.3,20.5-45.8,45.8-45.8s45.8,20.5,45.8,45.8C619.5,425.9,598.9,446.5,573.7,446.5
        z"></path>
        <path class="st0" d="M552.5,388.6h-10.3c-1,2.6-1.7,5.5-2,8.4h11.5C551.7,394.1,552,391.3,552.5,388.6z"></path>
        <path class="st0" d="M546.1,381.3h8c0.9-3.1,2-6.1,3.3-8.7c0.3-0.7,0.7-1.3,1.1-2C553.5,373.1,549.3,376.8,546.1,381.3z"></path>
        <path class="st0" d="M594.9,412.7h10.3c1-2.6,1.7-5.5,2-8.4h-11.5C595.6,407.2,595.3,410,594.9,412.7z"></path>
        <path class="st0" d="M595.7,397h11.5c-0.3-2.9-1-5.7-2-8.4h-10.3C595.3,391.3,595.6,394.1,595.7,397z"></path>
        <path class="st0" d="M590,428.7c-0.3,0.7-0.7,1.3-1.1,2c4.9-2.5,9.1-6.2,12.3-10.7h-8C592.4,423.2,591.3,426.1,590,428.7z"></path>
        <path class="st0" d="M593.3,381.3h8c-3.2-4.5-7.4-8.1-12.3-10.7c0.4,0.6,0.7,1.3,1.1,2C591.3,375.2,592.4,378.1,593.3,381.3z"></path>
        <path class="st0" d="M554.1,420.1h-8c3.2,4.5,7.4,8.1,12.3,10.7c-0.4-0.6-0.7-1.3-1.1-2C556,426.1,554.9,423.2,554.1,420.1z"></path>
        <path class="st0" d="M551.6,404.3h-11.5c0.3,2.9,1,5.7,2,8.4h10.3C552,410,551.7,407.2,551.6,404.3z"></path>
        <path class="st0" d="M577.3,368.2v13.1h8.3C583.6,374.8,580.5,370.2,577.3,368.2z"></path>
        <path class="st0" d="M561.7,381.3h8.3v-13.1C566.8,370.2,563.8,374.8,561.7,381.3z"></path>
        <path class="st0" d="M559.9,412.7H570v-8.4h-11C559.1,407.3,559.4,410.1,559.9,412.7z"></path>
        <path class="st0" d="M559,397h11v-8.4h-10.1C559.4,391.2,559.1,394,559,397z"></path>
        <path class="st0" d="M577.3,388.6v8.4h11c-0.1-3-0.5-5.8-0.9-8.4H577.3z"></path>
        <path class="st0" d="M577.3,412.7h10.1c0.5-2.6,0.8-5.4,0.9-8.4h-11L577.3,412.7L577.3,412.7z"></path>
        <path class="st0" d="M570,433.2v-13.1h-8.3C563.8,426.5,566.8,431.1,570,433.2z"></path>
        <path class="st0" d="M577.3,433.2c3.2-2.1,6.2-6.7,8.3-13.1h-8.3V433.2z"></path>
        </g>
        </g>
        </svg>
        <span>
        <p class="my-0 sitename">' . $langname . '</p>
        </span>
        </a>
        <div class="dropdown-menu nav-country-selector-options country-dropdown" id="service" aria-labelledby="Preview1">
        <div class="container" style="flex-direction:column;">
        <div class="triangle-up" id="srv-tip"></div> 
        <a href="https://www.globallogic.com/" class="dropdown-item " target="_blank">
        <span>Global </span> /  English
        </a>
        <a href="https://www.globallogic.com/hr/" class="dropdown-item " target="_blank">
        <span>Croatia </span> /  Croatian
        </a>
        <a href="https://www.globallogic.com/de/" class="dropdown-item " target="_blank">
        <span>Germany </span> /  Deutsch
        </a>
        <a href="https://www.globallogic.com/in/" class="dropdown-item " target="_blank">
        <span>India </span> /  English
        </a>
        <a href="https://www.globallogic.com/il/" class="dropdown-item " target="_blank">
        <span>Israel </span> /  English
        </a>
        <a href="https://www.globallogic.com/jp/" class="dropdown-item " target="_blank">
        <span>Japan </span> /  日本語
        </a>
        <a href="https://www.globallogic.com/latam/" class="dropdown-item " target="_blank">
        <span>Latam </span> /  Español
        </a>
        <a href="https://www.globallogic.com/se/" class="dropdown-item " target="_blank">
        <span>Nordic </span> /  English </a>
        <a href="https://www.globallogic.com/pl/" class="dropdown-item " target="_blank">
        <span>Poland </span> /  Polski
        </a>
        <a href="https://www.globallogic.com/sk/" class="dropdown-item " target="_blank">
        <span>Slovakia </span> /  Slovensko
        </a>
        <a href="https://www.globallogic.com/ua/" class="dropdown-item " target="_blank">
        <span>Ukraine </span> /  Українська </a>
        <a href="https://www.globallogic.com/uk/" class="dropdown-item " target="_blank">
        <span>United Kingdom  </span> /  English </a>
        </div></div>
        </li>';
    }
    return $items;
}
