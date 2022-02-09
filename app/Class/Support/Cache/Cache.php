<?php

namespace Class\Support\Cache;

use Class\Location\Location;

class Cache
{

    public function __construct
    (
       private string $cachePath
    ) {}


    public function get(string $id){

        $file = $this->cachePath . "$id";
        $result = null;

        if(is_file($file)&&is_readable($file)){
            $result = unserialize(file_get_contents($file));
            if(time() >= $result['expired']){
                $result = null;
            } else {
                echo "</br>Cached result:</br>";
                $result = $result['object'];
            }
        }

        return $result;
    }

    public function set(string $id, Location $data, $ttl){
        $array = [];
        $array['object'] = $data;
        $array['expired'] = time()+$ttl;
        return file_put_contents($this->cachePath . "$id", serialize($array));
    }


}