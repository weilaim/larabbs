<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // 获取 Faker 实例
        $faker = app(Faker\Generator::class);

        // 头像假数据
        $avatars = [
            'http://taoke.com/uploads/images/avatars/201910/21/8_1571608483_4tqBOCbhC4.jpeg',
            'http://taoke.com/uploads/images/avatars/201910/21/8_1571608483_4tqBOCbhC4.jpeg',
            'http://taoke.com/uploads/images/avatars/201910/21/8_1571608483_4tqBOCbhC4.jpeg',
            'http://taoke.com/uploads/images/avatars/201910/21/8_1571608483_4tqBOCbhC4.jpeg',
            'http://taoke.com/uploads/images/avatars/201910/21/8_1571608483_4tqBOCbhC4.jpeg',
            'http://taoke.com/uploads/images/avatars/201910/21/8_1571608483_4tqBOCbhC4.jpeg',
        ];

        // 生成数据集合
        $users = factory(User::class)
            ->times(10)
            ->make()
            ->each(function ($user, $index)
            use ($faker, $avatars)
            {
                // 从头像数组中随机取出一个并赋值
                $user->avatar = $faker->randomElement($avatars);
            });

        // 让隐藏字段可见，并将数据集合转换为数组
        $user_array = $users->makeVisible(['password', 'remember_token'])->toArray();

        // 插入到数据库中
        User::insert($user_array);

        // 单独处理第一个用户的数据
        $user = User::find(1);
        $user->name = 'Summer';
        $user->email = 'summer@example.com';
        $user->avatar = 'https://cdn.learnku.com/uploads/images/201710/14/1/ZqM7iaP4CR.png';
        $user->save();

    }
}