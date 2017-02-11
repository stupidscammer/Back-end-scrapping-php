<?php
require_once 'simple_html_dom.php';
header('Content-Type: application/json; charset=UTF-8');
$static_dom = 'https://vehiclebid.info/search';
$real_dom_temp = $static_dom.'';
$div_class = $title = "";
$item = [];
	$dom = file_get_html($static_dom);
	if(!empty($dom)) {
		 $j = 0;		
		foreach($dom->find("div.chakra-stack") as $div_class){
			foreach($div_class->find("a.chakra-card") as $div_class_data1){				
				$href = $div_class_data1->getAttribute('href');
				foreach($div_class_data1->find(".chakra-image") as $div_class_data)
				{
					$image_url = $div_class_data->getAttribute('src');
					$type = $div_class_data->find(".css-n21gh5>.css-1idwstw>h2")[0]->innertext;
					$vin = $div_class_data->find(".css-n21gh5>.css-1idwstw>p")[0]->innertext;
					$lot = $div_class_data->find(".css-n21gh5>.css-1idwstw>p")[1]->innertext;
					$sale_date = $div_class_data->find(".css-n21gh5>.css-1idwstw>p")[2]->innertext;
					$odermeter = $div_class_data->find(".css-n21gh5>.css-1idwstw>p")[3]->innertext;
					$price = $div_class_data->find(".css-n21gh5>.css-1idwstw>span")[0]->innertext;
					if ($href ) {
						# code...
						$item['href'] = $href;
						$item['image'] = $image_url;
						$item['type'] = $type;
						$item['vin'] = $vin;
						$item['lot'] = $lot;
						$item['sale_date'] = $sale_date;
						$item['odermeter'] = $odermeter;
						$item['price'] = $price;
						$article[] = $item;
					}
				}
				
			}
		}			
	}
print_r($article);
exit;
?>