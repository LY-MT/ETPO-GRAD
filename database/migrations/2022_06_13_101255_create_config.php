<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateConfig extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('config', function (Blueprint $table) {
            $table->string('more')->default('开发初衷');
            $table->string('more_title')->default('开发初衷');
            $table->string('more_subtitle')->default('你终于访问这个页面啦！！');
            $table->string('more_image')->default('https://img.llilii.cn/compression/vocaloid/kagamine/78688114_p0.png');
            $table->string('more_content')->default('高中三年，在学校的时间甚少，有许多话想说，但没有机会了');
            $table->string('music_type')->default('playlist');
            $table->string('music_server')->default('tencent');
            $table->string('music_id')->default('8508134532');
            $table->string('music_autoplay')->default('true');
            $table->string('music_order')->default('random');
            $table->string('music_volume')->default('0.7');
            $table->string('footer')->nullable();
        });
        DB::table('config')->insert([
            'more' =>'开发初衷',
            'more_title' =>'开发初衷',
            'more_subtitle' =>'你终于访问这个页面啦！！',
            'more_image' =>'https://img.llilii.cn/compression/vocaloid/kagamine/78688114_p0.png',
            'more_content' =>'高中三年，在学校的时间甚少，有许多话想说，但没有机会了',
            'music_type' =>'playlist',
            'music_server' =>'tencent',
            'music_id' =>'8508134532',
            'music_volume' => 0.7,
            'music_autoplay' =>'true',
            'music_order' =>'random',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('config');
    }
}
