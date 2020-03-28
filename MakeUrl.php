<?php
/**
 * Created by PhpStorm.
 * User: rabot
 * Date: 11.11.2019
 * Time: 22:17
 */

namespace App\Services;


use function DI\string;

class MakeUrl
{
    public function create($url){

        /*
         * находим запись в сущности URl
         * получаем ее основную сущность к примеру App\Entity\Post
         * находим запись данной сущности
         * строим урл получив parent проверили на 0
         * получили grandpa проверили на 0
         * получили greatGrendpa
         * */
        $ar=[




            'url'=>$url,
            'parent'=>'lipolitiki',
            'grandpa'=>'0',
            'greatGrandpa'=>'011',

        ];
        $links=[];
       if ($ar['greatGrandpa']){
           $links['part0']=$ar['greatGrandpa'];
           $links['part1']=$ar['grandpa'];
           $links['part2']=$ar['parent'];
           $links['part3']=$ar['url'];
       return $links;}

           if($ar['grandpa']){
               $links['part0']=$ar['grandpa'];
               $links['part1']=$ar['parent'];
               $links['part2']=$ar['url'];
               return $links;
           }

        if($ar['parent']){
            $links['part0']=$ar['parent'];
            $links['part1']=$ar['url'];

            return $links;
        }




        return ['part0'=>$url];
    }

    public function createString($url){

        /*
         * находим запись в сущности URl
         * получаем ее основную сущность к примеру App\Entity\Post
         * находим запись данной сущности
         * строим урл получив parent проверили на 0
         * получили grandpa проверили на 0
         * получили greatGrendpa
         * */
        $ar=[




            'url'=>$url,
            'parent'=>'lipolitiki',
            'grandpa'=>'hi',
            'greatGrandpa'=>'ghi',

        ];
        $links=[];
        if ($ar['greatGrandpa']){
            $links['part0']=$ar['greatGrandpa'];
            $links['part1']=$ar['grandpa'];
            $links['part2']=$ar['parent'];
            $links['part3']=$ar['url'];
            $line=join('/',$links);
            return $line;}

        if($ar['grandpa']){
            $links['part0']=$ar['grandpa'];
            $links['part1']=$ar['parent'];
            $links['part2']=$ar['url'];
            $line=join('/',$links);
            return $line;
        }

        if($ar['parent']){
            $links['part0']=$ar['parent'];
            $links['part1']=$ar['url'];
            $line=join('/',$links);
            return $line;
        }




        return $url;
    }

}
