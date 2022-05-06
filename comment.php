<?php

    require_once(__DIR__.'/user.php'); 

    class Comment
    {
        private $user;
        private $text;

        function __construct(user $user, string $text)
        {
            $this->user = $user;
            $this->text = $text;
        }

        public function GetUser()
        {
            return $this->user;
        }
        public function GetText()
        {
            return $this->text;
        }
    }

?>



