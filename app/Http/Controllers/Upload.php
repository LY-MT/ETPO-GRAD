<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRules;
use App\Http\Requests\SubmitRules;
use Gregwar\Captcha\CaptchaBuilder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Upload extends Controller
{
    public function submit(SubmitRules $request)
    {
        $captchaImg = session('CAPTCHA_IMG');
        /*if (strcasecmp($request['vcode'], $captchaImg) != 0) {
            $errors = array(
                'message' => "The given data was invalid.",
                'errors' => ['vcode' => ["验证码错误"]]
            );
            return new JsonResponse($errors, 422);
        }*/

        $qq = $request['qq'];
        $name = $request['name'];
        $subtitle = $request['subtitle'];
        $image = $request['image'];
        $content = $request['content'];
        $ip = $request->ip();
        $time = date("Y-m-d H:i:s");
        DB::table('data')->insert([
            'qq' => $qq,
            'name' => $name,
            'subtitle' => $subtitle,
            'image' => $image,
            'content' => $content,
            'ip' => $ip,
            'created_at' => $time,
            'updated_at' => $time
        ]);

    }

    public function like(Request $request)
    {
        $id = $request['id'];
        $ip = $request->ip();
        $time = date("Y-m-d H:i:s");
        $like_sql = DB::table('like');
        $SQL = DB::table('data');
        $like = '';
        $like_initial = json_decode($SQL->where('id', $id)->get('like'));
        if(!$like_sql->where('id', $id)->get('ip')->isEmpty()){
            $like_ip = json_decode($like_sql->where('id', $id)->get('ip'));
            foreach($like_ip as $x=>$value)
            {
                if($ip == $value->ip){
                    $like = $like_initial[0]->like - 1;
                    $SQL->update(['like' => $like]);
                    $like_sql->where('ip',$ip)->delete(1);
                }
            }
        }else{
            $like = $like_initial[0]->like + 1;
            $SQL->update(['like' => $like]);
            $like_sql->insert(['id' => $id, 'ip' => $ip, 'created_at' => $time,
                'updated_at' => $time]);
        }
        return $like;
    }
    public function comment(CommentRules $request){
        $captchaImg = session('CAPTCHA_IMG');
        if (strcasecmp($request['vcode'], $captchaImg) != 0) {
            $errors = array(
                'message' => "The given data was invalid.",
                'errors' => ['vcode' => ["验证码错误"]]
            );
            return new JsonResponse($errors, 422);
        }
        $id = $request['id'];
        $ip = $request->ip();
        $time = date("Y-m-d H:i:s");
        DB::table('comment')->insert([
            "id" => $id,
            "name"=>$request['name'],
            "comment"=>$request['comment'],
            "ip"=>$ip,
            'created_at' => $time,
            'updated_at' => $time
        ]);
        $comment = DB::table('data')->where('id',$id);
        $quantity = $comment->get('comment');
        if(!$quantity->isEmpty()){
            $quantity = $quantity[0]->comment + 1;
        }else{
            $quantity = 1;
        }
        $comment->update(['comment'=>$quantity]);
        return $quantity;
        /*->update();*/
    }

    public function Captcha()
    {
        $builder = new CaptchaBuilder();
        $phrase = $builder->getPhrase();
        session()->put('CAPTCHA_IMG', $phrase);
        $builder->build($width = 150, $height = 40, $font = null);
        header('Content-type: image/jpeg');
        $builder->output();
    }
}
