<?php
// menampilkan hasil inputan dari service
namespace View {

    use Helper\InputHelper;
    use Service\TodolistService;

    class TodolistView
    {
        private TodolistService $todolistService;
        public function __construct(TodolistService $todolistService)
        {
            $this->todolistService = $todolistService;
        }
        function showTodolist(): void
        {
            while (true) {
                // menampilkan menu todolist 
                // fungsi showTodolist() merupakan logic untuk menampilkan todolist
                $this->todolistService->showTodolist();
                echo "MENU" . PHP_EOL;
                echo "1. Tambah Todolist" . PHP_EOL;
                echo "2. Hapus Todolist" . PHP_EOL;
                echo "x. Keluar" . PHP_EOL;

                $pilihan = InputHelper::input("Pilih: ");
                if ($pilihan == "1") {
                    $this->addTodolist();
                } else if ($pilihan == "2") {
                    $this->removeTodolist();
                } else if ($pilihan == "x") {
                    break;
                } else {
                    echo "PILIHAN INVALID!" . PHP_EOL;
                }
            }
            echo "GOODBYE!" . PHP_EOL;
        }
        function addTodolist(): void
        {
            echo "MENAMBAH TODO" . PHP_EOL;
            $todo = InputHelper::input("TODO (x untuk batal): ");

            if ($todo == "x") {
            } else {
                $this->todolistService->addTodolist($todo);
            }
        }

        function removeTodolist(): void
        {
            echo "MENGHAPUS TODO" . PHP_EOL;
            $number = InputHelper::input("Nomor (x untuk batal): ");
            if ($number == "x") {
                // batal
            } else {
                $this->todolistService->removeTodolist($number);
            }
        }
    }
}
