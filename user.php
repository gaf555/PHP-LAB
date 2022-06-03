<?php

    require_once __DIR__.'/vendor/autoload.php';


    use Symfony\Component\Validator\Constraints\Length;
    use Symfony\Component\Validator\Constraints\GreaterThan;
    use Symfony\Component\Validator\Constraints\NotBlank;
    use Symfony\Component\Validator\Constraints\Email;
    use Symfony\Component\Validator\Validation;

    class User
    {
        
        private $username = "NONE";
        private $email = "NONE";
        private $password = "NONE";

        private $creationTime;

        public function GetCreationTime()
        {
            return $this->creationTime;
        }

        function __construct(int $id, string $username, string $email, string $pwd)
        {
            $validator = Validation::createValidator();

            //Validate id
            $violations = $validator->validate($id, [
                new GreaterThan(['value' => 0]),
                new NotBlank(),
            ]);

            if (0 !== count($violations)) {
                // there are errors, now you can show them
                foreach ($violations as $violation) {
                    echo "ID: ".$violation->getMessage().'<br>';
                }
            }

            //Validate username
            $violations = $validator->validate($username, [
                new Length(['min' => 4]),
                new NotBlank(),
            ]);

            if (0 !== count($violations)) {
                // there are errors, now you can show them
                foreach ($violations as $violation) {
                    echo "Username: ".$violation->getMessage().'<br>';
                }
            }

            //Validate email
            $violations = $validator->validate($email, [
                new Length(['min' => 8]),
                new NotBlank(),
                new Email(),
            ]);

            if (0 !== count($violations)) {
                // there are errors, now you can show them
                foreach ($violations as $violation) {
                    echo "Email: ".$violation->getMessage().'<br>';
                }
            }

            //Validate password
            $violations = $validator->validate($pwd, [
                new Length(['min' => 6]),
                new NotBlank(),
            ]);

            if (0 !== count($violations)) {
                // there are errors, now you can show them
                foreach ($violations as $violation) {
                    echo "Password: ".$violation->getMessage().'<br>';
                }
            }

            $this->creationTime = new DateTime();
            $this->id = $id;
            $this->username = $username;
            $this->email = $email;
            $this->password = $pwd;
        }
    }
