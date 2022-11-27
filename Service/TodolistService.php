<?php
// menerima input dari user dan memproses logicnya -> hampir sama seperti bisnis logic
namespace Service {

    use Entity\Todolist;
    use Repository\TodolistRepository;

    interface TodolistService
    {
        function showTodolist(): void;
        function addTodolist(string $todolist): void;
        function removeTodolist(int $number): void;
    }

    class TodolistServiceImpl implements TodolistService
    {
        private TodolistRepository $todolistRepository;
        public function __construct(TodolistRepository $todolistRepository)
        {
            $this->todolistRepository = $todolistRepository;
        }

        function showTodolist(): void
        {

            echo "TODOLIST" . PHP_EOL;
            // logic service showTodolist menampilkan list todolist yang mana data tersebut didapatkan dari TodolistRepository; 
            $todolist = $this->todolistRepository->getAll();
            foreach ($todolist as $number => $value) {
                echo "$number. " . $value->getTodo() . PHP_EOL;
            }
        }

        function addTodolist(string $todolist): void
        {
            $todolist = new Todolist($todolist);
            $this->todolistRepository->saveTodolist($todolist);
            echo "BERHASIL MENAMBAH TODOLIST!" . PHP_EOL;
        }

        function removeTodolist(int $number): void
        {
            if ($this->todolistRepository->removeTodolist($number)){
                echo "BERHASIL MENGHAPUS TODOLIST!" . PHP_EOL;
            } else {
                echo "GAGAL MENGHAPUS TODOLIST!" . PHP_EOL;
            }
        }
    }
}
