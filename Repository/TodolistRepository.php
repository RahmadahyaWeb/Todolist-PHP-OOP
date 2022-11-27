<?php
// repository digunakan untuk mengelola data yang diambil dari entity 
namespace Repository {

    use Entity\Todolist;

    interface TodolistRepository
    {
        function saveTodolist(Todolist $todolist): void;
        function removeTodolist(int $number): bool;
        function getAll(): array;
    }

    class TodolistRepositoryImpl implements TodolistRepository
    {
        public array $todolist = array();

        function saveTodolist(Todolist $todolist): void
        {
            // menentukan panjang index dari array $todolist
            // $number = index array dari $todolist
            // $todo = value array dari $todolist
            $number = sizeof($this->todolist) + 1;
            $this->todolist[$number] = $todolist;
        }

        function removeTodolist(int $number): bool
        {

            if ($number > sizeof($this->todolist)) {
                return false;
            }

            for ($i = $number; $i < sizeof($this->todolist); $i++) {
                $this->todolist[$i] = $this->todolist[$i + 1];
            }

            unset($this->todolist[sizeof($this->todolist)]);

            return true;
        }

        // untuk mengambil data 
        function getAll(): array
        {
            return $this->todolist;
        }
    }
}
