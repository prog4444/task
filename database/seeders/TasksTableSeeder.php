<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          // Очищаем таблицу задач перед заполнением
          Task::truncate();
        
          // Создаем несколько задач
          Task::create([
              'name' => 'Задача 1',
              'description' => 'Описание задачи 1',
              // Другие поля задачи
          ]);
          
          // Создаем еще несколько задач
          Task::create([
              'name' => 'Задача 2',
              'description' => 'Описание задачи 2',
              // Другие поля задачи
          ]);
  
          // и так далее...
  
          // Завершаем сеедер
          $this->command->info('Сеедер TasksTableSeeder успешно выполнен.');
    }
}
