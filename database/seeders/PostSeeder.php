<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'title' => 'Welcome to Portal',
                'news_content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda, nam mollitia harum obcaecati magnam labore doloribus quos. Laudantium recusandae velit accusamus dolore aspernatur autem corporis quas quos tempore pariatur ea vel similique et vitae adipisci animi, nostrum quibusdam, nemo neque maxime fuga dolores deserunt minus. Aut neque, mollitia culpa, expedita iure eos at architecto voluptas repudiandae vero velit provident iusto? Nulla exercitationem voluptate labore, officia quo, eligendi a ex quibusdam nostrum modi blanditiis unde totam natus repudiandae est consequatur ullam voluptates sapiente. Blanditiis atque commodi laboriosam ipsam dignissimos necessitatibus aspernatur quos! Quis voluptate recusandae eligendi quod numquam veritatis beatae quos!',
                'author' => '1',
            ],
            [
                'title' => 'Pengumuman',
                'news_content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda, nam mollitia harum obcaecati magnam labore doloribus quos. Laudantium recusandae velit accusamus dolore aspernatur autem corporis quas quos tempore pariatur ea vel similique et vitae adipisci animi, nostrum quibusdam, nemo neque maxime fuga dolores deserunt minus. Aut neque, mollitia culpa, expedita iure eos at architecto voluptas repudiandae vero velit provident iusto? Nulla exercitationem voluptate labore, officia quo, eligendi a ex quibusdam nostrum modi blanditiis unde totam natus repudiandae est consequatur ullam voluptates sapiente. Blanditiis atque commodi laboriosam ipsam dignissimos necessitatibus aspernatur quos! Quis voluptate recusandae eligendi quod numquam veritatis beatae quos!',
                'author' => '1',
            ],
        ];

        Post::insert($data);
    }
}