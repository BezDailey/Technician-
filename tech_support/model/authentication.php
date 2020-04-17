<?php
    class Authentication {
        public static function redirect_to_secure_conection() {
            $https = filter_input(INPUT_SERVER, 'HTTPS');
            if (!$https) {
                $host = filter_input(INPUT_SERVER, 'HTTP_HOST');
                $uri = filter_input(INPUT_SERVER, 'REQUEST_URI');
                $url = 'https://' . $host . $uri;
                header("Location: " . $uri);
                exit();
            }
        }

        public static function valid_role($role) {
            switch ($role) {
                case 'admin':
                    if(!isset($_SESSION['is_valid_admin']) && ($_SESSION['is_valid_admin'] == "true")) {
                        header("Location: ../index.php");
                    }
                    break;
            }
        }

        public static function login($role, $username, $password) {
            switch($role) {
                case 'admin':
                    $exist = AdministratorsDB::adminExist($username, $password);
                    if($exist == true){
                        $_SESSION['is_valid_admin'] = "true";
                    } else {
                        $_SESSION['is_valid_admin'] = "false";
                    }
                    break;
            }
        }

        public static function logout($role) {
            switch ($role) {
                case 'admin':
                    $_SESSION['is_valid_admin'] = "false";
                    break;
            }
        }

        public static function check_permissions($role) {
            switch($role) {
                case 'admin':
                    if($_SESSION['is_vaild_admin'] == "true"){

                    } else {
                        header('Location: /projects/Technician-/tech_support/administrators/admin_login_page.php');
                    }
                    break;
            }
        }
    }
?>