<?php

function translate($text, $fromlang, $tolang)
{
    $url    = "https://translate.google.com/translate_a/single";
    $fields = array(
        'sl' => $fromlang,
        'tl' => $tolang,
        'q' => $text
    );
    
    $fields_string = 'client=at&dt=t&dt=ld&dt=qca&dt=rm&dt=bd&dj=1&hl=es-ES&ie=UTF-8&oe=UTF-8&inputm=2&otf=2&iid=1dd3b944-fa62-4b55-b330-74909a99969e&'.http_build_query($fields);
    
    $ch = curl_init($url);
    curl_setopt_array($ch, [
        CURLOPT_POST => 1,
        CURLOPT_POSTFIELDS => $fields_string,
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_ENCODING => 'UTF-8',
        CURLOPT_SSL_VERIFYPEER => 0,
        CURLOPT_SSL_VERIFYHOST => 0,
        CURLOPT_USERAGENT => 'AndroidTranslate/5.3.0.RC02.130475354-53000263 5.1 phone TRANSLATE_OPM5_TEST_1']);
    $result = curl_exec($ch);
    curl_close($ch);
    
    $sentencesArray = json_decode($result, true);
    $sentences      = '';
    foreach ($sentencesArray['sentences'] as $s) {
        $sentences .= $s['trans'] ?? '';
    }
    return $sentences;
}
