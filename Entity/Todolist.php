<?php

namespace Entity {
    class Todolist
    {
        private string $todolist;

        public function __construct(string $todolist="")
        {
            $this->todolist = $todolist;
        }

        public function getTodo()
        {
            return $this->todolist;
        }

        public function setTodo(string $todolist)
        {
            $this->todolist = $todolist;
        }
    }
}
