<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class ViewComposers extends Controller
{

    public function home()
    {
        $data = DB::table('data')->orderBy('id', 'desc')->Paginate(5);
        return view('home', compact('data'));
    }

    public function submit()
    {
        $array = array(
            '愿我们在彼此看不到的岁月里熠熠生辉；愿我们在人生的顶峰相遇；愿我们如蔷薇一般在一片荆棘中顽强生长。',
            '我也曾憧憬未来但现在我更怀念昨天。',
            '不要时光倒流，而是要以后的时光怎么流',
            '其实很多人都一样，喜欢的不是学校，不是班级，而是坐在教室的那群人',
            '若是一经别年，他日见相，愿我依们然灿如笑从前',
            '不知道下一次一起牵手，叽叽喳喳去厕所是什么时候啦',
            '梦想已起航，一起驶向更广阔的的人生',
            '来的时候也是夏天，去的时候也是夏天，一张毕业照，一张试卷我们便散了',
            '等以后时间够久了我们还会再遇见吧',
            '希望我们说了再见以后，真的还能再见',
            '今天天气很好，下午没课，以后也不会有课了。夏天的遇见就在夏天告别吧',
            '为了拥抱那一个人，笑着哭着拥抱了整个班',
            '不管以后你以后是辉煌还是堕落是浓烟还是烈酒是暴雨还是晴天是风是云，我都祝你一直快乐',
            '天下没有不散的宴席，但如果你请客，我可以陪你多吃一会',
            '我们将拿着三年青春和七张答卷跟世界赌一个明天',
            '希望你继续兴致盎然地与世界交手，一直走在开满鲜花的路上吧',
            '每个人心中只有一个夏天，其他的夏天都用来和他做比较',
            '这里的一切都有始有终，却能容纳所有的不期而遇的久别重逢',
        );
        $Copywriting = $array[array_rand($array, 1)];
        return view('submit', ['Copywriting' => $Copywriting]);
    }

    public function more()
    {
        return view('more');
    }

    public function comment($id)
    {
        $value = DB::table('data')->where('id', $id)->get();
        $data = DB::table('comment')->where('id', $id)->get();
        if ($value->isEmpty()) {
            $errors = array(
                'message' => "No content",
                'errors' => ['content' => ["空的"]]
            );
            return new JsonResponse($errors, 422);
        } else {
            $value = $value[0];
        }
        return view('comment', compact('value', 'data'));

    }
}
