<?php


namespace App\Repositories\Admin;


use App\Comment;
use App\Question;
use App\Topic;
use App\User;

class AdminRepository
{
    public function dashboard_init_data()
    {
        return $collects = collect(
            [
                [
                    'count' => User::all()->count(),
                    'title' => '用户',
                    'sup' => '人',
                    'icon' => 'ion-person-add',
                    'bck' => 'bg-aqua',
                    'url' => '/admin/users'
                ],
                [
                    'count' => Question::all()->count(),
                    'title' => '问题',
                    'sup' => '篇',
                    'icon' => 'ion-document',
                    'bck' => 'bg-green',
                    'url' => '/admin/question/index'
                ],
                [
                    'count' => Comment::all()->count(),
                    'title' => '评论',
                    'sup' => '条',
                    'icon' => 'ion-android-chat',
                    'bck' => 'bg-red',
                    'url' => 'admin/comments/index'
                ],
                [
                    'count' => Topic::all()->count(),
                    'title' => '标签',
                    'sup' => '条',
                    'icon' => 'ion-pricetags',
                    'bck' => 'bg-olive',
                    'url' => 'admin/topics/index'
                ],
                [
                    'count' => 44,
                    'title' => '邮件',
                    'sup' => '封',
                    'icon' => 'ion-ios-email-outline',
                    'bck' => 'bg-orange',
                    'url' => 'admin/mail/index'
                ],
                [
                    'count' => 44,
                    'title' => '消息',
                    'sup' => '条',
                    'icon' => 'ion-film-marker',
                    'bck' => 'bg-yellow',
                    'url' => 'admin/messages/index'
                ],
                [
                    'count' => 0,
                    'title' => '视频',
                    'sup' => '个',
                    'icon' => 'ion-videocamera',
                    'bck' => 'bg-purple',
                    'url' => 'admin/video/index'
                ],
                [
                    'count' => 0,
                    'title' => '音乐',
                    'sup' => '首',
                    'icon' => 'ion-music-note',
                    'bck' => 'bg-maroon',
                    'url' => 'admin/music/index'
                ]
            ]
        );
    }
}