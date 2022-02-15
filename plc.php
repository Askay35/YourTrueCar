<?php

function view($filePath, $variables = array())
{
    $output = NULL;
    if(file_exists($filePath)){
        extract($variables);

        ob_start();

        include $filePath;

        $output = ob_get_clean();
    }
    return $output;
}


if(count($_GET)<1){
    print view('index.php');
    exit(0);
}

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://plc.ua/auctions/?plc-ajax=plc-db-filters&'.http_build_query($_GET));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//curl_setopt($ch, CURLOPT_POST, 1);
//curl_setopt($ch, CURLOPT_POSTFIELDS, "hash=27ef304962");//1c60f04b37
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json, text/javascript, */*; q=0.01', 'Accept-Encoding: gzip, deflate, br', 'Accept-Language: ru-RU,ru;q=0.9,en-US;q=0.8,en;q=0.7,uk;q=0.6', 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.82 Safari/537.36', 'X-Requested-With: XMLHttpRequest',
    'Referer: https://plc.ua/auctions/?site=copart%2Ciaai%2Cimpact%2Cmanheim&make=audi&limit=30', 'Origin: https://plc.ua', 'sec-ch-ua: " Not A;Brand";v="99", "Chromium";v="98", "Google Chrome";v="98"', 'sec-ch-ua-mobile: ?0',
    'sec-ch-ua-platform: "Windows"', 'Sec-Fetch-Dest: empty', 'Sec-Fetch-Mode: cors', 'Sec-Fetch-Site: same-origin', 'Connection: keep-alive', 'Host: plc.ua'));
curl_setopt($ch, CURLOPT_ENCODING, 'UTF-8');

$rawResponse=curl_exec($ch);

$lots = [
    "success"=>true,
    "lots"=>[]
];

if(!$rawResponse){
    $lots['success'] = false;
    print view('index.php', ['lots'=>$lots]);
    exit(0);
}


$html = json_decode($rawResponse,1)['data']['content'];

//print $html;
//exit(0);

$doc = new DOMDocument;
@$doc->loadHTML('<?xml encoding="utf-8" ?>' .$html);


$lot_instock_class = 'plc-db__lot-item-instock';
$lot_outstock_class = 'plc-db__lot-item-outofstock';

$auto_title_xpath = ".//div[contains(@class, 'col-md-auto')]/a";
$date_xpath = ".//p[contains(@class, 'text-right')]";
$option_xpath = ".//div[contains(@class,'lot-item__attributes')]";
$cena_xpath = ".//span[contains(@class,'amount')]";

$god_vipuska_icon = 'icon-calendar';
$toplivo_icon = 'icon-gas-station';
$probeg_icon = 'icon-road';
$dvigatel_icon = 'icon-engine';
$privod_icon = 'https://plc.ua/wp-content/themes/plc/public/svg/sprite.lot.svg?1615450354#drive';//use
$kuzov_icon = 'https://plc.ua/wp-content/themes/plc/public/svg/sprite.lot.svg?1615450354#car';//use
$problem_icon = 'https://plc.ua/wp-content/themes/plc/public/svg/sprite.lot.svg?1615450354#heart';//use
$prichina_icon = 'https://plc.ua/wp-content/themes/plc/public/svg/sprite.lot.svg?1615450354#damage';//use
$korobka_icon = 'icon-gears';


$xpath = new DOMXPath($doc);

$lots_elems = $xpath->query("//div[contains(@class, '$lot_outstock_class') or contains(@class,'$lot_instock_class')]");


for($i = 0; $i < $lots_elems->count(); $i++){
    $lot = [];
    $el = $lots_elems->item($i);
    $title_el = $xpath->query($auto_title_xpath,$el)->item(0);

    $lot['url'] = $title_el->getAttribute('href');
    $lot['title'] = $title_el->getAttribute('title');
    $lot['img'] = $xpath->query('.//img',$title_el)->item(0)->getAttribute('src');

    $option_elems = $xpath->query($option_xpath,$el);
    for ($j = 0;$j < $option_elems->count(); $j++){
        if(!isset($lot['dvigatel']) && $xpath->query(".//svg[contains(@class, '". $dvigatel_icon ."')]",$option_elems->item($j))->count()>0){
            $lot['dvigatel'] = trim($option_elems->item($j)->textContent);
        }
        if(!isset($lot['god_vipuska']) && $xpath->query(".//svg[contains(@class, '". $god_vipuska_icon ."')]",$option_elems->item($j))->count()>0){
            $lot['god_vipuska'] = trim($option_elems->item($j)->textContent);
        }
        if(!isset($lot['toplivo']) && $xpath->query(".//svg[contains(@class, '". $toplivo_icon ."')]",$option_elems->item($j))->count()>0){
            $lot['toplivo'] = trim($option_elems->item($j)->textContent);
        }
        if(!isset($lot['probeg']) && $xpath->query(".//svg[contains(@class, '". $probeg_icon ."')]",$option_elems->item($j))->count()>0){
            $lot['probeg'] = trim($option_elems->item($j)->textContent);
        }
        if(!isset($lot['privod']) && $xpath->query(".//*[@*='". $privod_icon ."']",$option_elems->item($j))->count()>0){
            $lot['privod'] = trim($option_elems->item($j)->textContent);
        }
        if(!isset($lot['kuzov']) && $xpath->query(".//*[@*='". $kuzov_icon ."']",$option_elems->item($j))->count()>0){
            $lot['kuzov'] = trim($option_elems->item($j)->textContent);
        }
        if(!isset($lot['korobka']) && $xpath->query(".//svg[contains(@class, '". $korobka_icon ."')]",$option_elems->item($j))->count()>0){
            $lot['korobka'] = trim($option_elems->item($j)->textContent);
        }
        if(!isset($lot['problem']) && $xpath->query(".//*[@*='". $problem_icon ."']",$option_elems->item($j))->count()>0){
            $lot['problem'] = trim($option_elems->item($j)->textContent);
        }
        if(!isset($lot['prichina']) && $xpath->query(".//*[@*='". $prichina_icon ."']",$option_elems->item($j))->count()>0){
            $lot['prichina'] = trim($option_elems->item($j)->textContent);
        }
        if(!isset($lot['cena']) && ($ceni = $xpath->query($cena_xpath,$el))->count()>0){
            if($ceni->count()>1){
                $lot['cena'] = trim($ceni->item(1)->textContent);
            }
            elseif($ceni->count()>0){
                $lot['cena'] = trim($ceni->item(0)->textContent);
            }

        }
    }

    $date_item = $xpath->query($date_xpath,$el);
    if($date_item->count()>0){
        $lot['date'] = str_replace('Дата аукциона','',trim($date_item->item(0)->textContent));
    }

    $lots["lots"][]=$lot;
}


print view('index.php', ['lots'=>$lots]);
//print view('index.php', ['lots'=>[['date'=>"DATE",'dvigatel'=>"DVIGATEL",'kuzov'=>'KUZOV']]]);
