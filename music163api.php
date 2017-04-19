<?php

function curl_request($url, $post_data = null)
{
    $refer = "http://music.163.com/";
    $header[] = "Cookie: " . "appver=1.5.0.75771;";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
    curl_setopt($ch, CURLOPT_REFERER, $refer);
    if (!empty($post_data)){
        curl_setopt($ch, CURLOPT_POST, 1);           
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post_data));
    }

    $output = curl_exec($ch);
    curl_close($ch);
    return $output;
}

function music_search($word, $type)
{
    $url = "http://music.163.com/api/search/pc";
    return curl_request($url, array(
        's' => $word,
        'offset' => 0,
        'limit' => 5,
        'type' => 1,
    ));
}

function get_music_info($music_id)
{
    $url = "http://music.163.com/api/song/detail/?id=" . $music_id . "&ids=%5B" . $music_id . "%5D";
    return curl_request($url);
}
 
function get_artist_album($artist_id, $limit)
{
    $url = "http://music.163.com/api/artist/albums/" . $artist_id . "?limit=" . $limit;
    return curl_request($url);
}
 
function get_album_info($album_id)
{
    $url = "http://music.163.com/api/album/" . $album_id;
    return curl_request($url);
}
 
function get_playlist_info($playlist_id)
{
    $url = "http://music.163.com/api/playlist/detail?id=" . $playlist_id;
    return curl_request($url);
}
 
function get_music_lyric($music_id)
{
    $url = "http://music.163.com/api/song/lyric?os=pc&id=" . $music_id . "&lv=-1&kv=-1&tv=-1";
    return curl_request($url);
}
 
function get_mv_info()
{
    $url = "http://music.163.com/api/mv/detail?id=319104&type=mp4";
    return curl_request($url);
}
 
echo music_search2("hey jude", 1);
echo get_music_info("180515");
#echo get_artist_album("166009", "5");
#echo get_album_info("3021064");
#echo get_playlist_info("22320356");
#echo get_music_lyric("29567020");
#echo get_mv_info();
