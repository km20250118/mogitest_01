<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Item;
use App\Models\User;

class ItemSeeder extends Seeder
{
    public function run()
    {
        $user = User::first();

        if (!$user) {
            $this->command->error('ユーザーが存在しません。');
            return;
        }

        $items = [
            ['name' => '腕時計', 'price' => 15000, 'img_url' => 'items/mens_clock.jpg', 'description' => '高級腕時計です', 'condition_id' => 1],
            ['name' => 'HDD', 'price' => 5000, 'img_url' => 'items/hard_disk.jpg', 'description' => '外付けHDDです', 'condition_id' => 1],
            ['name' => '玉ねぎ3束', 'price' => 300, 'img_url' => 'items/onion.jpg', 'description' => '新鮮な玉ねぎです', 'condition_id' => 1],
            ['name' => '革靴', 'price' => 4000, 'img_url' => 'items/leather_shoes.jpg', 'description' => 'ビジネス用革靴です', 'condition_id' => 1],
            ['name' => 'ノートPC', 'price' => 45000, 'img_url' => 'items/laptop_PC.jpg', 'description' => 'ノートPCです', 'condition_id' => 1],
            ['name' => 'マイク', 'price' => 8000, 'img_url' => 'items/mic.jpg', 'description' => '配信用マイクです', 'condition_id' => 1],
            ['name' => 'ショルダーバッグ', 'price' => 3500, 'img_url' => 'items/shoulder_bag.jpg', 'description' => 'ショルダーバッグです', 'condition_id' => 1],
            ['name' => 'タンブラー', 'price' => 500, 'img_url' => 'items/tumbler.jpg', 'description' => '保温保冷タンブラーです', 'condition_id' => 1],
            ['name' => 'コーヒーミル', 'price' => 4000, 'img_url' => 'items/coffer_mill.jpg', 'description' => 'コーヒーミルです', 'condition_id' => 1],
            ['name' => 'メイクセット', 'price' => 2500, 'img_url' => 'items/makeup-set.jpg', 'description' => 'メイク道具セットです', 'condition_id' => 1],
        ];

        foreach ($items as $itemData) {
            Item::create([
                'user_id' => $user->id,
                'name' => $itemData['name'],
                'price' => $itemData['price'],
                'img_url' => $itemData['img_url'],
                'description' => $itemData['description'],
                'condition_id' => $itemData['condition_id'],
            ]);
        }

        $this->command->info('商品データを10件追加しました！');
    }
}
