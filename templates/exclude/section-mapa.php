<div id="wrap-mapa">
<?php
$i = 0;
$settings  = get_option( 'options_general');
$mapa      = $settings['option_fazendas'];
// print_r($mapa);
foreach ($mapa as $key => $map) {
    $i++;
    $endereco    = $map['endereco'];
    $cidade      = $map['cidade'];
    $latlong     = $map['lat_long'];
    $str_explode = explode(",",$latlong);
    $lat         = $str_explode[0];
    $long        = $str_explode[1];
    echo '<div class="item_mapa" data-id="'.$i.'" data-type="all" data-info="Agrícola Famosa"
    data-content="'.$endereco.'<br>'.$cidade.'"
    data-lat="'.$lat.'"
    data-long="'.$long.'"
    data-icone="'.get_template_directory_uri().'/assets/images/marker.png">
    </div>';
} ?>
</div>
<div id="map"></div>