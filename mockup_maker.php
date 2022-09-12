<?php
//$curl = curl_init();
//curl_setopt($curl,CURLOPT_URL,'http://127.0.0.1:8000/curl');
//$responsive = curl_exec($curl);
//$xp = new DOMXpath($dom);
//$nodes = $xp->query('input[name="make"]');
//$node = $nodes->item(0)->nodeValue;
//$car_make = $node->getAttribute('value');
//$anchors = $dom->getElementsByTagName('meta');
//foreach ($anchors as $a){
//
//    foreach ($a->attributes as $e){
//        array_push($arr,$e->value);
////        echo  print_r($e);
//    }
//}
//->attributes[2]
//->nodeValue
//$token = $arr[1];

function requestserver($url,$status,$mockup_image = null){

    $dom = new DOMDocument();
    $dom->loadHTMLFile('http://127.0.0.1:8000/');
    $metas = $dom->getElementsByTagName('meta');

    for ($i = 0; $i < $metas->length; $i++) {
        $meta = $metas->item($i);
        if ($meta->getAttribute('name') == 'csrf-token')
            $csrfToken = $meta->getAttribute('content');
    }

    $ch = curl_init();
    $headers = array();
    $headers[] = "X-CSRF-Token:$csrfToken";
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, TRUE);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
//    $arr = [
//       'mockup_image'=> $mockup_image,
//       'id_user_project'=>$id_user_project
//    ];
//    $arr_convert_to_json = json_decode($arr);
    curl_setopt($ch, CURLOPT_POSTFIELDS, "status=".$status."&& mockup_image=".$mockup_image."&& _token" . $csrfToken);
    $responsive = curl_exec($ch);
    curl_close($ch);
    return $responsive;
}

while (true) {


    $responsive=requestserver('http://127.0.0.1:8000/rendering','queue');

    if(($responsive!=='failed')){
//        open and close json
//        $json = json_decode($responsive)->json;
//        if(isset($json)){



        $data_json_decode = json_decode((json_decode($responsive)->json));
        $name_image = explode('/',$data_json_decode->objects[0]->imageSrc)[2];
        exec('curl http://127.0.0.1:8000/storage/mockup/'.$name_image.' --output '.$name_image);
        $data_json_decode->objects[0]->imageSrc = 'C:/viditor/mockup/'.$name_image;
        $path_image_mockup = $data_json_decode->exportSrc;
        $mockup_image = pathinfo($path_image_mockup,PATHINFO_BASENAME);
//        $id_user_project =  $data_json_decode->userProjectId;
//        echo print_r($data_json_decode);
        $data_json = json_encode($data_json_decode);
        //        open and close json
        echo "\n" . (json_decode($responsive))->id . " - ";
        $json_file = fopen('json.json', 'w');
        fwrite($json_file,$data_json);
        fclose($json_file);

        echo  "done -"." create vbs";

        $txt = ' Option Explicit
        Dim appRef
        Dim javaScriptFile
        Set appRef = CreateObject("Photoshop.Application")

        javaScriptFile = "C:\viditor\mockup\Start.jsx"
        call appRef.DoJavaScriptFile(javaScriptFile, Array("C:\viditor\mockup\json.json","three"))';
        echo ' - done';
        $vbs_file = fopen('jsxRunner.vbs', 'w');
        fwrite($vbs_file, $txt);
        fclose($vbs_file);
        exec('WScript "C:\viditor\mockup\jsxRunner.vbs"');

        echo '-done rendering';

        $finishRender= requestServer('http://127.0.0.1:8000/render-complete','complete',$mockup_image);
        echo $finishRender;
    }





    sleep(2);

//    }



}






